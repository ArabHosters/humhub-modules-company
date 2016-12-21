<?php

class m150713_112556_mailid extends EDbMigration {

    public function up() {
        $this->addColumn('fetchmail', 'mailid', 'int(11)');
    }

    public function down() {
        echo "m150713_112556_mailid does not support migration down.\n";
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
