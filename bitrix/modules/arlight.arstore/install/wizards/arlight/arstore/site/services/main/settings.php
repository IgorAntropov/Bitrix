<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

use \Bitrix\Main\Localization\Loc;
use \Bitrix\Main\Loader;

COption::SetOptionString("fileman", "propstypes", serialize(array("description" => GetMessage("MAIN_OPT_DESCRIPTION"), "keywords" => GetMessage("MAIN_OPT_KEYWORDS"), "title" => GetMessage("MAIN_OPT_TITLE"), "keywords_inner" => GetMessage("MAIN_OPT_KEYWORDS_INNER"))), false, $siteID);
COption::SetOptionString("fileman", "menutypes", serialize(array("about_shop" => GetMessage("MENU_ABOUT_SHOP"))), false, $siteID);
COption::SetOptionInt("search", "suggest_save_days", 250);
COption::SetOptionString("search", "use_tf_cache", "Y");
COption::SetOptionString("search", "use_word_distance", "Y");
COption::SetOptionString("search", "use_social_rating", "Y");
COption::SetOptionString("iblock", "use_htmledit", "Y");
COption::SetOptionString("main", "optimize_css_files", "Y");
COption::SetOptionString("main", "optimize_js_files", "Y");
COption::SetOptionString("main", "use_minified_assets", "N");
COption::SetOptionString("main", "move_js_to_body", "Y");
COption::SetOptionString("main", "compres_css_js_files", "Y");
//COption::SetOptionString('main', 'custom_register_page', '/registration/');
COption::SetOptionString('main', 'new_user_registration', 'Y');

if (WIZARD_INSTALL_DEMO_DATA) {
    $arFields = [
        "SERVER_NAME" => $wizard->GetVar("serverName"),
        "SITE_NAME" => $wizard->GetVar("siteName")
    ];
    $obSite = new CSite();
    $obSite->Update(WIZARD_SITE_ID, $arFields);
    unset($arFields);
}
/**
 * ?????????? ????????????????? ???????? UF_TYPEPAYER (??? ???????????)
 */
$rsEnum = CUserFieldEnum::GetList(array(), array("ID" => "UF_TYPEPAYER"));
$arEnum = $rsEnum->Fetch();
if (!$arEnum) {
    $oUserTypeEntity = new CUserTypeEntity();
    $aUserFields = [
        'ENTITY_ID' => 'USER',
        'FIELD_NAME' => 'UF_TYPEPAYER',
        'USER_TYPE_ID' => 'enumeration',
        'XML_ID' => '',
        'SORT' => 100,
        'MULTIPLE' => '',
        'MANDATORY' => '',
        'SHOW_FILTER' => 'N',
        'SHOW_IN_LIST' => '',
        'EDIT_IN_LIST' => '',
        'IS_SEARCHABLE' => '',
        'SETTINGS' => array
        (
            'DISPLAY' => 'CHECKBOX',
            'LIST_HEIGHT' => 2,
            'CAPTION_NO_VALUE' => '',
            'SHOW_NO_VALUE' => 'N',
        ),

        'EDIT_FORM_LABEL' => array
        (
            'ru' => GetMessage("ARLIGHT_ARSTORE_TIP_PLATELQSIKA"),
            'en' => ''
        ),

        'LIST_COLUMN_LABEL' => array
        (
            'ru' => '',
            'en' => ''
        ),

        'LIST_FILTER_LABEL' => array
        (
            'ru' => '',
            'en' => ''
        ),

        'ERROR_MESSAGE' => array
        (
            'ru' => '',
            'en' => ''
        ),

        'HELP_MESSAGE' => array
        (
            'ru' => '',
            'en' => ''
        )
    ];
    $iUserFieldId = $oUserTypeEntity->Add($aUserFields); // int
    if ($iUserFieldId > 0) {
        $arAddEnum = [
            'n0' => [
                'XML_ID' => 'TYPE_PAYER_1',
                'VALUE' => GetMessage("ARLIGHT_ARSTORE_FIZ_LICO"),
                'DEF' => 'Y',
                'SORT' => 500
            ],
            'n1' => [
                'XML_ID' => 'TYPE_PAYER_2',
                'VALUE' => GetMessage("ARLIGHT_ARSTORE_UR_LICO"),
                'DEF' => 'N',
                'SORT' => 500
            ],
        ];

        $obEnum = new CUserFieldEnum();
        $obEnum->SetEnumValues($iUserFieldId, $arAddEnum);
    }
}

//????????? ?????? ???????
if($Module = CModule::CreateModuleObject('itertech.cart')){
    if (!$Module->IsInstalled()) {
        $Module->DoInstall();
    }
}

SetSettingsForCart();
SetDefaultSystem();

use \Itertech\Cart\DeliveryTable;
use \Itertech\Cart\PaymentTable;
use \Itertech\Cart\StatusTable;

/* ????????? ??? ?????? ???????*/
function SetSettingsForCart()
{
    $module_id = 'itertech.cart';
    $oneProp = COption::GetOptionString($module_id, "PROPERTY_PRICE_" . WIZARD_SITE_ID);

    if (!$oneProp) {
        $arOptions = [];
        $arOptions[] = array(
            "IBLOCK_ID",
            Loc::GetMessage("DC_PROPERTY_IBLOCK_ID"),
            CATALOG_ID,
        );
        $arOptions[] = array(
            "PROPERTY_PRICE",
            Loc::GetMessage("DC_PROPERTY_PRICE_NAME"),
            "PRICE",
        );
        $arOptions[] = array(
            "PROPERTY_OLDPRICE",
            Loc::GetMessage("DC_PROPERTY_OLDPRICE_NAME"),
            "OLDPRICE",
        );
        $arOptions[] = array(
            "THOUSANDS_SEPARATOR",
            Loc::GetMessage("DC_THOUSANDS_SEPARATOR"),
            "",
        );
        $arOptions[] = array(
            "CURRENCY",
            Loc::GetMessage("DC_CURRENCY"),
            COption::GetOptionString("main", "currency", '???.'),
        );
        $arOptions[] = array(
            "DECIMALS",
            Loc::GetMessage("DC_DECIMALS"),
            "Y",
        );
        $arOptions[] = array(
            "DELIMITER_DECIMALS",
            Loc::GetMessage("DC_DELIMITER_DECIMALS"),
            "<sup>*</sup>",
        );
        $arOptions[] = array(
            "PROPERTY_ARTNUMBER",
            Loc::GetMessage("DC_PROPERTY_ARTNUMBER_NAME"),
            "ARTICLE",
        );
        $arOptions[] = array(
            "PROPERTY_INSTOCK",
            Loc::GetMessage("DC_PROPERTY_INSTOCK"),
            "STOCK_SUMMARY",
        );
        $arOptions[] = array(
            "PROPERTY_PACKAGE",
            Loc::GetMessage("DC_PROPERTY_PACKAGE"),
            "PACK",
        );
        $arOptions[] = array(
            "PROPERTY_PACKAGE_COUNT",
            Loc::GetMessage("DC_PROPERTY_PACKAGE_COUNT"),
            "PACKNORM",
        );
        $arOptions[] = array(
            "PROPERTY_UNIT",
            Loc::GetMessage("DC_PROPERTY_UNIT"),
            "UNIT",
        );
        $arOptions[] = array(
            "PROPERTY_LENGTH",
            Loc::GetMessage("DC_PROPERTY_LENGTH"),
            "PACKAGE_LENGTH",
        );
        $arOptions[] = array(
            "PROPERTY_WIDTH",
            Loc::GetMessage("DC_PROPERTY_WIDTH"),
            "PACKAGE_WIDTH",
        );
        $arOptions[] = array(
            "PROPERTY_HEIGHT",
            Loc::GetMessage("DC_PROPERTY_HEIGHT"),
            "PACKAGE_HEIGHT",
        );
        $arOptions[] = array(
            "PROPERTY_WEIGHT",
            Loc::GetMessage("DC_PROPERTY_WEIGHT"),
            "PACKAGE_WEIGHT",
        );
        $arOptions[] = array(
            "PROPERTY_VOLUME",
            Loc::GetMessage("DC_PROPERTY_VOLUME"),
            "PACKAGE_VOLUME",
        );
        $arOptions[] = array(
            "FIELD_IMAGE",
            Loc::GetMessage("DC_FIELD_IMAGE"),
            "PREVIEW_PICTURE",
        );
        $arOptions[] = array(
            "PROPERTY_IMAGE",
            Loc::GetMessage("DC_PROPERTY_IMAGE"),
            "",
        );
        $arOptions[] = array(
            "FIELD_DESCRIPTION",
            Loc::GetMessage("DC_FIELD_DESCRIPTION"),
            "NO",
        );
        $arOptions[] = array(
            "PROPERTY_DESCRIPTION",
            Loc::GetMessage("DC_PROPERTY_DESCRIPTION"),
            "DESCRIPTION",
        );
        $arOptions[] = array(
            "CACHE_TIME",
            Loc::GetMessage("DC_CACHE_TIME"),
            "30",
        );
        $arOptions[] = array(
            "CHANGE_BUTTON_TEXT",
            Loc::GetMessage("DC_CHANGE_BUTTON_TEXT"),
            Loc::GetMessage("DC_CHANGE_BUTTON_TEXT_DEFAULT"),
        );
        $arOptions[] = array(
            "FORMS_PLURAL",
            Loc::GetMessage("DC_FORMS_PLURAL"),
            Loc::GetMessage("DC_FORMS_PLURAL_DEFAULT"),
        );
        $arOptions[] = array(
            "ADD_USER_GROUPS",
            Loc::GetMessage("DC_ADD_USER_GROUPS"),
            '3,4',
        );
        $arOptions[] = array(
            "PAGENAV",
            Loc::GetMessage("DC_PAGENAV"),
            "20",
        );
        $arOptions[] = array(
            "DEBUG",
            Loc::GetMessage("DC_DEBUG"),
            "",
        );
        $arOptions[] = array(
            "REQ_ADRES",
            Loc::GetMessage("DC_REQ_ADRES"),
            "Y",
        );

        foreach ($arOptions as $itemAr) {
            $name = $itemAr[0] . '_' . WIZARD_SITE_ID;
            $val = $itemAr[2];
            COption::SetOptionString($module_id, $name, $val);
        }
        unset($itemAr);
    }
}

/*?????????? ????????? ???????? ??????, ????????, ????????*/
function SetDefaultSystem()
{
    if (WIZARD_SITE_ID != 's1') {
        $module_id = 'itertech.cart';
        if (!Loader::includeModule($module_id)) {
            ShowError('Module '.$module_id.' not install');
            die();
        }

        $arDeliveries = WorkOrder::getDelivery(WIZARD_SITE_ID, 'Y');
        if (empty($arDeliveries)) {
            $deliveryAr = [
                [
                    'NAME' => GetMessage("DELIVERY_1_TITLE"),
                    'PRICE' => '0',
                    'SORT' => '100',
                    'ACTIVE' => 'Y',
                    'DESCRIPTION' => GetMessage("DELIVERY_1_DESCR"),
                    'DELIVERY_TYPE' => 'pickup',
                    'SITE_ID' => WIZARD_SITE_ID
                ], [
                    'NAME' => GetMessage("DELIVERY_2_TITLE"),
                    'PRICE' => '0',
                    'SORT' => '200',
                    'ACTIVE' => 'Y',
                    'DESCRIPTION' => GetMessage("DELIVERY_2_DESCR"),
                    'SITE_ID' => WIZARD_SITE_ID
                ], [
                    'NAME' => GetMessage("DELIVERY_3_TITLE"),
                    'PRICE' => '0',
                    'SORT' => '300',
                    'ACTIVE' => 'Y',
                    'DESCRIPTION' => GetMessage("DELIVERY_3_DESCR"),
                    'SITE_ID' => WIZARD_SITE_ID
                ],
            ];
            foreach ($deliveryAr as $arFields) {
                DeliveryTable::add($arFields);
            }
            unset($arFields);
        }

        $arPayments = WorkOrder::getPayment(WIZARD_SITE_ID, 'Y');
        if (empty($arPayments)){
            $paymentsAr = [
                [
                    'NAME' => GetMessage("PAYMENT_1_TITLE"),
                    'SORT' => '100',
                    'ACTIVE' => 'Y',
                    'DESCRIPTION' => GetMessage("PAYMENT_1_DESCR"),
                    'SITE_ID' => WIZARD_SITE_ID,
                    'PAYMENT_TYPE' => 'custom'
                ], [
                    'NAME' => GetMessage("PAYMENT_2_TITLE"),
                    'SORT' => '200',
                    'ACTIVE' => 'Y',
                    'DESCRIPTION' => GetMessage("PAYMENT_2_DESCR"),
                    'SITE_ID' => WIZARD_SITE_ID,
                    'PAYMENT_TYPE' => 'custom'
                ]
            ];
            foreach ($paymentsAr as $arFields) {
                PaymentTable::add($arFields);
            }
            unset($arFields);
        }

        $arStatus = WorkOrder::getStatus(WIZARD_SITE_ID, 'Y');
        if (empty($arStatus)){
            $statusesAr = [
                [
                    'SITE_ID' => WIZARD_SITE_ID,
                    'NAME' => GetMessage("STATUS_1_TITLE"),
                    'DESCRIPTION' => '',
                    'SEND_MESSAGE' => '',
                    'ACTIVE' => 'Y',
                    'DEFAULT' => 'Y',
                    'FOR_PAYMENT' => '',
                    'SORT' => '100',
                ], [
                    'SITE_ID' => WIZARD_SITE_ID,
                    'NAME' => GetMessage("STATUS_2_TITLE"),
                    'DESCRIPTION' => '',
                    'SEND_MESSAGE' => '',
                    'ACTIVE' => 'Y',
                    'DEFAULT' => '',
                    'FOR_PAYMENT' => 'Y',
                    'SORT' => '200',
                ], [
                    'SITE_ID' => WIZARD_SITE_ID,
                    'NAME' => GetMessage("STATUS_3_TITLE"),
                    'DESCRIPTION' => '',
                    'SEND_MESSAGE' => '',
                    'ACTIVE' => 'Y',
                    'DEFAULT' => '',
                    'FOR_PAYMENT' => '',
                    'SORT' => '300',
                ], [
                    'SITE_ID' => WIZARD_SITE_ID,
                    'NAME' => GetMessage("STATUS_4_TITLE"),
                    'DESCRIPTION' => '',
                    'SEND_MESSAGE' => '',
                    'ACTIVE' => 'Y',
                    'DEFAULT' => '',
                    'FOR_PAYMENT' => '',
                    'SORT' => '400',
                ], [
                    'SITE_ID' => WIZARD_SITE_ID,
                    'NAME' => GetMessage("STATUS_5_TITLE"),
                    'DESCRIPTION' => '',
                    'SEND_MESSAGE' => '',
                    'ACTIVE' => 'Y',
                    'DEFAULT' => '',
                    'FOR_PAYMENT' => '',
                    'SORT' => '500',
                ],
            ];
            foreach ($statusesAr as $arFields) {
                StatusTable::add($arFields);
            }
            unset($arFields);
        }
    }
}
?>