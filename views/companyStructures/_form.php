<?php
/* @var $this CompanyStructuresController */
/* @var $model CompanyStructures */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'company-structures-form',
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
        <?php echo $form->labelEx($model, 'title'); ?>
        <?php echo $form->textField($model, 'title', array('class' => 'form-control')); ?>
        <?php echo $form->error($model, 'title'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'description'); ?>
        <?php echo $form->textArea($model, 'description', array('class' => 'form-control', 'form-groups' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'description'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'address'); ?>
        <?php echo $form->textArea($model, 'address', array('class' => 'form-control', 'form-groups' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'address'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'type'); ?>
        <?php echo $form->dropdownList($model, 'type', $model->options, array('class' => 'form-control')); ?>
        <?php echo $form->error($model, 'type'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'country'); ?>
        <?php
        echo CHtml::activeDropDownList(
                $model, 'country', CHtml::listData(Country::model()->findAll(), 'id', 'name'), array('class' => 'form-control')
        );
        ?>
        <?php echo $form->error($model, 'country'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'parent'); ?>
        <?php
        echo CHtml::activeDropDownList(
                $model, 'parent', CHtml::listData(CompanyStructures::model()->findAll(), 'id', 'title'), array('empty' => 'No Parent', 'class' => 'form-control')
        );
        ?>
        <?php echo $form->error($model, 'parent'); ?>
    </div>
    <?php if (!$model->isNewRecord && ($model->type == 'Team' || $model->type == 'Department')) : ?>
    <?php echo $form->labelEx($model, 'membersGuids'); ?>
        <?php echo $form->textArea($model, 'membersGuids', array('class' => 'span12', 'id' => 'user_select')); ?>
        <?php
        $this->widget('application.modules_core.user.widgets.UserPickerWidget', array(
            'inputId' => 'user_select',
            'model' => $model,
            'attribute' => 'membersGuids',
            'placeholderText' => 'Add a user'
        ));
        ?>
    <?php endif; ?>

    <div class="form-group buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-primary')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->