<?php
/* @var $this LeaveTypesController */
/* @var $model LeaveTypes */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'supervisor_leave_assign'); ?>
		<?php echo $form->textField($model,'supervisor_leave_assign',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'employee_can_apply'); ?>
		<?php echo $form->textField($model,'employee_can_apply',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'apply_beyond_current'); ?>
		<?php echo $form->textField($model,'apply_beyond_current',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'leave_accrue'); ?>
		<?php echo $form->textField($model,'leave_accrue',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'carried_forward'); ?>
		<?php echo $form->textField($model,'carried_forward',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'default_per_year'); ?>
		<?php echo $form->textField($model,'default_per_year',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'carried_forward_percentage'); ?>
		<?php echo $form->textField($model,'carried_forward_percentage'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'carried_forward_leave_availability'); ?>
		<?php echo $form->textField($model,'carried_forward_leave_availability'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'propotionate_on_joined_date'); ?>
		<?php echo $form->textField($model,'propotionate_on_joined_date',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->