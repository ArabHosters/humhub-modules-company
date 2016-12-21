<?php

class CompanyModule extends HWebModule {

    public $defaultController = 'leaveTypes';

    public function init() {
        // this method is called when the module is being created
        // you may place code here to customize the module or the application
        // import the module-level models and components
        $this->setImport(array(
            'company.models.*',
            'company.models.forms.*',
            'company.components.*',
        ));
    }

    public function behaviors() {
        return array(
            'UserModuleBehavior' => array(
                'class' => 'application.modules_core.user.behaviors.UserModuleBehavior',
            ),
        );
    }

    public static function onAdminMenuInit($event) {
        $event->sender->addItemGroup(array(
            'id' => 'managecompany',
            'label' => 'Company <strong>Administration</strong>',
            'sortOrder' => 200,
        ));
        $event->sender->addItem(array(
            'label' => 'Company Structure',
            'url' => Yii::app()->createUrl('//company/companyStructures'),
            'group' => 'managecompany',
            'icon' => '<i class="fa fa-building-o"></i>',
            'isActive' => (Yii::app()->controller->module && Yii::app()->controller->module->id == 'company' && (Yii::app()->controller->id == 'companyStructures' || Yii::app()->controller->id == 'companyOrgChart')),
            'sortOrder' => 300,
        ));

        $event->sender->addItem(array(
            'label' => 'Job Details Setup',
            'url' => Yii::app()->createUrl('//company/jobTitles'),
            'group' => 'managecompany',
            'icon' => '<i class="fa fa-columns"></i>',
            'isActive' => (Yii::app()->controller->module && Yii::app()->controller->module->id == 'company' && (Yii::app()->controller->id == 'employmentStatus' || Yii::app()->controller->id == 'jobTitles' || Yii::app()->controller->id == 'payGrades' || Yii::app()->controller->id == 'salaryComponent')),
            'sortOrder' => 400,
        ));
        $event->sender->addItem(array(
            'label' => 'Qualifications Setup',
            'url' => Yii::app()->createUrl('//company/skills'),
            'group' => 'managecompany',
            'icon' => '<i class="fa fa-check-square-o"></i>',
            'isActive' => (Yii::app()->controller->module && Yii::app()->controller->module->id == 'company' && (Yii::app()->controller->id == 'skills' || Yii::app()->controller->id == 'educations' || Yii::app()->controller->id == 'certifications' || Yii::app()->controller->id == 'languages')),
            'sortOrder' => 500,
        ));
        $event->sender->addItem(array(
            'label' => 'Leave Settings',
            'url' => Yii::app()->createUrl('//company/leaveTypes'),
            'group' => 'managecompany',
            'icon' => '<i class="fa fa-sign-out"></i>',
            'isActive' => (Yii::app()->controller->module && Yii::app()->controller->module->id == 'company' && (Yii::app()->controller->id == 'leaveTypes' || Yii::app()->controller->id == 'leavePeriods' || Yii::app()->controller->id == 'holidays' || Yii::app()->controller->id == 'workdays' || Yii::app()->controller->id == 'employeeLeaves' || Yii::app()->controller->id == 'employeeAttendance' || Yii::app()->controller->id == 'employeeSwaps' || Yii::app()->controller->id == 'leaveRules')),
            'sortOrder' => 600,
        ));

        $event->sender->addItem(array(
            'label' => 'Qualifications',
            'url' => Yii::app()->createUrl('//company/employeeCertifications'),
            'icon' => '<i class="fa fa-graduation-cap"></i>',
            'group' => 'managecompany',
            'isActive' => (Yii::app()->controller->module && Yii::app()->controller->module->id == 'company' && (Yii::app()->controller->id == 'employeeCertifications' || Yii::app()->controller->id == 'employeeEducations' || Yii::app()->controller->id == 'employeeLanguages' || Yii::app()->controller->id == 'employeeSkills')),
            'sortOrder' => 700,
        ));

        $event->sender->addItem(array(
            'label' => 'Recruitment',
            'url' => Yii::app()->createUrl('//company/vacancy'),
            'icon' => '<i class="fa fa-group"></i>',
            'group' => 'managecompany',
            'isActive' => (Yii::app()->controller->module && Yii::app()->controller->module->id == 'company' && (Yii::app()->controller->id == 'vacancy' || Yii::app()->controller->id == 'candidates')),
            'sortOrder' => 700,
        ));

        $event->sender->addItem(array(
            'label' => 'Salary bonus and deduction rules',
            'url' => Yii::app()->createUrl('//company/salarySettings'),
            'icon' => '<i class="fa fa-wrench"></i>',
            'group' => 'managecompany',
            'isActive' => (Yii::app()->controller->module && Yii::app()->controller->module->id == 'company' && (Yii::app()->controller->id == 'salarySettings')),
            'sortOrder' => 800,
        ));

        $event->sender->addItem(array(
            'label' => 'Loans',
            'url' => Yii::app()->createUrl('//company/loans'),
            'icon' => '<i class="fa fa-money"></i>',
            'group' => 'managecompany',
            'isActive' => (Yii::app()->controller->module && Yii::app()->controller->module->id == 'company' && Yii::app()->controller->id == 'loans'),
            'sortOrder' => 900,
        ));

        $event->sender->addItem(array(
            'label' => 'Salary Reports',
            'url' => Yii::app()->createUrl('//company/payroll'),
            'icon' => '<i class="fa fa-wrench"></i>',
            'group' => 'managecompany',
            'isActive' => (Yii::app()->controller->module && Yii::app()->controller->module->id == 'company' && (Yii::app()->controller->id == 'payroll')),
            'sortOrder' => 999,
        ));

        $event->sender->addItem(array(
            'label' => 'User Feedbacks',
            'url' => Yii::app()->createUrl('//company/userFeedback'),
            'icon' => '<i class="fa fa-wrench"></i>',
            'group' => 'managecompany',
            'isActive' => (Yii::app()->controller->module && Yii::app()->controller->module->id == 'company' && (Yii::app()->controller->id == 'userFeedback')),
            'sortOrder' => 1000,
        ));

        $event->sender->addItem(array(
            'label' => 'Timedoctor Projects',
            'url' => Yii::app()->createUrl('//company/timeDoctor/sync'),
            'group' => 'manage',
            'icon' => '<i class="fa fa-database"></i>',
            'isActive' => (Yii::app()->controller->module && Yii::app()->controller->module->id == 'company' && Yii::app()->controller->id == 'timeDoctor'),
            'sortOrder' => 300,
        ));

        // Check for Admin Menu Pages to insert
    }

    public static function onProfileMenuInit($event) {

        $user = Yii::app()->getController()->getUser();

        // Is Module enabled on this workspace?
        if ($user->isModuleEnabled('company')) {
            $event->sender->addItem(array(
                'label' => 'Leave Calendar',
                'url' => Yii::app()->createUrl('//company/leaveManagment/index', array('uguid' => $user->guid)),
                'isActive' => (Yii::app()->controller->module && Yii::app()->controller->module->id == 'company' && Yii::app()->controller->id == 'leaveManagment'),
            ));
        }
        $event->sender->addItem(array(
            'label' => 'Subordinates',
            'url' => Yii::app()->createUrl('//company/employee/index', array('uguid' => $user->guid)),
            'isActive' => (Yii::app()->controller->module && Yii::app()->controller->module->id == 'company' && Yii::app()->controller->id == 'employee' && Yii::app()->controller->action->id == 'index'),
        ));

        if (Yii::app()->user->isAdmin()) {
            $event->sender->addItem(array(
                'label' => 'Manage Salary',
                'url' => Yii::app()->createUrl('//company/employeeSalary/admin', array('uguid' => $user->guid)),
                'isActive' => (Yii::app()->controller->module && Yii::app()->controller->module->id == 'company' && Yii::app()->controller->id == 'employeeSalary' && Yii::app()->controller->action->id == 'admin'),
            ));
        }
        if ($user->isCurrentUser()) {
            $event->sender->addItem(array(
                'label' => 'Salary',
                'url' => Yii::app()->createUrl('//company/employeeSalary/index', array('uguid' => $user->guid)),
                'isActive' => (Yii::app()->controller->module && Yii::app()->controller->module->id == 'company' && Yii::app()->controller->id == 'employeeSalary' && Yii::app()->controller->action->id == 'index'),
            ));

            $event->sender->addItem(array(
                'label' => 'Shift Swaps',
                'url' => Yii::app()->createUrl('//company/employee/shiftswaps', array('uguid' => $user->guid)),
                'isActive' => (Yii::app()->controller->module && Yii::app()->controller->module->id == 'company' && Yii::app()->controller->id == 'employee' && Yii::app()->controller->action->id == 'shiftswaps'),
            ));
        }
    }

    public static function onAccountMenuInit($event) {

        $event->sender->addItem(array(
            'label' => 'Qualifications',
            'url' => Yii::app()->createUrl('//company/employeeCertifications'),
            'icon' => '<i class="fa fa-graduation-cap"></i>',
            'isActive' => (Yii::app()->controller->module && Yii::app()->controller->module->id == 'company' && (Yii::app()->controller->id == 'employeeCertifications' || Yii::app()->controller->id == 'employeeEducations' || Yii::app()->controller->id == 'employeeLanguages' || Yii::app()->controller->id == 'employeeSkills')),
            'sortOrder' => '500',
        ));
    }

    /**
     * On build of the TopMenu, check if module is enabled
     * When enabled add a menu item
     *
     * @param type $event
     */
    public static function onTopMenuInit($event) {
        if (Yii::app()->user->isGuest) {
            return;
        }

        $event->sender->addItem(array(
            'label' => 'Work Log',
            'url' => Yii::app()->createUrl('//company/timeDoctor', array()),
            'icon' => '<i class="fa fa-database"></i>',
            'isActive' => (Yii::app()->controller->module && Yii::app()->controller->module->id == 'company' && Yii::app()->controller->id == 'timeDoctor'),
            'sortOrder' => 300,
        ));

//        $event->sender->addItem(array(
//            'label' => 'Manage Employees',
//            'url' => Yii::app()->createUrl('//company/supervisor/manage', array()),
//            'icon' => '<i class="fa fa-database"></i>',
//            'isActive' => (Yii::app()->controller->module && Yii::app()->controller->module->id == 'company' && Yii::app()->controller->id == 'supervisor'),
//            'sortOrder' => 400,
//        ));
    }

    /**
     * On build of the dashboard sidebar widget, add the birthday widget if module is enabled.
     *
     * @param type $event
     */
    public static function onSidebarInit($event) {

        if (Yii::app()->moduleManager->isEnabled('company')) {

            if (Yii::app()->user->isGuest) {
                return;
            }

            $event->sender->addWidget('application.modules.company.widgets.AttendanceSidebarWidget', array(), array('sortOrder' => 0));
            $event->sender->addWidget('application.modules.company.widgets.WorkshiftSidebarWidget', array(), array('sortOrder' => 1));
        }
    }

    public static function AddCustomProfileFields($event) {

        if (Yii::app()->moduleManager->isEnabled('company')) {
            $event->sender->fieldTypes = array(
                'ProfileFieldTypeCompany' => Yii::t('UserModule.models_ProfileFieldType', 'Company'),
                'ProfileFieldTypeEmpStatus' => Yii::t('UserModule.models_ProfileFieldType', 'Employment Status'),
                'ProfileFieldTypeJobs' => Yii::t('UserModule.models_ProfileFieldType', 'Company Jobs'),
                'ProfileFieldTypePayGrades' => Yii::t('UserModule.models_ProfileFieldType', 'Pay Grades'),
                'ProfileFieldTypeDepartment' => Yii::t('UserModule.models_ProfileFieldType', 'Departments'),
                'ProfileFieldTypeTeam' => Yii::t('UserModule.models_ProfileFieldType', 'Teams'),
                'ProfileFieldTypeSupervisor' => Yii::t('UserModule.models_ProfileFieldType', 'Supervisor'),
            );
//            $event->sender->addFieldType('ProfileFieldTypeCompany', 'Company');
//            $event->sender->addFieldType('ProfileFieldTypeEmpStatus', 'Employment Status');
//            $event->sender->fieldTypes['ProfileFieldTypeCompany']=Yii::t('UserModule.models_ProfileFieldType', 'Company');
        }
    }

    /**
     * On run of the cron, apply late attendance deductions based on defined settings
     *
     * @param type $event
     */
    public static function onCronDailyRunAttendance($event) {
        $cron = $event->sender;
        $users = User::model()->findAllByAttributes(array('status' => User::STATUS_ENABLED));
        $late_attendance = HSetting::Get('late_attendance', 'company');
        $late_attendance_component = HSetting::Get('late_attendance_component', 'company');
        $late_attendance_triger = HSetting::Get('late_attendance_triger', 'company');
        $late_attendance_amount = HSetting::Get('late_attendance_amount', 'company');
        $late_attendance_amount_fixed = HSetting::Get('late_attendance_amount_fixed', 'company');
        $late_attendance_amount_specified = HSetting::Get('late_attendance_amount_specified', 'company');
        $late_attendance_note = HSetting::Get('late_attendance_note', 'company');
        foreach ($users as $user) {
            $late_attendance_count = $user->getSetting('late_attendance_count', 'company');
            if ($late_attendance_count >= $late_attendance_triger) {

                $salaries = EmployeeSalary::model()->findAllByAttributes(array('emp_id' => $user->id, 'component_id' => $late_attendance_component));
                $total_payped = 0;
                foreach ($salaries as $emp_sal) {
                    if (isset($emp_sal->amount))
                        $total_payped += $emp_sal->amount;
                }
                if ($late_attendance_amount == 'fixed') {
                    $amount = $late_attendance_amount_fixed;
                } else {
                    $onday = $total_payped / 30;
                    switch ($late_attendance_amount_specified) {
                        case 'quarter':
                            $amount = $onday / 4;
                            break;
                        case 'half':
                            $amount = $onday / 2;
                            break;
                        case 'two':
                            $amount = $onday * 2;
                            break;
                        case 'three':
                            $amount = $onday * 3;
                            break;
                        default:
                            $amount = $onday;
                            break;
                    }
                }
                $employee_salary = new EmployeeSalary;
                $employee_salary->emp_id = $user->id;
                $employee_salary->component_id = $late_attendance;
                $employee_salary->amount = $amount;
                $employee_salary->effect_date = date("Y-m-d", time());
                ;
                $employee_salary->details = $late_attendance_note;
                $employee_salary->save();
            }
        }
    }

    /**
     * On run of the cron, apply Absence deductions based on defined settings
     *
     * @param type $event
     */
    public static function onCronDailyRunAbsence($event) {
        $cron = $event->sender;
        $effect_date = date('Y-m');
        $users = User::model()->findAllByAttributes(array('status' => User::STATUS_ENABLED));
        $absence = HSetting::Get('absence_add_to', 'company');
        $absence_component = HSetting::Get('absence_component', 'company');
        $absence_triger = HSetting::Get('absence_triger', 'company');
        $absence_amount = HSetting::Get('absence_amount', 'company');
        $absence_amount_fixed = HSetting::Get('absence_amount_fixed', 'company');
        $absence_amount_specified = HSetting::Get('absence_amount_specified', 'company');
        $absence_note = HSetting::Get('absence_note', 'company');
        foreach ($users as $user) {
            $today_checkedin = Attendance::model()->find(array(
                'condition' => 'user_id = :user_id AND DATE_FORMAT( in_time,  "%Y-%m" ) =:currdate',
                'params' => array(
                    ':user_id' => $user->id,
                    ':currdate' => $effect_date
                )
            ));
            $absence_count = $user->getSetting('absence_count', 'company');
            if (!$today_checkedin) {
                $user->setSetting('absence_count', $absence_count + 1, 'company');
            }
            if ($absence_count >= $absence_triger) {
                $salaries = EmployeeSalary::model()->findAllByAttributes(array('emp_id' => $user->id, 'component_id' => $absence_component));
                $total_payped = 0;
                foreach ($salaries as $emp_sal) {
                    if (isset($emp_sal->amount))
                        $total_payped += $emp_sal->amount;
                }
                if ($absence_amount == 'fixed') {
                    $amount = $absence_amount_fixed;
                } else {
                    $onday = $total_payped / 30;
                    switch ($absence_amount_specified) {
                        case 'quarter':
                            $amount = $onday / 4;
                            break;
                        case 'half':
                            $amount = $onday / 2;
                            break;
                        case 'two':
                            $amount = $onday * 2;
                            break;
                        case 'three':
                            $amount = $onday * 3;
                            break;
                        default:
                            $amount = $onday;
                            break;
                    }
                }
                $employee_salary = new EmployeeSalary;
                $employee_salary->emp_id = $user->id;
                $employee_salary->component_id = $absence;
                $employee_salary->amount = $amount;
                $employee_salary->effect_date = date("Y-m-d", time());
                ;
                $employee_salary->details = $absence_note;
                $employee_salary->save();
                $user->setSetting('absence_count', 0, 'company');
            }
        }
    }

    /**
     * On run of the cron, apply Timedoctor sync
     *
     * @param type $event
     */
    public static function onCronDailyRunTimedoctor($event) {
        $cron = $event->sender;

        Yii::import('application.modules_core.user.components.*');
        $newIdentity = new UserIdentity('admin', '');
        $newIdentity->fakeAuthenticate();
        Yii::app()->user->setId($newIdentity->getId());
        Yii::import('ext.oauth2.OAuth2');

        $config = require Yii::getPathOfAlias('ext.oauth2') . '/config.php';

        $provider = 'Timedoctor';
        if (!isset($config[$provider])) {
            throw new CHttpException('invalid request.');
        }
        $config[$provider]['redirect_uri'] = 'n';
        try {
            $oauth2 = OAuth2::create($provider, $config[$provider]);
        } catch (OAuth2_Exception $e) {
            throw new CHttpException($e->getMessage());
        }

        $user = Profile::model()->findByAttributes(array('user_id' => Yii::app()->user->id));
        if ($user->timedoctor_token) {
            $token = new OAuth2_Token;
            $token->access_token = $user->timedoctor_token;
            $token->user_id = $user->timedoctor_user_id;
            $token->expires_in = 432000;
            $projects = $oauth2->getProjects($token);
            $new = 0;
            $updated = 0;
            foreach ($projects['projects'] as $project) {
                $rizeone_project = Project::model()->findByAttributes(array('timedoctor_id' => $project['project_id']));
                if ($rizeone_project) {
                    if ($rizeone_project->archived != $project['archived'] || $rizeone_project->name != $project['project_name']) {
                        $rizeone_project->archived = $project['archived'];
                        $rizeone_project->name = $project['project_name'];
                        $rizeone_project->save();
                        $updated++;
                    }
                } else {
                    $rizeone_project = new Project();
                    $rizeone_project->name = $project['project_name'];
                    $rizeone_project->timedoctor_id = $project['project_id'];
                    $rizeone_project->archived = $project['archived'];
                    $rizeone_project->save();
                    $new++;
                }
            }
            print "New Projects: $new \n";
            print "Updated Projects: $updated \n";
        } else {
            print "Invalid timedoctor token \n";
        }
    }

    public static function onCronMonthlyRunPayroll($event) {
        $cron = $event->sender;
        $now = time();
        $last_run = HSetting::Get('monthly_last_run', 'company');
        $last_date = date("Y-m", $last_run);
        $datediff = $now - $last_run;
        $num_of_days = floor($datediff / (60 * 60 * 24));
        if ($num_of_days > 30) {
            $users = User::model()->findAllByAttributes(array('status' => User::STATUS_ENABLED));
            $salary_components = SalaryComponent::model()->findAllByAttributes(array('recurring' => 1));
            foreach ($users as $user) {
                foreach ($salary_components as $salary_component) {
                    
                    $salaries = EmployeeSalary::model()->findAll(array(
                        'condition' => "emp_id =:user_id and component_id =:component_id and DATE_FORMAT( effect_date,  '%Y-%m' ) =:currdate",
                        'params' => array(
                            ':user_id' => $user->id,
                            'component_id' => $salary_component->id,
                            ':currdate' => $last_date
                        )
                    ));

                    foreach ($salaries as $salary) {
                        $employee_salary = new EmployeeSalary;
                        $employee_salary->emp_id = $user->id;
                        $employee_salary->component_id = $salary_component->id;
                        $employee_salary->amount = $salary->amount;
                        $employee_salary->effect_date = date("Y-m-d", time());
                        ;
                        $employee_salary->details = "Recurring Payment";
                        $employee_salary->save(false);
                    }
                }
            }
            HSetting::Set('monthly_last_run', time(), 'company');
        }
    }

}
