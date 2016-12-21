<?php
$form = $this->beginWidget('HActiveForm', array(
    'id' => 'authentication-settings-form',
    'enableAjaxValidation' => false,
        ));
?>

<?php echo $form->errorSummary($model); ?>

<div class="form-group">
    <?php echo $form->labelEx($model, 'absence_add_to'); ?>
    <?php echo $form->dropdownList($model, 'absence_add_to', CHtml::listData(SalaryComponent::model()->findAll(), 'id', 'name'), array('class' => 'form-control', 'empty' => 'Select')); ?>
</div>
<div class="form-group">
    <?php echo $form->labelEx($model, 'absence_component'); ?>
    <?php echo $form->dropdownList($model, 'absence_component', CHtml::listData(SalaryComponent::model()->findAll(), 'id', 'name'), array('class' => 'form-control', 'empty' => 'Select')); ?>
</div>
<div class="form-group">
    <?php echo $form->labelEx($model, 'absence_triger'); ?>
    <?php echo $form->textField($model, 'absence_triger', array('class' => 'form-control','placeholder'=>'Days')); ?>
</div>
<div class="form-group">
    <?php echo $form->labelEx($model, 'absence_amount'); ?>
    <?php echo $form->dropdownList($model, 'absence_amount', array('fixed' => 'Fixed Amount', 'specified' => 'Specified Amount'), array('class' => 'form-control', 'empty' => 'Select')); ?>
</div>
<div class="form-group">
    <div class="isfixed <?php echo ($model->absence_amount == 'fixed')? '':'hidden'; ?>">
        <?php echo $form->textField($model, 'absence_amount_fixed', array('class' => 'form-control')); ?>
    </div>
    <div class="isspecified <?php echo ($model->absence_amount == 'specified')? '':'hidden'; ?>">
        <?php echo $form->dropdownList($model, 'absence_amount_specified', array('quarter' => '1/4 Day', 'half' => '1/2 Day', 'one' => 'One Day', 'two' => 'Two Days', 'three' => 'Three Days'), array('class' => 'form-control', 'empty' => 'Select')); ?>
    </div>
</div>
<div class="form-group">
    <?php echo $form->labelEx($model, 'absence_note'); ?>
    <?php echo $form->textArea($model, 'absence_note', array('class' => 'form-control')); ?>
</div>
<hr/>

<?php echo CHtml::submitButton(Yii::t('AdminModule.views_setting_authentication', 'Save'), array('class' => 'btn btn-primary')); ?>

<!-- show flash message after saving -->
<?php $this->widget('application.widgets.DataSavedWidget'); ?>

<?php $this->endWidget(); ?>
<script type="text/javascript">
    $(document).ready(function() {
        $("#SalarySettings_absence_amount").change(function() {
            $('[class^=is]').hide();
            var value = $("#SalarySettings_absence_amount option:selected").val();
            var theDiv = $(".is" + value);

            theDiv.slideDown().removeClass("hidden");
            theDiv.siblings('[class*=is]').slideUp(function() {
                $(this).addClass("hidden");
            });
        });
    });
</script>