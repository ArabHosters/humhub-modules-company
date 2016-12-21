<?php

class m150824_160123_user_workshifts extends EDbMigration {

    public function up() {
        $this->addColumn('Workdays', 'start_work', 'Time');
        $this->addColumn('Workdays', 'min_time', 'Time');
        $this->addColumn('Workdays', 'work_day', 'varchar(3)');
        $this->addColumn('Workdays', 'user_id', 'int(11)');
    }

    public function down() {
        echo "m150824_160123_user_workshifts does not support migration down.\n";
        return false;
    }

}