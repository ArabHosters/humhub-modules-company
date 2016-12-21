<?php

class m150826_121137_workshift_db extends EDbMigration {

    public function up() {
        $this->dropIndex('workdays_name_country', 'Workdays');
        $this->dropColumn('Workdays', 'country');
        $this->dropColumn('Workdays', 'shift_id');
        $this->dropColumn('Workdays', 'name');
        $this->dropTable('work_shift');
    }

    public function down() {
        echo "m150826_121137_workshift_db does not support migration down.\n";
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
