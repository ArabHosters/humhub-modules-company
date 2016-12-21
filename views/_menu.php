<?php
$this->widget('zii.widgets.CMenu', array(
    'firstItemCssClass' => 'first',
    'lastItemCssClass' => 'last',
    'htmlOptions' => array('class' => 'nav nav-tabs'),
    'activeCssClass' => 'active',
    'items' => array(
        array(
            'label' => 'Leave Types',
            'url' => array('//company/leaveTypes'),
            'active'=>(Yii::app()->controller->module && Yii::app()->controller->module->id == 'company' && Yii::app()->controller->id == 'leaveTypes')
        ),
        array(
            'label' => 'Leave Periods',
            'url' => array('//company/leavePeriods'),
            'active'=>(Yii::app()->controller->module && Yii::app()->controller->module->id == 'company' && Yii::app()->controller->id == 'leavePeriods')
        ),
        array(
            'label' => 'Leave Rules',
            'url' => array('//company/leaveRules'),
            'active'=>(Yii::app()->controller->module && Yii::app()->controller->module->id == 'company' && Yii::app()->controller->id == 'leaveRules')
        ),
        array(
            'label' => 'Holidays',
            'url' => array('//company/Holidays'),
            'active'=>(Yii::app()->controller->module && Yii::app()->controller->module->id == 'company' && Yii::app()->controller->id == 'holidays')
        ),
        array(
            'label' => 'Work days',
            'url' => array('//company/Workdays'),
            'active'=>(Yii::app()->controller->module && Yii::app()->controller->module->id == 'company' && Yii::app()->controller->id == 'workdays')
        ),
        array(
            'label' => 'Employee Leaves',
            'url' => array('//company/employeeLeaves'),
            'active'=>(Yii::app()->controller->module && Yii::app()->controller->module->id == 'company' && Yii::app()->controller->id == 'employeeLeaves')
        ),
        array(
            'label' => 'Employee Attendance',
            'url' => array('//company/employeeAttendance'),
            'active'=>(Yii::app()->controller->module && Yii::app()->controller->module->id == 'company' && Yii::app()->controller->id == 'employeeAttendance')
        ),
        array(
            'label' => 'Employee Shift Swaps',
            'url' => array('//company/employeeSwaps'),
            'active'=>(Yii::app()->controller->module && Yii::app()->controller->module->id == 'company' && Yii::app()->controller->id == 'employeeSwaps')
        ),
    )
));
$this->widget('zii.widgets.CMenu', array(
    'items' => $this->menu,
));
