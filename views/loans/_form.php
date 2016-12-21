<?php
/* @var $this LoansController */
/* @var $model EmployeeLoan */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'employee-loan-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->dropdownList($model, 'user_id', CHtml::listData(User::model()->findAll(), 'id', 'displayName'), array('class' => 'form-control', 'empty' => 'Select')); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'amount'); ?>
		<?php echo $form->textField($model,'amount',array('class' => 'form-control')); ?>
		<?php echo $form->error($model,'amount'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'loan_date'); ?>
		<?php echo $form->textField($model,'loan_date',array('class' => 'form-control')); ?>
		<?php echo $form->error($model,'loan_date'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'repay_date'); ?>
		<?php echo $form->textField($model,'repay_date',array('class' => 'form-control')); ?>
		<?php echo $form->error($model,'repay_date'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'repay_amount'); ?>
		<?php echo $form->textField($model,'repay_amount',array('class' => 'form-control')); ?>
		<?php echo $form->error($model,'repay_amount'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'note'); ?>
		<?php echo $form->textArea($model,'note',array('class' => 'form-control')); ?>
		<?php echo $form->error($model,'note'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropdownList($model, 'status', array('Pending'=>'Pending','Approved'=>'Approved','Rejected'=>'Rejected'), array('class' => 'form-control', 'empty' => 'Select')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->