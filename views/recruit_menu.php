<?php
$this->widget('zii.widgets.CMenu', array(
    'firstItemCssClass' => 'first',
    'lastItemCssClass' => 'last',
    'htmlOptions' => array('class' => 'nav nav-tabs'),
    'activeCssClass' => 'active',
    'items' => array(
        array(
            'label' => 'Vacancies',
            'url' => array('//company/vacancy'),
            'active'=>(Yii::app()->controller->module && Yii::app()->controller->module->id == 'company' && Yii::app()->controller->id == 'vacancy')
        ),
        array(
            'label' => 'Candidates',
            'url' => array('//company/candidates'),
            'active'=>(Yii::app()->controller->module && Yii::app()->controller->module->id == 'company' && Yii::app()->controller->id == 'candidates')
        ),
    )
));
$this->widget('zii.widgets.CMenu', array(
    'items' => $this->menu,
));
