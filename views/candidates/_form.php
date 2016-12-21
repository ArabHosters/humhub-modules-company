<?php
/* @var $this CandidatesController */
/* @var $model Candidates */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('HActiveForm', array(
            'id' => 'candidates-form',
            'enableAjaxValidation' => false,
        ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'first_name'); ?>
        <?php echo $form->textField($model, 'first_name', array('class' => 'form-control', 'size' => 60, 'maxlength' => 150)); ?>
        <?php echo $form->error($model, 'first_name'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'last_name'); ?>
        <?php echo $form->textField($model, 'last_name', array('class' => 'form-control', 'size' => 60, 'maxlength' => 150)); ?>
        <?php echo $form->error($model, 'last_name'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'email'); ?>
        <?php echo $form->textField($model, 'email', array('class' => 'form-control', 'size' => 60, 'maxlength' => 150)); ?>
        <?php echo $form->error($model, 'email'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'contact_num'); ?>
        <?php echo $form->textField($model, 'contact_num', array('class' => 'form-control', 'size' => 60, 'maxlength' => 150)); ?>
        <?php echo $form->error($model, 'contact_num'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'job_vacancy'); ?>
        <?php echo $form->dropdownList($model, 'job_vacancy', CHtml::listData(Vacancy::model()->findAll(), 'id', 'name'), array('class' => 'form-control', 'empty' => 'Select')); ?>
        <?php echo $form->error($model, 'job_vacancy'); ?>
    </div>

    <div class="form-group">
        <?php
        echo '<label>' . Yii::t('LibraryModule.base', 'Resume') . ' *</label><br/>';
        // Creates Uploading Button
        $this->widget('application.modules_core.file.widgets.FileUploadButtonWidget', array(
            'uploaderId' => 'document_upload_' . $model->id,
            'fileListFieldName' => 'fileList',
            'object' => $model
        ));
        // Creates a list of already uploaded Files
        $this->widget('application.modules_core.file.widgets.FileUploadListWidget', array(
            'uploaderId' => 'document_upload_' . $model->id,
            'object' => $model
        ));
        echo $form->error($model, 'file');
        echo '<p class="help-block">' . Yii::t('LibraryModule.base', 'If you upload multiple files, only the last file will be saved.') . '</p>';
        ?>
    </div>
    <div class="form-group">
        <?php echo $form->labelEx($model, 'comment'); ?>
        <?php echo $form->textArea($model, 'comment', array('class' => 'form-control', 'form-groups' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'comment'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'date_of_application'); ?>
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'options' => array(
                'showAnim' => 'fold',
            ),
            'model' => $model,
            'attribute' => "date_of_application",
            'htmlOptions' => array(
                'class' => 'form-control',
                'placeholder' => 'Effective Date'
            ),
            'options' => array(
                'dateFormat' => 'yy-mm-dd',
                'showButtonPanel' => true,
                'changeMonth' => true,
                'changeYear' => true,
            ),
        ));
        ?>
        <?php echo $form->error($model, 'date_of_application'); ?>
    </div>

    <div class="form-group buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-primary')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->