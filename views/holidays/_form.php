<?php
/* @var $this HolidaysController */
/* @var $model Holidays */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('HActiveForm', array(
        'id' => 'holidays-form',
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
        <?php echo $form->labelEx($model, 'dateh'); ?>
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'options' => array(
                'showAnim' => 'fold',
            ),
            'model' => $model,
            'attribute' => 'dateh',
            'htmlOptions' => array(
                'class' => 'form-control',
            ),
            'options' => array(
                'dateFormat' => 'yy-mm-dd',
                'showButtonPanel' => true,
                'changeMonth' => true,
                'changeYear' => true,
            ),
        ));
        ?>
        <?php echo $form->error($model, 'dateh'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'status'); ?>
        <?php echo $form->dropdownList($model, 'status', $model->options, array('class' => 'form-control')); ?>
        <?php echo $form->error($model, 'status'); ?>
    </div>

    <div class="form-group buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-primary')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->