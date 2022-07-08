<?
// Проверка на доступ (всегда стоит первой)
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR . "admin/access.php");
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Основные настройки");
global $USER;
?>

    <div id="admin" class="personal mainsetting">
        <? require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR . "admin/top_menu.php"); ?>
        <div class="personal__block active_el">
            <div class="row">
                <div class="col-md-2">
                    <? require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR . "admin/settings/left_menu.php"); ?>
                </div>
                <div class="col-md-10">
                    <div class=" personal__order-block-item">
                        <div id="admin" class="personal">
                            <div class="personal__block active_el">
                                <div class="col-md-12">
                                    <form action="javascript:void(0);" class="" id="send_main_setting"
                                          method="POST"
                                          enctype="multipart/form-data">
                                        <div class="row">
                                            <?php if ($USER->isAdmin()) {
                                                $enable_yk = COption::GetOptionString("setting_su", "enable_yk", 'N');
                                                $enable_yd = COption::GetOptionString("setting_su", "enable_yd", 'N');
                                                ?>
                                                <div class="col-12">
                                                    <h2>Настройки разрешений сайта (только для суперадмина)</h2>
                                                    <br/>
                                                </div>
                                                <div class="col-6 col-md-3">
                                                    <div class="form-group">
                                                        <div>
                                                            <input type="checkbox" class="input__radio"
                                                                   name="setting_su[enable_yk]" id="setting_yk"
                                                                <?= ($enable_yk === 'Y') ? 'checked' : ''; ?> value="N">
                                                            <label for="setting_yk">Разрешить Яндекс.Кассу</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-3" hidden>
                                                    <div class="form-group">
                                                        <div>
                                                            <input type="checkbox" class="input__radio"
                                                                   name="setting_su[enable_yd]" id="setting_yd"
                                                                <?= ($enable_yd === 'Y') ? 'checked' : ''; ?> value="N">
                                                            <label for="setting_yd">Разрешить Яндекс.Доставку</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <br/>
                                                </div>
                                            <?php } ?>

                                            <div class="col-12">
                                                <h2>Отображение остатков наличия товара</h2><br>
                                                <div class="form-group">
                                                    <div>
                                                        <input type="checkbox" class="input__radio"
                                                               name="setting_show_stock" id="setting_show_stock"
                                                            <?= (SHOW_STOCK == true) ? 'checked' : ''; ?> value="N">
                                                        <label for="setting_show_stock">Показывать остатки
                                                            зарегистрированным
                                                            клиентам</label>
                                                    </div>
                                                </div>
                                                <br>
                                                <br>
                                            </div>
                                            <div class="col-12">
                                                <h2>Данные интернет-магазина</h2>
                                                <br>
                                                <div class="form-group">
                                                    <p><label for="phone">E-mail администратора</label></p>
                                                    <input
                                                            type="email"
                                                            class="form-control"
                                                            id="email-admin"
                                                            name="email-admin"
                                                            placeholder="E-mail администратора"
                                                            value="<?= COption::GetOptionString("main", "email_from"); ?>"
                                                            data-default="<?= COption::GetOptionString("main", "email_from"); ?>"
                                                            data-required="true"
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <p><label for="phone">Номер телефона</label></p>
                                                    <? $fileTextPhone = file_get_contents($_SERVER["DOCUMENT_ROOT"] . SITE_DIR . '/include/header_phone.php'); ?>
                                                    <input
                                                            type="tel"
                                                            class="form-control"
                                                            id="phone"
                                                            name="phone"
                                                            placeholder="Номер телефона"
                                                            value="<?= $fileTextPhone ?>"
                                                            data-default="<?= $fileTextPhone ?>"
                                                            data-required="true"
                                                    >
                                                    <small>Будет выводиться в шапке сайта</small>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <p><label for="email">Контактный e-mail магазина</label></p>
                                                    <? $fileTextMail = file_get_contents($_SERVER["DOCUMENT_ROOT"] . SITE_DIR . '/include/header_mail.php'); ?>
                                                    <input
                                                            type="email"
                                                            class="form-control"
                                                            id="email" name="email"
                                                            placeholder="E-mail"
                                                            value="<?= $fileTextMail ?>"
                                                            data-default="<?= $fileTextMail ?>"
                                                            data-required="true"
                                                    >
                                                    <small>Будет выводиться в шапке сайта</small>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <p><label for="entity_name">Юридическое название компании</label>
                                                    </p>
                                                    <? $fileTextMail = file_get_contents($_SERVER["DOCUMENT_ROOT"] . SITE_DIR . '/include/header_mail.php'); ?>
                                                    <? $entity_name = COption::GetOptionString("header_action", "entity_name", ''); ?>
                                                    <input
                                                            type="text"
                                                            class="form-control"
                                                            id="entity_name" name="entity_name"
                                                            placeholder="Название"
                                                            value="<?= htmlspecialchars($entity_name) ?>"
                                                            data-default="<?= htmlspecialchars($entity_name) ?>"
                                                            data-required="true"
                                                    >
                                                    <small>Название в формате - ООО "Название Компании". Будет
                                                        использовано в политике обработки персональных данных</small>
                                                </div>
                                            </div>
                                            <div class="col-12"><h4>Ссылки на соцсети</h4></div>
                                            <?
                                            $SOCIAL_NETWORK = PrepareLinkSocNetwork();
                                            $social_in_header = COption::GetOptionString("header_action", "social_in_header", 'N');
                                            ?>
                                            <div class="col-md-12">
                                                <div class="form-group shop-city">
                                                    <label><input type="checkbox" value="<?= $social_in_header ?>"
                                                            <?= ($social_in_header == 'Y') ? ' checked' : '' ?>
                                                                  name="social_in_header" data-required="false">
                                                        Выводить ссылки на соцсети в шапке сайта</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <p><label for="social_fb">Facebook</label></p>
                                                    <input
                                                            type="url"
                                                            class="form-control"
                                                            id="social_fb" name="social_fb"
                                                            placeholder="Ссылка на facebook"
                                                            value="<?= $SOCIAL_NETWORK['social_fb'] ?>"
                                                            data-value="<?= $SOCIAL_NETWORK['social_fb'] ?>"
                                                            data-default="<?= ''; ?>"
                                                            data-required="false"
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <p><label for="social_vk">Vkontakte</label></p>
                                                    <input
                                                            type="url"
                                                            class="form-control"
                                                            id="social_vk" name="social_vk"
                                                            placeholder="Ссылка на vkontakte"
                                                            value="<?= $SOCIAL_NETWORK['social_vk']; ?>"
                                                            data-value="<?= $SOCIAL_NETWORK['social_vk']; ?>"
                                                            data-default="<?= '' ?>"
                                                            data-required="false"
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <p><label for="social_ig">Instagram</label></p>
                                                    <input
                                                            type="url"
                                                            class="form-control"
                                                            id="social_ig" name="social_ig"
                                                            placeholder="Ссылка на instagram"
                                                            value="<?= $SOCIAL_NETWORK['social_ig']; ?>"
                                                            data-value="<?= $SOCIAL_NETWORK['social_ig']; ?>"
                                                            data-default="<?= ''; ?>"
                                                            data-required="false"
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <p><label for="social_pr">Pinterest</label></p>
                                                    <input
                                                            type="url"
                                                            class="form-control"
                                                            id="social_pr" name="social_pr"
                                                            placeholder="Ссылка на pinterest"
                                                            value="<?= $SOCIAL_NETWORK['social_pr']; ?>"
                                                            data-value="<?= $SOCIAL_NETWORK['social_pr']; ?>"
                                                            data-default="<?= ''; ?>"
                                                            data-required="false"
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <p><label for="social_tw">Twitter</label></p>
                                                    <input
                                                            type="url"
                                                            class="form-control"
                                                            id="social_tw" name="social_tw"
                                                            placeholder="Ссылка на twitter"
                                                            value="<?= $SOCIAL_NETWORK['social_tw']; ?>"
                                                            data-value="<?= $SOCIAL_NETWORK['social_tw']; ?>"
                                                            data-default="<?= ''; ?>"
                                                            data-required="false"
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <p><label for="social_yt">Youtube</label></p>
                                                    <input
                                                            type="url"
                                                            class="form-control"
                                                            id="social_yt" name="social_yt"
                                                            placeholder="Ссылка на Youtube"
                                                            value="<?= $SOCIAL_NETWORK['social_yt']; ?>"
                                                            data-value="<?= $SOCIAL_NETWORK['social_yt']; ?>"
                                                            data-default="<?= ''; ?>"
                                                            data-required="false"
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <p><label for="social_ok">Одноклассники</label></p>
                                                    <input
                                                            type="url"
                                                            class="form-control"
                                                            id="social_ok" name="social_ok"
                                                            placeholder="Ссылка на Одноклассники"
                                                            value="<?= $SOCIAL_NETWORK['social_ok']; ?>"
                                                            data-value="<?= $SOCIAL_NETWORK['social_ok']; ?>"
                                                            data-default="<?= ''; ?>"
                                                            data-required="false"
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <p><label for="social_tg">Telegram-канал</label></p>
                                                    <input
                                                            type="url"
                                                            class="form-control"
                                                            id="social_tg" name="social_tg"
                                                            placeholder="Ссылка на Telegram"
                                                            value="<?= $SOCIAL_NETWORK['social_tg']; ?>"
                                                            data-value="<?= $SOCIAL_NETWORK['social_tg']; ?>"
                                                            data-default="<?= ''; ?>"
                                                            data-required="false"
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <p><label for="social_tiktok">TikTok</label></p>
                                                    <input
                                                            type="url"
                                                            class="form-control"
                                                            id="social_tiktok" name="social_tiktok"
                                                            placeholder="Ссылка на TikTok"
                                                            value="<?= $SOCIAL_NETWORK['social_tiktok']; ?>"
                                                            data-value="<?= $SOCIAL_NETWORK['social_tiktok']; ?>"
                                                            data-default="<?= ''; ?>"
                                                            data-required="false"
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <hr>
                                                <div class="form-group">
                                                    <p><label for="social_whatsapp">WhatsApp</label></p>
                                                    <input
                                                            type="url"
                                                            class="form-control"
                                                            id="social_whatsapp" name="social_whatsapp"
                                                            placeholder="Номер телефона* связанного с WhatsApp"
                                                            value="<?= $SOCIAL_NETWORK['social_whatsapp']; ?>"
                                                            data-value="<?= $SOCIAL_NETWORK['social_whatsapp']; ?>"
                                                            data-default="<?= ''; ?>"
                                                            data-required="false"
                                                    >
                                                    <br>
                                                    <small>* - Полный номер телефона в международном формате. Не используйте нули, скобки или дефисы при вводе номера телефона в международном формате.</small>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="">
                                                <h2>Контакты магазинов</h2>
                                                <?
                                                if (CModule::IncludeModule("iblock")) {
                                                    $arSelect = Array("ID", "NAME", "DETAIL_PICTURE", "PREVIEW_PICTURE", "PROPERTY_ADDRESS", "PROPERTY_PHONE", "PROPERTY_EMAIL", "PROPERTY_SCHEDULE", "PROPERTY_COORD", "PROPERTY_ADDRESS_CITY", "PROPERTY_IS_PICKUPPOINT", "SORT", "PROPERTY_PROPERTY");
                                                    $arFilter = Array("IBLOCK_ID" => CONTACTS_ID, "ACTIVE" => "Y");
                                                    $el_tree = array();

                                                    $res = CIBlockElement::GetList(Array("SORT" => "ASC"), $arFilter, false, false, $arSelect);
                                                    while ($ob_arr = $res->Fetch()) {
                                                        $el_tree[$ob_arr['ID']] = $ob_arr;
                                                    }

                                                    foreach ($el_tree as $el) { ?>
                                                        <?
                                                        //разберем дополнительные свойства
                                                        $additionalProperty = json_decode($el['PROPERTY_PROPERTY_VALUE'], true);
                                                        ?>
                                                        <div class="shop__wrap">
                                                            <div class="shop__name"><?= $el['NAME'] ?></div>
                                                            <form action="" id="shop-<?= $el['ID'] ?>"
                                                                  class="form_shop">
                                                                <div class="row settings__shop-list"
                                                                     data-change="false">
                                                                    <input type="text" hidden value="false"
                                                                           name="delete">
                                                                    <input type="text" hidden
                                                                           value="<?= $el['ID'] ?>"
                                                                           name="shop-id"
                                                                           data-default="">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group shop-city">
                                                                            <p>
                                                                                <input type="checkbox"
                                                                                       class=""
                                                                                       name="shop-pickup"
                                                                                       value="<?= $el['PROPERTY_IS_PICKUPPOINT_VALUE'] ?>"
                                                                                    <?= (($el['PROPERTY_IS_PICKUPPOINT_VALUE'] === "Y") ? 'checked' : '') ?>
                                                                                       data-default="<?= (($el['PROPERTY_IS_PICKUPPOINT_VALUE'] === "Y") ? 'Y' : 'N') ?>"
                                                                                       data-required="false">
                                                                                <label>Является пунктом
                                                                                    самовывоза</label></p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group shop-name">
                                                                            <p><label>Сортировка</label></p>
                                                                            <input type="text"
                                                                                   class="form-control form-control-sm"
                                                                                   placeholder="Сортировка"
                                                                                   name="shop-sort"
                                                                                   value="<?= $el['SORT'] ?>"
                                                                                   data-default="<?= $el['SORT'] ?>"
                                                                                   data-required="true">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12"></div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group shop-name">
                                                                            <p><label>Название</label></p>
                                                                            <input type="text"
                                                                                   class="form-control form-control-sm"
                                                                                   placeholder="Название"
                                                                                   name="shop-name"
                                                                                   value="<?= $el['NAME'] ?>"
                                                                                   data-default="<?= $el['NAME'] ?>"
                                                                                   data-required="true">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="form-group shop-city">
                                                                            <label><input type="checkbox"
                                                                                          value="<?= (($additionalProperty['show-name'] === "Y") ? 'Y' : 'N') ?>"
                                                                                    <?= (($additionalProperty['show-name'] === "Y") ? 'checked' : '') ?>
                                                                                          name="[shop-set][show-name]"
                                                                                          data-required="false">
                                                                                Выводить на страницу заголовок магазина</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                            <a href="<?= SITE_DIR ?>admin/settings/settings-main/edit-store/?edit=Y&CODE=<?=$el['ID']?>" target="_blank" class="btn btn-info">
                                                                                Добавить/изменить фото и видео
                                                                                магазина</a>
                                                                        <br>                                                                        <br>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group shop-city">
                                                                            <p><label>Город</label></p>
                                                                            <input type="text"
                                                                                   class="form-control form-control-sm"
                                                                                   placeholder="Город"
                                                                                   name="shop-city"
                                                                                   value="<?= $el['PROPERTY_ADDRESS_CITY_VALUE'] ?>"
                                                                                   data-default="<?= $el['PROPERTY_ADDRESS_CITY_VALUE'] ?>"
                                                                                   data-required="true">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group shop-address">
                                                                            <p><label>Адрес (без города)</label></p>
                                                                            <input type="text"
                                                                                   class="form-control form-control-sm"
                                                                                   placeholder="Адрес (без города)"
                                                                                   name="shop-address"
                                                                                   value="<?= $el['PROPERTY_ADDRESS_VALUE'] ?>"
                                                                                   data-default="<?= $el['PROPERTY_ADDRESS_VALUE'] ?>"
                                                                                   data-required="true">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <p><label>Станция метро</label></p>
                                                                            <input type="text"
                                                                                   class="form-control form-control-sm"
                                                                                   placeholder="Станция метро"
                                                                                   name="[shop-set][metro]"
                                                                                   value="<?= $additionalProperty['metro'] ?>"
                                                                                   data-default=""
                                                                                   data-required="false">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <p><label>Название торгового центра</label>
                                                                            </p>
                                                                            <input type="text"
                                                                                   class="form-control form-control-sm"
                                                                                   placeholder="Название торгового центра"
                                                                                   name="[shop-set][mall]"
                                                                                   value="<?= htmlspecialchars($additionalProperty['mall']) ?>"
                                                                                   data-default=""
                                                                                   data-required="false">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12"></div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group shop-phone">
                                                                            <p><label>Телефон</label></p>
                                                                            <?
                                                                            $phone = '';
                                                                            $phoneStr = $el['PROPERTY_PHONE_VALUE'];
                                                                            $isAr = stripos($phoneStr, ';');
                                                                            if ($isAr) {
                                                                                $phone = explode(';', $phoneStr);
                                                                                foreach ($phone as $phoneItem) {
                                                                                    if ($phoneItem != '') {
                                                                                        ?>
                                                                                        <input type="tel"
                                                                                               class="form-control form-control-sm"
                                                                                               placeholder="Телефон"
                                                                                               name="shop-phone-item"
                                                                                               value="<?= $phoneItem ?>"
                                                                                               data-default="<?= $phoneItem ?>"
                                                                                               data-required="false">
                                                                                        <?
                                                                                    }
                                                                                }
                                                                            } else {
                                                                                $phone = $phoneStr;
                                                                                ?>
                                                                                <input type="tel"
                                                                                       class="form-control form-control-sm"
                                                                                       placeholder="Телефон"
                                                                                       name="shop-phone-item"
                                                                                       value="<?= $phone ?>"
                                                                                       data-default="<?= $phone ?>"
                                                                                       data-required="false">
                                                                                <?
                                                                            }
                                                                            ?>

                                                                            <span class="add_input">Добавить еще один</span>
                                                                            <input type="text"
                                                                                   name="shop-phone"
                                                                                   value="<?= $el['PROPERTY_PHONE_VALUE'] ?>"
                                                                                   data-default="<?= $el['PROPERTY_PHONE_VALUE'] ?>"
                                                                                   data-required="false"
                                                                                   hidden
                                                                            >
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group shop-email">
                                                                            <p><label>E-mail</label></p>
                                                                            <?
                                                                            $email = '';
                                                                            $emailStr = $el['PROPERTY_EMAIL_VALUE'];
                                                                            $isAr = stripos($emailStr, ';');
                                                                            if ($isAr) {
                                                                                $email = explode(';', $emailStr);
                                                                                foreach ($email as $emailItem) {
                                                                                    if ($emailItem != '') {
                                                                                        ?>
                                                                                        <input type="email"
                                                                                               class="form-control form-control-sm"
                                                                                               placeholder="E-mail"
                                                                                               name="shop-email-item"
                                                                                               value="<?= $emailItem ?>"
                                                                                               data-default="<?= $emailItem ?>"
                                                                                               data-required="false">
                                                                                        <?
                                                                                    }
                                                                                }
                                                                            } else {
                                                                                $email = $emailStr;
                                                                                ?>
                                                                                <input type="email"
                                                                                       class="form-control form-control-sm"
                                                                                       placeholder="E-mail"
                                                                                       name="shop-email-item"
                                                                                       value="<?= $email ?>"
                                                                                       data-default="<?= $email ?>"
                                                                                       data-required="false">
                                                                                <?
                                                                            }
                                                                            ?>
                                                                            <span class="add_input">Добавить еще один</span>
                                                                            <input type="text"
                                                                                   name="shop-email"
                                                                                   value="<?= $el['PROPERTY_EMAIL_VALUE'] ?>"
                                                                                   data-default="<?= $el['PROPERTY_EMAIL_VALUE'] ?>"
                                                                                   data-required="false"
                                                                                   hidden>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group shop-time">
                                                                            <p><label>График работы</label></p>
                                                                            <?
                                                                            //строку графика работы в массив
                                                                            $shopTime = [];
                                                                            $shopTimeArr = explode(';', $el['PROPERTY_SCHEDULE_VALUE']);
                                                                            foreach ($shopTimeArr as $index => $shopTimeEl) {
                                                                                $shopTime[$index] = explode('&', $shopTimeEl);
                                                                            }
                                                                            ?>
                                                                            <div class="form-inline">
                                                                                <input type="text"
                                                                                       class="form-control form-control-sm col-md-5 mr-4"
                                                                                       placeholder="Дни"
                                                                                       name="shop-days-1"
                                                                                       value="<?= $shopTime[0][0]; ?>"
                                                                                       data-default="<?= $shopTime[0][0]; ?>"
                                                                                       data-required="false">
                                                                                <input type="text"
                                                                                       class="form-control form-control-sm col-md-6"
                                                                                       placeholder="Время работы"
                                                                                       name="shop-time-1"
                                                                                       value="<?= $shopTime[0][1]; ?>"
                                                                                       data-default="<?= $shopTime[0][1]; ?>"
                                                                                       data-required="false">
                                                                            </div>
                                                                            <div class="form-inline">
                                                                                <input type="text"
                                                                                       class="form-control form-control-sm col-md-5 mr-4"
                                                                                       placeholder="Дни"
                                                                                       name="shop-days-2"
                                                                                       value="<?= $shopTime[1][0]; ?>"
                                                                                       data-default="<?= $shopTime[1][0]; ?>"
                                                                                       data-required="false">
                                                                                <input type="text"
                                                                                       class="form-control form-control-sm col-md-6"
                                                                                       placeholder="Время работы"
                                                                                       name="shop-time-2"
                                                                                       value="<?= $shopTime[1][1]; ?>"
                                                                                       data-default="<?= $shopTime[1][1]; ?>"
                                                                                       data-required="false">
                                                                            </div>
                                                                            <div class="form-inline">
                                                                                <input type="text"
                                                                                       class="form-control form-control-sm col-md-5 mr-4"
                                                                                       placeholder="Дни"
                                                                                       name="shop-days-3"
                                                                                       value="<?= $shopTime[2][0]; ?>"
                                                                                       data-default="<?= $shopTime[2][0]; ?>"
                                                                                       data-required="false">
                                                                                <input type="text"
                                                                                       class="form-control form-control-sm col-md-6"
                                                                                       placeholder="Время работы"
                                                                                       name="shop-time-3"
                                                                                       value="<?= $shopTime[2][1]; ?>"
                                                                                       data-default="<?= $shopTime[2][1]; ?>"
                                                                                       data-required="false">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group shop-coord">
                                                                            <p><label>Координаты (через запятую без
                                                                                    пробела)</label></p>
                                                                            <input type="text"
                                                                                   class="form-control form-control-sm"
                                                                                   placeholder="Координаты"
                                                                                   name="shop-geo"
                                                                                   value="<?= $el['PROPERTY_COORD_VALUE'] ?>"
                                                                                   data-default="<?= $el['PROPERTY_COORD_VALUE'] ?>"
                                                                                   data-required="true">
                                                                            <a href="#map_shop_popup" data-fancybox=""
                                                                               class="button shop-checkpoint">...</a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <h5 style="text-decoration: underline">
                                                                            Дополнительная информация о магазине</h5>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <p><label>Информация о доставке</label></p>
                                                                            <input type="text"
                                                                                   class="form-control form-control-sm"
                                                                                   placeholder="Информация о доставке"
                                                                                   name="[shop-set][delivery]"
                                                                                   value="<?= $additionalProperty['delivery'] ?>"
                                                                                   data-default=""
                                                                                   data-required="false">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <p><label>Способы оплаты</label></p>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                       type="checkbox"
                                                                                    <?= (($additionalProperty['pay']['cash']['cash'] === "Y") ? 'checked' : '') ?>
                                                                                       name="[shop-set][pay][cash][cash]">
                                                                                <label class="form-check-label">
                                                                                    Наличные
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                       type="checkbox"
                                                                                    <?= (($additionalProperty['pay']['cash']['req'] === "Y") ? 'checked' : '') ?>
                                                                                       name="[shop-set][pay][cash][req]">
                                                                                <label class="form-check-label">
                                                                                    По реквизитам
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                       type="checkbox"
                                                                                    <?= (($additionalProperty['pay']['card']['online'] === "Y") ? 'checked' : '') ?>
                                                                                       name="[shop-set][pay][card][online]">
                                                                                <label class="form-check-label">
                                                                                    Картой онлайн
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                       type="checkbox"
                                                                                    <?= (($additionalProperty['pay']['card']['shop'] === "Y") ? 'checked' : '') ?>
                                                                                       name="[shop-set][pay][card][shop]">
                                                                                <label class="form-check-label">
                                                                                    Картой в точке продаж
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <p><label>С какими клиентами
                                                                                    работают</label></p>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                       type="checkbox"
                                                                                    <?= (($additionalProperty['individual']['jur'] === "Y") ? 'checked' : '') ?>
                                                                                       name="[shop-set][individual][jur]">
                                                                                <label class="form-check-label">
                                                                                    Юридическим лицам
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                       type="checkbox"
                                                                                    <?= (($additionalProperty['individual']['phis'] === "Y") ? 'checked' : '') ?>
                                                                                       name="[shop-set][individual][phis]">
                                                                                <label class="form-check-label">
                                                                                    Частным лицам
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--for superadmin-->
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <p><label>Доп. услуги - оборудование</label>
                                                                            </p>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                       type="checkbox"
                                                                                    <?= (($additionalProperty['equip']['calc'] === "Y") ? 'checked' : '') ?>
                                                                                       name="[shop-set][equip][calc]">
                                                                                <label class="form-check-label">
                                                                                    Расчет оборудования
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                       type="checkbox"
                                                                                    <?= (($additionalProperty['equip']['mounting'] === "Y") ? 'checked' : '') ?>
                                                                                       name="[shop-set][equip][mounting]">
                                                                                <label class="form-check-label">
                                                                                    Монтаж оборудования
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <p><label>Тип магазина</label></p>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                       type="checkbox"
                                                                                    <?= (($additionalProperty['type']['office'] === "Y") ? 'checked' : '') ?>
                                                                                       name="[shop-set][type][office]">
                                                                                <label class="form-check-label">
                                                                                    Офис продаж
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                       type="checkbox"
                                                                                    <?= (($additionalProperty['type']['retail'] === "Y") ? 'checked' : '') ?>
                                                                                       name="[shop-set][type][retail]">
                                                                                <label class="form-check-label">
                                                                                    Розничный магазин
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                       type="checkbox"
                                                                                    <?= (($additionalProperty['type']['showroom'] === "Y") ? 'checked' : '') ?>
                                                                                       name="[shop-set][type][showroom]">
                                                                                <label class="form-check-label">
                                                                                    Шоу-рум
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                       type="checkbox"
                                                                                    <?= (($additionalProperty['type']['brandshowroom'] === "Y") ? 'checked' : '') ?>
                                                                                       name="[shop-set][type][brandshowroom]">
                                                                                <label class="form-check-label">
                                                                                    Фирменный шоу-рум
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                       type="checkbox"
                                                                                    <?= (($additionalProperty['type']['designstudio'] === "Y") ? 'checked' : '') ?>
                                                                                       name="[shop-set][type][designstudio]">
                                                                                <label class="form-check-label">
                                                                                    Дизайн-студия
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <p><label>Наличие специалистов по
                                                                                    оборудованию</label></p>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                       type="checkbox"
                                                                                    <?= (($additionalProperty['spec']['arl'] === "Y") ? 'checked' : '') ?>
                                                                                       name="[shop-set][spec][arl]">
                                                                                <label class="form-check-label">
                                                                                    Специалисты по оборудованию Arlight
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                       type="checkbox"
                                                                                    <?= (($additionalProperty['spec']['knx'] === "Y") ? 'checked' : '') ?>
                                                                                       name="[shop-set][spec][knx]">
                                                                                <label class="form-check-label">
                                                                                    Специалисты KNX
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                       type="checkbox"
                                                                                    <?= (($additionalProperty['spec']['dali'] === "Y") ? 'checked' : '') ?>
                                                                                       name="[shop-set][spec][dali]">
                                                                                <label class="form-check-label">
                                                                                    Специалисты DALI
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                       type="checkbox"
                                                                                    <?= (($additionalProperty['spec']['room'] === "Y") ? 'checked' : '') ?>
                                                                                       name="[shop-set][spec][room]">
                                                                                <label class="form-check-label">
                                                                                    Шоу-рум
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--for superadmin-->
                                                                </div>
                                                            </form>
                                                            <a href="javascript:void(0);"
                                                               class="button button_red  shop__name-edit">Изменить</a>
                                                            <a href="javascript:void(0);"
                                                               class="button shop__name-del">Удалить</a>
                                                            <hr>
                                                        </div>
                                                        <?
                                                    }
                                                }
                                                ?>

                                                <a href="javascript:void(0);" class="button button_red add-shop">Добавить
                                                    новый магазин</a>
                                                <div class="row settings__shop-list settings__shop-list--new settings__shop-list-hide">
                                                    <a href="javascript:void(0);" class="settings__shop-list--del">
                                                        <i class="icon-close"></i>
                                                    </a>
                                                    <input type="text" hidden value="" name="shop-id">
                                                    <div class="col-12">
                                                        <div class="form-group shop-city">
                                                            <p>
                                                                <input type="checkbox"
                                                                       class=""
                                                                       name="shop-pickup"
                                                                       data-default=""
                                                                       data-required="false">
                                                                <label>Являеется пунктом
                                                                    самовывоза</label></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group shop-name">
                                                            <p><label>Сортировка</label></p>
                                                            <input type="text"
                                                                   class="form-control form-control-sm"
                                                                   placeholder="Сортировка"
                                                                   name="shop-sort"
                                                                   value="500"
                                                                   data-required="false">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group shop-name">
                                                            <p><label>Название</label></p>
                                                            <input type="text" class="form-control form-control-sm"
                                                                   name="shop-name"
                                                                   placeholder="Название"
                                                                   data-required="true">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group shop-city">
                                                            <p><label>Город</label></p>
                                                            <input type="text" class="form-control form-control-sm"
                                                                   name="shop-city"
                                                                   placeholder="Город"
                                                                   data-required="true">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group shop-address">
                                                            <p><label>Адрес (без города)</label></p>
                                                            <input type="text" class="form-control form-control-sm"
                                                                   name="shop-address"
                                                                   placeholder="Адрес (без города)"
                                                                   data-required="true">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <p><label>Станция метро</label></p>
                                                            <input type="text"
                                                                   class="form-control form-control-sm"
                                                                   placeholder="Станция метро"
                                                                   name="[shop-set][metro]"
                                                                   data-required="false">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <p><label>Название торгового центра</label>
                                                            </p>
                                                            <input type="text"
                                                                   class="form-control form-control-sm"
                                                                   placeholder="Название торгового центра"
                                                                   name="[shop-set][mall]"
                                                                   data-required="false">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group shop-phone">
                                                            <p><label>Телефон</label></p>
                                                            <input type="tel" class="form-control form-control-sm"
                                                                   name="shop-phone-item"
                                                                   placeholder="Телефон"
                                                                   data-required="false"
                                                            >
                                                            <span class="add_input">Добавить еще один</span>
                                                            <input type="text"
                                                                   name="shop-phone"
                                                                   data-required="false"
                                                                   hidden
                                                            >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group shop-email">
                                                            <p><label>E-mail</label></p>
                                                            <input type="email" class="form-control form-control-sm"
                                                                   name="shop-email-item"
                                                                   placeholder="E-mail"
                                                                   data-required="false"
                                                            >
                                                            <span class="add_input">Добавить еще один</span>
                                                            <input type="text"
                                                                   name="shop-email"
                                                                   data-required="false"
                                                                   hidden
                                                            >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group shop-time"
                                                             style="display: flex; flex-wrap: wrap;">
                                                            <!--при создании-->
                                                            <p style="width: 100%;"><label>График работы</label></p>
                                                            <input type="text"
                                                                   class="form-control form-control-sm col-md-5 mr-4"
                                                                   placeholder="Дни"
                                                                   name="shop-days-1"
                                                                   value=""
                                                                   data-default=""
                                                                   data-required="false">
                                                            <input type="text"
                                                                   class="form-control form-control-sm col-md-6"
                                                                   placeholder="Время работы"
                                                                   name="shop-time-1"
                                                                   value=""
                                                                   data-default=""
                                                                   data-required="false">
                                                            <input type="text"
                                                                   class="form-control form-control-sm col-md-5 mr-4"
                                                                   placeholder="Дни"
                                                                   name="shop-days-2"
                                                                   value=""
                                                                   data-default=""
                                                                   data-required="false">
                                                            <input type="text"
                                                                   class="form-control form-control-sm col-md-6"
                                                                   placeholder="Время работы"
                                                                   name="shop-time-2"
                                                                   value=""
                                                                   data-default=""
                                                                   data-required="false">
                                                            <input type="text"
                                                                   class="form-control form-control-sm col-md-5 mr-4"
                                                                   placeholder="Дни"
                                                                   name="shop-days-3"
                                                                   value=""
                                                                   data-default=""
                                                                   data-required="false">
                                                            <input type="text"
                                                                   class="form-control form-control-sm col-md-6"
                                                                   placeholder="Время работы"
                                                                   name="shop-time-3"
                                                                   value=""
                                                                   data-default=""
                                                                   data-required="false">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group shop-coord">
                                                            <p><label>Координаты (через запятую без пробела)</label></p>
                                                            <input type="text" class="form-control form-control-sm"
                                                                   name="shop-geo"
                                                                   placeholder="Координаты"
                                                                   data-required="true">
                                                            <a href="#map_shop_popup"
                                                               data-fancybox
                                                               class="button shop-checkpoint">...</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <h5 style="text-decoration: underline">
                                                            Дополнительная информация о магазине</h5>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <p><label>Информация о доставке</label></p>
                                                            <input type="text"
                                                                   class="form-control form-control-sm"
                                                                   placeholder="Информация о доставке"
                                                                   name="[shop-set][delivery]"
                                                                   data-default=""
                                                                   data-required="false">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <p><label>Способы оплаты</label></p>
                                                            <div class="form-check">
                                                                <input class="form-check-input"
                                                                       type="checkbox"
                                                                       name="[shop-set][pay][cash][cash]">
                                                                <label class="form-check-label">
                                                                    Наличные
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input"
                                                                       type="checkbox"
                                                                       name="[shop-set][pay][cash][req]">
                                                                <label class="form-check-label">
                                                                    По реквизитам
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input"
                                                                       type="checkbox"
                                                                       name="[shop-set][pay][card][online]">
                                                                <label class="form-check-label">
                                                                    Картой онлайн
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input"
                                                                       type="checkbox"
                                                                       name="[shop-set][pay][card][shop]">
                                                                <label class="form-check-label">
                                                                    Картой в точке продаж
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <p><label>С какими клиентами
                                                                    работают</label></p>
                                                            <div class="form-check">
                                                                <input class="form-check-input"
                                                                       type="checkbox"
                                                                       name="[shop-set][individual][jur]">
                                                                <label class="form-check-label">
                                                                    Юридическим лицам
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input"
                                                                       type="checkbox"
                                                                       name="[shop-set][individual][phis]">
                                                                <label class="form-check-label">
                                                                    Частным лицам
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <p><label>Доп. услуги - оборудование</label>
                                                            </p>
                                                            <div class="form-check">
                                                                <input class="form-check-input"
                                                                       type="checkbox"
                                                                       name="[shop-set][equip][calc]">
                                                                <label class="form-check-label">
                                                                    Расчет оборудования
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input"
                                                                       type="checkbox"
                                                                       name="[shop-set][equip][mounting]">
                                                                <label class="form-check-label">
                                                                    Монтаж оборудования
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <p><label>Тип магазина</label></p>
                                                            <div class="form-check">
                                                                <input class="form-check-input"
                                                                       type="checkbox"
                                                                       name="[shop-set][type][office]">
                                                                <label class="form-check-label">
                                                                    Офис продаж
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input"
                                                                       type="checkbox"
                                                                       name="[shop-set][type][retail]">
                                                                <label class="form-check-label">
                                                                    Розничный магазин
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input"
                                                                       type="checkbox"
                                                                       name="[shop-set][type][showroom]">
                                                                <label class="form-check-label">
                                                                    Шоу-рум
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input"
                                                                       type="checkbox"
                                                                       name="[shop-set][type][brandshowroom]">
                                                                <label class="form-check-label">
                                                                    Фирменный шоу-рум
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input"
                                                                       type="checkbox"
                                                                       name="[shop-set][type][designstudio]">
                                                                <label class="form-check-label">
                                                                    Дизайн-студия
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <p><label>Наличие специалистов по
                                                                    оборудованию</label></p>
                                                            <div class="form-check">
                                                                <input class="form-check-input"
                                                                       type="checkbox"
                                                                       name="[shop-set][spec][arl]">
                                                                <label class="form-check-label">
                                                                    Специалисты по оборудованию Arlight
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input"
                                                                       type="checkbox"
                                                                       name="[shop-set][spec][knx]">
                                                                <label class="form-check-label">
                                                                    Специалисты KNX
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input"
                                                                       type="checkbox"
                                                                       name="[shop-set][spec][dali]">
                                                                <label class="form-check-label">
                                                                    Специалисты DALI
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input"
                                                                       type="checkbox"
                                                                       name="[shop-set][spec][room]">
                                                                <label class="form-check-label">
                                                                    Шоу-рум
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <br>
                                                <br>
                                                <p>** - изображение в формате jpg/png, рекомендуемая ширина не более
                                                    800px, максимальный размер файла 1,5 Мб </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="map_shop_popup" class="lity-hide map_shop_wrap">
                                        <div class="map_shop">
                                            <iframe id="map_shop_frame" src="<?=SITE_DIR?>admin/settings/map.php">
                                                Ваш браузер не поддерживает плавающие фреймы!
                                            </iframe>
                                        </div>
                                        <p>Перетащите маркер для определения точных координат магазина</p>
                                        <div class="form-group map_shop_btn">
                                            <input
                                                    type="text"
                                                    class="form-control"
                                                    placeholder=""
                                                    value=""
                                                    data-default=""
                                                    id="temp-coord"
                                            >
                                            <a href="javascript:void(null);" class="button button_red">Применить
                                                координаты</a>
                                        </div>
                                    </div>
                                    <hr>
                                    <hr>
                                    <h2>Настройка внешнего вида сайта</h2>
                                    <? if ($USER->isAdmin()): ?>
                                        <form action="" name="send_main_setting_logo" id="send_main_setting_logo">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group ">
                                                        <p>Логотип* в шапке:</p>
                                                        <div class="img-in-logo img-in-logo-header">
                                                            <img src="<?= SITE_DIR ?>images/header_logo.png" alt="">
                                                        </div>
                                                        <div class="file-upload file-upload--header">
                                                            <button class="file-upload-btn" type="button">
                                                                Добавить/изменить
                                                                изображение
                                                            </button>
                                                            <div class="image-upload-wrap">
                                                                <input
                                                                        class="file-upload-input"
                                                                        type='file'
                                                                        accept="image/*"
                                                                        name="header_logo"
                                                                        id="header_logo"
                                                                        data-default=""
                                                                />
                                                                <div class="drag-text">
                                                                    <h3>
                                                                        <i class="icon-nophoto"></i><br>
                                                                        <span class="error"></span>
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                            <div class="file-upload-content">
                                                                <img class="file-upload-image" src="#" alt=""/>
                                                                <div class="image-title-wrap">
                                                                    <button type="button" class="remove-image">Удалить
                                                                        <span class="image-title"></span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <p> * - Изображение в формате png с прозрачным фоном, рекомендуемая
                                                        ширина не более 200px, максимальный размер файла 500 Кб </p>
                                                </div>
                                            </div>
                                        </form>
                                        <hr>
                                    <? endif; ?>
                                    <div class="row">
                                        <div class="col-12">
                                            <form action="" name="send_setting_header" id="send_setting_header">
                                                <h2>Выбор типа шапки сайта</h2>
                                                <?
                                                $header_scheme = COption::GetOptionString("header_action", "data-header-scheme", '');
                                                ?>
                                                <input type="text"
                                                       value="<?= $header_scheme ?>"
                                                       readonly=""
                                                       hidden
                                                       class="form-control"
                                                       id="data-header-scheme"
                                                       name="data-header-scheme"
                                                       data-default="<?= $header_scheme ?>"
                                                       data-required="false">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <div class="header-scheme-items" data-header="scheme0">
                                                                <span>Вариант 1</span>
                                                            </div>
                                                            <div class="scheme-descr">
                                                                Логотип слева на одной линии с меню, меню по центру <br><br>
                                                                <img src="<?= SITE_TEMPLATE_PATH ?>/img/set_ht_1.jpg"
                                                                     alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <div class="header-scheme-items" data-header="scheme1">
                                                                <span>Вариант 2</span>
                                                            </div>
                                                            <div class="scheme-descr">
                                                                Большой логотип по центру, меню по центру под логотипом
                                                                <br><br>
                                                                <img src="<?= SITE_TEMPLATE_PATH ?>/img/set_ht_2.jpg"
                                                                     alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>

                                                <h2>Выбор цветовой схемы сайта</h2>
                                                <?
                                                $color_scheme = COption::GetOptionString("header_action", "sch_color", '');
                                                ?>
                                                <input type="text"
                                                       value="<?= $color_scheme ?>"
                                                       readonly=""
                                                       hidden
                                                       class="form-control"
                                                       id="data-color-scheme"
                                                       name="data-color-scheme"
                                                       data-default="<?= $color_scheme ?>"
                                                       data-required="false">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <p>Схема 1</p>
                                                            <div class="color-scheme-items" data-scheme="scheme1">
                                                                <span style="background-color: #eb1c24"></span>
                                                                <span style="background-color: #4c5256"></span>
                                                                <span style="background-color: #cfcfcf"></span>
                                                                <span style="background-color: #fff"></span>
                                                            </div>
                                                            <div class="scheme-descr">
                                                                <img src="<?= SITE_TEMPLATE_PATH ?>/img/set_head_1.jpg"
                                                                     alt="">
                                                                <div>
                                                                    <br>
                                                                    <span class="color color--radial"
                                                                          style="background-color: #eb1c24"></span> -
                                                                    Цвет кнопок и выделения
                                                                    <br>
                                                                    <span class="color color--radial"
                                                                          style="background-color: #4c5256"></span> -
                                                                    Цвет фона футера
                                                                    <br>
                                                                    <span class="color color--radial"
                                                                          style="background-color: #cfcfcf"></span><span
                                                                            class="color color--radial"
                                                                            style="background-color: #fff"></span> -
                                                                    Цвет фона шапки
                                                                    <br></div>
                                                                <img src="<?= SITE_TEMPLATE_PATH ?>/img/set_footer_1.jpg"
                                                                     alt="">

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <p>Схема 2</p>
                                                            <div class="color-scheme-items" data-scheme="scheme2">
                                                                <span style="background-color: #4c5256"></span>
                                                                <span style="background-color: #ff0019"></span>
                                                                <span style="background-color: #c6ccd2"></span>
                                                                <span style="background-color: #fff"></span>
                                                            </div>
                                                            <div class="scheme-descr">
                                                                <img src="<?= SITE_TEMPLATE_PATH ?>/img/set_head_2.jpg"
                                                                     alt="">
                                                                <div>

                                                                    <br>
                                                                    <span class="color color--radial"
                                                                          style="background-color: #4c5256"></span> -
                                                                    Цвет кнопок и выделения
                                                                    <br>
                                                                    <span class="color color--radial"
                                                                          style="background-color: #4c5256"></span> -
                                                                    Цвет фона футера
                                                                    <br>
                                                                    <span class="color color--radial"
                                                                          style="background-color: #ff0019"></span><span
                                                                            class="color color--radial"
                                                                            style="background-color: #c6ccd2"></span> -
                                                                    Цвет фона шапки
                                                                    <br></div>
                                                                <img src="<?= SITE_TEMPLATE_PATH ?>/img/set_footer_3.jpg"
                                                                     alt="">

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <p>Схема 3</p>
                                                            <div class="color-scheme-items" data-scheme="scheme3">
                                                                <span style="background-color: #878c8e"></span>
                                                                <span style="background-color: #8c0011"></span>
                                                                <span style="background-color: #e5e5e5"></span>
                                                                <span style="background-color: #fff"></span>
                                                            </div>
                                                            <div class="scheme-descr">
                                                                <img src="<?= SITE_TEMPLATE_PATH ?>/img/set_head_3.jpg"
                                                                     alt="">
                                                                <div>

                                                                    <br>
                                                                    <span class="color color--radial"
                                                                          style="background-color: #8c0011"></span> -
                                                                    Цвет кнопок и выделения
                                                                    <br>
                                                                    <span class="color color--radial"
                                                                          style="background-color: #878c8e"></span> -
                                                                    Цвет фона футера
                                                                    <br>
                                                                    <span class="color color--radial"
                                                                          style="background-color: #e5e5e5"></span><span
                                                                            class="color color--radial"
                                                                            style="background-color: #8c0011"></span> -
                                                                    Цвет фона шапки
                                                                    <br></div>
                                                                <img src="<?= SITE_TEMPLATE_PATH ?>/img/set_footer_3.jpg"
                                                                     alt="">

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <p>Схема 4</p>
                                                            <div class="color-scheme-items" data-scheme="scheme4">
                                                                <span style="background-color: #4c5256"></span>
                                                                <span style="background-color: #ff0019"></span>
                                                                <span style="background-color: #c6ccd2"></span>
                                                                <span style="background-color: #8c0011"></span>
                                                            </div>
                                                            <div class="scheme-descr">
                                                                <img src="<?= SITE_TEMPLATE_PATH ?>/img/set_head_4.jpg"
                                                                     alt="">
                                                                <div>

                                                                    <br>
                                                                    <span class="color color--radial"
                                                                          style="background-color: #ff0019"></span> -
                                                                    Цвет кнопок и выделения
                                                                    <br>
                                                                    <span class="color color--radial"
                                                                          style="background-color: #8c0011"></span> -
                                                                    Цвет фона футера
                                                                    <br>
                                                                    <span class="color color--radial"
                                                                          style="background-color: #8c0011"></span><span
                                                                            class="color color--radial"
                                                                            style="background-color: #fff"></span> -
                                                                    Цвет фона шапки
                                                                    <br></div>
                                                                <img src="<?= SITE_TEMPLATE_PATH ?>/img/set_footer_4.jpg"
                                                                     alt="">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <h2>Выбор шрифта сайта</h2>
                                                <?
                                                $font_scheme = COption::GetOptionString("header_action", "data-font-scheme", '');
                                                ?>
                                                <input type="text"
                                                       value="<?= $font_scheme ?>"
                                                       readonly=""
                                                       hidden
                                                       class="form-control"
                                                       id="data-font-scheme"
                                                       name="data-font-scheme"
                                                       data-default="<?= $font_scheme ?>"
                                                       data-required="false">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <p style="font-family: FontRegular, sans-serif;">PTSans</p>
                                                            <div class="font-scheme-items" data-font="font1">

                                                                <span>ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyzАБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯабвгдеёжзийклмнопрстуфхцчшщъыьэюя1234567890‘?’“!”(%)[#]{@}/&\<-+??=>$€??:;,.*</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <p style="font-family: Roboto, sans-serif;">Roboto</p>
                                                            <div class="font-scheme-items" data-font="font2">
                                                                <span>ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyzАБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯабвгдеёжзийклмнопрстуфхцчшщъыьэюя1234567890‘?’“!”(%)[#]{@}/&\<-+??=>$€??:;,.*</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <p style="font-family: Open Sans, sans-serif;">Open Sans</p>
                                                            <div class="font-scheme-items" data-font="font3">
                                                                <span>ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyzАБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯабвгдеёжзийклмнопрстуфхцчшщъыьэюя1234567890‘?’“!”(%)[#]{@}/&\<-+??=>$€??:;,.*</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                    <hr>
                                                <h2>Избранные пункты меню вывести в шапке сайта</h2>
                                                <?
                                                $header_fav_text1 = COption::GetOptionString("header_action", "header_fav_text", 'Вопрос-Ответ');
                                                $header_fav_link1 = COption::GetOptionString("header_action", "header_fav_link", SITE_DIR . 'info/faq/');
                                                $header_fav_text2 = COption::GetOptionString("header_action", "header_fav_text_2", 'О компании');
                                                $header_fav_link2 = COption::GetOptionString("header_action", "header_fav_link_2", SITE_DIR . 'about/');
                                                ?>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="tablink">Справка</div>
                                                        <div class="tabcontent">
                                                            <img src="<?= SITE_TEMPLATE_PATH ?>/img/settings_fav_link.jpg"
                                                                 alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <p><label for="header_fav_text">Название пункта
                                                                    меню 1</label></p>
                                                            <input type="text"
                                                                   value="<?= $header_fav_text1 ?>"
                                                                   class="form-control"
                                                                   id="header_fav_text"
                                                                   name="header_fav_text"
                                                                   data-default="<?= $header_fav_text1 ?>"
                                                                   data-required="false">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <p><label for="header_fav_link">Ссылка на пункт меню
                                                                    1</label>
                                                            </p>
                                                            <input type="text"
                                                                   value="<?= $header_fav_link1 ?>"
                                                                   class="form-control"
                                                                   id="header_fav_link"
                                                                   name="header_fav_link"
                                                                   data-default="<?= $header_fav_link1 ?>"
                                                                   data-required="false">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <p><label for="header_fav_text_2">Название пункта
                                                                    меню 2</label></p>
                                                            <input type="text"
                                                                   value="<?= $header_fav_text2 ?>"
                                                                   class="form-control"
                                                                   id="header_fav_text_2"
                                                                   name="header_fav_text_2"
                                                                   data-default="<?= $header_fav_text2 ?>"
                                                                   data-required="false">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <p><label for="header_fav_link_2">Ссылка на пункт меню
                                                                    2</label>
                                                            </p>
                                                            <input type="text"
                                                                   value="<?= $header_fav_link2 ?>"
                                                                   class="form-control"
                                                                   id="header_fav_link_2"
                                                                   name="header_fav_link_2"
                                                                   data-default="<?= $header_fav_link2 ?>"
                                                                   data-required="false">
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <h2>Режим работы обратной связи</h2>
                                                <?
                                                $feedback_type = COption::GetOptionString("header_action", "feedback_type", 'feedback_type_form');
                                                ?>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <input type="radio" class="input__radio" name="feedback_type"
                                                               id="feedback_type_1"
                                                               <? if ($feedback_type == 'feedback_type_form'): ?>checked<? endif; ?>
                                                               value="feedback_type_form" data-default="">
                                                        <label for="feedback_type_1">Использовать функционал отправки
                                                            формы обратной связи. Онлайн-чат не используется
                                                            <br> <small>Обращения пользователей будут направляться на
                                                                ваш e-mail</small></label>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <input type="radio" class="input__radio" name="feedback_type"
                                                               id="feedback_type_2"
                                                               <? if ($feedback_type == 'feedback_type_online'): ?>checked<? endif; ?>
                                                               value="feedback_type_online" data-default="">
                                                        <label for="feedback_type_2">Использовать функционал онлайн-чата
                                                            (Talk-Me, Онлайн-чат Битрикс24, JivoSite и т.п.)
                                                            <br> <small>Будет подключен дополнительный скрипт,
                                                                который можно прописать в файле include/chat_script_in_footer.php</small>
                                                        </label>
                                                    </div>
                                                </div>
                                                <hr>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <? if (DEMOVERSION != 'true' || $USER->IsAdmin()): ?>
                                                    <input type="submit" id="save_admin_settings"
                                                           class="button button_red btn-block"
                                                           value="Сохранить">
                                                <? else: ?>
                                                    <input type="submit" id="save-demo"
                                                           class="button button_red btn-block"
                                                           value="Сохранить">
                                                <? endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <a href="<?= SITE_DIR ?>admin/"
                                                   class="button btn-block">Отменить</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>