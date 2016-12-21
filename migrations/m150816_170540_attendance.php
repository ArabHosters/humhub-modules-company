<?php

class m150816_170540_attendance extends EDbMigration {

    public function up() {
        //ALTER TABLE  `Attendance` ADD  `type` TINYINT( 1 ) NOT NULL DEFAULT  '1';
        $this->createTable("Attendance", array(
            "id" => "int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "user_id" => "int(11)",
            "in_time" => "timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'",
            "out_time" => "timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'",
            "note" => "varchar(500)",
                ), 'ENGINE=InnoDB DEFAULT CHARSET=utf8');
    }

    public function down() {
        echo "m150816_170540_attendance does not support migration down.\n";
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
