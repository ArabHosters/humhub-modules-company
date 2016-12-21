<?php

class m150817_172355_workshift_breaktime extends EDbMigration {

    public function up() {
        $this->addColumn('work_shift', 'break_time', 'Time');
    }

    public function down() {
        echo "m150817_172355_workshift_breaktime does not support migration down.\n";
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
