<?php
namespace Itertech\Cart;

use Bitrix\Main\Entity,
    Bitrix\Main\Localization\Loc;

class DiscountTable extends Entity\DataManager
{
    /**
     * Returns DB table name for entity
     *
     * @return string
     */
    public static function getTableName()
    {
        return 'itertech_cart_discount';
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
            'NAME' => array(
                'data_type' => 'string',
                'title' => Loc::getMessage('DATA_ENTITY_NAME_FIELD'),
                'required' => true,
            ),
            'DESCRIPTION' => array(
                'data_type' => 'text',
                'title' => Loc::getMessage('DATA_ENTITY_DESCRIPTION_FIELD'),
            ),
            'TYPE' => array(
                'data_type' => 'string',
                'title' => Loc::getMessage('DATA_ENTITY_TYPE_FIELD'),
            ),
            'SUMM_ORDER' => array(
                'data_type' => 'integer',
                'title' => Loc::getMessage('DATA_ENTITY_SUMM_ORDER_FIELD'),
            ),
            'DISCOUNT' => array(
                'data_type' => 'integer',
                'title' => Loc::getMessage('DATA_ENTITY_DISCOUNT_FIELD'),
            ),
            'PERCENT' => array(
                'data_type' => 'string',
                'title' => Loc::getMessage('DATA_ENTITY_PERCENT_FIELD'),
            ),
            'GROUPS' => array(
                'data_type' => 'integer',
                'title' => Loc::getMessage('DATA_ENTITY_GROUP_FIELD'),
            ),
            'PROMOCODE' => array(
                'data_type' => 'string',
                'title' => Loc::getMessage('DATA_ENTITY_PROMOCODE_FIELD'),
            ),
            'MULTI' => array(
                'data_type' => 'string',
                'title' => Loc::getMessage('DATA_ENTITY_MULTI_FIELD'),
            ),
            'DATE_FROM' => array(
                'data_type' => 'datetime',
                'title' => Loc::getMessage('DATA_ENTITY_DATE_FROM_FIELD'),
            ),
            'DATE_TO' => array(
                'data_type' => 'datetime',
                'title' => Loc::getMessage('DATA_ENTITY_DATE_TO_FIELD'),
            ),
            'ACTIVE' => array(
                'data_type' => 'string',
                'title' => Loc::getMessage('DATA_ENTITY_ACTIVE_FIELD'),
            ),
            'DATA' => array(
                'data_type' => 'text',
                'title' => Loc::getMessage('DATA_ENTITY_DATA_FIELD'),
            ),
            'SORT' => array(
                'data_type' => 'integer',
                'title' => Loc::getMessage('DATA_ENTITY_SORT_FIELD'),
            ),
        );
    }
}
