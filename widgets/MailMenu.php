<?php

/**
 * SupervisortMenuWidget as (usally left) navigation on tasks page options.
 * 
 * @author Nedal
 */
class MailMenu extends MenuWidget {

    public $template = "application.widgets.views.leftNavigation";

    public function init() {

        $this->addItemGroup(array(
            'id' => 'supervisor',
            'label' => '<strong>Transactions</strong> menu',
            'sortOrder' => 100,
        ));

        $this->addItem(array(
            'label' => 'Transaction Settings',
            'icon' => '<i class="fa fa-lock"></i>',
            'group' => 'supervisor',
            'url' => Yii::app()->createUrl('//company/fetchMail/settings'),
            'sortOrder' => 100,
            'isActive' => (Yii::app()->controller->id == "fetchMail" && (Yii::app()->controller->action->id == "settings")),
        ));
        
        $this->addItem(array(
            'label' => 'View Entries',
            'icon' => '<i class="fa fa-bell"></i>',
            'group' => 'supervisor',
            'url' => Yii::app()->createUrl('//company/fetchMail/index'),
            'sortOrder' => 120,
            'isActive' => (Yii::app()->controller->id == "fetchMail" && (Yii::app()->controller->action->id == "index")),
        ));
        
        $this->addItem(array(
            'label' => 'Archive',
            'icon' => '<i class="fa fa-bell"></i>',
            'group' => 'supervisor',
            'url' => Yii::app()->createUrl('//company/fetchMail/archive'),
            'sortOrder' => 130,
            'isActive' => (Yii::app()->controller->id == "fetchMail" && (Yii::app()->controller->action->id == "archive")),
        ));
        
        parent::init();
    }

}

?>
