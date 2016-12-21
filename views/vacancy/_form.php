<?php
/* @var $this VacancyController */
/* @var $model Vacancy */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'vacancy-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('class' => 'form-control', 'size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'company_id'); ?>
		<?php echo $form->dropdownList($model, 'company_id', CHtml::listData(CompanyStructures::model()->findAllByAttributes(array('type' => 'Company')), 'id', 'title'), array('class' => 'form-control', 'empty'=>'Select')); ?>
		<?php echo $form->error($model,'company_id'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'department_id'); ?>
		<?php echo $form->dropdownList($model, 'department_id', CHtml::listData(CompanyStructures::model()->findAllByAttributes(array('type' => 'Department')), 'id', 'title'), array('class' => 'form-control', 'empty'=>'Select')); ?>
		<?php echo $form->error($model,'department_id'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'hiring_manager'); ?>
		<?php echo $form->dropdownList($model, 'hiring_manager', CHtml::listData(User::model()->findAll(), 'id', 'displayName'), array('class' => 'form-control', 'empty'=>'Select')); ?>
		<?php echo $form->error($model,'hiring_manager'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'num_of_pos'); ?>
		<?php echo $form->textField($model,'num_of_pos',array('class' => 'form-control')); ?>
		<?php echo $form->error($model,'num_of_pos'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'posting_details'); ?>
		<?php echo $form->textArea($model,'posting_details',array('class' => 'form-control', 'form-groups'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'posting_details'); ?>
	</div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->