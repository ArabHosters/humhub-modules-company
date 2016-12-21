
<?php
$form = $this->beginWidget('HActiveForm', array(
    'id' => 'pages-edit-form',
    'enableAjaxValidation' => false,
        ));
?>
<div class="modal-dialog modal-dialog-small animated fadeIn">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">
                <strong>Request</strong> Loan
            </h4>
        </div>
        <div class="modal-body">

            <?php echo $form->errorSummary($model); ?>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'amount'); ?>
                <?php echo $form->textField($model, 'amount', array('class' => 'form-control')); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'loan_date'); ?>
                <?php echo $form->dateTimeField($model, 'loan_date', array('class' => 'form-control')); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'repay_date'); ?>
                <?php echo $form->dateTimeField($model, 'repay_date', array('class' => 'form-control')); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'repay_amount'); ?>
                <?php echo $form->textField($model, 'repay_amount', array('class' => 'form-control')); ?>
            </div>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'note'); ?>
                <?php echo $form->textArea($model, 'note', array('class' => 'form-control', 'rows' => '3', 'placeholder' => Yii::t('CalendarModule.views_entry_edit', 'Description'))); ?>
            </div>

        </div>



        <div class="modal-footer">

            <?php
            echo HHtml::ajaxButton("Send", $this->createContainerUrl('entry/loanRequest'), array(
                'type' => 'POST',
                'beforeSend' => 'function(){ setModalLoader(); }',
                'success' => 'function(html){ $("#globalModal").html(html);}',
                    ), array('class' => 'btn btn-primary', 'id' => 'inviteBtn'));
            ?>

            <?php
            if (!$model->isNewRecord) {
                echo CHtml::link(Yii::t('CalendarModule.views_entry_edit', 'Delete'), $this->createContainerUrl('//calendar/entry/delete', array('id' => $model->id)), array('class' => 'btn btn-danger'));
            }
            ?>

            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>

            <div id="event-loader" class="loader loader-modal hidden"><div class="sk-spinner sk-spinner-three-bounce"><div class="sk-bounce1"></div><div class="sk-bounce2"></div><div class="sk-bounce3"></div></div></div>

        </div>


    </div>
</div>
<script>
    // Shake modal after wrong validation
<?php if ($form->errorSummary($model) != null) { ?>
        $('.modal-dialog').removeClass('fadeIn');
        $('.modal-dialog').addClass('shake');
<?php } ?>

</script>


<?php $this->endWidget(); ?>