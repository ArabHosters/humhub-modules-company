<?php

/**
 * SwapNotification notify user for shift swap requests
 *
 */
class SwapNotification extends Notification {

    // Path to Web View of this Notification
    public $webView = "company.views.notifications.userSwap";
    // Path to Mail Template for this notification
    public $mailView = "application.modules.company.views.notifications.userSwap_mail";

    public function redirectToTarget() {
        $user = $this->getTargetObject();
        Yii::app()->getController()->redirect(Yii::app()->createUrl('//company/employee/shiftswaps', array('uguid' => $user->guid)));
    }
    
}

?>
