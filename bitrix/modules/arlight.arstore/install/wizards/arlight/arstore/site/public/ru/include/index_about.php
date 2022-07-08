<div class="about">
    <div class="container container-main">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="about-wrap">
                    <div class="title">О Компании</div>
                    <?
                    $file = SITE_DIR . "include/main_about.php";
                    if (file_exists($_SERVER["DOCUMENT_ROOT"] . SITE_DIR . "include/main_about_index.php")) {
                        $file = SITE_DIR . "include/main_about_index.php";
                    }
                    ?>
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "inc",
                            "EDIT_TEMPLATE" => "",
                            "PATH" => $file
                        )
                    ); ?>
                    <a href="<?= SITE_DIR ?>about/"></a>
                </div>
            </div>
        </div>
    </div>
</div>