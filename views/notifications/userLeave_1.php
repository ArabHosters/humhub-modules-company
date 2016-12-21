<?php $this->beginContent('application.modules_core.notification.views.notificationLayout', array('notification' => $notification)); ?>
<?php
echo Yii::t('userleave', '{userName} send swap request with {requested_user}.', array(
    '{userName}' => '<strong>' . CHtml::encode($sourceObject->displayName) . '</strong>',
    '{requested_user}' => '<strong>' . CHtml::encode($targetObject->displayName) . '</strong>',
));
?>
<?php $this->endContent(); ?>