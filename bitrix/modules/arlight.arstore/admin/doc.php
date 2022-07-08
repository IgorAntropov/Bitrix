<?
require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_admin_before.php");

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

$APPLICATION->SetTitle(Loc::getMessage('AR_DOC_TITLE'));

require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_admin_after.php"); ?>

    <style>
        details summary {
            cursor: pointer;
        }

        .connector {
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: 16px;
            color: #535c69;
            padding: 20px;
            background: #fff;
            border: 1px solid #ced7d8;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
        }

        .connector-title {
            margin: 0 0 30px 0;
            padding: 0;
            font-size: 32px;
            text-align: center;
            line-height: 32px;
            color: #535c69;
        }

        .connector-description {
            margin: 0 0 16px 0;
            padding: 0;
            font-size: 16px;
            color: #535c69;
            line-height: 24px;
        }


        .connector-description-ul-green li:before {
            content: ' ';
            display: inline-block;
            width: 30px;
            height: 11px;
            background-image: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAxMSA5Ij4gIDxwYXRoIGZpbGw9IiM3RUQzMjEiIGZpbGwtcnVsZT0iZXZlbm9kZCIgZD0iTTguOTY4MjU5OTgsNS43NzY1MzIyNiBMOC45NjgyNTk5OCwyLjQ3MTY0OTkxIEw3LjA4NDk2OTUxLDIuNDcxNjQ5OTEgTDcuMDg0OTY5NTEsNy42Njk1MzE2IEw4Ljk2ODI1OTk4LDcuNjY5NTMxNiBMOC45NjgyNTk5OCw3LjY1OTgyMjczIEwxNi4xMjQ3NjM3LDcuNjU5ODIyNzMgTDE2LjEyNDc2MzcsNS43NzY1MzIyNiBMOC45NjgyNTk5OCw1Ljc3NjUzMjI2IFoiIHRyYW5zZm9ybT0icm90YXRlKC00NSA2LjE5IDExLjMxMykiLz48L3N2Zz4=");
            background-size: 100% 100%;
            background-repeat: no-repeat;
        }
    </style>

    <div class="connector">
        <div class="connector-content">
            <p class="connector-title"><?= Loc::getMessage('AR_DOC_TITLE') ?></p>
            <p class="connector-description"><?= Loc::getMessage('AR_DOC_TEXT') ?></p>
            <?
            $content = file_get_contents('https://arstore.arlight.ru/assets/manual.html');
            echo $content;
            ?>
        </div>
    </div>

<? require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/epilog_admin.php"); ?>