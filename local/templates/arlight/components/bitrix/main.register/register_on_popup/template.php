<?
/**
 * Bitrix Framework
 * @package bitrix
 * @subpackage main
 * @copyright 2001-2014 Bitrix
 */

/**
 * Bitrix vars
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @param array $arParams
 * @param array $arResult
 * @param CBitrixComponentTemplate $this
 */

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
?>
<div class="bx-auth-reg">

    <? if ($USER->IsAuthorized()): ?>

        <p><? echo GetMessage("MAIN_REGISTER_AUTH") ?></p>

    <? else: ?>
    <?
    if (count($arResult["ERRORS"]) > 0):
    foreach ($arResult["ERRORS"] as $key => $error)
        if (intval($key) == 0 && $key !== 0)
            $arResult["ERRORS"][$key] = str_replace("#FIELD_NAME#", "&quot;" . GetMessage("REGISTER_FIELD_" . $key) . "&quot;", $error);

    ShowError(implode("<br />", $arResult["ERRORS"])); ?>
        <script>
            $(function () {
                $('.header__sign a[data-name="register-form"]').click();
            });
        </script>
    <? elseif ($arResult["USE_EMAIL_CONFIRMATION"] === "Y"):
    ?>
        <p><? echo GetMessage("REGISTER_EMAIL_WILL_BE_SENT") ?></p>
    <? endif ?>

        <form method="post" action="<?= POST_FORM_ACTION_URI ?>" name="regform_popup" enctype="multipart/form-data"
              class="form__block">
            <?
            if ($arResult["BACKURL"] <> ''):
                ?>
                <input type="hidden" name="backurl" value="<?= $arResult["BACKURL"] ?>"/>
            <?
            endif;
            ?>

            <div class="row">

                <? foreach ($arResult["SHOW_FIELDS"] as $FIELD): ?>
                    <? if ($FIELD == "AUTO_TIME_ZONE" && $arResult["TIME_ZONE_ENABLED"] == true): ?>
                        <div>
                            <div><? echo GetMessage("main_profile_time_zones_auto") ?><? if ($arResult["REQUIRED_FIELDS_FLAGS"][$FIELD] == "Y"): ?>
                                    <span class="starrequired">*</span><? endif ?></div>
                            <div>
                                <select name="REGISTER[AUTO_TIME_ZONE]"
                                        onchange="this.form.elements['REGISTER[TIME_ZONE]'].disabled=(this.value != 'N')">
                                    <option value=""><? echo GetMessage("main_profile_time_zones_auto_def") ?></option>
                                    <option value="Y"<?= $arResult["VALUES"][$FIELD] == "Y" ? " selected=\"selected\"" : "" ?>><? echo GetMessage("main_profile_time_zones_auto_yes") ?></option>
                                    <option value="N"<?= $arResult["VALUES"][$FIELD] == "N" ? " selected=\"selected\"" : "" ?>><? echo GetMessage("main_profile_time_zones_auto_no") ?></option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <div><? echo GetMessage("main_profile_time_zones_zones") ?></div>
                            <div>
                                <select name="REGISTER[TIME_ZONE]"<? if (!isset($_REQUEST["REGISTER"]["TIME_ZONE"])) echo 'disabled="disabled"' ?>>
                                    <? foreach ($arResult["TIME_ZONE_LIST"] as $tz => $tz_name): ?>
                                        <option value="<?= htmlspecialcharsbx($tz) ?>"<?= $arResult["VALUES"]["TIME_ZONE"] == $tz ? " selected=\"selected\"" : "" ?>><?= htmlspecialcharsbx($tz_name) ?></option>
                                    <? endforeach ?>
                                </select>
                            </div>
                        </div>
                    <? else: ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="form__item ">
                                <div class="form__item-block">
                                    <div class="form__item-title"><?= GetMessage("REGISTER_FIELD_" . $FIELD) ?><? if ($arResult["REQUIRED_FIELDS_FLAGS"][$FIELD] == "Y"): ?>
                                            <span class="required">*</span><? endif ?></div>
                                    <div><?
                                        switch ($FIELD) {
                                            case "PASSWORD":
                                                ?><input class="input " size="30" type="password"
                                                         name="REGISTER[<?= $FIELD ?>]"
                                                         value="<?= $arResult["VALUES"][$FIELD] ?>" autocomplete="off"
                                                         <? if ($arResult["REQUIRED_FIELDS_FLAGS"][$FIELD] == "Y"): ?>required<? endif ?>/>
                                            <? if ($arResult["SECURE_AUTH"]): ?>
                                                <div class="bx-auth-secure" id="bx_auth_secure"
                                                     title="<? echo GetMessage("AUTH_SECURE_NOTE") ?>"
                                                     style="display:none">
                                                    <div class="bx-auth-secure-icon"></div>
                                                </div>
                                                <noscript>
                                                    <div class="bx-auth-secure"
                                                         title="<? echo GetMessage("AUTH_NONSECURE_NOTE") ?>">
                                                        <div class="bx-auth-secure-icon bx-auth-secure-unlock"></div>
                                                    </div>
                                                </noscript>
                                                <script>
                                                    document.getElementById('bx_auth_secure').style.display = 'inline-block';
                                                </script>
                                            <? endif ?>
                                                <?
                                                break;
                                            case "CONFIRM_PASSWORD":
                                                ?><input class="input " size="30" type="password"
                                                         name="REGISTER[<?= $FIELD ?>]"
                                                         value="<?= $arResult["VALUES"][$FIELD] ?>"
                                                         autocomplete="off" <? if ($arResult["REQUIRED_FIELDS_FLAGS"][$FIELD] == "Y"): ?>required<? endif ?> /><?
                                                break;

                                            case "PERSONAL_GENDER":
                                                ?><select name="REGISTER[<?= $FIELD ?>]">
                                                <option value=""><?= GetMessage("USER_DONT_KNOW") ?></option>
                                                <option value="M"<?= $arResult["VALUES"][$FIELD] == "M" ? " selected=\"selected\"" : "" ?>><?= GetMessage("USER_MALE") ?></option>
                                                <option value="F"<?= $arResult["VALUES"][$FIELD] == "F" ? " selected=\"selected\"" : "" ?>><?= GetMessage("USER_FEMALE") ?></option>
                                                </select><?
                                                break;

                                            case "PERSONAL_COUNTRY":
                                            case "WORK_COUNTRY":
                                                ?><select name="REGISTER[<?= $FIELD ?>]"><?
                                                foreach ($arResult["COUNTRIES"]["reference_id"] as $key => $value) {
                                                    ?>
                                                    <option value="<?= $value ?>"<? if ($value == $arResult["VALUES"][$FIELD]): ?> selected="selected"<? endif ?>><?= $arResult["COUNTRIES"]["reference"][$key] ?></option>
                                                    <?
                                                }
                                                ?></select><?
                                                break;

                                            case "PERSONAL_PHOTO":
                                            case "WORK_LOGO":
                                                ?><input class="input " size="30" type="file"
                                                         name="REGISTER_FILES_<?= $FIELD ?>" <? if ($arResult["REQUIRED_FIELDS_FLAGS"][$FIELD] == "Y"): ?>required<? endif ?>/><?
                                                break;

                                            case "PERSONAL_NOTES":
                                        case "WORK_NOTES":
                                            ?><textarea cols="30" rows="5"
                                                        name="REGISTER[<?= $FIELD ?>]"><?= $arResult["VALUES"][$FIELD] ?></textarea><?
                                        break;
                                        case "EMAIL": ?>
                                        <input class="input" size="30" type="email" name="REGISTER[<?= $FIELD ?>]"
                                               value="<?= $arResult["VALUES"][$FIELD] ?>"
                                               <? if ($arResult["REQUIRED_FIELDS_FLAGS"][$FIELD] == "Y"): ?>required<? endif ?>/>
                                        <?
                                        break;
                                        default:
                                        if ($FIELD == "PERSONAL_BIRTHDAY"): ?>
                                            <small><?= $arResult["DATE_FORMAT"] ?></small><br/>
                                        <? endif;
                                            ?>

                                            <? if ($FIELD == "PERSONAL_PHONE"): ?>
                                        <input class="input" size="30" type="tel" name="REGISTER[<?= $FIELD ?>]"
                                               value="<?= $arResult["VALUES"][$FIELD] ?>"
                                               <? if ($arResult["REQUIRED_FIELDS_FLAGS"][$FIELD] == "Y"): ?>required<? endif ?>/>
                                        <? else: ?>
                                        <input class="input" size="30" type="text" name="REGISTER[<?= $FIELD ?>]"
                                               value="<?= $arResult["VALUES"][$FIELD] ?>"
                                               <? if ($arResult["REQUIRED_FIELDS_FLAGS"][$FIELD] == "Y"): ?>required<? endif ?>/>
                                        <? endif;
                                            ?>


                                            <?
                                            if ($FIELD == "PERSONAL_BIRTHDAY")
                                                $APPLICATION->IncludeComponent(
                                                    'bitrix:main.calendar',
                                                    '',
                                                    array(
                                                        'SHOW_INPUT' => 'N',
                                                        'FORM_NAME' => 'regform',
                                                        'INPUT_NAME' => 'REGISTER[PERSONAL_BIRTHDAY]',
                                                        'SHOW_TIME' => 'N'
                                                    ),
                                                    null,
                                                    array("HIDE_ICONS" => "Y")
                                                );
                                            ?>
                                        <? } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <? endif ?>
                <? endforeach ?>
                <div class="col-lg-4 col-md-6 form__item ">
                    <? $arUserField = $arResult["USER_PROPERTIES"]["DATA"]["UF_TYPEPAYER"] ?>
                    <div class="form__item-title">
                        <?= $arUserField["EDIT_FORM_LABEL"] ?>
                        <? if ($arUserField["MANDATORY"] == "Y"): ?>
                            <span class="starrequired">*</span>
                        <? endif; ?>
                    </div>
                    <div class="type-payer__list">
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:system.field.edit",
                            $arUserField["USER_TYPE"]["USER_TYPE_ID"],
                            array("bVarsFromForm" => $arResult["bVarsFromForm"], "arUserField" => $arUserField), null, array("HIDE_ICONS" => "Y")); ?>
                    </div>
                </div>
                <? // ********************* User properties ***************************************************?>
                <? if ($arResult["USER_PROPERTIES"]["SHOW"] == "Y" && false): ?>
                    <div>
                        <div>
                            <?= strlen(trim($arParams["USER_PROPERTY_NAME"])) > 0 ? $arParams["USER_PROPERTY_NAME"] : GetMessage("USER_TYPE_EDIT_TAB") ?></div>
                    </div>
                    <? foreach ($arResult["USER_PROPERTIES"]["DATA"] as $FIELD_NAME => $arUserField): ?>
                        <div>
                            <div>
                                <?= $arUserField["EDIT_FORM_LABEL"] ?>:<? if ($arUserField["MANDATORY"] == "Y"): ?>
                                    <span class="starrequired">*</span>
                                <? endif; ?></div>
                            <div>
                                <? $APPLICATION->IncludeComponent(
                                    "bitrix:system.field.edit",
                                    $arUserField["USER_TYPE"]["USER_TYPE_ID"],
                                    array("bVarsFromForm" => $arResult["bVarsFromForm"], "arUserField" => $arUserField, "form_name" => "regform"), null, array("HIDE_ICONS" => "Y")); ?></div>
                        </div>
                    <? endforeach; ?>
                <? endif; ?>
                <? // ******************** /User properties ***************************************************?>
                <?
                /* CAPTCHA */
                if ($arResult["USE_CAPTCHA"] == "Y") {
                    ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="form__item">
                            <div class="form__item-block">
                                <div class="form__item-title"><b><?= GetMessage("REGISTER_CAPTCHA_TITLE") ?></b></div>
                                <input type="hidden" name="captcha_sid" value="<?= $arResult["CAPTCHA_CODE"] ?>"/>
                                <div class="form__item-title">
                                    <br>
                                    <img src="/bitrix/tools/captcha.php?captcha_sid=<?= $arResult["CAPTCHA_CODE"] ?>"
                                         width="250" height="60" alt="CAPTCHA"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="form__item">
                            <div class="form__item-block">
                                <div class="form__item-title"><?= GetMessage("REGISTER_CAPTCHA_PROMT") ?> <span
                                            class="starrequired">*</span></div>
                                <div>
                                    <input class="input" type="text" name="captcha_word" maxlength="50" value="" required/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?
                }
                /* !CAPTCHA */
                ?>

                <div class="col-lg-8 col-md-6">
                    <div class="form__item form__item--cols">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="form__item">
                        <button type="submit" name="register_submit_button" class="button button_red"
                                value="<?= GetMessage("AUTH_REGISTER") ?>"><?= GetMessage("AUTH_REGISTER") ?>
                        </button>
                    </div>
                </div>
                <div class="col-12">
                    <p><?=GetMessage("ARLIGHT_ARSTORE_NAJIMAA_KNOPKU_REGI")?><a href="<?= SITE_DIR ?>policy" target="_blank"><?=GetMessage("ARLIGHT_ARSTORE_POLITIKOY_OBRABOTKI")?></a>.
                        <br><?=GetMessage("ARLIGHT_ARSTORE_PAROLQ_DOLJEN_BYTQ_N")?></p>
                    <p><span class="required">*</span> <?= GetMessage("AUTH_REQ") ?></p>
                </div>

            </div>
        </form>
    <? endif ?>
</div>