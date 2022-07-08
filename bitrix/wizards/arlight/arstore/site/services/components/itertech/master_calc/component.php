<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?php
if ($this->InitComponentTemplate()) {
	$componentPath = $this->GetPath();
	$APPLICATION->AddHeadScript($componentPath . "/js/js.js");
	$template = & $this->GetTemplate();
	$templatePath = $template->GetFolder();
	$this->IncludeComponentTemplate();
} else {
	return;
}


?>