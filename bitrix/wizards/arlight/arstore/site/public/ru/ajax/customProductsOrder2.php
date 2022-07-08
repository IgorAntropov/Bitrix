<?
define("STOP_STATISTICS", true);
define('NO_AGENT_CHECK', true);
set_time_limit(0);
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

use \Bitrix\Main\Loader;
use Bitrix\Main\Mail\Event;

if (!Loader::includeModule("iblock")) return;

if (isset($_POST) && isset($_POST['dataUpdate']) && trim($_POST['dataUpdate']) !== '') {
    $dataJSON = trim($_POST['dataUpdate']);
    $dataArr = json_decode(json_encode(json_decode($dataJSON)), true);
    if (is_array($dataArr) && isset($dataArr['userData']) && isset($dataArr['productData']) && is_array($dataArr['productData'])) {
        $storagePath = $_SERVER["DOCUMENT_ROOT"] . SITE_DIR . 'assets/json/custom_products/';
        if (!file_exists($storagePath)) mkdir($storagePath);
        $orderNumbersPath = $_SERVER["DOCUMENT_ROOT"] . SITE_DIR . 'assets/json/custom_products/last_number.json';
        if (!file_exists($orderNumbersPath)) file_put_contents($orderNumbersPath, 835);
        $currentNumber = (int)file_get_contents($orderNumbersPath) + 1;
        file_put_contents($orderNumbersPath, $currentNumber);

        //формируем массив с товарами для письма
        $userID = GetUserID();
        $productsForLetter = [];
        if ($userID && $userID !== '') {
            $userFileName = $_SERVER["DOCUMENT_ROOT"] . '/upload/custom-lamps-orders/' . $userID . '.json';
            if (file_exists($userFileName)) {
                $dataProduct = json_decode(json_encode(json_decode(file_get_contents($userFileName))), true);
                if (count($dataProduct)) {
                    $customProdData = [];
                    $pathToJSON = $_SERVER["DOCUMENT_ROOT"] . SITE_DIR . 'assets/json/customProductsInfo.json';
                    if (file_exists($pathToJSON)) {
                        $customProdDataTemp = json_decode(json_encode(json_decode(file_get_contents($pathToJSON))), true);
                        if (isset($customProdDataTemp['products'])) $customProdData = $customProdDataTemp['products'];
                    }
                    $productsForLetter['compatibles'] = [];
                    $productsForLetter['customProducts'] = [];
                    $productsForLetter['totalPrice'] = 0;
                    foreach ($dataProduct as $currProd) {
                        $article = $currProd['article'];
                        if (isset($customProdData[$article])) {
                            $currProdDataDraft = $customProdData[$article];
                            $currProdForLetter = [];
                            $currProdForLetter['article'] = $article;
                            $currProdForLetter['image'] = $currProdDataDraft['image'];
                            $currProdForLetter['name'] = $currProdDataDraft['name'];
                            $currProdForLetter['price'] = (float)$currProd['lampPrice'];
                            $currProdForLetter['total'] = (float)$currProd['totalPrice'];
                            if ((float)$currProdForLetter['total']) $productsForLetter['totalPrice'] += (float)$currProdForLetter['total'];
                            $currProdForLetter['qnt'] = $currProd['quantity'] . ' шт';
                            $currProdForLetter['selectData'] = [];
                            $currProdForLetter['selectData'][$currProd['group_select']['name']] = $currProd['group_select']['value'];
                            foreach ($currProd['selects'] as $currSelData) {
                                $currProdForLetter['selectData'][$currSelData['name']] = $currSelData['value'];
                            }
                            if (isset($currProd['comment']) && trim($currProd['comment']) !== '') $currProdForLetter['selectData']['Комментарий'] = trim($currProd['comment']);
                            $currProdForLetter['adds'] = '';
                            $currProdForLetter['addsAr'] = [];
                            if ($currProd['add']['cri'] || $currProd['add']['control'] || $currProd['add']['power']) {
                                $currProdForLetter['adds'] .= '<div style="font-size: 12px;"><b>Доп.опции*:</b></div>';
                                if ($currProd['add']['cri']) {
                                    $currProdForLetter['adds'] .= '<div style="font-size: 12px;">CRI 98</div>';
                                    $currProdForLetter['addsAr'][] = 'CRI 98';
                                };
                                if ($currProd['add']['control']) {
                                    $currProdForLetter['adds'] .= '<div style="font-size: 12px;">Управление светом</div>';
                                    $currProdForLetter['addsAr'][] = 'Управление светом';
                                };
                                if ($currProd['add']['power']) {
                                    $currProdForLetter['adds'] .= '<div style="font-size: 12px;">Без блока питания</div>';
                                    $currProdForLetter['addsAr'][] = 'Без блока питания';
                                };
                                $currProdForLetter['adds'] .= '<div style="font-size: 10px;">* В стоимость не включено. Рассчитывается индивидуально с менеджером.</div>';
                            }
                            if (count($currProdForLetter)) $productsForLetter['customProducts'][] = $currProdForLetter;
                        }
                    }
                }
            }
        }

        //generate excel CP
        $link = '';
        if (count($dataProduct)) {
            $dataArr['productData'] = $productsForLetter;
            $cNumber = 'C-' . $currentNumber;
            $orderTime = date('d-m-Y H:i:s');
            $price = (string)$dataArr['productData']['totalPrice'];

            if (ini_get('mbstring.func_overload') & 2) {
                $PHPEXCELPATH = $_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/" . SITE_ID . "/library/PHPExcel/Classes_overload2";
            } else {
                $PHPEXCELPATH = $_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/" . SITE_ID . "/library/PHPExcel/Classes_overload0";
            }
            require_once($PHPEXCELPATH . '/PHPExcel.php');
            // Create new PHPExcel object
            $objPHPExcel = new PHPExcel();

            // Set document properties
            $objPHPExcel->getProperties()->setCreator("Arlight")
                ->setLastModifiedBy("Arlight")
                ->setTitle("List")
                ->setSubject("List")
                ->setDescription("List");

            $styleArray = array(
                'font' => array(
                    'name' => 'Calibri'
                ));

            $style_table_head = array(
                'font' => array(
                    'bold' => true,
                    'size' => 10,
                    'name' => 'Tahoma'
                ),
                'fill' => array(
                    'type' => PHPExcel_Style_Fill::FILL_SOLID,
                    'startcolor' => array(
                        'rgb' => 'bfbfbf',
                    ),
                ),
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                ),
                'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN,
                    ),
                ),
            );

            $style_table = array(
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_TOP,
                ),
                'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN,
                    ),
                ),
                'font' => array(
                    'size' => 10,
                    'name' => 'Tahoma'
                )
            );

            $style_title = array(
                'font' => array(
                    'bold' => true,
                ),
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                ),
            );


            $a = 0;
            $name = 'Коммерческое предложение №' . $cNumber;
            $Sheet = new PHPExcel_Worksheet($objPHPExcel, $name);
            $objPHPExcel->addSheet($Sheet, $a);
            $objPHPExcel->setActiveSheetIndex($a);
            $a++;
            $J = 1;

            $objDrawing = new PHPExcel_Worksheet_Drawing();
            $objDrawing->setWidth(250);
            $objDrawing->setCoordinates('E' . $J);
            $objDrawing->setOffsetY(5);
            $objDrawing->setOffsetX(30);
            $objDrawing->setWorksheet($Sheet);

            $Sheet->setCellValue('B' . $J, $name, 1)->getStyle('B' . $J)->getFont()->setBold(true)->setSize(12);
            $J += 2;
            $Sheet->setCellValue('B' . $J, 'Клиент', 1);
            $J++;
            $Sheet->setCellValue('B' . $J, $dataArr['userData']['surname'] . ' ' . $dataArr['userData']['name'], 1)->getStyle('B' . $J)->getFont()->setBold(true)->setSize(12);
            $J++;
            $Sheet->setCellValue('B' . $J, $dataArr['userData']['mail'] . ' | ' . $dataArr['userData']['phone'], 1);
            $J += 2;

            $Sheet->setCellValue('B' . $J, 'Актуально на ' . $orderTime, 1);
            $J++;
            $Sheet->setCellValue('B' . $J, 'Предложение действительно в течение 3-х рабочих дней', 1);
            $J += 2;

            $Sheet
                ->setCellValue('A' . $J, '№')
                ->setCellValue('B' . $J, 'Артикул')
                ->setCellValue('C' . $J, 'Наименование')
                ->setCellValue('D' . $J, 'Кол-во')
                ->setCellValue('E' . $J, 'Ед.изм.')
                ->setCellValue('F' . $J, 'Цена, за 1 ед.')
                ->setCellValue('G' . $J, 'Сумма');

            $Sheet->getColumnDimension('A')->setWidth(4);
            $Sheet->getColumnDimension('B')->setWidth(8);
            $Sheet->getColumnDimension('C')->setWidth(55);
            $Sheet->getColumnDimension('D')->setWidth(8);
            $Sheet->getColumnDimension('E')->setWidth(8);
            $Sheet->getColumnDimension('F')->setWidth(13);
            $Sheet->getColumnDimension('G')->setWidth(13);

            $Sheet->getStyle('A' . $J . ':G' . $J)->applyFromArray($style_table_head);
            $Sheet->getRowDimension($J)->setRowHeight(40);

            $J++;
            $k = 0;
            foreach ($dataArr['productData']['customProducts'] as $arElement) {
                $selectDataForPrint = '';
                $addsDataForPrint = '';
                $addsDataForPrintTemp = '';
                foreach ($arElement['selectData'] as $propName => $propValue) {
                    $selectDataForPrint .= $propName . ': ' . $propValue . chr(10);
                }

                if (!empty($arElement['addsAr'])) {
                    foreach ($arElement['addsAr'] as $propValue) {
                        $addsDataForPrintTemp .= $propValue . chr(10);
                    }
                    $addsDataForPrint = chr(10) . 'Доп.опции*:' . chr(10) . $addsDataForPrintTemp . '* В стоимость не включено. Рассчитывается индивидуально с менеджером.';
                }

                $Sheet->setCellValueByColumnAndRow(0, $k + $J, $k + 1);

                $Sheet->setCellValueExplicit('B' . ($k + $J), $arElement['article'], PHPExcel_Cell_DataType::TYPE_STRING);
                $Sheet->setCellValueByColumnAndRow(2, $k + $J, $arElement['name'] . chr(10) . $selectDataForPrint . $addsDataForPrint);
                $Sheet->getStyleByColumnAndRow(2, $k + $J)->getAlignment()->setWrapText(true);
                $Sheet->setCellValueByColumnAndRow(3, $k + $J, explode(' ', $arElement['qnt'])[0]);
                $Sheet->setCellValueByColumnAndRow(4, $k + $J, explode(' ', $arElement['qnt'])[1]);
                $Sheet->setCellValueByColumnAndRow(5, $k + $J, number_format($arElement['price'], 2, ',', ' '));
                $Sheet->setCellValueByColumnAndRow(6, $k + $J, number_format($arElement['total'], 2, ',', ' '));
                $Sheet->getRowDimension($k + $J)->setRowHeight(180);

                $k++;
            }

            $Sheet->setCellValueByColumnAndRow(5, $k + $J, 'Итого:')->getStyleByColumnAndRow(6, $k + $J)->getFont()->setBold(true);
            $Sheet->setCellValueByColumnAndRow(6, $k + $J, number_format($price, 2, ',', ' '))->getStyleByColumnAndRow(7, $k + $J)->getFont()->setBold(true);


            $Sheet->getStyle('A1' . ':G' . ($k + $J))->applyFromArray($styleArray);
            $Sheet->getStyle('A' . ($J) . ':G' . ($k + $J))->applyFromArray($style_table);


            $objPHPExcel->setActiveSheetIndex(0);
            $objPHPExcel->removeSheetByIndex($a);


            $file_path = '';
            $file_dir = "/upload/files/";
            $file_path = $file_dir . 'Arlight.CP_' . $cNumber . '_' . date('d-m-y') . '_' . randomPassword(12) . '.xls';

            if (!is_dir($_SERVER['DOCUMENT_ROOT'] . $file_dir)) {
                mkdir($_SERVER['DOCUMENT_ROOT'] . $file_dir);
            }
            $objWriter = new PHPExcel_Writer_Excel5($objPHPExcel);
            $objWriter->save($_SERVER['DOCUMENT_ROOT'] . $file_path);
            $link = 'http://' . $_SERVER['SERVER_NAME'] . $file_path;
        }


        if (count($productsForLetter['customProducts'])) {
            $dataArr['productData'] = $productsForLetter;
            //переменные для письма
            $cNumber = 'C-' . $currentNumber;
            $orderTime = date('d-m-Y H:i:s');
            $hostURL = 'https://' . $_SERVER["SERVER_NAME"];
            $siteURL = $_SERVER["SERVER_NAME"];
            $currency = 'руб.';

            //сформируем табличку для письма с заказом из массива $dataArr
            $headerForClient = '<p style="font-size:19px;font-weight:bold;margin-bottom:28px">Здравствуйте, ' . $dataArr['userData']['name'] . ' ' . $dataArr['userData']['surname'] . '! Вы оформили заказ на индивидуальную сборку светильника на сайте ' . $siteURL . '.<br>Светильники других форм (квадрат, треугольник, круг и иные) вы можете заказать через менеджера.</p><hr>';
            $headerForAdmin = '<p style="font-size:19px;font-weight:bold;margin-bottom:28px">Здравствуйте! На сайте ' . $siteURL . ' был оформлен заказ на индивидуальную сборку.</p><hr>';
            $contentHTML = '<table bgcolor="#ffffff" cellpadding="0" cellspacing="0" width="600" style="background-color:#ffffff;border:medium;border-collapse:collapse"><tbody><tr style="border-bottom-color:#c7c8ca;border-bottom-style:solid;border-bottom-width:2px"><td style="padding:20px 0 20px 0"><span style="font-size:18pt">ЗАКАЗ </span><br>№ ' . $cNumber . '</td><td style="padding:20px 0 20px 0;text-align:right;vertical-align:top"><span style="color:#e1e1e1">' . $orderTime . '</span></td></tr></tbody></table><br><table bgcolor="#ffffff" cellpadding="0" cellspacing="0" width="600" style="background-color:#ffffff;border:medium;border-collapse:collapse"><tbody><tr><td style="padding:20px 0 20px 20px;text-align:left;vertical-align:top;width:50%">Клиент<br><b><span style="font-size:14pt">' . $dataArr['userData']['name'] . ' ' . $dataArr['userData']['surname'] . '</span></b><br><span style="font-size:11pt">' . $dataArr['userData']['mail'] . ' | ' . $dataArr['userData']['phone'] . '<br></span><br></td></tr></tbody></table><br>';
            if (isset($dataArr['productData']['customProducts']) && count($dataArr['productData']['customProducts'])) {
                $contentHTML .= '<p style="margin-bottom: 5px;"><b>Товары для сборки под заказ:</b></p><table bgcolor="#ffffff" cellpadding="5" cellspacing="0" width="600" style="background-color:#ffffff;border:medium;border-collapse:collapse;vertical-align:middle"><tbody><tr style="border-bottom-color:#c7c8ca;border-bottom-style:solid;border-bottom-width:1px;border-top-color:#c7c8ca;border-top-style:solid;border-top-width:1px"><td colspan="2"><span style="color:#d7d7d7">Товары</span></td><td><span style="color:#d7d7d7">Цена</span></td><td><span style="color:#d7d7d7">Количество</span></td></tr>';
                foreach ($dataArr['productData']['customProducts'] as $customProd) {
                    $contentHTML .= '<tr style="border-bottom-color:#c7c8ca;border-bottom-style:solid;border-bottom-width:1px"><td><img src="' . $hostURL . $customProd['image'] . '" width="70px" height="auto"></td><td><b>' . $customProd['article'] . '</b><br>' . $customProd['name'];
                    if (isset($customProd['selectData']) && count($customProd['selectData'])) {
                        $contentHTML .= '<hr style="border: none; color: #c7c8ca; background-color: #c7c8ca; height: 1px;">';
                        foreach ($customProd['selectData'] as $selectName => $optionVal) {
                            $contentHTML .= '<div style="font-size: 12px;"><b>' . $selectName . ': </b>' . $optionVal . '</div>';
                        }
                        if ($customProd['adds'] !== '') $contentHTML .= $customProd['adds'];
                    }
                    $contentHTML .= '</td>';
                    $price = (string)$customProd['price'];
                    $priceArr = explode('.', $price);
                    $priceHTML = number_format($priceArr[0], 0, '', ' ');
                    $priceHTML .= '<sup style="margin-left:4px;">';
                    $priceHTML .= (count($priceArr) == 2) ? $priceArr[1] : '00';
                    $priceHTML .= '</sup>';
                    $contentHTML .= '<td style="white-space:nowrap">' . $priceHTML . '<sub style="margin-left:-18px">' . $currency . '</sub></td><td>' . $customProd['qnt'] . '</td></tr><tr></tr>';
                }
                $contentHTML .= '</tbody></table>';
            }
            if (isset($dataArr['productData']['compatibles']) && count($dataArr['productData']['compatibles'])) {
                $contentHTML .= '<br><p style="margin-bottom: 5px;"><b>Сопутствующие товары:</b></p><table bgcolor="#ffffff" cellpadding="5" cellspacing="0" width="600" style="background-color:#ffffff;border:medium;border-collapse:collapse;vertical-align:middle"><tbody><tr style="border-bottom-color:#c7c8ca;border-bottom-style:solid;border-bottom-width:1px;border-top-color:#c7c8ca;border-top-style:solid;border-top-width:1px"><td colspan="2"><span style="color:#d7d7d7">Товары</span></td><td><span style="color:#d7d7d7">Цена</span></td><td><span style="color:#d7d7d7">Количество</span></td></tr>';
                foreach ($dataArr['productData']['compatibles'] as $customProd) {
                    $contentHTML .= '<tr style="border-bottom-color:#c7c8ca;border-bottom-style:solid;border-bottom-width:1px"><td><img src="' . $hostURL . $customProd['image'] . '" width="70px" height="auto"></td><td><b>' . $customProd['article'] . '</b><br>' . $customProd['name'] . '</td>';
                    $price = (string)$customProd['price'];
                    $priceArr = explode('.', $price);
                    $priceHTML = number_format($priceArr[0], 0, '', ' ');
                    $priceHTML .= '<sup style="margin-left:4px;">';
                    $priceHTML .= (count($priceArr) == 2) ? $priceArr[1] : '00';
                    $priceHTML .= '</sup>';
                    $contentHTML .= '<td style="white-space:nowrap">' . $priceHTML . '<sub style="margin-left:-18px">' . $currency . '</sub></td><td>' . $customProd['qnt'] . '</td></tr><tr></tr>';
                }
                $contentHTML .= '</tbody></table>';
            }
            $contentHTML .= '<table bgcolor="#ffffff" cellpadding="5" cellspacing="0" width="600" style="background-color:#ffffff;border:medium;border-collapse:collapse;vertical-align:middle"><tbody><tr style="vertical-align:bottom"><td></td><td></td><td style="padding:15px 0 15px 0"><br><br><span style="color:#ff0000"><b>ИТОГО</b></span></td><td style="padding:15px"><br><br><b>';
            $price = (string)$dataArr['productData']['totalPrice'];
            $priceArr = explode('.', $price);
            $priceHTML = number_format($priceArr[0], 0, '', ' ');
            $priceHTML .= '<sup style="margin-left:4px;">';
            $priceHTML .= (count($priceArr) == 2) ? $priceArr[1] : '';
            $priceHTML .= '</sup>';
            $contentHTML .= '<span style="color:#ff0000;white-space:nowrap">' . $priceHTML . '<span>' . $currency . '</span></span></b></td></tr>
<tr><td colspan="4"><a href="' . $link . '" style="color: #49535a;">Скачать файл коммерческого предложения</a></td></tr>
<tr><td colspan="2">
        <span style="color:#d7d7d7;font-size:11pt">Пожалуйста, при обращении к дилеру указывайте номер Вашего заказа - </span>
            <b style="color:#d7d7d7;font-size:11pt">' . $cNumber . '</b>
        <span style="color:#d7d7d7;font-size:11pt">.<br></span>
    </td><td></td><td></td></tr></tbody></table>';

            //запускаем почтовое событие
            $arEventFields = [
                'CLIENT_MAIL' => $dataArr['userData']['mail'],
                'CLIENT_HEADER' => $headerForClient,
                'SALE_HEADER' => $headerForAdmin,
                'CONTENT' => $contentHTML,
                'ORDER_NUM' => $cNumber
            ];
            $siteId = SITE_ID;
            if ($dataArr['siteID']) $siteId = $dataArr['siteID'];
            Event::send(array(
                "EVENT_NAME" => "CUSTOM_PRODUCTS_ORDER",
                "LID" => $siteId,
                "C_FIELDS" => $arEventFields
            ));

            //сохраняем данные
            $currDayData = [];
            $currDayFile = $storagePath . 'data_' . date('d-m-Y') . '.json';
            if (file_exists($currDayFile)) $currDayData = json_decode(json_encode(json_decode(file_get_contents($currDayFile))), true);
            $currDayData[$cNumber] = $dataArr;
            file_put_contents($currDayFile, json_encode($currDayData, JSON_UNESCAPED_UNICODE));
            if (isset($userFileName)) file_put_contents($userFileName, json_encode([], JSON_UNESCAPED_UNICODE));
            echo $currentNumber;
        }
    }
}