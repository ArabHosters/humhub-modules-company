<?php $this->beginContent('application.modules_core.notification.views.notificationLayout', array('notification' => $notification)); ?>
<?php
echo Yii::t('userleave', '{userName} send leave request.', array(
    '{userName}' => '<strong>' . CHtml::encode($creator->displayName) . '</strong>',
));
?>
<?php $this->endContent(); ?>