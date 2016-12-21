<?php

Yii::app()->moduleManager->register(array(
    'id' => 'company',
    'class' => 'application.modules.company.CompanyModule',
    'import' => array(
        'application.modules.company.*',
        'application.modules.company.models.*',
        'application.modules.company.notifications.*',
    ),
    // Events to Catch 
    'events' => array(
        array('class' => 'ZCronRunner', 'event' => 'onDailyRun', 'callback' => array('CompanyModule', 'onCronDailyRunAttendance')),
        array('class' => 'ZCronRunner', 'event' => 'onDailyRun', 'callback' => array('CompanyModule', 'onCronDailyRunAbsence')),
        array('class' => 'ZCronRunner', 'event' => 'onDailyRun', 'callback' => array('CompanyModule', 'onCronMonthlyRunPayroll')),
        array('class' => 'AdminMenuWidget', 'event' => 'onInit', 'callback' => array('CompanyModule', 'onAdminMenuInit')),
        array('class' => 'ProfileMenuWidget', 'event' => 'onInit', 'callback' => array('CompanyModule', 'onProfileMenuInit')),
        array('class' => 'AccountMenuWidget', 'event' => 'onInit', 'callback' => array('CompanyModule', 'onAccountMenuInit')),
        array('class' => 'TopMenuWidget', 'event' => 'onInit', 'callback' => array('CompanyModule', 'onTopMenuInit')),
        array('class' => 'DashboardSidebarWidget', 'event' => 'onInit', 'callback' => array('CompanyModule', 'onSidebarInit')),
        array('class' => 'ProfileFieldType', 'event' => 'onInit', 'callback' => array('CompanyModule', 'AddCustomProfileFields')),
    ),
));
?>