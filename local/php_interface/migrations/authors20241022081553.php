<?php

namespace Sprint\Migration;


class authors20241022081553 extends Version
{
    protected $author = "admin";

    protected $description = "";

    protected $moduleVersion = "4.15.1";

    public function up()
    {
        $query = "CREATE TABLE IF NOT EXISTS authors (
            ID INT PRIMARY KEY AUTO_INCREMENT,
            FIRST_NAME VARCHAR(255) NOT NULL,
            LAST_NAME VARCHAR(255) NOT NULL,
            SECOND_NAME VARCHAR(255) NOT NULL,
            CITY VARCHAR(255) NOT NULL
        )";

        $helper = $this->getHelperManager();
        $helper->Sql()->query($query);
    }

    public function down()
    {
        $helper = $this->getHelperManager();
        $helper->Sql()->dropTable('authors');
    }
}
