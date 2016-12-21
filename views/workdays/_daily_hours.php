<div class="colMinHour">
    <?php
    $month = Yii::app()->request->getQuery('month', date('m'));
    $year = Yii::app()->request->getQuery('year', date('Y'));
    $curent = $year . "-" . $month;
    $workdays = Workdays::model()->findAll(array(
        'condition' => "user_id =:user_id and DATE_FORMAT( effect_date,  '%Y-%m' ) =:currdate",
        'params' => array(
            ':user_id' => $data->id,
            ':currdate' => $curent
        )
    ));
    $user_days = array();
    foreach ($workdays as $workday) {
        $user_days[$workday->work_day] = $workday->work_day;
        $user_days['start_work'] = $workday->start_work;
        $user_days['min_time'] = $workday->min_time;
    }
    $min_time = array();
    if (isset($user_days['min_time'])) {
        $min_time = explode(":", $user_days['min_time']);
    }
    if (isset($min_time[0])) {
        $min_select = $min_time[0];
    } else {
        $min_select = '04';
    }
    echo CHtml::dropDownList('mth[' . $data->id . ']', $min_select, array(
        '00' => '00 hrs',
        '01' => '01 hrs',
        '02' => '02 hrs',
        '03' => '03 hrs',
        '04' => '04 hrs',
        '05' => '05 hrs',
        '06' => '06 hrs',
        '07' => '07 hrs',
        '08' => '08 hrs',
        '09' => '09 hrs',
        '10' => '10 hrs',
            ), array('user-data-id' => $data->id, 'class' => 'td-dropdown'));

    if (isset($min_time[1])) {
        $min_time_2 = $min_time[1];
    } else {
        $min_time_2 = '00';
    }

    echo CHtml::dropDownList('mtm[' . $data->id . ']', $min_time_2, array(
        '00' => '00 min',
        '15' => '15 min',
        '30' => '30 min',
        '45' => '45 min',
            ), array('user-data-id' => $data->id, 'class' => 'td-dropdown'));
    ?>

</div>