<?php
define("STOP_STATISTICS", true);
define('NO_AGENT_CHECK', true);

// Проверка на доступ (всегда стоит первой)
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR."admin/access.php");

use Bitrix\Main\Context,
    Bitrix\Main\Page\Asset;


$request = Context::getCurrent()->getRequest();

$orderId = (int)$request['order'];
$APPLICATION->SetTitle(GetMessage("ARLIGHT_ARSTORE_ZAKAZ") . $orderId);

function generateOrderXlsx($orderId)
{
    if (ini_get('mbstring.func_overload') & 2) {
        $PHPEXCELPATH = $_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/" . SITE_ID . "/library/PHPExcel/Classes_overload2";
    } else {
        $PHPEXCELPATH = $_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/" . SITE_ID . "/library/PHPExcel/Classes_overload0";
    }
    require_once($PHPEXCELPATH . '/PHPExcel.php');

    $lc = 'E';
    $grayBorder = 'CCCCCC';

    $arTHstyle = array(
        'font' => array(
        ),
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        ),
        'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_MEDIUM,
                'color' => array('rgb' => $grayBorder),
            ),
        ),
    );

    $arTableStyle = array(
        'font' => array(
        ),
        'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_MEDIUM,
                'color' => array('rgb' => $grayBorder),
            ),
        ),
    );

    $arDescriptionStyle = array(
        'font' => array(
            'size' => 10,
        ),
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_TOP,
            'wrap' => true,
        ),
    );
    $titleFormat = array(
        'font' => array(
            'size' => 20,
            'color' => array('rgb' => '000000'),
        ),
    );


    // Получаем информацию по текущему заказу
    $arResult = WorkOrder::getOrders(SITE_ID, array('ID' => $orderId));
    $order = $arResult['ORDERS'][$orderId];
    $products = $order['PRODUCTS'];

    $all_active_sheet = 0;
    $objPHPExcel = new PHPExcel();
    $objPHPExcel
        ->getProperties()
        ->setCreator($_SERVER['SERVER_NAME'])
        ->setLastModifiedBy($_SERVER['SERVER_NAME'])
        ->setTitle(GetMessage("ARLIGHT_ARSTORE_ZAKAZ1") . $orderId . $_SERVER['SERVER_NAME'])
        ->setSubject(GetMessage("ARLIGHT_ARSTORE_ZAKAZ1") . $orderId . $_SERVER['SERVER_NAME'])
        ->setDescription(GetMessage("ARLIGHT_ARSTORE_ZAKAZ1") . $orderId . $_SERVER['SERVER_NAME']);
    $writers['all'] = $objPHPExcel;

    foreach ($writers as $type => &$writer) {
        $writer->createSheet($all_active_sheet);
        $writer->setActiveSheetIndex($all_active_sheet);
        $writer->getActiveSheet()->setTitle(GetMessage("ARLIGHT_ARSTORE_ZAKAZ1") . $orderId);

        $k = 1;

        //
        $writer->getActiveSheet()->getColumnDimension('A')->setWidth(10);
        $writer->getActiveSheet()->getColumnDimension('B')->setWidth(25);
        $writer->getActiveSheet()->getColumnDimension('C')->setWidth(15);
        $writer->getActiveSheet()->getColumnDimension('D')->setWidth(15);
        $writer->getActiveSheet()->getColumnDimension('E')->setWidth(15);


        $writer->getActiveSheet()->mergeCells('A' . $k . ':' . $lc . $k);
        $writer->getActiveSheet()->setCellValue('A' . $k, GetMessage("ARLIGHT_ARSTORE_ZAKAZ2") . $orderId);
        $writer->getActiveSheet()->getStyle('A' . $k)->applyFromArray($titleFormat);

        $k++;
        $k++;

        $writer->getActiveSheet()->getStyle('A' . $k . ':' . $lc . $k)->applyFromArray($arTHstyle);
        $writer->getActiveSheet()->getRowDimension($k)->setRowHeight(30);

        $writer->getActiveSheet()
            ->setCellValue('A' . $k, GetMessage("ARLIGHT_ARSTORE_ARTIKUL"))
            ->setCellValue('B' . $k, GetMessage("ARLIGHT_ARSTORE_NAIMENOVANIE"))
            ->setCellValue('C' . $k, GetMessage("ARLIGHT_ARSTORE_CENA"))
            ->setCellValue('D' . $k, GetMessage("ARLIGHT_ARSTORE_KOL_VO"))
            ->setCellValue('E' . $k, GetMessage("ARLIGHT_ARSTORE_SUMMA"));
        $k++;

        $table_start=$k;
        foreach ($products as &$arElement) {
//            $writer->getActiveSheet()->getRowDimension($k)->setRowHeight();
            $writer->getActiveSheet()->getStyle('B' . $k)->applyFromArray($arDescriptionStyle);
            $writer->getActiveSheet()->getStyle('A' . $k . ':' . $lc . $k)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);


            $writer->getActiveSheet()->getCell('A' . $k)->setValueExplicit($arElement['ARTNUMBER'], PHPExcel_Cell_DataType::TYPE_STRING);
            $writer->getActiveSheet()
                ->setCellValue('B' . $k, $arElement['NAME'])
                ->setCellValue('C' . $k, $arElement['PRICE'])
                ->setCellValue('D' . $k, $arElement['QUANTITY'])
                ->setCellValue('E' . $k, $arElement['PRICE'] * $arElement['QUANTITY']);

            $writer->getActiveSheet()->getStyle('A' . $k)->applyFromArray(array(
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                ),
            ));

            $k++;
        }
        unset($arElement);

        $writer->getActiveSheet()
            ->setCellValue('D' . $k, GetMessage("ARLIGHT_ARSTORE_ITOGO"))
            ->setCellValue('E' . $k, $order['SUMM']);

        $writer->getActiveSheet()->getStyle('A' . $table_start . ':' . $lc . $k)->applyFromArray($arTableStyle);
    }

    $objWriter = PHPExcel_IOFactory::createWriter($writers['all'], 'Excel2007');

    header("Expires: Mon, 1 Apr 1974 05:00:00 GMT");
    header("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
    header("Cache-Control: no-cache, must-revalidate");
    header("Pragma: no-cache");
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="order_' . $orderId . '.xlsx"');
    header('Cache-Control: max-age=0');
    header('Cache-Control: max-age=1');
    $objWriter->save('php://output');

    unset($objWriter);
}

generateOrderXlsx($orderId);