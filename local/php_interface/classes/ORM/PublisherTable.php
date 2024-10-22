<?php
namespace PWD\ORM;

use Bitrix\Main\Entity\DataManager;
use Bitrix\Main\ORM\Fields\FloatField;
use Bitrix\Main\ORM\Fields\IntegerField;
use Bitrix\Main\ORM\Fields\StringField;
use Bitrix\Main\ORM\Fields\Validators\LengthValidator;

/**
 * Class PublisherTable
 *
 * Fields:
 * <ul>
 * <li> ID int mandatory
 * <li> TITLE string(255) optional
 * <li> CITY string(255) optional
 * <li> AUTHOR_PROFIT double optional
 * </ul>
 *
 * @package Bitrix\
 **/

class PublisherTable extends DataManager
{
    public static function getTableName()
    {
        return 'publishers';
    }

    public static function getMap()
    {
        return [
                new IntegerField(
                    'ID',
                    [
                        'primary' => true,
                        'autocomplete' => true,
                        'title' => 'ID',
                    ]
                ),
                new StringField(
                    'TITLE',
                    [
                        'validation' => function()
                        {
                            return[
                                new LengthValidator(null, 255),
                            ];
                        },
                        'title' => 'Название',
                    ]
                ),
                new StringField(
                    'CITY',
                    [
                        'validation' => function()
                        {
                            return[
                                new LengthValidator(null, 255),
                            ];
                        },
                        'title' => 'Город',
                    ]
                ),
                new FloatField(
                    'AUTHOR_PROFIT',
                    [
                        'title' => 'Гонорар автора за экземпляр',
                    ]
                ),
        ];
    }
}
