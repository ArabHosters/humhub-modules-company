<?php

class m150929_145255_employee_shiftswapcomment extends EDbMigration {

    public function up() {
        $this->addColumn('Workdays_swap', 'comment', "text");
    }

    public function down() {
        echo "m150929_145255_employee_shiftswapcomment does not support migration down.\n";
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
