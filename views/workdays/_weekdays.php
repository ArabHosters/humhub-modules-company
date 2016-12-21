<div class="btn-toolbar colWorkHour">
    <div class="btn-group"><button type="button" class="btn tdBtn btn-default day-none" user="<?php echo $data->id; ?>">None</button></div>
    <div class="btn-group week" data-toggle="buttons">
        <?php
        $month = Yii::app()->request->getQuery('month', date('m'));
        $year = Yii::app()->request->getQuery('year', date('Y'));
        $curent = $year."-".$month;
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
        ?>
        <label class="day btn btn-default <?php echo (isset($user_days['sat'])) ? 'active' : ''; ?>"><input type="checkbox" <?php echo (isset($user_days['sat'])) ? 'checked="checked"' : ''; ?> value="sat" name="d[<?php echo $data->id; ?>][]">Sat</label>
        <label class="day btn btn-default <?php echo (isset($user_days['sun'])) ? 'active' : ''; ?>"><input type="checkbox" <?php echo (isset($user_days['sun'])) ? 'checked="checked"' : ''; ?> value="sun" name="d[<?php echo $data->id; ?>][]">Sun</label>
        <label class="day btn btn-default <?php echo (isset($user_days['mon'])) ? 'active' : ''; ?>"><input type="checkbox" <?php echo (isset($user_days['mon'])) ? 'checked="checked"' : ''; ?> value="mon" name="d[<?php echo $data->id; ?>][]">Mon</label>
        <label class="day btn btn-default <?php echo (isset($user_days['tue'])) ? 'active' : ''; ?>"><input type="checkbox" <?php echo (isset($user_days['tue'])) ? 'checked="checked"' : ''; ?> value="tue" name="d[<?php echo $data->id; ?>][]">Tue</label>
        <label class="day btn btn-default <?php echo (isset($user_days['wed'])) ? 'active' : ''; ?>"><input type="checkbox" <?php echo (isset($user_days['wed'])) ? 'checked="checked"' : ''; ?> value="wed" name="d[<?php echo $data->id; ?>][]">Wed</label>
        <label class="day btn btn-default <?php echo (isset($user_days['thu'])) ? 'active' : ''; ?>"><input type="checkbox" <?php echo (isset($user_days['thu'])) ? 'checked="checked"' : ''; ?> value="thu" name="d[<?php echo $data->id; ?>][]">Thu</label>
        <label class="day btn btn-default <?php echo (isset($user_days['fri'])) ? 'active' : ''; ?>"><input type="checkbox" <?php echo (isset($user_days['fri'])) ? 'checked="checked"' : ''; ?> value="fri" name="d[<?php echo $data->id; ?>][]">Fri</label>
    </div>
</div>