<?php

class m150720_142432_mailcomment extends EDbMigration {

    public function up() {
        if ($this->dbConnection->schema instanceof CMysqlSchema) {
            $options = 'ENGINE=InnoDB DEFAULT CHARSET=utf8';
        } else {
            $options = '';
        }
        // Schema for table 'reminder_events'
        $this->createTable("fetchmail_comment", array(
            "id" => "int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "message" => "text NOT NULL",
            'object_model' => 'varchar(100) NOT NULL',
            'object_id' => 'int(11) NOT NULL',
            "created_at" => "datetime NOT NULL",
            "created_by" => "int(11) NOT NULL",
            "updated_at" => "datetime NOT NULL",
            "updated_by" => "int(11) NOT NULL",
                ), $options);
    }

    public function down() {
        echo "m150720_142432_mailcomment does not support migration down.\n";
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
