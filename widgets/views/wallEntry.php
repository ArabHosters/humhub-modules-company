<div class="panel panel-default">
    <div class="panel-body">

        <?php $this->beginContent('application.modules_core.wall.views.wallLayout', array('object' => $calendarEntry)); ?>
        <h5>You have applied for a leave request</h5>
        <strong>Status: <?php echo CHtml::encode($calendarEntry->status); ?></strong><br />
        <span class="label label-default">Number of Leaves available (<?php echo $leaves['availableLeaves']; ?>)</span><br/>
            <?php

            if(!function_exists('calculateNumberOfLeavesObject')){
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
            }

            $leaveCount = calculateNumberOfLeavesObject($empLeaveDay);

            if ($leaveCount > $leaves['availableLeaves']) {
                echo '<span class="label label-info">Number of Leaves requested (' . $leaveCount . ')</span><br/>';
            } else {
                echo '<span class="label label-success">Number of Leaves requested (' . $leaveCount . ')</span><br/>';
            }
            ?><br />
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
            </table><br />
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

        <?php $this->endContent(); ?>

    </div>
</div>