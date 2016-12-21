
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
                <?php echo '<strong>Shift</strong> Swap'; ?>
            </h4>
        </div>
        <div class="modal-body">

            <div id="datepicker_date">
                <div class="form-group">
                    <?php echo $form->labelEx($shiftEntry, 'date_start'); ?>
                    <?php echo $form->dateTimeField($shiftEntry, 'date_start', array('class' => 'form-control', 'placeholder' => Yii::t('CalendarModule.views_entry_edit', 'Start Date')), array('pickTime' => false)); ?>
                    <?php echo $form->error($shiftEntry, 'date_start'); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($shiftEntry, 'date_end'); ?>
                    <?php echo $form->dateTimeField($shiftEntry, 'date_end', array('class' => 'form-control', 'placeholder' => Yii::t('CalendarModule.views_entry_edit', 'End Date')), array('pickTime' => false)); ?>
                    <?php echo $form->error($shiftEntry, 'date_end'); ?>
                </div>
            </div>

            <?php if(Yii::app()->user->isAdmin()): ?>
            <div class="form-group">
                <?php echo $form->labelEx($shiftEntry, 'user_id'); ?>
                <?php echo $form->dropdownList($shiftEntry, 'user_id', CHtml::listData(User::model()->findAll(), 'id', 'displayName'), array('class' => 'form-control', 'empty' => 'Select Employee')); ?>
                <?php echo $form->error($shiftEntry, 'user_id'); ?>
            </div>
            <?php endif; ?>
            
            <div class="form-group">
                <?php echo $form->labelEx($shiftEntry, 'swap_with'); ?>
                <?php echo $form->dropdownList($shiftEntry, 'swap_with', CHtml::listData(User::model()->findAll(array('condition'=>'id !=:user_id','params' => array(':user_id' => Yii::app()->user->id))), 'id', 'displayName'), array('class' => 'form-control', 'empty' => 'Select Employee')); ?>
                <?php echo $form->error($shiftEntry, 'swap_with'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($shiftEntry, 'details'); ?>
                <?php echo $form->textArea($shiftEntry, 'details', array('class' => 'form-control', 'rows' => '3', 'placeholder' => Yii::t('CalendarModule.views_entry_edit', 'Description'))); ?>
            </div>

        </div>



        <div class="modal-footer">

            <?php
            echo HHtml::ajaxButton(Yii::t('CalendarModule.views_entry_edit', 'Next'), $this->createContainerUrl('entry/shiftswap', array('id' => $shiftEntry->id)), array(
                'type' => 'POST',
                'beforeSend' => 'function(){ setModalLoader(); }',
                'success' => 'function(html){ $("#globalModal").html(html);}',
                    ), array('class' => 'btn btn-primary', 'id' => 'inviteBtn'));
            ?>

            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>

            <div id="event-loader" class="loader loader-modal hidden"><div class="sk-spinner sk-spinner-three-bounce"><div class="sk-bounce1"></div><div class="sk-bounce2"></div><div class="sk-bounce3"></div></div></div>

        </div>


    </div>
</div>
<script>
    // Shake modal after wrong validation
<?php if ($form->errorSummary($shiftEntry) != null) { ?>
        $('.modal-dialog').removeClass('fadeIn');
        $('.modal-dialog').addClass('shake');
<?php } ?>

</script>

<?php $this->endWidget(); ?>