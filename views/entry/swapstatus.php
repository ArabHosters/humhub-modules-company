<?php
$form = $this->beginWidget('HActiveForm', array(
    'id' => 'status-edit-form',
    'enableAjaxValidation' => false,
        ));
?>
<div class="modal-dialog modal-dialog-small animated fadeIn">
    <div class="modal-content">	
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><li class="fa fa-times"/></button>
            <h3>Change Swap Status</h3>
        </div>
        <div class="modal-body">
            <form id="leaveStatusForm">
                <div class="form-group">
                    <?php
                    if ($WorkdaysSwap->details) {
                        echo '<br/><b>Reason for Applying Shift Swap:</b><br/>';
                    }
                    ?>
                    <?php $this->beginWidget('CMarkdown'); ?><?php echo nl2br(CHtml::encode($WorkdaysSwap->details)); ?><?php $this->endWidget(); ?>
                </div>
                <div class="form-group">
                    <strong>Request Time: </strong><br />
                        From: <?php echo $WorkdaysSwap->date_start; ?><br />
                        To: <?php echo $WorkdaysSwap->date_end; ?><br />
                </div>
                <div class="control-group">
                    <label class="control-label" for="leave_status">Status</label>
                    <div class="controls">
                        <select type="text" id="leave_status" class="form-control" name="leave_status">
                            <option value="Approved" <?php if ($WorkdaysSwap->status == 'Approved') {
                        echo 'selected';
                    } ?>>Approved</option>
                            <option value="Pending" <?php if ($WorkdaysSwap->status == 'Pending') {
                        echo 'selected';
                    } ?>>Pending</option>
                            <option value="Rejected" <?php if ($WorkdaysSwap->status == 'Rejected') {
                        echo 'selected';
                    } ?>>Rejected</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                <?php echo $form->labelEx($WorkdaysSwap, 'comment'); ?>
                <?php echo $form->textArea($WorkdaysSwap, 'comment', array('class' => 'form-control', 'rows' => '3', 'placeholder' => Yii::t('CalendarModule.views_entry_edit', 'Comment'))); ?>
            </div>
            </form>
        </div>
        <div class="modal-footer">
            <?php
            echo HHtml::ajaxButton('Change Swap Status', $this->createContainerUrl('entry/changeSwapStatus', array('id' => $WorkdaysSwap->id)), array(
                'type' => 'POST',
                'beforeSend' => 'function(){ setModalLoader(); }',
                'success' => 'function(html){ $("#globalModal").html(html);}',
                    ), array('class' => 'btn btn-primary', 'id' => 'inviteBtn'));
            ?>
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>
<?php $this->endWidget(); ?>