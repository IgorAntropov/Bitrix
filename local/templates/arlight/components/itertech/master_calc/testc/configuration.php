<?php
$masterCalcConfiguration = array(
    'uniqueCalcId' => 'testc',
    'items' => array(
        array(
            'id' => '0',
            'type' => 'field',
            'fieldType' => 'text',
            'name' => 'N',
            'attributes' => ' ',
            'title' => GetMessage("ARLIGHT_ARSTORE_KOLICESTVO_SVETILQNI"),
            'defaultValue' => '7',
        ),

        array(
            'id' => '1',
            'type' => 'field',
            'fieldType' => 'text',
            'name' => 'L',
            'title' => GetMessage("ARLIGHT_ARSTORE_DLINA_POMESENIA_M"),
            'defaultValue' => '5',
        ),

        array(
            'id' => '2',
            'type' => 'field',
            'fieldType' => 'text',
            'name' => 'W',
            'title' => GetMessage("ARLIGHT_ARSTORE_SIRINA_POMESENIA_M"),
            'defaultValue' => '4',
        ),

        array(
            'id' => '3',
            'type' => 'field',
            'fieldType' => 'text',
            'name' => 'H',
            'title' => GetMessage("ARLIGHT_ARSTORE_VYSOTA_POMESENIA_M"),
            'defaultValue' => '3',
        ),

        array(
            'id' => '4',
            'showHideFlag' => '1',
            'type' => 'formula',
            'name' => 'i',
            'title' => GetMessage("ARLIGHT_ARSTORE_INDEKS_FORMY_POMESEN"),
            'formula' => '[L]*[W]/(([H]-0.8)*([L]+[W]))'
        ),

        array(
            'id' => '5',
            'type' => 'field',
            'fieldType' => 'select',
            'attributes' => '  ',
            'name' => 'TonPot',
            'title' => GetMessage("ARLIGHT_ARSTORE_TON_POTOLKA"),
            'values' => array(
                array('70', GetMessage("ARLIGHT_ARSTORE_BELYY")),
                array('50', GetMessage("ARLIGHT_ARSTORE_SVETLYY")),
                array('30', GetMessage("ARLIGHT_ARSTORE_SERYY")),
            ),
            'defaultValue' => '70'
        ),

        array(
            'id' => '6',
            'type' => 'field',
            'fieldType' => 'select',
            'attributes' => '  ',
            'name' => 'TonSten',
            'title' => GetMessage("ARLIGHT_ARSTORE_TON_STEN"),
            'values' => array(
                array('50', GetMessage("ARLIGHT_ARSTORE_SVETLYY")),
                array('30', GetMessage("ARLIGHT_ARSTORE_SERYY")),
                array('10', GetMessage("ARLIGHT_ARSTORE_TEMNYY")),
            ),
            'defaultValue' => '50'
        ),

        array(
            'id' => '7',
            'type' => 'field',
            'fieldType' => 'select',
            'attributes' => '  ',
            'name' => 'TonPol',
            'title' => GetMessage("ARLIGHT_ARSTORE_TON_POLA"),
            'values' => array(
                array('30', GetMessage("ARLIGHT_ARSTORE_SERYY")),
                array('10', GetMessage("ARLIGHT_ARSTORE_TEMNYY")),

            ),
        ),

        array(
            'id' => '8',
            'showHideFlag' => '1',
            'type' => 'field',
            'fieldType' => 'text',
            'attributes' => 'readonly="readonly"',
            'name' => 'n',
            'title' => GetMessage("ARLIGHT_ARSTORE_KOEFFICIENT_ISPOLQZO"),
            'defaultValue' => '',
            'onCalculation' => 'calc_testc_functionNDefine2'
        ),

        array(
            'id' => '9',
            'showHideFlag' => '1',
            'type' => 'field',
            'fieldType' => 'text',
            'attributes' => 'readonly="readonly"',
            'name' => 'Kz',
            'title' => GetMessage("ARLIGHT_ARSTORE_PRINIMAEM_KOEFFICIEN"),
            'defaultValue' => '1.5',
        ),

        array(
            'id' => '10',
            'type' => 'field',
            'fieldType' => 'radio',
            'attributes' => '  ',
            'name' => 'E',
            'title' => GetMessage("ARLIGHT_ARSTORE_NORMA_OSVESENNOSTI"),
            'values' => array(
                array('20', '20 '.GetMessage("ARLIGHT_ARSTORE_LUKS_LESTNICA")),
                array('50', '50 '.GetMessage("ARLIGHT_ARSTORE_LUKS_PODSOBNYE_POM")),
                array('75', '75 '.GetMessage("ARLIGHT_ARSTORE_LUKS_HOLL_KORIDOR")),
                array('100', '100 '.GetMessage("ARLIGHT_ARSTORE_LUKS_ESKALATOR_LE")),
                array('150', '150 '.GetMessage("ARLIGHT_ARSTORE_LUKS_JILAA_KOMNATA")),
                array('200', '200 '.GetMessage("ARLIGHT_ARSTORE_LUKS_ZAL_DLA_KONFE")),
                array('300', '300 '.GetMessage("ARLIGHT_ARSTORE_LUKS_OFIS_OBSEGO_N")),
                array('500', '500 '.GetMessage("ARLIGHT_ARSTORE_LUKS_OFIS_V_KOTOR")),
            ),
            'defaultValue' => '150',
            'onStart' => 'calc_testc_myOnStart1'
        ),

        array(
            'id' => '11',
            'showHideFlag' => '1',
            'type' => 'formula',
            'name' => 'F',
            'title' => GetMessage("ARLIGHT_ARSTORE_VYCISLENIE_NEOBHODIM"),
            'formula' => '([E]*[L]*[W]*[Kz])/([N]*[n])'
        ),

        array(
            'id' => '12',
            'showHideFlag' => '1',
            'type' => 'formula',
            'name' => 'Fc',
            'title' => GetMessage("ARLIGHT_ARSTORE_OKRUGLIM_DO_CELOGO"),
            'formula' => 'ceil(([E]*[L]*[W]*[Kz])/([N]*[n]))'
        ),

        array(
            'id' => '13',
            'type' => 'text',
            'text' => '<b>'.GetMessage("ARLIGHT_ARSTORE_OKRUGLIM_DO_CELOGO").'</b>',
            'onCalculation' => 'calc_testc_functionAddFinalText'
        ),
    ),
);

function calc_testc_functionAddFinalText($index, $items)
{
    $result = false;
    foreach ($items as $k => $v) {
        if ($v['name'] == 'Fc') {
            $result = $v['result'];
        }
    }

    $item = &$items[$index];
    $item['text'] = '';
    $item['text'] .= '<b>'.GetMessage("ARLIGHT_ARSTORE_OKRUGLIM_DO_CELOGO").'</b><br>';
    $item['text'] .= $result . '<br>';
}

function calc_testc_functionNDefine($index, $items)
{
    $ar = array(
        '705030' => array(
            array('0.5', '0.26'),
            array('0.6', '0.3'),
            array('0.7', '0.34'),
            array('0.8', '0.38'),
            array('0.9', '0.40'),
            array('1', '0.43'),
            array('1.1', '0.46'),
            array('1.25', '0.48'),
            array('1.5', '0.54'),
            array('1.75', '0.57'),
            array('2', '0.6'),
            array('2.25', '0.62'),
            array('2.5', '0.64'),
            array('3', '0.68'),
            array('3.5', '0.7'),
            array('4', '0.72'),
            array('5', '0.75'),
        ),
        '705010' => array(
            array('0.5', '0.25'),
            array('0.6', '0.28'),
            array('0.7', '0.32'),
            array('0.8', '0.36'),
            array('0.9', '0.38'),
            array('1', '0.41'),
            array('1.1', '0.43'),
            array('1.25', '0.46'),
            array('1.5', '0.49'),
            array('1.75', '0.52'),
            array('2', '0.54'),
            array('2.25', '0.56'),
            array('2.5', '0.58'),
            array('3', '0.6'),
            array('3.5', '0.62'),
            array('4', '0.64'),
            array('5', '0.66'),
        ),
        '703030' => array(
            array('0.5', '0.2'),
            array('0.6', '0.24'),
            array('0.7', '0.28'),
            array('0.8', '0.31'),
            array('0.9', '0.34'),
            array('1', '0.37'),
            array('1.1', '0.39'),
            array('1.25', '0.42'),
            array('1.5', '0.47'),
            array('1.75', '0.51'),
            array('2', '0.54'),
            array('2.25', '0.57'),
            array('2.5', '0.59'),
            array('3', '0.63'),
            array('3.5', '0.66'),
            array('4', '0.68'),
            array('5', '0.72'),
        ),
        '703010' => array(
            array('0.5', '0.19'),
            array('0.6', '0.23'),
            array('0.7', '0.27'),
            array('0.8', '0.3'),
            array('0.9', '0.33'),
            array('1', '0.35'),
            array('1.1', '0.37'),
            array('1.25', '0.4'),
            array('1.5', '0.44'),
            array('1.75', '0.47'),
            array('2', '0.5'),
            array('2.25', '0.52'),
            array('2.5', '0.54'),
            array('3', '0.57'),
            array('3.5', '0.59'),
            array('4', '0.61'),
            array('5', '0.64'),
        ),
        '505010' => array(
            array('0.5', '0.17'),
            array('0.6', '0.2'),
            array('0.7', '0.22'),
            array('0.8', '0.24'),
            array('0.9', '0.26'),
            array('1', '0.28'),
            array('1.1', '0.3'),
            array('1.25', '0.32'),
            array('1.5', '0.34'),
            array('1.75', '0.36'),
            array('2', '0.38'),
            array('2.25', '0.39'),
            array('2.5', '0.4'),
            array('3', '0.42'),
            array('3.5', '0.43'),
            array('4', '0.45'),
            array('5', '0.46'),
        ),
        '503010' => array(
            array('0.5', '0.13'),
            array('0.6', '0.16'),
            array('0.7', '0.19'),
            array('0.8', '0.21'),
            array('0.9', '0.23'),
            array('1', '0.25'),
            array('1.1', '0.26'),
            array('1.25', '0.28'),
            array('1.5', '0.31'),
            array('1.75', '0.33'),
            array('2', '0.35'),
            array('2.25', '0.37'),
            array('2.5', '0.38'),
            array('3', '0.4'),
            array('3.5', '0.41'),
            array('4', '0.42'),
            array('5', '0.44'),
        ),
        '301010' => array(
            array('0.5', '0.06'),
            array('0.6', '0.08'),
            array('0.7', '0.1'),
            array('0.8', '0.11'),
            array('0.9', '0.12'),
            array('1', '0.13'),
            array('1.1', '0.14'),
            array('1.25', '0.15'),
            array('1.5', '0.17'),
            array('1.75', '0.18'),
            array('2', '0.19'),
            array('2.25', '0.2'),
            array('2.5', '0.21'),
            array('3', '0.22'),
            array('3.5', '0.23'),
            array('4', '0.24'),
            array('5', '0.25'),
        ),
    );
    $n = false;
    $i = false;
    $ton = '705030';
    foreach ($items as $k => $item) {
        if ($item['type'] == 'formula' && $item['name'] == 'i') {
            $i = $item['result'];
        }
        if (isset($item['name']) && $item['name'] == 'TonPot') {
            $tonPot = $item['result'];
        }
        if (isset($item['name']) && $item['name'] == 'TonSten') {
            $tonSten = $item['result'];
        }
        if (isset($item['name']) && $item['name'] == 'TonPol') {
            $tonPol = $item['result'];
        }
    }
    $ton = "{$tonPot}{$tonSten}{$tonPol}";

    $prevI = false;
    $nextI = false;
    $prevN = false;
    $nextN = false;

    $findKey = false;

    if (isset($ar["{$ton}"])) {
        $tonAr = $ar["{$ton}"];
        foreach ($tonAr as $k => $v) {
            if ($v[0] >= $i) {
                $findKey = $k;
                break;
            }
        }

        if ($findKey === false) {
            $findKey = count($tonAr) - 1;
        }

        if ($findKey == 0) {
            $prevI = $tonAr[$findKey][0];
            $nextI = $tonAr[$findKey][0];
            $prevN = $tonAr[$findKey][1];
            $nextN = $tonAr[$findKey][1];
        } else {
            if ($i > $tonAr[count($tonAr) - 1][0]) {
                $prevI = $tonAr[count($tonAr) - 1][0];
                $nextI = $tonAr[count($tonAr) - 1][0];
                $prevN = $tonAr[count($tonAr) - 1][1];
                $nextN = $tonAr[count($tonAr) - 1][1];
            } else {
                $prevI = $tonAr[$findKey - 1][0];
                $nextI = $tonAr[$findKey][0];
                $prevN = $tonAr[$findKey - 1][1];
                $nextN = $tonAr[$findKey][1];
            }
        }

        $n = $prevN + (($nextN - $prevN) / ($nextI - $prevI)) * ($i - $prevI);
    }
    $items[$index]['result'] = $n;
}

function calc_testc_functionArtDefine($index, $items)
{
    return '015215';
}

function calc_testc_myOnStart1($index, $items){}

function calc_testc_findProductByItemNumber($index, $items)
{
    global $DB;
    if (CModule::IncludeModule('iblock') && $items[$index]['result'] != '') {

        $F = false;
        foreach ($items as $k => $v) {
            if ($v['name'] == 'F') {
                $F = &$items[$k];
            }
        }

        $itemNumber = $DB->ForSql(trim($items[$index]['result']));
        $res = CIBlockElement::GetList(
            array('SORT' => 'ASC'),
            array(
                'IBLOCK_TYPE' => 'ncatalog',
                'IBLOCK_CODE' => 'CATALOG',
                'IBLOCK_ID' => 4,
                'ACTIVE' => 'Y',
                'PROPERTY_CML2_ARTICLE' => $itemNumber
            ),
            false,
            false,
            array('ID', 'NAME', 'DETAIL_PAGE_URL', 'PROPERTY_CML2_ARTICLE', 'PROPERTY_N_8')
        );
        if ($res) {
            $els = array();
            while ($el = $res->GetNext($res)) {
                $els[] = $el;
            }
            if (count($els)) {
                $n8 = array();
                foreach ($els as $el) {
                    if ($el['PROPERTY_N_8_VALUE'] != '') {
                        $n8[] = $el['PROPERTY_N_8_VALUE'];
                    }
                }

                if (count($n8)) {
                    $resultN8 = min($n8);
                    $F['result'] = $resultN8;
                    $F['attributes'] = ' readonly="readonly" ';

                    $items[$index]['messages'][] = GetMessage("ARLIGHT_ARSTORE_TOVAR").'<a href="' . $els[0]['DETAIL_PAGE_URL'] . '" target="_blank">' . $els[0]['NAME'] . '</a> '.GetMessage("ARLIGHT_ARSTORE_NAYDEN_ZNACENIE_SVE") . $resultN8 . ' '.GetMessage("ARLIGHT_ARSTORE_PODSTAVLENO_V_PEREME");
                } else {
                    $F['result'] = '';
                    $F['attributes'] = '';

                    $items[$index]['errors'][] = GetMessage("ARLIGHT_ARSTORE_TOVAR").'<a href="' . $els[0]['DETAIL_PAGE_URL'] . '" target="_blank">' . $els[0]['NAME'] . '</a> '.GetMessage("ARLIGHT_ARSTORE_NAYDEN_NO_U_NEGO_NE");
                }
            } else {
                $F['result'] = '';
                $F['attributes'] = '';

                $items[$index]['errors'][] = GetMessage("ARLIGHT_ARSTORE_TOVAR_NE_NAYDEN");
            }
        } else {
            $F['result'] = '';
            $F['attributes'] = '';

            $items[$index]['errors'][] = GetMessage("ARLIGHT_ARSTORE_OSIBKA_CTO_TO_POSLO");
        }
    }
}

function calc_testc_functionNDefine2($index, $items)
{
    $n = false;
    $i = false;
    $ton = '705030';

    foreach ($items as $k => $item) {
        if ($item['type'] == 'formula' && $item['name'] == 'i') {
            $i = $item['result'];
        }
        if (isset($item['name']) && $item['name'] == 'TonPot') {
            $tonPot = $item['result'];
        }
        if (isset($item['name']) && $item['name'] == 'TonSten') {
            $tonSten = $item['result'];
        }
        if (isset($item['name']) && $item['name'] == 'TonPol') {
            $tonPol = $item['result'];
        }
    }
    $ton = "{$tonPot}{$tonSten}{$tonPol}";

    $formula = array(
        '303030' => 0.2804 * log($i) + 0.53,
        '303050' => 0.3016 * log($i) + 0.5418,
        '303070' => 0.3252 * log($i) + 0.5544,
        '305030' => 0.2642 * log($i) + 0.6005,
        '305050' => 0.2874 * log($i) + 0.6197,
        '305070' => 0.3136 * log($i) + 0.6407,
        '307030' => 0.2297 * log($i) + 0.7028,
        '307050' => 0.2523 * log($i) + 0.7361,
        '307070' => 0.2785 * log($i) + 0.774,
        '503030' => 0.3106 * log($i) + 0.5604,
        '503050' => 0.352 * log($i) + 0.5798,
        '503070' => 0.4018 * log($i) + 0.6012,
        '505050' => 0.3422 * log($i) + 0.6736,
        '505030' => 0.2958 * log($i) + 0.6436,
        '505070' => 0.3999 * log($i) + 0.708,
        '507030' => 0.2585 * log($i) + 0.7685,
        '507050' => 0.3075 * log($i) + 0.8196,
        '507070' => 0.3708 * log($i) + 0.8807,
        '703030' => 0.3448 * log($i) + 0.5927,
        '703050' => 0.4136 * log($i) + 0.6214,
        '703070' => 0.5045 * log($i) + 0.6549,
        '705030' => 0.3322 * log($i) + 0.6906,
        '705050' => 0.4117 * log($i) + 0.7349,
        '705070' => 0.5208 * log($i) + 0.7884,
        '707030' => 0.2921 * log($i) + 0.8434,
        '707050' => 0.3807 * log($i) + 0.9191,
        '707070' => 0.5097 * log($i) + 1.0155,
        '101010' => 0.2562 * log($i) + 0.4538,
        '101030' => 0.2618 * log($i) + 0.4566,
        '101050' => 0.2673 * log($i) + 0.4594,
        '103010' => 0.2471 * log($i) + 0.4957,
        '103030' => 0.2534 * log($i) + 0.5013,
        '103050' => 0.2598 * log($i) + 0.507,
        '105010' => 0.2303 * log($i) + 0.5507,
        '105030' => 0.2366 * log($i) + 0.5608,
        '105050' => 0.2432 * log($i) + 0.5715,
        '301010' => 0.2693 * log($i) + 0.4709,
        '301030' => 0.2869 * log($i) + 0.478,
        '301050' => 0.3056 * log($i) + 0.4855,
        '303010' => 0.2604 * log($i) + 0.5178,
        '305010' => 0.2434 * log($i) + 0.5828,
        '501010' => 0.2832 * log($i) + 0.4884,
        '501030' => 0.3147 * log($i) + 0.5003,
        '501050' => 0.3509 * log($i) + 0.5133,
        '503010' => 0.2753 * log($i) + 0.5428,
        '505010' => 0.2571 * log($i) + 0.6169,
        '101070' => 0.2731 * log($i) + 0.4622,
        '103070' => 0.2664 * log($i) + 0.513,
        '107010' => 0.1999 * log($i) + 0.6266,
        '107030' => 0.2045 * log($i) + 0.6448,
        '107070' => 0.214 * log($i) + 0.6868,
        '301070' => 0.3262 * log($i) + 0.4933,
        '307010' => 0.2094 * log($i) + 0.6734,
        '701010' => 0.2976 * log($i) + 0.506,
        '701030' => 0.3456 * log($i) + 0.5235,
        '701070' => 0.481 * log($i) + 0.5658,
        '703010' => 0.2907 * log($i) + 0.5674,
        '707010' => 0.228 * log($i) + 0.7812,
        '105070' => 0.2482 * log($i) + 0.5862,
        '107050' => 0.2091 * log($i) + 0.6648,
        '501070' => 0.3935 * log($i) + 0.5276,
        '507010' => 0.2189 * log($i) + 0.7246,
        '701050' => 0.4048 * log($i) + 0.5432,
        '705010' => 0.2717 * log($i) + 0.6527,
    );

    if (isset($formula["{$ton}"])) {
        $n = $formula["{$ton}"];
    }
    $items[$index]['result'] = $n;
}