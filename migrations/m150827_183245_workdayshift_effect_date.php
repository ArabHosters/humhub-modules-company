<?php

class m150827_183245_workdayshift_effect_date extends EDbMigration {

    public function up() {
        $this->addColumn('Workdays', 'effect_date', "date");
    }

    public function down() {
        echo "m150827_183245_workdayshift_effect_date does not support migration down.\n";
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
