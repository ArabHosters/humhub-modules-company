<?php

class m150826_131548_workshift_swap extends EDbMigration {

    public function up() {
        $this->createTable("Workdays_swap", array(
            "id" => "int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "user_id" => "int(11) NOT NULL",
            "request_time" => "time",
            "details" => "text",
            "status" => "enum('Approved','Pending','Rejected') DEFAULT 'Pending'",
                ), 'ENGINE=InnoDB DEFAULT CHARSET=utf8');
    }

    public function down() {
        echo "m150826_131548_workshift_swap does not support migration down.\n";
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
