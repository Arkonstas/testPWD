<?php

namespace Sprint\Migration;


class publishers20241022082011 extends Version
{
    protected $author = "admin";

    protected $description = "";

    protected $moduleVersion = "4.15.1";

    public function up()
    {
        $query = "CREATE TABLE IF NOT EXISTS publishers (
            ID INT PRIMARY KEY AUTO_INCREMENT,
            TITLE VARCHAR(255) NOT NULL,
            CITY VARCHAR(255) NOT NULL,
            AUTHOR_PROFIT FLOAT NOT NULL
        )";

        $helper = $this->getHelperManager();
        $helper->Sql()->query($query);
    }

    public function down()
    {
        $helper = $this->getHelperManager();
        $helper->Sql()->dropTable('publishers');
    }
}
