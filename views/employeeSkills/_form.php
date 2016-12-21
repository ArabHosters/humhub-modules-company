<?php
/* @var $this EmployeeSkillsController */
/* @var $model EmployeeSkills */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'employee-skills-form',
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
        <?php echo $form->labelEx($model, 'skill_id'); ?>
        <?php echo $form->dropdownList($model, 'skill_id', CHtml::listData(Skills::model()->findAll(), 'id', 'name'), array('class' => 'form-control', 'empty' => 'Select Skill')); ?>
        <?php echo $form->error($model, 'skill_id'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'employee'); ?>
        <?php echo $form->dropdownList($model, 'employee', CHtml::listData(User::model()->findAll(), 'id', 'displayName'), array('class' => 'form-control', 'empty' => 'Select Employee')); ?>
        <?php echo $form->error($model, 'employee'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'details'); ?>
        <?php echo $form->textField($model, 'details', array('size' => 60, 'maxlength' => 400)); ?>
        <?php echo $form->error($model, 'details'); ?>
    </div>

    <div class="form-group buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-primary')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->