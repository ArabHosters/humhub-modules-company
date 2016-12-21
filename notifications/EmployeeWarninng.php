<?php

/**
 * EmployeeWarninng is fired to the user recived warnning
 *
 */
class EmployeeWarninng extends Notification {

    // Path to Web View of this Notification
    public $webView = "company.views.notifications.userWarninng";
    // Path to Mail Template for this notification
    public $mailView = "application.modules.company.views.notifications.taskAssigned_mail";

    public function redirectToTarget() {
        $user = $this->getTargetObject();
        Yii::app()->getController()->redirect(Yii::app()->createUrl('//company/employeeSalary/index', array('uguid' => $user->guid)));
    }
    
}

?>
