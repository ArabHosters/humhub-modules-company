<?php
/* @var $this SalaryComponentController */
/* @var $model SalaryComponent */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'salary-component-form',
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
        <?php echo $form->labelEx($model, 'type'); ?>
        <div class="radio">
            <label>
                <?php echo $form->radioButton($model, 'type', array('value' => 0, 'uncheckValue' => null, 'id' => 'invite_radio', 'checked' => ($model->type == 0) ? 'checked' : '')); ?>
                Earning
            </label>
        </div>
        <div class="radio">
            <label>
                <?php echo $form->radioButton($model, 'type', array('value' => 1, 'uncheckValue' => null, 'id' => 'request_radio', 'checked' => ($model->type == 1) ? 'checked' : '')); ?>
                Deduction
            </label>
        </div>
        <?php echo $form->error($model, 'type'); ?>
    </div>

    <div class="form-group">
        <strong>Add To*</strong>
    </div>
    <div class="form-group">
        <div class="checkbox">
            <label>
                <?php echo $form->checkBox($model, 'total_paypal'); ?> <?php echo $model->getAttributeLabel('total_paypal'); ?>
            </label>
        </div>
        <?php echo $form->error($model, 'total_paypal'); ?>
    </div>

    <div class="form-group">
        <div class="checkbox">
            <label>
                <?php echo $form->checkBox($model, 'company_cost'); ?> <?php echo $model->getAttributeLabel('company_cost'); ?>
            </label>
        </div>
        <?php echo $form->error($model, 'company_cost'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'amout'); ?>
        <div class="radio">
            <label>
                <?php echo $form->radioButton($model, 'amout', array('value' => 1, 'uncheckValue' => null, 'id' => 'amount_radio', 'checked' => ($model->amout == 1) ? 'checked' : '')); ?>
                Amount
            </label>
        </div>
        <div class="radio">
            <label>
                <?php echo $form->radioButton($model, 'amout', array('value' => 0, 'uncheckValue' => null, 'id' => 'percent_radio', 'checked' => ($model->amout == 0) ? 'checked' : '')); ?>
                Percentage
            </label>
        </div>
        <?php echo $form->error($model, 'amount'); ?>
    </div>
    <div class="form-group">
        <strong>Recurring Component (Monthly)</strong>
    </div>
    <div class="form-group">
        <div class="checkbox">
            <label>
                <?php echo $form->checkBox($model, 'recurring'); ?> <?php echo $model->getAttributeLabel('recurring'); ?>
            </label>
        </div>
        <?php echo $form->error($model, 'recurring'); ?>
    </div>
    <div class="form-group buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-primary')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->