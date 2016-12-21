<?php

class m150817_163616_attendance_type extends EDbMigration {

    public function up() {
        $this->addColumn('Attendance', 'type', 'tinyint(1) DEFAULT 1');
    }

    public function down() {
        echo "m150817_163616_attendance_type does not support migration down.\n";
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
