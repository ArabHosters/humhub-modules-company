
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
                <?php if (!$calendarEntry->isNewRecord) : ?>
                    <?php echo '<strong>Edit</strong> Leave'; ?>
                <?php else: ?>
                    <?php echo '<strong>Create</strong> Leave'; ?>
                <?php endif; ?>
            </h4>
        </div>
        <div class="modal-body">

            <?php echo $form->errorSummary($calendarEntry); ?>

            <div class="form-group">
                <?php echo $form->labelEx($calendarEntry, 'leave_type'); ?>
                <?php echo $form->dropDownList($calendarEntry, 'leave_type', CHtml::listData(LeaveTypes::model()->findAll(), 'id', 'name'), array('class' => 'form-control')); ?>
            </div>

            <div id="datepicker_date">
                <div class="form-group">
                    <?php echo $form->labelEx($calendarEntry, 'date_start'); ?>
                    <?php echo $form->dateTimeField($calendarEntry, 'date_start', array('class' => 'form-control', 'placeholder' => Yii::t('CalendarModule.views_entry_edit', 'Start Date')), array('pickTime' => false)); ?>
                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($calendarEntry, 'date_end'); ?>
                    <?php echo $form->dateTimeField($calendarEntry, 'date_end', array('class' => 'form-control', 'placeholder' => Yii::t('CalendarModule.views_entry_edit', 'End Date')), array('pickTime' => false)); ?>
                </div>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($calendarEntry, 'details'); ?>
                <?php echo $form->textArea($calendarEntry, 'details', array('class' => 'form-control', 'rows' => '3', 'placeholder' => Yii::t('CalendarModule.views_entry_edit', 'Description'))); ?>
            </div>

        </div>



        <div class="modal-footer">

            <?php
            echo HHtml::ajaxButton(Yii::t('CalendarModule.views_entry_edit', 'Next'), $this->createContainerUrl('entry/edit', array('id' => $calendarEntry->id)), array(
                'type' => 'POST',
                'beforeSend' => 'function(){ setModalLoader(); }',
                'success' => 'function(html){ $("#globalModal").html(html);}',
                    ), array('class' => 'btn btn-primary', 'id' => 'inviteBtn'));
            ?>

            <?php
            if (!$calendarEntry->isNewRecord) {
                echo CHtml::link(Yii::t('CalendarModule.views_entry_edit', 'Delete'), $this->createContainerUrl('//calendar/entry/delete', array('id' => $calendarEntry->id)), array('class' => 'btn btn-danger'));
            }
            ?>

            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>

            <div id="event-loader" class="loader loader-modal hidden"><div class="sk-spinner sk-spinner-three-bounce"><div class="sk-bounce1"></div><div class="sk-bounce2"></div><div class="sk-bounce3"></div></div></div>

        </div>


    </div>
</div>
<script>
    // Shake modal after wrong validation
<?php if ($form->errorSummary($calendarEntry) != null) { ?>
        $('.modal-dialog').removeClass('fadeIn');
        $('.modal-dialog').addClass('shake');
<?php } ?>

</script>


<?php $this->endWidget(); ?>

<script>
    function openViewModal(id) {
        var viewUrl = '<?php echo Yii::app()->getController()->createContainerUrl('entry/view', array('id' => '-id-')); ?>';
        viewUrl = viewUrl.replace('-id-', encodeURIComponent(id));

        $('#globalModal').modal('hide');
        $('#globalModal').modal({
            show: 'true',
            remote: viewUrl
        });
    }
</script>