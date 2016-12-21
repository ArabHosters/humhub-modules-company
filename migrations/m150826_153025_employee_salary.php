<?php

class m150826_153025_employee_salary extends EDbMigration {

    public function up() {
        $this->addColumn('employee_salary', 'pay_frequency', "enum('Hourly','Daily','Bi Weekly','Weekly','Semi Monthly','Monthly') DEFAULT NULL");
        $this->addColumn('employee_salary', 'details', "text");
    }

    public function down() {
        echo "m150826_153025_employee_salary does not support migration down.\n";
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
