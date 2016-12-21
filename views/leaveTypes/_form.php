<?php
/* @var $this LeaveTypesController */
/* @var $model LeaveTypes */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('HActiveForm', array(
        'id' => 'leave-types-form',
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
        <?php echo $form->labelEx($model, 'supervisor_leave_assign'); ?>
        <?php echo $form->dropdownList($model, 'supervisor_leave_assign', $model->options,array('class' => 'form-control')); ?>
        <?php echo $form->error($model, 'supervisor_leave_assign'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'employee_can_apply'); ?>
        <?php echo $form->dropdownList($model , 'employee_can_apply' , $model->options,array('class' => 'form-control')); ?>
        <?php echo $form->error($model, 'employee_can_apply'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'apply_beyond_current'); ?>
        <?php echo $form->dropdownList($model , 'apply_beyond_current' , $model->options,array('class' => 'form-control')); ?>
        <?php echo $form->error($model, 'apply_beyond_current'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'leave_accrue'); ?>
        <?php echo $form->dropdownList($model , 'leave_accrue' , $model->options,array('class' => 'form-control')); ?>
        <?php echo $form->error($model, 'leave_accrue'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'carried_forward'); ?>
        <?php echo $form->dropdownList($model , 'carried_forward' , $model->options,array('class' => 'form-control')); ?>
        <?php echo $form->error($model, 'carried_forward'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'default_per_year'); ?>
        <?php echo $form->textField($model, 'default_per_year', array('class' => 'form-control', 'size' => 10, 'maxlength' => 10)); ?>
        <?php echo $form->error($model, 'default_per_year'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'carried_forward_percentage'); ?>
        <?php echo $form->textField($model, 'carried_forward_percentage',array('class' => 'form-control')); ?>
        <?php echo $form->error($model, 'carried_forward_percentage'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'carried_forward_leave_availability'); ?>
        <?php echo $form->textField($model, 'carried_forward_leave_availability',array('class' => 'form-control')); ?>
        <?php echo $form->error($model, 'carried_forward_leave_availability'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'propotionate_on_joined_date'); ?>
        <?php echo $form->dropdownList($model , 'propotionate_on_joined_date' , $model->options,array('class' => 'form-control')); ?>
        <?php echo $form->error($model, 'propotionate_on_joined_date'); ?>
    </div>

    <div class="form-group buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-primary')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->