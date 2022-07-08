<?php
$masterCalcConfiguration = array(
	'uniqueCalcId' => 'calc_8',
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
                array('params', GetMessage("ARLIGHT_ARSTORE_PO_MOSNOSTI_LENTY")),
            ),
        ),

	    array(
	        'id' => '1',
	        'type' => 'field',
	        'fieldType' => 'text',
	        'name' => 'L',
	        'attributes' => '',
	        'title' => GetMessage("ARLIGHT_ARSTORE_OBSAA_DLINA_LENTY_M"),
            'inputClass' => 'input-with-btns'

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
	        'id' => '3',
	        'type' => 'field',
	        'fieldType' => 'select',
	        'attributes' => '',
	        'name' => 'Kp',
	        'title' => GetMessage("ARLIGHT_ARSTORE_KOLICESTVO_LENTY_NA"),
	        'values' => array(
	            array('5', GetMessage("ARLIGHT_ARSTORE_DO_M")),
	            array('10', GetMessage("ARLIGHT_ARSTORE_DO_M1")),
	            array('20', GetMessage("ARLIGHT_ARSTORE_DO_M2")),
	        ),
	        'defaultValue' => '10'
	    ),



		array(
			'id' => '0',
			'type' => 'field',
			'fieldType' => 'search_product',
			'name' => 'item_number',
			'attributes' => 'data-select-type="article" data-select-block',
			'title' => GetMessage("ARLIGHT_ARSTORE_VVEDITE_ARTIKUL_LENT"),
			'defaultValue' => '',
			'onCalculation' => 'calc_8_findProductByItemNumber',
			'validation' => array(
				'no_validation',
			),
		    'inputClass' => 'calc-block__input--dark'
		),

		array(
			'id' => '4',
			'showHideFlag' => '1',
			'type' => 'field',
			'fieldType' => 'text',
			'name' => 'K',
			'attributes' => ' readonly="readonly" ',
			'title' => 'K '.GetMessage("ARLIGHT_ARSTORE_ITOG_ESLI"),
			'defaultValue' => '',
			'onCalculation' => 'calc_8_defineK',
		    'visible' => false
		),

		array(
			'id' => '5',
			'showHideFlag' => '1',
			'type' => 'formula',
			'name' => 'P',
			'title' => GetMessage("ARLIGHT_ARSTORE_OBSAA_MOSNOSTQ_S_UCE"),
			'formula' => '1.2 * [L] * [Pm]',
		    'visible' => false
		),

		array(
			'id' => '6',
			'showHideFlag' => '1',
			'type' => 'formula',
			'name' => 'N',
			'title' => GetMessage("ARLIGHT_ARSTORE_KOLICESTVO_BLOKOV_PI"),
			'formula' => '[L] / [K]',
		    'visible' => false
		),

		array(
			'id' => '8',
			'showHideFlag' => '1',
			'type' => 'formula',
			'name' => 'Pmin',
			'title' => GetMessage("ARLIGHT_ARSTORE_MIN_MOSNOSTQ_BP_VT"),
			'formula' => '[P]/[N]',
		    'visible' => false
		),
		array(
			'id' => '9',
			'showHideFlag' => '1',
			'type' => 'formula',
			'name' => 'Pmax',
			'title' => GetMessage("ARLIGHT_ARSTORE_MAKS_MOSNOSTQ_BP_V"),
			'formula' => '1.2 * [Pmin]',
		    'visible' => false
		),

		array(
			'id' => '12',
			'type' => 'field',
			'fieldType' => 'text',
			'attributes' => ' readonly="readonly" ',
			'name' => 'Pminr',
			'title' => GetMessage("ARLIGHT_ARSTORE_MIN_MOSNOSTQ_BP_VT"),
			'defaultValue' => '',
			'onCalculation' => 'calc_8_functionAddFinalText2'
		),

		array(
			'id' => '13',
			'type' => 'field',
			'fieldType' => 'text',
			'attributes' => ' readonly="readonly" ',
			'name' => 'Pmaxr',
			'title' => GetMessage("ARLIGHT_ARSTORE_MAKS_MOSNOSTQ_BP_V"),
			'defaultValue' => '',
			'onCalculation' => 'calc_8_functionAddFinalText3'
		),

	    array(
	        'id' => '11',
	        'type' => 'field',
	        'fieldType' => 'text',
	        'attributes' => ' readonly="readonly" ',
	        'name' => 'Pr',
	        'title' => GetMessage("ARLIGHT_ARSTORE_OBSAA_MOSNOSTQ_S_UCE"),
	        'defaultValue' => '',
	        'onCalculation' => 'calc_8_functionAddFinalText1'
	    ),

	    array(
	        'id' => '7',
	        'type' => 'formula',
	        'name' => 'Nc',
	        'title' => GetMessage("ARLIGHT_ARSTORE_KOLICESTVO_BLOKOV_PI1"),
	        'formula' => 'ceil([N])',
	    ),

	    array(
	        'id' => '10',
	        'type' => 'text',
	        'text' => '',
	        'onCalculation' => 'calc_8_functionAddFinalText',
	        'visible' => false
	    ),
        array(
            'id' => '14',
            'showHideFlag' => '1',
            'type' => 'formula',
            'name' => 'V',
            'title' => GetMessage("ARLIGHT_ARSTORE_NAPRYAGENIE_PITANIYA"),
            'formula' => '[V]',
            'visible' => false
        ),
	),
);

function calc_8_functionAddFinalText1($index, &$items) {
	$item = &$items[$index];
	foreach ($items as $k => $v) {
		if ($v['name'] == 'P') {
			$item['result'] = $v['result'];
			break;
		}
	}
}

function calc_8_functionAddFinalText2($index, &$items) {
	$item = &$items[$index];
	foreach ($items as $k => $v) {
		if ($v['name'] == 'Pmin') {
			$item['result'] = $v['result'];
			break;
		}
	}
}

function calc_8_functionAddFinalText3($index, &$items) {
	$item = &$items[$index];
	$tmpResult = false;
	foreach ($items as $k => $v) {
		if ($v['name'] == 'Pmax') {
			$tmpResult = $v['result'];
			break;
		}
	}

	if ($tmpResult < 0) {
		$tmpResult = 0;
	}

	$tmpResult = ceil($tmpResult / 50) * 50;

	$item['result'] = $tmpResult;
}

function calc_8_functionAddFinalText($index, &$items) {
	$L = false;
	$K = false;
	foreach ($items as $k => $v) {
		if ($v['name'] == 'K') {
			$K = $v['result'];
		}
		if ($v['name'] == 'L') {
			$L = $v['result'];
		}
	}
	$item = &$items[$index];
	$item['text'] .= ' <b>' . intval($L / $K) . '</b> '.GetMessage("ARLIGHT_ARSTORE_BP_PO") . $K . ' '.GetMessage("ARLIGHT_ARSTORE_M");
	if (fmod($L, $K)  != 0) {
		$item['text'] .= '<b>1</b> '.GetMessage("ARLIGHT_ARSTORE_BP_PO") . fmod($L, $K) . ' '.GetMessage("ARLIGHT_ARSTORE_M");
	}
	$item['text'] = trim($item['text'], ' /');
}

function calc_8_defineK($index, &$items) {
	$Kp = false;
	$L = false;
	foreach ($items as $k => $v) {
		if ($v['name'] == 'Kp') {
			$Kp = $v['result'];
		}
		if ($v['name'] == 'L') {
			$L = $v['result'];
		}
	}
	if ($Kp > $L) {
		$items[$index]['result'] = $L;
	} else {
		$items[$index]['result'] = $Kp;
	}
}

function calc_8_findProductByItemNumber($index, &$items) {
    global $DB;
	if (CModule::IncludeModule('iblock') && $items[$index]['result'] != '') {
		$Pm = false;
        $V = false;
		foreach ($items as $k => $v) {
			if ($v['name'] == 'Pm') {
				$Pm = &$items[$k];
			}
            if ($v['name'] == 'V') {
                $V = &$items[$k];
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
				array('ID', 'NAME', 'DETAIL_PAGE_URL', 'PROPERTY_ARTICLE', 'PROPERTY_N_35', 'PROPERTY_C_47', 'PROPERTY_N_20')
		);
		if ($res) {
			$els = array();
			while ($el = $res->GetNext($res)) {
				$els[] = $el;
			}
			if (count($els)) {
				$n35 = array();
				$n47 = array();
                $n20 = '';
				foreach ($els as $el) {
					if ($el['PROPERTY_N_35_VALUE'] != '') {
						$n35[] = $el['PROPERTY_N_35_VALUE'];
					}
					if ($el['PROPERTY_C_47_VALUE'] != '') {
						$n47[] = $el['PROPERTY_C_47_VALUE'];
					}
                    if ($el['PROPERTY_N_20_VALUE'] != '') {
                        $n20 = $el['PROPERTY_N_20_VALUE'];
                    }
				}

    			if (count($n35) && count($n47)) {
					$resultN35 = min($n35);
					$resultN47 = min($n47);

					$Pm['result'] = $resultN35 / ($resultN47 / 1000); // переводим мощность на метр

					$addToFilter = array(
                        'PROPERTY_ARTICLE' => $els[0]['PROPERTY_ARTICLE_VALUE']
					);

                    $items[$index]['messages'][]['ONE_LINE'] = json_encode($addToFilter);
				}
                if($n20){
                    $V['result'] = $n20;
//                    $items[$index]['errors'][] = $n20;
                }

			} else {
				$Pm['result'] = '';
				$items[$index]['errors'][] = GetMessage("ARLIGHT_ARSTORE_TOVAR_NE_NAYDEN");
			}
		} else {
			$Pm['result'] = '';
			$items[$index]['errors'][] = GetMessage("ARLIGHT_ARSTORE_OSIBKA_CTO_TO_POSLO");
		}
	}
}