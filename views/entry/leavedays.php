<?php
$form = $this->beginWidget('HActiveForm', array(
    'id' => 'leaves-edit-form',
    'enableAjaxValidation' => false,
        ));
?>
<div class="modal-dialog modal-dialog-small animated fadeIn">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">
                <?php echo '<strong>Create</strong> Leave'; ?>
            </h4>
        </div>
        <div class="modal-body">
            <div class="control-group">
                <label class="control-label">Leave Summary</label>
                <div class="controls">
                    <span class="label label-default">Number of Leaves approved (<?php echo $leaves['approvedLeaves']; ?>)</span>
                    <br>
                    <span class="label label-warning">Number of leaves pending approval (<?php echo $leaves['pendingLeaves']; ?>)</span>
                    <br>
                    <span class="label label-success">Number of leaves you may apply (<?php echo $leaves['availableLeaves']; ?>)</span>

                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Leave Dates</label>
                <div class="controls">
                    <table class="table table-condensed table-bordered table-striped" id="leave_days_table">
                        <thead>
                            <tr>
                                <th>Leave Date</th>
                                <th>Leave Type</th>
                            </tr>
                        </thead>
                        <tbody id="leave_days_table_body">
                            <?php
                            foreach ($dayMap as $key => $value) {
                                $curent = date("M j, Y (l)", strtotime($key));
                                if ($value != 2) {
                                    if ($value == 1) {
                                        echo '<tr><td>' . $curent . '</td><td><select name="EmployeeLeaveDays[' . $key . ']" class="days"><option value="Full Day">Full Day</option><option value="Half Day - Morning">Half Day - Morning</option><option value="Half Day - Afternoon">Half Day - Afternoon</option></select></td></tr>';
                                    } else {
                                        echo '<tr><td>' . $curent . '</td><td><select name="EmployeeLeaveDays[' . $key . ']" class="days"><option value="Half Day - Morning">Half Day - Morning</option><option value="Half Day - Afternoon">Half Day - Afternoon</option></select></td></tr>';
                                    }
                                } else {
                                    echo '<tr><td>' . $curent . '</td><td><span class="label label-info">Non working day</span</td></tr>';
                                }
                            }
                            ?>
                        </tbody>
                    </table> 	
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Leave Notes</label>
                <div class="controls">
                    <?php echo $calendarEntry->details; ?>	
                </div>
            </div>

        </div>



        <div class="modal-footer">

            <?php
            echo HHtml::hiddenField('date_start',$calendarEntry->date_start);
            echo HHtml::hiddenField('date_end',$calendarEntry->date_end);
            echo HHtml::hiddenField('employee',$calendarEntry->employee);
            echo HHtml::hiddenField('details',$calendarEntry->details);
            echo HHtml::hiddenField('leave_type',$calendarEntry->leave_type);
            echo HHtml::ajaxButton('Apply Leaves', $this->createContainerUrl('entry/edit', array('id' => $calendarEntry->id)), array(
                'type' => 'POST',
                'beforeSend' => 'function(){ setModalLoader(); }',
                'success' => 'function(html){ $("#globalModal").html(html);}',
                    ), array('class' => 'btn btn-primary'));
            ?>

            <button type="button" class="btn btn-primary"
                    data-dismiss="modal"><?php echo Yii::t('CalendarModule.views_entry_edit', 'Close'); ?></button>

            <div id="event-loader" class="loader loader-modal hidden"><div class="sk-spinner sk-spinner-three-bounce"><div class="sk-bounce1"></div><div class="sk-bounce2"></div><div class="sk-bounce3"></div></div></div>

        </div>


    </div>
</div>
<?php $this->endWidget(); ?>