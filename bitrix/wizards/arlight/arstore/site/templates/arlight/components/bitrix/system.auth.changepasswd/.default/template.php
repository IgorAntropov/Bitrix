<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<div class="bx-auth change-password">
    <?
    ShowMessage($arParams["~AUTH_RESULT"]);
    ?>
    <? if ($arParams['AUTH_RESULT']['TYPE'] == 'OK'): ?>
        <a href="#popup-auth" data-fancybox="" class="button" data-name="auth-form" style="width: 150px;"><?=GetMessage("ARLIGHT_ARSTORE_VHOD")?></a>
    <br>
    <? else: ?>
        <form method="post" action="<?= $arResult["AUTH_FORM"] ?>" name="bform">
            <? if (strlen($arResult["BACKURL"]) > 0): ?>
                <input type="hidden" name="backurl" value="<?= $arResult["BACKURL"] ?>"/>
            <? endif ?>
            <input type="hidden" name="AUTH_FORM" value="Y">
            <input type="hidden" name="TYPE" value="CHANGE_PWD">
            <div class="data-table bx-changepass-table">
                <div class="title title-page">
                    <div class="title__text"><?= GetMessage("AUTH_CHANGE_PASSWORD") ?></div>
                </div>
                <div class="form__item">
                    <div><span class="starrequired">*</span><?= GetMessage("AUTH_LOGIN") ?></div>
                    <div><input class="input " type="text" name="USER_LOGIN" maxlength="50"
                                value="<?= $arResult["LAST_LOGIN"] ?>"/></div>
                </div>
                <div class="form__item">
                    <div><span class="starrequired">*</span><?= GetMessage("AUTH_CHECKWORD") ?></div>
                    <div><input type="text" name="USER_CHECKWORD" maxlength="50"
                                value="<?= $arResult["USER_CHECKWORD"] ?>"
                                class="input"/></div>
                </div>
                <div class="form__item">
                    <div><span class="starrequired">*</span><?= GetMessage("AUTH_NEW_PASSWORD_REQ") ?></div>
                    <div><input type="password" name="USER_PASSWORD" maxlength="50"
                                value="<?= $arResult["USER_PASSWORD"] ?>" class="input" autocomplete="off"/>
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
                    </div>
                </div>
                <div class="form__item">
                    <div><span class="starrequired">*</span><?= GetMessage("AUTH_NEW_PASSWORD_CONFIRM") ?></div>
                    <div><input type="password" name="USER_CONFIRM_PASSWORD" maxlength="50"
                                value="<?= $arResult["USER_CONFIRM_PASSWORD"] ?>" class="input" autocomplete="off"/>
                    </div>
                </div>
                <? if ($arResult["USE_CAPTCHA"]): ?>
                    <div>

                        <div>
                            <input type="hidden" name="captcha_sid" value="<?= $arResult["CAPTCHA_CODE"] ?>"/>
                            <img src="/bitrix/tools/captcha.php?captcha_sid=<?= $arResult["CAPTCHA_CODE"] ?>"
                                 width="180"
                                 height="40" alt="CAPTCHA"/>
                        </div>
                    </div>
                    <div>
                        <div><span class="starrequired">*</span><? echo GetMessage("system_auth_captcha") ?></div>
                        <div><input type="text" name="captcha_word" maxlength="50" value=""/></div>
                    </div>
                <? endif ?>
                <div>
                    <br>
                    <div>
                        <input type="submit" name="change_pwd" class="button button_red" value="<?= GetMessage("AUTH_CHANGE") ?>"/>
                    </div>
                    <br>
                </div>
            </div>

            <p><? echo $arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"]; ?></p>
            <p><span class="starrequired">*</span><?= GetMessage("AUTH_REQ") ?></p>
            <!--<p>-->
            <!--<a href="--><? //=$arResult["AUTH_AUTH_URL"]?><!--"><b>--><? //=GetMessage("AUTH_AUTH")?><!--</b></a>-->
            <!--</p>-->

        </form>
        <script >
            document.bform.USER_LOGIN.focus();
        </script>
    <? endif; ?>
</div>