<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

CJSCore::Init('jquery');

$APPLICATION->AddHeadScript($templateFolder . "/js/angular.min.js");
$APPLICATION->AddHeadScript($templateFolder . "/js/animate.js");
$APPLICATION->AddHeadScript($templateFolder . "/js/app.js");
$APPLICATION->AddHeadScript($templateFolder . "/js/confetti.js");
$APPLICATION->SetAdditionalCSS($templateFolder."/css/animate.css");

?>
<div  style="position: relative" ng-app="KraytSiteApp">
<div ng-cloak ng-controller="CntrAddSite" class="row page-list">
    <div  ng-class="animated.page1" class="hello_page">
        <div class="hello_page_title">
            <?=GetMessage('k_hello_page_title')?>
        </div>
        <div class="hello_page_decs">
            <?=GetMessage('k_hello_page_decs')?>
        </div>
    </div>
    <div  ng-hide="desctop" class="desctop">
        <form name="sites_page" novalidate action="">
            <div class="col-md-12 wrp_step">
                <div ng-class="animated.step1" ng-show="current_step == 1" class="step__1">
                    <h1 class="sites_page_title"><?=GetMessage('k_step__1_title')?></h1>
                    <h2 class="sites_page_title_desc margin__100"><?=GetMessage('k_step__1_sites_page_title_desc')?></h2>
                    <div class="col-md-12 text-center">
                        <div ng-click="select.openOn()" ng-class="{open:select.open}" required="required" ng-model="site_id" name="site_id" class="select">
                            <div class="select_current">{{select.default}}</div>
                            <div class="select_list">
                                <div ng-click="select.Selected(kk)" class="select_val" ng-repeat="(kk, site) in list_site">{{site.TITLE}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 text-right">
                        <button type="button" ng-click="nextStep(2) " class="btn btn-link-blue btn-next-icon"><?=GetMessage('k_step__1_btn')?></button>
                    </div>
                </div>
                <div ng-class="animated.step4" ng-show="current_step == 4" class="step__1">
                    <h3 class="sites_page_title"><?=GetMessage('k_step__1_sites_page_title')?></h3>
                    <h2 class="sites_page_title_desc"><?=GetMessage('k_step__1_no_site_desc')?></h2>
                    <div class="text-center">
                        <a href="/bitrix/admin/landing_site.php?lang=ru&site=s1" type="button" class="btn btn-link-blue"><?=GetMessage('k_step__1_create_site_btn')?></a>
                    </div>
                </div>

                <div ng-class="animated.step2" ng-show="current_step == 2" class="step__1">
                    <h1 class="sites_page_title"><?=GetMessage('k_step__2_title')?></h1>
                    <h2 class="sites_page_title_desc"><?=GetMessage('k_step__2_sites_page_title_desc')?></h2>
                    <h2 class="sites_page_title_desc f24"><?=GetMessage('k_step__2_sites_page_title_desc2')?></h2>
                    <div class="col-md-12">
                        <div class="form-group text-center">
                            <input placeholder="<?=GetMessage('k_input_placeholder')?>" value="<?=$arResult['PAGE']['TITLE']?>" required="required" minlength="3" id="name_page" class="input margin__top_70" name="name_page"  ng-model="name_page" type="text">
                            <div class="input-info text-warning"><?=GetMessage('k_input_text-warning')?></div>
                        </div>
                    </div>
                    <div class="col-md-6 text-left">
                        <button type="button" ng-click="nextStep(1)" class="btn btn-link-blue btn-back-icon"><?=GetMessage('k_step__2_back_btn')?></button>
                    </div>
                    <div class="col-md-6 text-right">
                        <button type="button" ng-click="addPage()" class="btn btn-link-blue "><?=GetMessage('k_step__1_create_site_btn')?></button>
                    </div>
                </div>
                <div ng-class="animated.step3" ng-show="current_step == 3" class="step__1">
                    <div class="text-center">
                        <h1 class="success_title">
                            <?=GetMessage('k_success_title')?>
                        </h1>
                        <h2 class="success_title_desc">
                            <?=GetMessage('k_success_title_desc')?>
                        </h2>
                    </div>
                    <p  class="success_active_desc text-center">
                        <?=GetMessage('k_success_active_desc')?>
                    </p>
                    <div class="text-center">
                        <button  style="margin-top: 50px" ng-click="installSiteMore()" class="btn create_page_btn btn-link-blue"><?=GetMessage('k_success_create_page_btn')?></button>
                    </div>
                </div>
            </div>
        </form>

        <div ng-class="animated.page2" class="col-md-12 create_page">
            <div  class="row">
                <div ng-class="animated.page2_desc" class="col-md-12">
                    <div class="create_page_title text-center">
                        <?=GetMessage('k_create_page_title2')?>
                    </div>
                    <div class="create_page_name_app text-center">
                        «<?=$arResult['PAGE']['TITLE']?>»
                    </div>
                    <div class="create_page_title text-center">
                        <?=GetMessage('k_create_page_title_24_site')?>
                    </div>
                    <div class="create_page_desc text-center">
                        <?=GetMessage('k_create_time')?>
                    </div>
                </div>

                <div ng-class="animated.page2_btn" class="col-md-12 text-center">
                    <button  ng-click="installSite()" class="btn create_page_btn btn-link-blue"><?=GetMessage('k_success_create_page_btn')?></button>
                </div>
            </div>
        </div>
    </div>

</div>
    <div ng-class="{open:loaderOpen}" ng-init="loaderOpen = false;" class="loader-wraper" ng-show="loaderOpen">
        <img src="<?=$templateFolder?>/images/pacman.svg" alt="">
    </div>
    <canvas ng-init="confetti = false" ng-show="confetti" height='1' id='confetti' width='1'></canvas>
</div>
<script>
    var pageDefault = <?=CUtil::PhpToJSObject($arResult['PAGE'])?>;
    var blocks = [];
</script>