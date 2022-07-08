<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Профильные светильники");
$APPLICATION->SetAdditionalCss(SITE_DIR."catalog/aluprofile-luminaires/style.css");

global $USER;

$firstname = '';
$surname = '';
$email = '';
$phone = '';
if ($USER->IsAuthorized()) {
    $rsUser = CUser::GetByID($USER->GetID());
    $arUser = $rsUser->Fetch();
    $firstname = $USER->GetFirstName();
    $surname = $USER->GetLastName();
    $email = $USER->GetEmail();
    $phone = $arUser['PERSONAL_PHONE'];
}
?>

<div class="alulamps">
    <div class="alulamps__header">
        <div class="alulamps__header-title">
            <h2>ПРОФИЛЬНЫЕ СВЕТИЛЬНИКИ <span>на заказ для ваших проектов</span></h2>
            <p>В нашем ассортименте можно найти готовые модели светильников или&nbsp;заказать профильные светильники по индивидуальным параметрам.</p>
        </div>
        <a href="<?=SITE_DIR?>catalog/custom-lamps/" class="button alulamps__header-button">Калькулятор</a>
    </div>

    <div class="alulamps__series">
        <div class="alulamps__series-logo">
            <svg class="series-1" data-section="908" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 152.76 115.64">
                <polygon points="79.06 115.64 0 2.53 3.62 0 78.94 107.75 149.06 0.05 152.76 2.46 79.06 115.64"></polygon>
            </svg>
            <svg class="series-2" data-section="906" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 286.51 116.16">
                <path d="M214.35,116.16l-1.85-2.88Q178.78,60.74,145.1,8.18q-33.61,52.56-67.24,105.1l-1.8,2.8L0,5.34l3.64-2.5L75.94,108.1,143.24,2.9,145.1,0,147,2.9Q180.64,55.46,214.37,108q34.2-52.56,68.44-105.13l3.7,2.4q-35.17,54-70.3,108Z" transform="translate(0 0)"></path>
            </svg>
            <svg class="series-3" data-section="904" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 111.91 128.94">
                <path d="M111.91,66.49H37.38l-.64-1.1Q18.36,33.92,0,2.45L3.82.23q18,30.92,36.1,61.84h72Z" transform="translate(0 0)"></path>
                <polygon points="4.48 128.94 0.65 126.75 36.23 64.61 0.27 2.2 4.1 0 41.32 64.6 4.48 128.94"></polygon>
            </svg>
            <svg class="series-4" data-section="901" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 110.48 110.45">
                <path d="M106.66,106.61H3.82V3.84H106.66ZM110.48,0H0V110.45H110.43Z"></path>
            </svg>
            <svg data-section="903" class="series-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 127.57 110.44">
                <path d="M93.44,3.83l29.67,51.39L93.44,106.6H34.09L4.42,55.21,34.09,3.82ZM95.64,0H31.88L0,55.22l31.88,55.22H95.69l31.88-55.22Z"></path>
            </svg>
            <svg data-section="902" class="series-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 127.52 110.44">
                <path d="M63.76,8.84,119.92,106H7.65Zm0-8.84L0,110.44H127.52Z"></path>
            </svg>
            <svg data-section="909" class="series-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 105.95 110.43">
                <path d="M84,0V4.41h0c5.24,0,9.41,1.41,12.4,4.19,5.44,5.07,6.6,14.88,3.18,26.92-3.77,13.24-12.41,27.59-24.34,40.4C58.19,94.2,37.27,106,22,106c-5.25,0-9.42-1.41-12.4-4.19-5.5-5-6.66-14.87-3.23-26.91C10.13,61.67,18.78,47.32,30.7,34.51,47.7,16.23,68.62,4.41,84,4.41V0m0,0C68,0,46,11.62,27.52,31.5,1.84,59-7.53,92,6.54,105.06c3.91,3.65,9.22,5.37,15.41,5.37,16,0,38-11.63,56.47-31.5,25.63-27.53,35-60.47,20.93-73.57C95.44,1.72,90.13,0,84,0" transform="translate(0)"></path>
                <path d="M22,4.41c15.32,0,36.22,11.82,53.24,30.1C87.12,47.32,95.76,61.67,99.53,74.9c3.42,12,2.26,21.86-3.18,26.93-3,2.78-7.16,4.19-12.4,4.19C68.62,106,47.72,94.2,30.7,75.92,18.78,63.11,10.13,48.76,6.37,35.52,2.94,23.52,4.1,13.67,9.55,8.6c3-2.78,7.15-4.19,12.4-4.19M22,0C15.76,0,10.45,1.72,6.54,5.36c-14.07,13.1-4.7,46,20.93,73.57C46,98.8,67.9,110.43,84,110.43c6.18,0,11.49-1.72,15.4-5.37,14.07-13.09,4.7-46-20.93-73.56C59.92,11.62,38,0,22,0" transform="translate(0)"></path>
            </svg>
        </div>

        <? $customProdData = [];
        $pathToFSON = $_SERVER["DOCUMENT_ROOT"] . SITE_DIR . 'assets/json/customProductsInfo.json';
        if (file_exists($pathToFSON)) {
            $customProdData = json_decode(json_encode(json_decode(file_get_contents($pathToFSON))), true);
        }
        ?>

        <div class="alulamps__series-wrap">
            <div class="lamp__list alulamps__series-names">
                <? $sectionArr = [];?>
                <? foreach ($customProdData['products'] as $article => $product): ?>
                    <?
                    $section = substr($article, 0, 3);
                    if($section == '905'){
                        $section = '904';
                    } elseif ($section == '907'){
                        $section = '906';
                    }
                    $sectionArr[] = $section;
                    ?>
                    <div class="lamp__item" data-section="<?= $section  ?>">
                        <div class="lamp__content">
                            <div class="lamp__article"><?= $article; ?></div>
                            <a href="<?=SITE_DIR?>catalog/custom-lamps/custom-own-lamp.php?article=<?= $article; ?>" class="lamp__name"><?= $product['name']; ?></a>
                            <div class="lamp__description">
                                <?= $product['description']; ?>
                                <span><?= $product['comments']; ?></span>
                            </div>
                        </div>
                    </div>
                <? endforeach; ?>
                <? for ($i = 900; $i < 909; $i++ ) {
                    if (!in_array($i, $sectionArr)){?>
                        <div class="lamp__item" data-section="<?= $i; ?>">
                            <div class="lamp__content">
                                <div class="lamp__article">Артикулы в стадии наполнения.</div>
                                <div class="lamp__description--custom">
                                    <p>Вы можете оставить <a href="#alulamps__form">заявку на индивидуальный расчет светильника</a></p>
                                </div>
                            </div>
                        </div>
                    <?}
                } ?>
                <div class="lamp__item" data-section="909">
                    <div class="lamp__content">
                        <div class="lamp__description--custom">
                            <p>Возможно изготовление  светильников с различными техническими параметрами. Форма светильника может быть любой: прямая линия, треугольник, квадрат, прямоугольник, трапеция, крест, луч и другие (зависит от проекта освещения). Светильники могут изготавливаться с применением широкого спектра анодированных профилей различных размеров и нескольких стандартных цветов: белый, серебристый и черный. Дополнительная опция — покраска профилей в другие цвета. Важным преимуществом является то, что светильники производятся на базе профилей, лент и блоков питания Arlight, поэтому пожелания заказчика, касающиеся размеров, мощности, температуры свечения, светового потока и CRI могут быть удовлетворены в полном объеме. И это гарантирует высокое качество готовых светильников.</p>
                            <a href="#alulamps__form">Отправить заявку на индивидуальный расчет</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="alulamps__series-list lamp__nav">
                <ul>
                    <li><a href="javacsript:" data-section="900" class="active">Линия</a></li>
                    <li><a href="javacsript:" data-section="901">Квадрат</a></li>
                    <li><a href="javacsript:" data-section="902">Треугольник</a></li>
                    <li><a href="javacsript:" data-section="903">Гексагон</a></li>
                    <li><a href="javacsript:" data-section="904">3-4 луча</a></li>
                    <li><a href="javacsript:" data-section="906">Зигзаг 4-5 линии</a></li>
                    <li><a href="javacsript:" data-section="908">Угол</a></li>
                    <li><a href="javacsript:" data-section="909">Индивидуальное решение</a></li>
                </ul>
            </div>
        </div>
    </div>


    <div class="alulamps__structure">
        <img src="<?=SITE_DIR?>assets/static/aluprofile-luminaires/banner-2.png" alt="">
        <div class="alulamps__structure-legend">
            <ul class="desktop">
                <li><span>1</span>Светильники изготавливаются на основе профиля из&nbsp;высококачественного анодированного алюминия.</li>
                <li><span>4</span>При выборе кабеля учитываются особенности работы светодиодного оборудования.</li>
                <li><span>2</span>В качестве источников света в профильных светильниках используются светодиодные ленты Arlight.</li>
                <li><span>5</span>Важная составляющая профильных светильников — светорассеивающие экраны из поликарбоната и ПММА. Рассеиватели с высокой степенью светопропускания обеспечивают мягкий рассеянный свет.</li>
                <li><span>3</span>Для питания светодиодных лент применяются различные блоки питания, которые способны обеспечить бесперебойную и стабильную работу светодиодных лент.</li>
                <li><span>6</span>Для управления светильниками используется высококачественное оборудование с функцией диммирования, меняющее уровень яркости в диапазоне от 1 до 100%.
                    <br>Диммеры для RGB(W)-оборудования позволяют изменять цвет свечения, а контроллеры программируются на различные сценарии освещения.</li>
            </ul>
            <ul class="mobile">
                <li><span>1</span>Светильники изготавливаются на основе профиля из высококачественного анодированного алюминия.</li>
                <li><span>2</span>В качестве источников света в профильных светильниках используются светодиодные ленты Arlight.</li>
                <li><span>3</span>Для питания светодиодных лент применяются различные блоки питания, которые способны обеспечить бесперебойную и стабильную работу светодиодных лент.</li>
                <li><span>4</span>При выборе кабеля учитываются особенности работы светодиодного оборудования.</li>
                <li><span>5</span>Важная составляющая профильных светильников — светорассеивающие экраны из поликарбоната и ПММА. Рассеиватели с высокой степенью светопропускания обеспечивают мягкий рассеянный свет.</li>
                <li><span>6</span>Для управления светильниками используется высококачественное оборудование с функцией диммирования, меняющее уровень яркости в диапазоне от 1 до 100%.
                    <br>Диммеры для RGB(W)-оборудования позволяют изменять цвет свечения, а контроллеры программируются на различные сценарии освещения.</li>
            </ul>
        </div>
    </div>


    <div class="alulamps__colors">
        <h6>ЛЮБОЙ ЦВЕТ ПРОФИЛЯ</h6>
        <div class="alulamps__colors-descr alulamps__descr">
            <div class="">
                <p>Возможно изготовление профилей любого цвета, что расширяет границы применения.</p>
                <p>Покраска осуществляется порошковым методом с применением высококачественных негорючих красок.</p>
            </div>
            <div class="">
                <p>Порошковое покрытие ровное и стойкое к истиранию, а также абсолютно безопасно.</p>
            </div>
        </div>
        <div class="alulamps__variants">
            <ul>
                <li>
                    <div class="colors__variant colors__variant--white"></div>
                    <p>RAL 9010</p>
                    <span>Белый</span>
                </li>
                <li>
                    <div class="colors__variant colors__variant--black"></div>
                    <p>RAL 9005</p>
                    <span>Глубокий черный</span>
                </li>
                <li>
                    <div class="colors__variant colors__variant--red"></div>
                    <p>RAL 3024</p>
                    <span>Люминесцентный красный</span>
                </li>
                <li>
                    <div class="colors__variant colors__variant--orange"></div>
                    <p>RAL 1037</p>
                    <span>Солнечный желтый</span>
                </li>
                <li>
                    <div class="colors__variant colors__variant--yellow"></div>
                    <p>RAL 1026</p>
                    <span>Люминесцентный желтый</span>
                </li>
                <li>
                    <div class="colors__variant colors__variant--green"></div>
                    <p>RAL 6037</p>
                    <span>Зеленый</span>
                </li>
                <li>
                    <div class="colors__variant colors__variant--lblue"></div>
                    <p>RAL 5012</p>
                    <span>Голубой</span>
                </li>
                <li>
                    <div class="colors__variant colors__variant--blue"></div>
                    <p>RAL 5015</p>
                    <span>Небесно-синий</span>
                </li>
                <li>
                    <div class="colors__variant colors__variant--violet"></div>
                    <p>RAL 5002</p>
                    <span>Ультрамарин</span>
                </li>
            </ul>
        </div>
    </div>


    <div class="alulamps__slider alulamps__slider1">
        <img src="<?=SITE_DIR?>assets/static/aluprofile-luminaires/slide-1-1.jpg" alt="">
        <img src="<?=SITE_DIR?>assets/static/aluprofile-luminaires/slide-1-2.jpg" alt="">
        <img src="<?=SITE_DIR?>assets/static/aluprofile-luminaires/slide-1-3.jpg" alt="">
        <img src="<?=SITE_DIR?>assets/static/aluprofile-luminaires/slide-1-4.jpg" alt="">
        <img src="<?=SITE_DIR?>assets/static/aluprofile-luminaires/slide-1-5.jpg" alt="">
    </div>


    <div class="alulamps__lights">
        <h6>ВЫБОР ОТТЕНКА СВЕЧЕНИЯ</h6>
        <div class="alulamps__lights-descr alulamps__descr">
            <div class="">
                <p>Можно выбрать комфортный оттенок свечения: от теплого до холодного или использовать светодиодные ленты с изменяемой цветовой температурой (MIX). В зависимости от назначения помещения, уровня естественного освещения и времени суток можно настраивать цвет свечения в соответствии с биоритмами человека.</p>
            </div>
            <div class="">
                <p>Правильно подобранный оттенок свечения (бодрящий холодный, нейтральный белый или расслабляющий теплый) способен создать особую атмосферу в помещении и благотворно воздействовать на психоэмоциональное состояние человека.</p>
            </div>
        </div>
        <div class="alulamps__variants">
            <ul>
                <li>
                    <img class="colors__variant" src="<?=SITE_DIR?>assets/static/aluprofile-luminaires/color-Warm-2400.png" alt="">
                    <p>Warm 2400</p>
                    <span>2200-2400 K</span>
                </li>
                <li>
                    <img class="colors__variant" src="<?=SITE_DIR?>assets/static/aluprofile-luminaires/color-Warm-2700.png" alt="">
                    <p>Warm 2700</p>
                    <span>2600-2800 K</span>
                </li>
                <li>
                    <img class="colors__variant" src="<?=SITE_DIR?>assets/static/aluprofile-luminaires/color-Warm-3000.png" alt="">
                    <p>Warm 3000</p>
                    <span>2900-3100 K</span>
                </li>
                <li>
                    <img class="colors__variant" src="<?=SITE_DIR?>assets/static/aluprofile-luminaires/color-Day-4000.png" alt="">
                    <p>Day 4000</p>
                    <span>3800-4200 K</span>
                </li>
                <li>
                    <img class="colors__variant" src="<?=SITE_DIR?>assets/static/aluprofile-luminaires/color-Day-5000.png" alt="">
                    <p>Day 5000</p>
                    <span>4800-5200 K</span>
                </li>
                <li>
                    <img class="colors__variant" src="<?=SITE_DIR?>assets/static/aluprofile-luminaires/color-White-6000.png" alt="">
                    <p>White 6000</p>
                    <span>5800-6500 K</span>
                </li>
                <li>
                    <img class="colors__variant" src="<?=SITE_DIR?>assets/static/aluprofile-luminaires/color-Cool-8K.png" alt="">
                    <p>Cool 8K</p>
                    <span>8100-10000 K</span>
                </li>
                <li>
                    <img class="colors__variant" src="<?=SITE_DIR?>assets/static/aluprofile-luminaires/color-Cool-8K.png" alt="">
                    <p>Cool 15K</p>
                    <span>15000-20000 K</span>
                </li>
            </ul>
        </div>
    </div>


    <div class="alulamps__cri">
        <div class="alulamps__cri-descr alulamps__descr">
            <div class="">CRI</div>
            <div class="">
                <p>
                    <span>Высокий индекс цветопередачи</span>
                    При изготовлении лент используются современные светодиоды Arlight синдексом цветопередачи CRI>90, которые используются в&nbsp;помещениях&nbsp;с повышенными требованиями к качеству света. Высокий CRI максимально точно передает все оттенки окружающих предметов и снижает нагрузку на зрение.
                </p>
            </div>
        </div>
        <img src="<?=SITE_DIR?>assets/static/aluprofile-luminaires/banner-3.png" alt="">
    </div>


    <div class="alulamps__types">
        <h6>ЛИНЕЙНЫЕ ПРОФИЛЬНЫЕ СВЕТИЛЬНИКИ</h6>
        <div class="alulamps__type-wrap">
            <div class="alulamps__type">
                <div class="alulamps__type-img">
                    <img src="<?=SITE_DIR?>assets/static/aluprofile-luminaires/type-lightning-1.png" alt="">
                </div>
                <div class="alulamps__type-features">
                    <div class="alulamps__type-title">
                        Светильники с внешним источником питания
                    </div>
                    <p>Внешний блок питания дает много преимуществ в процессе эксплуатации светильника:</p>
                    <ul>
                        <li>легкий доступ к блоку питания;</li>
                        <li>возможность выбрать практически любой профиль;</li>
                        <li>сечение профиля может быть минимальным, так как блок питания не встраивается внутрь профиля;</li>
                        <li>возможность реализации тонких линий света.</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="alulamps__type-wrap">
            <div class="alulamps__type">
                <div class="alulamps__type-img">
                    <img src="<?=SITE_DIR?>assets/static/aluprofile-luminaires/type-lightning-2.png" alt="">
                </div>
                <div class="alulamps__type-features">
                    <div class="alulamps__type-title">
                        Светильники со встроенным источником питания
                    </div>
                    <p>Для таких светильников подбирают профиль, в котором предусмотрен специальный отсек для блока питания. Часто подбираются широкие профили, в которые можно разместить широкую многорядную ленту или несколько узких лент. Данные типы светильников могут использоваться для создания яркого основного освещения.</p>
                </div>
            </div>
        </div>
        <div class="alulamps__type-wrap">
            <div class="alulamps__type">
                <div class="alulamps__type-img">
                    <img src="<?=SITE_DIR?>assets/static/aluprofile-luminaires/type-lightning-3.png" alt="">
                </div>
                <div class="alulamps__type-features">
                    <div class="alulamps__type-title">
                        Цилиндрические профильные светильники
                    </div>
                    <p>Оригинальные светильники с односторонним иди двусторонним свечением. Внешне напоминают длинную цилиндрическую трубку. Kрасиво смотрятся на длинных подвесах.</p>
                </div>
            </div>
        </div>
        <div class="alulamps__type-wrap">
            <div class="alulamps__type">
                <div class="alulamps__type-img">
                    <img src="<?=SITE_DIR?>assets/static/aluprofile-luminaires/type-lightning-4.png" alt="">
                </div>
                <div class="alulamps__type-features">
                    <div class="alulamps__type-title">
                        Встраиваемые профильные светильники
                    </div>
                    <p>Устанавливаются встраиваемым монтажом в поверхность стен, потолка, пола. Для таких светильников используются как классические профили, так и специализированные, например, для скрытого монтажа, когда алюминиевые части профиля не видны. С помощью встроенных линий можно создавать оригинальные геометрические рисунки и переходы света с потолка на стены и наоборот.</p>
                </div>
            </div>
        </div>
        <div class="alulamps__type-wrap">
            <div class="alulamps__type">
                <div class="alulamps__type-img">
                    <img src="<?=SITE_DIR?>assets/static/aluprofile-luminaires/type-lightning-5.png" alt="">
                </div>
                <div class="alulamps__type-features">
                    <div class="alulamps__type-title">
                        Накладные профильные светильники
                    </div>
                    <p>Отличаются удобством монтажа. Не требуют специальных монтажных отверстий, поэтому их можно интегрировать в помещения с готовым ремонтом. Позволяют создавать стильные световые композиции в интерьере.</p>
                </div>
            </div>
        </div>
        <div class="alulamps__type-wrap">
            <div class="alulamps__type">
                <div class="alulamps__type-img">
                    <img src="<?=SITE_DIR?>assets/static/aluprofile-luminaires/type-lightning-6.png" alt="">
                </div>
                <div class="alulamps__type-features">
                    <div class="alulamps__type-title">
                        Подвесные профильные светильники
                    </div>
                    <p>Подвесные светильники крепятся на специальных монтажных тросах, длину которых можно регулировать. Такие светильники подходят для помещений с любой высотой потолков.</p>
                </div>
            </div>
        </div>
        <div class="alulamps__type-wrap">
            <div class="alulamps__type">
                <div class="alulamps__type-img">
                    <img src="<?=SITE_DIR?>assets/static/aluprofile-luminaires/type-lightning-7.png" alt="">
                </div>
                <div class="alulamps__type-features">
                    <div class="alulamps__type-title">
                        Угловые профильные светильники
                    </div>
                    <p>Для создания угловых светильников используется специальный профиль, который встраивается в угол, образуемый двумя плоскостями. Угловые светильники позволяют организовать основное или декоративное освещение по всему периметру помещения или локальную подсветку ступеней, коридоров, мебели и других зон.</p>
                </div>
            </div>
        </div>

    </div>


    <div class="alulamps__figures">
        <h6>ФИГУРНЫЕ ПРОФИЛЬНЫЕ СВЕТИЛЬНИКИ</h6>
        <div class="alulamps__figures-descr alulamps__descr">
            <div class="">
                <p>Светильники в виде различных геометрических фигур (квадраты, ромбы, круги, трапеции и пр.) часто называют дизайнерскими светильниками.</p>
            </div>
            <div class="">
                <p>При проектировании можно задать любую форму, ограниченную лишь техническими возможностями профиля. Подгонка стыков производится очень тщательно, чтобы конструкция светильника была цельной.</p>
            </div>
        </div>
        <img src="<?=SITE_DIR?>assets/static/aluprofile-luminaires/banner-4.png" alt="">
    </div>


    <div class="alulamps__advantages">
        <h6>ВОЗМОЖНОСТИ И ПРЕИМУЩЕСТВА</h6>
        <ul>
            <li>
                <div class="">Магистральный <br>свет</div>
                <p>Под заказ мы изготовим профильные светильники для&nbsp;создания непрерывных линий света любой длины. Можно выбрать прямые или ломанные линии с&nbsp;любым углом изгиба.</p>
            </li>

            <li>
                <div class="">Широкий выбор аксессуаров</div>
                <p>Большой выбор аксессуаров для&nbsp;удобной эксплуатации и&nbsp;быстрого монтажа.</p>
            </li>
            <li>
                <div class="">Покраска</div>
                <p><b>Любой цвет профиля!</b><br> Покраска порошковым методом с&nbsp;применением высококачественной краски.</p>
            </li>
            <li>
                <div class="">Квалифицированные консультации</div>
                <p>Помощь специалистов на каждом этапе&nbsp;работы — от подачи заявки до&nbsp;монтажа.</p>
            </li>
            <li>
                <div class="">Проекты любых&nbsp;масштабов</div>
                <p>Профессиональная работа с&nbsp;клиентами любого уровня - от&nbsp;частных до&nbsp;коммерческих. Нам&nbsp;важен каждый проект, даже если для него требуется изготовление всего одного профильного светильника.</p>
            </li>
            <li>
                <div class="">Техническое сопровождение</div>
                <p>Полный цикл технического сопровождения вашего проекта: от&nbsp;светотехнического расчета в&nbsp;программе DIALux до реализации, а&nbsp;также последующих технических консультаций.</p>
            </li>
            <li>
                <div class="">Расчет светотехнических проектов</div>
                <p>Мы предоставляем уникальную возможность заранее рассчитать уровень освещенности, количество светильников, подобрать определенные модели под&nbsp;конкретный проект. Фотометрическая лаборатория Arlight оснащена оборудованием ведущей европейской компании Viso&nbsp;Systems, что позволяет исследовать и&nbsp;тестировать любую светотехническую продукцию.</p>
            </li>
            <li>
                <div class="">Гарантия качества</div>
                <p>100% гарантия качества светильников Arlight за счет использования высококачественных комплектующих и&nbsp;контроля качества на всех этапах. Сборка осуществляются опытными специалистами на&nbsp;высокотехнологичном оборудовании&nbsp;завода.</p>
            </li>
        </ul>
    </div>


    <div class="alulamps__slider alulamps__slider2">
        <img src="<?=SITE_DIR?>assets/static/aluprofile-luminaires/slide-2-1.jpg" alt="">
        <img src="<?=SITE_DIR?>assets/static/aluprofile-luminaires/slide-2-2.jpg" alt="">
        <img src="<?=SITE_DIR?>assets/static/aluprofile-luminaires/slide-2-3.jpg" alt="">
        <img src="<?=SITE_DIR?>assets/static/aluprofile-luminaires/slide-2-4.jpg" alt="">
        <img src="<?=SITE_DIR?>assets/static/aluprofile-luminaires/slide-2-5.jpg" alt="">
    </div>


    <div class="alulamps__architect">
        <h6>ДЛЯ ДИЗАЙНЕРОВ И АРХИТЕКТОРОВ</h6>
        <div class="alulamps__descr alulamps__architect-descr">
            <div class=""><p>Мы стремимся создать комфортную среду при сотрудничестве с дизайнерами и архитекторами. </p></div>
            <div class="">
                <p>Воплощаем в жизнь самые смелые идеи и оказываем всестороннюю поддержку на всех этапах реализации.</p>
            </div>
        </div>
    </div>


    <div class="alulamps__form" id="alulamps__form">
        <div class="feedback">
            <form action="javascript:void(0)" id="alulamp__request" name="alulamp__request">
                <?= bitrix_sessid_post() ?>
                <div class="order-title">РАССЧИТАТЬ ИНДИВИДУАЛЬНОЕ РЕШЕНИЕ</div>
                <br><br>
                <div class="order__form">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="order__form-input">
                                <div class="order__form-input-title">Имя*</div>
                                <input class="input input--indefinite" type="text" id="feedback[NAME]" name="name" required="" value="<?= $firstname; ?>" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="order__form-input">
                                <div class="order__form-input-title">Фамилия*</div>
                                <input class="input input--indefinite" type="text" id="feedback[LAST_NAME]" name="surname" required="" value="<?= $surname; ?>" autocomplete="off">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="order__form-input ">
                                <div class="order__form-input-title">E-Mail*</div>
                                <input class="input input--indefinite" type="email" maxlength="250" required="" id="feedback[EMAIL]" name="email" value="<?= $email; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="order__form-input ">
                                <div class="order__form-input-title">Телефон/факс*</div>
                                <input class="input input--indefinite" type="text" maxlength="250" required="" id="feedback[PERSONAL_PHONE]" name="phone" value="<?= $phone; ?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="order__form-input ">
                                <div class="order__form-input-title">Описание задачи по изготовлению светильников</div>
                                <textarea class="input input--textarea input--indefinite" rows="1" name="msg" id="feedback[MSG]"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-12 row-end">
                            <input type="text" name="type" id="quest_4" class="input hidden" hidden="" value="quest_4">
                            <input type="text" name="test_input" id="test_input_alulamps" class="input hidden" hidden="">
                            <button class="button button_red button--main button_full" type="submit">отправить</button>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        if($('.alulamps').length){
            $('.content-wrapper').addClass('content-wrapper__alulamps')
        }

        var slider = $('.alulamps__slider');
        slider.slick({
            infinite: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: false,
            prevArrow: '<div class="slider__nav-arrow slider__nav-arrow--left">' +
                '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50.5 96"><polygon points="4.9 48 50.5 2.5 48 0 0 48 48 96 50.5 93.5 4.9 48"></polygon></svg>' +
                '</div>',
            nextArrow: '<div class="slider__nav-arrow slider__nav-arrow--right">' +
                '<svg class="big-banner__nav-img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50.5 96"><polygon points="45.5 48 0 93.5 2.5 96 50.5 48 2.5 0 0 2.5 45.5 48"></polygon></svg>' +
                '</div>'
        });

        var lampsSlider = $('.alulamps__series-names');
        lampsSlider.slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: false,
            arrows: true,
            swipe: true
        });

        $(('[data-section="900"]')).trigger('click');

        $(document).on('click', '.alulamps__series-list a, .alulamps__series-logo svg', function (e) {
            var section = $(this).attr('data-section');
            $('.alulamps__series-logo svg').removeClass('active');
            $('.alulamps__series-list a').removeClass('active');
            $('.alulamps__series-logo').find('[data-section='+section+']').addClass('active');
            $('.alulamps__series-list').find('[data-section='+section+']').addClass('active');
            var prSlider = $('.alulamps__series-wrap').find('.alulamps__series-names');
            prSlider.slick('slickUnfilter').slick('slickFilter', '[data-section=' + section+']');
            $('.lamp__item').show();
            if((e.target).tagName == 'svg' || $(e.target).parents('svg').length){
                var wHeight = $(window).height();
                $('.alulamps__structure').scrollTop(60);
                var destination = $('.alulamps__structure').offset().top - wHeight + 20;
                $('html, body').animate({ scrollTop: destination  }, 300);
            }
        });

        $(window).scroll(function(){
            function isInViewport(element) {
                var rect = element.getBoundingClientRect();
                var html = document.documentElement;
                return (
                    rect.top
                );
            }

            if($(window).scrollTop() > 500){
                $('.alulamps__header-button').addClass('fixed');
            } else {
                $('.alulamps__header-button').removeClass('fixed');
            }
            $(".alulamps__form").each(function(index,element){
                if(isInViewport(element) < ($(window).height() - 2*($('.header').height())) ){
                    $('.alulamps__header-button').removeClass('fixed');

                }
            })
        })

    });


</script>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
