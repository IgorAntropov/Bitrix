<?php

namespace CatalogImportJSON;
use Bitrix\Iblock\Model\PropertyFeature;
use Bitrix\Iblock\PropertyTable;
use Bitrix\Iblock\SectionPropertyTable;
use Bitrix\Main\ArgumentException;
use Bitrix\Main\ArgumentNullException;
use Bitrix\Main\ArgumentOutOfRangeException;
use Bitrix\Main\Config\Option;
use Bitrix\Iblock\PropertyIndex\Manager;
use Bitrix\Main\DB\SqlQueryException;
use Bitrix\Main\Loader;
use Bitrix\Main\LoaderException;
use Bitrix\Main\ObjectPropertyException;
use Bitrix\Main\SystemException;
use CIBlockElement;
use CIBlockProperty;
use CIBlockPropertyEnum;
use CIBlockSection;
use CIBlock;
use CBitrixComponent;
use CModule;
use CUtil;
use DOMDocument;
use CFile;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class CatalogImportIteratorJSON{
    protected $assetsData = [];
    protected $groupsToOldGroups = [];
    protected $dumpFile;
    protected $dump = '';
    protected $extraPrice = false;
    protected $fillGroupsArrayLevels = [];
    protected $fillGroupsCurrentLevel = [];
    protected $groupsSort = 0;
    protected $groupsErrors = false;
    protected $groupsUpdated = 0;
    protected $groupsAdded = 0;
    protected $productProps = [];
    protected $product = [];
    protected $productAdd = 0;
    protected $productUpdate = 0;
    protected $productErrors = 0;
    protected $analoguesUpdate = 0;
    protected $relatedUpdate = 0;
    protected $accessoriesUpdate = 0;
    protected $additionalFiles = 0;
    protected $articlesToID = [];
    protected $groupsSortedArray = [];
    protected $updatePropsData = [];
    protected $updateGroupsArray = [];
    protected $developersArr = [];
    protected $unitsArr = [];
    protected $saleNowArticles = [];
    protected $newNowArticles = [];
    protected $prodsToCompareArrNewRaw = [];
    protected $updateProdsFiles = [];
    protected $productsWithComponents = [];
    protected $arrRelated = [];
    protected $arrAnalogues = [];
    protected $arrAccessories = [];
    protected $arrayFilesMD5 = [];
    protected $arrayFilesDownload = [];
    protected $prodsToAllGroups = [];
    protected $colorsPropT58 = [];

    /**
     * @throws ArgumentNullException
     * @throws LoaderException
     * @throws ArgumentOutOfRangeException
     */
    function __construct($extraPercents=false){
        if (!Loader::includeModule("iblock")) return;
        if(Option::get('CATALOG_IMPORT', 'ITERATION_STOPPER', false)) return;
        Option::set('CATALOG_IMPORT', 'ITERATION_STOPPER', true);
        $accessAr = unserialize(Option::get('arlight.assets', 'access'));
        $this->assetsData = [
            'files_root' => $_SERVER["DOCUMENT_ROOT"] . SITE_DIR . 'cron/catalog_import/',
            'username' => $accessAr['login'],
            'password' => $accessAr['password'],
            'divider' => '*****************************************',
            'assetsJSONs' => [
                'groups.json' => 'https://assets.transistor.ru/catalog/v3/sites/groups.json',
                'brands.json' =>  'https://assets.transistor.ru/catalog/v3/sites/brands.json',
                'certificates.json' => 'https://assets.transistor.ru/catalog/v3/sites/certificates.json',
                'certificate_types.json' => 'https://assets.transistor.ru/catalog/v3/sites/cert_types.json',
                'statuses.json' => 'https://assets.transistor.ru/catalog/v3/sites/statuses.json',
                'units.json' => 'https://assets.transistor.ru/catalog/v3/sites/units.json',
                'params_categories.json' => 'https://assets.transistor.ru/catalog/v3/sites/CategoryParameters.json',
                'actions_types.json' => 'https://assets.transistor.ru/catalog/v3/sites/actiontypes.json',
                'products_relations.json' => 'https://assets.transistor.ru/catalog/v3/sites/relations.json',
                'products.json' => 'https://assets.transistor.ru/catalog/v3/sites/products.json',
                'marketing_products.json' => 'https://assets.transistor.ru/catalog/v3/marketing/products.json',
                'marketing_groups.json' => 'https://assets.transistor.ru/catalog/v3/marketing/groups.json',
                'marketing_series.json' => 'https://assets.transistor.ru/catalog/v3/marketing/series.json',
                'marketing_seriesDescriptionsTypes.json' => 'https://assets.transistor.ru/catalog/v3/marketing/seriesDescriptionsTypes.json',
                'marketing_GroupViewDisplay.json' => 'https://assets.transistor.ru/catalog/v3/marketing/GroupViewDisplay.json',
                'projects_products.json' => 'https://assets.transistor.ru/projects/v3/sites/products.json',
                'projects_options.json' => 'https://assets.transistor.ru/projects/v3/sites/options.json',
                'projects_groups.json' => 'https://assets.transistor.ru/projects/v3/sites/groups.json',
                'dealers_groups.json' => 'https://assets.transistor.ru/catalog/v3/dealer/groups.json',
                'parameters.json' => 'https://assets.transistor.ru/catalog/v3/sites/parameters.json'
            ],
            'xml_codes' => [
                'ledribbon' => '332',
                'supply' => '64',
                'lightcontrol' => '392',
                'profile' => '390',
                'ledlamps' => '431',
                'outdoorligting' => '63',
                'leddecoration' => '80',
                'cableproduction' => '316',
                'ledmodules' => '219',
                'promotional' => '832',
                'sale' => '1450'
            ]
        ];
        $this->groupsToOldGroups = [
            332 => 100002,
            64 => 100006,
            392 => 100008,
            390 => 100011,
            431 => 100010,
            63 => 100018,
            80 => 100019,
            316 => 100021,
            219 => 100001,
            832 => 100020,
            1450 => 100099
        ];
        $this->MakeDirectory(['log']);
        $this->dumpFile = $this->assetsData['files_root'].'log/import_'.date("d-m-Y").'.txt';
        $this->extraPrice = $extraPercents;
    }

    /**
     * @throws ArgumentOutOfRangeException
     */
    function __destruct(){
        $this->dump .= date('d-m-Y h:i:s')."\n".$this->assetsData['divider']."\n";
        if (file_exists($this->dumpFile)) file_put_contents($this->dumpFile, $this->dump."\n", FILE_APPEND);
        else file_put_contents($this->dumpFile, $this->dump."\n");
        Option::set('CATALOG_IMPORT', 'ITERATION_STOPPER', false);
        Option::set('CATALOG_IMPORT', 'ITERATION_STOPPER_PRICE_QNT_UPDATER', false);
    }

    /**
     * @throws ArgumentNullException
     * @throws ArgumentOutOfRangeException
     * @throws ArgumentException
     * @throws ObjectPropertyException
     * @throws SystemException
     */
    public function Iteration(){
        if(!$this->CheckAccess()) return;
        $this->ClearCatalog();
        $this->MakeDirectory(['tmp_files', 'data', 'data/json', 'data/JSON_categories', 'data/JSON_categories_sandbox']);
        $this->PrepareToDownload();
        if(!$this->DownloadJSONs()) return;
        $this->PrepareJSONs();
        $this->ArticlesInXML();
        if(!$this->SortGroups()) return;
        if(!$this->FillGroups()) return;
        $this->UpdateProductsPrepare();
        $this->UpdateProducts();
        $this->LinkElements();
        $this->RemoveOldProducts();
        $this->ClearGroups();
        $this->ProductsToManyGroups();
        $this->UpdateGroupsPictures();
        $this->UpdateBYNPricesAndQnt();
        $this->UpdateGroups();
        $this->CleanResizeCache();
        $this->ProjectsJSON();
        $this->SortProductsByGroups();
        $this->UpdateCertificates();
        $this->UpdateProdsWithCertificates();
        $this->CalcProps();
        $this->RemoveOldPictures();
        $this->YandexMarketProperties();
        $this->FilesForSmartFilter();
        $this->ProductCardPropertiesToShow();
        $this->UpdateFacetIndex();
        $this->AddAdditionalFiles();
        $this->DownloadFilesOneTime();
        $this->DownloadContent();
        $this->LogNow(date('d-m-Y h:i:s') . " \n" . "Операция прошла успешно. Импорт контента закончен." . " \n");
    }

    private function UpdateFacetIndex(){
        $this->LogNow(date('d-m-Y H:i:s') . " \n" . "Обновляем фасетные индексы" ." \n");
        Manager::DeleteIndex(CATALOG_ID);
        Manager::markAsInvalid(CATALOG_ID);
        $index = Manager::createIndexer(CATALOG_ID);
        $index->startIndex();
        $index->continueIndex();
        $index->endIndex();
        Manager::checkAdminNotification();
        CBitrixComponent::clearComponentCache("bitrix:catalog.smart.filter");
        CIBlock::clearIblockTagCache(CATALOG_ID);
    }

    /**
     * @throws ArgumentException
     * @throws ObjectPropertyException
     * @throws SystemException
     */
    private function FilesForSmartFilter(){
        $this->LogNow(date('d-m-Y H:i:s') . " \n" . "Новые файлы настроек для умного фильтра." . " \n");
        //новые файлы настроек для умного фильтра
        $groups = $this->GetJson('groups', $this->assetsData['files_root'].'data/JSON_categories/');
        $arParam = $this->GetJson('parameters', $this->assetsData['files_root'].'data/JSON_categories/');

        $filterSettDir = $_SERVER['DOCUMENT_ROOT'] . SITE_DIR. 'assets/json/filters/';
        if (!file_exists($filterSettDir)) mkdir($filterSettDir);

        if (!empty($groups) && !empty($arParam)) {
            //очистить папку с файлами настройки
            array_map('unlink', glob($filterSettDir . "*"));
            $groupsToOldGroups = $this->groupsToOldGroups;
            $parametersTemp = $arParam['data']['parameters'];
            $parameters = [];
            foreach ($parametersTemp as $param) $parameters[(int)$param['id']] = $param;
            $grWithFilter = [];
            foreach ($groups as $gr) if (!empty($gr['filters'])) $grWithFilter[$gr['id']] = $gr;

            $arReplaceCode = [
                '153' => 'COLOR_HREF'
            ];

            $listPropForSmartFilter = [];

            foreach ($grWithFilter as $gr) {
                $idGroup = $gr['id'];
                $filterForGroup = [];
                foreach ($gr['filters'] as $param) {
                    $paramId = (int)$param['id'];
                    //если значение свойства из селекта
                    $is_select = false;
                    if (!empty($parameters[$paramId]['select'])) $is_select = true;

                    $paramType = 'T';
                    $paramTypeTemp = $parameters[$paramId]['type'];
                    if (isset($paramTypeTemp) && ($paramTypeTemp == 'range' || ($paramTypeTemp == 'number' && !$is_select))) $paramType = 'N';

                    $paramCode = $paramType . '_' . $paramId;
                    if (isset($arReplaceCode[$paramId]))
                        $paramCode = $arReplaceCode[$paramId];

                    $listPropForSmartFilter[$paramCode] = $paramCode;

                    $paramValue = [];
                    //значения свойств
                    if (!empty($param['values'])) {
                        foreach ($param['values'] as $value) {
                            $val = $value['value'];
                            if ($paramCode != 'COLOR_HREF'&& $is_select && (isset($parameters[$paramId]['select'][(int)$val]) || isset($parameters[$paramId]['select'][$val]))) {
                                if (isset($parameters[$paramId]['select'][$val])) $val = $parameters[$paramId]['select'][$val];
                                elseif (isset($parameters[$paramId]['select'][(int)$val])) $val = $parameters[$paramId]['select'][(int)$val];
                            }
                            $valKey = str_replace(['>', '<'], ['&gt;', '&lt;'], $val);
                            if ($paramCode == 'COLOR_HREF') {
                                $valKey = $val;
                                $val = $parameters[$paramId]['select'][$val];
                            }
                            $paramValue[$valKey] = [
                                "name" => $val,
                                "sort" => $value['order'],
                                "show" => true
                            ];
                        }
                    }
                    //свойства
                    if (isset($filterForGroup[$paramCode])) {
                        //если такое свойство уже есть
                        $filterForGroup[$paramCode]["props"] = array_merge($filterForGroup[$paramCode]["props"], $paramValue);
                    } else
                        $filterForGroup[$paramCode] = [
                            "name" => $parameters[$paramId]['name'],
                            "group" => false,
                            "sort" => $param['order'],
                            "props" => $paramValue,
                            "descript"=>$parameters[$paramId]['descript']
                        ];
                    $filterForGroup['COLOR_HEX_MULTIPLE'] = $filterForGroup['COLOR_HREF'];
                }
                unset($param);

                if (isset($groupsToOldGroups[$idGroup])) $idGroup = $groupsToOldGroups[$idGroup];
                $this->UpdateJson(['filterSettings_' . (int)$idGroup => $filterForGroup], $filterSettDir);
            }

            if (!empty($listPropForSmartFilter)) {
                //id свойств
                $dbarProps = PropertyTable::getList(array(
                    'select' => array('*'),
                    'filter' => array('IBLOCK_ID' => CATALOG_ID, 'CODE' => $listPropForSmartFilter)
                ));
                $dbCode = [];
                while ($prop = $dbarProps->fetch()) {
                    $dbCode[$prop['ID']] = $prop;
                }
                //список свойств,которые нужно добавить в умный фильтр
                $dbSmartForAdd = [];
                $dbarPropsSmart = SectionPropertyTable::getList(array(
                    'filter' => array('IBLOCK_ID' => CATALOG_ID, 'PROPERTY_ID' => array_keys($dbCode))
                ));
                while ($prop = $dbarPropsSmart->fetch()) {
                    if ($prop['PROPERTY_ID'] && $prop['SMART_FILTER'] != 'Y')
                        $dbSmartForAdd[] = $prop['PROPERTY_ID'];
                }

                // добавление свойства в умный фильтр:
                if (!empty($dbSmartForAdd)) {
                    foreach ($dbSmartForAdd as $propID) {
                        $arFields = Array('SMART_FILTER' => 'Y', 'IBLOCK_ID' => CATALOG_ID);
                        $ibp = new CIBlockProperty();
                        $ibp->Update($propID, $arFields);
                    }
                }
            }
        }
    }

    private function UpdateProdsWithCertificates(){
        $this->LogNow("Обновление id сертификатов у товаров." . " \n");
        $certificatesData = $this->GetJson('certificates', $this->assetsData['files_root'].'data/JSON_categories/');
        $certificatesArr = $certificatesData['data']['certificates'];
        $certDataToUpdate = [];
        $certDataDoubleCertificates = [];
        foreach ($certificatesArr as $certificate){
            $currCertID = $certificate['code'];
            if(isset($certificate['products']) && count($certificate['products'])){
                foreach ($certificate['products'] as $product){
                    if(trim($product) !== '' && isset($this->articlesToID[$product]) && (int)$currCertID){
                        $certDataToUpdate[$this->articlesToID[trim($product)]] = $currCertID;
                        $certDataDoubleCertificates[trim($product)][] = $currCertID;
                    }
                }
            }
        }
        if(count($certDataToUpdate)){
            foreach ($certDataToUpdate as $currProdID=>$currCertID){
                CIBlockElement::SetPropertyValuesEx((int)$currProdID, CATALOG_ID, ['CERTIFICATE_ID' => $currCertID]);
            }
        }
        if(count($certDataDoubleCertificates)){
            $certDataDoubleCertificatesClean = [];
            foreach ($certDataDoubleCertificates as $currAtrC=>$currArrC){
                if(is_array($currArrC) && count($currArrC) > 1){
                    $certDataDoubleCertificatesClean[$currAtrC] = $currArrC;
                }
            }
            $this->UpdateJson(['certificatesMultiply' => $certDataDoubleCertificatesClean], $_SERVER['DOCUMENT_ROOT']. SITE_DIR.'assets/json/');
        }
    }

    private function UpdateBYNPricesAndQnt(){
        //Для белорусов тянем цены с Коллекции Света
        if(BELARUS){
            $bynPricesPath = 'https://arlight.by/api/update_byn.json';
            if($contents = file_get_contents($bynPricesPath)){
                file_put_contents($_SERVER['DOCUMENT_ROOT'] . SITE_DIR. 'assets/json/update_byn.json', $contents);
            }
        }
        //Для белорусов обновляем бел цены
        if(BELARUS && file_exists($_SERVER['DOCUMENT_ROOT'] .SITE_DIR. 'assets/json/update_byn.json')){
            $BYNArray = $this->GetJson('update_byn', $_SERVER['DOCUMENT_ROOT'].SITE_DIR.'assets/json/');
            if(count($BYNArray)){
                $BYNArrayArticles = [];
                foreach ($BYNArray as $BYNElement){
                    $BYNArrayArticles[$BYNElement['article']] = [
                        'PRICE' => $BYNElement['price']
                    ];
                }
                if(count($BYNArrayArticles)){
                    $arSelect = ['ID', 'ACTIVE', 'PROPERTY_ARTICLE'];
                    $arFilter = ['IBLOCK_ID' => CATALOG_ID, '!PROPERTY_ARTICLE' => false, '!PROPERTY_OBSOLETE' => '-1'];
                    $res = CIBlockElement::GetList([], $arFilter, false, false, $arSelect);
                    while ($ob = $res->GetNextElement()) {
                        $arFields = $ob->GetFields();
                        $prodID = (int)$arFields['ID'];
                        $article = $arFields['PROPERTY_ARTICLE_VALUE'];
                        $BYNPrice = false;
                        $activeNow = $arFields['ACTIVE'] == 'Y';
                        if(isset($BYNArrayArticles[$article]) && (float)$BYNArrayArticles[$article]['PRICE']){
                            $BYNPrice = (float)$BYNArrayArticles[$article]['PRICE'];
                        }
                        CIBlockElement::SetPropertyValuesEx($prodID, CATALOG_ID, ['PRICE' => $BYNPrice]);
                        if(!$BYNPrice){
                            if($activeNow){
                                $updateProduct = new CIBlockElement();
                                $updateProduct->Update($prodID, ['ACTIVE' => 'N']);
                            }
                        }else{
                            if(!$activeNow){
                                $updateProduct = new CIBlockElement();
                                $updateProduct->Update($prodID, ['ACTIVE' => 'Y']);
                            }
                        }
                    }
                }
            }
        }
    }

    private function UpdateGroupsPictures(){
        //загружаем изображения из базы для разделов каталога
        $this->LogNow("\n" . "\n" . date('d-m-Y H:i:s') . "\n" . $this->assetsData['divider'] . "\n" . "\n" . "\n");
        $this->LogNow(date('d-m-Y H:i:s') . " \n" . "Загружаем изображения из базы для разделов каталога." . " \n");
        $groupsToOldGroups = $this->groupsToOldGroups;
        $arSectionInfo = $this->GetJson('dealers_groups', $this->assetsData['files_root'].'data/JSON_categories/');
        $arSection = $arSectionInfo['data']['groups'];
        $groupsArr = $this->GetJson('groups');
        $newMD5picSections = [];
        $currentMD5picSectionsArr = $this->GetJson('files_sections_md5');
        $currentMD5picSections = $currentMD5picSectionsArr ?: [];
        if (!empty($arSection)){
            $auth = base64_encode($this->assetsData['username'] . ':' . $this->assetsData['password']);
            $context = stream_context_create(["http" => ["header" => "Authorization: Basic $auth"]]);
            foreach ($arSection as $section) {
                if (!empty($section['files'])) {
                    $idGroup = $section['id'];

                    if (isset($groupsToOldGroups[$idGroup])) $idGroup = $groupsToOldGroups[$idGroup];

                    if (isset($groupsArr[$idGroup])) {
                        $idGroupSite = $groupsArr[$idGroup]['id'];
                        CIBlockSection::GetByID($idGroupSite);
                        foreach ($section['files'] as $file) {
                            $newMD5picSections[$file['id']] = $file['md5'];
                            if (!isset($currentMD5picSections[$file['id']]) || $currentMD5picSections[$file['id']] != $file['md5']) {
                                switch ($file['type']) {
                                    case 'arstore-mainpage':
                                        $picForMainPage[$idGroup] = $file;
                                        break;
                                    case 'arlight-catalog':
                                        $picForCatalogMain[$idGroupSite] = $file;
                                        break;
                                }
                            }
                        }
                    }
                }
            }
            /*картинки для главной страницы*/
            if (isset($picForMainPage) && !empty($picForMainPage)) {
                foreach ($picForMainPage as $xmlId => $pic) {
                    $fileContent = file_get_contents($pic['url'] . '&logo=nologo', false, $context);
                    if ($fileContent) {
                        file_put_contents($_SERVER["DOCUMENT_ROOT"].SITE_DIR.'assets/static/img/section/' . $xmlId . '.jpg', $fileContent);
                        $this->LogNow("Скачали картинку раздела на главную страницу 'XML_ID': " . $xmlId . ". \n");
                    } else {
                        $this->LogNow("Неудачно скачали картинку раздела на главную страницу 'XML_ID': " . $xmlId . ". \n");
                        unset($newMD5picSections[$pic['id']]);
                    }
                }
                unset($xmlId, $pic);
            }
            /*картинки для страницы каталога*/
            if (isset($picForCatalogMain) && !empty($picForCatalogMain)) {
                $currentCatalog = [];
                $arFilter = array('IBLOCK_ID' => CATALOG_ID, 'ID' => array_keys($picForCatalogMain));
                $rsSections = CIBlockSection::GetList(array('SORT' => 'ASC'), $arFilter);
                while ($arSection = $rsSections->Fetch()) {
                    $rsFile = CFile::GetByID($arSection['PICTURE']);
                    $arFile = $rsFile->Fetch();
                    $currentCatalog[$arSection['ID']] = $arFile;
                }
                foreach ($currentCatalog as $IBLOCK_SECTION_ID => $curPic) {
                    if (isset($picForCatalogMain[$IBLOCK_SECTION_ID])) {
                        $assetsPic = $picForCatalogMain[$IBLOCK_SECTION_ID];
                        if (strtotime($assetsPic['modified']) > strtotime($curPic['TIMESTAMP_X']) || $curPic['ORIGINAL_NAME'] != $assetsPic['id'] . '.jpg') {
                            if ($filePath = $this->downloadFileForSection($assetsPic, $context)) {
                                $arPICTURE = CFile::MakeFileArray($filePath);
                                $arPICTURE["MODULE_ID"] = "iblock";
                                $bs = new CIBlockSection;
                                $arFields = array(
                                    "IBLOCK_ID" => CATALOG_ID,
                                    "PICTURE" => $arPICTURE,
                                );
                                if ($IBLOCK_SECTION_ID > 0) {
                                    $bs->Update($IBLOCK_SECTION_ID, $arFields);
                                    unlink($filePath);
                                    $this->LogNow("Скачали картинку раздела на главную страницу 'SECTION_ID': " . $IBLOCK_SECTION_ID . ". \n");
                                }
                            }
                        }
                    }
                }
            }

            $this->UpdateJson(['files_sections_md5' => $newMD5picSections]);
        }
    }

    private function UpdateProductsPrepare(){
        $this->LogNow(date('d-m-Y H:i:s') . " \n" . "Выполняем операцию подготовки к обновлению товаров." . " \n");
        $productsToday = $this->GetJson('products', $this->assetsData['files_root'].'data/JSON_categories/');
        $productsYesterday = $this->GetJson('products', $this->assetsData['files_root'].'data/JSON_categories_sandbox/');
        $xmlArticlesToday = [];
        $xmlArticlesYesterday = [];
        foreach ($productsToday as $product) $xmlArticlesToday[(string)$product['article']] = true;
        foreach ($productsYesterday as $product) $xmlArticlesYesterday[(string)$product['article']] = true;

        $properties = CIBlockProperty::GetList(Array("sort" => "asc", "name" => "asc"), Array("ACTIVE" => "Y", "IBLOCK_ID" => CATALOG_ID));
        $propsDataArr = [];
        $allProps = [];
        while ($prop_fields = $properties->GetNext()) {
            $type = $prop_fields['PROPERTY_TYPE'];
            $propsDataEl = [
                'type' => ($type == 'S') ? 'string' : (($type == 'N') ? 'number' : (($type == 'L') ? 'list' : (($type == 'F') ? 'file' : (($type == 'G') ? 'group' : (($type == 'E') ? 'element' : false))))),
                'multiply' => $prop_fields['MULTIPLE'] == 'Y',
                'name' => $prop_fields['NAME']
            ];
            $propsDataArr[$prop_fields['CODE']] = $propsDataEl;
            $allProps[$prop_fields['CODE']] = true;
        }

        $this->UpdateJson([
            'props_data' => $propsDataArr,
            'related' => [],
            'accessories' => [],
            'analogues' => [],
            'files_to_download' => [],
            'xml_articles_today' => $xmlArticlesToday,
            'xml_articles_yesterday' => $xmlArticlesYesterday
        ]);

        $resFromXml = [];
        $parameters = $this->GetJson('parameters', $this->assetsData['files_root'].'data/JSON_categories/');
        foreach ($parameters['data']['parameters'] as $parameter){
            $paramName = (string)$parameter['name'];
            $id = (string)$parameter['id'];
            $resFromXml[$id] = $paramName;
            if($id !== '147' && $id !== '149'){
                if(!isset($allProps['T_'.$id]) || !isset($allProps['N_'.$id])){
                    $newPropName = (string)$parameter['name'];
                    $unit = trim((string)$parameter['unit']);
                    if($unit !== ''){
                        $newPropName.=', '.$unit;
                    }
                    if($id == '139'){
                        $newPropName = str_replace(' (мм?)', ', мм?', $newPropName);
                    }
                    $arFields = Array(
                        "NAME" => $newPropName,
                        "ACTIVE" => "Y",
                        "SORT" => "600",
                        "CODE" => 'N_'.$id,
                        "IBLOCK_ID" => CATALOG_ID,
                        "WITH_DESCRIPTION" => "N",
                    );
                    if(!isset($allProps['N_'.$id])){
                        $arFields["PROPERTY_TYPE"] = "N";
                        $newCatalogProperty = new CIBlockProperty;
                        $newCatalogProperty->Add($arFields);
                    }
                    if(!isset($allProps['T_'.$id])){
                        $arFields["PROPERTY_TYPE"] = "S";
                        $arFields["CODE"] = 'T_'.$id;
                        $newCatalogProperty = new CIBlockProperty;
                        $newCatalogProperty->Add($arFields);
                    }
                }
            }
        }
        $forDel = [];
        $resDB = [];
        if (count($resFromXml)) {
            $propForDel = ['N_%', 'T_%'];
            foreach ($propForDel as $item) {
                $properties = CIBlockProperty::GetList(Array("sort" => "asc", "name" => "asc"), Array("ACTIVE" => "Y", "IBLOCK_ID" => CATALOG_ID, "CODE" => $item));
                while ($prop_fields = $properties->GetNext()) {
                    $resDB[$prop_fields['ID']] = $prop_fields['CODE'];
                    $resNameDB[$prop_fields['CODE']] = ['ID' => $prop_fields['ID'], 'NAME' => $prop_fields['NAME']];
                }
            }
            $needUpdateName = [];
            if (isset($resNameDB) && !empty($resNameDB)) {
                foreach ($resFromXml as $codeId => $itemName) {
                    if (isset($resNameDB['T_' . $codeId]) && $resNameDB['T_' . $codeId]['NAME'] != $itemName)
                        $needUpdateName[$resNameDB['T_' . $codeId]['ID']] = $itemName;
                    if (isset($resNameDB['N_' . $codeId]) && $resNameDB['N_' . $codeId]['NAME'] != $itemName)
                        $needUpdateName[$resNameDB['N_' . $codeId]['ID']] = $itemName;
                }
            }
            foreach ($needUpdateName as $id => $name) {
                $arFields = array('NAME' => $name, 'IBLOCK_ID' => CATALOG_ID);
                $ibp = new CIBlockProperty;
                $ibp->Update($id, $arFields);
                $this->LogNow("Обновили свойство " .$name. " \n");
            }
            foreach ($resDB as $id => $code) {
                if (stristr($code, 'N_')) {
                    $baseId = explode('N_', $code)[1];
                    if (!isset($resFromXml[$baseId]))
                        $forDel[$id] = $code;
                }
                if (stristr($code, 'T_')) {
                    $baseId = explode('T_', $code)[1];
                    if (!isset($resFromXml[$baseId]))
                        $forDel[$id] = $code;
                }
            }
            if (!empty($forDel))
                foreach ($forDel as $id => $forDelItem) {
                    $this->LogNow("Удалили свойство" .$forDelItem. " \n");
                    CIBlockProperty::Delete($id);
                }
        }
        $this->LogNow(date('d-m-Y H:i:s') . " \n" . "Операция подготовки к обновлению товаров прошла успешно." . " \n" . "При следующем вызове начнем обновление товаров." . " \n");
    }

    private function FillSingleGroup($key, $group){
        $this->LogNow("Обрабатываем группу '" . $group['name'] . "' с внешним ID " . $key . "." . "\n");
        $this->fillGroupsCurrentLevel[$key] = true;
        $this->groupsSort++;
        $groupExists = false;
        if (isset($this->fillGroupsArrayLevels[$key]['id'])) {
            $res = CIBlockSection::GetByID((int)$this->fillGroupsArrayLevels[$key]['id']);
            if ($ar_res = $res->GetNext()) {
                if (is_array($ar_res) && count($ar_res)) {
                    $this->LogNow("Такая группа уже существует." . "\n");
                    $groupExists = true;
                    if (isset($this->fillGroupsArrayLevels[$key]['xml_url']) && $this->fillGroupsArrayLevels[$key]['xml_url'] !== trim($group['xmlurl'])) $this->fillGroupsArrayLevels[$key]['xml_url'] = trim($group['xmlurl']);
                    $arFieldsToUpdate = [];
                    $arFieldsToUpdateLogText = '';
                    $arFieldsToUpdateLogTextComa = false;
                    if (trim(html_entity_decode($ar_res['NAME'])) !== trim(html_entity_decode($group['name']))) {
                        $arFieldsToUpdate['NAME'] = trim(html_entity_decode($group['name']));
                        $arFieldsToUpdateLogText .= 'название';
                        $arFieldsToUpdateLogTextComa = true;
                    }
                    $description = '';
                    if (isset($group['texts']['text'])) {
                        $description = preg_replace('/\s*\n\s*(?!$)/', '', html_entity_decode($group['texts']['text']));
                    }
                    if (!isset($ar_res['DESCRIPTION']) || trim(html_entity_decode($description)) !== trim(preg_replace('/\s*\n\s*(?!$)/', '', html_entity_decode($ar_res['DESCRIPTION'])))) {
                        $arFieldsToUpdate['DESCRIPTION'] = trim(html_entity_decode($description));
                        if ($arFieldsToUpdateLogTextComa) $arFieldsToUpdateLogText .= ', ';
                        $arFieldsToUpdateLogText .= 'описание';
                        $arFieldsToUpdateLogTextComa = true;
                    }
                    if ((int)$ar_res['SORT'] !== $this->groupsSort) {
                        $arFieldsToUpdate['SORT'] = $this->groupsSort;
                        if ($arFieldsToUpdateLogTextComa) $arFieldsToUpdateLogText .= ', ';
                        $arFieldsToUpdateLogText .= 'сортировка';
                    }
                    if (isset($group['parent'])) {
                        $parentID = false;
                        if (isset($this->fillGroupsArrayLevels[$group['parent']])) $parentID = (int)$this->fillGroupsArrayLevels[$group['parent']]['id'];

                        if ((int)$ar_res['IBLOCK_SECTION_ID'] !== $parentID) {
                            if ((int)$parentID == 1) $parentID = false;
                            $arFieldsToUpdate['IBLOCK_SECTION_ID'] = (int)$parentID;
                        }
                    }
                    if (count($arFieldsToUpdate) && $arFieldsToUpdate['IBLOCK_SECTION_ID'] !== 0) {
                        if (trim($arFieldsToUpdateLogText) !== '') $this->LogNow("У группы изменились следующие поля: " . $arFieldsToUpdateLogText . "." . "\n");
                        $arFields = ['ACTIVE' => 'Y', 'IBLOCK_ID' => CATALOG_ID];
                        $arFieldsNew = array_merge($arFields, $arFieldsToUpdate);
                        $bs = new CIBlockSection;
                        $res = $bs->Update((int)$this->fillGroupsArrayLevels[$key]['id'], $arFieldsNew);
                        if ($res) {
                            $this->LogNow("Группа успешно перезаписана." . "\n");
                            if (trim($arFieldsToUpdateLogText) !== '') $this->groupsUpdated++;
                        } else {
                            $this->LogNow("Ошибка перезаписи группы '" . $bs->LAST_ERROR . "'." . "\n");
                            $this->groupsErrors = true;
                        }
                    } else {
                        $this->LogNow("Изменений в группе нету." . "\n");
                    }
                }
            }
        }
        //если такой группы нету - нужно завести
        if (!$groupExists) {
            $this->LogNow("Такой группы не существует." . "\n");
            $arParams = array("replace_space" => "-", "replace_other" => "-");
            $trans = Cutil::translit(trim(html_entity_decode($group['name'] . '-' . $key)), "ru", $arParams);
            $arFields = [
                'ACTIVE' => 'Y',
                'IBLOCK_ID' => CATALOG_ID,
                'SORT' => $this->groupsSort,
                'NAME' => trim(html_entity_decode($group['name'])),
                'DESCRIPTION' => preg_replace('/\s*\n\s*(?!$)/', '', trim(html_entity_decode($group['texts']['text']))),
                'CODE' => $trans,
                'EXTERNAL_ID' => $key
            ];
            if (isset($group['parent']) && (int)$group['parent'] !== 1) {
                $arFields['IBLOCK_SECTION_ID'] = (int)$this->fillGroupsArrayLevels[$group['parent']]['id'];
            }
            $bs = new CIBlockSection;
            $ID = $bs->Add($arFields);
            if ((int)$ID) {
                $currentArray = [];
                $currentArray['id'] = (int)$ID;
                $currentArray['xml_url'] = trim($group['xmlurl']);
                $this->fillGroupsArrayLevels[$key] = $currentArray;
                $this->LogNow("Группа успешно создана." . "\n");
                $this->groupsAdded++;
            } else {
                $this->LogNow("Ошибка создания группы '" . $bs->LAST_ERROR . "'." . "\n");
                $this->groupsErrors = true;
            }
        }
    }

    private function FillGroups(): bool
    {
        $sortedArray = $this->groupsSortedArray;
        $this->fillGroupsArrayLevels = ($this->GetJson('groups')) ? $this->GetJson('groups') : [];
        foreach ($sortedArray as $key => $group) {
            $groupInfo = $group;
            if (isset($groupInfo['children'])) unset($groupInfo['children']);
            $this->FillSingleGroup($key, $groupInfo);
            if (isset($group['children']) && is_array($group['children']) && count($group['children'])) {
                foreach ($group['children'] as $key2 => $group2) {
                    $groupInfo2 = $group2;
                    if (isset($groupInfo2['children'])) unset($groupInfo2['children']);
                    $this->FillSingleGroup($key2, $groupInfo2);
                    if (isset($group2['children']) && is_array($group2['children']) && count($group2['children'])) {
                        foreach ($group2['children'] as $key3 => $group3) {
                            $this->FillSingleGroup($key3, $group3);
                            unset($key3,$group3);
                        }
                    }
                    unset($key2,$group2);
                }
            }
            unset($key,$group,$groupInfo);
        }
        unset($sortedArray);
        if (!$this->groupsErrors) {
            $this->LogNow(date('d-m-Y H:i:s') . " \n" . "Наполнение/обновление групп прошло успешно. Было обновлено: " . $this->groupsUpdated . ", добавлено: " . $this->groupsAdded . "." . " \n");
            $this->UpdateJson([
                'groups' => $this->fillGroupsArrayLevels,
                'groups_current' => $this->fillGroupsCurrentLevel
            ]);
            return true;
        } else {
            $this->LogNow(date('d-m-Y H:i:s') . " \n" . "Проблемы наполнения/обновления групп. К следующей операции не переходим" . " \n");
            return false;
        }
    }

    private function ArticlesInXML(){
        $allArticlesInJSON = [];
        $allCodes = array_keys($this->assetsData['xml_codes']);
        foreach ($allCodes as $code){
            $productsArr = $this->GetJson('group_'.$code, $this->assetsData['files_root'].'data/JSON_categories/');
            foreach ($productsArr as $product) $allArticlesInJSON[$product['article']] = true;
        }
        $this->UpdateJson(['all_articles_in_xml' => $allArticlesInJSON]);
        $this->UpdateArticlesToIDs();
    }

    private function UpdateArticlesToIDs(){
        $articlesToID = [];
        $arSelect = ['ID', 'PROPERTY_ARTICLE'];
        $arFilter = ['IBLOCK_ID' => CATALOG_ID];
        $res = CIBlockElement::GetList([], $arFilter, false, false, $arSelect);
        while ($ob = $res->GetNextElement()) {
            $arFields = $ob->GetFields();
            $articlesToID[$arFields['PROPERTY_ARTICLE_VALUE']] = $arFields['ID'];
        }
        $this->articlesToID = $articlesToID;
        $this->UpdateJson(['product_ids' => $this->articlesToID]);
    }

    private function PrepareJSONs(){
        $groupsToOldGroups = $this->groupsToOldGroups;
        $groupsJSON = $this->GetJson('groups', $this->assetsData['files_root'].'data/JSON_categories/');
        $groups = $groupsJSON['data']['groups'];
        $groupsClean = [];
        foreach ($groups as $group){
            $thisGroup = $group;
            if(isset($groupsToOldGroups[$group['id']])) $thisGroup['id'] = $groupsToOldGroups[$group['id']];
            if(isset($groupsToOldGroups[$group['parent']])) $thisGroup['parent'] = $groupsToOldGroups[$group['parent']];
            $groupsClean[] = $thisGroup;
        }
        $this->UpdateJson(['groups' => $groupsClean], $this->assetsData['files_root'].'data/JSON_categories/');

        $relationsJSON = $this->GetJson('products_relations', $this->assetsData['files_root'].'data/JSON_categories/');
        $relations = $relationsJSON['data']['relations'];
        $relationsArr = [];
        foreach ($relations as $data){
            $relType = $data['relation']['marking'];
            $relationsArr[$relType] = [];
            foreach ($data['relation']['products'] as $prod){
                $relationsArr[$relType][$prod['product']['article']] = $prod['product']['related'];
            }
        }

        $allArticlesInJSON = [];
        $allCodes = [];
        foreach ($this->assetsData['xml_codes'] as $code=>$id) $allCodes[] = $code;
        $allCodes[] = 'products';
        $paramsArrAll = [];
        foreach ($allCodes as $code){
            $fileName = ($code==='products') ? 'products' : 'group_'.$code;
            $productsJSON = $this->GetJson($fileName, $this->assetsData['files_root'].'data/JSON_categories/');
            $products = $productsJSON['data']['products'];
            if(!$products || !is_array($products) || !count($products)){
                $this->LogNow("Пустой файл с товарами." . " \n");
                die();
            }
            $paramsArr = [];
            if($code!=='products'){
                $parametersJSON = $this->GetJson('parameters_'.$code, $this->assetsData['files_root'].'data/JSON_categories/');
                $parameters = $parametersJSON['data']['parameters'];

                foreach ($parameters as $param){
                    if(isset($param['products'])){
                        foreach ($param['products'] as $prod){
                            $article = $prod['product'];
                            if(!isset($paramsArr[$article])) $paramsArr[$article] = [];
                            $currParams = [
                                'order' => $prod['param_order'],
                                'id' => $param['id'],
                                'name' => $param['name'],
                                'unit' => $param['unit'],
                                'type' => $param['type'],
                                'marking' => $param['marking'],
                                'values_total' => count($prod['values']),
                                'values' => $prod['values']
                            ];
                            $paramsArr[$article][] = $currParams;
                            $paramsArrAll[$article][] = $currParams;
                        }
                    }
                }
            }else{
                $paramsArr = $paramsArrAll;
            }

            $productsClean = [];
            foreach ($products as $product){
                $thisProd = $product;
                $allArticlesInJSON[$thisProd['article']] = true;
                if(isset($thisProd['techdata'])) unset($thisProd['techdata']);
                if(isset($paramsArr[$thisProd['article']])){
                    $thisTechData = $paramsArr[$thisProd['article']];
                    usort($thisTechData, function ($a, $b) {
                        return $a['order'] <=> $b['order'];
                    });
                    $thisProd['techdata'] = $thisTechData;
                }

                if(isset($thisProd['analogues'])) unset($thisProd['analogues']);
                if(isset($relationsArr['analogues']) && isset($relationsArr['analogues'][$thisProd['article']]))
                    $thisProd['analogues'] = $relationsArr['analogues'][$thisProd['article']];
                if(isset($thisProd['related'])) unset($thisProd['related']);
                if(isset($relationsArr['related']) && isset($relationsArr['related'][$thisProd['article']]))
                    $thisProd['related'] = $relationsArr['related'][$thisProd['article']];
                if(isset($thisProd['compatibles'])) unset($thisProd['compatibles']);
                if(isset($relationsArr['compatibles']) && isset($relationsArr['compatibles'][$thisProd['article']]))
                    $thisProd['compatibles'] = $relationsArr['compatibles'][$thisProd['article']];
                if(isset($thisProd['components'])) unset($thisProd['components']);
                if(isset($relationsArr['components']) && isset($relationsArr['components'][$thisProd['article']]))
                    $thisProd['components'] = $relationsArr['components'][$thisProd['article']];
                $productsClean[] = $thisProd;

                if(isset($thisProd['groups'])){
                    $cleanGroups = [];
                    $change = false;
                    foreach ($thisProd['groups'] as $group){
                        if(isset($groupsToOldGroups[$group['id']])){
                            $currGroup = $group;
                            $currGroup['id'] = $groupsToOldGroups[$group['id']];
                            $cleanGroups[] = $currGroup;
                            $change = true;
                        }else $cleanGroups[] = $group;
                    }
                    if($change) $thisProd['groups'] = $cleanGroups;
                }
            }
            $this->UpdateJson([$fileName => $productsClean], $this->assetsData['files_root'].'data/JSON_categories/');
        }
        $this->UpdateJson(['all_articles_in_xml' => $allArticlesInJSON]);
        $allArticlesInDB = [];
        $res = CIBlockElement::GetList([], ["IBLOCK_ID" => CATALOG_ID], false, false, ["ID", "PROPERTY_ARTICLE"]);
        while ($ob = $res->GetNextElement()) {
            $arFields = $ob->GetFields();
            $allArticlesInDB[trim((string)$arFields['PROPERTY_ARTICLE_VALUE'])] = true;
        }
        if (count($allArticlesInDB)) $this->UpdateJson(['all_articles_in_db' => $allArticlesInDB]);

        $this->LogNow("Операция правки XML прошла успешно." . " \n");
        $this->LogNow("\n" . "\n" . date('d-m-Y H:i:s') . "\n" . $this->assetsData['divider'] . "\n" . "\n" . "\n");

    }

    private function DownloadJSON($fileSavePath, $url): bool
    {
        $success = false;
        $auth = base64_encode($this->assetsData['username'] . ':' . $this->assetsData['password']);
        $context = stream_context_create(["http" => ["header"=>"Authorization: Basic $auth"]]);
        if($fileContent = file_get_contents($url, false, $context)){
            $fileContentArr = json_decode(json_encode(json_decode($fileContent)), true);
            if($fileContentArr && is_array($fileContentArr) && isset($fileContentArr['errors']) && is_array($fileContentArr['errors']) && !count($fileContentArr['errors']) && isset($fileContentArr['data']) && is_array($fileContentArr['data']) && count($fileContentArr['data'])){
                file_put_contents($fileSavePath, $fileContent);
                $success = true;
                $this->LogNow("Файл $fileSavePath успешно скачан." . "\n");
            }else $this->LogNow("Файл $fileSavePath имеет неверное содержание." . "\n");
        }else{
            $this->LogNow("файл $fileSavePath не был загружен." . "\n");
        }
        return $success;
    }

    private function getJSONFromServer($fileSavePath, $url): bool
    {
        while(!$this->DownloadJSON($fileSavePath, $url)) sleep(30);
        return true;
    }

    private function DownloadJSONs(): bool
    {
        $this->LogNow(date('d-m-Y H:i:s') . " \n" . "Выполняем загрузку json файлов" . " \n");
        foreach ($this->assetsData['assetsJSONs'] as $fileName=>$assetsURL){
            if (!$this->getJSONFromServer($this->assetsData['files_root'] . 'data/JSON_categories/'.$fileName, $assetsURL)) return false;
        }
        foreach ($this->assetsData['xml_codes'] as $code=>$id ){
            if (!$this->getJSONFromServer($this->assetsData['files_root'] . 'data/JSON_categories/group_'.$code.'.json', 'https://assets.transistor.ru/catalog/v3/sites/products.json?categoryID='.$id)) return false;
            if (!$this->getJSONFromServer($this->assetsData['files_root'] . 'data/JSON_categories/parameters_'.$code.'.json', 'https://assets.transistor.ru/catalog/v3/sites/parameters.json?categoryID='.$id)) return false;
        }
        $this->LogNow(date('d-m-Y H:i:s') . " \n" . "Все json-файлы скачались успешно" . " \n");
        return true;
    }

    private function PrepareToDownload(){
        $directory = $this->assetsData['files_root'] . 'data/JSON_categories';
        if (!is_dir($directory)) mkdir($directory);
        $dirSandbox = $this->assetsData['files_root'] . 'data/JSON_categories_sandbox';
        $this->ClearDirectory($dirSandbox);
        rmdir($dirSandbox);
        rename($directory, $dirSandbox);
        mkdir($directory);
    }

    private function CheckAccess(): bool
    {
        if ($this->assetsData['username'] == '' || $this->assetsData['password'] == '') {
            $this->LogNow("Не настроен доступ к assets.transistor.ru." . " \n");
            return false;
        }
        $auth = base64_encode($this->assetsData['username'] . ':' . $this->assetsData['password']);
        stream_context_set_default(['http' => ['method' => 'POST', "header" => "Authorization: Basic $auth"]]);
        $url = $this->assetsData['assetsJSONs']['groups.json'];
        $headers = get_headers($url);
        if (!stristr($headers[0], '200')){
            $this->LogNow(date('d-m-Y h:i:s') . " \n" . "Недействительный доступ к assets.transistor.ru." . " \n");
            return false;
        }
        return true;
    }

    private function ClearCatalog(){
        $directory = $this->assetsData['files_root'] . 'data/JSON_categories';
        $directoryOld = $this->assetsData['files_root'] . 'data/categories_sandbox';
        if (!is_dir($directory) && !is_dir($directoryOld)) {
            $this->LogNow(date('d-m-Y h:i:s') . " \n" . "Это первый запуск. Удалим тестовые товары из ИБ каталога" . " \n");
            $arFilter = ['IBLOCK_ID' => CATALOG_ID, 'DEPTH_LEVEL' => 1];
            $rsSect = CIBlockSection::GetList(['left_margin' => 'asc'], $arFilter);
            while ($arSect = $rsSect->GetNext()) {
                $SECTION_ID = $arSect['ID'];
                if (CIBlockSection::Delete($SECTION_ID)) $this->LogNow(date('d-m-Y h:i:s') . " \n" . "Удален раздел " . $arSect['NAME'] . " \n");
            }
            $this->ClearContent();
        }
    }

    private function ClearContent(){
        $this->LogNow(date('d-m-Y h:i:s') . " \n" . "Это первый запуск. Удалим тестовый контент" . " \n");
        $arIblockForUpdate = [
            'news' => NEWS_ID,
            'banner' => BANNERS_ID,
            'articles' => ARTICLES_ID,
            'projects' => PROJECTS_ID,
            'scheme' => SCHEME_ID,
            'events' => EVENTS_ID,
            'documents' => CATALOGS_ID,
            'video' => VIDEO_ID,
            'calc' => CALC_ID,
            'cert' => CERTIFICATES_FROM_BASE_ID
        ];
        foreach ($arIblockForUpdate as $iblockID) {
            $result = CIBlockElement::GetList(["ID" => "ASC"], ['IBLOCK_ID' => $iblockID]);
            while ($element = $result->Fetch()) CIBlockElement::Delete($element['ID']);
        }
    }

    private function addContent($ID, $content)
    {
        global $mainServer;
        global $PROP_ID_BRAND_NEWS;
        $needAdd = getCodeForAdd($ID, $content);
        if (!(int)$ID) return;

        $resProp = CIBlockProperty::GetByID("PRODUCTS", $ID);
        $res = CIBlockProperty::GetByID("PRODUCTS_ART", $ID);
        if ($resProp->GetNext() && !$res->GetNext()) {
            $arFields = [
                'NAME' => 'Связанные товары (Артикулы)',
                "ACTIVE" => "Y",
                "SORT" => 500,
                'CODE' => 'PRODUCTS_ART',
                "PROPERTY_TYPE" => "S",
                "IBLOCK_ID" => $ID,
                "MULTIPLE" => "Y"
            ];

            $ibp = new CIBlockProperty;
            $ibp->Add($arFields);
        }
        unset($resProp, $res);

        if ($ID == NEWS_ID) {
            $list_TYPE_NEWS_Ar = getGuidePropList('TYPE_NEWS', $ID);
        }
        if ($ID == EVENTS_ID) {
            $list_EVENT_TYPE_Ar = getGuidePropList('EVENT_TYPE', $ID);
            $list_EVENT_FOR_Ar = getGuidePropList('EVENT_FOR', $ID);
            $list_EVENT_CITY_INFO_Ar = getGuidePropList('EVENT_CITY_INFO', $ID);
            $list_EVENT_TYPE_MGSU_Ar = getGuidePropList('EVENT_TYPE_MGSU', $ID);
        }

        //$count = 0;
        foreach ($needAdd as $code) {
            //$count++;
            //if ($count > 5) break;
            $item = $content[$code];
            $el = new CIBlockElement;
            $PROP = $item['PROP'];

            if ($PROP["DOCUMENT"])
                $PROP["DOCUMENT"] = CFile::MakeFileArray($mainServer . $PROP["DOCUMENT"]);

            if ($ID == BANNERS_ID) {
                if ($PROP['LINK']) {
                    //id связанных новостей
                    $arSelect = ['ID'];
                    $arFilter = ['IBLOCK_ID' => NEWS_ID, 'CODE' => $PROP['LINK']];
                    $resNews = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
                    $obNews = $resNews->Fetch();
                    if ($obNews['ID'])
                        $PROP['LINK'] = $obNews['ID'];
                    elseif (!$PROP['LINK_2'] || !isset($PROP['LINK_2'])) {
                        $PROP['LINK_2'] = SITE_DIR . 'news/' . $PROP['LINK'] . '/';
                        $PROP['LINK'] = '';
                    }
                    unset($arSelect, $arFilter, $resNews, $obNews);
                }
                if ($PROP['SLIDE_TEMPLATE'] && isset($listTemplatesAr[$PROP['SLIDE_TEMPLATE']])) {
                    $PROP['SLIDE_TEMPLATE'] = array("VALUE" => $listTemplatesAr[$PROP['SLIDE_TEMPLATE']]['ID']);
                }
                if ($PROP['BRAND_BANNER'] && $PROP['BRAND_BANNER'] == 'Y' && $PROP_ID_BRAND_NEWS) {
                    $item["ACTIVE"] = 'Y';
                }
            }
            if ($ID == NEWS_ID){
                if ($PROP['TYPE_NEWS'] && $PROP['TYPE_NEWS'] == 'brand_news' && $PROP_ID_BRAND_NEWS) {
                    $item["ACTIVE"] = 'Y';
                }
                if ($PROP['TYPE_NEWS'] && isset($list_TYPE_NEWS_Ar[$PROP['TYPE_NEWS']])) {
                    $PROP['TYPE_NEWS'] = array("VALUE" => $list_TYPE_NEWS_Ar[$PROP['TYPE_NEWS']]['ID']);
                }
            }

            if ($ID == EVENTS_ID) {
                if ($PROP["EVENT_PICTURES"]) {
                    $picPathAr = [];
                    foreach ($PROP["EVENT_PICTURES"] as $pic)
                        $picPathAr[] = CFile::MakeFileArray($mainServer . $pic);
                    $PROP["EVENT_PICTURES"] = $picPathAr;
                    unset($pic, $picPathAr);
                }

                if ($PROP["EVENT_FOR"]) {
                    $tempAr = [];
                    foreach ($PROP["EVENT_FOR"] as $itemEvProp) {
                        if (isset($list_EVENT_FOR_Ar[$itemEvProp]))
                            $tempAr[] = array("VALUE" => $list_EVENT_FOR_Ar[$itemEvProp]['ID']);
                    }
                    unset($itemEvProp);
                    $PROP["EVENT_FOR"] = $tempAr;
                }

                if ($PROP['EVENT_TYPE'] && isset($list_EVENT_TYPE_Ar[$PROP['EVENT_TYPE']])) {
                    $PROP['EVENT_TYPE'] = array("VALUE" => $list_EVENT_TYPE_Ar[$PROP['EVENT_TYPE']]['ID']);
                }
                if ($PROP['EVENT_CITY_INFO'] && isset($list_EVENT_CITY_INFO_Ar[$PROP['EVENT_CITY_INFO']])) {
                    $PROP['EVENT_CITY_INFO'] = array("VALUE" => $list_EVENT_CITY_INFO_Ar[$PROP['EVENT_CITY_INFO']]['ID']);
                }
                if ($PROP['EVENT_TYPE_MGSU'] && isset($list_EVENT_TYPE_MGSU_Ar[$PROP['EVENT_TYPE_MGSU']])) {
                    $PROP['EVENT_TYPE_MGSU'] = array("VALUE" => $list_EVENT_TYPE_MGSU_Ar[$PROP['EVENT_TYPE_MGSU']]['ID']);
                }
            }

            //ищем картинки в детальном описании
            if (isset($item['DETAIL_TEXT']) && !empty($item['DETAIL_TEXT'])) {
                $doc = new DOMDocument();
                $doc->loadHTML(mb_convert_encoding($item['DETAIL_TEXT'], 'HTML-ENTITIES', 'UTF-8'));
                $tags = $doc->getElementsByTagName('img');
                foreach ($tags as $tag) {
                    $curPathFile = $tag->getAttribute('src');
                    $arIMAGE = CFile::MakeFileArray($mainServer . $curPathFile);
                    $fid = CFile::SaveFile($arIMAGE, "iblock");
                    $newPathFile = CFile::GetPath($fid);
                    $item['DETAIL_TEXT'] = str_replace($curPathFile, $newPathFile, $item['DETAIL_TEXT']);
                }

                $tagsA = $doc->getElementsByTagName('a');
                foreach ($tagsA as $tagA) {
                    $hrefA = $tagA->getAttribute('href');
                    if (strpos($hrefA, $_SERVER["HTTP_HOST"]) !== false) {
                        $hrefRel = str_replace(array('http://', 'https://', $_SERVER["HTTP_HOST"]), '', $hrefA);
                        $item['DETAIL_TEXT'] = str_replace($hrefA, $hrefRel, $item['DETAIL_TEXT']);
                    }
                }
            }
            $prevPicPathAr = '';
            $detPicPathAr = '';
            if ($item['PREVIEW_PICTURE'])
                $prevPicPathAr = CFile::MakeFileArray($mainServer . $item['PREVIEW_PICTURE']);

            if ($item['DETAIL_PICTURE'])
                $detPicPathAr = CFile::MakeFileArray($mainServer . $item['DETAIL_PICTURE']);

            $sort = 500;
            if ($item["SORT"] != 0) $sort = $item["SORT"];

            $arLoadProductArray = array(
                "IBLOCK_ID" => $ID,
                "PROPERTY_VALUES" => $PROP,
                "ACTIVE_FROM" => $item["DATE_ACTIVE_FROM"],
                "ACTIVE_TO" => $item["DATE_ACTIVE_TO"],
                "NAME" => $item["NAME"],
                "CODE" => $code,
                "SORT" => $sort,
                "ACTIVE" => $item["ACTIVE"],
                "DETAIL_TEXT" => $item['DETAIL_TEXT'],
                "DETAIL_TEXT_TYPE" => $item['DETAIL_TEXT_TYPE'],
                "PREVIEW_TEXT" => $item['PREVIEW_TEXT'],
                "PREVIEW_TEXT_TYPE" => $item['PREVIEW_TEXT_TYPE'],
                "PREVIEW_PICTURE" => $prevPicPathAr,
                "DETAIL_PICTURE" => $detPicPathAr
            );
            if ($PRODUCT_ID = $el->Add($arLoadProductArray))
                $this->LogNow("New ID: " . $PRODUCT_ID . " \n");
            else
                $this->LogNow("Error: " . $el->LAST_ERROR . " \n");
        }
    }

    private function DownloadContent(){
        $this->LogNow(date('d-m-Y H:i:s') . " \n" . "Дополнительный контент." . " \n");
        /*добавить св-во для брендированной новости*/
        global $PROP_ID_BRAND_NEWS;
        $PROP_ID_BRAND_NEWS = false;
        $PROP_ID_BRAND_BANNER = false;
        $properties = CIBlockProperty::GetList(array("sort" => "asc", "name" => "asc"), array("ACTIVE" => "Y", "IBLOCK_ID" => NEWS_ID, "CODE" => 'TYPE_NEWS'));
        while ($prop_fields = $properties->GetNext()) {
            $PROP_ID_BRAND_NEWS = $prop_fields["ID"];
        }
        $properties = CIBlockProperty::GetList(array("sort" => "asc", "name" => "asc"), array("ACTIVE" => "Y", "IBLOCK_ID" => BANNERS_ID, "CODE" => 'BRAND_BANNER'));
        while ($prop_fields = $properties->GetNext()) {
            $PROP_ID_BRAND_BANNER = $prop_fields["ID"];
        }
        if (!$PROP_ID_BRAND_BANNER) {
            $arFieldsForNewProp = [
                'NAME' => 'Баннер для брендированной новости (Y - если да)',
                "ACTIVE" => "Y",
                "SORT" => 550,
                'CODE' => 'BRAND_BANNER',
                "PROPERTY_TYPE" => "S",
                "IBLOCK_ID" => BANNERS_ID
            ];
            $ibp = new CIBlockProperty;
            $ibp->Add($arFieldsForNewProp);
        }
        if (!$PROP_ID_BRAND_NEWS) {
            $arFieldsForNewProp = [
                'NAME' => 'Брендированная новость',
                "ACTIVE" => "Y",
                "SORT" => 500,
                'CODE' => 'TYPE_NEWS',
                "PROPERTY_TYPE" => "L",
                "IBLOCK_ID" => NEWS_ID
            ];

            $arFieldsForNewProp["VALUES"][0] = array(
                "XML_ID" => "brand_news",
                "VALUE" => "Брендированная новость",
                "DEF" => "N",
                "SORT" => "100"
            );

            $ibp = new CIBlockProperty;
            $ibp->Add($arFieldsForNewProp);
            $PROP_ID_BRAND_NEWS = true;
        }
        /*end - добавить св-во для брендированной новости*/

        function getCodeForAdd($ID, $content): array
        {
            $currentCodes = [];
            $arSelect = array("ID", "CODE");
            $arFilter = array("IBLOCK_ID" => $ID);
            $res = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
            while ($ob = $res->GetNextElement()) {
                $arFields = $ob->GetFields();
                $currentCodes[] = $arFields['CODE'];
            }

            return array_diff(array_keys($content), $currentCodes);
        }
        function getGuidePropList($CODE, $ID): array
        {
            $listAr = [];
            $listProp = CIBlockPropertyEnum::GetList([], [
                "IBLOCK_ID" => $ID,
                "CODE" => $CODE
            ]);
            while ($listPropItem = $listProp->Fetch()) {
                $listAr[$listPropItem['XML_ID']] = $listPropItem;
            }
            return $listAr;
        }

        global $mainServer;
        $mainServer = 'https://arstore.arlight.ru';
        $arIblockForUpdate = [
            'news' => NEWS_ID,
            'banner' => BANNERS_ID,
            'articles' => ARTICLES_ID,
            'projects' => PROJECTS_ID,
            'scheme' => SCHEME_ID,
            'events' => EVENTS_ID,
            'documents' => CATALOGS_ID,
            'video' => VIDEO_ID,
            'calc' => CALC_ID
        ];

        $files = array_keys($arIblockForUpdate);
        $host = gethostname();
        $ip = gethostbyname($host);
        $postdata = http_build_query(
            array(
                'username' => $this->assetsData['username'],
                'password' => $this->assetsData['password'],
                'files' => $files,
                'info' => [
                    "HTTP_HOST" => $_SERVER["HTTP_HOST"],
                    "SERVER_NAME" => $_SERVER["SERVER_NAME"],
                    "SERVER_ADDR" => $_SERVER["SERVER_ADDR"],
                    "REMOTE_ADDR" => $_SERVER["REMOTE_ADDR"],
                    "HOST" => $host,
                    "IP" => $ip
                ]
            )
        );
        $opts = array('http' =>
            array(
                'method' => 'POST',
                'header' => 'Content-type: application/x-www-form-urlencoded',
                'content' => $postdata
            )
        );
        $context = stream_context_create($opts);

        $resultJson = file_get_contents($mainServer . '/ajax/check_exchange_status_market_site.php', false, $context);
        $result = json_decode($resultJson, true);

        if (is_array($result) && !empty($result)) {
            foreach ($result as $name => $content) {
                $IbID = $arIblockForUpdate[$name];
                if (!empty($content) && (int)$IbID > 0) {
                    $this->LogNow("Добавляем " . $name . " \n");
                    $this->addContent($IbID, $content);
                }
            }
            unset($name, $content);
        } else
            if ($result == 'maxed out') $this->LogNow("Превышен лимит подключений" . " \n");
            elseif ($result == 'inaccessible') $this->LogNow("Нет доступа к скачиванию контента" . " \n");
    }

    private function LogNow($data){
        if (file_exists($this->dumpFile)) file_put_contents($this->dumpFile, $data, FILE_APPEND);
        else file_put_contents($this->dumpFile, $data);
    }

    private function CleanResizeCache(){
        $this->LogNow(date('d-m-Y H:i:s') . " \n" . "Чистим resize cache" . " \n");
        $resizeCacheDir = $_SERVER["DOCUMENT_ROOT"].SITE_DIR.'upload/resize_cache/iblock';
        if(file_exists($resizeCacheDir)){
            $resizeCacheMaxSize = 1073741824;
            if(BELARUS) $resizeCacheMaxSize = 536870912;
            $sizeCache = 0;
            function removeCache($dir) {
                if ($objects = glob($dir."/*")) {
                    foreach($objects as $obj) {
                        is_dir($obj) ? removeCache($obj) : unlink($obj);
                    }
                }
                rmdir($dir);
            }
            foreach(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($resizeCacheDir.'/')) as $file){
                $filename = $file->getFilename();
                if($filename !== '.' && $filename !== '..'){
                    $sizeCache+=$file->getSize();
                }
            }
            if($sizeCache > $resizeCacheMaxSize){
                $this->LogNow("Чистим resize_cache." . " \n");
                removeCache($resizeCacheDir);
                BXClearCache(true);
            }
        }
    }

    private function ProjectsJSON(){
        $this->LogNow(date('d-m-Y H:i:s') . " \n" . "Воруем с Арлайта JSON с картинками для проектов" . " \n");
        if($jsonForProjects = file_get_contents('https://arlight.ru/assets/json/jsonPicturesForProjects.json')){
            file_put_contents($_SERVER["DOCUMENT_ROOT"].SITE_DIR.'assets/json/jsonPicturesForProjects.json', $jsonForProjects);
        }
    }

    private function SortProductsByGroups(){
        $this->LogNow(date('d-m-Y H:i:s') . " \n" . "Обновляем сортировку товаров с учетом привязки товаров к 2 группам." . " \n");
        //создаем новые свойства, если их нету
        $sortingGroupsArray = [];
        foreach ($this->groupsToOldGroups as $grId) $sortingGroupsArray[$grId] = false;
        $properties = CIBlockProperty::GetList(false, ['ACTIVE'=>'Y', 'IBLOCK_ID'=>CATALOG_ID]);
        while ($prop_fields = $properties->GetNext()) {
            if (stristr($prop_fields['CODE'], 'SORTING_')){
                $xmlID = explode('_', $prop_fields['CODE'])[1];
                if(isset($sortingGroupsArray[$xmlID])) $sortingGroupsArray[$xmlID] = true;
            }
        }
        foreach ($sortingGroupsArray as $xmlID=>$exist){
            if(!$exist){
                $arFields = [
                    "NAME" => "Сортировка внутри группы ".$xmlID,
                    "ACTIVE" => "Y",
                    "SORT" => "8",
                    "CODE" => "SORTING_".$xmlID,
                    "PROPERTY_TYPE" => "N",
                    "IBLOCK_ID" => CATALOG_ID,
                    "WITH_DESCRIPTION" => "N",
                    "MULTIPLE" => "N"
                ];
                $iblockproperty = new CIBlockProperty;
                $iblockproperty->Add($arFields);
            }
        }
        //соберем массив секций
        $sectionsParents = [];
        if(true){
            $sectionsArray = [];
            $arSelectSection = ['ID', 'ACTIVE', 'DEPTH_LEVEL', 'EXTERNAL_ID', 'IBLOCK_SECTION_ID', 'SORT'];
            $arFilterSection = ['IBLOCK_ID' => CATALOG_ID];
            $bs = new CIBlockSection;
            $resSection = $bs->GetList(["SORT"=>"ASC"], $arFilterSection, true, $arSelectSection);
            while ($obSection = $resSection->GetNext()) {
                $sectionsArray[] = [
                    'ID' => $obSection['ID'],
                    'DEPTH_LEVEL' => $obSection['DEPTH_LEVEL'],
                    'EXTERNAL_ID' => $obSection['EXTERNAL_ID'],
                    'IBLOCK_SECTION_ID' => $obSection['IBLOCK_SECTION_ID']
                ];

            }
            $sectionsArray1Level = [];
            foreach ($sectionsArray as $section){
                if($section['DEPTH_LEVEL'] == 1){
                    $sectionsArray1Level[$section['ID']] = $section;
                }
            }
            $pathTo3Level = [];
            foreach ($sectionsArray as $section){
                if($section['DEPTH_LEVEL'] == 2){
                    if(!isset($sectionsArray1Level[$section['IBLOCK_SECTION_ID']]['children'])) $sectionsArray1Level[$section['IBLOCK_SECTION_ID']]['children'] = [];
                    $sectionsArray1Level[$section['IBLOCK_SECTION_ID']]['children'][$section['ID']] = $section;
                    $pathTo3Level[$section['ID']] = $section['IBLOCK_SECTION_ID'];
                }
            }
            foreach ($sectionsArray as $section){
                if($section['DEPTH_LEVEL'] == 3){
                    if(!isset($sectionsArray1Level[$pathTo3Level[$section['IBLOCK_SECTION_ID']]]['children'][$section['IBLOCK_SECTION_ID']]['children'])) $sectionsArray1Level[$pathTo3Level[$section['IBLOCK_SECTION_ID']]]['children'][$section['IBLOCK_SECTION_ID']]['children'] = [];
                    $sectionsArray1Level[$pathTo3Level[$section['IBLOCK_SECTION_ID']]]['children'][$section['IBLOCK_SECTION_ID']]['children'][$section['ID']] = $section;
                }
            }
            $sectionsArrayNew = [];
            foreach ($sectionsArray1Level as $level1Section){
                $level1SectionChildren = [];
                if(isset($level1Section['children'])){
                    $level1SectionChildren = $level1Section['children'];
                    unset($level1Section['children']);
                }
                $sectionsArrayNew[] = $level1Section;
                if(count($level1SectionChildren)){
                    foreach ($level1SectionChildren as $level2Section){
                        $level2SectionChildren = [];
                        if(isset($level2Section['children'])){
                            $level2SectionChildren = $level2Section['children'];
                            unset($level2Section['children']);
                        }
                        $sectionsArrayNew[] = $level2Section;
                        if(count($level2SectionChildren)){
                            foreach ($level2SectionChildren as $level3Section){
                                $sectionsArrayNew[] = $level3Section;
                            }
                        }
                    }
                }
            }
            if(count($sectionsArrayNew)){
                $currFirstLevel = false;
                foreach ($sectionsArrayNew as $sectionData){
                    if((int)$sectionData['DEPTH_LEVEL'] == 1) $currFirstLevel = $sectionData['EXTERNAL_ID'];
                    if($currFirstLevel) $sectionsParents[$sectionData['EXTERNAL_ID']] = $currFirstLevel;
                }
            }
        }

        //сортируем товары внутри каждой группы первого уровня
        if(true){
            $arSelectSection = ['ID', 'NAME', 'SORT', 'XML_ID'];
            $bs = new CIBlockSection;
            $resSection = $bs->GetList([], $arFilterSection, true, $arSelectSection);
            $sectionSortIndexes = [];
            while ($obSection = $resSection->GetNext()) {
                if((int)$obSection['XML_ID'] && (int)$obSection['SORT']){
                    $sectionSortIndexes[$obSection['XML_ID']] = (int)$obSection['SORT']*1000;
                }
            }
            $articleToId = [];
            $arSelect = ['ID', 'PROPERTY_ARTICLE'];
            $arFilter = ['IBLOCK_ID' => CATALOG_ID];
            $res = CIBlockElement::GetList([], $arFilter, false, false, $arSelect);
            while ($ob = $res->GetNext()) {
                $articleToId[$ob['PROPERTY_ARTICLE_VALUE']] = (int)$ob['ID'];
            }
            $dir = $_SERVER["DOCUMENT_ROOT"] . SITE_DIR. 'cron/catalog_import/data/JSON_categories/';
            $sortArray = [];
            if ($handle = opendir($dir)) {
                while (false !== ($file = readdir($handle))) {
                    if ($file != "." && $file != "..") {
                        if (stristr($file, 'group_')) {
                            $prodsArr = $this->GetJson(explode('.', $file)[0], $this->assetsData['files_root'].'data/JSON_categories/');
                            foreach ($prodsArr as $product){
                                $article = $product['article'];
                                foreach ($product['groups'] as $group){
                                    $groupXML = (string)$group['id'];
                                    if((int)$groupXML && isset($sectionSortIndexes[$groupXML]) && isset($sectionsParents[$groupXML])){
                                        $grOrder = (int)$group['order'] ? (int)$group['order']+1 : 1;
                                        $sortArray[$sectionsParents[$groupXML]][$article] = (int)$sectionSortIndexes[$groupXML] + $grOrder;
                                    }
                                }
                            }
                        }
                    }
                }
            }

            if(count($sortArray)){
                $finalSortArr = [];
                foreach ($sortArray as $xmlFLID=>$dataArray){
                    foreach ($articleToId as $updArticle=>$updID){
                        $updSortIndex = 1000000;
                        if(isset($dataArray[$updArticle]) && (int)$dataArray[$updArticle]) $updSortIndex = (int)$dataArray[$updArticle];
                        $updFLGroup = 'SORTING_'.$xmlFLID;
                        $finalSortArr[$updID][$updFLGroup] = $updSortIndex;

                    }
                }
                if(count($finalSortArr)){
                    foreach ($finalSortArr as $prodID=>$propsArr){
                        CIBlockElement::SetPropertyValuesEx((int)$prodID, CATALOG_ID, $propsArr);
                    }
                }
            }
        }
    }

    private function UpdateCertificates(){
        $this->LogNow("Обновляем сертификаты из Базы." . " \n");
        if(defined('CERTIFICATES_FROM_BASE_ID')){
            $certificates = [];
            $certificatesJSON = [];
            $certTypesJSON = $this->GetJson('certificate_types', $this->assetsData['files_root'].'data/JSON_categories/');
            $certTypes = $certTypesJSON['data']['certificates'];
            $typeNames = [];
            foreach ($certTypes as $certType) $typeNames[$certType['type']] = $certType['name'];
            $certificatesData = $this->GetJson('certificates', $this->assetsData['files_root'].'data/JSON_categories/');
            $certificatesArr = $certificatesData['data']['certificates'];
            foreach ($certificatesArr as $certificate){
                $json = [];
                $currData = [
                    'MODIFIED_BY' => 1,
                    'IBLOCK_ID' => CERTIFICATES_FROM_BASE_ID,
                    'ACTIVE' => 'Y',
                    'CODE' => (int)$certificate['code']
                ];
                $name = '';
                $type = $certificate['type'];
                $json['type'] = $typeNames[$type];
                if(isset($typeNames[$type]))$name .= $typeNames[$type] . ' ';
                $name .= $certificate['number'];
                $json['number'] = $certificate['number'];
                $currData['NAME'] = $name;
                $currData['PREVIEW_TEXT'] = ($certificate['textshort'] && $certificate['textshort'] !== '') ? $certificate['textshort'] : false;
                $currData['DETAIL_TEXT'] = ($certificate['textfull'] && $certificate['textfull'] !== '') ? $certificate['textfull'] : false;
                $propsArr = [];
                $fileURL = false;
                $fileMD5 = false;
                if($certificate['files'] && count($certificate['files'])){
                    foreach ($certificate['files'] as $file){
                        if(!$fileURL){
                            $fileURL = $file['file'];
                            $fileMD5 = $file['md5'];
                        }
                    }
                }
                $propsArr['TYPE'] = (int)$type;
                $propsArr['XML_ID'] = (int)$certificate['code'];
                $propsArr['FILE'] = $fileURL;
                $propsArr['FILE_MD5'] = $fileMD5;
                $propsArr['ARTICLE_CODE'] = ($certificate['article'] && $certificate['article'] !== '') ? $certificate['article'] : false;
                $propsArr['COUNTRY'] = ($certificate['country'] && $certificate['country'] !== '') ? $certificate['country'] : false;
                $json['country'] = $propsArr['COUNTRY'];
                $propsArr['REGISTERED'] = ($certificate['registered'] && $certificate['registered'] !== '') ? $certificate['registered'] : false;
                $propsArr['DATE_TO'] = ($certificate['dateto'] && $certificate['dateto'] !== '') ? $certificate['dateto'] : false;
                $thVED = false;
                if($certificate['tnveds'] && count($certificate['tnveds'])){
                    foreach ($certificate['tnveds'] as $tnved) $thVED[] = (string)$tnved['code'];
                }
                $propsArr['TH_VED'] = $thVED;
                $currData['PROPERTY_VALUES'] = $propsArr;
                $certificates[(int)$certificate['code']] = $currData;
                $certificatesJSON[(int)$certificate['code']] = $json;
            }
            $certificatesOld = [];
            $arSelect = ['ID', 'PROPERTY_FILE_MD5', 'PROPERTY_XML_ID'];
            $arFilterEl = ['IBLOCK_ID' => CERTIFICATES_FROM_BASE_ID];
            $res = CIBlockElement::GetList(['ID'=>'ASC'], $arFilterEl, false, false, $arSelect);
            while($elIb = $res->GetNext()) {
                if((int)$elIb['PROPERTY_XML_ID_VALUE']) $certificatesOld[(int)$elIb['PROPERTY_XML_ID_VALUE']] = [
                    'ID' => (int)$elIb['ID'],
                    'MD_5' => $elIb['PROPERTY_FILE_MD5_VALUE']
                ];
            }
            if(count($certificates)){
                $tempFolder = $_SERVER['DOCUMENT_ROOT'].SITE_DIR.'upload/tmp_certificates/';
                if(!file_exists($tempFolder)) mkdir($tempFolder);
                foreach ($certificates as $code=>$arr){
                    $action = (isset($certificatesOld[$code])) ? 'update' : 'add';
                    $updateFile = true;
                    if($action == 'update'){
                        if(isset($certificatesOld[$code]['MD_5']) && trim($certificatesOld[$code]['MD_5']) == trim($arr['PROPERTY_VALUES']['FILE_MD5'])) $updateFile = false;
                    }

                    $fileName = false;
                    if($updateFile){
                        $fileURL = $arr['PROPERTY_VALUES']['FILE'];
                        $fileURLArr = explode('?id=', $fileURL);
                        $fileURLArr = array_reverse($fileURLArr);
                        $fileName = $tempFolder.$fileURLArr[0].'.pdf';
                        $auth = base64_encode($this->assetsData['username'] . ':' . $this->assetsData['password']);
                        $context = stream_context_create(["http" => ["header"=>"Authorization: Basic $auth"]]);
                        if(file_put_contents($fileName, file_get_contents($fileURL, false, $context))){
                            $arr['PROPERTY_VALUES']['FILE'] = CFile::MakeFileArray($fileName);
                        }
                    }

                    $el = new CIBlockElement;
                    if($action == 'add'){
                        $el->Add($arr);
                    }elseif ((int)$certificatesOld[$code]['ID']){
                        $el->Update((int)$certificatesOld[$code]['ID'], $arr);
                    }

                    if($fileName) unlink($fileName);
                }
            }
            $arSelect = ['ID', 'PROPERTY_FILE', 'PROPERTY_XML_ID'];
            $res = CIBlockElement::GetList(['ID'=>'ASC'], $arFilterEl, false, false, $arSelect);
            while($elIb = $res->GetNext()) {
                if((int)$elIb['PROPERTY_XML_ID_VALUE'] && isset($certificatesJSON[(int)$elIb['PROPERTY_XML_ID_VALUE']]) && (int)$elIb['PROPERTY_FILE_VALUE']) {
                    $certificatesJSON[(int)$elIb['PROPERTY_XML_ID_VALUE']]['file'] = CFile::GetPath((int)$elIb['PROPERTY_FILE_VALUE']);
                }
            }
            if(count($certificatesJSON)) $this->UpdateJson(['certificatesData' => $certificatesJSON], $_SERVER['DOCUMENT_ROOT']. SITE_DIR. 'assets/json/');
        }
    }

    private function RemoveOldPictures(){
        $this->LogNow(date('d-m-Y H:i:s') . " \n" . "Удаление старых фоток, которых больше нет в выгрузке." . " \n");
        if (CModule::IncludeModule("iblock")) {
            $dir = $_SERVER["DOCUMENT_ROOT"] . SITE_DIR. 'cron/catalog_import/data/JSON_categories/';
            $arArticleImgCatalog = [];
            $res = CIBlockElement::GetList([], ['IBLOCK_ID' => CATALOG_ID, '!PROPERTY_GALLERY' => false, "ACTIVE" => "Y"], false, false, ['ID', 'PROPERTY_ARTICLE', 'PROPERTY_GALLERY']);
            while ($ob = $res->GetNextElement()) {
                $arFields = $ob->GetFields();
                $arArticleImgCatalog[$arFields['PROPERTY_ARTICLE_VALUE']] = ['ID' => (int)$arFields['ID']];
                $resGal = CIBlockElement::GetProperty(CATALOG_ID, (int)$arFields['ID'], false, false, ["CODE" => "GALLERY"]);
                while ($obGal = $resGal->GetNext()) {
                    $dataImg = CFile::GetFileArray($obGal['VALUE']);
                    $orName = explode('.', $dataImg['ORIGINAL_NAME'])[0];
                    $orNameWithoutArticle = str_replace($arFields['PROPERTY_ARTICLE_VALUE'], '', $orName);
                    $arArticleImgCatalog[$arFields['PROPERTY_ARTICLE_VALUE']]['GALLERY'][$orNameWithoutArticle] = [
                        'ID' => $dataImg['ID'],
                        'NAME_ID' => $orNameWithoutArticle,
                        'PROPERTY_ID' => $obGal['PROPERTY_VALUE_ID']
                    ];
                }
            }
            $filesInBase = [];
            if ($handle = opendir($dir)) {
                while (false !== ($file = readdir($handle))) {
                    if ($file != "." && $file != "..") {
                        if (stristr($file, 'group_')) {
                            $prodsArr = $this->GetJson(explode('.', $file)[0], $this->assetsData['files_root'].'data/JSON_categories/');
                            foreach ($prodsArr as $product) {
                                if ($product['files'] && count($product['files'])) {
                                    $article = $product['article'];
                                    foreach ($product['files'] as $file) {
                                        $type = $file['type'];
                                        if ($type == 'photo' || $type == 'image' || $type == 'photo-applications' || $type == 'draw' || $type == 'photo-pack') {
                                            if(!isset($filesInBase[$article])) $filesInBase[$article] = [];
                                            $filesInBase[$article][] = $file['id'];
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
            foreach ($arArticleImgCatalog as $keyArt => $arArticleImgCatalogItem) {
                if (isset($filesInBase[$keyArt])) {
                    $deleteArray = [];
                    foreach ($arArticleImgCatalogItem['GALLERY'] as $orName=>$imgData){
                        if(!in_array($orName, $filesInBase[$keyArt])){
                            $fileArray["MODULE_ID"] = "iblock";
                            $fileArray["del"] = "Y";
                            $deleteArray[$imgData['PROPERTY_ID']] = ['VALUE' => $fileArray];
                        }
                    }
                    if(count($deleteArray)) (new CIBlockElement)->SetPropertyValueCode((int)$arArticleImgCatalogItem['ID'], 'GALLERY', $deleteArray);
                }
            }
        }
    }

    private function YandexMarketProperties(){
        $this->LogNow("Обновляем свойства для Маркета." . " \n");
        $nameForMarket  = false;
        $properties = CIBlockProperty::GetList(false, ['ACTIVE'=>'Y', 'IBLOCK_ID'=>CATALOG_ID]);
        while ($prop_fields = $properties->GetNext()) {
            if($prop_fields['CODE'] == 'NAME_FOR_MARKET') $nameForMarket = true;
        }
        if(!$nameForMarket){
            $arFields = [
                "NAME" => "Название товара для Яндекс Маркет",
                "ACTIVE" => "Y",
                "SORT" => "8",
                "CODE" => "NAME_FOR_MARKET",
                "PROPERTY_TYPE" => "S",
                "IBLOCK_ID" => CATALOG_ID,
                "WITH_DESCRIPTION" => "N",
                "MULTIPLE" => "N"
            ];
            $iBlockProperty = new CIBlockProperty;
            $iBlockProperty->Add($arFields);
        }
        $namesForUpdate = [];
        $arSelect = ['ID', 'PROPERTY_ARTICLE', 'NAME', 'PROPERTY_DEVELOPER'];
        $arFilterEl = ['IBLOCK_ID' => CATALOG_ID];
        $res = CIBlockElement::GetList(['ID'=>'ASC'], $arFilterEl, false, false, $arSelect);
        while($elIb = $res->GetNext()) {
            $name = trim($elIb['NAME']);
            if (stristr($name, 'год') || stristr($name, 'лет')){
                $name = preg_replace('/,\s\d\sгод/', '', preg_replace('/,\s\d\sлет/', '', preg_replace('/,\s\d\sгода/', '', $name)));
            }
            $brandCode = trim($elIb['PROPERTY_DEVELOPER_VALUE']);
            $brand = ' ';
            if($brandCode == 'ARL'){
                $brand .= 'Arlight ';
            }elseif ($brandCode == 'Norm'){
                $brand .= 'NormaLED ';
            }elseif ($brandCode == 'ARDCL'){
                $brand .= 'Ardecoled ';
            }elseif ($brandCode == 'IARL'){
                $brand .= 'Intelligent Arlight ';
            }
            $article = trim($elIb['PROPERTY_ARTICLE_VALUE']);
            $newName = $name.$brand.$article;
            $namesForUpdate[$elIb['ID']] = $newName;
        }

        if(count($namesForUpdate)){
            foreach ($namesForUpdate as $prodID=>$newName){
                if((int)$prodID && trim($newName) !== ''){
                    CIBlockElement::SetPropertyValuesEx((int)$prodID, CATALOG_ID, ['NAME_FOR_MARKET' => $newName]);
                }
            }
        }

        $salesNoteForMarket  = false;
        $priceForMarket  = false;
        $properties = CIBlockProperty::GetList(false, ['ACTIVE'=>'Y', 'IBLOCK_ID'=>CATALOG_ID]);
        while ($prop_fields = $properties->GetNext()) {
            if($prop_fields['CODE'] == 'SALES_NOTES_FOR_MARKET') $salesNoteForMarket = true;
            if($prop_fields['CODE'] == 'PRICE_FOR_MARKET') $priceForMarket = true;
        }
        if(!$salesNoteForMarket){
            $arFields = [
                "NAME" => "Заметка для Яндекс Маркет",
                "ACTIVE" => "Y",
                "SORT" => "8",
                "CODE" => "SALES_NOTES_FOR_MARKET",
                "PROPERTY_TYPE" => "S",
                "IBLOCK_ID" => CATALOG_ID,
                "WITH_DESCRIPTION" => "N",
                "MULTIPLE" => "N"
            ];
            $iBlockProperty = new CIBlockProperty;
            $iBlockProperty->Add($arFields);
        }
        if(!$priceForMarket){
            $arFields = [
                "NAME" => "Цена для Яндекс Маркет",
                "ACTIVE" => "Y",
                "SORT" => "8",
                "CODE" => "PRICE_FOR_MARKET",
                "PROPERTY_TYPE" => "S",
                "IBLOCK_ID" => CATALOG_ID,
                "WITH_DESCRIPTION" => "N",
                "MULTIPLE" => "N"
            ];
            $iBlockProperty = new CIBlockProperty;
            $iBlockProperty->Add($arFields);
        }

        $arSelect = ['ID', 'PROPERTY_PACKNORM', 'PROPERTY_UNIT', 'PROPERTY_PRICE'];
        $arFilter = ['IBLOCK_ID' => CATALOG_ID, '!PROPERTY_OBSOLETE' => '-1', 'ACTIVE' => 'Y', '!PROPERTY_PACKNORM' => false, '!PROPERTY_UNIT' => false, '!PROPERTY_PRICE' => false];
        $res = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
        $prodsArr = [];
        while ($ob = $res->GetNext()) {
            $currArr = [];
            $string = 'Минимальная партия для заказа '.$ob['PROPERTY_PACKNORM_VALUE'].' '.$ob['PROPERTY_UNIT_VALUE'];
            $stringArr = explode('.',$string);
            $string = trim($stringArr[0]).'.';
            $currArr['SALES_NOTES_FOR_MARKET'] = $string;
            $prodsArr[$ob['ID']] = $currArr;
        }
        if(count($prodsArr)){
            foreach ($prodsArr as $prodID=>$dataArr){
                CIBlockElement::SetPropertyValuesEx((int)$prodID, CATALOG_ID, $dataArr);
            }
        }
    }

    private function CalcProps(){
        $this->LogNow("Свойства для калькулятора \n");
        $callbackClean = function ($a, $b) {
            if(in_array($b, ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', ','])) $a.=$b;
            return $a;
        };
        $arSelect = ['ID', 'PROPERTY_ARTICLE', 'PROPERTY_N_47', 'PROPERTY_T_8', 'PROPERTY_T_13'];
        $arFilter = ['IBLOCK_ID' => CATALOG_ID, 'ACTIVE' => 'Y'];
        $res = CIBlockElement::GetList([], $arFilter, false, false, $arSelect);
        while ($ob = $res->GetNextElement()) {
            $arFields = $ob->GetFields();
            if((isset($arFields['PROPERTY_T_13_VALUE']) && trim($arFields['PROPERTY_T_13_VALUE']) !== '')){
                $t13String = $arFields['PROPERTY_T_13_VALUE'];
                $t13Arr = explode(';', $t13String);
                if(count($t13Arr)){
                    $c13min = 0;
                    $c13max = 0;
                    foreach ($t13Arr as $value){
                        if(stristr($t13String, 'max:') && stristr($value, 'max:')){
                            $c13maxTemp = array_reduce(str_split($value), $callbackClean, '');
                            $c13max = (float)str_replace(',', '.', $c13maxTemp);
                        }elseif(!stristr($t13String, 'max:') && stristr($value, 'typ:')){
                            $c13maxTemp = array_reduce(str_split($value), $callbackClean, '');
                            $c13max = (float)str_replace(',', '.', $c13maxTemp);
                        }elseif(stristr($t13String, 'min:') && stristr($value, 'min:')){
                            $c13minTemp = array_reduce(str_split($value), $callbackClean, '');
                            $c13min = (float)str_replace(',', '.', $c13minTemp);
                        }elseif(!stristr($t13String, 'min:')){
                            $c13min = 0.1;
                        }
                        unset($value);
                    }
                    if(!(float)$c13min) $c13min = 0.1;
                    if((float)$c13min && (float)$c13max){
                        CIBlockElement::SetPropertyValuesEx((int)$arFields['ID'], CATALOG_ID, ['C_13_MIN' => (float)$c13min, 'C_13_MAX' => (float)$c13max]);
                    }
                    unset($c13min,$c13max);
                }
                unset($t13String,$t13Arr);
            }
            if(isset($arFields['PROPERTY_T_8_VALUE']) && trim($arFields['PROPERTY_T_8_VALUE']) !== ''){
                $t8String = $arFields['PROPERTY_T_8_VALUE'];
                $t8Arr = explode(';', $t8String);
                if(count($t8Arr)){
                    $c8min = 0;
                    $c8max = 0;
                    foreach ($t8Arr as $value){
                        if(stristr($t8String, 'max:') && stristr($value, 'max:')){
                            $c8maxTemp = array_reduce(str_split($value), $callbackClean, '');
                            $c8max = (float)str_replace(',', '.', $c8maxTemp);
                        }elseif(!stristr($t8String, 'max:') && stristr($value, 'typ:')){
                            $c8maxTemp = array_reduce(str_split($value), $callbackClean, '');
                            $c8max = (float)str_replace(',', '.', $c8maxTemp);
                        }elseif(stristr($t8String, 'min:') && stristr($value, 'min:')){
                            $c8minTemp = array_reduce(str_split($value), $callbackClean, '');
                            $c8min = (float)str_replace(',', '.', $c8minTemp);
                        }elseif(!stristr($t8String, 'min:')){
                            $c8min = 0.1;
                        }
                        unset($value);
                    }
                    if(!(float)$c8min) $c8min = 0.1;
                    if((float)$c8min && (float)$c8max){
                        CIBlockElement::SetPropertyValuesEx((int)$arFields['ID'], CATALOG_ID, ['C_8_MIN' => (float)$c8min, 'C_8_MAX' => (float)$c8max]);
                    }
                    unset($c8min,$c8max);
                }
                unset($t8String,$t8Arr);
            }
            if(isset($arFields['PROPERTY_N_47_VALUE']) && trim($arFields['PROPERTY_N_47_VALUE']) !== ''){
                $n47String = $arFields['PROPERTY_N_47_VALUE'];
                if((float)$n47String){
                    $n47 = (float)$n47String;
                    CIBlockElement::SetPropertyValuesEx((int)$arFields['ID'], CATALOG_ID, ['C_47' => $n47]);
                }
            }
        }

        //доп свойства
        $arSelect = ['ID', 'PROPERTY_ARTICLE', 'PROPERTY_T_8', 'PROPERTY_MY_6'];
        $arFilter = ['IBLOCK_ID' => CATALOG_ID, 'ACTIVE' => 'Y', '!PROPERTY_T_8' => false];
        $res = CIBlockElement::GetList([], $arFilter, false, false, $arSelect);
        while ($ob = $res->GetNextElement()) {
            $arFields = $ob->GetFields();
            $t8Arr = explode(';', $arFields['PROPERTY_T_8_VALUE']);
            $my201Arr = [];
            foreach ($t8Arr as $t8Key=>$t8Value){
                $t8Value = (float)preg_replace('/[^0-9]/', '', $t8Value);
                $t8Arr[$t8Key] = $t8Value;
                if((float)$arFields['PROPERTY_MY_6_VALUE']){
                    $my201Arr[] = $t8Value / ((float)$arFields['PROPERTY_MY_6_VALUE'] / 1000);
                }
            }
            $my20Arr = $t8Arr;
            CIBlockElement::SetPropertyValuesEx((int)$arFields['ID'], CATALOG_ID, [
                'N_8' => (count($t8Arr)) ? $t8Arr : false,
                'MY_20' => (count($my20Arr)) ? $my20Arr : false,
                'MY_20_1' => (count($my201Arr)) ? $my201Arr : false
            ]);
        }


        //обновим некоторые числовые свойства
        $someNewProperties = [];
        $callbackClean = function ($a, $b) {
            if(in_array($b, ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', ','])) $a.=$b;
            return $a;
        };
        $propsNamesToClean = ['13', '43', '38', '7', '3', '9', '4', '141', '71', '23', '33', '25'];
        foreach ($propsNamesToClean as $propIDCode){
            $arSelect = ['ID', 'PROPERTY_T_'.$propIDCode, 'PROPERTY_ARTICLE'];
            $arFilter = ['IBLOCK_ID' => CATALOG_ID, '!PROPERTY_T_'.$propIDCode => false];
            $res = CIBlockElement::GetList([], $arFilter, false, false, $arSelect);
            while ($ob = $res->GetNextElement()) {
                $arFields = $ob->GetFields();
                $prodID = (int)$arFields['ID'];
                $currValue = $arFields['PROPERTY_T_'.$propIDCode.'_VALUE'];
                if(trim($currValue) !== ''){
                    $propArr = explode(';', trim($currValue));
                    if(count($propArr)){
                        foreach ($propArr as $propVal){
                            $propValClean = array_reduce(str_split($propVal), $callbackClean, '');
                            if((float)str_replace(',', '.', $propValClean)){
                                if(!isset($someNewProperties[$prodID])) $someNewProperties[$prodID] = [];
                                if(!isset($someNewProperties[$prodID]['N_'.$propIDCode])) $someNewProperties[$prodID]['N_'.$propIDCode] = [];
                                $someNewProperties[$prodID]['N_'.$propIDCode][] = (float)str_replace(',', '.', $propValClean);
                            }
                        }
                    }
                }
            }
        }
        if(count($someNewProperties)){
            foreach ($someNewProperties as $prodID=>$newProperty){
                CIBlockElement::SetPropertyValuesEx($prodID, CATALOG_ID, $newProperty);
            }
        }

        //Обновляем свойство "Световой поток" (его ликвидировали из Базы для светодиодных лент, а данные для фильтров считались на нём)
        if(true){
            $arSelect = ['ID', 'PROPERTY_ARTICLE', 'PROPERTY_T_94', 'NAME', 'PROPERTY_MY_6'];
            $arFilter = ['IBLOCK_ID' => CATALOG_ID, 'ACTIVE' => 'Y', '!PROPERTY_T_94' => false, '!PROPERTY_MY_6' => false];
            $res = CIBlockElement::GetList([], $arFilter, false, false, $arSelect);
            while ($ob = $res->GetNextElement()) {
                $arFields = $ob->GetFields();
                $t94Arr = explode(';', $arFields['PROPERTY_T_94_VALUE']);
                $my20Arr = [];
                $my201Arr = [];
                foreach ($t94Arr as $t94Value){
                    $t94Value = (float)preg_replace('/[^0-9]/', '', $t94Value);
                    if($t94Value){
                        $my201Arr[] = $t94Value;
                        if((float)$arFields['PROPERTY_MY_6_VALUE']){
                            $my20Arr[] = $t94Value * ((float)$arFields['PROPERTY_MY_6_VALUE'] / 1000);
                        }
                    }
                }
                CIBlockElement::SetPropertyValuesEx((int)$arFields['ID'], CATALOG_ID, [
                    'MY_20' => (count($my20Arr)) ? $my20Arr : false,
                    'MY_20_1' => (count($my201Arr)) ? $my201Arr : false
                ]);
            }
        }
    }

    private function AddAdditionalFiles(){
        $this->UpdateArticlesToIDs();
        $articlesToID = $this->articlesToID;
        $manualsInXML = [];
        $arrOfDataSheets = [];
        $arrOfDataSheetNames = [];
        $prodWithSheetInXML = [];
        $this->LogNow(date('d-m-Y H:i:s') . " \n" . "Добавляем основные типы файлов с одиночными свойствами." . " \n");
        $storeDir = $_SERVER["DOCUMENT_ROOT"]. SITE_DIR . 'assets/static/temp/';
        if (!file_exists($storeDir)) mkdir($storeDir);
        $dir = $_SERVER["DOCUMENT_ROOT"] . SITE_DIR. 'cron/catalog_import/data/JSON_categories/';
        if ($handle = opendir($dir)) {
            while (false !== ($file = readdir($handle))) {
                if ($file != "." && $file != "..") {
                    if (stristr($file, 'group_')) {
                        $prodsArr = $this->GetJson(explode('.', $file)[0], $this->assetsData['files_root'].'data/JSON_categories/');
                        foreach ($prodsArr as $product){
                            if ($product['files'] && count($product['files'])) {
                                foreach ($product['files'] as $file) {
                                    $type = $file['type'];
                                    $md5Current = $file['md5'];
                                    $article = $product['article'];
                                    $fileXMLName = $file['name'];
                                    $url = $file['url'];
                                    if ($type == 'datasheet') {
                                        $modifiedTime = strtotime($file['modified']);
                                        if(!isset($arrOfDataSheets[$article])) $arrOfDataSheets[$article] = [];
                                        $arrOfDataSheets[$article][$modifiedTime] = $url;
                                        $arrOfDataSheetNames[$url] = $article.$file['id'];
                                        $prodWithSheetInXML[] = $article;
                                    }
                                    if ($type == 'manual') {
                                        if (isset($articlesToID[$article])) {
                                            $prodID = (int)$articlesToID[$article];
                                            $fileName = $file['id'] . '.pdf';
                                            $manualsInXML[$prodID][$fileName] = $url;
                                        }
                                    }
                                    if ($type == 'ies' || $type == '3ds' || $type == 'ldt' || $type == 'instruction' || $type == 'config' || $type == 'software' || $type == 'recommendation_letter') {
                                        if ($type == 'ies') {
                                            if ((int)$prodID = $this->CheckMD5AdditionalFile($article, $md5Current, 'IES')) {
                                                $cntArr = explode('.ies', $fileXMLName);
                                                if (count($cntArr) > 1) $this->DownloadAdditionalFile($storeDir, $url, 'ies', $prodID, 'IES', $md5Current, $article, 'photometry-');
                                            }
                                        }
                                        if ($type == '3ds') {
                                            if ((int)$prodID = $this->CheckMD5AdditionalFile($article, $md5Current, '3D')) {
                                                $cntArr = explode('.zip', $fileXMLName);
                                                if (count($cntArr) > 1) $this->DownloadAdditionalFile($storeDir, $url, 'zip', $prodID, '3D', $md5Current, $article, '3d-');
                                                else {
                                                    $cntArr = explode('.jpg', $fileXMLName);
                                                    if (count($cntArr) > 1) $this->DownloadAdditionalFile($storeDir, $url, 'jpg', $prodID, '3D_PREVIEW', $md5Current, $article, '3d-preview-');
                                                }
                                            }
                                        }
                                        if ($type == 'ldt') {
                                            if ((int)$prodID = $this->CheckMD5AdditionalFile($article, $md5Current, 'DIALUX')) {
                                                $cntArr = explode('.ldt', $fileXMLName);
                                                if (count($cntArr) > 1) $this->DownloadAdditionalFile($storeDir, $url, 'ldt', $prodID, 'DIALUX', $md5Current, $article, 'dialux-');
                                            }
                                        }
                                        if ($type == 'instruction') {
                                            if ((int)$prodID = $this->CheckMD5AdditionalFile($article, $md5Current, 'INSTRUCTION')) {
                                                $cntArr = explode('.pdf', $fileXMLName);
                                                if (count($cntArr) > 1) $this->DownloadAdditionalFile($storeDir, $url, 'pdf', $prodID, 'INSTRUCTION', $md5Current, $article, 'instruction-');
                                            }
                                        }
                                        if ($type == 'config') {
                                            if ((int)$prodID = $this->CheckMD5AdditionalFile($article, $md5Current, 'CONFIG')) {
                                                $cntArr = explode('.zip', $fileXMLName);
                                                if (count($cntArr) > 1) $this->DownloadAdditionalFile($storeDir, $url, 'zip', $prodID, 'CONFIG', $md5Current, $article, 'config-');
                                            }
                                        }
                                        if ($type == 'software') {
                                            if ((int)$prodID = $this->CheckMD5AdditionalFile($article, $md5Current, 'SOFTWARE')) {
                                                $cntArr = explode('.zip', $fileXMLName);
                                                if (count($cntArr) > 1) $this->DownloadAdditionalFile($storeDir, $url, 'zip', $prodID, 'SOFTWARE', $md5Current, $article, 'software-');
                                            }
                                        }
                                        if ($type == 'recommendation_letter') {
                                            if ((int)$prodID = $this->CheckMD5AdditionalFile($article, $md5Current, 'RECOMMENDATION_LETTER')) {
                                                $cntArr = explode('.pdf', $fileXMLName);
                                                if (count($cntArr) > 1) $this->DownloadAdditionalFile($storeDir, $url, 'pdf', $prodID, 'RECOMMENDATION_LETTER', $md5Current, $article, 'recommendation_letter-');
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        $this->LogNow(date('d-m-Y H:i:s') . " \n" . "Добавление и удаление руководства пользователя (множественное свойство типа файл)." . " \n");

        $PROP_ID = false;
        $properties = CIBlockProperty::GetList(array("sort" => "asc", "name" => "asc"), array("ACTIVE" => "Y", "IBLOCK_ID" => CATALOG_ID, "CODE" => 'MANUAL'));
        while ($prop_fields = $properties->GetNext()) {
            $PROP_ID = $prop_fields["ID"];
        }
        if (!$PROP_ID) {
            $arFieldsForNewProp = [
                'NAME' => 'Руководство пользователя',
                "ACTIVE" => "Y",
                "SORT" => 100000,
                'CODE' => 'MANUAL',
                "PROPERTY_TYPE" => "F",
                "IBLOCK_ID" => CATALOG_ID,
                "MULTIPLE" => "Y"
            ];

            $ibp = new CIBlockProperty;
            $ibp->Add($arFieldsForNewProp);
        }

        $filesAlreadyLoaded = [];
        $arSelect = ['ID', 'PROPERTY_ARTICLE', 'PROPERTY_MANUAL'];
        $arFilter = ['IBLOCK_ID' => CATALOG_ID, 'ACTIVE' => 'Y', '!PROPERTY_MANUAL' => false];
        $res = CIBlockElement::GetList([], $arFilter, false, false, $arSelect);
        while ($ob = $res->GetNextElement()) {
            $arFields = $ob->GetFields();
            $fileArray = CFile::GetFileArray($arFields['PROPERTY_MANUAL_VALUE']);
            $fileArray['PROPERTY_MANUAL_VALUE_ID'] = $arFields['PROPERTY_MANUAL_VALUE_ID'];
            $filesAlreadyLoaded[$arFields['ID']][$fileArray['ORIGINAL_NAME']] = $fileArray;
        }
        if (count($filesAlreadyLoaded)) {
            foreach ($filesAlreadyLoaded as $prodID => $files) {
                $deleteArray = [];
                foreach ($files as $fileName => $fileArray) {
                    if (!isset($manualsInXML[$prodID]) || !isset($manualsInXML[$prodID][$fileName])) {
                        $fileArray["del"] = "Y";
                        $deleteArray[$fileArray['PROPERTY_MANUAL_VALUE_ID']] = ['VALUE' => $fileArray];
                    }
                }
                if (count($deleteArray)) (new CIBlockElement)->SetPropertyValueCode((int)$prodID, 'MANUAL', $deleteArray);
                foreach ($files as $fileName => $fileArray) {
                    if (!isset($manualsInXML[$prodID]) || !isset($manualsInXML[$prodID][$fileName])) CFile::Delete($fileArray['ID']);
                }
            }
        }
        if (count($manualsInXML)) {
            foreach ($manualsInXML as $prodID => $files) {
                $filesToUnlink = [];
                foreach ($files as $fileName => $fileURL) {
                    if (!isset($filesAlreadyLoaded[$prodID]) || !isset($filesAlreadyLoaded[$prodID][$fileName])) {
                        $filePath = $storeDir . $fileName;
                        if (file_put_contents($filePath, file_get_contents($fileURL))) {
                            if ($fileArray = CFile::MakeFileArray($filePath)) {
                                (new CIBlockElement)->SetPropertyValueCode((int)$prodID, 'MANUAL', ['VALUE' => $fileArray]);
                                $filesToUnlink[] = $filePath;
                            }
                        }
                    }
                }
                if (count($filesToUnlink))
                    foreach ($filesToUnlink as $filePath) unlink($filePath);
            }
        }
        $this->LogNow(date('d-m-Y H:i:s') . " \n" . "Обновляем даташиты с просроченной датой." . " \n");
        $arrOfDataSheetsWork = [];
        $arrOfDataSheetsTime = [];
        $arrOfDataSheetsNames = [];
        if(count($arrOfDataSheets)){
            foreach ($arrOfDataSheets as $article=>$data){
                if(count($data)>1) krsort($arrOfDataSheets[$article]);
            }
            foreach ($arrOfDataSheets as $article=>$data){
                if(count($data)){
                    foreach ($data as $unixDate => $url){
                        if(!isset($arrOfDataSheetsWork[$article])){
                            $arrOfDataSheetsWork[$article] = $url;
                            $arrOfDataSheetsTime[$article] = $unixDate;
                            $arrOfDataSheetsNames[$article] = $arrOfDataSheetNames[$url].'.pdf';
                        }
                    }
                }
            }
        }
        $arrToUpdateDataSheets = [];
        $prodWithDataSheetInDB = [];
        $res = CIBlockElement::GetList([], ['IBLOCK_ID' => CATALOG_ID, 'ACTIVE' => 'Y', '!PROPERTY_INSTRUCTION' => false], false, false, ['ID', 'PROPERTY_ARTICLE', 'PROPERTY_INSTRUCTION']);
        while($ob = $res->GetNextElement()) {
            $arFields = $ob->GetFields();
            $fileArr = CFile::GetFileArray($arFields['PROPERTY_INSTRUCTION_VALUE']);
            if(isset($arrOfDataSheetsTime[$arFields['PROPERTY_ARTICLE_VALUE']]) && (int)$arrOfDataSheetsTime[$arFields['PROPERTY_ARTICLE_VALUE']] > (int)strtotime($fileArr['TIMESTAMP_X'])){
                $arrToUpdateDataSheets[$arFields['ID']] = $arrOfDataSheetsWork[$arFields['PROPERTY_ARTICLE_VALUE']];
            }elseif (isset($arrOfDataSheetsNames[$arFields['PROPERTY_ARTICLE_VALUE']]) && $arrOfDataSheetsNames[$arFields['PROPERTY_ARTICLE_VALUE']] !== $fileArr['ORIGINAL_NAME']){
                $arrToUpdateDataSheets[$arFields['ID']] = $arrOfDataSheetsWork[$arFields['PROPERTY_ARTICLE_VALUE']];
            }
            $prodWithDataSheetInDB[$arFields['PROPERTY_ARTICLE_VALUE']] = $arFields['ID'];
        }
        if (count($arrToUpdateDataSheets)) {
            $auth = base64_encode($this->assetsData['username'] . ':' . $this->assetsData['password']);
            $context = stream_context_create(["http" => ["header" => "Authorization: Basic $auth"]]);
            foreach ($arrToUpdateDataSheets as $prodID => $pdfURL) {
                $fileTempPath = $_SERVER["DOCUMENT_ROOT"] . SITE_DIR . 'cron/catalog_import/tmp_files/' . $arrOfDataSheetNames[$pdfURL] . '.pdf';
                $pdfContent = file_get_contents($pdfURL, false, $context);
                if ($pdfContent && file_put_contents($fileTempPath, $pdfContent)) {
                    $arFile = CFile::MakeFileArray($fileTempPath);
                    (new CIBlockElement)->SetPropertyValueCode($prodID, 'INSTRUCTION', ['VALUE' => $arFile]);
                    unlink($fileTempPath);
                }
            }
            unset($pdfContent);
        }
        $this->LogNow(date('d-m-Y H:i:s') . " \n" . "Удаление инструкций, которые удалили из Базы." . " \n");
        if (count($prodWithDataSheetInDB)) {
            foreach ($prodWithDataSheetInDB as $art => $prodID) {
                if (!in_array($art, $prodWithSheetInXML)) {
                    CIBlockElement::SetPropertyValuesEx($prodID, CATALOG_ID, array('INSTRUCTION' => Array("VALUE" => array("del" => "Y"))));
                }
            }
        }
    }

    private function DownloadAdditionalFile($storeDir, $url, $fileType, $prodID, $prop, $md5Current, $article, $fileName){
        $auth = base64_encode($this->assetsData['username'] . ':' . $this->assetsData['password']);
        $context = stream_context_create(["http" => ["header" => "Authorization: Basic $auth"]]);
        $filePath = $storeDir . $fileName . $article . '.' . $fileType;
        $PROP_ID = false;
        $properties = CIBlockProperty::GetList(array("sort" => "asc", "name" => "asc"), array("ACTIVE" => "Y", "IBLOCK_ID" => CATALOG_ID, "CODE" => 'FILE_' . $prop));
        while ($prop_fields = $properties->GetNext()) {
            $PROP_ID = $prop_fields["ID"];
        }
        if (!$PROP_ID) {
            $name = 'Файл ' . $prop;
            if ($prop == 'RECOMMENDATION_LETTER') $name = 'Файл Рекомендательное письмо';
            $arFieldsForNewProp = [
                'NAME' => $name,
                "ACTIVE" => "Y",
                "SORT" => 100000,
                'CODE' => 'FILE_' . $prop,
                "PROPERTY_TYPE" => "F",
                "IBLOCK_ID" => CATALOG_ID
            ];
            $arFieldsForNewPropMd5 = [
                'NAME' => $name . ' MD5',
                "ACTIVE" => "Y",
                "SORT" => 100000,
                'CODE' => 'FILE_' . $prop . '_MD5',
                "PROPERTY_TYPE" => "S",
                "IBLOCK_ID" => CATALOG_ID
            ];
            $ibp = new CIBlockProperty;
            $ibp->Add($arFieldsForNewProp);
            $ibp->Add($arFieldsForNewPropMd5);
        }

        if (file_put_contents($filePath, file_get_contents($url, false, $context))) {
            if($fileArray = CFile::MakeFileArray($filePath)){
                if ($prop == '3D_PREVIEW') CIBlockElement::SetPropertyValuesEx($prodID, CATALOG_ID, array('FILE_' . $prop => ['VALUE' => $fileArray]));
                else CIBlockElement::SetPropertyValuesEx($prodID, CATALOG_ID, array('FILE_' . $prop . '_MD5' => $md5Current, 'FILE_' . $prop => ['VALUE' => $fileArray]));
                unlink($filePath);
                $this->additionalFiles++;
            }
        }
    }

    private function CheckMD5AdditionalFile($article, $md5Current, $prop){
        $arSelect = ['ID'];
        $arFilter = ['IBLOCK_ID' => CATALOG_ID, 'ACTIVE' => 'Y', 'PROPERTY_ARTICLE' => $article, '!PROPERTY_FILE_' . $prop . '_MD5' => $md5Current];
        $res = CIBlockElement::GetList([], $arFilter, false, ['nPageSize' => 1], $arSelect);
        $result = false;
        while ($ob = $res->GetNextElement()) {
            $arFields = $ob->GetFields();
            $result = (int)$arFields['ID'];
        }
        return $result;
    }

    private function downloadFileForSection($fileInfo, $context)
    {
        $fileContent = file_get_contents($fileInfo['url'] . '&logo=nologo&size=2000x2000', false, $context);
        if ($fileContent && file_put_contents($_SERVER["DOCUMENT_ROOT"] . SITE_DIR . 'cron/catalog_import/tmp_files/' . $fileInfo['id'] . '.jpg', $fileContent)) {
            if (file_exists($filePath = $_SERVER["DOCUMENT_ROOT"] . SITE_DIR .  'cron/catalog_import/tmp_files/' . $fileInfo['id'] . '.jpg')) {
                return $filePath;
            }
            return false;
        }
        return false;
    }

    private function ProductsToManyGroups(){
        $this->LogNow("\n" . "\n" . date('d-m-Y H:i:s') . "\n" . $this->assetsData['divider'] . "\n" . "\n" . "\n");
        $this->LogNow(date('d-m-Y H:i:s') . " \n" . "Выполняем операцию привязки товаров к нескольким группам." . " \n");
        //получим группы 3го ур-ня из каталога
        $listThirdLevel = [];
        $arFilter = ['IBLOCK_ID' => CATALOG_ID, 'DEPTH_LEVEL' => 3];
        $rsSect = CIBlockSection::GetList([], $arFilter, false, ['ID']);
        while ($arSect = $rsSect->GetNext()) {
            $listThirdLevel[$arSect['ID']] = $arSect['ID'];
        }
        $arAllGroup = $this->GetJson('groups');
        $articlesToID = $this->GetJson('product_ids');
        $articlesToGroups = $this->GetJson('products_to_all_groups');

        foreach ($articlesToGroups as $article=>$grArr){
            if (!stristr($article, '-S') && is_array($grArr)){
                if (isset($articlesToID[$article])){
                    $ID = $articlesToID[$article];
                    $sectionArXML = [];
                    foreach ($grArr as $group) {
                        $groupID = (int)$group;
                        if (isset($arAllGroup[$groupID]) && isset($listThirdLevel[$arAllGroup[$groupID]['id']])){
                            if (!isset($resMainSection[$ID]))
                                $resMainSection[$ID] = $arAllGroup[$groupID]['id'];
                            $sectionArXML[] = $arAllGroup[$groupID]['id'];
                        }
                    }

                    $sectionArDB = [];
                    $db_old_groups = CIBlockElement::GetElementGroups($ID, true, ['ID']);
                    while ($ar_group = $db_old_groups->Fetch()) $sectionArDB[] = $ar_group['ID'];

                    $allSectionArDB[$ID] = $sectionArDB;
                    if (!isset($allSectionArXML[$ID])) $allSectionArXML[$ID] = $sectionArXML;
                    else $allSectionArXML[$ID] = array_merge($allSectionArXML[$ID], $sectionArXML);
                }
            }
        }
        if (isset($allSectionArXML)) {
            foreach ($allSectionArXML as $ID => $sectionArXML) {
                if (isset($allSectionArDB[$ID]) && $sectionArDB = $allSectionArDB[$ID]) {
                    if (!empty(array_diff($sectionArXML, $sectionArDB))) {
                        $resultForUpdate[$ID] = $sectionArXML;
                    }
                }
            }
        }
        if (isset($resultForUpdate) && !empty($resultForUpdate)) {
            foreach ($resultForUpdate as $id => $arSects) {
                //установить основной раздел
                if (!empty($resMainSection) && isset($resMainSection[$id])) {
                    $el = new CIBlockElement;
                    $el->Update($id, ["IBLOCK_SECTION_ID" => $resMainSection[$id]]);
                }

                //установить привязку к разделам
                (new CIBlockElement)->SetElementSection($id, array_reverse($arSects));
                //обновить фасетный индекс
                Manager::updateElementIndex(CATALOG_ID, $id);
            }
        }
    }

    private function UpdateGroups(){
        $this->LogNow("\n" . "\n" . date('d-m-Y H:i:s') . "\n" . $this->assetsData['divider'] . "\n" . "\n" . "\n");
        $this->LogNow(date('d-m-Y H:i:s') . " \n" . "Выполняем операцию деактивации пустых групп товаров." . " \n");
        $turnedOn = 0;
        $turnedOff = 0;
        $arSelectSection = ['ID', 'NAME', 'ACTIVE'];
        $arFilterSection = ['IBLOCK_ID' => CATALOG_ID];
        $bs = new CIBlockSection;
        $resSection = $bs->GetList([], $arFilterSection, true, $arSelectSection);
        while($obSection = $resSection->GetNext()) {
            $activeElements = $bs->GetSectionElementsCount((int)$obSection['ID'], [
                'CNT_ACTIVE' => 'Y'
            ]);
            $activeElementsOld = $bs->GetSectionElementsCount((int)$obSection['ID'], [
                'CNT_ACTIVE' => 'Y',
                'PROPERTY' => ['OBSOLETE' => '-1']
            ]);
            if((int)$activeElementsOld) $activeElements = (int)$activeElements - (int)$activeElementsOld;
            if((int)$activeElements && $obSection['ACTIVE'] == 'N'){
                $bs = new CIBlockSection;
                if($bs->Update((int)$obSection['ID'], ['ACTIVE' => 'Y'])){
                    $this->LogNow("Активирована секция: ".$obSection['NAME'].". \n");
                    $turnedOn ++;
                }
            }elseif(!(int)$activeElements && $obSection['ACTIVE'] == 'Y'){
                $bs = new CIBlockSection;
                if($bs->Update((int)$obSection['ID'], ['ACTIVE' => 'N'])){
                    $this->LogNow("Деактивирована секция: ".$obSection['NAME'].". \n");
                    $turnedOff ++;
                }
            }
        }
        if($turnedOn > 0) $this->LogNow("Активировано секций: ".$turnedOn.". \n");
        if($turnedOff > 0) $this->LogNow("Деактивировано секций: ".$turnedOff.". \n");
    }

    private function RemoveOldProducts(){
        $this->LogNow("\n" . "\n" . date('d-m-Y H:i:s') . "\n" . $this->assetsData['divider'] . "\n" . "\n" . "\n");
        $this->LogNow(date('d-m-Y H:i:s') . " \n" . "Выполняем операцию удаления лишних товаров." . " \n");
        //достанем артикулы из Assets
        $allArticlesInJSONs = $this->GetJson('all_articles_in_xml');
        $articlesInDB = $this->GetJson('product_ids');
        $articlesToRemove = [];
        foreach ($articlesInDB as $article=>$id){
            if(!isset($allArticlesInJSONs[$article])) $articlesToRemove[] = $article;
        }
        if (count($articlesToRemove)) {
            $arSelect = ['ID', 'IBLOCK_ID'];
            $arFilter = ['IBLOCK_ID' => CATALOG_ID, 'PROPERTY_ARTICLE' => $articlesToRemove];
            $res = CIBlockElement::GetList([], $arFilter, false, false, $arSelect);
            $prodIDsToRemove = [];
            while ($ob = $res->GetNextElement()) {
                $arFields = $ob->GetFields();
                $prodIDsToRemove[] = $arFields['ID'];
            }
            if (count($prodIDsToRemove)) {
                foreach ($prodIDsToRemove as $prodID) {
                    if (CIBlockElement::Delete((int)$prodID)) {
                        $this->LogNow("Удалили товар с ID " . $prodID . ". \n");
                    } else {
                        $this->LogNow("Не получилось удалить товар с ID " . $prodID . ". \n");
                    }
                }
            }
        } else {
            $this->LogNow("Нету товаров для удаления." . " \n");
        }
        $this->UpdateArticlesToIDs();
    }

    private function DownloadFilesOneTime(){
        $prodIDsArray = $this->articlesToID;
        $filesArray = $this->GetJson('files_to_download');
        $filesCounter = 0;
        foreach ($filesArray as $article=>$files){
            $prodID = (int)$prodIDsArray[$article];
            if(count($files) && $prodID){
                $filesClean = $files;
                reset($files);
                for ($file = current($files); $file !== false; $file = next($files)){
                    $fileNameCurr = key($files);
                    $auth = base64_encode($this->assetsData['username'].':'.$this->assetsData['password']);
                    $context = stream_context_create(["http" => ["header" => "Authorization: Basic $auth"]]);
                    $fileContent = file_get_contents($file['href'],false,$context);
                    if(file_put_contents($this->assetsData['files_root'].'tmp_files/'.$article.$fileNameCurr.'.'.trim($file['ext']), $fileContent)) $filesCounter ++;
                    unset($fileContent);
                }

                $tempPhotoMain = [];
                $tempPhoto = [];
                $tempImage = [];
                $tempPhotoApplications = [];
                $tempDraw = [];
                $tempPhotoPack = [];
                $tempDataSheet = [];
                foreach ($filesClean as $fileName=>$file){
                    $filePath = $this->assetsData['files_root'].'tmp_files/'.$article.$fileName.'.'.trim($file['ext']);
                    switch (trim($file['type'])){
                        case 'photo-main':
                            $tempPhotoMain[] = $filePath;
                            break;
                        case 'photo':
                            $tempPhoto[] = $filePath;
                            break;
                        case 'image':
                            $tempImage[] = $filePath;
                            break;
                        case 'photo-applications':
                            $tempPhotoApplications[] = $filePath;
                            break;
                        case 'draw':
                            $tempDraw[] = $filePath;
                            break;
                        case 'photo-pack':
                            $tempPhotoPack[] = $filePath;
                            break;
                        case 'datasheet':
                            $tempDataSheet[] = $filePath;
                            break;
                    }
                }
                $mainImage = [];
                $galleryArr = [];
                $filesArr = [];
                if(count($tempPhotoMain) || count($tempPhoto) || count($tempImage) || count($tempPhotoApplications) || count($tempDraw) || count($tempPhotoPack) || count($tempDataSheet)){
                    //если есть заглавная фотка
                    if(count($tempPhotoMain)) $mainImage[] = $tempPhotoMain[0];
                    //проверяем общие фото
                    if(count($tempPhoto)){
                        //если заглавной до сих пор нету - делаем первую заглавной
                        if(!count($mainImage)){
                            $mainImage[] = $tempPhoto[0];
                            unset($tempPhoto[0]);
                        }
                        //если еще остались - кидаем в галерею
                        if(count($tempPhoto)){
                            foreach ($tempPhoto as $tempPhotoEl){
                                $galleryArr[] = $tempPhotoEl;
                            }
                        }
                    }
                    //проверяем мелкие фото
                    if(count($tempImage)){
                        //если заглавной до сих пор нету - делаем первую заглавной
                        if(!count($mainImage)){
                            $mainImage[] = $tempImage[0];
                            unset($tempImage[0]);
                        }
                    }
                    //проверяем фото-applications
                    if(count($tempPhotoApplications)){
                        foreach ($tempPhotoApplications as $tempPhotoApplicationsEl){
                            $galleryArr[] = $tempPhotoApplicationsEl;
                        }
                    }
                    //проверяем фото-схемы
                    if(count($tempDraw)){
                        foreach ($tempDraw as $tempDrawEl){
                            $galleryArr[] = $tempDrawEl;
                        }
                    }
                    //проверяем фото-упаковки
                    if(count($tempPhotoPack)){
                        foreach ($tempPhotoPack as $tempPhotoPackEl){
                            $galleryArr[] = $tempPhotoPackEl;
                        }
                    }
                    //проверяем pdf-ки
                    if(count($tempDataSheet)){
                        foreach ($tempDataSheet as $tempDataSheetEl){
                            $filesArr[] = $tempDataSheetEl;
                        }
                    }
                }
                if(count($mainImage)){
                    $imgPath = $mainImage[0];
                    if($imgArray = CFile::MakeFileArray($imgPath)){
                        $el = new CIBlockElement;
                        $res = $el->Update($prodID, ['IBLOCK_ID' => CATALOG_ID, 'PREVIEW_PICTURE' => $imgArray]);
                        if($res){
                            $filesCounter++;
                            unlink($imgPath);
                        }
                    }
                }
                if(count($galleryArr)){
                    $arLoadProductGallery = [];
                    foreach ($galleryArr as $galleryArrEl){
                        if($imgArray = CFile::MakeFileArray($galleryArrEl)){
                            $arLoadProductGallery[] = [
                                'VALUE' => $imgArray
                            ];
                        }

                    }
                    if(count($arLoadProductGallery)){
                        CIBlockElement::SetPropertyValuesEx($prodID, CATALOG_ID, ['GALLERY' => $arLoadProductGallery]);
                        foreach ($galleryArr as $galleryArrEl){
                            $filesCounter++;
                            unlink($galleryArrEl);
                        }
                    }
                }
                if(count($tempImage)){
                    foreach ($tempImage as $tempImageEl){
                        unlink($tempImageEl);
                    }
                }
                if (count($filesArr)) {
                    $arLoadProductFiles = [];
                    foreach ($filesArr as $filesArrEl) {
                        $arLoadProductFiles[] = [
                            'VALUE' => CFile::MakeFileArray($filesArrEl)
                        ];
                    }
                    CIBlockElement::SetPropertyValuesEx($prodID, CATALOG_ID, ['INSTRUCTION' => $arLoadProductFiles]);
                    foreach ($filesArr as $filesArrEl) {
                        $filesCounter++;
                        unlink($filesArrEl);
                    }
                }
            }
            $dir = $this->assetsData['files_root'].'tmp_files/';
            $files = scandir($dir);
            foreach ($files as $file){
                if($file !== '.' && $file !== '..') unlink($dir.$file);
            }
        }
        if($filesCounter) $this->LogNow("Успешно загруженных файлов: ".$filesCounter.". \n");
        else$this->LogNow("Нет файлов для загрузки."." \n");
        $this->UpdateJson(['files_to_download' => []]);

        //Проверим, есть ли на сайте незагруженные картинки
        $articlesToIDs = $this->articlesToID;
        $rawDataPicturesPreview = [];
        $rawDataPicturesGallery = [];
        $res = CIBlockElement::GetList([], ['IBLOCK_ID' => CATALOG_ID, 'ACTIVE' => 'Y'], false, false, ['ID', 'PROPERTY_ARTICLE', 'PREVIEW_PICTURE']);
        while($ob = $res->GetNextElement()) {
            $arFields = $ob->GetFields();
            if(!isset($rawDataPicturesPreview[$arFields['PROPERTY_ARTICLE_VALUE']])) $rawDataPicturesPreview[$arFields['PROPERTY_ARTICLE_VALUE']] = [];
            $rawDataPicturesPreview[$arFields['PROPERTY_ARTICLE_VALUE']]['PRODUCT_ID'] = $arFields['ID'];
            if(!isset($rawDataPicturesPreview[$arFields['PROPERTY_ARTICLE_VALUE']]['IMAGES']))
                $rawDataPicturesPreview[$arFields['PROPERTY_ARTICLE_VALUE']]['IMAGES'] = [];

            if(isset($arFields['PREVIEW_PICTURE']) && (int)$arFields['PREVIEW_PICTURE'] && !in_array($arFields['PREVIEW_PICTURE'], $rawDataPicturesPreview[$arFields['PROPERTY_ARTICLE_VALUE']]['IMAGES'])){
                $fileArr = CFile::GetFileArray($arFields['PREVIEW_PICTURE']);
                $fileNameOriginal = $fileArr['ORIGINAL_NAME'];
                $fileNameOriginal = explode('.', $fileNameOriginal)[0];
                $fileNameOriginal = explode($arFields['PROPERTY_ARTICLE_VALUE'], $fileNameOriginal)[1];
                if(!in_array($fileNameOriginal, $rawDataPicturesPreview[$arFields['PROPERTY_ARTICLE_VALUE']]['IMAGES']))
                    $rawDataPicturesPreview[$arFields['PROPERTY_ARTICLE_VALUE']]['IMAGES'][] = $fileNameOriginal;
            }

        }
        $res = CIBlockElement::GetList([], ['IBLOCK_ID' => CATALOG_ID, 'ACTIVE' => 'Y'], false, false, ['ID', 'PROPERTY_ARTICLE', 'PROPERTY_GALLERY']);
        while($ob = $res->GetNextElement()) {
            $arFields = $ob->GetFields();
            if(!isset($rawDataPicturesGallery[$arFields['PROPERTY_ARTICLE_VALUE']])) $rawDataPicturesGallery[$arFields['PROPERTY_ARTICLE_VALUE']] = [];
            $rawDataPicturesGallery[$arFields['PROPERTY_ARTICLE_VALUE']]['PRODUCT_ID'] = $arFields['ID'];
            if(!isset($rawDataPicturesGallery[$arFields['PROPERTY_ARTICLE_VALUE']]['IMAGES']))
                $rawDataPicturesGallery[$arFields['PROPERTY_ARTICLE_VALUE']]['IMAGES'] = [];

            if(isset($arFields['PROPERTY_GALLERY_VALUE']) && (int)$arFields['PROPERTY_GALLERY_VALUE'] && !in_array($arFields['PROPERTY_GALLERY_VALUE'], $rawDataPicturesGallery[$arFields['PROPERTY_ARTICLE_VALUE']]['IMAGES'])){
                $fileArr = CFile::GetFileArray($arFields['PROPERTY_GALLERY_VALUE']);
                $fileNameOriginal = $fileArr['ORIGINAL_NAME'];
                $fileNameOriginal = explode('.', $fileNameOriginal)[0];
                $fileNameOriginal = explode($arFields['PROPERTY_ARTICLE_VALUE'], $fileNameOriginal)[1];
                if(!in_array($fileNameOriginal, $rawDataPicturesGallery[$arFields['PROPERTY_ARTICLE_VALUE']]['IMAGES']))
                    $rawDataPicturesGallery[$arFields['PROPERTY_ARTICLE_VALUE']]['IMAGES'][] = $fileNameOriginal;
            }

        }
        $idsExistsPreview = [];
        foreach ($rawDataPicturesPreview as $data){
            if(is_array($data['IMAGES'])){
                foreach ($data['IMAGES'] as $imgID){
                    if(!in_array($imgID, $idsExistsPreview)){
                        $idsExistsPreview[$imgID] = $data['PRODUCT_ID'];
                    }
                }
            }
        }
        $idsExistsGallery = [];
        foreach ($rawDataPicturesGallery as $data){
            if(is_array($data['IMAGES'])){
                foreach ($data['IMAGES'] as $imgID){
                    if(!in_array($imgID, $idsExistsGallery)){
                        $idsExistsGallery[$imgID] = $data['PRODUCT_ID'];
                    }
                }
            }
        }
        $arrayToUpdatePreview = [];
        $arrayToUpdateGallery = [];
        $dir = $_SERVER["DOCUMENT_ROOT"] . SITE_DIR. 'cron/catalog_import/data/JSON_categories/';
        if ($handle = opendir($dir)) {
            while (false !== ($file = readdir($handle))) {
                if ($file != "." && $file != "..") {
                    if (stristr($file, 'group_')) {
                        $prodsArr = $this->GetJson(explode('.', $file)[0], $this->assetsData['files_root'].'data/JSON_categories/');
                        foreach ($prodsArr as $product) {
                            $firstOne = true;
                            if ($product['files'] && count($product['files'])) {
                                foreach ($product['files'] as $file) {
                                    $type = $file['type'];
                                    $article = $product['article'];
                                    $pictureID = $file['id'];
                                    if ($type == 'photo-main') {
                                        if(!isset($idsExistsPreview[$pictureID])){
                                            if(isset($articlesToIDs[$article]) && $firstOne){
                                                $currProductID = $articlesToIDs[$article];
                                                if(!isset($arrayToUpdatePreview[$currProductID]))
                                                    $arrayToUpdatePreview[$currProductID] = [];
                                                $arrayToUpdatePreview[$currProductID][] = $file['url'];
                                            }
                                        }
                                        $firstOne = false;
                                    }
                                    if ($type == 'photo' || $type == 'photo-applications' || $type == 'draw' || $type == 'photo-pack') {
                                        if(!isset($idsExistsGallery[$pictureID])){
                                            if(isset($articlesToIDs[$article])){
                                                $currProductID = $articlesToIDs[$article];
                                                if(!isset($arrayToUpdateGallery[$currProductID])) $arrayToUpdateGallery[$currProductID] = [];
                                                $arrayToUpdateGallery[$currProductID][] = $file['url'];
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        if(count($arrayToUpdatePreview) || count($arrayToUpdateGallery)) $this->LogNow("Не хватает картинок у некоторых товаров. \n");
    }

    private function LinkElements(){
        $this->LogNow("\n" . "\n" . date('d-m-Y H:i:s') . "\n" . $this->assetsData['divider'] . "\n" . "\n" . "\n");
        $this->LogNow(date('d-m-Y H:i:s') . " \n" . "Выполняем операцию привязки аналогов и сопутствующих товаров." . " \n");
        $this->analoguesUpdate = 0;
        $this->relatedUpdate = 0;
        $this->accessoriesUpdate = 0;
        $prodIDsArray = $this->articlesToID;
        $analoguesArray = $this->GetJson('analogues');
        if (count($analoguesArray)) {
            foreach ($analoguesArray as $article => $analogues) {
                if (isset($prodIDsArray[$article]) && (int)$prodIDsArray[$article]) {
                    $prodID = (int)$prodIDsArray[$article];
                    $prodAnaloguesToLink = [];
                    foreach ($analogues as $analogue) {
                        if (isset($prodIDsArray[$analogue]) && (int)$prodIDsArray[$analogue]) {
                            $prodAnaloguesToLink[] = (int)$prodIDsArray[$analogue];
                        }
                    }
                    if (count($prodAnaloguesToLink)) {
                        CIBlockElement::SetPropertyValuesEx($prodID, CATALOG_ID, ['ANALOGUES_PRODUCTS' => $prodAnaloguesToLink]);
                        $this->analoguesUpdate++;
                    }
                }
            }
            $this->UpdateJson(['analogues' => []]);
        }
        $relatedArray = $this->GetJson('related');
        if (count($relatedArray)) {
            foreach ($relatedArray as $article => $related) {
                if (isset($prodIDsArray[$article]) && (int)$prodIDsArray[$article]) {
                    $prodID = (int)$prodIDsArray[$article];
                    $prodRelatedToLink = [];
                    foreach ($related as $relatedEl) {
                        if (isset($prodIDsArray[$relatedEl]) && (int)$prodIDsArray[$relatedEl]) {
                            $prodRelatedToLink[] = (int)$prodIDsArray[$relatedEl];
                        }
                    }
                    if (count($prodRelatedToLink)) {
                        CIBlockElement::SetPropertyValuesEx($prodID, CATALOG_ID, ['RELATED_PRODUCTS' => $prodRelatedToLink]);
                        $this->relatedUpdate++;
                    }
                }
            }
            $this->UpdateJson(['related' => []]);
        }
        $accessoriesArray = $this->GetJson('accessories');
        if (count($accessoriesArray)) {
            foreach ($accessoriesArray as $article => $accessories) {
                if (isset($prodIDsArray[$article]) && (int)$prodIDsArray[$article]) {
                    $prodID = (int)$prodIDsArray[$article];
                    $prodAccessoriesToLink = [];
                    foreach ($accessories as $accessoriesEl) {
                        if (isset($prodIDsArray[$accessoriesEl]) && (int)$prodIDsArray[$accessoriesEl]) {
                            $prodAccessoriesToLink[] = (int)$prodIDsArray[$accessoriesEl];
                        }
                    }
                    if (count($prodAccessoriesToLink)) {
                        CIBlockElement::SetPropertyValuesEx($prodID, CATALOG_ID, ['ACCESSORIES' => $prodAccessoriesToLink]);
                        $this->accessoriesUpdate++;
                    }
                }
            }
            $this->UpdateJson(['accessories' => []]);
        }
        $this->LogNow("Обновлено аналогов: " . $this->analoguesUpdate . ". \n");
        $this->LogNow("Обновлено сопутствующих: " . $this->relatedUpdate . ". \n");
        $this->LogNow("Обновлено аксессуаров: " . $this->accessoriesUpdate . ". \n");
    }

    private function UpdateProducts(){
        $this->LogNow(date('d-m-Y H:i:s') . " \n" . "Выполняем операцию обновления товаров." . " \n");
        $this->productAdd = 0;
        $this->productUpdate = 0;
        $this->productErrors = 0;
        $this->updatePropsData = $this->GetJson('props_data');
        $this->updateGroupsArray = $this->GetJson('groups');
        $files = array_keys($this->assetsData['xml_codes']);
        $this->UpdateArticlesToIDs();
        $brands = $this->GetJson('brands', $this->assetsData['files_root'].'data/JSON_categories/');
        if($brands && isset($brands['data']) && isset($brands['data']['brands'])){
            foreach ($brands['data']['brands'] as $brand){
                $this->developersArr[(string)$brand['id']] = $brand['description'];
            }
        }
        $units = $this->GetJson('units', $this->assetsData['files_root'].'data/JSON_categories/');
        if($units && isset($units['data']) && isset($units['data']['units'])){
            foreach ($units['data']['units'] as $unit){
                $this->unitsArr[(string)$unit['id']] = $unit['descript'];
            }
        }

        //перебираем xml
        foreach ($files as $file){
            $this->LogNow("Разбираем товары в группе '" . $file . "'." . "\n");
            $products1 = $this->GetJson('group_'.$file, $this->assetsData['files_root'].'data/JSON_categories/');
            $products2 = $this->GetJson('group_'.$file, $this->assetsData['files_root'].'data/JSON_categories_sandbox/');
            if(!$products2) $products2 = [];
            $this->prodsToCompareArrNewRaw = [];
            $prodsToCompareArrOld = [];
            $prodsFilesOldHash = [];
            $this->updateProdsFiles = [];
            foreach ($products2 as $product) {
                $prodsToCompareArrOld[$product['article']] = md5(json_encode($product, JSON_UNESCAPED_UNICODE));
                $prodsFilesOldHash[$product['article']] = md5(json_encode($product['files'], JSON_UNESCAPED_UNICODE));
            }
            foreach ($products1 as $product) {
                if(isset($product['components'])) $this->productsWithComponents[$product['article']] = true;

                if(isset($product['statuses']) && isset($product['statuses']['status']) && isset($product['statuses']['status']['production']) && $product['statuses']['status']['production'] == 1) $this->saleNowArticles[$product['article']] = 1;
                if(isset($product['statuses']) && isset($product['statuses']['status']) && isset($product['statuses']['status']['advertising']) && $product['statuses']['status']['advertising'] == 1) $this->newNowArticles[$product['article']] = 1;

                if(!isset($prodsToCompareArrOld[$product['article']]) || $prodsToCompareArrOld[$product['article']] !== md5(json_encode($product, JSON_UNESCAPED_UNICODE))){
                    $this->prodsToCompareArrNewRaw[$product['article']] = $product;
                    if(!isset($prodsFilesOldHash[$product['article']]) || $prodsFilesOldHash[$product['article']] !== md5(json_encode($product['files'], JSON_UNESCAPED_UNICODE))){
                        $this->updateProdsFiles[$product['article']] = true;
                    }
                }
            }
            if (count($this->prodsToCompareArrNewRaw)) {
                foreach ($this->prodsToCompareArrNewRaw as $article => $prod) {
                    if (isset($this->articlesToID[$article])) {
                        if(isset($prodsToCompareArrOld[$article])) $this->LogNow("Товар с артикулом '".$article."' необходимо обновить."."\n");
                        else $this->LogNow("Товар с артикулом '".$article."' необходимо обновить. Он переместился в другую категорию"."\n");
                        $this->AddOrUpdateSingleProduct($article, true);
                    } else {
                        $this->LogNow("Товар с артикулом '" . $article . "' необходимо добавить." . "\n");
                        $this->AddOrUpdateSingleProduct($article, false);
                    }
                }
            }
            $this->UpdateJson([
                'related' => $this->arrRelated,
                'accessories' => $this->arrAccessories,
                'analogues' => $this->arrAnalogues,
                'files_to_download' => $this->arrayFilesDownload,
                'files_md5' => $this->arrayFilesMD5,
                'product_ids' => $this->articlesToID,
                'products_to_all_groups' => $this->prodsToAllGroups
            ]);
            $this->UpdateJson([
                't_58' => $this->colorsPropT58,
                'productsWithComponents' => $this->productsWithComponents,
                'sale_now_articles' => $this->saleNowArticles,
                'new_now_articles' => $this->newNowArticles
            ], $_SERVER['DOCUMENT_ROOT']. SITE_DIR.'assets/json/');
        }
        $this->LogNow("Добавлено товаров: " . $this->productAdd . ". \n" . "Обновлено товаров: " . $this->productUpdate . " \n");
        if ($this->productErrors > 0) $this->LogNow("Ошибок: " . $this->productErrors . ". \n");
    }

    private function AddOrUpdateSingleProduct($article, $update){
        $updateFiles = isset($this->updateProdsFiles[$article]);
        $prodsToCompareArrNewRaw = $this->prodsToCompareArrNewRaw;
        $prod = $prodsToCompareArrNewRaw[$article];
        if(!isset($this->prodsToAllGroups[$article])) $this->prodsToAllGroups[$article] = [];
        if(isset($prod['groups'])){
            foreach ($prod['groups'] as $gr){
                if(!in_array((string)$gr['id'], $this->prodsToAllGroups[$article])) $this->prodsToAllGroups[$article][] = (string)$gr['id'];
            }
        }
        //устанавливаем цену и валюту
        $this->productProps['CURRENCY'] = $prod['prices_currency'];
        $this->productProps['PROMOTIONAL_PRICE'] = false;
        $this->productProps['PROMOTIONAL'] = false;
        $this->productProps['PRICE'] = false;
        $this->productProps['PRICE_FILTER'] = false;
        $this->productProps['OLD_PRICE'] = false;
        foreach ($prod['prices'] as $priceType=>$price) {
            $price = (float)$price;
            if($this->extraPrice && (float)$this->extraPrice) $price = $price * (float)$this->extraPrice;
            $price = number_format($price, 2, '.', '');
            if ($priceType == 'retail') {
                $this->productProps['PRICE'] = (float)$price;
                $this->productProps['PRICE_FILTER'] = (float)$price;
                $this->productProps['OLD_PRICE'] = (float)$price;
            }elseif ($priceType == 'action' && !BELARUS && !KAZAKHSTAN) {
                $this->productProps['PROMOTIONAL_PRICE'] = (float)$price;
                $this->productProps['PROMOTIONAL'] = '99';
                $this->productProps['PRICE'] = (float)$price;
                $this->productProps['PRICE_FILTER'] = (float)$price;
            }
        }
        //устанавливаем артикул
        $this->productProps['ARTICLE'] = $prod['article'];
        //устанавливаем производителя
        $this->productProps['DEVELOPER'] = $prod['brand'] && isset($this->developersArr[(string)$prod['brand']]) ? $this->developersArr[(string)$prod['brand']] : false;
        //устанавливаем Признак устаревшего товара
        $this->productProps['OBSOLETE'] = (string)$prod['obsolete'];
        //устанавливаем Вид упаковки
        $this->productProps['PACK'] = $prod['package']['name'];
        //устанавливаем Норма упаковки
        $this->productProps['PACKNORM'] = $prod['package']['qty'];
        //устанавливаем Вес упаковки
        $this->productProps['WEIGHT'] = (float)$prod['package']['weight'];
        //устанавливаем Вид упаковки
        $this->productProps['PACKAGE_NAME'] = (string)$prod['package']['name'];
        //устанавливаем Норма упаковки
        $this->productProps['PACKAGE_QTY'] = (string)(float)$prod['package']['qty'];
        //устанавливаем Длина упаковки
        $this->productProps['PACKAGE_LENGTH'] = (string)(float)$prod['package']['length'];
        //устанавливаем Ширина упаковки
        $this->productProps['PACKAGE_WIDTH'] = (string)(float)$prod['package']['width'];
        //устанавливаем Высота упаковки
        $this->productProps['PACKAGE_HEIGHT'] = (string)(float)$prod['package']['height'];
        //устанавливаем Вес упаковки
        $this->productProps['PACKAGE_WEIGHT'] = (string)(float)$prod['package']['weight'];
        //устанавливаем Объём упаковки
        $this->productProps['PACKAGE_VOLUME'] = (string)(float)$prod['package']['volume'];
        //устанавливаем Единица измерения
        $this->productProps['UNIT'] = $this->unitsArr[(string)$prod['unit']];
        //устанавливаем Тип
        $this->productProps['TYPE'] = 'product';
        //устанавливаем Описание и Применение
        if(isset($prod['texts'])){
            if(isset($prod['texts']['descript'])) $this->productProps['DESCRIPTION'] = (string)$prod['texts']['descript'];
            if(isset($prod['texts']['application'])) $this->productProps['APPLICATION'] = [
                'VALUE' => [
                    'TYPE'=>'HTML',
                    'TEXT'=>$prod['texts']['application']
                ]
            ];
        }
        //устанавливаем Наличие на складе и Наличие на складе(число)
        $waitingValue = 0;
        $stockValue = 0;
        $stockQnt = (isset($prod['instock']) && isset($prod['instock']['stock']) && (float)$prod['instock']['stock']) ? (float)$prod['instock']['stock'] : false;
        if(isset($prod['instock']) && isset($prod['instock']['status']) && $prod['instock']['type'] === 'free') $stockValue = $prod['instock']['status'];
        if(isset($prod['arrival']) && isset($prod['arrival']['status'])) $waitingValue = $prod['arrival']['status'];
        $stockSummary = '';
        $stockSummaryNumber = 2;
        if ($stockValue < 0) {
            $stockSummary = "в наличии";
            $stockSummaryNumber = 0;
        } else if ($stockValue > 0) {
            $stockSummary = "в наличии";
            $stockSummaryNumber = 0;
        } else if ($stockValue == 0) {
            if ($waitingValue < 0) {
                $stockSummary = "ожидается";
                $stockSummaryNumber = 1;
            } else if ($waitingValue == 0) {
                $stockSummary = "под заказ";
            }
        }
        $this->productProps['STOCK_SUMMARY'] = ($stockSummary == '') ? false : $stockSummary;
        $this->productProps['STOCK_SUMMARY_NUMBER'] = (!$stockSummaryNumber) ? false : $stockSummaryNumber;
        //устанавливаем Количество на складе
        $this->productProps['STOCK_QNT'] = $stockQnt;
        //устанавливаем Дата прибытия
        $this->productProps['ARRIVAL_DATE'] = (isset($prod['arrival']) && isset($prod['arrival']['date'])) ? explode('T', $prod['arrival']['date'])[0] : false;
        //устанавливаем Длина транспортной тары
        $this->productProps['CONTAINER_LENGTH'] = (isset($prod['container']) && isset($prod['container']['length'])) ? $prod['container']['length'] : false;
        //устанавливаем Ширина транспортной тары
        $this->productProps['CONTAINER_WIDTH'] = (isset($prod['container']) && isset($prod['container']['width'])) ? $prod['container']['width'] : false;
        //устанавливаем Высота транспортной тары
        $this->productProps['CONTAINER_HEIGHT'] = (isset($prod['container']) && isset($prod['container']['height'])) ? $prod['container']['height'] : false;
        //устанавливаем Вес транспортной тары
        $this->productProps['CONTAINER_WEIGHT'] = (isset($prod['container']) && isset($prod['container']['weight'])) ? $prod['weight']['height'] : false;
        //устанавливаем Объём транспортной тары
        $this->productProps['CONTAINER_VOLUME'] = (isset($prod['container']) && isset($prod['container']['volume'])) ? $prod['weight']['volume'] : false;
        //устанавливаем Количество в транспортной таре
        $this->productProps['CONTAINER_QTY'] = (isset($prod['container']) && isset($prod['container']['qty'])) ? $prod['weight']['qty'] : false;
        //устанавливаем Штрихкод
        $this->productProps['CML2_BAR_CODE'] = false;
        //устанавливаем EAN13
        $this->productProps['EAN13'] = (isset($prod['ean13'])) ? $prod['ean13'] : false;
        //устанавливаем Ряды, для лент, для фильтрации
        $this->productProps['MY_1'] = (stripos($prod['name'], '2x2') !== false) ? 'многорядная' : 'однорядная';
        //устанавливаем Название
        $this->product['NAME'] = preg_replace('/^Лента /i', 'Светодиодная лента ', $prod['name']);
        //устанавливаем раздел
        $this->product['IBLOCK_SECTION_ID'] = $this->updateGroupsArray[$prod['groups'][0]['id']]['id'];
        $this->productProps['WARRANTY'] = (isset($prod['warranty']) && (float)$prod['warranty']) ? $prod['warranty'] : false;

        //устанавливаем технические параметры
        foreach ($prod['techdata'] as $param){
            $propID = (string)$param['id'];
            $propNameString = 'T_' . $propID;
            $propNameNumber = 'N_' . $propID;
            $multiplyString = $this->updatePropsData[$propNameString]['multiply'];
            $multiplyNumber = $this->updatePropsData[$propNameNumber]['multiply'];
            $stringValue = ($multiplyString) ? [] : '';
            $stringValueChanged = false;
            $numberValue = ($multiplyNumber) ? [] : '';
            $numberValueChanged = false;
            foreach ($param['values'] as $valData) {
                $string = $valData['value'];
                $number = (isset($valData['number']) && (float)$valData['number']) ? (float)$valData['number'] : false;
                if(!$number && isset($valData['text']) && (float)$valData['text']) $number = (float)$valData['text'];
                if ($string !== '') {
                    if ($multiplyString) $stringValue[] = $string;
                    else $stringValue = $string;
                    $stringValueChanged = true;
                }
                if ($number) {
                    if ($multiplyNumber) $numberValue[] = $number;
                    else $numberValue = $number;
                    $numberValueChanged = true;
                }elseif($numberValue === [] && (isset($valData['min']) || isset($valData['typ']) || isset($valData['max']))){
                    if(isset($valData['min']) && (float)$valData['min']) $numberValue[] = (float)$valData['min'];
                    if(isset($valData['typ']) && (float)$valData['typ']) $numberValue[] = (float)$valData['typ'];
                    if(isset($valData['max']) && (float)$valData['max']) $numberValue[] = (float)$valData['max'];
                    $numberValueChanged = true;
                }
            }
            if ($stringValueChanged)
                $this->productProps[$propNameString] = $stringValue;
            if ($numberValueChanged)
                $this->productProps[$propNameNumber] = $numberValue;
        }

        //устанавливаем синтетические параметры
        if (isset($this->productProps['T_4']) && $this->productProps['T_4']) $this->productProps['MY_5'] = 'токовые';
        if ($this->productProps['WARRANTY'] && (float)$this->productProps['WARRANTY']) {
            $this->productProps['T_89'] = [(string)((float)$this->productProps['WARRANTY']/12)];
            $this->productProps['N_89'] = [(float)$this->productProps['WARRANTY']/12];
        }
        foreach ($prod['techdata'] as $param){
            $propID = (string)$param['id'];

            if ($propID == 153) {
                $hexArr = [];
                $titleArr = [];
                foreach ($param['values'] as $valData){
                    $hexArr[] = $valData['color'];
                    $titleArr[] = $valData['value'];
                }
                $this->productProps['COLOR_HREF'] = count($hexArr) ? [implode(';', $hexArr)] : false;
                $this->productProps['COLOR_TITLE'] = count($titleArr) ? implode(' / ', $titleArr) : false;
                $this->productProps['COLOR_HEX_MULTIPLE'] = count($hexArr) ? $hexArr : false;
            }

            if ($propID == 58){
                $hexArr = [];
                $titleArr = [];
                foreach ($param['values'] as $valData){
                    $hexArr[] = $valData['color'];
                    $titleArr[] = $valData['value'];
                }
                $hex58 = implode(';', $hexArr);
                $title58 = implode(' / ', $titleArr);
                if($hex58 && $title58){
                    $this->colorsPropT58[$title58] = [
                        'name' => $title58,
                        'color' => $hex58
                    ];
                }
            }

            if ($propID == 20) $this->productProps['MY_5'] = $param['values'][0]['value'];

            if ($propID == 47) $this->productProps['MY_6'] = (float)$param['values'][0]['number'];

            if ($propID == 35 && count($this->productProps['N_35'])) {
                //устанавливаем Мощность на комплект
                $my3_35 = [];
                //устанавливаем Мощность на единицу
                $my4_35 = [];
                foreach ($this->productProps['N_35'] as $n35) {
                    $my3_35[] = $n35;
                    if ((float)$this->productProps['MY_6']) {
                        if ($this->productProps['T_62'] == 'Декоративная нить') $my4_35[] = $n35 / ((float)$this->productProps['MY_6'] / 1000);
                        else $my4_35[] = $n35;
                    }
                }
                if (count($my3_35)) $this->productProps['MY_3_35'] = $my3_35;
                if (count($my4_35)) $this->productProps['MY_4_35'] = $my4_35;
            }

            if ($propID == 75 && count($this->productProps['N_75'])) {
                //устанавливаем Мощность на комплект
                $my3 = [];
                //устанавливаем Мощность на единицу
                $my4 = [];
                foreach ($this->productProps['N_75'] as $n75) {
                    $my3[] = $n75;
                    if ((float)$this->productProps['MY_6']) $my4[] = $n75 / ((float)$this->productProps['MY_6'] / 1000);
                }
                if (count($my3)) $this->productProps['MY_3'] = $my3;
                if (count($my4)) $this->productProps['MY_4'] = $my4;
            }

            if ($propID == 48) $this->productProps['MY_7'] = (float)$param['values'][0]['number'];

            if ($propID == 49) $this->productProps['MY_8'] = (float)$param['values'][0]['number'];

            if ($propID == 62) {
                $istNAr = ['Источник напряжения', 'Диммируемый источник напряжения', 'Источник напряжения, 2 канала', 'Источник питания DC/DC'];
                $istTAr = ['Источник тока', 'Диммируемый источник тока'];
                //устанавливаем Источник напряжения/тока
                if (in_array($param['values'][0]['value'], $istNAr)) {
                    $this->productProps['MY_11'] = 'источник напряжения';
                    $this->productProps['MY_12'] = $param['values'][0]['value'];
                } elseif (in_array($param['values'][0]['value'], $istTAr)) {
                    $this->productProps['MY_11'] = 'источник тока';
                    $this->productProps['MY_12_2'] = $param['values'][0]['value'];
                }
            }

            if ($propID == 43) {
                //устанавливаем Выходной ток для источников напряжения(раздел источники питания)
                $my13 = [];
                //устанавливаем Выходной ток для источников тока(раздел источники питания) в миллиамперах
                $my14 = [];
                foreach ($param['values'] as $paramValue) {
                    if (isset($paramValue['min']) && (float)$paramValue['min']) {
                        if ($this->productProps['MY_11'] == 'источник напряжения') {
                            $my13[] = (float)$paramValue['min'];
                        } else if ($this->productProps['MY_11'] == 'источник тока') {
                            $my14[] = (float)$paramValue['min'] * 1000;
                        }
                    }
                    if (isset($paramValue['typ']) && (float)$paramValue['typ']) {
                        if ($this->productProps['MY_11'] == 'источник напряжения') {
                            $my13[] = (float)$paramValue['typ'];
                        } else if ($this->productProps['MY_11'] == 'источник тока') {
                            $my14[] = (float)$paramValue['typ'] * 1000;
                        }
                    }
                    if (isset($paramValue['max']) && (float)$paramValue['max']) {
                        if ($this->productProps['MY_11'] == 'источник напряжения') {
                            $my13[] = (float)$paramValue['max'];
                        } else if ($this->productProps['MY_11'] == 'источник тока') {
                            $my14[] = (float)$paramValue['max'] * 1000;
                        }
                    }
                }
                if (count($my13)) $this->productProps['MY_13'] = $my13;
                if (count($my14)) $this->productProps['MY_14'] = $my14;
            }

            if ($propID == 13) {
                //устанавливаем Выходная мощность для источников напряжения(раздел источники питания)
                $my15 = [];
                //устанавливаем Выходная мощность для источников тока(раздел источники питания)
                $my16 = [];
                foreach ($param['values'] as $paramValue) {
                    if (isset($paramValue['min']) && (float)$paramValue['min']) {
                        if ($this->productProps['MY_11'] == 'источник напряжения') {
                            $my15[] = (float)$paramValue['min'];
                        } else if ($this->productProps['MY_11'] == 'источник тока') {
                            $my16[] = (float)$paramValue['min'];
                        }
                    }
                    if (isset($paramValue['typ']) && (float)$paramValue['typ']) {
                        if ($this->productProps['MY_11'] == 'источник напряжения') {
                            $my15[] = (float)$paramValue['typ'];
                        } else if ($this->productProps['MY_11'] == 'источник тока') {
                            $my16[] = (float)$paramValue['typ'];
                        }
                    }
                    if (isset($paramValue['max']) && (float)$paramValue['max']) {
                        if ($this->productProps['MY_11'] == 'источник напряжения') {
                            $my15[] = (float)$paramValue['max'];
                        } else if ($this->productProps['MY_11'] == 'источник тока') {
                            $my16[] = (float)$paramValue['max'];
                        }
                    }
                }
                if (count($my15)) $this->productProps['MY_15'] = $my15;
                if (count($my16)) $this->productProps['MY_16'] = $my16;
            }

            if ($propID == 38) {
                //устанавливаем Выходное напряжение для источников напряжения(раздел источники питания)
                $my17 = [];
                //устанавливаем Выходное напряжение для источников тока(раздел источники питания)
                $my18 = [];
                foreach ($param['values'] as $paramValue) {
                    if (isset($paramValue['min']) && (float)$paramValue['min']) {
                        if ($this->productProps['MY_11'] == 'источник напряжения') {
                            $my17[] = (float)$paramValue['min'];
                        } else if ($this->productProps['MY_11'] == 'источник тока') {
                            $my18[] = (float)$paramValue['min'];
                        }
                    }
                    if (isset($paramValue['typ']) && (float)$paramValue['typ']) {
                        if ($this->productProps['MY_11'] == 'источник напряжения') {
                            $my17[] = (float)$paramValue['typ'];
                        } else if ($this->productProps['MY_11'] == 'источник тока') {
                            $my18[] = (float)$paramValue['typ'];
                        }
                    }
                    if (isset($paramValue['max']) && (float)$paramValue['max']) {
                        if ($this->productProps['MY_11'] == 'источник напряжения') {
                            $my17[] = (float)$paramValue['max'];
                        } else if ($this->productProps['MY_11'] == 'источник тока') {
                            $my18[] = (float)$paramValue['max'];
                        }
                    }
                }
                if (count($my17)) $this->productProps['MY_17'] = $my17;
                if (count($my18)) $this->productProps['MY_18'] = $my18;
            }

            if ($propID == 5 && (float)$param['values'][0]['number']) $this->productProps['MY_19'] = [(float)$param['values'][0]['number']];

            if ($propID == 8 && $this->productProps['N_8']) {
                //устанавливаем Световой поток, числовые значения из T_8
                $this->productProps['MY_20'] = [];
                //устанавливаем Световой поток, числовые значения из T_8 - на метр
                $this->productProps['MY_20_1'] = [];
                foreach ($this->productProps['N_8'] as $n8) {
                    $this->productProps['MY_20'][] = $n8;
                    if ($this->productProps['MY_6']) {
                        $this->productProps['MY_20_1'][] = $n8 / ($this->productProps['MY_6'] / 1000);
                    }
                }
            }

            if ($propID == 40) $this->productProps['MY_21'] = (float)$param['values'][0]['number'];

            if ($propID == 38) {
                //устанавливаем Выходное напряжение
                foreach ($param['values'] as $paramValue) {
                    if ((string)$paramValue['min'] != '' || (string)$paramValue['max'] != '') {
                        $this->productProps['MY_38_2'][] = ['VALUE' => $paramValue['value'], 'DESCRIPTION' => ''];
                        $this->productProps['MY_N_38_2'] = $this->productProps['N_38'];
                    } else {
                        $this->productProps['MY_38_1'][] = ['VALUE' => $paramValue['value'], 'DESCRIPTION' => ''];
                        $this->productProps['MY_N_38_1'] = $this->productProps['N_38'];
                    }
                }
            }

            if ($propID == 95) {
                $this->productProps['N_95'] = [];
                foreach ($param['values'] as $paramValue) {
                    if(isset($paramValue['min']) && (float)$paramValue['min']) $this->productProps['N_95'][] = (float)$paramValue['min'];
                    if(isset($paramValue['typ']) && (float)$paramValue['typ']) $this->productProps['N_95'][] = (float)$paramValue['typ'];
                    if(isset($paramValue['max']) && (float)$paramValue['max']) $this->productProps['N_95'][] = (float)$paramValue['max'];
                }
            }
        }

        if ($this->productProps['MY_6']) {
            //устанавливаем Длина, для светильников
            $this->productProps['MY_22'] = $this->productProps['MY_6'];
            //устанавливаем Ширина, для светильников
            $this->productProps['MY_23'] = $this->productProps['MY_7'];
            if ((empty($this->productProps['MY_22']) || empty($this->productProps['MY_23'])) && !empty($this->productProps['MY_21'])) {
                $this->productProps['MY_22'] = $this->productProps['MY_21'];
                $this->productProps['MY_23'] = $this->productProps['MY_21'];
            }
        }

        if (isset($this->productProps['N_54']) && isset($this->productProps['N_55'])) {
            //устанавливаем Установочное отверстие
            $this->productProps['MY_25'] = (!empty($this->productProps['N_50'])) ? $this->productProps['N_50']  : array_merge($this->productProps['N_54'], $this->productProps['N_55']);
        }

        if (isset($this->productProps['N_68']) && count($this->productProps['N_68'])) {
            if ($this->productProps['N_68'][0] == 1) {
                $this->productProps['MY_27'] = '1 зона';
            } elseif ($this->productProps['N_68'][0] > 1) {
                $this->productProps['MY_27'] = 'Мультизонный';
            }
        }

        if (isset($this->productProps['N_20']) && count($this->productProps['N_20'])) {
            //устанавливаем Напряжение питания
            $this->productProps['MY_28'] = (in_array('220', $this->productProps['N_20'])) ? '220 В' : '<= 36 В';
        }

        if(!isset($this->productProps['MY_28'])) $this->productProps['MY_28'] = 'Батарея (аккумулятор)';

        if (isset($this->productProps['N_45'])) {
            //устанавливаем Размер светодиодов
            $this->productProps['MY_45_1'] = $this->productProps['N_45'];
            if (isset($this->productProps['T_67'])) {
                foreach ($this->productProps['T_67'] as $vV) {
                    if (mb_stripos($vV, 'spi') !== false) {
                        $this->productProps['MY_45_1'] = "smd 5060 SPI";
                    } elseif (mb_stripos($vV, 'dmx') !== false) {
                        $this->productProps['MY_45_1'] = "smd 5060 DMX";
                    }
                }
            }
        }

        if (isset($this->productProps['T_62'])) {
            //устанавливаем Тип товара
            if (in_array('Чип-светодиод', $this->productProps['T_62']) || in_array('Мощный светодиод', $this->productProps['T_62'])) $this->productProps['MY_62_1'] = 'Мощный светодиод';
            if (in_array('Выводной светодиод', $this->productProps['T_62'])) $this->productProps['MY_62_1'] = 'Выводной светодиод';
        }

        if (isset($this->productProps['T_4']) || isset($this->productProps['T_20'])) {
            //устанавливаем Ток, напряжение
            if (isset($this->productProps['T_4']) && count($this->productProps['T_4'])) $this->productProps['MY_4_20'] = 'постоянный ток';
            if (isset($this->productProps['T_20']) && count($this->productProps['T_20'])) $this->productProps['MY_4_20'] = 'постоянное напряжение';
        }

        if(isset($this->productProps['N_95']) && is_array($this->productProps['N_95']) && count($this->productProps['N_95']) && (float)max($this->productProps['N_95']) && isset($this->productProps['N_47']) && (float)$this->productProps['N_47'] ){
            $this->productProps['N_35'] = (float)max($this->productProps['N_95']) * ((float)$this->productProps['N_47'] / 1000);
        }

        if(isset($prod['related']) && count($prod['related'])) $this->arrRelated[$article] = $prod['related'];
        if(isset($prod['compatibles']) && count($prod['compatibles'])) $this->arrAccessories[$article] = $prod['compatibles'];
        if(isset($prod['analogues']) && count($prod['analogues'])) $this->arrAnalogues[$article] = $prod['analogues'];

        if($updateFiles || !$update){
            //записываем в json список файлов для закачки, чтобы потом пройти по нему
            if(isset($prod['files']) && is_array($prod['files']) && count($prod['files'])){
                foreach ($prod['files'] as $file){
                    $type = $file['type'];
                    if($type == 'photo-main' || $type == 'photo' || $type == 'image' || $type == 'photo-applications' || $type == 'draw' || $type == 'photo-pack' || $type == 'datasheet'){
                        $filesArray = [
                            'md5' => $file['md5'],
                            'href' => $file['url'],
                            'type' => $type,
                            'ext' => array_reverse(explode('.', $file['name']))[0],
                            'id' => $file['id'],
                            'modified' => $file['modified']
                        ];
                        $this->arrayFilesMD5[$file['id']] = $file['md5'];
                        if (!isset($this->arrayFilesDownload[$article])) $this->arrayFilesDownload[$article] = [];
                        if (count($filesArray)) $this->arrayFilesDownload[$article][$file['id']] = $filesArray;
                    }
                }
            }
        }

        //проверяем, есть ли данные для товара, и, если да - записываем/обновляем
        if (count($this->product) && count($this->productProps)) {
            $el = new CIBlockElement;
            $this->product['IBLOCK_ID'] = CATALOG_ID;
            if (isset($this->product['NAME'])) {
                $arParams = array("replace_space" => "-", "replace_other" => "-");
                $this->product['CODE'] = Cutil::translit(trim(html_entity_decode($this->product['NAME'] . '-' . $article)), "ru", $arParams);
            }
            $this->product['ACTIVE'] = 'Y';
            $this->product['PROPERTY_VALUES'] = $this->productProps;

            $willUpdate = false;
            $oldID = 0;
            if ($update) {
                $ArrayProductIDs = $this->articlesToID;
                if (isset($ArrayProductIDs[$article]) && (int)$ArrayProductIDs[$article]) {
                    $oldID = $ArrayProductIDs[$article];
                    $willUpdate = true;
                }
            }
            if($willUpdate){
                //обновляем элемент
                if($el->Update((int)$oldID, $this->product)) {
                    $this->productUpdate ++;
                    $this->LogNow("Успешно обновлен товар с ID '".$oldID."'."."\n");
                } else {
                    $this->LogNow("Ошибка обновления товара с ID '".$oldID."' '".$el->LAST_ERROR."'."."\n");
                    $this->productErrors ++;
                }
            }else{
                //сохраняем элемент
                $arParams = array("replace_space" => "-", "replace_other" => "-");
                $this->product['CODE'] = Cutil::translit(trim(html_entity_decode($article)), "ru", $arParams);
                if ($productID = $el->Add($this->product)) {
                    $this->productAdd++;
                    $this->LogNow("Успешно добавлен товар с ID '" . $productID . "'." . "\n");
                    if(!isset($this->articlesToID[$article])) $this->articlesToID[$article] = $productID;
                } else {
                    $this->LogNow("Ошибка добавления товара с ID '".$productID."' '".$el->LAST_ERROR."'."."\n");
                    $this->productErrors++;
                }
            }
            $this->LogNow("---"."\n");
        }
        $this->product = [];
        $this->productProps = [];
    }

    private function ClearDirectory($dir) {
        if ($objects = glob($dir."/*")) {
            foreach($objects as $obj) {
                is_dir($obj) ? $this->clearDirectory($obj) : unlink($obj);
            }
        }
    }

    private function ClearGroups(){
        $this->LogNow("\n" . "\n" . date('d-m-Y H:i:s') . "\n" . $this->assetsData['divider'] . "\n" . "\n" . "\n");
        $this->LogNow(date('d-m-Y H:i:s') . " \n" . "Выполняем операцию чистки лишних групп." . " \n");
        $ArrayLevels = $this->GetJson('groups');
        $ArrayLevelsCurrent = $this->GetJson('groups_current');
        $rewriteLevels = false;
        $tree = CIBlockSection::GetTreeList(
            ['IBLOCK_ID' => CATALOG_ID],
            ['ID', 'EXTERNAL_ID', 'NAME']
        );
        while($section = $tree->GetNext()) {
            if(!isset($ArrayLevelsCurrent[$section['EXTERNAL_ID']])){
                if(isset($ArrayLevels[$section['EXTERNAL_ID']])){
                    unset($ArrayLevels[$section['EXTERNAL_ID']]);
                    $rewriteLevels = true;
                }
                if(CIBlockSection::Delete($section['ID'])){
                    if((int)$section['EXTERNAL_ID']) $this->LogNow("Группа '".$section['NAME']."' с внешним ID ".$section['EXTERNAL_ID']." была удалена."."\n");
                    else $this->LogNow("Группа '".$section['NAME']."' без внешнего ID была удалена."."\n");
                }else $this->LogNow("Ошибка! Группа '".$section['NAME']."' с внешним ID ".$section['EXTERNAL_ID']." не была удалена."."\n");
            }
        }
        if ($rewriteLevels) $this->UpdateJson(['groups' => $ArrayLevels]);
    }

    private function SortGroups(){
        $sortedArray = false;
        $groups = $this->GetJson('groups', $this->assetsData['files_root'].'data/JSON_categories/');
        if (count($groups)) {
            $mixedArray1 = [];
            foreach ($groups as $group) {
                $mixedArray1Key = $group['id'];
                unset($group['id']);
                unset($group['obsolete']);
                $group['children'] = [];
                $mixedArray1[$mixedArray1Key] = $group;
            }
            $mixedArray2 = $mixedArray1;
            foreach ($mixedArray1 as $key => $group) {
                if (!$group['enclosure'] && $group['parent'] !== '1') {
                    $mixedArray2[$group['parent']]['children'][$key] = $group;
                    unset($mixedArray2[$key]);
                }
            }
            unset($mixedArray1);
            $mixedArray3 = $mixedArray2;
            foreach ($mixedArray2 as $key => $group) {
                if ((int)$group['parent'] > 100000) {
                    $mixedArray3[$group['parent']]['children'][$key] = $group;
                    unset($mixedArray3[$key]);
                }
            }
            unset($mixedArray2);
            if (isset($mixedArray3['1'])) {
                unset($mixedArray3['1']);
            }
            if (is_array($mixedArray3) && count($mixedArray3)) {
                $sortedArray = $mixedArray3;
            }
        }
        if($sortedArray) $this->groupsSortedArray = $sortedArray;
        return $sortedArray;
    }

    private function MakeDirectory($folders=[]){
        foreach ($folders as $folder){
            if(!is_dir($this->assetsData['files_root'].$folder)) mkdir($this->assetsData['files_root'].$folder);
        }
    }

    private function UpdateJson($files = [], $startPath = false){
        if(!$startPath) $startPath = $this->assetsData['files_root'] . 'data/json/';
        foreach ($files as $name => $content) file_put_contents($startPath . $name . '.json', json_encode($content, JSON_UNESCAPED_UNICODE));
    }

    private function GetJson($filename, $startPath = false){
        if(!$startPath) $startPath = $this->assetsData['files_root'] . 'data/json/';
        if(file_exists($startPath . $filename . '.json'))
            return json_decode(json_encode(json_decode(file_get_contents($startPath . $filename . '.json'))), true);
        else return [];
    }

    /**
     * @throws ArgumentException
     * @throws SqlQueryException
     * @throws ObjectPropertyException
     * @throws SystemException
     */
    private function ProductCardPropertiesToShow(){
        $this->LogNow(date('d-m-Y H:i:s') . " \n" . "Заполняем свойства для вывода в карте товара" ." \n");
        $arProducts = $this->GetJson('products', $this->assetsData['files_root'].'data/JSON_categories/');
        $jsonArticlesToIDs = $this->GetJson('product_ids');
        if (!empty($arProducts)) {
            $availablePropForDisplay = [];
            $propListForProduct = [];
            foreach ($arProducts as $product) {
                foreach ($product['techdata'] as $prop) {
                    if(isset($jsonArticlesToIDs[$product['article']])){
                        $code = 'T_' . $prop['id'];
                        $availablePropForDisplay[] = $code;
                        if ($code == 'T_153') $code = 'COLOR_HREF';
                        $propListForProduct[$jsonArticlesToIDs[$product['article']]][] = $code;
                    }
                }
                unset($prop, $code);
            }
            $availablePropForDisplay = array_unique($availablePropForDisplay);

            /*список свойств в товар*/
            if (count($propListForProduct) > 0) {
                foreach ($propListForProduct as $prodId => $propList) {
                    CIBlockElement::SetPropertyValuesEx($prodId, false, array('TECH_PROPS_ORDER' => $propList));
                }
            }

            /*обновить вывод свойства в карточку товара*/
            $properties = CIBlockProperty::GetList(array("sort" => "asc", "name" => "asc"), array("ACTIVE" => "Y", "IBLOCK_ID" => CATALOG_ID, "CODE" => 'T_%'));
            while ($prop_fields = $properties->GetNext()) {
                $idProp = $prop_fields['ID'];
                $DETAIL_PAGE_SHOW = 'N';
                if (in_array($prop_fields['CODE'], $availablePropForDisplay))
                    $DETAIL_PAGE_SHOW = 'Y';
                PropertyFeature::setFeatures(
                    $idProp, [[
                        "MODULE_ID" => "iblock",
                        "IS_ENABLED" => $DETAIL_PAGE_SHOW,
                        "FEATURE_ID" => "DETAIL_PAGE_SHOW"
                    ]]
                );
            }
        }
    }

}
