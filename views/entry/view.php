<div class="modal-dialog modal-dialog-small animated fadeIn">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Leave Days</h4>
        </div>
        <div class="modal-body">
            <div class="pull-right">
                <div>
                    <br />
                    <?php if (Yii::app()->user->isAdmin()) : ?>
                        <?php echo HHtml::link('Change Leave Status', '#', array('class' => 'btn btn-primary btn-sm', 'onclick' => 'openEditModal(' . $calendarEntry->id . ')')); ?>
                    <?php endif; ?>
                </div>
                <br />            
            </div>
            <span class="label label-default">Number of Leaves available (<?php echo $leaves['availableLeaves']; ?>)</span><br/>
            <?php

            function calculateNumberOfLeavesObject($empLeaveDay) {
                $sum = 0.0;
                foreach ($empLeaveDay as $day) {
                    if ($day->leave_type == "Full Day") {
                        $sum += 1;
                    } else {
                        $sum += 0.5;
                    }
                }
                return $sum;
            }

            $leaveCount = calculateNumberOfLeavesObject($empLeaveDay);

            if ($leaveCount > $leaves['availableLeaves']) {
                echo '<span class="label label-info">Number of Leaves requested (' . $leaveCount . ')</span><br/>';
            } else {
                echo '<span class="label label-success">Number of Leaves requested (' . $leaveCount . ')</span><br/>';
            }
            ?>
            <table class="table table-condensed table-bordered table-striped">
                <thead><tr><th>Leave Date</th><th>Leave Type</th></tr></thead>
                <tbody>
                    <?php
                    foreach ($empLeaveDay as $value) {
                        $curent = date("M j, Y (l)", strtotime($value->leave_date));
                        echo '<tr><td>' . $curent . '</td><td>' . $value->leave_type . '</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
            <?php if($leaveLogs): ?>
            <table class="table table-condensed table-bordered table-striped">
                <thead><tr><th>Notes</th></tr></thead>
                <tbody>
                    <?php
                    foreach ($leaveLogs as $leaveLog) {
                        echo '<tr><td><span class="logTime label label-default">'.$leaveLog['time'].'</span>&nbsp;&nbsp;';
                        echo '<b>'.$leaveLog['status_from'].' -> '.$leaveLog['status_to'];
                        echo '</b><br/>'.$leaveLog['note'].'</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
            <?php endif; ?>
            <?php
            if($calendarEntry->details){
                echo '<br/><b>Reason for Applying leave:</b><br/>';
            }
            ?>
            <?php $this->beginWidget('CMarkdown'); ?><?php echo nl2br(CHtml::encode($calendarEntry->details)); ?><?php $this->endWidget(); ?>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-primary"
                    data-dismiss="modal"><?php echo Yii::t('CalendarModule.views_entry_edit', 'Close'); ?></button>

            <div id="event-loader" class="loader loader-modal hidden"><div class="sk-spinner sk-spinner-three-bounce"><div class="sk-bounce1"></div><div class="sk-bounce2"></div><div class="sk-bounce3"></div></div></div>

        </div>

    </div>
</div>
<?php
Yii::app()->clientScript->registerScript('modalEditScript', "
function openEditModal(id) {
        var editUrl = '" . Yii::app()->getController()->createContainerUrl('entry/changeStatus', array('id' => '-id-')) . "';
        editUrl = editUrl.replace('-id-', encodeURIComponent(id));
        $('#globalModal').modal('hide');
        $('#globalModal').modal({
            show: 'true',
            remote: editUrl
        });
    }
");
