<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("SEO - настройка целей для Яндекс.Метрики");
use Bitrix\Main\Context;

global $goalCurrent;
$goalGet = Context::getCurrent()->getRequest()->get("goal");
if (!empty($goalGet)) {
    file_put_contents($_SERVER['DOCUMENT_ROOT'] . SITE_DIR."assets/json/reach_goal.json", json_encode($goalGet, JSON_UNESCAPED_UNICODE));
    if ($goalGet['to-cart']['id'] || $goalGet['send-order']['id'] || $goalGet['add-to-cart']['id'])
        $goalCurrent = $goalGet;
}

?>

    <div id="admin" class="personal">
        <? require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR . "admin/top_menu.php"); ?>
        <div class="personal__block active_el">
            <div class="row">
                <div class="col-md-2">
                    <? require($_SERVER["DOCUMENT_ROOT"] . SITE_DIR . "admin/settings/left_menu.php"); ?>
                </div>
                <div class="col-md-10">
                    <form action="<?= POST_FORM_ACTION_URI ?>" class="" method="GET"
                          enctype="multipart/form-data">
                        <h3>Цель на переход в корзину</h3>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">id метрики</span>
                            </div>
                            <input type="text" class="form-control" placeholder="" name="goal[to-cart][id]"
                                   value="<?= $goalCurrent['to-cart']['id'] ?>">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Название цели</span>
                            </div>
                            <input type="text" class="form-control" placeholder="" name="goal[to-cart][name]"
                                   value="<?= $goalCurrent['to-cart']['name'] ?>">
                        </div>
                        <hr>
                        <h3>Цель на оформление заказа</h3>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">id метрики</span>
                            </div>
                            <input type="text" class="form-control" placeholder="" name="goal[send-order][id]"
                                   value="<?= $goalCurrent['send-order']['id'] ?>">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Название цели</span>
                            </div>
                            <input type="text" class="form-control" placeholder="" name="goal[send-order][name]"
                                   value="<?= $goalCurrent['send-order']['name'] ?>">
                        </div>

                        <hr>
                        <h3>Цель на добавление в корзину</h3>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">id метрики</span>
                            </div>
                            <input type="text" class="form-control" placeholder="" name="goal[add-to-cart][id]"
                                   value="<?= $goalCurrent['add-to-cart']['id'] ?>">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Название цели</span>
                            </div>
                            <input type="text" class="form-control" placeholder="" name="goal[add-to-cart][name]"
                                   value="<?= $goalCurrent['add-to-cart']['name'] ?>">
                        </div>

                        <hr>
                        <h3>Цель - Форма "Спросить" в правом нижнем углу, срабатывает при успешной отправке формы</h3>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">id метрики</span>
                            </div>
                            <input type="text" class="form-control" placeholder="" name="goal[send-ask-form][id]"
                                   value="<?= $goalCurrent['send-ask-form']['id'] ?>">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Название цели</span>
                            </div>
                            <input type="text" class="form-control" placeholder="" name="goal[send-ask-form][name]"
                                   value="<?= $goalCurrent['send-ask-form']['name'] ?>">
                        </div>
                        <hr>

                        <h3>Цель - Добавление товара в избранное</h3>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">id метрики</span>
                            </div>
                            <input type="text" class="form-control" placeholder="" name="goal[add-to-favorite][id]"
                                   value="<?= $goalCurrent['add-to-favorite']['id'] ?>">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Название цели</span>
                            </div>
                            <input type="text" class="form-control" placeholder="" name="goal[add-to-favorite][name]"
                                   value="<?= $goalCurrent['add-to-favorite']['name'] ?>">
                        </div>
                        <hr>
                        <h3>Цель - Отправка формы Регистрация пользователя</h3>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">id метрики</span>
                            </div>
                            <input type="text" class="form-control" placeholder="" name="goal[add-new-user][id]"
                                   value="<?= $goalCurrent['add-new-user']['id'] ?>">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Название цели</span>
                            </div>
                            <input type="text" class="form-control" placeholder="" name="goal[add-new-user][name]"
                                   value="<?= $goalCurrent['add-new-user']['name'] ?>">
                        </div>

                        <hr>

                        <h3>Цель - Отправка формы Вход</h3>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">id метрики</span>
                            </div>
                            <input type="text" class="form-control" placeholder="" name="goal[auth-user][id]"
                                   value="<?= $goalCurrent['auth-user']['id'] ?>">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Название цели</span>
                            </div>
                            <input type="text" class="form-control" placeholder="" name="goal[auth-user][name]"
                                   value="<?= $goalCurrent['auth-user']['name'] ?>">
                        </div>

                        <hr>
                        <h3>Цель - Отправка формы из любого Калькулятора </h3>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">id метрики</span>
                            </div>
                            <input type="text" class="form-control" placeholder="" name="goal[result-calc][id]"
                                   value="<?= $goalCurrent['result-calc']['id'] ?>">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Название цели</span>
                            </div>
                            <input type="text" class="form-control" placeholder="" name="goal[result-calc][name]"
                                   value="<?= $goalCurrent['result-calc']['name'] ?>">
                        </div>

                        <hr>

                        <button type="submit" class="btn btn-danger">Сохранить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>