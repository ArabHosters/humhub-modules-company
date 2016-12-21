<?php
/* @var $this UserFeedbackController */
/* @var $data UserFeedback */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('feedback_comment')); ?>:</b>
	<?php echo CHtml::encode($data->feedback_comment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('feedback_details')); ?>:</b>
	<?php echo CHtml::encode($data->feedback_details); ?>
	<br />


</div>