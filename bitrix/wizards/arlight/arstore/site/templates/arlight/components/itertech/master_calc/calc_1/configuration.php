<?php
$masterCalcConfiguration = array(
    'uniqueCalcId' => 'calc_1',
    'items' => array(
        array(
            'id' => 'SELECT_TYPE',
            'type' => 'field',
            'fieldType' => 'select',
            'name' => 'SELECT_TYPE',
            'attributes' => 'data-select onchange="changeSelectType(event, \'data-select-type\', \'data-select-block\')"',
            'title' => GetMessage("ARLIGHT_ARSTORE_TIP_POISKA"),
            'values' => array(
                array('article', GetMessage("ARLIGHT_ARSTORE_PO_ARTIKULU")),
                array('params', GetMessage("ARLIGHT_ARSTORE_PO_PARAMETRAM")),
            ),
        ),

        array(
            'id' => '1',
            'type' => 'field',
            'fieldType' => 'text',
            'name' => 'F',
            'attributes' => 'data-select-type="params" data-select-block',
            'title' => GetMessage("ARLIGHT_ARSTORE_SVETOVOY_POTOK_LM"),
            'inputClass' => 'input-with-btns'

        ),

        array(
            'id' => '2',
            'type' => 'field',
            'fieldType' => 'text',
            'name' => 'f',
            'attributes' => 'data-select-type="params" data-select-block',
            'title' => GetMessage("ARLIGHT_ARSTORE_UGOL_OSVESENIA"),
            'inputClass' => 'input-with-btns'

        ),

        array(
            'id' => '3',
            'type' => 'field',
            'fieldType' => 'text',
            'name' => 'H',
            'title' => GetMessage("ARLIGHT_ARSTORE_RASSTOANIE_OT_SVETIL"),
            'inputClass' => 'input-with-btns'

        ),

        array(
            'id' => '0',
            'type' => 'field',
            'fieldType' => 'search_product',
            'name' => 'item_number',
            'attributes' => 'data-select-type="article" data-select-block',
            'title' => GetMessage("ARLIGHT_ARSTORE_NAYTI_PO_ARTIKULU"),
            'defaultValue' => '',
            'onCalculation' => 'calc_1_findProductByItemNumber',
            'validation' => array(
                'no_validation',
            ),
            'inputClass' => 'calc-block__input--dark'
        ),

        array(
            'id' => '4',
            'showHideFlag' => '1',
            'type' => 'formula',
            'name' => 'D',
            'title' => GetMessage("ARLIGHT_ARSTORE_DIAMETR_SVETOVOGO_PA"),
            'formula' => '2*[H]*tan(([f]*0,017444)/2)',
            'visible' => false
        ),

        array(
            'id' => '5',
            'showHideFlag' => '1',
            'type' => 'formula',
            'name' => 'S',
            'title' => GetMessage("ARLIGHT_ARSTORE_PLOSADQ_SVETOVOGO_PA"),
            'formula' => '3.14*[D]*[D]/4',
            'visible' => false
        ),

        array(
            'id' => '6',
            'showHideFlag' => '1',
            'type' => 'formula',
            'name' => 'E',
            'title' => GetMessage("ARLIGHT_ARSTORE_OSVESENNOSTQ_LK"),
            'formula' => '[F]/[S]',
            'visible' => false
        ),

        array(
            'id' => '7',
            'type' => 'field',
            'fieldType' => 'text',
            'attributes' => ' readonly="readonly" ',
            'name' => 'Dr',
            'title' => GetMessage("ARLIGHT_ARSTORE_DIAMETR_SVETOVOGO_PA1"),
            'defaultValue' => '',
            'unit' => GetMessage("ARLIGHT_ARSTORE_SM"),
            'onCalculation' => 'calc_1_functionAddFinalText1'
        ),
        array(
            'id' => '8',
            'type' => 'field',
            'fieldType' => 'text',
            'attributes' => ' readonly="readonly" ',
            'name' => 'Er',
            'title' => GetMessage("ARLIGHT_ARSTORE_OSVESENNOSTQ_LK"),
            'defaultValue' => '',
            'unit' => GetMessage("ARLIGHT_ARSTORE_LK"),
            'onCalculation' => 'calc_1_functionAddFinalText2'
        ),
    ),
);

function calc_1_functionAddFinalText1($index, &$items)
{
    $item = &$items[$index];
    foreach ($items as $k => $v) {
        if ($v['name'] == 'D') {
            $tmpValue = $v['result'];
            $tmpValue = $tmpValue * 100;
            $item['result'] = round($tmpValue);
            break;
        }
    }
}

function calc_1_functionAddFinalText2($index, &$items)
{
    $item = &$items[$index];
    foreach ($items as $k => $v) {
        if ($v['name'] == 'E') {
            $tmpValue = $v['result'];
            $item['result'] = round($tmpValue);
            break;
        }
    }
}

function calc_1_findProductByItemNumber($index, &$items)
{
    global $DB;
    if (CModule::IncludeModule('iblock') && $items[$index]['result'] != '') {
        $F = false;
        foreach ($items as $k => $v) {
            if ($v['name'] == 'F') {
                $F = &$items[$k];
            }
        }

        $f = false;
        foreach ($items as $k => $v) {
            if ($v['name'] == 'f') {
                $f = &$items[$k];
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
                'SECTION_ID' => GetIdSectionFromXmlId(SECTION_SS_XML_ID),
                'INCLUDE_SUBSECTIONS' => 'Y'
            ),
            false,
            false,
            array('ID', 'NAME', 'DETAIL_PAGE_URL', 'PROPERTY_ARTICLE', 'PROPERTY_N_8', 'PROPERTY_N_5')
        );

        if ($res) {
            $els = array();
            while ($el = $res->GetNext($res)) {
                $els[] = $el;
            }
            if (count($els)) {
                $n8 = array();
                $n5 = array();
                foreach ($els as $el) {
                    if ($el['PROPERTY_N_8_VALUE'] != '') {
                        $n8[] = $el['PROPERTY_N_8_VALUE'];
                    }
                    if ($el['PROPERTY_N_5_VALUE'] != '' && !in_array($el['PROPERTY_N_5_VALUE'], $n5)) {
                        $n5[] = $el['PROPERTY_N_5_VALUE'];
                    }
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
                $f['result'] = $n5[0];
                $F['result'] = $n8[0];
                $items[$index]['messages'][]['ONE_LINE'] = json_encode($addToFilter);
            } else {
                $F['result'] = '';
//                $F['attributes'] = '';
//                $f['attributes'] = '';
                $items[$index]['errors'][] = GetMessage("ARLIGHT_ARSTORE_TOVAR_NE_NAYDEN");
            }
        } else {
            $F['result'] = '';
//            $F['attributes'] = '';
            $f['result'] = '';
//            $f['attributes'] = '';
            $items[$index]['errors'][] = GetMessage("ARLIGHT_ARSTORE_OSIBKA_CTO_TO_POSLO");
        }
    }
}





