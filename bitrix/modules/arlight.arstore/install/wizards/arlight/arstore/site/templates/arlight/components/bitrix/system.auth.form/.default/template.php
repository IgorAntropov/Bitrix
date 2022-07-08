<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

CJSCore::Init();
$yaMetrica = '';
global $goalCurrent;
if ($goalCurrent['auth-user']['name'] && $goalCurrent['auth-user']['id'])
    $yaMetrica = 'onsubmit="ym(' . $goalCurrent['auth-user']['id'] . ',\'reachGoal\',\'' . $goalCurrent['auth-user']['name'] . '\'); return true;"';
?>

<div class="bx-system-auth-form">
    <?
    if(isset($_POST['Login'])) {
        ShowMessage($arParams["~AUTH_RESULT"]);
        ShowMessage($arResult['ERROR_MESSAGE']);
        ?>
        <script>
            $(function(){
                $('.header__sign a[data-name="auth-form"]').click();
            });
        </script>
        <?
    }
    ?>
    <? if ($arResult["FORM_TYPE"] == "login"): ?>
        <form name="system_auth_form<?= $arResult["RND"] ?>" method="post" target="_top"
              action="<?= $arResult["AUTH_URL"] ?>" class="form__block" <?= $yaMetrica ?>>
            <? if ($arResult["BACKURL"] <> ''): ?>
                <input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>"/>
            <?endif ?>
            <? foreach ($arResult["POST"] as $key => $value): ?>
                <input type="hidden" name="<?= $key ?>" value="<?= $value ?>"/>
            <?endforeach ?>
            <input type="hidden" name="AUTH_FORM" value="Y"/>
            <input type="hidden" name="TYPE" value="AUTH"/>
            <div class="row">
                <div class="col-md-4 offset-md-2">
                    <div class="form__item  ">
                        <div class="form__item-block">
                            <div class="form__item-title"><?= GetMessage("AUTH_LOGIN") ?></div>
                            <input class="input " type="text" name="USER_LOGIN" maxlength="50" value="" size="17"/>
                            <script>
                                BX.ready(function () {
                                    var loginCookie = BX.getCookie("<?=CUtil::JSEscape($arResult["~LOGIN_COOKIE_NAME"])?>");
                                    if (loginCookie) {
                                        var form = document.forms["system_auth_form<?=$arResult["RND"]?>"];
                                        var loginInput = form.elements["USER_LOGIN"];
                                        loginInput.value = loginCookie;
                                    }
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 ">
                    <div class="form__item  ">
                        <div class="form__item-block">
                            <div class="form__item-title"><?= GetMessage("AUTH_PASSWORD") ?></div>
                            <input class="input " type="password" name="USER_PASSWORD" maxlength="50" size="17" autocomplete="off"/>
                            <? if ($arResult["SECURE_AUTH"]): ?>
                                <div class="bx-auth-secure" id="bx_auth_secure<?= $arResult["RND"] ?>"
                                     title="<? echo GetMessage("AUTH_SECURE_NOTE") ?>" style="display:none">
                                    <div class="bx-auth-secure-icon"></div>
                                </div>
                                <noscript>
                                    <div class="bx-auth-secure" title="<? echo GetMessage("AUTH_NONSECURE_NOTE") ?>">
                                        <div class="bx-auth-secure-icon bx-auth-secure-unlock"></div>
                                    </div>
                                </noscript>
                                <script >
                                    document.getElementById('bx_auth_secure<?=$arResult["RND"]?>').style.display = 'inline-block';
                                </script>
                            <? endif ?>
                        </div>

                    </div>
                </div>
                <? if ($arResult["STORE_PASSWORD"] == "Y"): ?>
                    <div class="col-12 tac">
                        <div class="form__item">
                            <div>
                                <label class="input input-checkbox" for="USER_REMEMBER_frm">
                                    <input type="checkbox" class="input__checkbox" id="USER_REMEMBER_frm" name="USER_REMEMBER" value="Y" >
                                    <span class="input__text"
                                          title="<?= GetMessage("AUTH_REMEMBER_ME") ?>"><? echo GetMessage("AUTH_REMEMBER_SHORT") ?></span>
                                </label>
                            </div>
                        </div>
                    </div>
                <?endif ?>
                <? if ($arResult["CAPTCHA_CODE"]): ?>
                    <div>
                        <div>
                            <? echo GetMessage("AUTH_CAPTCHA_PROMT") ?>:<br/>
                            <input type="hidden" name="captcha_sid" value="<? echo $arResult["CAPTCHA_CODE"] ?>"/>
                            <img src="/bitrix/tools/captcha.php?captcha_sid=<? echo $arResult["CAPTCHA_CODE"] ?>"
                                 width="180" height="40" alt="CAPTCHA"/><br/><br/>
                            <input type="text" name="captcha_word" maxlength="50" value=""/></div>
                    </div>
                <?endif ?>
                <div class="col-12 tac">
                    <div class="form__item">
                        <div>
                            <button class="button button_red" type="submit" name="Login"><?= GetMessage("AUTH_LOGIN_BUTTON") ?></button>
                        </div>
                    </div>
                </div>

                <div class="col-12 tac">
                    <div class="form__item">
                        <div>
                            <div class=" popup__button popup__button-link">
                                <span class="popup__title-name" data-name="forgot-form"><?= GetMessage("AUTH_FORGOT_PASSWORD_2") ?></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <div>

                    </div>
                </div>
                <? if ($arResult["AUTH_SERVICES"]): ?>
                    <div>
                        <div>
                            <div class="bx-auth-lbl"><?= GetMessage("socserv_as_user_form") ?></div>
                            <?
                            $APPLICATION->IncludeComponent("bitrix:socserv.auth.form", "icons",
                                array(
                                    "AUTH_SERVICES" => $arResult["AUTH_SERVICES"],
                                    "SUFFIX" => "form",
                                ),
                                $component,
                                array("HIDE_ICONS" => "Y")
                            );
                            ?>
                        </div>
                    </div>
                <?endif ?>
            </div>
        </form>

        <? if ($arResult["AUTH_SERVICES"]): ?>
            <?
            $APPLICATION->IncludeComponent("bitrix:socserv.auth.form", "",
                array(
                    "AUTH_SERVICES" => $arResult["AUTH_SERVICES"],
                    "AUTH_URL" => $arResult["AUTH_URL"],
                    "POST" => $arResult["POST"],
                    "POPUP" => "Y",
                    "SUFFIX" => "form",
                ),
                $component,
                array("HIDE_ICONS" => "Y")
            );
            ?>
        <?endif ?>

        <?
    elseif ($arResult["FORM_TYPE"] == "otp"):
        ?>

        <form name="system_auth_form<?= $arResult["RND"] ?>" method="post" target="_top"
              action="<?= $arResult["AUTH_URL"] ?>">
            <? if ($arResult["BACKURL"] <> ''):?>
                <input type="hidden" name="backurl" value="<?= $arResult["BACKURL"] ?>"/>
            <?endif ?>
            <input type="hidden" name="AUTH_FORM" value="Y"/>
            <input type="hidden" name="TYPE" value="OTP"/>
            <div>
                <div>
                    <div>
                        <? echo GetMessage("auth_form_comp_otp") ?><br/>
                        <input type="text" name="USER_OTP" maxlength="50" value="" size="17" autocomplete="off"/></div>
                </div>
                <? if ($arResult["CAPTCHA_CODE"]):?>
                    <div>
                        <div>
                            <? echo GetMessage("AUTH_CAPTCHA_PROMT") ?>:<br/>
                            <input type="hidden" name="captcha_sid" value="<? echo $arResult["CAPTCHA_CODE"] ?>"/>
                            <img src="/bitrix/tools/captcha.php?captcha_sid=<? echo $arResult["CAPTCHA_CODE"] ?>"
                                 width="180" height="40" alt="CAPTCHA"/><br/><br/>
                            <input type="text" name="captcha_word" maxlength="50" value=""/></div>
                    </div>
                <?endif ?>
                <? if ($arResult["REMEMBER_OTP"] == "Y"):?>
                    <div>
                        <div><input type="checkbox" id="OTP_REMEMBER_frm" name="OTP_REMEMBER" value="Y"/></div>
                        <div><label for="OTP_REMEMBER_frm"
                                    title="<? echo GetMessage("auth_form_comp_otp_remember_title") ?>"><? echo GetMessage("auth_form_comp_otp_remember") ?></label>
                        </div>
                    </div>
                <?endif ?>
                <div>
                    <div><input type="submit" name="Login" value="<?= GetMessage("AUTH_LOGIN_BUTTON") ?>"/></div>
                </div>
                <div>
                    <div>
                        <noindex><a href="<?= $arResult["AUTH_LOGIN_URL"] ?>"
                                    rel="nofollow"><? echo GetMessage("auth_form_comp_auth") ?></a></noindex>
                        <br/></div>
                </div>
            </div>
        </form>

        <?
    else:
        ?>

        <form action="<?= $arResult["AUTH_URL"] ?>">
            <div>
                <div>
                    <div>
                        <?= $arResult["USER_NAME"] ?><br/>
                        [<?= $arResult["USER_LOGIN"] ?>]<br/>
                        <a href="<?= $arResult["PROFILE_URL"] ?>"
                           title="<?= GetMessage("AUTH_PROFILE") ?>"><?= GetMessage("AUTH_PROFILE") ?></a><br/>
                    </div>
                </div>
                <div>
                    <div>
                        <? foreach ($arResult["GET"] as $key => $value):?>
                            <input type="hidden" name="<?= $key ?>" value="<?= $value ?>"/>
                        <? endforeach ?>
                        <input type="hidden" name="logout" value="yes"/>
                        <input type="submit" name="logout_butt" value="<?= GetMessage("AUTH_LOGOUT_BUTTON") ?>"/>
                    </div>
                </div>
            </div>
        </form>
    <? endif ?>
</div>
