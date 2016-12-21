<?php

class m151008_135519_recurringcompontent extends EDbMigration
{
	public function up()
	{
            $this->addColumn('salary_component', 'recurring', 'tinyint(1) DEFAULT 0');
	}

	public function down()
	{
		echo "m151008_135519_recurringcompontent does not support migration down.\n";
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