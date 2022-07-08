<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
use Bitrix\Main\Web;
use Bitrix\Main\Application;
use \Bitrix\Landing\Landing;
use \Bitrix\Main\Web\HttpClient;
use \Bitrix\Main\Web\Json;

CModule::IncludeModule("iblock");
\Bitrix\Main\Loader::includeModule('landing');

class CInstallPage extends CBitrixComponent
{
    private $folder = "";
    private $file_config = "";

    public function executeComponent()
    {
        global $APPLICATION, $USER;
        $request = Application::getInstance()->getContext()->getRequest();
        $method =  $request->get('method');
        $name_comp =  $request->get('name_comp');

        $this->file_config = "bitrix/modules/krayt.{$this->arParams['PAGE_CODE']}/page/page.json";

        if($request->isAjaxRequest()&& $this->getName() == $name_comp)
        {
            $APPLICATION->RestartBuffer();
            if($method)
            {
                if(method_exists($this,$method))
                {
                    $this->$method($request);

                }else{
                    return $this->ResJson(array(
                        'error' => true,
                        'msg' => "Not params"
                    ));
                }
            }else
            {
                return $this->ResJson(array(
                    'error' => true,
                    'msg' => "Not params"
                ));
            }
        }

        $tpl = "";
        $this->getInfoPage();
        $this->includeComponentTemplate($tpl);
        return $this->arResult;
    }

    public function  ResJson($arRes)
    {
        echo Web\Json::encode($arRes);
        die();
    }


    private function getPageData()
    {

        $this->folder = $_SERVER["DOCUMENT_ROOT"]."/";
        $this->file_config = $this->folder.$this->file_config;

        $data = \Bitrix\Main\IO\File::getFileContents($this->file_config);
        if($data)
        {
            try{

                $dataAr = Bitrix\Main\Web\Json::decode($data);
                return $dataAr;
            }catch (Exception $e)
            {
                echo $e->getMessage();
            }
        }

    }

    private function getInfoPage()
    {
        $page = $this->getPageData();

        $this->arResult['PAGE'] = $page['page'];
    }


    private function getListSite()
    {
        $sites = \Bitrix\Landing\Site::getList(array())->fetchAll();

        $this->ResJson($sites);
    }
    private function createPage($siteId = 1,$title = false)
    {
        $dataPage = $this->getPageData();
        if($dataPage)
        {
            if($siteId)
            {
                $dataPage['page']['SITE_ID'] = $siteId;
            }
            Landing::setEditMode();

            if($title)
            {
                $dataPage['page']['TITLE'] = $title;
            }

            $res = Landing::add($dataPage['page']);
            if ($res->isSuccess())
            {
                $landingId = $res->getId();
                $landing = Landing::createInstance($landingId);
                if ($landing->exist())
                {
                    foreach ($dataPage['blocks'] as $block) {

                        $landing->addBlock(
                            $block['code'],
                            array(
                                'PUBLIC' => 'N',
                                'SORT' => $block['sort']
                            )
                        );
                    }
                    if(isset($dataPage['page']['ADDITIONAL_FIELDS']) && is_array($dataPage['page']['ADDITIONAL_FIELDS']))
                    {
                        Landing::saveAdditionalFields($landingId,$dataPage['page']['ADDITIONAL_FIELDS']);
                    }
                }
            }else{
               return $res->getErrors();
            }
        }

        return true;
    }
    private function addPage($request)
    {

        $SITE_ID = $request->getPost('SITE_ID');
        $TITLE = $request->getPost('TITLE');

        if($SITE_ID && $TITLE)
        {
           $res = $this->createPage($SITE_ID,$TITLE);

           if($res === true)
           {
               $this->ResJson(array(
                   'ok' => 1
               ));
           }else{
               $this->ResJson(array(
                   'error' => $res
               ));
           }
        }


    }
}

