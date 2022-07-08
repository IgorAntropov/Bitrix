<?
define("STOP_STATISTICS", true);
define('NO_AGENT_CHECK', true);
set_time_limit(0);
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
use \Bitrix\Main\Loader;
if (!Loader::includeModule("iblock")) return;

if(isset($_POST) && isset($_POST['dataUpdate']) && trim($_POST['dataUpdate']) !== ''){
    $dataJSON = trim($_POST['dataUpdate']);
    $dataArr = json_decode(json_encode(json_decode($dataJSON)), true);
    if(is_array($dataArr)){
        $userID = GetUserID();
        if($userID && $userID !== ''){
            $storeDir = $_SERVER["DOCUMENT_ROOT"].  '/upload/custom-lamps-orders';
            if (!file_exists($storeDir)) mkdir($storeDir);
            $dateIndex = date('d-m-Y-H-i-s');
            if(isset($dataArr['update_id'])){
                $dateIndex = $dataArr['update_id'];
                unset($dataArr['update_id']);
            }
            $userFileName = $storeDir.'/'.$userID.'.json';
            $dataProduct = [];
            if(file_exists($userFileName)){
                $dataProduct = json_decode(json_encode(json_decode(file_get_contents($userFileName))), true);
            }
            $dataProduct[$dateIndex] = $dataArr;
            file_put_contents($userFileName, json_encode($dataProduct, JSON_UNESCAPED_UNICODE));
            echo 'ok';
        }
    }
} elseif (isset($_POST) && isset($_POST['dataDelete']) && $_POST['dataDelete'] !== ''){
    $userID = GetUserID();
    if($userID && $userID !== ''){
        $storeDir = $_SERVER["DOCUMENT_ROOT"].  '/upload/custom-lamps-orders';
        $dateIndex = $_POST['dataDelete'];
        $userFileName = $storeDir.'/'.$userID.'.json';
        $dataProduct = [];
        if(file_exists($userFileName)){
            $dataProduct = json_decode(json_encode(json_decode(file_get_contents($userFileName))), true);
            if(isset($dataProduct[$dateIndex])) unset($dataProduct[$dateIndex]);
            file_put_contents($userFileName, json_encode($dataProduct, JSON_UNESCAPED_UNICODE));
            echo 'ok';
        }
    }
} elseif (isset($_POST) && isset($_POST['dataPlus']) && $_POST['dataPlus'] !== ''){
    $userID = GetUserID();
    if($userID && $userID !== ''){
        $storeDir = $_SERVER["DOCUMENT_ROOT"].  '/upload/custom-lamps-orders';
        $dateIndex = $_POST['dataPlus'];
        $userFileName = $storeDir.'/'.$userID.'.json';
        $dataProduct = [];
        if(file_exists($userFileName)){
            $dataProduct = json_decode(json_encode(json_decode(file_get_contents($userFileName))), true);
            if(isset($dataProduct[$dateIndex])){
                $qnt = (int)$dataProduct[$dateIndex]['quantity'] + 1;
                $piecePrice = (float)$dataProduct[$dateIndex]['lampPrice'];
                $newPrice = $piecePrice * $qnt;
                $dataProduct[$dateIndex]['quantity'] = $qnt;
                $dataProduct[$dateIndex]['totalPrice'] = $newPrice;
                file_put_contents($userFileName, json_encode($dataProduct, JSON_UNESCAPED_UNICODE));
                echo 'ok';
            }
        }
    }
}elseif (isset($_POST) && isset($_POST['dataMinus']) && $_POST['dataMinus'] !== ''){
    $userID = GetUserID();
    if($userID && $userID !== ''){
        $storeDir = $_SERVER["DOCUMENT_ROOT"].  '/upload/custom-lamps-orders';
        $dateIndex = $_POST['dataMinus'];
        $userFileName = $storeDir.'/'.$userID.'.json';
        $dataProduct = [];
        if(file_exists($userFileName)){
            $dataProduct = json_decode(json_encode(json_decode(file_get_contents($userFileName))), true);
            if(isset($dataProduct[$dateIndex])){
                if((int)$dataProduct[$dateIndex]['quantity'] > 1){
                    $qnt = (int)$dataProduct[$dateIndex]['quantity'] - 1;
                    $piecePrice = (float)$dataProduct[$dateIndex]['lampPrice'];
                    $newPrice = $piecePrice * $qnt;
                    $dataProduct[$dateIndex]['quantity'] = $qnt;
                    $dataProduct[$dateIndex]['totalPrice'] = $newPrice;
                    file_put_contents($userFileName, json_encode($dataProduct, JSON_UNESCAPED_UNICODE));
                    echo 'ok';
                }
            }
        }
    }
}

