<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
$arComponentDescription = array(
    "NAME" => GetMessage("SMALL_CART_CART_NAME"),
    "DESCRIPTION" => GetMessage("SMALL_CART_CART_NAME"),
    "ICON" => "/images/feedback.gif",
    "PATH" => array(
        "ID" => "smallcart",
        "NAME" => GetMessage("SMALL_CART_ITERTECH"),
        "CHILD" => array(
            "ID" => "s_cart",
            "NAME" => GetMessage("SMALL_CART_CART_CHECKOUT")
        )
    ),
);
?>
