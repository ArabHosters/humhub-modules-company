<div class="panel panel-default">
    <div class="panel-heading"><?php echo Yii::t('AdminModule.views_setting_mailing_server', '<strong>Mailing</strong> settings'); ?></div>
    <div class="panel-body">

        <?php
        
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'mailing-settings-form',
            'enableAjaxValidation' => false,
        ));
        ?>

        <?php echo $form->errorSummary($model); ?>

        <div id="smtpOptions">

            <div class="form-group">
                <?php echo $form->labelEx($model, 'imapusername'); ?>
                <?php echo $form->textField($model, 'imapusername', array('class' => 'form-control', 'readonly' => HSetting::IsFixed('imapusername', 'mailing'))); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'imappassword'); ?>
                <?php echo $form->passwordField($model, 'imappassword', array('class' => 'form-control', 'readonly' => HSetting::IsFixed('imappassword', 'mailing'))); ?>
            </div>
        </div>
        <hr>
        <?php echo CHtml::submitButton(Yii::t('AdminModule.views_setting_mailing_server', 'Save'), array('class' => 'btn btn-primary')); ?>

        <!-- show flash message after saving -->
        <?php $this->widget('application.widgets.DataSavedWidget'); ?>

        <?php $this->endWidget(); ?>

    </div>
</div>
