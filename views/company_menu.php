<?php
$this->widget('zii.widgets.CMenu', array(
    'firstItemCssClass' => 'first',
    'lastItemCssClass' => 'last',
    'htmlOptions' => array('class' => 'nav nav-tabs'),
    'activeCssClass' => 'active',
    'items' => array(
        array(
            'label' => 'Company Structure',
            'url' => array('//company/companyStructures'),
            'active'=>(Yii::app()->controller->module && Yii::app()->controller->module->id == 'company' && Yii::app()->controller->id == 'companyStructures')
        ),
        array(
            'label' => 'Company Graph',
            'url' => array('//company/companyOrgChart'),
            'active'=>(Yii::app()->controller->module && Yii::app()->controller->module->id == 'company' && Yii::app()->controller->id == 'companyOrgChart')
        ),
    )
));
$this->widget('zii.widgets.CMenu', array(
    'items' => $this->menu,
));
