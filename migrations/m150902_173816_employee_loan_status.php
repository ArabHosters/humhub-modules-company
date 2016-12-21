<?php

class m150902_173816_employee_loan_status extends EDbMigration {

    public function up() {
        $this->addColumn('employee_loan', 'status', "enum('Approved','Pending','Rejected') DEFAULT 'Pending'");
    }

    public function down() {
        echo "m150902_173816_employee_loan_status does not support migration down.\n";
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
