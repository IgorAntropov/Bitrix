<?php
namespace Itertech\Cart;

use Bitrix\Main\Entity,
    Bitrix\Main\Localization\Loc;

class StatusTable extends Entity\DataManager
{
    /**
     * Returns DB table name for entity
     *
     * @return string
     */
    public static function getTableName()
    {
        return 'itertech_cart_status';
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
            'SEND_MESSAGE' => array(
                'data_type' => 'string',
                'title' => Loc::getMessage('DATA_ENTITY_SEND_MESSAGE_FIELD'),
            ),
            'ACTIVE' => array(
                'data_type' => 'string',
                'title' => Loc::getMessage('DATA_ENTITY_ACTIVE_FIELD'),
            ),
            'DEFAULT' => array(
                'data_type' => 'string',
                'title' => Loc::getMessage('DATA_ENTITY_DEFAULT_FIELD'),
            ),
            'FOR_PAYMENT' => array(
                'data_type' => 'string',
                'title' => Loc::getMessage('DATA_ENTITY_FOR_PAYMENT_FIELD'),
            ),
            'SORT' => array(
                'data_type' => 'integer',
                'title' => Loc::getMessage('DATA_ENTITY_SORT_FIELD'),
            ),
        );
    }
}
