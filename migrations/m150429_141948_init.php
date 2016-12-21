<?php

class m150429_141948_init extends EDbMigration {

    public function safeUp() {
        if ($this->dbConnection->schema instanceof CMysqlSchema) {
            $options = 'ENGINE=InnoDB DEFAULT CHARSET=utf8';
        } else {
            $options = '';
        }

        // Schema for table 'Certifications'
        $this->createTable("Certifications", array(
            "id" => "int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "name" => "varchar(100)",
            "description" => "varchar(400)",
                ), $options);


        // Schema for table 'CompanyStructures'
        $this->createTable("CompanyStructures", array(
            "id" => "int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "title" => "tinytext NOT NULL",
            "description" => "text NOT NULL",
            "address" => "text",
            "type" => "enum('Company','Head Office','Regional Office','Department','Unit','Sub Unit','Other','Team')",
            "country" => "int(11) NOT NULL",
            "parent" => "int(11)",
                ), $options);


        // Schema for table 'Country'
        $this->createTable("Country", array(
            "id" => "int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "code" => "char(2) NOT NULL",
            "namecap" => "varchar(80)",
            "name" => "varchar(80) NOT NULL",
            "iso3" => "char(3)",
            "numcode" => "smallint(6)",
                ), $options);


        // Schema for table 'Educations'
        $this->createTable("Educations", array(
            "id" => "int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "name" => "varchar(100)",
            "description" => "varchar(400)",
                ), $options);


        // Schema for table 'EmployeeCertifications'
        $this->createTable("EmployeeCertifications", array(
            "id" => "int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "certification_id" => "int(11)",
            "employee" => "int(11) NOT NULL",
            "institute" => "varchar(400)",
            "date_start" => "date",
            "date_end" => "date",
                ), $options);


        // Schema for table 'EmployeeEducations'
        $this->createTable("EmployeeEducations", array(
            "id" => "int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "education_id" => "int(11)",
            "employee" => "int(11) NOT NULL",
            "institute" => "varchar(400)",
            "date_start" => "date",
            "date_end" => "date",
                ), $options);


        // Schema for table 'EmployeeLanguages'
        $this->createTable("EmployeeLanguages", array(
            "id" => "int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "language_id" => "int(11)",
            "employee" => "int(11) NOT NULL",
            "reading" => "enum('Elementary Proficiency','Limited Working Proficiency','Professional Working Proficiency','Full Professional Proficiency','Native or Bilingual Proficiency')",
            "speaking" => "enum('Elementary Proficiency','Limited Working Proficiency','Professional Working Proficiency','Full Professional Proficiency','Native or Bilingual Proficiency')",
            "writing" => "enum('Elementary Proficiency','Limited Working Proficiency','Professional Working Proficiency','Full Professional Proficiency','Native or Bilingual Proficiency')",
            "understanding" => "enum('Elementary Proficiency','Limited Working Proficiency','Professional Working Proficiency','Full Professional Proficiency','Native or Bilingual Proficiency')",
                ), $options);


        // Schema for table 'EmployeeLeaveDays'
        $this->createTable("EmployeeLeaveDays", array(
            "id" => "int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "employee_leave" => "int(11) NOT NULL",
            "leave_date" => "date",
            "leave_type" => "enum('Full Day','Half Day - Morning','Half Day - Afternoon','1 Hour - Morning','2 Hours - Morning','3 Hours - Morning','1 Hour - Afternoon','2 Hours - Afternoon','3 Hours - Afternoon') NOT NULL",
                ), $options);


        // Schema for table 'EmployeeLeaveLog'
        $this->createTable("EmployeeLeaveLog", array(
            "id" => "int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "employee_leave" => "int(11) NOT NULL",
            "user_id" => "int(11)",
            "data" => "varchar(500) NOT NULL",
            "status_from" => "enum('Approved','Pending','Rejected') DEFAULT 'Pending'",
            "status_to" => "enum('Approved','Pending','Rejected') DEFAULT 'Pending'",
            "created" => "timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'",
                ), $options);


        // Schema for table 'EmployeeLeaves'
        $this->createTable("EmployeeLeaves", array(
            "id" => "int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "employee" => "int(11) NOT NULL",
            "leave_type" => "int(11) NOT NULL",
            "leave_period" => "int(11) NOT NULL",
            "date_start" => "datetime",
            "date_end" => "datetime",
            "details" => "text",
            "status" => "enum('Approved','Pending','Rejected') DEFAULT 'Pending'",
            "attachment" => "varchar(100)",
                ), $options);


        // Schema for table 'EmployeeSkills'
        $this->createTable("EmployeeSkills", array(
            "id" => "int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "skill_id" => "int(11)",
            "employee" => "int(11) NOT NULL",
            "details" => "varchar(400)",
                ), $options);


        // Schema for table 'EmploymentStatus'
        $this->createTable("EmploymentStatus", array(
            "id" => "bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "name" => "varchar(100)",
            "description" => "varchar(400)",
                ), $options);


        // Schema for table 'Holidays'
        $this->createTable("Holidays", array(
            "id" => "int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "name" => "varchar(100) NOT NULL",
            "dateh" => "date",
            "status" => "enum('Full Day','Half Day') DEFAULT 'Full Day'",
            "country" => "int(11)",
                ), $options);


        // Schema for table 'JobTitles'
        $this->createTable("JobTitles", array(
            "id" => "bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "code" => "varchar(10) NOT NULL",
            "name" => "varchar(100)",
            "description" => "varchar(200)",
            "specification" => "varchar(400)",
                ), $options);


        // Schema for table 'Languages'
        $this->createTable("Languages", array(
            "id" => "int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "name" => "varchar(100)",
            "description" => "varchar(400)",
                ), $options);


        // Schema for table 'LeavePeriods'
        $this->createTable("LeavePeriods", array(
            "id" => "int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "name" => "varchar(100) NOT NULL",
            "date_start" => "date",
            "date_end" => "date",
            "status" => "enum('Active','Inactive') DEFAULT 'Inactive'",
                ), $options);


        // Schema for table 'LeaveRules'
        $this->createTable("LeaveRules", array(
            "id" => "int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "leave_type" => "int(11) NOT NULL",
            "job_title" => "int(11)",
            "employment_status" => "int(11)",
            "employee" => "int(11)",
            "supervisor_leave_assign" => "enum('Yes','No') DEFAULT 'Yes'",
            "employee_can_apply" => "enum('Yes','No') DEFAULT 'Yes'",
            "apply_beyond_current" => "enum('Yes','No') DEFAULT 'Yes'",
            "leave_accrue" => "enum('No','Yes') DEFAULT 'No'",
            "carried_forward" => "enum('No','Yes') DEFAULT 'No'",
            "default_per_year" => "decimal(10,3) NOT NULL",
            "carried_forward_percentage" => "int(11)",
            "carried_forward_leave_availability" => "int(11) DEFAULT '365'",
            "propotionate_on_joined_date" => "enum('No','Yes') DEFAULT 'No'",
                ), $options);


        // Schema for table 'LeaveTypes'
        $this->createTable("LeaveTypes", array(
            "id" => "int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "name" => "varchar(100) NOT NULL",
            "supervisor_leave_assign" => "enum('Yes','No') DEFAULT 'Yes'",
            "employee_can_apply" => "enum('Yes','No') DEFAULT 'Yes'",
            "apply_beyond_current" => "enum('Yes','No') DEFAULT 'Yes'",
            "leave_accrue" => "enum('No','Yes') DEFAULT 'No'",
            "carried_forward" => "enum('No','Yes') DEFAULT 'No'",
            "default_per_year" => "decimal(10,3) NOT NULL",
            "carried_forward_percentage" => "int(11)",
            "carried_forward_leave_availability" => "int(11) DEFAULT '365'",
            "propotionate_on_joined_date" => "enum('No','Yes') DEFAULT 'No'",
                ), $options);


        // Schema for table 'PayGrades'
        $this->createTable("PayGrades", array(
            "id" => "bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "name" => "varchar(100)",
            "currency" => "varchar(3) NOT NULL",
            "min_salary" => "decimal(12,2) DEFAULT '0.00'",
            "max_salary" => "decimal(12,2) DEFAULT '0.00'",
                ), $options);



        // Schema for table 'Skills'
        $this->createTable("Skills", array(
            "id" => "int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "name" => "varchar(100)",
            "description" => "varchar(400)",
                ), $options);


        // Schema for table 'Workdays'
        $this->createTable("Workdays", array(
            "id" => "int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "name" => "varchar(100) NOT NULL",
            "status" => "enum('Full Day','Half Day','Non-working Day') DEFAULT 'Full Day'",
            "country" => "int(11)",
                ), $options);



        // Schema for table 'candidates'
        $this->createTable("candidates", array(
            "id" => "int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "first_name" => "varchar(150) NOT NULL",
            "last_name" => "varchar(150) NOT NULL",
            "email" => "varchar(150) NOT NULL",
            "contact_num" => "varchar(150) NOT NULL",
            "job_vacancy" => "int(11) NOT NULL",
            "comment" => "text NOT NULL",
            "date_of_application" => "date NOT NULL",
                ), $options);


        // Schema for table 'employee_salary'
        $this->createTable("employee_salary", array(
            "id" => "int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "component_id" => "int(11) NOT NULL",
            "emp_id" => "int(11) NOT NULL",
            "amount" => "decimal(10,2) NOT NULL",
            "effect_date" => "date NOT NULL",
                ), $options);


        // Schema for table 'salary_component'
        $this->createTable("salary_component", array(
            "id" => "int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "name" => "varchar(100) NOT NULL",
            "type" => "tinyint(4) NOT NULL",
            "total_paypal" => "tinyint(4) NOT NULL",
            "company_cost" => "tinyint(4) NOT NULL",
            "amout" => "tinyint(4) NOT NULL",
            "percentage" => "tinyint(4) NOT NULL",
                ), $options);


        // Schema for table 'vacancy'
        $this->createTable("vacancy", array(
            "id" => "int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "name" => "varchar(150) NOT NULL",
            "company_id" => "int(11) NOT NULL",
            "department_id" => "int(11) NOT NULL",
            "hiring_manager" => "int(11) NOT NULL",
            "num_of_pos" => "int(11) NOT NULL",
            "posting_details" => "text NOT NULL",
                ), $options);


        // Schema for table 'work_shift'
        $this->createTable("work_shift", array(
            "id" => "int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT",
            "name" => "varchar(150) NOT NULL",
            "shift_from" => "time NOT NULL",
            "shift_to" => "time NOT NULL",
                ), $options);


        // Foreign Keys for table 'CompanyStructures'
        if (($this->dbConnection->schema instanceof CSqliteSchema) == false):
            $this->addForeignKey('fk_CompanyStructures_CompanyStructures_parent', 'CompanyStructures', 'parent', 'CompanyStructures', 'id', 'RESTRICT', 'RESTRICT'); 
        endif;



        // Foreign Keys for table 'EmployeeCertifications'
        if (($this->dbConnection->schema instanceof CSqliteSchema) == false):
            $this->addForeignKey('fk_EmployeeCertifications_Certifications_certification_id', 'EmployeeCertifications', 'certification_id', 'Certifications', 'id', 'RESTRICT', 'RESTRICT'); 
            $this->addForeignKey('fk_EmployeeCertifications_user_employee', 'EmployeeCertifications', 'employee', 'user', 'id', 'CASCADE', 'CASCADE'); 
        endif;



        // Foreign Keys for table 'EmployeeEducations'
        if (($this->dbConnection->schema instanceof CSqliteSchema) == false):
            $this->addForeignKey('fk_EmployeeEducations_Educations_education_id', 'EmployeeEducations', 'education_id', 'Educations', 'id', 'CASCADE', 'CASCADE'); 
            $this->addForeignKey('fk_EmployeeEducations_user_employee', 'EmployeeEducations', 'employee', 'user', 'id', 'CASCADE', 'CASCADE'); 
        endif;



        // Foreign Keys for table 'EmployeeLanguages'
        if (($this->dbConnection->schema instanceof CSqliteSchema) == false):
            $this->addForeignKey('fk_EmployeeLanguages_user_employee', 'EmployeeLanguages', 'employee', 'user', 'id', 'CASCADE', 'CASCADE'); 
            $this->addForeignKey('fk_EmployeeLanguages_Languages_language_id', 'EmployeeLanguages', 'language_id', 'Languages', 'id', 'CASCADE', 'CASCADE'); 
        endif;



        // Foreign Keys for table 'EmployeeLeaveDays'
        if (($this->dbConnection->schema instanceof CSqliteSchema) == false):
            $this->addForeignKey('fk_EmployeeLeaveDays_EmployeeLeaves_employee_leave', 'EmployeeLeaveDays', 'employee_leave', 'EmployeeLeaves', 'id', 'CASCADE', 'CASCADE'); 
        endif;



        // Foreign Keys for table 'EmployeeLeaveLog'
        if (($this->dbConnection->schema instanceof CSqliteSchema) == false):
            $this->addForeignKey('fk_EmployeeLeaveLog_EmployeeLeaves_employee_leave', 'EmployeeLeaveLog', 'employee_leave', 'EmployeeLeaves', 'id', 'CASCADE', 'CASCADE'); 
            $this->addForeignKey('fk_EmployeeLeaveLog_user_user_id', 'EmployeeLeaveLog', 'user_id', 'user', 'id', null, 'CASCADE'); 
        endif;



        // Foreign Keys for table 'EmployeeLeaves'
        if (($this->dbConnection->schema instanceof CSqliteSchema) == false):
            $this->addForeignKey('fk_EmployeeLeaves_user_employee', 'EmployeeLeaves', 'employee', 'user', 'id', 'CASCADE', 'CASCADE'); 
            $this->addForeignKey('fk_EmployeeLeaves_LeavePeriods_leave_period', 'EmployeeLeaves', 'leave_period', 'LeavePeriods', 'id', 'RESTRICT', 'RESTRICT'); 
            $this->addForeignKey('fk_EmployeeLeaves_LeaveTypes_leave_type', 'EmployeeLeaves', 'leave_type', 'LeaveTypes', 'id', 'RESTRICT', 'RESTRICT'); 
        endif;



        // Foreign Keys for table 'EmployeeSkills'
        if (($this->dbConnection->schema instanceof CSqliteSchema) == false):
            $this->addForeignKey('fk_EmployeeSkills_user_employee', 'EmployeeSkills', 'employee', 'user', 'id', 'CASCADE', 'CASCADE'); 
            $this->addForeignKey('fk_EmployeeSkills_Skills_skill_id', 'EmployeeSkills', 'skill_id', 'Skills', 'id', 'CASCADE', 'CASCADE'); 
        endif;



        // Foreign Keys for table 'LeaveRules'
        if (($this->dbConnection->schema instanceof CSqliteSchema) == false):
            $this->addForeignKey('fk_LeaveRules_user_employee', 'LeaveRules', 'employee', 'user', 'id', 'CASCADE', 'CASCADE'); 
        endif;
    }

    public function down() {
        echo "m150429_141948_init does not support migration down.\n";
        return false;
    }

}
