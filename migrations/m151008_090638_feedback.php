<?php

class m151008_090638_feedback extends EDbMigration {

    public function up() {
        $this->createTable("user_feedback", array(
            "id" => "int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "user_id" => "int(11)",
            "feedback_comment" => "text",
            "feedback_details" => "text",
                ), 'ENGINE=InnoDB DEFAULT CHARSET=utf8');
    }

    public function down() {
        echo "m151008_090638_feedback does not support migration down.\n";
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
