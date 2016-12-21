<?php
/* @var $this EmployeeLanguagesController */
/* @var $model EmployeeLanguages */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'employee-languages-form',
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
        <?php echo $form->labelEx($model, 'language_id'); ?>
        <?php echo $form->dropdownList($model, 'language_id', CHtml::listData(Languages::model()->findAll(), 'id', 'name'), array('class' => 'form-control', 'empty' => 'Select Language')); ?>
        <?php echo $form->error($model, 'language_id'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'employee'); ?>
        <?php echo $form->dropdownList($model, 'employee', CHtml::listData(User::model()->findAll(), 'id', 'displayName'), array('class' => 'form-control', 'empty' => 'Select Employee')); ?>
        <?php echo $form->error($model, 'employee'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'reading'); ?>
        <?php echo $form->dropdownList($model, 'reading', $model->options,array('class' => 'form-control')); ?>
        <?php echo $form->error($model, 'reading'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'speaking'); ?>
        <?php echo $form->dropdownList($model, 'speaking', $model->options,array('class' => 'form-control')); ?>
        <?php echo $form->error($model, 'speaking'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'writing'); ?>
        <?php echo $form->dropdownList($model, 'writing', $model->options,array('class' => 'form-control')); ?>
        <?php echo $form->error($model, 'writing'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'understanding'); ?>
        <?php echo $form->dropdownList($model, 'understanding', $model->options,array('class' => 'form-control')); ?>
        <?php echo $form->error($model, 'understanding'); ?>
    </div>

    <div class="form-group buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-primary')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->