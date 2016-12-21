<?php $this->beginContent('application.modules_core.notification.views.notificationLayout', array('notification' => $notification,'iconClass'=>'fa fa-exclamation-circle','hideUserImage'=>true)); ?>
<?php

echo 'You have recived warning for <strong>Late Attendance</strong>';
?>
<?php $this->endContent(); ?>