<?php
$masterCalcConfiguration = array(
    'uniqueCalcId' => 'calc_7',
    'items' => array(


        array(
            'id' => '1',
            'type' => 'field',
            'fieldType' => 'text',
            'name' => 'L',
            'required' => 'Y',
            'title' => GetMessage("ARLIGHT_ARSTORE_DLINA_POMESENIA_M"),
            'inputClass' => 'input-with-btns'
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
            'id' => '2',
            'type' => 'field',
            'fieldType' => 'text',
            'name' => 'W',
            'required' => 'Y',
            'title' => GetMessage("ARLIGHT_ARSTORE_SIRINA_POMESENIA_M"),
            'inputClass' => 'input-with-btns'

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
            'id' => '3',
            'type' => 'field',
            'fieldType' => 'text',
            'name' => 'H',
            'required' => 'Y',
            'title' => GetMessage("ARLIGHT_ARSTORE_VYSOTA_POMESENIA_M"),
            'inputClass' => 'input-with-btns'

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
            'id' => '0',
            'type' => 'field',
            'fieldType' => 'text',
            'name' => 'N',
            'attributes' => ' ',
            'required' => 'Y',
            'title' => GetMessage("ARLIGHT_ARSTORE_KOLICESTVO_SVETILQNI"),
            'inputClass' => 'input-with-btns'

        ),

        array(
            'id' => '10',
            'type' => 'field',
            'fieldType' => 'select',
            'attributes' => '  ',
            'name' => 'E',
            'title' => GetMessage("ARLIGHT_ARSTORE_TIP_POMESENIA"),
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
            'onStart' => 'calc_1_myOnStart1'
        ),

        array(
            'id' => '4',
            'showHideFlag' => '1',
            'type' => 'formula',
            'name' => 'i',
            'title' => GetMessage("ARLIGHT_ARSTORE_INDEKS_FORMY_POMESEN"),
            'formula' => '[L]*[W]/(([H]-0.8)*([L]+[W]))',
            'visible' => false
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
            'onCalculation' => 'calc_7_functionNDefine2',
            'visible' => false
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
            'visible' => false
        ),

        array(
            'id' => '11',
            'showHideFlag' => '1',
            'type' => 'formula',
            'name' => 'F',
            'title' => GetMessage("ARLIGHT_ARSTORE_VYCISLENIE_NEOBHODIM"),
            'formula' => '([E]*[L]*[W]*[Kz])/([N]*[n])',
            'visible' => false
        ),

        array(
            'id' => '12',
            'showHideFlag' => '1',
            'type' => 'formula',
            'name' => 'Fc',
            'title' => GetMessage("ARLIGHT_ARSTORE_SVETOVOY_POTOK_SVETI"),
            'formula' => 'ceil(([E]*[L]*[W]*[Kz])/([N]*[n]))',

        ),

        array(
            'id' => '13',
            'type' => 'field',
            'fieldType' => 'text',
            'attributes' => ' readonly="readonly" ',
            'name' => 'Fcr',
            'title' => GetMessage("ARLIGHT_ARSTORE_SVETOVOY_POTOK_SVETI"),
            'unit' => GetMessage("ARLIGHT_ARSTORE_LM"),
            'defaultValue' => '',
            'onCalculation' => 'calc_7_functionAddFinalText',
            'visible' => false
        ),
    ),
);

function calc_7_functionAddFinalText($index, &$items)
{
    $item = &$items[$index];
    foreach ($items as $k => $v) {
        if ($v['name'] == 'Fc') {
            $item['result'] = $v['result'];
            break;
        }
    }
}

function calc_7_functionNDefine2($index, &$items)
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