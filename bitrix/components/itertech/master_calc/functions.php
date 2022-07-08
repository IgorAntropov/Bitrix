<?php
function masterCalcHtmlGenerate($masterCalcConfiguration)
{
    if (isset($_REQUEST['m-c']) && isset($_REQUEST['uniqueCalcId']) && ($_REQUEST['uniqueCalcId'] == $masterCalcConfiguration['uniqueCalcId'])) {
        $calcData = $_REQUEST['m-c'];
    }

    foreach ($masterCalcConfiguration['items'] as $key => $item) {
        ob_start();
        switch ($item['type']) {
            case 'field':
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
                    <input type="text" name="m-c[<?= $item['name'] ?>]"
                           placeholder="<?=GetMessage("ARLIGHT_ARSTORE_VVEDITE_ZNACENIE")?>" value="<?= $showValue ?>" <?= isset($item['attributes']) ? $item['attributes'] : '' ?>
                           id="field-<?= $masterCalcConfiguration['uniqueCalcId'] ?>-<?= $item['name'] ?>"
                           class="calc-block__input <?= isset($item['inputClass']) && $item['inputClass'] != '' ? $item['inputClass'] : '' ?>"
                           <?=$item['required'] == 'Y' ? 'required' : ''?>
                           onkeyup="masterCalcExecution(this.closest('form'), this);">
                    <?php
                }

                if ($item['fieldType'] == 'search_product') {
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
                    <input type="text" name="m-c[<?= $item['name'] ?>]"
                           value="<?= $showValue ?>" <?= isset($item['attributes']) ? $item['attributes'] : '' ?>
                           id="field-<?= $masterCalcConfiguration['uniqueCalcId'] ?>-<?= $item['name'] ?>"
                           class="calc-block__input <?= isset($item['inputClass']) && $item['inputClass'] != '' ? $item['inputClass'] : '' ?>"
                           onblur="masterCalcExecution(this.closest('form'));">
                    <?php
                }

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
                    <select class="calc-block__select <?= isset($item['inputClass']) && $item['inputClass'] != '' ? $item['inputClass'] : '' ?>"
                            name="m-c[<?= $item['name'] ?>]" <?= isset($item['attributes']) ? $item['attributes'] : '' ?>
                            id="field-<?= $masterCalcConfiguration['uniqueCalcId'] ?>-<?= $item['name'] ?>"
                            onchange="masterCalcExecution(this.closest('form'));">
                        <?php
                        foreach ($item['values'] as $value) {
                            ?>
                            <option value="<?= $value[0] ?>"
                                <?= $showValue == $value[0] ? ' selected="selected" ' : '' ?>><?= $value[1] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <?php
                }

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
                    <?php
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
                        <?php
                    }
                    ?>
                    <?php
                }
                break;
            case 'text' :
                ?>
                <?= $item['text'] ?>
                <?php
                break;
            case 'formula' :
                ?>
                <?= $item['result'] ?>
                <?php
                break;
        }
        $content = ob_get_contents();
        ob_end_clean();

        $masterCalcConfiguration['items'][$key]['html'] = $content;
    }

    return $masterCalcConfiguration;
}