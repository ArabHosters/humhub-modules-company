<?php
$form = $this->beginWidget('HActiveForm', array(
    'id' => 'authentication-settings-form',
    'enableAjaxValidation' => false,
        ));
?>

<?php echo $form->errorSummary($model); ?>

<div class="form-group">
    <?php echo $form->labelEx($model, 'late_attendance'); ?>
    <?php echo $form->dropdownList($model, 'late_attendance', CHtml::listData(SalaryComponent::model()->findAll(), 'id', 'name'), array('class' => 'form-control', 'empty' => 'Select')); ?>
</div>
<div class="form-group">
    <?php echo $form->labelEx($model, 'late_attendance_component'); ?>
    <?php echo $form->dropdownList($model, 'late_attendance_component', CHtml::listData(SalaryComponent::model()->findAll(), 'id', 'name'), array('class' => 'form-control', 'empty' => 'Select')); ?>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-md-6">
            <?php echo $form->labelEx($model, 'late_attendance_from'); ?>
            <?php
            $this->widget('ext.timepicker.timepicker', array(
                'model' => $model,
                'name' => 'late_attendance_from',
                'select' => 'time',
            ));
            ?>
        </div>
        <div class="col-md-6">
            <?php echo $form->labelEx($model, 'late_attendance_to'); ?>
            <?php
            $this->widget('ext.timepicker.timepicker', array(
                'model' => $model,
                'name' => 'late_attendance_to',
                'select' => 'time',
            ));
            ?>
        </div>
    </div>
</div>
<div class="form-group">
    <?php echo $form->labelEx($model, 'late_attendance_amount'); ?>
    <?php echo $form->dropdownList($model, 'late_attendance_amount', array('fixed' => 'Fixed Amount', 'specified' => 'Specified Amount'), array('class' => 'form-control', 'empty' => 'Select')); ?>
</div>
<div class="form-group">
    <div class="isfixed <?php echo ($model->late_attendance_amount == 'fixed')? '':'hidden'; ?>">
        <?php echo $form->textField($model, 'late_attendance_amount_fixed', array('class' => 'form-control')); ?>
    </div>
    <div class="isspecified <?php echo ($model->late_attendance_amount == 'specified')? '':'hidden'; ?>">
        <?php echo $form->dropdownList($model, 'late_attendance_amount_specified', array('quarter' => '1/4 Day', 'half' => '1/2 Day', 'one' => 'One Day', 'two' => 'Two Days', 'three' => 'Three Days'), array('class' => 'form-control', 'empty' => 'Select')); ?>
    </div>
</div>
<div class="form-group">
    <?php echo $form->labelEx($model, 'late_attendance_triger'); ?>
    <?php echo $form->textField($model, 'late_attendance_triger', array('class' => 'form-control')); ?>
</div>
<div class="form-group">
    <?php echo $form->labelEx($model, 'late_attendance_note'); ?>
    <?php echo $form->textArea($model, 'late_attendance_note', array('class' => 'form-control')); ?>
</div>
<hr/>

<?php echo CHtml::submitButton(Yii::t('AdminModule.views_setting_authentication', 'Save'), array('class' => 'btn btn-primary')); ?>

<!-- show flash message after saving -->
<?php $this->widget('application.widgets.DataSavedWidget'); ?>

<?php $this->endWidget(); ?>
<script type="text/javascript">
    $(document).ready(function() {
        $("#SalarySettings_late_attendance_amount").change(function() {
            $('[class^=is]').hide();
            var value = $("#SalarySettings_late_attendance_amount option:selected").val();
            var theDiv = $(".is" + value);

            theDiv.slideDown().removeClass("hidden");
            theDiv.siblings('[class*=is]').slideUp(function() {
                $(this).addClass("hidden");
            });
        });
    });
</script>