<?php
$masterCalcConfiguration = array(
    'uniqueCalcId' => 'calc_6',
    'items' => array(
        array(
            'id' => '3',
            'type' => 'field',
            'fieldType' => 'text',
            'attributes' => '  ',
            'name' => 'Dl',
            'title' => GetMessage("ARLIGHT_ARSTORE_DLINA_LENTY_M"),
            'inputClass' => 'input-with-btns',
            'defaultValue' => '1',
            'visible' => false

        ),

        array(
            'id' => '0',
            'type' => 'field',
            'fieldType' => 'select',
            'name' => 'U',
            'attributes' => 'data-select-type="params" data-select-block',
            'title' => GetMessage("ARLIGHT_ARSTORE_NAPRYAZHENIE_PITANIYA"),
            'values' => array(
                array('5', '5 ' . GetMessage("ARLIGHT_ARSTORE_V")),
                array('12', '12 ' . GetMessage("ARLIGHT_ARSTORE_V")),
                array('24', '24 ' . GetMessage("ARLIGHT_ARSTORE_V")),
                array('36', '36 ' . GetMessage("ARLIGHT_ARSTORE_V")),
                array('48', '48 ' . GetMessage("ARLIGHT_ARSTORE_V")),
            ),
            'defaultValue' => '24',
            'inputClass' => 'calc-block__input--dark'
        ),

        array(
            'id' => '2',
            'type' => 'field',
            'fieldType' => 'text',
            'name' => 'Pm',
            'attributes' => 'data-select-type="params" data-select-block',
            'title' => GetMessage("ARLIGHT_ARSTORE_MOSNOSTQ_LENTY_VT_M"),
            'inputClass' => 'input-with-btns'

        ),

        array(
            'id' => '1',
            'type' => 'field',
            'fieldType' => 'text',
            'name' => 'L',
            'title' => GetMessage("ARLIGHT_ARSTORE_DLINA_KABELA_OT_BLOK"),
            'inputClass' => 'input-with-btns',
            'defaultValue' => '1',
            'visible' => false

        ),

        array(
            'id' => 'art',
            'type' => 'field',
            'fieldType' => 'search_product',
            'name' => 'item_number',
            'attributes' => 'data-select-type="article" data-select-block',
            'title' => GetMessage("ARLIGHT_ARSTORE_NAYTI_PO_ARTIKULU"),
            'defaultValue' => '',
            'onCalculation' => 'calc_6_findProductByItemNumber',
            'validation' => array(
                'no_validation',
            ),
            'inputClass' => 'calc-block__input--dark'
        ),

        array(
            'id' => '8',
            'type' => 'field',
            'fieldType' => 'select',
            'name' => 'calc_type',
            'attributes' => 'data-select-type="article" data-select-block',
            'title' => GetMessage("ARLIGHT_ARSTORE_TIP_RASCHETA"),
            'values' => array(
                array('0', GetMessage("ARLIGHT_ARSTORE_TIP_TOCHNII")),
                array('1', GetMessage("ARLIGHT_ARSTORE_TIP_DOPUSTIMII")),
            ),
            'defaultValue' => '1',
            'inputClass' => 'calc-block__input--dark'
        ),

        array(
            'id' => '31',
            'type' => 'formula',
            'name' => 'P',
            'title' => GetMessage("ARLIGHT_ARSTORE_OBSAA_MOSNOSTQ_LENTY"),
            'formula' => '[Pm] * [Dl]',
        ),

        array(
            'id' => '4',
            'showHideFlag' => '1',
            'type' => 'formula',
            'name' => 'S',
            'title' => GetMessage("ARLIGHT_ARSTORE_VYCISLENNOE_MINIMALQ").'<sup>2</sup>',
            'formula' => '2 * ((0.017 * [P] * [L]) / ([U] * 1))',
            'onCalculation' => 'calc_6_S_Recom',
            'visible' => false
        ),

        array(
            'id' => '5',
            'showHideFlag' => '1',
            'type' => 'field',
            'fieldType' => 'text',
            'attributes' => ' readonly="readonly" ',
            'name' => 'Srec',
            'title' => GetMessage("ARLIGHT_ARSTORE_REKOMENDUEMOE_STANDA"),
            'defaultValue' => '',
            'visible' => false
        ),

        array(
            'id' => '6',
            'type' => 'field',
            'fieldType' => 'text',
            'attributes' => ' readonly="readonly" ',
            'name' => 'Sr',
            'title' => GetMessage("ARLIGHT_ARSTORE_VYCISLENNOE_MINIMALQ1"),
            'unit' => GetMessage("ARLIGHT_ARSTORE_MM"),
            'defaultValue' => '',
            'onCalculation' => 'calc_6_functionAddFinalText1'
        ),

        array(
            'id' => '7',
            'type' => 'field',
            'fieldType' => 'text',
            'attributes' => ' readonly="readonly" ',
            'name' => 'Srecr',
            'title' => GetMessage("ARLIGHT_ARSTORE_REKOMENDUEMOE_STANDA"),
            'unit' => GetMessage("ARLIGHT_ARSTORE_MM"),
            'defaultValue' => '',
            'onCalculation' => 'calc_6_functionAddFinalText2'
        ),
        array(
            'id' => '9',
            'showHideFlag' => '1',
            'type' => 'field',
            'fieldType' => 'text',
            'attributes' => '',
            'name' => 'ledsPerSec',
            'title' => GetMessage("ARLIGHT_ARSTORE_KOLVO_SVETODIOD"),
            'defaultValue' => '',
            'visible' => false
        ),
    ),
);

function calc_6_functionAddFinalText1($index, &$items)
{
    $item = &$items[$index];
    foreach ($items as $k => $v) {
        if ($v['name'] == 'S') {
            $item['result'] = round($v['result'], 3);
            break;
        }
    }
}

function calc_6_functionAddFinalText2($index, &$items)
{
    $item = &$items[$index];
    foreach ($items as $k => $v) {
        if ($v['name'] == 'Srec') {
            $item['result'] = $v['result'];
            break;
        }
    }
}

function calc_6_S_Recom($index, &$items)
{
    if ($items[$index]['result'] != '') {
        $s = $items[$index]['result'];
        if ($s < 0) {
            $items[$index]['result'] = 0;
            $s = 0;
        }
        $s = (float)$s;
        $recomS = 0;
        $standartSizes = array(0.25, 0.5, 0.75, 1, 1.5, 2, 2.5, 4, 6, 10, 16, 25, 35, 50, 70, 95, 120);
        foreach ($standartSizes as $size) {
            if ($s <= $size) {
                $recomS = $size;
                break;
            }
        }
        if ($recomS == 0) {
            $recomS = $standartSizes[count($standartSizes) - 1];
        }
        foreach ($items as $k => $v) {
            if ($v['name'] == 'Srec') {
                $items[$k]['result'] = $recomS;
            }
        }
    }
}

function calc_6_findProductByItemNumber($index, &$items)
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
            if ($v['name'] == 'U') {
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
                    include $_SERVER['DOCUMENT_ROOT'] . '/bitrix/templates/.default/includes/products_list_with_filter_for_calc.php';
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