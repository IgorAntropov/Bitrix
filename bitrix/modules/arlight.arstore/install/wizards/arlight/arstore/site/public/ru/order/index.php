<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Корзина");
?>
<? if (BLOCKING != 'true'): ?>
	<div id="personal_new" class="personal" data-block="2">
        <? if ($USER->IsAuthorized()) {
            require($_SERVER["DOCUMENT_ROOT"]. SITE_DIR  . "personal/top_menu.php");
        } ?>
		<div class="personal__block active_el" data-block="3">
			<?
			$APPLICATION->IncludeComponent("itertech:smallcart", "fullcart", Array(
				"LIST_PROPERTY_CODE" => "",    // Свойства для вывода
			),
				false
			);
			?>
			<? $APPLICATION->IncludeComponent("itertech:checkout", ".default", Array(
				"COMPONENT_TEMPLATE" => ".default",
				"ADD_IMAGE_DELIVERY" => "N",	// Показывать изображение способов доставки?
				"IMAGE_WIDTH_DELIVERY" => "70",	// Ширина изображения доставки (в пикселях)
				"IMAGE_HEIGHT_DELIVERY" => "70",	// Высота изображения доставки (в пикселях)
				"ADD_IMAGE_PAYMENT" => "N",	// Показывать изображение способов оплаты?
				"IMAGE_WIDTH_PAYMENT" => "70",	// Ширина изображения оплаты (в пикселях)
				"IMAGE_HEIGHT_PAYMENT" => "70",	// Высота изображения оплаты (в пикселях)
			),
				false
			); ?>
		</div>
	</div>
<? endif; ?>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>