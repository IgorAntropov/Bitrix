<?php
global $yaMetricaCalc;
?>
<div class="block">
    <div class="master-calc-wrapper">
        <div class="master-calc">
            <?php include 'calc.php';  ?>
            <div class="calc-block calc-block--indent-bottom" data-calc="<?= $masterCalcConfiguration['uniqueCalcId'] ?>">
                <form action="" id="form-<?= $masterCalcConfiguration['uniqueCalcId'] ?>" class="calc-block__form" <?= $yaMetricaCalc; ?>>
                    <?php
                    foreach ($masterCalcConfiguration['items'] as $key => $item):
                        $item['id'] = (string)$item['id'];
                        if ($item['id'] === '10') {
                            ?>
                            <div class="calc-block__section calc-block__section--field">
                                <div class="calc-block__param calc-block__param--indent-bottom">
                                    <div class="calc-block__param-title-wrapper">
                                        <div class="calc-block__param-title"><?= $item['title'] ?></div>
                                    </div>
                                    <div class="calc-block__param-value">
                                        <?= $item['html']; ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                            continue;
                        }

                        if ($item['id'] === '12') {
                            ?>
                            <div class="calc-block__section calc-block__section--result calc-block__section--result-indent">
                                <svg class="icon">
                                    <use xlink:href="#ic_dang"></use>
                                </svg>
                                <div class="js-calc-result calc-block__param" data-param="">
                                    <div class="calc-block__title"><?= $item['title'] ?></div>
                                    <div class="calc-block__value"><span
                                                class="js-calc-result--value calc-block__value-result">&nbsp;<?= $item['html']; ?></span>
                                    </div>
                                </div>
                            </div>
                            <?php
                            continue;
                        }

                        if ($item['id'] === '7') {
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

                        if ($item['id'] === '8') {
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

                        if ($item['id'] === 'SELECT_TYPE') {
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
                             style="<?= (isset($item['visible']) && $item['visible'] === false) ? 'width: 0; height:0; overflow: hidden;' : '' ?>">
                            <div class="calc-block__param-title-wrapper">
                                <div class="calc-block__param-title"><?= $item['title'] ?></div>
                            </div>
                            <div class="calc-block__param-value">
                                <?= $item['html'] ?>
                            </div>
                        </div>
                        <?php
                        if ($item['id'] === '0') {
                            ?>
                            </div>
                            <?php
                        }
                    endforeach; // foreach ($masterCalcConfiguration['items'] as $item):
                    ?>
                    <div class="calc-block__buttons master-calc-buttons">
                        <div class="calc-block__buttons-item">
                            <button type="submit" class="button button_gray button--main" name="register_submit_button" value="1">
                                <span class="button__text button__text--main"><?=GetMessage("ARLIGHT_ARSTORE_PODSCITATQ_I_OTOBRAZ")?></span>
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
                        ?>
                    <?
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
                (function() {
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

                    changeSelectType('[data-select]', 'data-select-type', 'data-select-block');
                })();
            </script>
        </div>
        <?php
        $FMin = false;
        $FMax = false;
        $fMin = false;
        $fMax = false;
        foreach ((array)$arResult['CONFIGURATION']['items'] as $k => $v) {
            if ($v['name'] == 'F' && isset($v['result']) && $v['result'] != '') {
                $FMin = $v['result'] * 0.9;
                $FMax = $v['result'] * 1.25;
            }
            if ($v['name'] == 'f' && isset($v['result']) && $v['result'] != '') {
                $fMin = $v['result'] * 0.9;
                $fMax = $v['result'] * 1.25;
            }
        }

        // Светильники по артикулу
        if($ONE_LINE) {
            if ($FMin !== false && $FMax !== false && $fMin !== false && $fMax !== false) {
                $addToFilter = array(
                    'SECTION_ID' => GetIdSectionFromXmlId(SECTION_SS_XML_ID),
                    $ONE_LINE,
                    array(
                        'LOGIC' => 'AND',
                        '>=PROPERTY_C_8_MIN' => (float)$FMin,
                        '<=PROPERTY_C_8_MAX' => (float)$FMax
                    ),
                    array(
                        'LOGIC' => 'AND',
                        '>=PROPERTY_N_5' => (float)$fMin,
                        '<=PROPERTY_N_5' => (float)$fMax
                    )
                );
                ?>
                <div class="master-calc-products">
                    <?php include $_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH.'/components/itertech/master_calc/products_list_with_filter.php'; ?>
                </div>
                <?php
            }
        }


        // Светильники, попадающие в выборку по характеристикам
        if ($FMin !== false && $FMax !== false && $fMin !== false && $fMax !== false) {
            $addToFilter = array(
                'SECTION_ID' => GetIdSectionFromXmlId(SECTION_SS_XML_ID),
                array(
                    'LOGIC' => 'AND',
                    '>=PROPERTY_C_8_MIN' => (float)$FMin,
                    '<=PROPERTY_C_8_MAX' => (float)$FMax
                ),
                array(
                    'LOGIC' => 'AND',
                    '>=PROPERTY_N_5' => (float)$fMin,
                    '<=PROPERTY_N_5' => (float)$fMax
                )
            );
            ?>
            <div class="master-calc-products">
                <div class="master-calc-products--title"><?=GetMessage("ARLIGHT_ARSTORE_SVETILQNIKI_SO_SVETO")?><?= $FMin ?> <?=GetMessage("ARLIGHT_ARSTORE_LM_DO")?><?= $FMax ?> <?=GetMessage("ARLIGHT_ARSTORE_LM_I_UGLOM_OBZORA_OT")?><?= $fMin ?><?=GetMessage("ARLIGHT_ARSTORE_DO")?><?= $fMax ?><?=GetMessage("ARLIGHT_ARSTORE_")?></div>
                <?php include $_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH.'/components/itertech/master_calc/products_list_with_filter.php'; ?>
            </div>
            <?php
        }
        ?>
    </div>
</div>
