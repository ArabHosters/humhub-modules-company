<div class="panel panel-default panel-birthday">
    <div class="panel-heading">
        <strong>Work</strong> Shifts
    </div>
    <div class="panel-body">
        <?php
        $now = date('H:i:s', time());
        $day = date('D', time());
        $curent = date('Y-m');
        $curr_shift = Workdays::model()->findAll(array(
            'condition' => 'work_day = :work_day AND start_work <= :now AND ADDTIME(start_work,min_time) >= :now and DATE_FORMAT( effect_date,  "%Y-%m" ) =:currdate',
            'params' => array(
                ':work_day' => $day,
                ':now' => $now,
                ':currdate' => $curent
            )
        ));
        ?>
        <h5><?php echo 'Time Now:       ' . date('H:i', time()); ?></h5>
        <p><strong>Current Shift</strong></p>
        <table class="table table-condensed table-bordered table-striped">
            <tbody>
                <?php
                foreach ($curr_shift as $shift) {
                    $secs = strtotime($shift->min_time) - strtotime("00:00:00");
                    $start_time = date("h:i a", strtotime($shift->start_work));
                    $end_time = date("h:i a", strtotime($shift->start_work) + $secs);
                    ?>
                    <tr>
                        <td><?php echo $shift->user->displayName ?></td>
                        <td><?php echo $start_time; ?> to <?php echo $end_time; ?> (<?php echo $shift->status ?>)</td>
                    </tr>
                    <?php
                }
                ?>
                    <tr><td colspan="2"><a href="<?php echo Yii::app()->createUrl("/company/view") ?>">View All</a></td></tr>
            </tbody>
        </table>
    </div>
</div>