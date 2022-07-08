<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="news news_catalog <?= ($arResult["NAV_STRING"] ? '' : 'news_mb') ?>">
    <div class="row">
        <? foreach ($arResult["ITEMS"] as $arItem): ?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
            <? $titleDownload = str_replace('.', ',', str_replace(['_', '~', '#', '%', '&', '*', '{', '}', '\\', '|', '/', ':', ';', '"', '\'', '+', '=', '&', '!', '@', '<', '>', '[', ']'], '', $arItem['NAME'])); ?>

            <div class="col-lg-4 col-xl-3 col-md-6" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                <div class="news-item">
                    <div class="news-item__img">
                        <? if ($arResult['CODE'] == 'CERTIFICATES_FROM_BASE'){
                            $fileArray = \CFile::GetFileArray((int)$arItem['PROPERTIES']['FILE']['VALUE']);
                            $arItem['DISPLAY_PROPERTIES']['DOCUMENT']['FILE_VALUE']['SRC'] = $fileArray['SRC'];
                            $arItem['DISPLAY_PROPERTIES']['DOCUMENT']['FILE_VALUE']['FILE_SIZE'] = $fileArray['FILE_SIZE'];
                        }?>
                        <a href="<?= $arItem['DISPLAY_PROPERTIES']['DOCUMENT']['FILE_VALUE']['SRC'] ?>" target="_blank" download="<?= $titleDownload; ?>"></a>

                        <? if ($arResult['CODE'] == 'CERTIFICATES_FROM_BASE'): ?>
                            <?
                            $pictureName = false;
                            if(stristr(trim($arItem['NAME']), GetMessage("ARLIGHT_ARSTORE_DEKLARACIA"))){
                                $pictureName = 'declaration.jpg';
                            }elseif(stristr(trim($arItem['NAME']), GetMessage("ARLIGHT_ARSTORE_OTKAZNOE"))){
                                $pictureName = 'exemption.jpg';
                            }elseif(stristr(trim($arItem['NAME']), GetMessage("ARLIGHT_ARSTORE_SERTIFIKAT"))){
                                $pictureName = 'certificate.jpg';
                            }
                            if($pictureName):
                                ?>
                                <img class="full-width" src="<?= SITE_DIR ?>assets/static/certificate-img/<?= $pictureName ?>"
                                     alt="<? echo $arItem["NAME"] ?>">
                            <? endif; ?>
                        <? else: ?>
                            <? if ($arItem["PREVIEW_PICTURE"]): ?>
                                <img src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" alt="<? echo $arItem["NAME"] ?>">
                            <? else: ?>
                                <img src="<?= SITE_TEMPLATE_PATH ?>/img/default-img.jpg" alt="<? echo $arItem["NAME"] ?>">
                            <? endif; ?>
                        <? endif; ?>
                    </div>
                    <a href="<?= $arItem['DISPLAY_PROPERTIES']['DOCUMENT']['FILE_VALUE']['SRC'] ?>" class="news-item__title" target="_blank" download="<?= $titleDownload; ?>"><span><? echo $arItem["NAME"] ?></span></a>
                    <div class="news-item__text"><?= $arItem["PREVIEW_TEXT"] ?></div>
                    <? if ($arItem['DISPLAY_PROPERTIES']['DOCUMENT']): ?>
                        <div class="news-item__download">
                            <a href="<?= $arItem['DISPLAY_PROPERTIES']['DOCUMENT']['FILE_VALUE']['SRC'] ?> "
                               class="news-item__download-link" title="<?=GetMessage("ARLIGHT_ARSTORE_SKACATQ")?><?= $titleDownload; ?>">
                                <span class="news-item__download-text"><?=GetMessage("ARLIGHT_ARSTORE_SKACATQ1")?></span>
                                <span class="news-item__download-size"><?= round($arItem['DISPLAY_PROPERTIES']['DOCUMENT']['FILE_VALUE']['FILE_SIZE'] / 1000000, 1) ?>
                                    M<?=GetMessage("ARLIGHT_ARSTORE_B")?></span>
                            </a>
                        </div>
                    <? endif; ?>
                </div>
            </div>
        <? endforeach; ?>
        <div class="col-12">
            <?= $arResult["NAV_STRING"] ?>
        </div>
    </div>
</div>
