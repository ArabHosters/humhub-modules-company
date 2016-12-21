<?php
$curent = date("Y-m-d", time());

$worked_today = Attendance::model()->findAll(array(
    'condition' => "user_id =:user_id and DATE_FORMAT( in_time,  '%Y-%m-%d' ) =:currdate and out_time != '0000-00-00 00:00:00' and type='1' and status ='Approved'",
    'params' => array(
        ':user_id' => Yii::app()->user->id,
        ':currdate' => $curent
    )
        ));
$timediff = 0;
foreach ($worked_today as $timelog) {
    $timediff += strtotime($timelog->out_time) - strtotime($timelog->in_time);
}

$hours = Rizer::seconds_to_hours($timediff);

echo '<p>Time Worked Today: <strong>' . $hours . '</strong> Hours</p>';

$breaks_today = Attendance::model()->findAll(array(
    'condition' => "user_id =:user_id and DATE_FORMAT( in_time,  '%Y-%m-%d' ) =:currdate and out_time != '0000-00-00 00:00:00' and type='2' and status ='Approved'",
    'params' => array(
        ':user_id' => Yii::app()->user->id,
        ':currdate' => $curent
    )
        ));

$break_timediff = 0;
foreach ($breaks_today as $timelog) {
    $break_timediff += strtotime($timelog->out_time) - strtotime($timelog->in_time);
}

$breakhours = Rizer::seconds_to_hours($break_timediff);

echo '<p>Time Breaks Today: <strong>' . $breakhours . '</strong> Hours</p>';

if ($attendance->out_time == '0000-00-00 00:00:00') {
    if ($attendance->type == 2) {
        echo 'Break Timer: ';
    } else {
        echo 'Working Timer: ';
    }
    $start_timer = strtotime($attendance->in_time)-time();
    ?>
    <div id="time"></div>
    <script type="text/javascript">
        $('#time').timer({
            seconds: <?php echo $start_timer; ?> //Specify start time in seconds
        });
    </script>
    <?php
    echo HHtml::ajaxLink('Check OUT', $this->createUrl('//company/attendenace/punch', array('id' => $attendance->id)), array(
        'type' => "POST",
        'data' => array('type' => 'checkout'),
        'beforeSend' => 'function(){ $("#postform-loader").removeClass("hidden"); }',
        'complete' => "function(response) {
                         $('.contentForm_options .btn').show(); $('#postform-loader').addClass('hidden');   
                            }",
        'update' => '#data'
            ), array('class' => 'btn btn-info')
    );

    if ($attendance->type == 2) {
        echo HHtml::ajaxLink('Continue Work', $this->createUrl('//company/attendenace/punch', array('id' => $attendance->id)), array(
            'type' => "POST",
            'data' => array('type' => 'continue'),
            'beforeSend' => 'function(){ $("#postform-loader").removeClass("hidden"); }',
            'complete' => "function(response) {
                         $('.contentForm_options .btn').show(); $('#postform-loader').addClass('hidden');   
                            }",
            'update' => '#data'
                ), array('class' => 'btn btn-danger')
        );
    } else {
        echo HHtml::ajaxLink('Break', $this->createUrl('//company/attendenace/punch', array('id' => $attendance->id)), array(
            'type' => "POST",
            'data' => array('type' => 'break'),
            'beforeSend' => 'function(){ $("#postform-loader").removeClass("hidden"); }',
            'complete' => "function(response) {
                         $('.contentForm_options .btn').show(); $('#postform-loader').addClass('hidden');   
                            }",
            'update' => '#data'
                ), array('class' => 'btn btn-danger')
        );
    }
} else {
    echo HHtml::ajaxLink('Check In', $this->createUrl('//company/attendenace/punch'), array(
        'type' => "POST",
        'data' => array('type' => 'checkin'),
        'beforeSend' => 'function(){ $("#postform-loader").removeClass("hidden"); }',
        'complete' => "function(response) {
                         $('.contentForm_options .btn').show(); $('#postform-loader').addClass('hidden');   
                            }",
        'update' => '#data'
            ), array('class' => 'btn btn-info')
    );
}
?>