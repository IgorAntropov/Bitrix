<?php
global $yaMetricaCalc;
?>
<div class="block">
    <div class="master-calc-wrapper">
        <div class="master-calc">
            <?php include 'calc.php'; ?>
            <?
            if(true){
                //фикс калькулятора по просьбе Кульбашного Сергея
                $power = $voltage = $id6Key = $id7key = $id6Value = $id7Value = false;
                foreach ($masterCalcConfiguration['items'] as $key => $item){
                    if($item['id'] == '31') $power = $item['result'];
                    if($item['id'] == '0') $voltage = $item['result'];
                    if($item['id'] == '2') $powerPerMeter = $item['result'];
                    if($item['id'] == '8') $calcType = $item['result'];
                    if($item['id'] == '9') $ledsPerSec = $item['result'];
                    if($item['id'] == '6'){
                        $id6Key = $key;
                        $id6Value = $item['result'];
                    }
                    if($item['id'] == '7'){
                        $id7Key = $key;
                        $id7Value = $item['result'];
                    }
                }
                if((float)$power && (float)$voltage){
                    $amperage = (float)$power/(float)$voltage;
                    $id6ValueNew = false;
                    $id7ValueNew = false;
                    $arrChange = [5 => 0.5, 10 => 0.75, 15 => 1, 18 => 1.5, 25 => 2.5, 32 => 4, 40 => 6, 55 => 10, 80 => 16, 100 => 25, 125 => 35, 160 => 50, 195 => 70, 245 => 95, 295 => 120];
                    foreach(array_keys($arrChange) as $key){
                        if($amperage <= $key){
                            $id6ValueNew = $arrChange[$key];
                            $id7ValueNew = $arrChange[$key];
                            break;
                        }
                    }
                    if((float)$id6ValueNew && (float)$id6Value && $id6Value < $id6ValueNew && $id6Key) $masterCalcConfiguration['items'][$id6Key]['result'] = $id6ValueNew;
                    if((float)$id7ValueNew && (float)$id7Value && $id7Value < $id7ValueNew && $id7Key) {
                        $masterCalcConfiguration['items'][$id7Key]['result'] = $id7ValueNew;
                    }elseif ((float)$id7Value && $id7Key && !in_array((float)$id7Value,array_values($arrChange))){
                        foreach(array_values($arrChange) as $value){
                            if((float)$value > (float)$id7Value){
                                $masterCalcConfiguration['items'][$id7Key]['result'] = (float)$value;
                                break;
                            }
                        }
                    }
                    if((float)$masterCalcConfiguration['items'][$id6Key]['result'] !== (float)$masterCalcConfiguration['items'][$id7Key]['result']){
                        $id7ValueCanBe = false;
                        foreach(array_values($arrChange) as $value){
                            if((float)$value > (float)$masterCalcConfiguration['items'][$id6Key]['result']){
                                $id7ValueCanBe = (float)$value;
                                break;
                            }
                        }
                        if($id7ValueCanBe && $id7ValueCanBe < (float)$masterCalcConfiguration['items'][$id7Key]['result']){
                            $masterCalcConfiguration['items'][$id7Key]['result'] = $id7ValueCanBe;
                        }
                    }

                }
            }
            ?>
            <div class="calc-block calc-block--indent-bottom" data-calc="<?= $masterCalcConfiguration['uniqueCalcId'] ?>">
                <form action="" id="form-<?= $masterCalcConfiguration['uniqueCalcId'] ?>" <?= $yaMetricaCalc; ?> class="calc-block__form">
                    <?
                    foreach ($masterCalcConfiguration['items'] as $key => $item):
                        if ($item['id'] == 31) {
                            ?>
                            <div class="calc-block__section calc-block__section--result calc-block__section--result-indent">
                            <svg class="icon">
                                <use xlink:href="#ic_dang"></use>
                            </svg>
                            <div class="js-calc-result calc-block__param" data-param="">
                                <div class="calc-block__title"><?= $item['title'] ?></div>
                                <div class="calc-block__value"><span
                                            class="js-calc-result--value calc-block__value-result">&nbsp;<?= $item['result'] ?></span>
                                </div>
                            </div>
                            <?php
                            continue;
                        }

                        if ($item['id'] == 6) {
                            ?>

                            <div class="js-calc-result calc-block__param" data-param="">
                                <div class="calc-block__title"><?= $item['title'] ?></div>
                                <div class="calc-block__value"><span
                                            class="js-calc-result--value calc-block__value-result">&nbsp;<?= $item['result'] ?></span>
                                </div>
                            </div>
                            <?php
                            continue;
                        }

                        if ($item['id'] == 7) {
                            ?>
                            <div class="js-calc-result calc-block__param" data-param="">
                                <div class="calc-block__title"><?= $item['title'] ?></div>
                                <div class="calc-block__value"><span
                                            class="js-calc-result--value calc-block__value-result">&nbsp;<?= $item['result'] ?></span>
                                </div>
                            </div>
                            </div>
                            <?php
                            continue;
                        }

                        if ($item['id'] == 'SELECT_TYPE') {
                            ?>
                            <div class="calc-block__section calc-block__section--wrap">
                            <?php
                        }
                        ?>
                        <?= !isset($item['id']) || $item['id'] == '' ? ' <span style="color: red; font-weight: bold; text-transform: uppercase;">'.GetMessage("ARLIGHT_ARSTORE_NE_ZAPOLNEN").'</span><br>' : '' ?>
                        <?
                        if (isset($item['id']) && $item['id'] != '') {
                            foreach ($masterCalcConfiguration['items'] as $key22 => $item22) {
                                if ($key22 != $key && $item['id'] == $item22['id']) {
                                    echo ' <span style="color: red; font-weight: bold; text-transform: uppercase;">Id' . $item['id'] . ' '.GetMessage("ARLIGHT_ARSTORE_NE_UNIKALEN").'</span><br>';
                                }
                            }
                        }
                        ?>
                        <div class="calc-block__param calc-block__param--indent-bottom w100 <?= isset($item['class']) && $item['class'] != '' ? $item['class'] : '' ?>"
                             data-param="1" data-index="<?= $key ?>" data-param="<?= $key ?>"
                            <?= isset($item['id']) && $item['id'] != '' ? ' id="master-calc-item-' . $masterCalcConfiguration['uniqueCalcId'] . '-' . $item['id'] . '" ' : '' ?>
                            <?= isset($item['name']) && $item['name'] != '' ? ' data-name="' . $item['name'] . '" ' : '' ?>
                             style="<?= (isset($item['visible']) && $item['visible'] === false) ? 'width: 0; height:0; overflow: hidden; margin: 0 !important; padding: 0 !important;' : '' ?>"
                        >
                            <div class="calc-block__param-title-wrapper">
                                <div class="calc-block__param-title"><?= $item['title'] ?></div>
                            </div>
                            <div class="calc-block__param-value">
                                <?= $item['html'] ?>
                            </div>
                        </div>
                        <?php
                        if ($item['id'] == '8') {
                            ?>
                            </div>
                            <?php
                        }
                    endforeach; // foreach ($masterCalcConfiguration['items'] as $item):
                    ?>
                    <?
                    $arrRibbonLength = $arrCabelLength = [1,2,3,5,10,20,30,50,100];
                    $arrChange = [8 => 0.5, 12 => 0.75, 15 => 1, 18 => 1.5, 25 => 2.5, 32 => 4, 40 => 6, 55 => 10, 80 => 16, 100 => 25, 125 => 35, 160 => 50, 195 => 70, 245 => 95, 295 => 120];
                    $standartSizes = array(0.5, 0.75, 1, 1.5, 2.5, 4, 6, 10, 16, 25, 35, 50, 70, 95, 120);
                    $deltaV12 = $calcType ? 0.7 : 0.35;
                    $deltaV24 = $calcType ? 1 : 0.5;
                    if ($voltage == 24){
                        switch ($ledsPerSec){
                            case '7':
                            case '14':
                            case '21':
                            case '28':
                            case '35':
                                $deltaV24 = $calcType ? 0.7 : 0.35;
                                break;
                            case '8':
                            case '9':
                            case '16':
                                $deltaV24 = $calcType ? 0.35 : 0.175;
                        }
                    }
                    $arrVoltageDrop = [5 => 0.5, 12 => $deltaV12, 24 => $deltaV24, 36 => 1.5, 48 => 2];
                    ?>
                    <div class="calc-block__section calc-block__section--result calc-block__section--result-table">
                        <table>
                            <tr>
                                <th colspan="2" class="calc-block__title">Длина ленты</th>
                                <? foreach ($arrRibbonLength as $rLength):?>
                                    <th class="calc-block__subtitle"><?=$rLength ?> <span>м</span></th>
                                <? endforeach;?>
                            </tr>
                            <tr>
                                <th colspan="2" class="calc-block__title">Мощность ленты</th>
                                <? foreach ($arrRibbonLength as $rLength):?>
                                    <th class="calc-block__subtitle"><?= $rLength * $powerPerMeter; ?> <span>Вт</span></th>
                                <? endforeach;?>
                            </tr>
                            <? foreach ($arrCabelLength as $key => $cLength):?>
                                <tr>
                                    <? if($key == 0) :?>
                                        <th rowspan="<?= count($arrCabelLength); ?>" class="calc-block__title"><span>Длина кабеля</span></th>
                                    <? endif; ?>
                                    <th class="calc-block__subtitle"><?= $cLength; ?> <span>м</span></th>
                                    <? foreach ($arrRibbonLength as $rLength):?>
                                        <? $calcSection = ((0.034 * $powerPerMeter * $rLength * $cLength) / ($voltage * $arrVoltageDrop[$voltage]));
                                        $recommendSection = $calcSection;
                                        foreach($standartSizes as $value){
                                            if($calcSection && $calcSection <= $value){
                                                $recommendSection = $value;
                                                break;
                                            }
                                        }
                                        $calcAmperage = ($powerPerMeter * $rLength) / $voltage;
                                        foreach(array_keys($arrChange) as $key){
                                            if($calcAmperage && $calcAmperage <= $key){
                                                $amperSection = $arrChange[$key];
                                                break;
                                            }
                                        }
                                        $recommendSection = ($amperSection > $recommendSection) ? $amperSection : $recommendSection;
                                        ?>
                                        <td class="calc-block__table-result">
                                            <?= in_array($recommendSection, $standartSizes) ? $recommendSection .' <span>мм<sup>2</sup></span>' : 'H/Д'; ?>
                                        </td>
                                    <? endforeach;?>
                                </tr>
                            <? endforeach;?>
                        </table>
                    </div>
                    <div class="calc-block__buttons master-calc-buttons">
                        <div class="calc-block__buttons-item">
                            <button type="submit" class="button button_gray button--main" name="register_submit_button" value="1">
                                <span class="button__text button__text--main"><?=GetMessage("ARLIGHT_ARSTORE_PROIZVESTI_RASCET")?></span>
                            </button>
                        </div>
                        <div class="calc-block__buttons-item">
                        </div>
                        <div class="calc-block__buttons-item">
                            <a href="<?= $currentPage ?>" class="calc-block__link" data-service="CALC_RESET"><?=GetMessage("ARLIGHT_ARSTORE_SBROSITQ_DANNYE")?></a>
                        </div>
                    </div>
                    <?
                    $ONE_LINE = false;
                    foreach ($masterCalcConfiguration['items'] as $key => $item):
                        ?>
                        <?php
                        if (isset($item['messages']) && count($item['messages'])) {
                            ?>
                            <div class="calc-block__param-messages">
                                <?php
                                foreach ($item['messages'] as $message) {
                                    if(isset($message['ONE_LINE'])){
                                        $ONE_LINE = json_decode($message['ONE_LINE'], true);
                                        continue;
                                    }
                                    ?>
                                    <div class="message">
                                        <?= $message ?>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                            <?php
                        } else {
                            ?>
                            <div class="calc-block__param calc-block__param--empty"></div>
                            <?php
                        }
                    endforeach;
                    ?>
                    <input type="hidden" name="m-c[componentCalcFile]" data-name="componentCalcFile"
                           value="<?= $componentPath ?>/calc.php">
                    <input type="hidden" name="m-c[componentCalcFile]" data-name="templateCalcFile"
                           value="<?= $templatePath ?>/calc.php">
                    <input type="hidden" name="m-c[componentPath]" data-name="componentPath" value="<?= $componentPath ?>">
                    <input type="hidden" name="m-c[templatePath]" data-name="templatePath" value="<?= $templatePath ?>">
                    <input type="hidden" name="m-c[showHideStatus]" data-name="showHideStatus" value="<?= $showHideStatus ?>">
                    <input type="hidden" name="uniqueCalcId" data-name="uniqueCalcId"
                           value="<?= $masterCalcConfiguration['uniqueCalcId'] ?>">
                    <input type="hidden" name="currentPage" data-name="currentPage" value="<?= $currentPage ?>">
                </form>
            </div>
            <script>
                var calcForm = document.querySelector('.master-calc-wrapper');
                calcForm.addEventListener('click', function () {
                    if (document.querySelector('.calc-block__param-messages')) {
                        var quickView = document.querySelector('.catalog-item__button--view'),
                            links = Array.from(quickView.querySelectorAll('a')),
                            tile = document.querySelector('.message .catalog-item');
                        links[0].href = links[1].href;
                        if ((window.innerWidth < 1024) && (!tile.classList.contains('catalog-item--media'))) {
                            tile.classList.add('catalog-item--media');
                        }
                    }
                });
            </script>
        </div>
        <?php
        // Вывод лент по артикулу
        if($ONE_LINE){
            $addToFilter = array(
                'SECTION_ID' => GetIdSectionFromXmlId(SECTION_SL_XML_ID),
                $ONE_LINE,
            );
            ?>
            <div class="master-calc-products">
                <?php include $_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH.'/components/itertech/master_calc/products_list_with_filter.php'; ?>
            </div>
            <?php
        }
        ?>
    </div>
</div>


