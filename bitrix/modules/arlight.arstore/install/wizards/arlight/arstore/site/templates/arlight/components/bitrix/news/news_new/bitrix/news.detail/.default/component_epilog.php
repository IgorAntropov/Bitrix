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

$APPLICATION->SetPageProperty("description", $previewText);

$iblock_id = $arResult['IBLOCK_ID'];
$newsId = $arResult['ID'];

$db_propslike = CIBlockElement::GetProperty($iblock_id, $newsId, array("sort" => "asc"), Array("CODE" => "LIKE"));
$db_propsdislike = CIBlockElement::GetProperty($iblock_id, $newsId, array("sort" => "asc"), Array("CODE" => "DISLIKE"));
if ($ar_props = $db_propslike->Fetch())
    $valuelike = IntVal($ar_props["VALUE"]);
else
    $valuelike = 0;

if ($ar_props = $db_propsdislike->Fetch())
    $valuedislike = IntVal($ar_props["VALUE"]);
else
    $valuedislike = 0;

//echo '<pre>';
//print_r($valuelike);
//print_r($valuedislike);
//echo '</pre>';
 ?>

<script>
var like = document.getElementById('like_<?=$newsId?>');
like.innerHTML = '<?=$valuelike?>';
var dislike = document.getElementById('dislike_<?=$newsId?>');
dislike.innerHTML = '<?=$valuedislike?>';
</script>

