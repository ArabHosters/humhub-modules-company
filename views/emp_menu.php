<?php
$this->widget('zii.widgets.CMenu', array(
    'firstItemCssClass' => 'first',
    'lastItemCssClass' => 'last',
    'htmlOptions' => array('class' => 'nav nav-tabs'),
    'activeCssClass' => 'active',
    'items' => array(
        array(
            'label' => 'Certifications',
            'url' => array('//company/employeeCertifications'),
            'active'=>(Yii::app()->controller->module && Yii::app()->controller->module->id == 'company' && Yii::app()->controller->id == 'employeeCertifications')
        ),
        array(
            'label' => 'Education',
            'url' => array('//company/employeeEducations'),
            'active'=>(Yii::app()->controller->module && Yii::app()->controller->module->id == 'company' && Yii::app()->controller->id == 'employeeEducations')
        ),
        array(
            'label' => 'Languages',
            'url' => array('//company/employeeLanguages'),
            'active'=>(Yii::app()->controller->module && Yii::app()->controller->module->id == 'company' && Yii::app()->controller->id == 'employeeLanguages')
        ),
        array(
            'label' => 'Skills',
            'url' => array('//company/employeeSkills'),
            'active'=>(Yii::app()->controller->module && Yii::app()->controller->module->id == 'company' && Yii::app()->controller->id == 'employeeSkills')
        ),
    )
));
$this->widget('zii.widgets.CMenu', array(
    'items' => $this->menu,
));
