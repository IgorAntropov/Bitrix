<?php
namespace Itertech\Cart;

use Bitrix\Main\Entity,
    Bitrix\Main\Localization\Loc;

class PaymentTable extends Entity\DataManager
{
    /**
     * Returns DB table name for entity
     *
     * @return string
     */
    public static function getTableName()
    {
        return 'itertech_cart_payment';
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
            'IMAGE' => array(
                'data_type' => 'integer',
                'title' => Loc::getMessage('DATA_ENTITY_IMAGE_FIELD'),
            ),
            'PAYMENT_TYPE' => array(
                'data_type' => 'string',
                'title' => Loc::getMessage('DATA_ENTITY_PAYMENT_TYPE_FIELD'),
            ),
            'ACTIVE' => array(
                'data_type' => 'string',
                'title' => Loc::getMessage('DATA_ENTITY_ACTIVE_FIELD'),
            ),
            'DATA' => array(
                'data_type' => 'string',
                'title' => Loc::getMessage('DATA_ENTITY_DATA_FIELD'),
            ),
            'SORT' => array(
                'data_type' => 'integer',
                'title' => Loc::getMessage('DATA_ENTITY_SORT_FIELD'),
            ),
        );
    }
}
