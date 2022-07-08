<?

/*
if (isset($_REQUEST['m-c'])) {
	$calcData = $_REQUEST['m-c'];
}
*/


if (defined("B_PROLOG_INCLUDED")) {
    define('IS_AJAX', false);
} else {
    define('IS_AJAX', true);
}

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true && $_REQUEST['m-c']) {
    /* если AJAX */
    define('LANG', 's1');
    define('SITE_ID', 's1');
    define("NO_KEEP_STATISTIC", true);
    require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");
    CModule::IncludeModule('main');


    if (isset($_REQUEST['m-c']['componentPath'])) {
        $componentPath = htmlspecialcharsbx($_REQUEST['m-c']['componentPath']);
    }

    if (isset($_REQUEST['m-c']['templatePath'])) {
        $templatePath = htmlspecialcharsbx($_REQUEST['m-c']['templatePath']);
    }
}


global $GRPS;
// H::d($GRPS);
if (in_array(124, $GRPS)) {
    define('TECH_MODE', true);
} else {
    define('TECH_MODE', false);
}

$masterCalcConfiguration = array();
include $_SERVER['DOCUMENT_ROOT'] . '/' . $templatePath . '/configuration.php';
// $masterCalcErrors = array();

/* event onStart */
$conf = $masterCalcConfiguration;
foreach ($conf['items'] as $k => $item) {
    if (isset($item['onStart']) && !empty($item['onStart'])
        && function_exists($item['onStart'])
    ) {
        $evCode = $item['onStart'] . '($k, $conf[\'items\']);';
        @eval($evCode);
    }
}
$masterCalcConfiguration = $conf;



$calcData = false;
if (isset($_REQUEST['m-c']) && isset($_REQUEST['uniqueCalcId']) && ($_REQUEST['uniqueCalcId'] == $masterCalcConfiguration['uniqueCalcId'])) {
    $calcData = $_REQUEST['m-c'];
}

/*
 * отображать/скрывать поля у которых установлен флаг showHideFlag 
 */
$showHideStatus = 1;
if (isset($calcData['showHideStatus'])) {
    $showHideStatus = (int)$calcData['showHideStatus'];
}

//if (!TECH_MODE) {
//    $showHideStatus = 0;
//}

$showHideButton = false;

// H::d($_POST);


if ($calcData) {

    //
    $conf = $masterCalcConfiguration;

    /* просчёт данных */
    foreach ($conf['items'] as $k => $item) {
        if ($item['type'] == 'field' && in_array($item['fieldType'], array('text', 'select', 'radio'))) {
            if (isset($calcData[$item['name']]) && $calcData[$item['name']] != '') {
                $tmpResult = str_replace(',', '.', $calcData[$item['name']]);
                $tmpResult = (float)$tmpResult;
                $conf['items'][$k]['result'] = $tmpResult;
            }
        }
    }

    foreach ($conf['items'] as $k => $item) {

        if ($item['type'] == 'formula') {

            $conf['items'][$k]['originalFormula'] = $conf['items'][$k]['formula'];

            foreach ($conf['items'] as $k2 => $item2) {
                if (isset($item2['name']) && isset($item2['result']) && $item2['result'] != '') {
                    $conf['items'][$k]['formula'] = str_replace('[' . $item2['name'] . ']', $item2['result'], $conf['items'][$k]['formula']);
                }
            }
            $conf['items'][$k]['formula'] = str_replace(',', '.', $conf['items'][$k]['formula']);

            if (stripos($conf['items'][$k]['formula'], '[') === false && stripos($conf['items'][$k]['formula'], ']') === false) {
                // $tmpCode =
                $evCode = '$conf[\'items\'][' . $k . '][\'result\'] = ' . $conf['items'][$k]['formula'] . ';';
                // echo $evCode . "<br>";
                @eval($evCode);
                // echo '$conf[\'items\'][' . $k . '][\'result\'] = ' . $conf['items'][$k]['formula'] . ';';
            } else {
                // $conf['items'][$k]['errors'][] = 'Нет некоторых данных для подсчёта';
            }
        }

        if (isset($item['onCalculation']) && !empty($item['onCalculation'])
            && function_exists($item['onCalculation'])
        ) {
            $evCode = $item['onCalculation'] . '($k, $conf[\'items\']);';
            // echo $evCode;
            @eval($evCode);
            // H::d($conf['items']);
        }

    }
    /* /просчёт данных */
    


    include 'MCValidator.php';
    /* валидация данных */
    foreach ($conf['items'] as $k => $item) {
        if ($item['type'] == 'field' && in_array($item['fieldType'], array('text', 'select', 'radio'))) {

            if (!isset($conf['items'][$k]['validation']) || !count($conf['items'][$k]['validation'])) {
                $conf['items'][$k]['validation'][] = 'required';
            }

            foreach ($conf['items'][$k]['validation'] as $validationKey => $validationInfo) {
                if (is_array($validationInfo)) {
                    $vRes = MCValidator::check($conf['items'][$k]['result'], $validationKey, $validationInfo);
                } else {
                    $vRes = MCValidator::check($conf['items'][$k]['result'], $validationInfo);
                }
                if (!isset($conf['items'][$k]['errors'])) $conf['items'][$k]['errors'] = array();
                $conf['items'][$k]['errors'] = array_merge($conf['items'][$k]['errors'], $vRes['errors']);
                if (!isset($conf['items'][$k]['messages'])) $conf['items'][$k]['messages'] = array();
                $conf['items'][$k]['messages'] = array_merge($conf['items'][$k]['messages'], $vRes['messages']);
                // H::d($vRes);
            }
            /*
            if (!isset($conf['items'][$k]['result']) || $conf['items'][$k]['result'] == '') {
                $conf['items'][$k]['errors'][] = 'Пустое поле';
            }
            */
        }

        if ($item['type'] == 'formula') {
            if (stripos($conf['items'][$k]['formula'], '[') !== false || stripos($conf['items'][$k]['formula'], ']') !== false) {
                $conf['items'][$k]['errors'][] = GetMessage("ARLIGHT_ARSTORE_NET_NEKOTORYH_DANNYH");
            }
        }
    }
    /* /валидация данных */

    // H::d($conf);


    $masterCalcConfiguration = $conf;
    // H::d($masterCalcConfiguration);
}


?>
<!--
<?= $masterCalcConfiguration['uniqueCalcId'] ?>
-->
<!--
<?= $templatePath ?>
-->
<div class="calc-block calc-block--indent-bottom" data-calc="<?= $masterCalcConfiguration['uniqueCalcId'] ?>">
<?=$masterCalcConfiguration['uniqueCalcId']?>
<form action="" id="form-<?= $masterCalcConfiguration['uniqueCalcId'] ?>" 
class="<?= TECH_MODE ? 'master-calc-tech-mode' : 'master-calc-normal-mode' ?> calc-block__form"
>
    <?
    foreach ($masterCalcConfiguration['items'] as $key => $item):
        /*
        if (isset($item['visible']) && $item['visible'] === false) {
            continue;
        }
        */
        if (isset($item['showHideFlag']) && $item['showHideFlag'] == 1) {
            $showHideButton = true;
        }
//        if (!TECH_MODE) {
//            $showHideButton = false;
//        }
        ?>
        <div class="calc-block__param calc-block__param--indent-bottom master-calc-item master-calc-item-<?= $item['type'] ?> <?= $item['type'] == 'field' ? 'master-calc-item-' . $item['type'] . '-' . $item['fieldType'] : '' ?> <?= isset($item['class']) && $item['class'] != '' ? $item['class'] : '' ?>
	<?= isset($item['showHideFlag']) && $item['showHideFlag'] == '1' ? ' master-calc-item-show-hide ' : '' ?>
	<?= isset($item['showHideFlag']) && $item['showHideFlag'] == '1' && $showHideStatus == 0 ? 'master-calc-item-hide' : '' ?>"
             data-index="<?= $key ?>" data-param="<?= $key ?>"
            <?= isset($item['id']) && $item['id'] != '' ? ' id="master-calc-item-' . $masterCalcConfiguration['uniqueCalcId'] . '-' . $item['id'] . '" ' : '' ?>
            <?= isset($item['name']) && $item['name'] != '' ? ' data-name="' . $item['name'] . '" ' : '' ?>
            <?= isset($item['showHideFlag']) && $item['showHideFlag'] == '1' ? ' data-show-hide-flag="1" ' : '' ?>
            style="<?=(isset($item['visible']) && $item['visible'] === false) ? 'width: 0; height:0; overflow: hidden;' : '' ?>"
        >
            <!--
	<?= '#master-calc-item-' . $masterCalcConfiguration['uniqueCalcId'] . '-' . $item['id'] . '' ?>
	-->
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


            <?
            if (isset($item['messages']) && count($item['messages'])) {
                ?>
                <div class="messages">
                    <?
                    foreach ($item['messages'] as $message) {
                        ?>
                        <div class="message">
                            <?= $message ?>
                        </div>
                        <?
                    }
                    ?>
                </div>
                <?
            }
            ?>

            <?
            if (isset($item['errors']) && count($item['errors'])) {
                ?>
                <div class="errors">
                    <?
                    foreach ($item['errors'] as $error) {
                        ?>
                        <div class="error">
                            <?= $error ?>
                        </div>
                        <?
                    }
                    ?>
                </div>
                <?
            }
            ?>



            <?
            if ($item['type'] == 'field') {
                /*
                if (isset($calcData[$item['name']]) && empty($calcData[$item['name']])) {
                    $masterCalcErrors[] = 'empty';
                    echo 'empty';
                }
                */
                if ($item['fieldType'] == 'text') {
                    $showValue = '';
                    if (isset($item['defaultValue'])) {
                        $showValue = $item['defaultValue'];
                    }
                    if (isset($calcData[$item['name']])) {
                        $showValue = $calcData[$item['name']];
                    }
                    if (isset($item['result'])) {
                        $showValue = $item['result'];
                    }

                    ?>

                    <label class="calc-block__param-title" for="field-<?= $masterCalcConfiguration['uniqueCalcId'] ?>-<?= $item['name'] ?>">
                        <?= $item['title'] ?>
                    </label>
                    <div class="calc-block__param-value">
                    <input type="text" name="m-c[<?= $item['name'] ?>]"
                           value="<?= $showValue ?>" <?= isset($item['attributes']) ? $item['attributes'] : '' ?>
                           id="field-<?= $masterCalcConfiguration['uniqueCalcId'] ?>-<?= $item['name'] ?>"
                           class="calc-block__input"
                           onblur="masterCalcExecution(this.closest('form'));"
                    >
                    </div>
                    <?
                }
                ?>
                <?
                if ($item['fieldType'] == 'select') {

                    $showValue = '';
                    if (isset($item['defaultValue'])) {
                        $showValue = $item['defaultValue'];
                    }
                    if (isset($calcData[$item['name']])) {
                        $showValue = $calcData[$item['name']];
                    }
                    if (isset($item['result'])) {
                        $showValue = $item['result'];
                    }

                    ?>
                    <label class="calc-block__param-title" for="field-<?= $masterCalcConfiguration['uniqueCalcId'] ?>-<?= $item['name'] ?>">
                        <?= $item['title'] ?>
                    </label>
                    <div class="calc-block__param-value">
                    <select class="calc-block__select" name="m-c[<?= $item['name'] ?>]" <?= isset($item['attributes']) ? $item['attributes'] : '' ?>
                            id="field-<?= $masterCalcConfiguration['uniqueCalcId'] ?>-<?= $item['name'] ?>"
                            onchange="masterCalcExecution(this.closest('form'));"
                            >
                        <?
                        foreach ($item['values'] as $value) {
                            ?>
                            <option value="<?= $value[0] ?>"
                                <?= $showValue == $value[0] ? ' selected="selected" ' : '' ?>><?= $value[1] ?></option>
                            <?
                        }
                        ?>
                    </select>
                    </div>
                    <?
                }
                ?>
                <?
                if ($item['fieldType'] == 'radio') {

                    $showValue = '';
                    if (isset($item['defaultValue'])) {
                        $showValue = $item['defaultValue'];
                    }
                    if (isset($calcData[$item['name']])) {
                        $showValue = $calcData[$item['name']];
                    }
                    if (isset($item['result'])) {
                        $showValue = $item['result'];
                    }

                    ?>
                    <div class="calc-block__param-title">
                    <?= $item['title'] ?>
                    </div>
                    <div class="calc-block__param-value">
                    <div class="radio-block">
                        <?
                        foreach ($item['values'] as $kValue => $value) {
                            ?>
                            <label>
                                <input type="radio" name="m-c[<?= $item['name'] ?>]" value="<?= $value[0] ?>"
                                    <?= $showValue == $value[0] ? ' checked="checked" ' : '' ?>
                                    <?= isset($item['attributes']) ? $item['attributes'] : '' ?>
                                       id="field-<?= $masterCalcConfiguration['uniqueCalcId'] ?>-<?= $item['name'] ?>-<?= $kValue ?>"
                                       class="calc-block__input"
                                onclick="masterCalcExecution(this.closest('form'));"
                                >
                                <?= $value[1] ?>
                            </label>
                            <?
                        }
                        ?>
                    </div>
                    </div>
                    <?
                }
                ?>
                <?
            }
            ?>
            <?
            if ($item['type'] == 'text') {
                ?>
                <div class="text-container">
                    <?= $item['text'] ?>
                </div>
                <?
            }
            ?>

            <?
            if ($item['type'] == 'formula') {
                ?>
                <div class="calc-block__param-title">
                <?= $item['title'] ?>
                </div>
                <div class="calc-block__param-value">
                <?
                if (TECH_MODE):
                    ?>
                    <div class="formula-container">
                        <span class="var-name"><?= $item['name'] ?> =</span>
                        <?= isset($item['originalFormula']) ? '<span class="original-formula">' . str_replace(array('[', ']'), '', $item['originalFormula']) . ' = </span>' : '' ?>
                        <span class="formula-with-values"><?= str_replace(array('[', ']'), '', $item['formula']) ?></span>
                        <?= isset($item['result']) ? ' = <span class="formula-result">' . $item['result'] . "</span>" : '' ?>
                    </div>
                    <?
                else:
                    ?>
                    <div class="formula-container">
                        <?= isset($item['result']) ? '<span class="formula-result">' . $item['result'] . "</span>" : '' ?>
                    </div>
                    <?
                endif;
                ?>
                </div>
                
                <?
            }
            ?>


            <?

            if (isset($item['unit']) && $item['unit'] != '' && isset($item['result']) && $item['result'] != ''):
                ?>
                <div class="unit"><?= $item['unit'] ?></div>
                <?
            endif; // unit
            ?>
        </div>
        <?
    endforeach; // foreach ($masterCalcConfiguration['items'] as $item):
    ?>
	<div class="calc-block__buttons master-calc-buttons">
		<div class="calc-block__buttons-item">
        <? if ($showHideButton): ?>
            <button type="button" class="show-hide-button main-site-button"
                    data-show-title="<?=GetMessage("ARLIGHT_ARSTORE_POKAZATQ_FORMULY")?>" data-hide-title="<?=GetMessage("ARLIGHT_ARSTORE_SKRYTQ_FORMULY")?>">
                <?= $showHideStatus == 1 ? GetMessage("ARLIGHT_ARSTORE_SKRYTQ_FORMULY") : GetMessage("ARLIGHT_ARSTORE_POKAZATQ_FORMULY") ?></button>
        <? endif; ?>		
			<button type="submit" class="button button--main" name="register_submit_button" value="1">
				<span class="button__text button__text--main"><?=GetMessage("ARLIGHT_ARSTORE_PODSCITATQ_I_OTOBRAZ")?></span></button>
				
				
		</div>
		<div class="calc-block__buttons-item">
            <button type="button" class="calculate-button button button--main" 
            onclick="masterCalcExecution(this.closest('form'));"><span class="button__text button__text--main"><?=GetMessage("ARLIGHT_ARSTORE_PODSCITATQ")?></span>
            </button>
		</div>		
        		
		<div class="calc-block__buttons-item">
		    
			<button type="reset" class="calc-block__link"><?=GetMessage("ARLIGHT_ARSTORE_SBROSITQ_DANNYE")?></button>
		</div>
	</div>
    <!--			    
    <div class="master-calc-buttons">
        <? if ($showHideButton): ?>
            <button type="button" class="show-hide-button main-site-button"
                    data-show-title="<?=GetMessage("ARLIGHT_ARSTORE_POKAZATQ_FORMULY")?>" data-hide-title="<?=GetMessage("ARLIGHT_ARSTORE_SKRYTQ_FORMULY")?>">
                <?= $showHideStatus == 1 ? GetMessage("ARLIGHT_ARSTORE_SKRYTQ_FORMULY") : GetMessage("ARLIGHT_ARSTORE_POKAZATQ_FORMULY") ?></button>
        <? endif; ?>
        <input type="submit" class="submit-button main-site-button" value="<?=GetMessage("ARLIGHT_ARSTORE_PODSCITATQ_I_OTOBRAZ")?>">
        <button type="button" class="calculate-button main-site-button" onclick="masterCalcExecution(this.closest('form'));"><?=GetMessage("ARLIGHT_ARSTORE_PODSCITATQ1")?></button>
        <? if (IS_AJAX && $calcData): ?>
            &nbsp;&nbsp;&nbsp;
            <a href="#" class="reset-button" onclick="document.getElementById('form-<?= $masterCalcConfiguration['uniqueCalcId'] ?>').reset(); return false;"><?=GetMessage("ARLIGHT_ARSTORE_SBROSITQ")?></a>
            <?
        elseif (!IS_AJAX && $calcData):
            ?>
            <a href="<?= $APPLICATION->GetCurpage(false) ?>" class="reset-button"><?=GetMessage("ARLIGHT_ARSTORE_SBROSITQ_VSE")?></a>
            <?
        elseif (!IS_AJAX && !$calcData):
            ?>
            &nbsp;&nbsp;&nbsp;
            <a href="#" class="reset-button" onclick="document.getElementById('form-<?= $masterCalcConfiguration['uniqueCalcId'] ?>').reset(); return false;"><?=GetMessage("ARLIGHT_ARSTORE_SBROSITQ")?></a>
            <?
        endif; // if (defined("B_PROLOG_INCLUDED") && B_PROLOG_INCLUDED === true && $calcData):
        ?>
    </div>
    -->
    <!--
    <div class="waiting-title"><?=GetMessage("ARLIGHT_ARSTORE_PODOJDITE")?></div>
    -->
    <input type="hidden" name="m-c[componentCalcFile]" data-name="componentCalcFile" value="<?= $componentPath ?>/calc.php">
    <input type="hidden" name="m-c[componentPath]" data-name="componentPath" value="<?= $componentPath ?>">
    <input type="hidden" name="m-c[templatePath]" data-name="templatePath" value="<?= $templatePath ?>">
    <input type="hidden" name="m-c[showHideStatus]" data-name="showHideStatus" value="<?= $showHideStatus ?>">
    <input type="hidden" name="uniqueCalcId" data-name="uniqueCalcId" value="<?= $masterCalcConfiguration['uniqueCalcId'] ?>">
</form>
</div>
	
