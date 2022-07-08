<?php

?>
<div class="master-calc-wrapper">
<?=$arResult['RESULT']?>


    
<?php
// H::d($arResult['CONFIGURATION']);
foreach ((array)$arResult['CONFIGURATION']['items'] as $k => $v) {
	if ($v['name'] == 'Fc' && isset($v['result']) && $v['result'] != '') {
		
		$addToFilter = array(
			'SECTION_ID' => 4364,
			array(
				'LOGIC' => 'AND', 
				'>=PROPERTY_N_8' => intval(($v['result'] * 0.9)),
				'<=PROPERTY_N_8' => intval(($v['result'] * 1.25))
			)
		);
?>
<div class="master-calc-products">
		<h3><?=GetMessage("ARLIGHT_ARSTORE_TOVARY_SO_ZNACENIEM")?><?=intval(($v['result'] * 0.9))?> <?=GetMessage("ARLIGHT_ARSTORE_LM_DO")?><?=intval(($v['result'] * 1.25))?> <?=GetMessage("ARLIGHT_ARSTORE_LM")?></h3>
<?php
		// echo $_SERVER['REQUEST_URI'] . "<br><br>";
		include $_SERVER['DOCUMENT_ROOT'] . '/bitrix/templates/.default/includes/products_list_with_filter.php';
?>
</div>
<?php		
		
		break;
	} 
}
 
?>
</div>