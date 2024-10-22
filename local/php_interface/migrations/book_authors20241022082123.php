<?php

namespace Sprint\Migration;


class book_authors20241022082123 extends Version
{
    protected $author = "admin";

    protected $description = "";

    protected $moduleVersion = "4.15.1";

    public function up()
    {
        $query = "CREATE TABLE IF NOT EXISTS book_authors (
        BOOK_ID INT,
        AUTHOR_ID INT,
        PRIMARY KEY(BOOK_ID, AUTHOR_ID)
    )";

        $helper = $this->getHelperManager();
        $helper->Sql()->query($query);
    }

    public function down()
    {
        $helper = $this->getHelperManager();
        $helper->Sql()->dropTable('book_authors');
    }
}
