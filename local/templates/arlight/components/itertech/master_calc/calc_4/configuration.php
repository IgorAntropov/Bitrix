<?php
$masterCalcConfiguration = array(
    'uniqueCalcId' => 'calc_4',
    'items' => array(
        array(
            'id' => '0_1',
            'type' => 'field',
            'fieldType' => 'text',
            'name' => 'Dl',
            'attributes' => ' ',
            'title' => GetMessage("ARLIGHT_ARSTORE_DLINA_LENTY_M"),
            'inputClass' => 'input-with-btns'

        ),

        array(
            'id' => '0',
            'type' => 'field',
            'fieldType' => 'text',
            'name' => 'Pm',
            'attributes' => '',
            'title' => GetMessage("ARLIGHT_ARSTORE_MOSNOSTQ_LENTY_VT_M"),
            'inputClass' => 'input-with-btns'

        ),

        array(
            'id' => '1',
            'type' => 'field',
            'fieldType' => 'text',
            'name' => 'L',
            'title' => GetMessage("ARLIGHT_ARSTORE_DLINA_KABELA_OT_BLOK"),
            'inputClass' => 'input-with-btns'

        ),

        array(
            'id' => '3',
            'type' => 'field',
            'fieldType' => 'text',
            'name' => 'S',
            'title' => GetMessage("ARLIGHT_ARSTORE_SECENIE_PROVODA_MM"),
            'inputClass' => 'input-with-btns'

        ),

        array(
            'id' => '2',
            'type' => 'field',
            'fieldType' => 'text',
            'name' => 'Uvh',
            'title' => GetMessage("ARLIGHT_ARSTORE_NAPRAJENIE_BLOKA_PIT"),
            'inputClass' => 'input-with-btns'

        ),

        array(
            'id' => 'art',
            'type' => 'field',
            'fieldType' => 'search_product',
            'name' => 'item_number',
            'attributes' => '',
            'title' => GetMessage("ARLIGHT_ARSTORE_NAYTI_PO_ARTIKULU"),
            'defaultValue' => '',
            'onCalculation' => 'calc_4_findProductByItemNumber',
            'validation' => array(
                'no_validation',
            ),
            'inputClass' => 'calc-block__input--dark'
        ),

        array(
            'id' => '0_1_1',
            'type' => 'formula',
            'name' => 'P',
            'title' => GetMessage("ARLIGHT_ARSTORE_OBSAA_MOSNOSTQ_LENTY"),
            'formula' => '[Pm] * [Dl]',
        ),

        array(
            'id' => '4',
            'showHideFlag' => '1',
            'type' => 'formula',
            'name' => 'Uvih',
            'title' => GetMessage("ARLIGHT_ARSTORE_NAPRAJENIE_NA_VYHODE"),
            'formula' => '[Uvh]-4*(0,017*[P]*[L])/(3*[Uvh]*[S])',
            'visible' => false
        ),

        array(
            'id' => '5',
            'type' => 'field',
            'fieldType' => 'text',
            'attributes' => ' readonly="readonly" ',
            'name' => 'Uvihr',
            'title' => GetMessage("ARLIGHT_ARSTORE_NAPRAJENIE_NA_VYHODE1"),
            'unit' => GetMessage("ARLIGHT_ARSTORE_V"),
            'defaultValue' => '',
            'onCalculation' => 'calc_4_functionAddFinalText'
        ),
    ),
);

function calc_4_functionAddFinalText($index, &$items)
{
    $item = &$items[$index];
    foreach ($items as $k => $v) {
        if ($v['name'] == 'Uvih') {
            $item['result'] = round($v['result'], 3);
            break;
        }
    }
}

function calc_4_findProductByItemNumber($index, &$items)
{
    global $DB;
    if (CModule::IncludeModule('iblock') && $items[$index]['result'] != '') {
        $P = false;
        $U = false;
        $Dl = false;

        foreach ($items as $k => $v) {
            if ($v['name'] == 'Pm') {
                $P = &$items[$k];
            }
            if ($v['name'] == 'Uvh') {
                $U = &$items[$k];
            }
            if ($v['name'] == 'Dl') {
                $Dl = &$items[$k];
            }
        }

        $itemNumber = $DB->ForSql(trim($items[$index]['result']));
        $res = CIBlockElement::GetList(
            array('SORT' => 'ASC'),
            array(
                'IBLOCK_TYPE' => 'catalog',
                'IBLOCK_CODE' => 'catalog',
                'IBLOCK_ID' => CATALOG_ID,
                'ACTIVE' => 'Y',
                'PROPERTY_ARTICLE' => '%' . $itemNumber,
                'SECTION_ID' => GetIdSectionFromXmlId(SECTION_SL_XML_ID),
                'INCLUDE_SUBSECTIONS' => 'Y'
            ),
            false,
            false,
            array('ID', 'NAME', 'DETAIL_PAGE_URL', 'PROPERTY_ARTICLE', 'PROPERTY_N_35', 'PROPERTY_N_20', 'PROPERTY_C_47')
        );
        if ($res) {
            $els = array();
            while ($el = $res->GetNext($res)) {
                $els[] = $el;
            }
            if (count($els)) {
                $n35 = array();
                $n20 = array();
                $n47 = array();
                foreach ($els as $el) {
                    if ($el['PROPERTY_N_35_VALUE'] != '') {
                        $n35[] = $el['PROPERTY_N_35_VALUE'];
                    }
                    if ($el['PROPERTY_N_20_VALUE'] != '') {
                        $n20[] = $el['PROPERTY_N_20_VALUE'];
                    }
                    if ($el['PROPERTY_C_47_VALUE'] != '') {
                        $n47[] = $el['PROPERTY_C_47_VALUE'];
                    }
                }

                if (count($n35) && count($n20) && count($n47)) {
                    $resultN35 = min($n35);
                    $resultN20 = min($n20);
                    $resultN47 = min($n47);

                    $P['result'] = $resultN35 / ($resultN47 / 1000);
                    $P['attributes'] = ' readonly="readonly" ';
                    $U['result'] = $resultN20;
                    $U['attributes'] = ' readonly="readonly" ';

                    if ($Dl['result'] == 1 || $Dl['result'] == '') {
                        $Dl['result'] = 1;
                        $Dl['attributes'] = '  ';
                    }

                    $addToFilter = array(
                        'PROPERTY_ARTICLE' => $els[0]['PROPERTY_ARTICLE_VALUE']

                    );

                    /*
                    ob_start();
                    include $_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH.'/components/itertech/master_calc/products_list_with_filter_for_calc.php';
                    $buffContent = ob_get_contents();
                    ob_end_clean();
                    */

                    $items[$index]['messages'][]['ONE_LINE'] = json_encode($addToFilter);
                } else {
                    $P['result'] = '';
                    $P['attributes'] = '';
                    $U['result'] = '';
                    $U['attributes'] = '';
                    $Dl['result'] = '';
                    $Dl['attributes'] = '';

                    $items[$index]['errors'][] = GetMessage("ARLIGHT_ARSTORE_TOVAR").'<a href="' . $els[0]['DETAIL_PAGE_URL'] . '" target="_blank">' . $els[0]['NAME'] . '</a> '.GetMessage("ARLIGHT_ARSTORE_NAYDEN_NO_U_NEGO_NE");
                }
            } else {
                $P['result'] = '';
                $P['attributes'] = '';
                $U['result'] = '';
                $U['attributes'] = '';
                $Dl['result'] = '';
                $Dl['attributes'] = '';

                $items[$index]['errors'][] = GetMessage("ARLIGHT_ARSTORE_TOVAR_NE_NAYDEN");
            }
        } else {
            $P['result'] = '';
            $P['attributes'] = '';
            $U['result'] = '';
            $U['attributes'] = '';
            $Dl['result'] = '';
            $Dl['attributes'] = '';
            $items[$index]['errors'][] = GetMessage("ARLIGHT_ARSTORE_OSIBKA_CTO_TO_POSLO");
        }
    }
}