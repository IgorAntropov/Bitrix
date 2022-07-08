<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/install/wizard_sol/wizard.php");

class SelectSiteStep extends CSelectSiteWizardStep
{
	function InitStep()
	{
		parent::InitStep();

		$wizard =& $this->GetWizard();
		$wizard->solutionName = "arstore";
	}
}


class SelectTemplateStep extends CSelectTemplateWizardStep
{
    function InitStep()
    {
        parent::InitStep();
        // следующий шаг - настройки сайта (пропускаем выбор тему - так как ее нет)
        $this->SetNextStep("site_settings");
    }

    function OnPostForm()
    {
        parent::OnPostForm();
    }

    function ShowStep()
    {
        $wizard =& $this->GetWizard();

        $templatesPath = WizardServices::GetTemplatesPath($wizard->GetPath() . "/site");
        $arTemplates = WizardServices::GetTemplates($templatesPath);

        if (empty($arTemplates))
            return;

        // устанавливаем шаблон по-умолчанию
        $wizard->SetVar("templateID", "arlight");

        $templateID = $wizard->GetVar("templateID");


        if (isset($templateID) && array_key_exists($templateID, $arTemplates)) {

            $defaultTemplateID = $templateID;
            $wizard->SetDefaultVar("templateID", $templateID);

        } else {

            $defaultTemplateID = COption::GetOptionString("main", "wizard_template_id", "", $wizard->GetVar("siteID"));
            if (!(strlen($defaultTemplateID) > 0 && array_key_exists($defaultTemplateID, $arTemplates))) {
                if (strlen($defaultTemplateID) > 0 && array_key_exists($defaultTemplateID, $arTemplates))
                    $wizard->SetDefaultVar("templateID", $defaultTemplateID);
                else
                    $defaultTemplateID = "";
            }
        }

        CFile::DisableJSFunction();

        $this->content .= '<div id="solutions-container" class="inst-template-list-block">';

        foreach ($arTemplates as $templateID => $arTemplate) {
            // выводим только один шаблон, выбранный по-умолчанию
            // остальные не показываем
            if ($templateID !== $defaultTemplateID) continue;

            if ($defaultTemplateID == "") {
                $defaultTemplateID = $templateID;
                $wizard->SetDefaultVar("templateID", $defaultTemplateID);
            }

            $this->content .= '<div class="inst-template-description">';
            $this->content .= $this->ShowRadioField("templateID", $templateID, array("id" => $templateID, "class" => "inst-template-list-inp"));
            if ($arTemplate["SCREENSHOT"] && $arTemplate["PREVIEW"])
                $this->content .= CFile::Show2Images($arTemplate["PREVIEW"], $arTemplate["SCREENSHOT"], 150, 150, ' class="inst-template-list-img"');
            else
                $this->content .= CFile::ShowImage($arTemplate["SCREENSHOT"], 150, 150, ' class="inst-template-list-img"', "", true);

            $this->content .= '<label for="' . $templateID . '" class="inst-template-list-label">' . $arTemplate["NAME"] . '<p>' . $arTemplate["DESCRIPTION"] . '</p></label>';
            $this->content .= "</div>";

        }

        $this->content .= '</div>';
    }

}

class SiteSettingsStep extends CSiteSettingsWizardStep
{
    function InitStep()
    {
        $wizard =& $this->GetWizard();
        $wizard->solutionName = "arstore";
        parent::InitStep();

        $this->SetNextStep("catalog_settings");

        $this->SetNextCaption(GetMessage("NEXT_BUTTON"));
        $this->SetPrevCaption(GetMessage("PREVIOUS_BUTTON"));


        $templateID = $wizard->GetVar("templateID");
        $themeID = $wizard->GetVar($templateID . "_themeID");
        $siteID = $wizard->GetVar("siteID");

        $siteLogo = "/images/header_logo.png";
        if (!file_exists(WIZARD_SITE_PATH . $siteLogo))
            $siteLogo = "/bitrix/wizards/arlight/arstore/site/public/" . LANGUAGE_ID . "/images/header_logo.png";

        $linksSocArr = [];
        if (file_exists($file = WIZARD_SITE_PATH . "/assets/json/socialNetwork.json")) {
            $linksSocArr = json_decode(json_encode(json_decode(file_get_contents($file))), true);
        }

        function GetSectionArray($abs_path)
        {
            $arDirProperties = [];
            $sSectionName = '';

            $io = CBXVirtualIo::GetInstance();
            if ($io->FileExists($abs_path))
                include($io->GetPhysicalName($abs_path));

            return ["aMenuLinks" => $arDirProperties, "sSectionName" => $sSectionName];
        }

        $sectionInfo = GetSectionArray(WIZARD_SITE_PATH . "/.section.php");
        $siteMetaDescriptionVal = GetMessage("wiz_site_desc");
        $siteMetaKeywordsVal = GetMessage("wiz_keywords");
        $siteTitleVal = GetMessage("wiz_title");
        if ($sectionInfo['aMenuLinks']['keywords'] && !stristr($sectionInfo['aMenuLinks']['keywords'], '#'))
            $siteMetaKeywordsVal = $sectionInfo['aMenuLinks']['keywords'];
        if ($sectionInfo['aMenuLinks']['description'] && !stristr($sectionInfo['aMenuLinks']['description'], '#'))
            $siteMetaDescriptionVal = $sectionInfo['aMenuLinks']['description'];
//        if ($sectionInfo['sSectionName'] && !stristr($sectionInfo['sSectionName'], '#'))
//            $siteTitleVal = $sectionInfo['sSectionName'];

        $rsSites = CSite::GetByID($siteID);
        $arSite = $rsSites->Fetch();
        $siteNameVal = ($arSite['SITE_NAME'] != '') ? $arSite['SITE_NAME'] : $arSite['NAME'];
        $serverNameVal = $arSite['SERVER_NAME'];

        $wizard->SetDefaultVars(
            array(
                "siteLogo" => $siteLogo,
//				"siteCopy" => $this->GetFileContent(WIZARD_SITE_PATH."include/copyright.php", GetMessage("WIZ_COMPANY_COPY_DEF")),
                "siteEmail" => $this->GetFileContent(WIZARD_SITE_PATH . "include/header_mail.php", 'test@domain.com'),
                "sitePhone" => $this->GetFileContent(WIZARD_SITE_PATH . "include/header_phone.php", '+7 (777) 777 7777'),
                "siteMetaDescription" => $siteMetaDescriptionVal,
                "siteMetaKeywords" => $siteMetaKeywordsVal,
                "siteTitle" => $siteTitleVal,
                "siteName" => $siteNameVal,
                "serverName" => $serverNameVal,
                "siteSocFB" => $linksSocArr['social_fb'],
                "siteSocVK" => $linksSocArr['social_vk'],
                "siteSocIG" => $linksSocArr['social_ig'],
                "siteSocTW" => $linksSocArr['social_tw'],
                "siteSocYT" => $linksSocArr['social_yt'],
                "siteSocOK" => $linksSocArr['social_ok'],
                "siteSocTG" => $linksSocArr['social_tg'],
                "siteNameOrg" => COption::GetOptionString("header_action", "entity_name", GetMessage("wiz_siteNameOrg_val"))
            )
        );
    }

    function ShowStep()
    {
        $wizard =& $this->GetWizard();

        $siteLogo = $wizard->GetVar("siteLogo", true);

        $this->content .= '<div class="wizard-upload-img-block"><div class="wizard-catalog-title">' . GetMessage("WIZ_COMPANY_LOGO") . '</div>';
        $this->content .= CFile::ShowImage($siteLogo, 209, 61, "border=0 vspace=15");
        $this->content .= "<br />" . $this->ShowFileField("siteLogo", array("show_file_info" => "N", "id" => "site-logo")) . "</div>";


        $this->content .= '<div class="wizard-upload-img-block"><div class="wizard-catalog-title">' . GetMessage("WIZ_COMPANY_EMAIL") . '</div>';
        $this->content .= $this->ShowInputField("text", "siteEmail", array("id" => "siteEmail", "class" => "wizard-field")) . "</div>";

        $this->content .= '<div class="wizard-upload-img-block"><div class="wizard-catalog-title">' . GetMessage("WIZ_COMPANY_PHONE") . '</div>';
        $this->content .= $this->ShowInputField("text", "sitePhone", array("id" => "sitePhone", "class" => "wizard-field")) . "</div>";

        $this->content .= '<div class="wizard-upload-img-block"><div class="wizard-catalog-title">' . GetMessage("WIZ_COMPANY_NAME") . '</div>';
        $this->content .= $this->ShowInputField("text", "siteNameOrg", array("id" => "siteNameOrg", "class" => "wizard-field", "required" => "true")) . "</div>";

        $this->content .= '<div class="wizard-upload-img-block"><div class="wizard-catalog-title">' . GetMessage("WIZ_COMPANY_SOC") . '</div>';

        $this->content .= $this->ShowInputField("text", "siteSocFB", array("id" => "siteSocFB", "class" => "wizard-field", "placeholder" => 'Facebook')) . "</br>";
        $this->content .= $this->ShowInputField("text", "siteSocVK", array("id" => "siteSocVK", "class" => "wizard-field", "placeholder" => 'Vkontakte')) . "</br>";
        $this->content .= $this->ShowInputField("text", "siteSocIG", array("id" => "siteSocIG", "class" => "wizard-field", "placeholder" => 'Instagram')) . "</br>";
        $this->content .= $this->ShowInputField("text", "siteSocTW", array("id" => "siteSocTW", "class" => "wizard-field", "placeholder" => 'Twitter')) . "</br>";
        $this->content .= $this->ShowInputField("text", "siteSocYT", array("id" => "siteSocYT", "class" => "wizard-field", "placeholder" => 'Youtube')) . "</br>";
        $this->content .= $this->ShowInputField("text", "siteSocOK", array("id" => "siteSocOK", "class" => "wizard-field", "placeholder" => GetMessage("ARLIGHT_ARSTORE_ODNOKLASSNIKI"))) . "</br>";
        $this->content .= $this->ShowInputField("text", "siteSocTG", array("id" => "siteSocTG", "class" => "wizard-field", "placeholder" => 'Telegram-'.GetMessage("ARLIGHT_ARSTORE_KANAL"))) . "</div>";

        $firstStep = COption::GetOptionString("main", "wizard_first" . substr($wizard->GetID(), 7) . "_" . $wizard->GetVar("siteID"), false, $wizard->GetVar("siteID"));

        $styleMeta = 'style="display:block"';
        if ($firstStep == "Y") $styleMeta = 'style="display:none"';

        $this->content .= '
		<div  id="bx_metadata" ' . $styleMeta . '>
			<div class="wizard-input-form-block">
				<div class="wizard-metadata-title">' . GetMessage("wiz_meta_data") . '</div>
				<div class="wizard-upload-img-block" style="display: none">
					<label for="siteTitle" class="wizard-input-title">' . GetMessage("wiz_meta_title") . '</label><br>
					' . $this->ShowInputField('text', 'siteTitle', array("id" => "siteTitle", "class" => "wizard-field")) . '
				</div>
				<div class="wizard-upload-img-block">
                    <label for="siteName" class="wizard-input-title">' . GetMessage('WIZ_SETTINGS_SITE_NAME') . '</label><br>
                            ' . $this->ShowInputField('text', 'siteName', array("id" => "siteName", "class" => "wizard-field")) . '
                </div>
                <div class="wizard-upload-img-block">
                    <label for="serverName" class="wizard-input-title">' . GetMessage('WIZ_SETTINGS_SERVER_NAME') . '</label><br>
                            ' . $this->ShowInputField('text', 'serverName', array("id" => "serverName", "class" => "wizard-field")) . '
                </div>
				<div class="wizard-upload-img-block">
					<label for="siteMetaDescription" class="wizard-input-title">' . GetMessage("wiz_meta_description") . '</label>
					' . $this->ShowInputField("textarea", "siteMetaDescription", array("id" => "siteMetaDescription", "class" => "wizard-field", "rows" => "3")) . '
				</div>';
        $this->content .= '
				<div class="wizard-upload-img-block">
					<label for="siteMetaKeywords" class="wizard-input-title">' . GetMessage("wiz_meta_keywords") . '</label><br>
					' . $this->ShowInputField('text', 'siteMetaKeywords', array("id" => "siteMetaKeywords", "class" => "wizard-field")) . '
				</div>
			</div>
		</div>';

        if ($firstStep == "Y") {
            $this->content .= $this->ShowCheckboxField("installDemoData", "Y",
                (array("id" => "install-demo-data", "onClick" => "if(this.checked == true){document.getElementById('bx_metadata').style.display='block';}else{document.getElementById('bx_metadata').style.display='none';}")));
            $this->content .= '<label for="install-demo-data">' . GetMessage("wiz_structure_data") . '</label><br />';

        } else {
            $this->content .= $this->ShowHiddenField("installDemoData", "Y");
        }

        $formName = $wizard->GetFormName();
        $installCaption = $this->GetNextCaption();
        $nextCaption = GetMessage("NEXT_BUTTON");
    }

    function OnPostForm()
    {
        $wizard =& $this->GetWizard();
        $res = $this->SaveFile("siteLogo", array("extensions" => "png", "max_height" => 350, "max_width" => 500, "make_preview" => "Y"));
        COption::SetOptionString("main", "wizard_site_logo", $res, "", $wizard->GetVar("siteID"));
    }
}

class CatalogSettingsStep extends CWizardStep
{
    function InitStep()
    {
        $this->SetStepID("catalog_settings");
        $this->SetTitle(GetMessage("wiz_settings_catalog"));
        $this->SetSubTitle(GetMessage("wiz_settings_catalog"));
        $this->SetNextStep("data_install");
        $this->SetPrevStep("site_settings");
        $this->SetNextCaption(GetMessage("wiz_install"));
        $this->SetPrevCaption(GetMessage("PREVIOUS_BUTTON"));
        $wizard =& $this->GetWizard();


        $siteAssetsLogin = '';
        $siteAssetsPassword = '';
        if ($arFormField = COption::GetOptionString('arlight.assets', "access")) {
            $arFormField = unserialize($arFormField);
            $siteAssetsLogin = $arFormField['login'];
            $siteAssetsPassword = $arFormField['password'];
        }
        $shopLocalization = 'ru';
        $shopCurrency = COption::GetOptionString("main", "currency", GetMessage("WIZ_SHOP_CURRENCY_RU"));


        //получить доступ к assets из настроек
        $wizard->SetDefaultVars(
            [
                "siteAssetsLogin" => $siteAssetsLogin,
                "siteAssetsPassword" => $siteAssetsPassword,
                "shopLocalization" => $shopLocalization,
                "shopCurrency" => $shopCurrency
            ]
        );
    }

    function ShowStep()
    {
        $wizard =& $this->GetWizard();

        $this->content .= '<div class="wizard-metadata-title">' . GetMessage("wiz_assets_access") . '</div>';
        $this->content .= '<table class="wizard-input-table"><tr><td class="wizard-input-table-left">' . GetMessage("wiz_assets_login") . '</td>';
        $this->content .= '<td class="wizard-input-table-right">' . $this->ShowInputField("text", "siteAssetsLogin", array("id" => "siteAssetsLogin", "class" => "wizard-field")) . "</td></tr>";
        $this->content .= '<tr><td class="wizard-input-table-left">' . GetMessage("wiz_assets_password") . '</td>';
        $this->content .= '<td class="wizard-input-table-right">' . $this->ShowInputField("text", "siteAssetsPassword", array("id" => "siteAssetsPassword", "class" => "wizard-field")) . "</td></tr></table>";

        $this->content .=
            '<br><div class="wizard-metadata-title">' . GetMessage("WIZ_SHOP_LOCALIZATION") . '</div>
				<div class="wizard-input-form-block" >' .
            $this->ShowSelectField("shopLocalization", array(
                "ru" => GetMessage("WIZ_SHOP_LOCALIZATION_RUSSIA"),
                "bl" => GetMessage("WIZ_SHOP_LOCALIZATION_BELARUS")
            ), array("id" => "localization_select", "class" => "wizard-field", "style" => "padding:0 0 0 15px")) . '</div>';

        $this->content .= '<div class="wizard-catalog-title">' . GetMessage("WIZ_SHOP_CURRENCY") . '</div>';
        $this->content .= $this->ShowInputField('text', 'shopCurrency', array("id" => "shopCurrency", "class" => "wizard-field", "size=>4"));


    }

    function OnPostForm()
    {
        $wizard =& $this->GetWizard();

        $currentLocalization = $wizard->GetVar("shopLocalization");

        if ($currentLocalization == 'bl')
            COption::SetOptionString("main", "belarus", true);
        else
            COption::SetOptionString("main", "belarus", false);

        if ($wizard->GetVar("siteAssetsLogin") && $wizard->GetVar("siteAssetsPassword")) {
            $access_data = array(
                'login' => $wizard->GetVar("siteAssetsLogin"),
                'password' => $wizard->GetVar("siteAssetsPassword"),
            );
            COption::SetOptionString('arlight.assets', "access", serialize($access_data));
        }

        if ($wizard->GetVar("shopCurrency")){
            COption::SetOptionString("main", "currency", $wizard->GetVar("shopCurrency"));
            COption::SetOptionString("itertech.cart", "CURRENCY", $wizard->GetVar("shopCurrency"));
        }
    }
}

class DataInstallStep extends CDataInstallWizardStep
{
    function CorrectServices(&$arServices)
    {
        $wizard =& $this->GetWizard();
        if ($wizard->GetVar("installDemoData") != "Y") {
        }
    }

}

class FinishStep extends CFinishWizardStep
{
}

?>