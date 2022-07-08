<?php
define("STOP_STATISTICS", true);
define('NO_AGENT_CHECK', true);

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

use \Bitrix\Main\Loader;

if(isset($_POST['emailOrderAll']) && isset($_POST['emailFeedbackAll'])){

    $emailOrderList = $_POST['emailOrderAll'];
    $emailFeedbackList = $_POST['emailFeedbackAll'];

    COption::SetOptionString("header_action", "emailOrderList", $emailOrderList);
    COption::SetOptionString("header_action", "emailFeedbackList", $emailFeedbackList);
    echo 'ok';
}

