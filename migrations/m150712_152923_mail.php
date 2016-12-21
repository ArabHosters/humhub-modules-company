<?php

class m150712_152923_mail extends EDbMigration {

    public function up() {
        if ($this->dbConnection->schema instanceof CMysqlSchema) {
            $options = 'ENGINE=InnoDB DEFAULT CHARSET=utf8';
        } else {
            $options = '';
        }
        // Schema for table 'EmployeeLeaveLog'
        $this->createTable("fetchmail", array(
            "id" => "int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "bank" => "varchar(150) NOT NULL",
            "amount" => "text",
            "time" => "timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'",
                ), $options);
    }

    public function down() {
        echo "m150712_152923_mail does not support migration down.\n";
        return false;
    }

    /*
      // Use safeUp/safeDown to do migration with transaction
      public function safeUp()
      {
      }

      public function safeDown()
      {
      }
     */
}
