<?php

class m150906_132459_employee_attendance extends EDbMigration {

    public function up() {
        $this->addColumn('Attendance', 'manual_time', 'tinyint(1) DEFAULT 0');
        $this->addColumn('Attendance', 'reason', 'varchar(500)');
        $this->addColumn('Attendance', 'status', "enum('Approved','Pending','Rejected') DEFAULT 'Pending'");
    }

    public function down() {
        echo "m150906_132459_employee_attendance does not support migration down.\n";
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
