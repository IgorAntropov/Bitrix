<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
global $APPLICATION;
$APPLICATION->SetTitle("Настройки каталога");

use Bitrix\Main\Context;

$startPercents = COption::GetOptionString("MAIN", "PRICES_INCREASE", 0);
if ($startPercents < 0 || $startPercents > MAX_PRICE_INCREASE_PERCENTS) $startPercents = 0;

//для региона
$region = Context::getCurrent()->getRequest()->get("region");
if(check_bitrix_sessid()){
    if ($region == 'BY') {
        COption::SetOptionString("main", "belarus", true);
        COption::SetOptionString("main", "kazakhstan", false);
    } elseif ($region == 'KZ') {
        COption::SetOptionString("main", "kazakhstan", true);
        COption::SetOptionString("main", "belarus", false);
    } elseif ($region && !empty($region)) {
        COption::SetOptionString("main", "belarus", false);
        COption::SetOptionString("main", "kazakhstan", false);
    }
}

//валюта
$currency = Context::getCurrent()->getRequest()->get("currency");
if ($currency && !empty($currency))
    COption::SetOptionString("main", "currency", $currency);

//курс валют
$exchangeRates = COption::GetOptionString("main", "EXCHANGE_RATE", 1);

//НДС
$hidden_nds_text = Context::getCurrent()->getRequest()->get("hidden_nds_text");
if (isset($hidden_nds_text) && $hidden_nds_text == '1')
    COption::SetOptionString("main", "hidden_nds_text", true);
elseif (isset($hidden_nds_text) && $hidden_nds_text == '0') {
    COption::SetOptionString("main", "hidden_nds_text", false);
}
$hidden_nds_text_cur = COption::GetOptionString("main", "hidden_nds_text", false);

//для статустов наличия заказов
$availableCurrent = [];
if (file_exists($_SERVER['DOCUMENT_ROOT'] . SITE_DIR . "assets/json/availableStatus.json"))
    $availableCurrent = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . SITE_DIR . "assets/json/availableStatus.json"), true);
$availableGet = Context::getCurrent()->getRequest()->get("available");
if (!empty($availableGet)) {
    file_put_contents($_SERVER['DOCUMENT_ROOT'] . SITE_DIR . "assets/json/availableStatus.json", json_encode($availableGet, JSON_UNESCAPED_UNICODE));
    $availableCurrent = $availableGet;
}

//для доступа
if ($_GET['access_assets_email'] && $_GET['access_assets_passw']) {
    $access_data = array(
        'login' => $_GET['access_assets_email'],
        'password' => $_GET['access_assets_passw'],
    );
    COption::SetOptionString('arlight.assets', "access", serialize($access_data));
}
if ($arFormField = COption::GetOptionString('arlight.assets', "access")) {
    $arFormField = unserialize($arFormField);
}

//для хитов
if (check_bitrix_sessid()) {
    $hit = Context::getCurrent()->getRequest()->get("hit_art");
    $hitArTemp = explode(',', $hit);
    foreach ($hitArTemp as $hit) {
        $hitAr[] = trim($hit);
    }
    file_put_contents($_SERVER['DOCUMENT_ROOT'] . SITE_DIR . "assets/json/hitProducts.json", json_encode($hitAr, JSON_UNESCAPED_UNICODE));
}
$hitArCur = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . SITE_DIR . "assets/json/hitProducts.json"), true);
$hitArCurStr = implode(',', $hitArCur);
?>
    <div id="admin" class="personal">
        <? require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR . "admin/top_menu.php"); ?>
        <div class="personal__block active_el">
            <div class="row">
                <div class="col-md-2">
                    <? require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR . "admin/settings/left_menu.php"); ?>
                </div>
                <div class="col-md-10">
                    <h2>Артикулы товаров для блока Хиты товаров на главной странице</h2>
                    <div class="row">
                        <div class="col-md-12">
                            <form action="<?= POST_FORM_ACTION_URI ?>" class="" method="GET"
                                  enctype="multipart/form-data">
                                <?= bitrix_sessid_post() ?>
                                <div class="form-group">
                                    <label for="hit_art">Артикулы товаров (в строку, через запятую)</label>
                                    <input type="text" class="form-control" id="hit_art"
                                           name="hit_art" placeholder="Артикулы..."
                                           value="<?= $hitArCurStr; ?>">
                                </div>
                                <button type="submit" class="btn btn-danger">Сохранить</button>
                            </form>
                        </div>
                    </div>
                    <br>
                    <hr>
                    <br>

                    <h2>Доступ для скачивания каталога assets.transistor</h2>
                    <div class="row">
                        <div class="col-md-4">
                            <form action="<?= POST_FORM_ACTION_URI ?>" class="" method="GET"
                                  enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="access_assets_email">Email (Логин)</label>
                                    <input type="text" class="form-control" id="access_assets_email"
                                           name="access_assets_email" placeholder="Email" required
                                           value="<?= ($arFormField['login'] != '') ? $arFormField['login'] : ''; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="access_assets_passw">Пароль</label>
                                    <input type="text" class="form-control" id="access_assets_passw"
                                           name="access_assets_passw" placeholder="Password" required
                                           value="<?= ($arFormField['password'] != '' ? $arFormField['password'] : ''); ?>">
                                </div>
                                <button type="submit" class="btn btn-danger">Сохранить</button>
                            </form>
                        </div>
                    </div>
                    <br>
                    <hr>
                    <br>
                    <div>
                        <h2>Надбавка к цене MRC</h2>
                        <br>
                        <p>Для увеличения всех рекомендованных цен товаров в каталоге на сайте необходимо внести
                            значение процентов, на которые увеличится цена, в нижеследующее поле. При значении "0"
                            увеличение цен производиться не будет, цены будут соответствовать стандартным MRC ценам.
                            Максимальное увеличение - 20%. После нажать "Пересчитать цены" и дождаться сообщения об
                            успешном изменении.</p>
                        <input type="number" required="" class="update_prices_percent_input"
                               data-start-value="<?= $startPercents ?>" min="0" max="<?= MAX_PRICE_INCREASE_PERCENTS ?>"
                               data-max-value="<?= MAX_PRICE_INCREASE_PERCENTS ?>" value="<?= $startPercents ?>">
                        <div class="button button_block update_prices_percent_button">Пересчитать цены</div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <hr>
                    <h2 class="mt-3">Регион интернет-магазина</h2>
                    <div class="row">
                        <div class="col-md-4">
                            <form action="<?= POST_FORM_ACTION_URI ?>" class="" method="GET"
                                  enctype="multipart/form-data">
                                <?= bitrix_sessid_post() ?>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="selectRegion">Регион</label>
                                    </div>
                                    <select class="custom-select" id="selectRegion" name="region">
                                        <option value="RU"
                                            <?= ((!BELARUS && !KAZAKHSTAN) || $region == 'RU') ? 'selected' : '' ?>>
                                            Россия
                                        </option>
                                        <option value="BY"
                                            <?= (COption::GetOptionString("main", "belarus", false) || $region == 'BY') ? 'selected' : '' ?>>
                                            Беларусь
                                        </option>
                                        <option value="KZ"
                                            <?= (COption::GetOptionString("main", "kazakhstan", false) || $region == 'KZ') ? 'selected' : '' ?>>
                                            Казахстан
                                        </option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-danger">Сохранить</button>
                            </form>
                        </div>
                    </div>
                    <br>
                    <hr>
                    <h2 class="mt-3">Валюта каталога*</h2>
                    <div class="row">
                        <div class="col-md-4">
                            <form action="<?= POST_FORM_ACTION_URI ?>" class="" method="GET"
                                  enctype="multipart/form-data">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Валюта</span>
                                    </div>
                                    <input type="text" name="currency" class="form-control" placeholder="Валюта"
                                           aria-label="Валюта" aria-describedby="basic-addon1" maxlength="4" required
                                           value="<?= ($currency) ? $currency : CURRENCY ?>">
                                </div>
                                <button type="submit" class="btn btn-danger">Сохранить</button>
                            </form>
                        </div>
                        <div class="col-12">
                            <br>
                            * - Валюта для корзины настраивается в <a
                                    href="/bitrix/admin/settings.php?lang=ru&mid=itertech.cart&mid_menu=1"
                                    target="_blank">настройках модуля Корзина</a>.
                        </div>
                    </div>

                    <? if (COption::GetOptionString("main", "kazakhstan", false)): ?>
                        <br>
                        <br>
                        <hr>
                        <h2 class="mt-3">Курс валют</h2>
                        <div class="row">
                            <div class="col-md-4">
                                <form action="<?= POST_FORM_ACTION_URI ?>" id="change_price" method="GET"
                                      enctype="multipart/form-data">
                                    <?= bitrix_sessid_post() ?>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="exchangeRouble">Российский рубль &nbsp;&nbsp;&nbsp;</label>
                                        </div>
                                        <input id="exchangeRouble" type="text" name="" class="form-control"
                                               placeholder="" value="1" readonly>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="exchangeOther">Казахстанский
                                                тенге</label>
                                        </div>
                                        <input id="exchangeOther" type="text" name="exchange" class="form-control"
                                               placeholder="" value="<?= $exchangeRates ?>">
                                    </div>
                                    <button type="submit" class="btn btn-danger">Сохранить и Пересчитать цены</button>
                                </form>
                            </div>
                        </div>
                    <? endif; ?>
                    <br>
                    <hr>
                    <h2 class="mt-3">Статусы наличия товаров</h2>
                    <div class="row">
                        <div class="col-md-4">
                            <p>Заменить текст статуса товара в карточке</p>
                            <form action="<?= POST_FORM_ACTION_URI ?>" class="" method="GET"
                                  enctype="multipart/form-data">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">в наличии</span>
                                    </div>
                                    <input type="text" name="available[available]" class="form-control"
                                           placeholder="новый текст"
                                           value="<?= $availableCurrent['available'] ?>">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">ожидается</span>
                                    </div>
                                    <input type="text" name="available[wait]" class="form-control"
                                           placeholder="новый текст" value="<?= $availableCurrent['wait'] ?>">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">под заказ</span>
                                    </div>
                                    <input type="text" name="available[notavailable]" class="form-control"
                                           placeholder="новый текст" value="<?= $availableCurrent['notavailable'] ?>">
                                </div>
                                <button type="submit" class="btn btn-danger">Сохранить</button>
                            </form>
                        </div>
                        <div class="col-12">
                            <br>
                            * - Валюта для корзины настраивается в <a
                                    href="/bitrix/admin/settings.php?lang=ru&mid=itertech.cart&mid_menu=1"
                                    target="_blank">настройках модуля Корзина</a>.
                        </div>
                    </div>
                    <br>
                    <hr>
                    <h2 class="mt-3">Информационный текст о НДС в корзине</h2>
                    <div class="row">
                        <div class="col-md-4">
                            <form action="<?= POST_FORM_ACTION_URI ?>" class="" method="GET"
                                  enctype="multipart/form-data">
                                <div class="form-check mb-3">
                                    <input class="form-check-input"
                                           type="hidden"
                                           id="hidden_nds_text"
                                           name="hidden_nds_text"
                                           value="0"
                                    >
                                    <input class="form-check-input"
                                           type="checkbox"
                                           id="hidden_nds_text"
                                           name="hidden_nds_text"
                                           value="1"
                                        <?= ($hidden_nds_text_cur) ? 'checked' : '' ?>
                                    >
                                    <label class="form-check-label" for="hidden_nds_text">
                                        Скрыть текст
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-danger">Сохранить</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>