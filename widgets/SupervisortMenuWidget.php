<?php

/**
 * SupervisortMenuWidget as (usally left) navigation on tasks page options.
 * 
 * @author Nedal
 */
class SupervisortMenuWidget extends MenuWidget {

    public $template = "application.widgets.views.leftNavigation";
    public $type = "announcmentNavigation";

    public function init() {

        $this->addItemGroup(array(
            'id' => 'supervisor',
            'label' => '<strong>Supervisors</strong> menu',
            'sortOrder' => 100,
        ));

//        $this->addItem(array(
//            'label' => 'Manage Subordinates',
//            'icon' => '<i class="fa fa-bell"></i>',
//            'group' => 'supervisor',
//            'url' => Yii::app()->createUrl('//company/supervisor/manage'),
//            'sortOrder' => 100,
//            'isActive' => (Yii::app()->controller->id == "supervisor" && (Yii::app()->controller->action->id == "manage")),
//        ));
        
        $this->addItem(array(
            'label' => 'Subordinates Leaves',
            'icon' => '<i class="fa fa-bell"></i>',
            'group' => 'supervisor',
            'url' => Yii::app()->createUrl('//company/supervisor/index'),
            'sortOrder' => 120,
            'isActive' => (Yii::app()->controller->id == "supervisor" && (Yii::app()->controller->action->id == "index")),
        ));
        
        $this->addItem(array(
            'label' => 'Subordinates Shift Swap',
            'icon' => '<i class="fa fa-bell"></i>',
            'group' => 'supervisor',
            'url' => Yii::app()->createUrl('//company/supervisor/shiftswap'),
            'sortOrder' => 121,
            'isActive' => (Yii::app()->controller->id == "supervisor" && (Yii::app()->controller->action->id == "shiftswap")),
        ));
        
        parent::init();
    }

}

?>
