<?php
/* @var $this LoansController */
/* @var $data EmployeeLoan */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amount')); ?>:</b>
	<?php echo CHtml::encode($data->amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('loan_date')); ?>:</b>
	<?php echo CHtml::encode($data->loan_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('repay_date')); ?>:</b>
	<?php echo CHtml::encode($data->repay_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('repay_amount')); ?>:</b>
	<?php echo CHtml::encode($data->repay_amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('note')); ?>:</b>
	<?php echo CHtml::encode($data->note); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	*/ ?>

</div>