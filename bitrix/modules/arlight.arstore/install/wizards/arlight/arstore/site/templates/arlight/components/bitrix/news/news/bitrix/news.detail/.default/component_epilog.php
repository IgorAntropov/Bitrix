<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
use Bitrix\Main\Page\Asset;
/** @var array $templateData */
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

$previewImg = $arResult['OG_IMG'];
if ($previewImg) {
    global $customOgImg;
    $customOgImg = true;
    Asset::getInstance()->addString('<meta property="og:image" content="https://' . SITE_SERVER_NAME . $previewImg . '"/>
    <meta property="vk:image" content="https://' . SITE_SERVER_NAME . $previewImg . '">
    <meta property="twitter:image" content="https://' . SITE_SERVER_NAME . $previewImg . '">
    <meta name="relap-image" content="https://' . SITE_SERVER_NAME . $previewImg . '">
    <link href="https://' . SITE_SERVER_NAME . $previewImg . '" itemprop="image">
    ');
}
$previewText = $arResult['OG_TEXT'];
if ($previewText) {
    global $customOgDescr;
    $customOgDescr = true;
    Asset::getInstance()->addString('<meta property="og:description" content="' . $previewText . '"/>');
}