<?php

class m150826_122011_workshift_break extends EDbMigration {

    public function up() {
        $this->addColumn('Workdays', 'break_time', 'Time');
    }

    public function down() {
        echo "m150826_122011_workshift_break does not support migration down.\n";
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
