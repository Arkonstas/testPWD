<?php
namespace PWD\ORM;

use Bitrix\Main\Entity\DataManager;
use Bitrix\Main\ORM\Fields\Relations\ManyToMany;
use Bitrix\Main\ORM\Fields\IntegerField;
use Bitrix\Main\ORM\Fields\StringField;
use Bitrix\Main\ORM\Fields\Validators\LengthValidator;

/**
 * Class BookTable
 *
 * Fields:
 * <ul>
 * <li> ID int mandatory
 * <li> TITLE string(255) optional
 * <li> YEAR int optional
 * <li> COPIES_CNT int optional
 * <li> PUBLISHER_ID int optional
 * </ul>
 *
 * @package Bitrix\
 **/

class BookTable extends DataManager
{
    public static function getTableName()
    {
        return 'books';
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
            new IntegerField(
                'YEAR',
                [
                    'title' => 'Год издания',
                ]
            ),
            new IntegerField(
                'COPIES_CNT',
                [
                    'title' => 'Тираж',
                ]
            ),
            new IntegerField(
                'PUBLISHER_ID',
                [
                    'title' => 'Издательство',
                ]
            ),
            'PUBLISHER' => [
                'data_type' => PublisherTable::class,
                'reference' => ['=this.PUBLISHER_ID' => 'ref.ID']
            ],
            'AUTHORS' => (new ManyToMany('AUTHORS', AuthorTable::class))
                ->configureTableName('book_authors'),
        ];
    }
}
