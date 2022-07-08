<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("О нас");
?>
    <div class="title title-page">
        <div class="title__text"><h1><?$APPLICATION->ShowTitle()?></h1></div>
        <div class="title__backlink">
            <i class="icon-arrow-left"></i>
            <a href="">вернуться</a>
        </div>
    </div>
    <div class="about-page text-wrap">
        <div class="row">
            <div class="col-xl-5 col-md-4">
                <div class="full-width">
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "inc",
                            "EDIT_TEMPLATE" => "",
                            "PATH" => SITE_DIR . "/include/main_about-img.php"
                        )
                    ); ?>
                </div>
            </div>
            <div class="col-xl-7 col-md-8">
                <? $APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    Array(
                        "AREA_FILE_SHOW" => "file",
                        "AREA_FILE_SUFFIX" => "inc",
                        "EDIT_TEMPLATE" => "",
                        "PATH" => SITE_DIR . "/include/main_about.php"
                    )
                ); ?>
            </div>
        </div>
    </div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>