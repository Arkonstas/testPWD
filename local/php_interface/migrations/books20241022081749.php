<?php

namespace Sprint\Migration;


class books20241022081749 extends Version
{
    protected $author = "admin";

    protected $description = "";

    protected $moduleVersion = "4.15.1";

    public function up()
    {
        $query = "CREATE TABLE IF NOT EXISTS books (
            ID INT PRIMARY KEY AUTO_INCREMENT,
            TITLE VARCHAR(255) NOT NULL,
            YEAR INT NOT NULL,
            COPIES_CNT INT NOT NULL,
            PUBLISHER_ID INT NOT NULL
        )";

        $helper = $this->getHelperManager();
        $helper->Sql()->query($query);
    }

    public function down()
    {
        $helper = $this->getHelperManager();
        $helper->Sql()->dropTable('books');
    }
}
