<?php
$serverName = $_SERVER['HTTP_HOST'];
if(stristr($serverName, 'www.')){
    $locationNew = 'https://'.str_replace('www.', '', $serverName).$_SERVER['REQUEST_URI'];
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: " . $locationNew);
    exit();
}
$requestURL = $_SERVER['REQUEST_URI'];
$requestURLNew = $requestURL;

if(stristr($requestURL, '/catalog/') && !stristr($requestURL, '/apply/') && !isset($_POST) && !isset($_GET)){
    $requestURL = str_replace('.html', '', $requestURL);
    if($requestURL[strlen($requestURL)-1] !== '/') $requestURLNew = $requestURL.'/';
    $requestURLNewClean = $requestURLNew;
    if($requestURLNewClean[0] === '/') $requestURLNewClean[0] = '';
    if($requestURLNewClean[strlen($requestURLNewClean)-1] === '/') $requestURLNewClean[strlen($requestURLNewClean)-1] = '';
    $currentURIArr = explode('/', trim($requestURLNewClean));
    $currentURIArrFix = [];
    foreach ($currentURIArr as $value){
        if(trim($value) !== '') $currentURIArrFix[] = $value;
    }
    if(count($currentURIArrFix) == 3) $currentURIArr = $currentURIArrFix;
    if(count($currentURIArr) === 3 && trim($currentURIArr[1]) !== 'product'){
        $prodName = $currentURIArr[2];
        $prodNameArr = explode('-', $prodName);
        if(count($prodNameArr)){
            $prodNameArr = array_reverse($prodNameArr);
            $article = trim($prodNameArr[0]);
            if(file_exists($_SERVER["DOCUMENT_ROOT"] . SITE_DIR. 'cron/catalog_import/data/json/product_ids.json')){
                $jsonArticlesArr = json_decode(json_encode(json_decode(file_get_contents($_SERVER["DOCUMENT_ROOT"] . SITE_DIR. 'cron/catalog_import/data/json/product_ids.json'))), true);
                if(isset($jsonArticlesArr[$article])){
                    $currentURIArr[1] = 'product';
                    $requestURLNew = '/'.implode('/', $currentURIArr).'/';

                }
            }
        }
    }
}
if(trim($requestURL) !== trim($requestURLNew)){
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: " . trim($requestURLNew));
    exit();
}

define('MAX_PRICE_INCREASE_PERCENTS', 20);

define('SECTION_RM_XML_ID', 100020);
define('SECTION_SM_XML_ID', 100001);
define('SECTION_KP_XML_ID', 100021);
define('SECTION_SD_XML_ID', 100019);
define('SECTION_SP_XML_ID', 100018);
define('SECTION_SS_XML_ID', 100010);
define('SECTION_AP_XML_ID', 100011);
define('SECTION_US_XML_ID', 100008);
define('SECTION_BP_XML_ID', 100006);
define('SECTION_SL_XML_ID', 100002);

define('SECTION_RM_CODE', 'reklamnye-materialy-100020');
define('SECTION_SM_CODE', 'svetodiody-i-moduli-100001');
define('SECTION_KP_CODE', 'kabelnaya-produktsiya-100021');
define('SECTION_SD_CODE', 'svetodiodnyy-dekor-100019');
define('SECTION_SP_CODE', 'svetodiodnye-prozhektory-100018');
define('SECTION_SS_CODE', 'svetodiodnye-svetilniki-100010');
define('SECTION_AP_CODE', 'alyuminievye-profili-100011');
define('SECTION_US_CODE', 'upravlenie-svetom-100008');
define('SECTION_BP_CODE', 'bloki-pitaniya-100006');
define('SECTION_SL_CODE', 'svetodiodnye-lenty-100002');

define('GR_SADM_ID', 1);
define('GR_ADM_ID', '#STORE_ADMIN_ID#');

define('CATALOGS_ID', '#DOC_CATALOG_IBLOCK_ID#');
define('CERTIFICATES_FROM_BASE_ID', '#CERTIFICATES_FROM_BASE_IBLOCK_ID#');
define('CATALOG_ID', '#CATALOG_IBLOCK_ID#');
define('NEWS_ID', '#NEWS_IBLOCK_ID#');
define('BANNERS_ID', '#SLIDER_IBLOCK_ID#');
define('CONTACTS_ID', '#STORES_IBLOCK_ID#');
define('PROJECTS_ID', '#PROJECT_IBLOCK_ID#' );
define('EVENTS_ID', '#WEBARCHIVE_IBLOCK_ID#' );
define('VIDEO_ID', '#VIDEO_IBLOCK_ID#');
const FEEDBACK_RESULT_ID = '#FEEDBACK_RESULT_IBLOCK_ID#';
const SUBSCRIBE_RESULT_ID = '#SUBSCRIBE_RESULT_IBLOCK_ID#';
const ARTICLES_ID = '#ARTICLE_IBLOCK_ID#';
const SCHEME_ID = '#SCHEME_IBLOCK_ID#';
const CALC_ID = '#CALC_IBLOCK_ID#';

/*??????????????????*/
define('BLOCKING', COption::GetOptionString("header_action", "blocking", 'false'));
define('DEMOVERSION', COption::GetOptionString("header_action", "demoversion", 'false'));
define('SHOW_STOCK', COption::GetOptionString("header_action", "showstock", false));
define('STATUS_TOOLTIP', '???????????????????? ?????????? ???????????? ?????? ?????????????? ???????? ??????????????????????????. ???????? ???????????????????? ???????????? ?????????????????? ?? ??????????????????.');
//?????????????????????????? true ?????? ?????????????????????? ????????????
define("BELARUS", COption::GetOptionString("main", "belarus", false));

define('CURRENCY',  COption::GetOptionString("main", "currency", '?'));
define('CLOSE_CATALOG', false);

if(file_exists($_SERVER["DOCUMENT_ROOT"] . SITE_DIR. 'assets/json/customProductsPricesFrom.json'))
    define('CUSTOM_PRODUCTS', true);

require_once $_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/" . SITE_ID . "/include/DelTypeScript.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/" . SITE_ID . "/include/resizeImage.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/" . SITE_ID . "/include/PriceFormat.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/" . SITE_ID . "/include/IncludeContent.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/" . SITE_ID . "/include/PluralRules.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/" . SITE_ID . "/include/ColorLight.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/" . SITE_ID . "/include/GetIBlockSectionId.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/" . SITE_ID . "/include/GetArrayOrString.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/" . SITE_ID . "/include/PrepareLinksSocNetwork.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/" . SITE_ID . "/include/CountElementInSection.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/" . SITE_ID . "/include/FacetFilterCustom.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/" . SITE_ID . "/include/AddCustomFieldsToMailTemplate.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/" . SITE_ID . "/include/NumberPageToTitle.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/" . SITE_ID . "/include/GetIdSectionFromXmlId.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/" . SITE_ID . "/include/Helpers.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/" . SITE_ID . "/include/UserId.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/" . SITE_ID . "/include/GetIP.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/" . SITE_ID . "/include/RandomPassword.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/" . SITE_ID . "/include/HandlerForEventsYM.php";

function _pr($item, $show_for = false) {
    global $USER;
    if ($USER->IsAdmin() || $show_for == 'all') {
        if (!$item) echo ' <br />?????????? <br />';
        elseif (is_array($item) && empty($item)) echo '<br />???????????? ???????? <br />';
        else echo ' <pre>' . print_r($item, true) . ' </pre>';
    }
}


