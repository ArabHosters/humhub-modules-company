<?php
$this->widget('zii.widgets.CMenu', array(
    'firstItemCssClass' => 'first',
    'lastItemCssClass' => 'last',
    'htmlOptions' => array('class' => 'nav nav-tabs'),
    'activeCssClass' => 'active',
    'items' => array(
        array(
            'label' => 'Skills',
            'url' => array('//company/skills'),
            'active'=>(Yii::app()->controller->module && Yii::app()->controller->module->id == 'company' && Yii::app()->controller->id == 'skills')
        ),
        array(
            'label' => 'Educations',
            'url' => array('//company/educations'),
            'active'=>(Yii::app()->controller->module && Yii::app()->controller->module->id == 'company' && Yii::app()->controller->id == 'educations')
        ),
        array(
            'label' => 'Certifications',
            'url' => array('//company/certifications'),
            'active'=>(Yii::app()->controller->module && Yii::app()->controller->module->id == 'company' && Yii::app()->controller->id == 'certifications')
        ),
        array(
            'label' => 'Languages',
            'url' => array('//company/languages'),
            'active'=>(Yii::app()->controller->module && Yii::app()->controller->module->id == 'company' && Yii::app()->controller->id == 'languages')
        ),
    )
));
$this->widget('zii.widgets.CMenu', array(
    'items' => $this->menu,
));