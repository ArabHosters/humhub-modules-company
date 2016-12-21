<?php

$this->widget('zii.widgets.CMenu', array(
    'firstItemCssClass' => 'first',
    'lastItemCssClass' => 'last',
    'htmlOptions' => array('class' => 'nav nav-tabs'),
    'activeCssClass' => 'active',
    'items' => array(
        array(
            'label' => 'Late attendance Settings',
            'url' => array('//company/salarySettings'),
            'active' => (Yii::app()->controller->module && Yii::app()->controller->module->id == 'company' && Yii::app()->controller->id == 'salarySettings' && Yii::app()->controller->action->id == 'index')
        ),
        array(
            'label' => 'Absence Settings',
            'url' => array('//company/salarySettings/absence'),
            'active' => (Yii::app()->controller->module && Yii::app()->controller->module->id == 'company' && Yii::app()->controller->id == 'salarySettings' && Yii::app()->controller->action->id == 'absence')
        ),
    )
));
$this->widget('zii.widgets.CMenu', array(
    'items' => $this->menu,
));
