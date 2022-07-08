<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$deliveryPrice = WorkCart::numberFormatWithDot($arDelivery['PRICE']);
$allSummOrder = WorkCart::numberFormatWithDot($arTotalCart['SUMM_MATH'] + $arDelivery['PRICE']);
$summText = GetMessage("ARLIGHT_ARSTORE_SUMMA");

$ORDER_LIST = '
<table border="1" bordercolor="#989898" cellpadding="1" cellspacing="0" style="border-collapse: collapse; border-spacing: 0;">
<tbody>
    <tr style="background-color:#e9e9e9">
        <th width="25">'.GetMessage("ARLIGHT_ARSTORE_").'</th>
    </tr>
';
$cnt = 1;
foreach ($arProducts as $key => $PRODUCT) {

    $ORDER_LIST .= '
    <tr>
        <td align="center">' . $cnt . '</td>
        <td align="center">' . $PRODUCT['ARTNUMBER'] . '</td>
        <td>
            <br>
            <a href="https://' . SITE_SERVER_NAME . $PRODUCT['DETAIL_PAGE_URL'] . '">' . $PRODUCT['NAME'] . '</a>
            <br>
            <br>
        </td>
        <td align="center" nowrap="">' . $PRODUCT['PACKAGE_COUNT'] . '</td>
        <td align="center" nowrap="">' . $PRODUCT['QUANTITY'] . '</td>
        <td align="center">' . $PRODUCT['UNIT'] . '</td>
        <td align="center" nowrap="nowrap">
        ' . $PRODUCT['PRICE_MATH'] . '<br>
        <span><s>' . $PRODUCT['OLDPRICE_MATH'] . '</s></span>
        </td>
        <td align="center" nowrap="nowrap">
        ' . $PRODUCT['SUMM_MATH'] . '<br>
        <span><s>' . $PRODUCT['OLDSUMM_MATH'] . '</s></span>
        </td>
        <td align="center">' . $PRODUCT['INSTOCK'] . '</td>
    </tr>
    ';
    $cnt++;
}

if ($arTotalCart['OLDSUMM'] && $arTotalCart['OLDSUMM_MATH'] > 0) {
    $ORDER_LIST .= '
    <tr border="0">
        <td colspan="3" bgcolor="#f6f6f6">&nbsp;</td>
        <td colspan="4" align="left" bgcolor="#f6f6f6"><b>'.GetMessage("ARLIGHT_ARSTORE_SUMMA").'</b></td>
        <td colspan="2" align="right" bgcolor="#f6f6f6" nowrap=""><b>' . WorkCart::numberFormatWithDot($arTotalCart['OLDSUMM_MATH']) . '</b></td>
    </tr>
';
}

if($arTotalCart['DISCOUNT_TYPE']){
    $ORDER_LIST .= '
    <tr border="0">
        <td colspan="3" bgcolor="#f6f6f6">&nbsp;</td>
        <td colspan="4" align="left" bgcolor="#f6f6f6"><b>'.GetMessage("ARLIGHT_ARSTORE_TIP_SKIDKI").'</b></td>
        <td colspan="2" align="right" bgcolor="#f6f6f6" nowrap=""><b>' . WorkOrder::getDiscountType($arTotalCart['DISCOUNT_TYPE'], $arTotalCart['PROMOCODE']) . '</b></td>
    </tr>
    <tr border="0">
        <td colspan="3" bgcolor="#f6f6f6">&nbsp;</td>
        <td colspan="4" align="left" bgcolor="#f6f6f6"><b>'.GetMessage("ARLIGHT_ARSTORE_SKIDKA_KLIENTA").'</b></td>
        <td colspan="2" align="right" bgcolor="#f6f6f6" nowrap=""><b>' . $arTotalCart['DISCOUNT_PERCENT_MATH'].(($arTotalCart['DISCOUNT_PERCENT_MATH_DOP']) ? ' + '.$arTotalCart['DISCOUNT_PERCENT_MATH_DOP'] : '' ). '%</b></td>
    </tr>
    <tr border="0">
        <td colspan="3" bgcolor="#f6f6f6">&nbsp;</td>
        <td colspan="4" align="left" bgcolor="#f6f6f6"><b>'.GetMessage("ARLIGHT_ARSTORE_SKIDKA_V_RUBLAH").'</b></td>
        <td colspan="2" align="right" bgcolor="#f6f6f6" nowrap=""><b>' . WorkCart::numberFormatWithDot($arTotalCart['DISCOUNT_SUMM_MATH']+$arTotalCart['DISCOUNT_SUMM_DOP_MATH']). '</b></td>
    </tr>
';

    $summText=GetMessage("ARLIGHT_ARSTORE_SUMMA_SO_SKIDKOY");
}

if ($arTotalCart['DISCOUNT_SUMM'] && $arTotalCart['DISCOUNT_SUMM_MATH'] > 0 && !$arTotalCart['DISCOUNT_TYPE']) {
    $ORDER_LIST .= '
    <tr border="0">
        <td colspan="3" bgcolor="#f6f6f6">&nbsp;</td>
        <td colspan="4" align="left" bgcolor="#f6f6f6"><b>'.GetMessage("ARLIGHT_ARSTORE_SKIDKA").'</b></td>
        <td colspan="2" align="right" bgcolor="#f6f6f6" nowrap=""><b>' . $arTotalCart['DISCOUNT_SUMM_MATH'] . '</b></td>
    </tr>
';
    $summText=GetMessage("ARLIGHT_ARSTORE_SUMMA_SO_SKIDKOY");
}


$ORDER_LIST .= '
    <tr border="0">
        <td colspan="3" bgcolor="#f6f6f6">&nbsp;</td>
        <td colspan="4" align="left" bgcolor="#f6f6f6"><b>' . $summText . '</b></td>
        <td colspan="2" align="right" bgcolor="#f6f6f6" nowrap=""><b>' . $arTotalCart['SUMM_MATH'] . '</b></td>
    </tr>
    <tr>
        <td colspan="3" bgcolor="#f6f6f6">&nbsp;</td>
        <td colspan="4" align="left" bgcolor="#f6f6f6"><b>' . $arDelivery['NAME'] . ':</b></td>
        <td colspan="2" align="right" bgcolor="#f6f6f6" nowrap=""><b>' . $deliveryPrice . '</b></td>
    </tr>		
    <tr>
        <td colspan="3" bgcolor="#f6f6f6">&nbsp;</td>
        <td colspan="4" align="left" bgcolor="#f6f6f6"><b>'.GetMessage("ARLIGHT_ARSTORE_ITOGO").'</b></td>
        <td colspan="2" align="right" bgcolor="#f6f6f6" nowrap=""><b>' . $allSummOrder . '</b></td>
    </tr>
    </tbody>
</table>
';

return $ORDER_LIST;