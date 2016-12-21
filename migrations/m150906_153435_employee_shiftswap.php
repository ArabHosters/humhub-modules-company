<?php

class m150906_153435_employee_shiftswap extends EDbMigration {

    public function up() {
        $this->dropTable('Workdays_swap');
        $this->createTable("Workdays_swap", array(
            "id" => "int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "user_id" => "int(11) NOT NULL",
            "swap_with" => "int(11) NOT NULL",
            "date_start" => "date",
            "date_end" => "date",
            "details" => "text",
            "status" => "enum('Approved','Pending','Rejected') DEFAULT 'Pending'",
                ), 'ENGINE=InnoDB DEFAULT CHARSET=utf8');

        $this->createTable("Workdays_swapdays", array(
            "id" => "int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "Workdays_swap" => "int(11) NOT NULL",
            "request_date" => "date",
                ), 'ENGINE=InnoDB DEFAULT CHARSET=utf8');
    }

    public function down() {
        echo "m150906_153435_employee_shiftswap does not support migration down.\n";
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
