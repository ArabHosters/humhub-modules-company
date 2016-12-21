<?php

class m150721_164723_mailarchive extends EDbMigration {

    public function up() {
        $this->addColumn('fetchmail', 'archived', 'boolean DEFAULT 0');
    }

    public function down() {
        echo "m150721_164723_mailarchive does not support migration down.\n";
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
