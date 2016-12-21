<?php

class m150902_161844_employee_loan extends EDbMigration {

    public function up() {
        $this->createTable("employee_loan", array(
            "id" => "int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "user_id" => "int(11)",
            "amount" => "decimal(10,2)",
            "loan_date" => "date",
            "repay_date" => "date",
            "repay_amount" => "decimal(10,2)",
            "note" => "varchar(500)",
                ), 'ENGINE=InnoDB DEFAULT CHARSET=utf8');
    }

    public function down() {
        echo "m150902_161844_employee_loan does not support migration down.\n";
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
