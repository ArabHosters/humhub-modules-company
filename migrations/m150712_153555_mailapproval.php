<?php

class m150712_153555_mailapproval extends EDbMigration {

    public function up() {
        $this->addColumn('fetchmail', 'approved', 'boolean DEFAULT 0');
    }

    public function down() {
        echo "m150712_153555_mailapproval does not support migration down.\n";
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
