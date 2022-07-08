<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Регистрация мазгазина в Яндекс.Кассе");
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
            <div class="col-md-6">
                <div class="mb-5">
                    <p class="alert alert-dark">Шаг 1. Регистрация аккаунта.</p>
                    <p>
                        Для работы Вам необходимо иметь аккаунт на Яндексе. Рекомендуем завести отдельный аккаунт для работы с Яндекс.Кассой.<br>
                    </p>
                    <p>
                        <a class="button" href="https://passport.yandex.ru/registration?mode=register&from=money&origin=merchant&retpath=https%3A%2F%2Fkassa.yandex.ru%2Fjoinups%2Faccount%2Fcreated" target="_blank">Зарегистрироваться на Яндекс</a>
                    </p>
                </div>
                <div class="mb-5">
                    <p class="alert alert-dark">Шаг 2. Добавление организации.</p>
                    <p>
                        После регистрации вы будете перенаправлены на страницу Яндекс.Кассы, где в поле необходимо будет указать ИНН организации и нажать на кнопку "Продолжить".
                    </p>
                    <p class="text-center">
                        <img class="img-thumbnail" alt="Шаг 2. Добавление организации." style="max-width: 100%" src="<?=SITE_DIR?>admin/settings/payment/help/YK/images/02.jpg"/>
                    </p>
                </div>
                <div class="mb-5">
                    <p class="alert alert-dark">Шаг 3. Создание магазина в Яндекс.Кассе</p>
                    <p>
                        На данном шаге вам необходимо подключить новый магазин, нажав на соответствующую кнопку
                    </p>
                    <p class="text-center">
                        <img class="img-thumbnail" alt="Шаг 3. Создание магазина в Яндекс.Кассе" style="max-width: 100%" src="<?=SITE_DIR?>admin/settings/payment/help/YK/images/03.jpg"/>
                    </p>
                </div>
                <div class="mb-5">
                    <p class="alert alert-dark">Шаг 4. Заполнение анкеты (можно пропустить)</p>
                    <p>
                        Перед вами страница, на которой присутствуют блоки "Анкета" и "Настройки".
                    </p>
                    <p>
                        Анкету можно заполнять сразу, либо позднее, если вы сначала хотите протестировать работу данного способа оплаты,
                        понять как работает система.
                    </p>
                    <p>
                        Анкета заполняется пошагово, все пункты просты и понятны. На последнем шаге
                        необходимо будет загрузить сканированные копии документов. После заполнения анкеты она отправляется на проверку, после чего сотрудники
                        Яндекс.Кассы отправят вам договор на подпись.
                    </p>
                    <p class="text-center">
                        <img class="img-thumbnail" alt="Шаг 4. Заполнение анкеты (можно пропустить)" style="max-width: 100%" src="<?=SITE_DIR?>admin/settings/payment/help/YK/images/04.jpg"/>
                    </p>
                </div>
                <div class="mb-5">
                    <p class="alert alert-dark">Шаг 5. Настройки (обязательно к заполнению)</p>
                    <p>
                        Нажимаем кнопку "Заполнить". Выбираем способ подключения "API (для самописных сайтов)". Нажимаем кнопку "Продолжить".
                    </p>
                    <p class="text-center">
                        <img class="img-thumbnail" alt="Шаг 5. Настройки (обязательно к заполнению)" style="max-width: 100%" src="<?=SITE_DIR?>admin/settings/payment/help/YK/images/05.jpg"/>
                    </p>
                    <p>
                        Указываем Email, на который будут отправляться ежедневные реестры операций и нажимаем кнопку "Сохранить и продолжить"
                    </p>
                    <p class="text-center">
                        <img class="img-thumbnail" alt="Шаг 5. Настройки (обязательно к заполнению)" style="max-width: 100%" src="<?=SITE_DIR?>admin/settings/payment/help/YK/images/05_1.jpg"/>
                    </p>
                    <p>
                        Далее необходимо выбрать способ работы с онлайн-кассой. Для чего это необходимо, а также варианты работы подробно расписаны, даны ссылки на законодательные акты.
                    </p>
                    <p>
                        Если вы еще не решили как будете работать, данную настройку можно выполнить позднее, выбрав пункт "Решить позже".
                    </p>
                    <p>
                        Нажимаем кнопку "Отправить".
                    </p>
                    <p class="text-center">
                        <img class="img-thumbnail" alt="Шаг 5. Настройки (обязательно к заполнению)" style="max-width: 100%" src="<?=SITE_DIR?>admin/settings/payment/help/YK/images/05_2.jpg"/>
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-5">
                    <p class="alert alert-dark">Шаг 6. Генерация секретного ключа</p>
                    <p>
                        Обновляем страницу вручную, либо нажав кноку F5 на клавиатуре. Нажимаем кнопку "Протестировать платежи"
                    </p>
                    <p>
                        Вы попадете на страницу, где необходимо сгенерировать секретный ключ для API. Нажимаем на соответствующую кнопку.
                    </p>
                    <p class="text-center">
                        <img class="img-thumbnail" alt="Шаг 6. Генерация секретного ключа" style="max-width: 100%" src="<?=SITE_DIR?>admin/settings/payment/help/YK/images/06.jpg"/>
                    </p>
                    <p>
                        Скопируйте ключ и нажмите кнопку "Продолжить"
                    </p>
                    <p class="text-center">
                        <img class="img-thumbnail" alt="Шаг 6. Генерация секретного ключа" style="max-width: 100%" src="<?=SITE_DIR?>admin/settings/payment/help/YK/images/06_1.jpg"/>
                    </p>
                    <p>
                        Укажите номер телефона и нажмите на кнопку "Получить пароль".
                    </p>
                    <p>
                        На указанный номер придет SMS с паролем. Введите его в соответствующее поле и нажмите кнопку "Активировать ключ".
                    </p>
                    <p class="text-center">
                        <img class="img-thumbnail" alt="Шаг 6. Генерация секретного ключа" style="max-width: 100%" src="<?=SITE_DIR?>admin/settings/payment/help/YK/images/06_2.jpg"/>
                    </p>
                </div>
                <div class="mb-5">
                    <p class="alert alert-dark">Шаг 7. Настройки на вашем сайте</p>
                    <p>
                        Перейдите в список способов оплаты на вашем сайте, кликните на название способа "Яндекс.Касса" для редактирования.
                    </p>
                    <p>
                        Скопируйте shopId и Секретный ключ со страницы настроек Яндекса и вставьте в соответсвующие поля на вашем сайте.
                    </p>
                    <p class="text-center">
                        <img class="img-thumbnail" alt="Шаг 7. Настройки на вашем сайте" style="max-width: 100%" src="<?=SITE_DIR?>admin/settings/payment/help/YK/images/07.jpg"/>
                    </p>
                </div>
                <div class="mb-5">
                    <p class="alert alert-dark">Шаг 8. Тестирование</p>
                    <p>
                        Добавьте товары в корзину, перейдите к оформлению заказа. Заполните все необходимые поля и выберите способ оплаты "Яндекс.Касса".
                    </p>
                    <p>
                        Вы попадете на страницу, где необходимо указать данные банковской карты, чтобы протестировать оплату.
                    </p>
                    <p>
                        <b>ВНИМАНИЕ! Для тестовых магазинов необходимо использовать только тестовые банковские карты:</b>
                    </p>
                    <p>
                    <ul>
                        <li>
                            код CVV2 (CVC2, CID) — любые три (CVV2, CVC2) или четыре (CID) цифры;
                        </li>
                        <li>
                            месяц и год — любые, но больше текущей даты;
                        </li>
                        <li>
                            код для подтверждения оплаты на странице 3-D Secure (при необходимости) — любое число.
                        </li>
                    </ul>
                    </p>
                    <table class="table table-striped table-hover" style="max-width:500px">
                        <thead>
                        <tr>
                            <th style="text-align: left">Номер</th>
                            <th style="text-align: left">Тип карты</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td style="text-align: left">5555<span style="padding: 0 2px"></span>5555<span style="padding: 0 2px"></span>5555<span style="padding: 0 2px"></span>4477</td>
                            <td style="text-align: left">MasterCard (с 3-D&nbsp;Secure)</td>
                        </tr>
                        <tr>
                            <td style="text-align: left">5555<span style="padding: 0 2px"></span>5555<span style="padding: 0 2px"></span>5555<span style="padding: 0 2px"></span>4444</td>
                            <td style="text-align: left">MasterCard</td>
                        </tr>
                        <tr>
                            <td style="text-align: left">6759<span style="padding: 0 2px"></span>6498<span style="padding: 0 2px"></span>2643<span style="padding: 0 2px"></span>8453</td>
                            <td style="text-align: left">Maestro</td>
                        </tr>
                        <tr>
                            <td style="text-align: left">4111<span style="padding: 0 2px"></span>1111<span style="padding: 0 2px"></span>1111<span style="padding: 0 2px"></span>1111</td>
                            <td style="text-align: left">Visa</td>
                        </tr>
                        <tr>
                            <td style="text-align: left">4175<span style="padding: 0 2px"></span>0010<span style="padding: 0 2px"></span>0000<span style="padding: 0 2px"></span>0017</td>
                            <td style="text-align: left">Visa Electron</td>
                        </tr>
                        <tr>
                            <td style="text-align: left">3700<span style="padding: 0 2px"></span>000000<span style="padding: 0 2px"></span>00002</td>
                            <td style="text-align: left">American Express</td>
                        </tr>
                        <tr>
                            <td style="text-align: left">3528<span style="padding: 0 2px"></span>0007<span style="padding: 0 2px"></span>0000<span style="padding: 0 2px"></span>0000</td>
                            <td style="text-align: left">JCB</td>
                        </tr>
                        <tr>
                            <td style="text-align: left">3670<span style="padding: 0 2px"></span>010200<span style="padding: 0 2px"></span>0000</td>
                            <td style="text-align: left">Diners Club</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="mb-5">
                    <p class="alert alert-dark">Шаг 9. Финальный</p>
                    <p>
                        Если после ввода данных карты Вы видите сообщение об успешной оплате, как на картинке ниже, то все отлично, можно заполнять анкету (если вы не сделали это на 4 шаге),
                        заключать договор с Яндекс.Кассой и переводить магазин в "боевой режим". Если же возникают ошибки, напишите в нашу службу поддержки.
                    </p>
                    <p>
                        <b>ВНИМАНИЕ! После перевода магазина в "боевой режим", вам выдадут новые shopId и Секретный ключ. Их необходимо будет изменить в настройках сайта (7 шаг)</b>
                    </p>
                    <p>
                        В личном кабинете Яндекс.Кассы вам доступен список всех платежей - <a target="_blank" href="https://kassa.yandex.ru/my/payments">https://kassa.yandex.ru/my/payments</a>
                    </p>
                    <p class="text-center">
                        <img class="img-thumbnail" alt="Шаг 9. Финальный" style="max-width: 100%" src="<?=SITE_DIR?>admin/settings/payment/help/YK/images/09.jpg"/>
                    </p>
                </div>
            </div>
        </div>
    </div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>