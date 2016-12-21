<div class="colStartTime">
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

    $workstart = array();
    if (isset($user_days['start_work'])) {
        $workstart = explode(":", $user_days['start_work']);
    }
    if (isset($workstart[0])) {
        $workstart_select = $workstart[0];
    } else {
        $workstart_select = '00';
    }
    if (isset($workstart[1])) {
        $workstart_select_2 = $workstart[1];
    } else {
        $workstart_select_2 = '00';
    }
    echo CHtml::dropDownList('sth[' . $data->id . ']', $workstart_select, array(
        '01' => '01',
        '02' => '02 ',
        '03' => '03 ',
        '04' => '04 ',
        '05' => '05 ',
        '06' => '06 ',
        '07' => '07 ',
        '08' => '08 ',
        '09' => '09 ',
        '10' => '10 ',
        '11' => '11',
        '12' => '12 ',
        '13' => '13 ',
        '14' => '14 ',
        '15' => '15 ',
        '16' => '16 ',
        '17' => '17 ',
        '18' => '18 ',
        '19' => '19 ',
        '20' => '20 ',
        '21' => '21 ',
        '22' => '22 ',
        '23' => '23 ',
            ), array('user-data-id' => $data->id, 'class' => 'td-dropdown user-hours'));

    echo CHtml::dropDownList('stm[' . $data->id . ']', $workstart_select_2, array(
        '00' => '00',
        '15' => '15',
        '30' => '30',
        '45' => '45',
            ), array('user-data-id' => $data->id, 'class' => 'td-dropdown'));

    $min_time = array();
    if (isset($user_days['min_time'])) {
        $min_time = explode(":", $user_days['min_time']);
    }
    if (isset($min_time[0])) {
        if ($workstart_select == '00') {
            $min_select = $min_time[0];
        } else {
            $min_select = $min_time[0] + $workstart_select;
        }
    } else {
        if ($workstart_select == '00') {
            $min_select = '00';
        } else {
            $min_select = $workstart_select;
        }
    }

    if ($min_select > 24) {
        $min_select = $min_select - 24;
    }

    $min_select = str_pad($min_select, 2, "0", STR_PAD_LEFT);
    echo CHtml::hiddenField('workstarthour[' . $data->id . ']', $workstart_select);
    echo CHtml::hiddenField('workendhour[' . $data->id . ']', $min_select);
    ?>
</div>