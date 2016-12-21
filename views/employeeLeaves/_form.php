<?php
/* @var $this EmployeeLeavesController */
/* @var $model EmployeeLeaves */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'employee-leaves-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'employee'); ?>
		<?php echo $form->textField($model,'employee'); ?>
		<?php echo $form->error($model,'employee'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'leave_type'); ?>
		<?php echo $form->textField($model,'leave_type'); ?>
		<?php echo $form->error($model,'leave_type'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'leave_period'); ?>
		<?php echo $form->textField($model,'leave_period'); ?>
		<?php echo $form->error($model,'leave_period'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'date_start'); ?>
		<?php echo $form->textField($model,'date_start'); ?>
		<?php echo $form->error($model,'date_start'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'date_end'); ?>
		<?php echo $form->textField($model,'date_end'); ?>
		<?php echo $form->error($model,'date_end'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'details'); ?>
		<?php echo $form->textArea($model,'details',array('form-groups'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'details'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'attachment'); ?>
		<?php echo $form->textField($model,'attachment',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'attachment'); ?>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->