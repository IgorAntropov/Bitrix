<?php
namespace Itertech\Cart;

use Bitrix\Main\Entity,
    Bitrix\Main\Localization\Loc;

class OrdersTable extends Entity\DataManager
{
    /**
     * Returns DB table name for entity
     *
     * @return string
     */
    public static function getTableName()
    {
        return 'itertech_cart_orders';
    }

    /**
     * Returns entity map definition.
     *
     * @return array
     */
    public static function getMap()
    {
        return array(
            'ID' => array(
                'data_type' => 'integer',
                'primary' => true,
                'autocomplete' => true,
                'title' => Loc::getMessage('DATA_ENTITY_ID_FIELD'),
            ),
            'SITE_ID' => array(
                'data_type' => 'string',
                'title' => Loc::getMessage('DATA_ENTITY_SITE_ID_FIELD'),
            ),
            'DATE_CREATE' => array(
                'data_type' => 'datetime',
                'title' => Loc::getMessage('DATA_ENTITY_DATE_CREATE_FIELD'),
            ),
            'DATE_CHANGE' => array(
                'data_type' => 'datetime',
                'title' => Loc::getMessage('DATA_ENTITY_DATE_CHANGE_FIELD'),
            ),
            'STATUS' => array(
                'data_type' => 'string',
                'title' => Loc::getMessage('DATA_ENTITY_STATUS_FIELD'),
            ),
            'CURRENCY' => array(
                'data_type' => 'string',
                'title' => Loc::getMessage('DATA_ENTITY_CURRENCY_FIELD'),
            ),
            'SUMM' => array(
                'data_type' => 'float',
                'title' => Loc::getMessage('DATA_ENTITY_SUMM_FIELD'),
            ),
            'DISCOUNT' => array(
                'data_type' => 'float',
                'title' => Loc::getMessage('DATA_ENTITY_DISCOUNT_FIELD'),
            ),
            'DISCOUNT_PERCENT' => array(
                'data_type' => 'integer',
                'title' => Loc::getMessage('DATA_ENTITY_DISCOUNT_PERCENT_FIELD'),
            ),
            'DISCOUNT_TYPE' => array(
                'data_type' => 'string',
                'title' => Loc::getMessage('DATA_ENTITY_DISCOUNT_TYPE_FIELD'),
            ),
            'PROMOCODE_OR_SUMM' => array(
                'data_type' => 'string',
                'title' => Loc::getMessage('DATA_ENTITY_PROMOCODE_FIELD'),
            ),
            'QUANTITY' => array(
                'data_type' => 'integer',
                'title' => Loc::getMessage('DATA_ENTITY_QUANTITY_FIELD'),
            ),
            'PAYMENT' => array(
                'data_type' => 'string',
                'title' => Loc::getMessage('DATA_ENTITY_PAYMENT_FIELD'),
            ),
            'PAYMENT_DATE' => array(
                'data_type' => 'datetime',
                'title' => Loc::getMessage('DATA_ENTITY_PAYMENT_DATE_FIELD'),
            ),
            'PAYMENT_ID' => array(
                'data_type' => 'string',
                'title' => Loc::getMessage('DATA_ENTITY_PAYMENT_ID_FIELD'),
            ),
            'PAYMENT_TYPE' => array(
                'data_type' => 'string',
                'title' => Loc::getMessage('DATA_ENTITY_PAYMENT_ID_FIELD'),
            ),
            'CANCELED' => array(
                'data_type' => 'string',
                'title' => Loc::getMessage('DATA_ENTITY_CANCELED_FIELD'),
            ),
            'CANCELED_DATE' => array(
                'data_type' => 'datetime',
                'title' => Loc::getMessage('DATA_ENTITY_CANCELED_DATE_FIELD'),
            ),
            'DELIVERY' => array(
                'data_type' => 'string',
                'title' => Loc::getMessage('DATA_ENTITY_DELIVERY_FIELD'),
            ),
            'DELIVERY_PRICE' => array(
                'data_type' => 'float',
                'title' => Loc::getMessage('DATA_ENTITY_DELIVERY_PRICE_FIELD'),
            ),
            'USER_ID' => array(
                'data_type' => 'integer',
                'title' => Loc::getMessage('DATA_ENTITY_USER_ID_FIELD'),
            ),
            'USER_NAME' => array(
                'data_type' => 'string',
                'title' => Loc::getMessage('DATA_ENTITY_USER_NAME_FIELD'),
            ),
            'USER_EMAIL' => array(
                'data_type' => 'string',
                'title' => Loc::getMessage('DATA_ENTITY_USER_EMAIL_FIELD'),
            ),
            'USER_PHONE' => array(
                'data_type' => 'string',
                'title' => Loc::getMessage('DATA_ENTITY_USER_PHONE_FIELD'),
            ),
            'USER_INDEX' => array(
                'data_type' => 'string',
                'title' => Loc::getMessage('DATA_ENTITY_USER_INDEX_FIELD'),
            ),
            'USER_CITY' => array(
                'data_type' => 'string',
                'title' => Loc::getMessage('DATA_ENTITY_USER_CITY_FIELD'),
            ),
            'USER_STREET' => array(
                'data_type' => 'string',
                'title' => Loc::getMessage('DATA_ENTITY_USER_STREET_FIELD'),
            ),
            'USER_HOUSE' => array(
                'data_type' => 'string',
                'title' => Loc::getMessage('DATA_ENTITY_USER_HOUSE_FIELD'),
            ),
            'USER_APP' => array(
                'data_type' => 'string',
                'title' => Loc::getMessage('DATA_ENTITY_USER_APP_FIELD'),
            ),
            'USER_ADDRESS' => array(
                'data_type' => 'string',
                'title' => Loc::getMessage('DATA_ENTITY_USER_ADDRESS_FIELD'),
            ),
            'USER_COMMENT' => array(
                'data_type' => 'text',
                'title' => Loc::getMessage('DATA_ENTITY_USER_COMMENT_FIELD'),
            ),
            'DATA' => array(
                'data_type' => 'text',
                'title' => Loc::getMessage('DATA_ENTITY_DATA_FIELD'),
            ),
        );
    }
}
