<?php

$this->widget('zii.widgets.CMenu', array(
    'firstItemCssClass' => 'first',
    'lastItemCssClass' => 'last',
    'htmlOptions' => array('class' => 'nav nav-tabs'),
    'activeCssClass' => 'active',
    'items' => array(
        array(
            'label' => 'Job Titles',
            'url' => array('//company/jobTitles'),
            'active' => (Yii::app()->controller->module && Yii::app()->controller->module->id == 'company' && Yii::app()->controller->id == 'jobTitles')
        ),
        array(
            'label' => 'Pay Grades',
            'url' => array('//company/payGrades'),
            'active' => (Yii::app()->controller->module && Yii::app()->controller->module->id == 'company' && Yii::app()->controller->id == 'payGrades')
        ),
        array(
            'label' => 'Salary Components',
            'url' => array('//company/salaryComponent'),
            'active' => (Yii::app()->controller->module && Yii::app()->controller->module->id == 'company' && Yii::app()->controller->id == 'salaryComponent')
        ),
        array(
            'label' => 'Salary Settings',
            'url' => array('//company/salarySettings'),
            'active' => (Yii::app()->controller->module && Yii::app()->controller->module->id == 'company' && Yii::app()->controller->id == 'salarySettings')
        ),
        array(
            'label' => 'Employment Status',
            'url' => array('//company/employmentStatus'),
            'active' => (Yii::app()->controller->module && Yii::app()->controller->module->id == 'company' && Yii::app()->controller->id == 'employmentStatus')
        ),
    )
));
$this->widget('zii.widgets.CMenu', array(
    'items' => $this->menu,
));
