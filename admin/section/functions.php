<?php
function MYCreateSection($sectionName, $pageTitle)
{
    $absoluteFilePath = $_SERVER["DOCUMENT_ROOT"] . SITE_DIR . $sectionName;
    $io = CBXVirtualIo::GetInstance();
    if (!$io->CreateDirectory($absoluteFilePath)) {
        return false;
    }

    //Title
    $strSectionName = "";
    if (strlen($pageTitle) > 0) {
        $strSectionName = "\$sSectionName = \"" . EscapePHPString($pageTitle) . "\";\n";
    }

    $sectionFileContent = "<" . "?\n" . $strSectionName . "\$arDirProperties = Array(\n\n);\n" . "?" . ">";

    $header = 'require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");$APPLICATION->SetTitle("' . $pageTitle . '");';
    $footer = 'require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php")';
    $include = '<?require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR."'. $sectionName . '/include.php");?>';
    $fileContent = "<?" . $header . "?>\n" . $include . "\n<?" . $footer . "?>";


    //Create .section.php
    $io->GetFile($absoluteFilePath . "/.section.php");
    if (!$GLOBALS["APPLICATION"]->SaveFileContent($absoluteFilePath . "/.section.php", $sectionFileContent))
        return false;

    //Create index.php
    if (!$GLOBALS["APPLICATION"]->SaveFileContent($absoluteFilePath . "/index.php", $fileContent))
        return false;

    MYChangeSectionToMenu($sectionName, $pageTitle);

    return true;
}

function MYSaveContentToFile($request, $sectionName)
{
    if ($request['PAGE_TEXT'] && $request['PAGE_TEXT'] != '') {
        $content = $request['PAGE_TEXT'];
        $file = $_SERVER['DOCUMENT_ROOT'] . SITE_DIR . $sectionName . "/include.php";
        file_put_contents($file, $content);
    }
}

function MYGetContentFromFile($sectionName)
{
    $content = '';
    $file = $_SERVER['DOCUMENT_ROOT'] . SITE_DIR . $sectionName . "/include.php";
    if (file_exists($file)) {
        $content = file_get_contents($file);
    }
    return $content;
}

function getPageTitle($sectionName)
{
    $title = '';
    if (file_exists($_SERVER["DOCUMENT_ROOT"] . SITE_DIR . $sectionName . "/.section.php"))
        $title = explode('"', file($_SERVER["DOCUMENT_ROOT"] . SITE_DIR . $sectionName . "/.section.php")[1])[1];
    return $title;
}

function MYRemoveSection($sectionName, $pageTitle)
{
    $path = $_SERVER["DOCUMENT_ROOT"] . SITE_DIR . $sectionName;
    $includes = new FilesystemIterator($path);
    foreach ($includes as $include) {
        if (is_dir($include) && !is_link($include)) {
            MYRemoveSection($include, $pageTitle);
        } else {
            unlink($include);
        }
    }
    rmdir($path);

    MYChangeSectionToMenu($sectionName, $pageTitle, 'remove');
}

function MYChangeSectionToMenu($sectionName, $pageTitle, $type = 'add')
{
    $menuItem = [$pageTitle, SITE_DIR . $sectionName . '/', [], ''];
    $menuFile = SITE_DIR . '.main.menu.php';
    $path = $_SERVER["DOCUMENT_ROOT"] . $menuFile;
    if (file_exists($path)) {
        if (CModule::IncludeModule('fileman')) {
            $arResult = CFileMan::GetMenuArray($path);
            $arMenuItems = $arResult["aMenuLinks"];
            $menuTemplate = $arResult["sMenuTemplate"];

            $bFound = false;
            foreach ($arMenuItems as $key => $item)
                if ($item[1] == $menuItem[1]) {
                    $bFound = true;
                    if ($type == 'remove')
                        unset($arMenuItems[$key]);
                }

            if (!$bFound && $type == 'add') {
                $arMenuItems[] = $menuItem;
            }
            //будем удалять Оплату из пунктов меню, если есть Оплата, Доставка и Шоу-румы
            $searchAr = [SITE_DIR . 'delivering/', SITE_DIR . 'payment/', SITE_DIR . 'showroom/'];
            $searchCount = 0;
            $keyPayment = '';
            foreach ($arMenuItems as $key => $item) {
                if (in_array($item[1], $searchAr)) {
                    $searchCount++;
                }
                if ($item[1] == SITE_DIR . 'payment/') $keyPayment = $key;
            }
            if ($searchCount == count($searchAr)) {
                $arMenuItems[$keyPayment][4] = 'false';
            } elseif (isset($arMenuItems[$keyPayment])) {
                $arMenuItems[$keyPayment][4] = '';
            }

            CFileMan::SaveMenu(array(SITE_ID, $menuFile), $arMenuItems, $menuTemplate);
        }
    }
}