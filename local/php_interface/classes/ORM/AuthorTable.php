<?php
namespace PWD\ORM;

use Bitrix\Main\Entity\DataManager;
use Bitrix\Main\ORM\Fields\Relations\ManyToMany;
use Bitrix\Main\ORM\Fields\IntegerField;
use Bitrix\Main\ORM\Fields\StringField;
use Bitrix\Main\ORM\Fields\Validators\LengthValidator;

/**
 * Class AuthorTable
 *
 * Fields:
 * <ul>
 * <li> ID int mandatory
 * <li> FIRST_NAME string(255) optional
 * <li> LAST_NAME string(255) optional
 * <li> SECOND_NAME string(255) optional
 * <li> CITY string(255) optional
 * </ul>
 *
 * @package Bitrix\
 **/

class AuthorTable extends DataManager
{
    public static function getTableName()
    {
        return 'authors';
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
                'FIRST_NAME',
                [
                    'validation' => function()
                    {
                        return[
                            new LengthValidator(null, 255),
                        ];
                    },
                    'title' => 'Имя',
                ]
            ),
            new StringField(
                'LAST_NAME',
                [
                    'validation' => function()
                    {
                        return[
                            new LengthValidator(null, 255),
                        ];
                    },
                    'title' => 'Фамилия',
                ]
            ),
            new StringField(
                'SECOND_NAME',
                [
                    'validation' => function()
                    {
                        return[
                            new LengthValidator(null, 255),
                        ];
                    },
                    'title' => 'Отчество',
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
                    'title' => 'Город проживания',
                ]
            ),
            'BOOKS' => (new ManyToMany('BOOKS', BookTable::class))
                ->configureTableName('book_authors'),
        ];
    }
}
