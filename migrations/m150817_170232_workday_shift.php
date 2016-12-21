<?php

class m150817_170232_workday_shift extends EDbMigration {

    public function up() {
        $this->addColumn('Workdays', 'shift_id', 'int(11)');
    }

    public function down() {
        echo "m150817_170232_workday_shift does not support migration down.\n";
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
