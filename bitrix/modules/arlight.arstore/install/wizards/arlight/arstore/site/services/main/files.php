<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

if (!defined("WIZARD_SITE_ID"))
    return;

if (!defined("WIZARD_SITE_DIR"))
    return;

if (WIZARD_INSTALL_DEMO_DATA) {
    $path = str_replace("//", "/", WIZARD_ABSOLUTE_PATH . "/site/public/" . LANGUAGE_ID . "/");
    $pathLocalDir = str_replace("//", "/", WIZARD_ABSOLUTE_PATH . "/site/public/" . LANGUAGE_ID . "/local/");

    $handle = @opendir($path);
    $handleLocal = @opendir($pathLocalDir);

    if ($handle) {
        while ($file = readdir($handle)) {
            if (in_array($file, array(".", "..")))
                continue;
            if ($file == 'local')
                continue;

            CopyDirFiles(
                $path . $file,
                WIZARD_SITE_PATH . "/" . $file,
                $rewrite = true,
                $recursive = true,
                $delete_after_copy = false
            );
        }
    }

    if ($handleLocal) {
        while ($file = readdir($handleLocal)) {
            if (in_array($file, array(".", "..")))
                continue;

            $pathLocalDirInner = str_replace("//", "/", WIZARD_ABSOLUTE_PATH . "/site/public/" . LANGUAGE_ID . "/local/" . $file . "/");
            $handleLocalInner = @opendir($pathLocalDirInner);
            while ($fileInner = readdir($handleLocalInner)) {
                if (in_array($fileInner, array(".", "..")))
                    continue;
                $saveTo = $_SERVER["DOCUMENT_ROOT"] . "/local/" . $file . "/" . WIZARD_SITE_ID . "/" . $fileInner;
                if ($file == 'cron' || $file == 'components')
                    $saveTo = $_SERVER["DOCUMENT_ROOT"] . "/local/" . $file . "/" . $fileInner;

                CopyDirFiles(
                    $pathLocalDirInner . $fileInner,
                    $saveTo,
                    $rewrite = true,
                    $recursive = true,
                    $delete_after_copy = false
                );
            }
        }
    }

    WizardServices::PatchHtaccess(WIZARD_SITE_PATH);

    WizardServices::ReplaceMacrosRecursive(WIZARD_SITE_PATH . "company/", array("SITE_DIR" => WIZARD_SITE_DIR));
    WizardServices::ReplaceMacrosRecursive(WIZARD_SITE_PATH . "contacts/", array("SITE_DIR" => WIZARD_SITE_DIR));
    WizardServices::ReplaceMacrosRecursive(WIZARD_SITE_PATH . "news/", array("SITE_DIR" => WIZARD_SITE_DIR));
    WizardServices::ReplaceMacrosRecursive(WIZARD_SITE_PATH . "search/", array("SITE_DIR" => WIZARD_SITE_DIR));
    WizardServices::ReplaceMacrosRecursive(WIZARD_SITE_PATH . "services/", array("SITE_DIR" => WIZARD_SITE_DIR));

    WizardServices::ReplaceMacrosRecursive(WIZARD_SITE_PATH . "catalog/", array("SITE_DIR" => WIZARD_SITE_DIR));
    WizardServices::ReplaceMacrosRecursive(WIZARD_SITE_PATH . "news/", array("SITE_DIR" => WIZARD_SITE_DIR));
    WizardServices::ReplaceMacrosRecursive(WIZARD_SITE_PATH . "info/", array("SITE_DIR" => WIZARD_SITE_DIR));
    WizardServices::ReplaceMacrosRecursive(WIZARD_SITE_PATH . "admin/", array("SITE_DIR" => WIZARD_SITE_DIR));
    WizardServices::ReplaceMacrosRecursive(WIZARD_SITE_PATH . "personal/", array("SITE_DIR" => WIZARD_SITE_DIR));

    CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH . ".main.menu.php", array("SITE_DIR" => WIZARD_SITE_DIR));
    CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH . "_index.php", array("SITE_DIR" => WIZARD_SITE_DIR));

    //CWizardUtil::ReplaceMacros(WIZARD_SITE_ROOT_PATH . "/local/templates/arlight/footer.php", array("SITE_DIR" => WIZARD_SITE_DIR));
    CWizardUtil::ReplaceMacros(WIZARD_SITE_ROOT_PATH . "/local/templates/arlight/header.php", array("SITE_ID" => WIZARD_SITE_ID));

    //CModule::IncludeModule("search");
    //CSearch::ReIndexAll(false, 0, array(WIZARD_SITE_ID, WIZARD_SITE_DIR));


    $arUrlRewrite = array();
    if (file_exists(WIZARD_SITE_ROOT_PATH . "/urlrewrite.php")) {
        include(WIZARD_SITE_ROOT_PATH . "/urlrewrite.php");
    }

    $arNewUrlRewrite = array(
        5 =>
            array(
                'CONDITION' => '#^' . WIZARD_SITE_DIR . 'info/arrangement/#',
                'RULE' => '',
                'ID' => 'bitrix:news',
                'PATH' => WIZARD_SITE_DIR . 'info/arrangement/index.php',
                'SORT' => 100,
            ),
        3 =>
            array(
                'CONDITION' => '#^' . WIZARD_SITE_DIR . 'info/articles/#',
                'RULE' => '',
                'ID' => 'bitrix:news',
                'PATH' => WIZARD_SITE_DIR . 'info/articles/index.php',
                'SORT' => 100,
            ),
        17 =>
            array(
                'CONDITION' => '#^' . WIZARD_SITE_DIR . 'info/projects/#',
                'RULE' => '',
                'ID' => 'bitrix:news',
                'PATH' => WIZARD_SITE_DIR . 'info/projects/index.php',
                'SORT' => 100,
            ),
        20 =>
            array(
                'CONDITION' => '#^' . WIZARD_SITE_DIR . 'info/calc_new/#',
                'RULE' => '',
                'ID' => 'bitrix:news',
                'PATH' => WIZARD_SITE_DIR . 'info/calc_new/index.php',
                'SORT' => 100,
            ),
        25 =>
            array(
                'CONDITION' => '#^' . WIZARD_SITE_DIR . 'info/video/#',
                'RULE' => '',
                'ID' => 'bitrix:news',
                'PATH' => WIZARD_SITE_DIR . 'info/video/index.php',
                'SORT' => 100,
            ),
        23 =>
            array(
                'CONDITION' => '#^' . WIZARD_SITE_DIR . 'info/calc/#',
                'RULE' => '',
                'ID' => 'bitrix:news',
                'PATH' => WIZARD_SITE_DIR . 'info/calc/index.php',
                'SORT' => 100,
            ),
        24 =>
            array(
                'CONDITION' => '#^' . WIZARD_SITE_DIR . 'catalog/#',
                'RULE' => '',
                'ID' => 'bitrix:catalog',
                'PATH' => WIZARD_SITE_DIR . 'catalog/index.php',
                'SORT' => 100,
            ),
        15 =>
            array(
                'CONDITION' => '#^' . WIZARD_SITE_DIR . 'news/#',
                'RULE' => '',
                'ID' => 'bitrix:news',
                'PATH' => WIZARD_SITE_DIR . 'news/index.php',
                'SORT' => 100,
            ),
        0 =>
            array(
                'CONDITION' => '#^' . WIZARD_SITE_DIR . 'rest/#',
                'RULE' => '',
                'ID' => NULL,
                'PATH' => WIZARD_SITE_DIR . 'bitrix/services/rest/index.php',
                'SORT' => 100,
            ),
    );

    foreach ($arNewUrlRewrite as $arUrl) {
        if (!in_array($arUrl, $arUrlRewrite)) {
            CUrlRewriter::Add($arUrl);
        }
    }
}

function ___writeToAreasFile($fn, $text)
{
    if (file_exists($fn) && !is_writable($abs_path) && defined("BX_FILE_PERMISSIONS"))
        @chmod($abs_path, BX_FILE_PERMISSIONS);

    $fd = @fopen($fn, "wb");
    if (!$fd)
        return false;

    if (false === fwrite($fd, $text)) {
        fclose($fd);
        return false;
    }

    fclose($fd);

    if (defined("BX_FILE_PERMISSIONS"))
        @chmod($fn, BX_FILE_PERMISSIONS);
}

CheckDirPath(WIZARD_SITE_PATH . "include/");

$wizard =& $this->GetWizard();

___writeToAreasFile(WIZARD_SITE_PATH . "include/keywords.php", $wizard->GetVar("siteCopy"));
___writeToAreasFile(WIZARD_SITE_PATH . "include/copyright.php", $wizard->GetVar("siteCopy"));

___writeToAreasFile(WIZARD_SITE_PATH . "include/header_mail.php", $wizard->GetVar("siteEmail"));
___writeToAreasFile(WIZARD_SITE_PATH . "include/header_phone.php", $wizard->GetVar("sitePhone"));

$siteLogo = $wizard->GetVar("siteLogo");
//print_r($siteLogo);die();
if ($siteLogo > 0) {
    //установка логотипа
    $ff = CFile::GetByID($siteLogo);
    if ($zr = $ff->Fetch()) {
        $strOldFile = str_replace("//", "/", WIZARD_SITE_ROOT_PATH . "/" . (COption::GetOptionString("main", "upload_dir", "upload")) . "/" . $zr["SUBDIR"] . "/" . $zr["FILE_NAME"]);
        @copy($strOldFile, WIZARD_SITE_PATH . '/images/header_logo.png');
//        ___writeToAreasFile(WIZARD_SITE_PATH . "include/company_name.php", '<img src="' . WIZARD_SITE_DIR . 'include/logo.gif"  />');
        CFile::Delete($siteLogo);
    }

} elseif (!file_exists(WIZARD_SITE_PATH . "include_areas/company_name.php")) {
    copy(WIZARD_THEME_ABSOLUTE_PATH . "/lang/" . LANGUAGE_ID . "/logo.gif", WIZARD_SITE_PATH . "include/bx_default_logo.gif");
    //___writeToAreasFile(WIZARD_SITE_PATH . "include/company_name.php", '<img src="' . WIZARD_SITE_DIR . 'include/bx_default_logo.gif"  />');
}

//копирование компонента калькулятора
if (!file_exists(WIZARD_SITE_ROOT_PATH . "/bitrix/components/itertech/master_calc")) {
    CopyDirFiles(
        str_replace("//", "/", WIZARD_ABSOLUTE_PATH . "/site/services/components/itertech/master_calc"),
        WIZARD_SITE_ROOT_PATH . "/bitrix/components/itertech/master_calc",
        $rewrite = true,
        $recursive = true,
        $delete_after_copy = false
    );
}

//копирать файл для страницы админ раздела
copy(WIZARD_ABSOLUTE_PATH . '/site/services/modules/arstore_doc.php', WIZARD_SITE_ROOT_PATH . '/bitrix/admin/arstore_doc.php');

//if (!file_exists(WIZARD_SITE_ROOT_PATH . "/bitrix/modules/itertech.cart")) {
    CopyDirFiles(WIZARD_ABSOLUTE_PATH . '/site/services/modules/itertech.cart/', WIZARD_SITE_ROOT_PATH . '/bitrix/modules/itertech.cart/', true, true, false);
//}


if (WIZARD_INSTALL_DEMO_DATA) {
    CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH . "/.section.php", array("SITE_DESCRIPTION" => htmlspecialcharsbx($wizard->GetVar("siteMetaDescription"))));
    CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH . "/.section.php", array("SITE_KEYWORDS" => htmlspecialcharsbx($wizard->GetVar("siteMetaKeywords"))));
    CWizardUtil::ReplaceMacros(WIZARD_SITE_PATH . "/.section.php", array("SITE_TITLE" => htmlspecialcharsbx($wizard->GetVar("siteTitle"))));
}

//сохранение соцсетей
$socAr = [
    'social_fb' => $wizard->GetVar("siteSocFB"),
    'social_vk' => $wizard->GetVar("siteSocVK"),
    'social_ig' => $wizard->GetVar("siteSocIG"),
    'social_tw' => $wizard->GetVar("siteSocTW"),
    'social_yt' => $wizard->GetVar("siteSocYT"),
    'social_ok' => $wizard->GetVar("siteSocOK"),
    'social_tg' => $wizard->GetVar("siteSocTG"),
];
$socArRes = [];
foreach ($socAr as $key => $item) {
    if ($item != '')
        $socArRes[$key] = $item;
}
unset($key, $item);
if (count($socArRes))
    file_put_contents(WIZARD_SITE_PATH . "/assets/json/socialNetwork.json", json_encode($socArRes, JSON_UNESCAPED_UNICODE));

if ($wizard->GetVar("siteNameOrg"))
    COption::SetOptionString("header_action", "entity_name", $wizard->GetVar("siteNameOrg"));

?>