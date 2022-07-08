<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<?ShowMessage($arParams["~AUTH_RESULT"]);?>

<? if ($APPLICATION->arAuthResult): ?>
    <? if ($APPLICATION->arAuthResult && $APPLICATION->arAuthResult['TYPE'] == 'OK' && !($APPLICATION->arAuthResult['ERROR_TYPE'])): ?>
        <p class="forgot-answer"><?= $APPLICATION->arAuthResult['MESSAGE'] ?></p>
        <script>
            $(function () {
                $('.header__sign a[data-name="auth-form"]').click();
                $('span[data-name="forgot-form"]').click();
            });
        </script>
    <? endif; ?>

    <? if ($APPLICATION->arAuthResult && $APPLICATION->arAuthResult['TYPE'] == 'ERROR' && !($APPLICATION->arAuthResult['ERROR_TYPE'])): ?>
        <p class="forgot-answer"><?= $APPLICATION->arAuthResult['MESSAGE'] ?></p>
        <script>
            $(function () {
                $('.header__sign a[data-name="auth-form"]').click();
                $('span[data-name="forgot-form"]').click();
            });
        </script>
    <? endif; ?>
<? endif; ?>
<form name="bform" method="post" target="_top" action="<?= $arResult["AUTH_URL"] ?>">
    <?
    if (strlen($arResult["BACKURL"]) > 0) {
        ?>
        <input type="hidden" name="backurl" value="<?= $arResult["BACKURL"] ?>"/>
        <?
    }
    ?>
    <input type="hidden" name="AUTH_FORM" value="Y">
    <input type="hidden" name="TYPE" value="SEND_PWD">
    <br>
    <p class="popup__forgot-text">
        <?= GetMessage("AUTH_FORGOT_PASSWORD_1") ?>
    </p>

    <div class="data-table bx-forgotpass-table">
        <div class="row align-items-center">
            <div class="col-md-3 form__item ">
                <div class="form__item-title"><?= GetMessage("AUTH_LOGIN") ?></div>
                <div>
                    <input class="input " type="text" name="USER_LOGIN" maxlength="50"
                           value="<?= $arResult["LAST_LOGIN"] ?>"/>
                </div>
            </div>
            <div class="col-md-1" style="text-align: center;"><?= GetMessage("AUTH_OR") ?></div>
            <div class="col-md-3 form__item ">
                <div class="form__item-title"><?= GetMessage("AUTH_EMAIL") ?></div>
                <div>
                    <input class="input " type="text" name="USER_EMAIL" maxlength="255"/>
                </div>
            </div>
        </div>

        <? if ($arResult["USE_CAPTCHA"]): ?>
            <div>

                <div>
                    <input type="hidden" name="captcha_sid" value="<?= $arResult["CAPTCHA_CODE"] ?>"/>
                    <img src="/bitrix/tools/captcha.php?captcha_sid=<?= $arResult["CAPTCHA_CODE"] ?>" width="180"
                         height="40" alt="CAPTCHA"/>
                </div>
            </div>
            <div>
                <div><? echo GetMessage("system_auth_captcha") ?></div>
                <div><input type="text" name="captcha_word" maxlength="50" value=""/></div>
            </div>
        <? endif ?>
        <div>
            <div>
                <input type="submit" class="button button_red" name="send_account_info"
                       value="<?= GetMessage("AUTH_SEND") ?>"/>
            </div>
        </div>
    </div>
</form>
<script>
    document.bform.USER_LOGIN.focus();
</script>



