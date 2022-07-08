<?php
namespace Itertech\Cart;

use Bitrix\Main\Entity,
    Bitrix\Main\Localization\Loc;

class OrdersItemsTable extends Entity\DataManager
{
    /**
     * Returns DB table name for entity
     *
     * @return string
     */
    public static function getTableName()
    {
        return 'itertech_cart_orders_items';
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
            'ORDER_ID' => array(
                'data_type' => 'integer',
                'title' => Loc::getMessage('DATA_ENTITY_ORDER_ID_FIELD'),
            ),
            'PRODUCT_ID' => array(
                'data_type' => 'integer',
                'title' => Loc::getMessage('DATA_ENTITY_PRODUCT_ID_FIELD'),
            ),
            'ARTNUMBER' => array(
                'data_type' => 'string',
                'title' => Loc::getMessage('DATA_ENTITY_ARTNUMBER_FIELD'),
            ),
            'QUANTITY' => array(
                'data_type' => 'integer',
                'title' => Loc::getMessage('DATA_ENTITY_QUANTITY_FIELD'),
            ),
            'PRICE' => array(
                'data_type' => 'float',
                'title' => Loc::getMessage('DATA_ENTITY_PRICE_FIELD'),
            ),
            'DISCOUNT' => array(
                'data_type' => 'float',
                'title' => Loc::getMessage('DATA_ENTITY_DISCOUNT_FIELD'),
            ),
            'CURRENCY' => array(
                'data_type' => 'string',
                'title' => Loc::getMessage('DATA_ENTITY_CURRENCY_FIELD'),
            ),
            'NAME' => array(
                'data_type' => 'string',
                'title' => Loc::getMessage('DATA_ENTITY_NAME_FIELD'),
            ),
            'DESCRIPTION' => array(
                'data_type' => 'text',
                'title' => Loc::getMessage('DATA_ENTITY_DESCRIPTION_FIELD'),
            ),
            'URL' => array(
                'data_type' => 'string',
                'title' => Loc::getMessage('DATA_ENTITY_URL_FIELD'),
            ),
            'IMAGE' => array(
                'data_type' => 'string',
                'title' => Loc::getMessage('DATA_ENTITY_IMAGE_FIELD'),
            ),
            'INSTOCK' => array(
                'data_type' => 'string',
                'title' => Loc::getMessage('DATA_ENTITY_INSTOCK_FIELD'),
            ),
            'PACKAGE' => array(
                'data_type' => 'string',
                'title' => Loc::getMessage('DATA_ENTITY_PACKAGE_FIELD'),
            ),
            'PACKAGE_COUNT' => array(
                'data_type' => 'string',
                'title' => Loc::getMessage('DATA_ENTITY_PACKAGE_COUNT_FIELD'),
            ),
            'UNIT' => array(
                'data_type' => 'string',
                'title' => Loc::getMessage('DATA_ENTITY_UNIT_FIELD'),
            ),
            'DATA' => array(
                'data_type' => 'text',
                'title' => Loc::getMessage('DATA_ENTITY_DATA_FIELD'),
            ),
        );
    }
}
