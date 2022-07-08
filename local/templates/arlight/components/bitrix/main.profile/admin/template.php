<?
/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 */
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
?>

<div class="bx-auth-profile">

    <? ShowError($arResult["strProfileError"]); ?>
    <?
    if ($arResult['DATA_SAVED'] == 'Y')
        ShowNote(GetMessage('PROFILE_DATA_SAVED'));
    ?>
    <script >
        <!--
        var opened_sections = [<?
            $arResult["opened"] = $_COOKIE[$arResult["COOKIE_PREFIX"] . "_user_profile_open"];
            $arResult["opened"] = preg_replace("/[^a-z0-9_,]/i", "", $arResult["opened"]);
            if (strlen($arResult["opened"]) > 0) {
                echo "'" . implode("', '", explode(",", $arResult["opened"])) . "'";
            } else {
                $arResult["opened"] = "reg";
                echo "'reg'";
            }
            ?>];
        //-->

        var cookie_prefix = '<?=$arResult["COOKIE_PREFIX"]?>';
    </script>
    <form method="post" name="form1" action="<?= $arResult["FORM_TARGET"] ?>" enctype="multipart/form-data">
        <?= $arResult["BX_SESSION_CHECK"] ?>
        <input type="hidden" name="lang" value="<?= LANG ?>"/>
        <input type="hidden" name="ID" value=<?= $arResult["ID"] ?>/>

        <div class="profile-block"
             id="user_div_reg">
            <div class="profile-table data-table">
                <div class="row">
                    <div class="col-md-4 form__item ">
                        <div class="form__item-title"><?= GetMessage('NAME') ?></div>
                        <div><input type="text" class="input" name="NAME" maxlength="50"
                                    value="<?= $arResult["arUser"]["NAME"] ?>"/>
                        </div>
                    </div>
                    <div class="col-md-4 form__item ">
                        <div class="form__item-title"><?= GetMessage('LAST_NAME') ?></div>
                        <div><input type="text" class="input" name="LAST_NAME" maxlength="50"
                                    value="<?= $arResult["arUser"]["LAST_NAME"] ?>"/></div>
                    </div>
                    <div class="col-md-4 form__item ">
                        <div class="form__item-title"><?= GetMessage('EMAIL') ?><? if ($arResult["EMAIL_REQUIRED"]): ?>
                                <span
                                        class="starrequired">*</span><? endif ?></div>
                        <div><input type="text" class="input" name="EMAIL" maxlength="50"
                                    value="<? echo $arResult["arUser"]["EMAIL"] ?>"/></div>
                    </div>
                    <div class="col-md-4 form__item ">
                        <div class="form__item-title"><?= GetMessage('LOGIN') ?><span class="starrequired">*</span>
                        </div>
                        <div><input type="text" class="input" name="LOGIN" maxlength="50"
                                    value="<? echo $arResult["arUser"]["LOGIN"] ?>"/></div>
                    </div>
                        <div class="col-md-4 form__item ">
                            <div class="form__item-title"><?= GetMessage('NEW_PASSWORD_REQ') ?></div>
                            <div><input type="password" class="input" name="NEW_PASSWORD" maxlength="50" value=""
                                        autocomplete="off"/>
                            </div>
                        </div>
                    <? if ($arResult["SECURE_AUTH"]): ?>
                        <div class="bx-auth-secure" id="bx_auth_secure"
                             title="<? echo GetMessage("AUTH_SECURE_NOTE") ?>" style="display:none">
                            <div class="bx-auth-secure-icon"></div>
                        </div>
                        <noscript>
                            <div class="bx-auth-secure" title="<? echo GetMessage("AUTH_NONSECURE_NOTE") ?>">
                                <div class="bx-auth-secure-icon bx-auth-secure-unlock"></div>
                            </div>
                        </noscript>
                        <script >
                            document.getElementById('bx_auth_secure').style.display = 'inline-block';
                        </script>

                    <? endif ?>
                        <div class="col-md-4 form__item ">
                            <div class="form__item-title"><?= GetMessage('NEW_PASSWORD_CONFIRM') ?></div>
                            <div><input type="password" class="input" name="NEW_PASSWORD_CONFIRM" maxlength="50"
                                        value=""
                                        autocomplete="off"/></div>
                        </div>
                </div>
            </div>
        </div>


        <? // ********************* User properties ***************************************************?>
        <? if ($arResult["USER_PROPERTIES"]["SHOW"] == "Y"): ?>
            <div class="profile-link profile-user-div-link">
                <a title="<?= GetMessage("USER_SHOW_HIDE") ?>"
                   href="javascript:void(0)"
                   onclick="SectionClick('user_properties')"><?= strlen(trim($arParams["USER_PROPERTY_NAME"])) > 0 ? $arParams["USER_PROPERTY_NAME"] : GetMessage("USER_TYPE_EDIT_TAB") ?></a>
            </div>
            <div id="user_div_user_properties"
                 class="profile-block-<?= strpos($arResult["opened"], "user_properties") === false ? "hidden" : "shown" ?>">
                <div class="data-table profile-table">

                    <? $first = true; ?>
                    <? foreach ($arResult["USER_PROPERTIES"]["DATA"] as $FIELD_NAME => $arUserField): ?>
                        <div>
                            <div class="field-name">
                                <? if ($arUserField["MANDATORY"] == "Y"): ?>
                                    <span class="starrequired">*</span>
                                <? endif; ?>
                                <?= $arUserField["EDIT_FORM_LABEL"] ?>:
                            </div>
                            <div class="field-value">
                                <? $APPLICATION->IncludeComponent(
                                    "bitrix:system.field.edit",
                                    $arUserField["USER_TYPE"]["USER_TYPE_ID"],
                                    array("bVarsFromForm" => $arResult["bVarsFromForm"], "arUserField" => $arUserField), null, array("HIDE_ICONS" => "Y")); ?></div>
                        </div>
                    <? endforeach; ?>
                </div>
            </div>
        <? endif; ?>
        <? // ******************** /User properties ***************************************************?>
<!--        <p>--><?// echo $arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"]; ?><!--</p>-->
        <div class="profile__btns">
            <span>
               <input type="submit" name="save" class="button"
                      value="<?= (($arResult["ID"] > 0) ? GetMessage("MAIN_SAVE") : GetMessage("MAIN_ADD")) ?>">
            </span>
            <span>
                <input type="reset" class="button" value="<?= GetMessage('MAIN_RESET'); ?>">
            </span>
        </div>
    </form>
    <?
    if ($arResult["SOCSERV_ENABLED"]) {
        $APPLICATION->IncludeComponent("bitrix:socserv.auth.split", ".default", array(
            "SHOW_PROFILES" => "Y",
            "ALLOW_DELETE" => "Y"
        ),
            false
        );
    }
    ?>
</div>