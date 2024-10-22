<?php
namespace PWD\Helpers;

use Bitrix\Main\ArgumentException;
use Bitrix\Main\Entity\ExpressionField;
use Bitrix\Main\ObjectPropertyException;
use Bitrix\Main\SystemException;
use PWD\ORM\BookTable;

/**
 * Class AuthorBooksHelper
 *
 * Вспомогательный класс для работы с книгами авторов и расчетом доходов.
 *
 * @package PWD\Helpers
 */
class AuthorBooksHelper
{
    /**
     * Получает количество книг автора, напечатанных в указанном издательстве.
     *
     * @param string $authorLastName Фамилия автора.
     * @param string $publisherTitle Название издательства.
     * @return int Количество книг.
     * @throws SystemException
     * @throws ArgumentException
     * @throws ObjectPropertyException
     */
    public static function getBooksByAuthorInPublisher(string $authorLastName, string $publisherTitle): int
    {
        $result = BookTable::getList([
            'select' => ['ID'],
            'filter' => [
                'AUTHORS.LAST_NAME' => $authorLastName,
                'PUBLISHER.TITLE' => $publisherTitle
            ]
        ]);

        return $result->getSelectedRowsCount();
    }

    /**
     * Рассчитывает доход авторов книги за полный тираж.
     *
     * @param array $authorNames Список фамилий соавторов.
     * @param string $bookTitle Название книги.
     * @return float|null Доход автора или null, если результат не найден.
     * @throws SystemException
     */
    public static function getBookProfitByAuthors(array $authorNames, string $bookTitle): ?float
    {
        return BookTable::getList([
            'select' => [
                new ExpressionField(
                    'AUTHOR_INCOME',
                    '(%s / COUNT(DISTINCT %s)) * %s',
                    ['PUBLISHER.AUTHOR_PROFIT', 'AUTHORS.ID', 'COPIES_CNT']
                )
            ],
            'filter' => [
                'TITLE' => $bookTitle,
                'AUTHORS.LAST_NAME' => $authorNames,
            ],
            'group' => ['TITLE']
        ])->fetch()["AUTHOR_INCOME"];
    }
}
