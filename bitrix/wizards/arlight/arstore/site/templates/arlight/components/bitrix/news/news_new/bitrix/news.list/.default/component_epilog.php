<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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

$iblock_id = $arResult['ID'];

foreach ($arResult["ELEMENTS"] as $arItemId):
    $newsId = $arItemId;
    $valuelike = '';
    $valuedislike = '';
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
    ?>

    <script>
        <?if ($valuelike > 0) :?>
            var like = document.getElementById('like_<?=$newsId?>');
            like.innerHTML = '<?=$valuelike?>';
        <?endif;?>
        <?if ($valuedislike > 0) :?>
            var dislike = document.getElementById('dislike_<?=$newsId?>');
            dislike.innerHTML = '<?=$valuedislike?>';
        <?endif;?>
    </script>

<? endforeach; ?>

