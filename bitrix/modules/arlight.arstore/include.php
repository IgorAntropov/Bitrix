<?
use Bitrix\Main\Loader;

Loader::registerAutoloadClasses('arlight.arstore',
    array(
        'ArlightEvents' => '/classes/general/arlight_event_handler.php',
    ));
?>