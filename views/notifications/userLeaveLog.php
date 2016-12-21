<?php $this->beginContent('application.modules_core.notification.views.notificationLayout', array('notification' => $notification)); ?>
<?php
echo Yii::t('userleave', '{userName} changed your leave request status from {status_from} to {status_to}.', array(
    '{userName}' => '<strong>' . CHtml::encode($creator->displayName) . '</strong>',
    '{status_from}' => '<strong>' . $sourceObject->status_from . '</strong>',
    '{status_to}' => '<strong>' . $sourceObject->status_to . '</strong>',
));
?>
<?php $this->endContent(); ?>