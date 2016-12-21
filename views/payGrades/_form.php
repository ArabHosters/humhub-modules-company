<?php
/* @var $this PayGradesController */
/* @var $model PayGrades */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'pay-grades-form',
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
        <?php echo $form->labelEx($model, 'name'); ?>
        <?php echo $form->textField($model, 'name', array('class' => 'form-control', 'size' => 60, 'maxlength' => 100)); ?>
        <?php echo $form->error($model, 'name'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'currency'); ?>
        <?php echo $form->textField($model, 'currency', array('class' => 'form-control', 'size' => 3, 'maxlength' => 3)); ?>
        <?php echo $form->error($model, 'currency'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'min_salary'); ?>
        <?php echo $form->textField($model, 'min_salary', array('class' => 'form-control', 'size' => 12, 'maxlength' => 12)); ?>
        <?php echo $form->error($model, 'min_salary'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'max_salary'); ?>
        <?php echo $form->textField($model, 'max_salary', array('class' => 'form-control', 'size' => 12, 'maxlength' => 12)); ?>
        <?php echo $form->error($model, 'max_salary'); ?>
    </div>

    <div class="form-group buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-primary')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->