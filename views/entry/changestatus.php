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
            <h3>Change Leave Status</h3>
        </div>
        <div class="modal-body">
            <?php echo $form->errorSummary($employeeLeaveLog); ?>
            <form id="leaveStatusForm">
                <div class="control-group">
                    <label class="control-label" for="leave_status">Leave Status</label>
                    <div class="controls">
                        <select type="text" id="leave_status" class="form-control" name="leave_status">
                            <option value="Approved" <?php if($calendarEntry->status == 'Approved'){ echo 'selected'; } ?>>Approved</option>
                            <option value="Pending" <?php if($calendarEntry->status == 'Pending'){ echo 'selected'; } ?>>Pending</option>
                            <option value="Rejected" <?php if($calendarEntry->status == 'Rejected'){ echo 'selected'; } ?>>Rejected</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="leave_status">Status Change Note</label>
                    <div class="controls">
                        <textarea id="leave_reason" class="form-control" name="leave_reason" maxlength="500"></textarea>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <?php
            echo HHtml::ajaxButton('Change Leave Status', $this->createContainerUrl('entry/changeStatus', array('id' => $calendarEntry->id)), array(
                'type' => 'POST',
                'beforeSend' => 'function(){ setModalLoader(); }',
                'success' => 'function(html){ $("#globalModal").html(html);}',
                    ), array('class' => 'btn btn-primary', 'id' => 'inviteBtn'));
            ?>
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>
<script>
    // Shake modal after wrong validation
<?php if ($form->errorSummary($employeeLeaveLog) != null) { ?>
        $('.modal-dialog').removeClass('fadeIn');
        $('.modal-dialog').addClass('shake');
<?php } ?>

</script>
<?php $this->endWidget(); ?>