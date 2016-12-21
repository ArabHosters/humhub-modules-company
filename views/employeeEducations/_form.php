<?php
/* @var $this EmployeeEducationsController */
/* @var $model EmployeeEducations */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'employee-educations-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'education_id'); ?>
        <?php echo $form->dropdownList($model, 'education_id', CHtml::listData(Educations::model()->findAll(), 'id', 'name'), array('class' => 'form-control', 'empty' => 'Select Education')); ?>
        <?php echo $form->error($model, 'education_id'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'employee'); ?>
        <?php echo $form->dropdownList($model, 'employee', CHtml::listData(User::model()->findAll(), 'id', 'displayName'), array('class' => 'form-control', 'empty' => 'Select Employee')); ?>
        <?php echo $form->error($model, 'employee'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'institute'); ?>
        <?php echo $form->textField($model, 'institute', array('class' => 'form-control', 'size' => 60, 'maxlength' => 400)); ?>
        <?php echo $form->error($model, 'institute'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'date_start'); ?>
        <?php echo HHtml::dateTimeField('EmployeeEducations[date_start]', '', array('class' => 'form-control', 'id' => 'date_start')); ?>
        <?php echo $form->error($model, 'date_start'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'date_end'); ?>
        <?php echo HHtml::dateTimeField('EmployeeEducations[date_end]', '', array('class' => 'form-control', 'id' => 'date_end')); ?>
        <?php echo $form->error($model, 'date_end'); ?>
    </div>


    <div class="form-group buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-primary')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->