<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/required_work_hours.css" rel="stylesheet">
<div id="results"></div>
<div id="postform-loader" class="loader loader-postform hidden">
    <div class="sk-spinner sk-spinner-three-bounce">
        <div class="sk-bounce1"></div>
        <div class="sk-bounce2"></div>
        <div class="sk-bounce3"></div>
    </div>
</div>
<form id="required_work_hours" method="post">
    <input type="hidden" name="<?php echo Yii::app()->request->csrfTokenName; ?>" value="<?php echo Yii::app()->request->csrfToken; ?>" />
    <div class="pull-right">
        <?php
        echo CHtml::ajaxSubmitButton('Save', $this->createUrl('saveWorkDays'), 
                array(
                    'update' => '#results',
                    'type' => "post",
                    'beforeSend' => 'function(){ $("#postform-loader").removeClass("hidden"); }',
                    'complete' => "function(response) {
                            $('.contentForm_options .btn').show(); $('#postform-loader').addClass('hidden');
                        }",
                ), 
                array('class' => 'btn btn-blue inactive','id'=>'save-form')
        );
        ?>
    </div>
    <div id="previewState" class="">
        <table class="table table-hover reportTable" width="100%" border="0" cellpadding="0" cellspacing="0" id="user_results">
            <thead>
                <tr class="table_header">
                    <th class="colName span2">Name</th>
                    <th class="colWorkHour span5">Required Work Days</th>
                    <th class="colMinHour span2">Minimum Daily Hours</th>
                    <th class="colStartTime span2">Start Work Time</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr class="users_details">
                        <td class="colName">
                            <strong><?php echo $user->displayName; ?></strong>
                        </td>
                        <td class="colWorkHour">
                            <div class="btn-toolbar">
                                <div class="btn-group"><button type="button" class="btn tdBtn btn-default day-none" user="<?php echo $user->id; ?>">None</button></div>
                                <div class="btn-group week" data-toggle="buttons">
                                    <?php
                                    $workdays = Workdays::model()->findAll('user_id = :user_id', array(
                                        ':user_id' => $user->id,
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
                                    $min_time = array();
                                    if (isset($user_days['min_time'])) {
                                        $min_time = explode(":", $user_days['min_time']);
                                    }
                                    ?>
                                    <label class="btn btn-default <?php echo (isset($user_days['sat'])) ? 'active' : ''; ?>"><input type="checkbox" <?php echo (isset($user_days['sat'])) ? 'checked="checked"' : ''; ?> value="sat" name="d[<?php echo $user->id; ?>][]">Sat</label>
                                    <label class="btn btn-default <?php echo (isset($user_days['sun'])) ? 'active' : ''; ?>"><input type="checkbox" <?php echo (isset($user_days['sun'])) ? 'checked="checked"' : ''; ?> value="sun" name="d[<?php echo $user->id; ?>][]">Sun</label>
                                    <label class="btn btn-default <?php echo (isset($user_days['mon'])) ? 'active' : ''; ?>"><input type="checkbox" <?php echo (isset($user_days['mon'])) ? 'checked="checked"' : ''; ?> value="mon" name="d[<?php echo $user->id; ?>][]">Mon</label>
                                    <label class="btn btn-default <?php echo (isset($user_days['tue'])) ? 'active' : ''; ?>"><input type="checkbox" <?php echo (isset($user_days['tue'])) ? 'checked="checked"' : ''; ?> value="tue" name="d[<?php echo $user->id; ?>][]">Tue</label>
                                    <label class="btn btn-default <?php echo (isset($user_days['wed'])) ? 'active' : ''; ?>"><input type="checkbox" <?php echo (isset($user_days['wed'])) ? 'checked="checked"' : ''; ?> value="wed" name="d[<?php echo $user->id; ?>][]">Wed</label>
                                    <label class="btn btn-default <?php echo (isset($user_days['thu'])) ? 'active' : ''; ?>"><input type="checkbox" <?php echo (isset($user_days['thu'])) ? 'checked="checked"' : ''; ?> value="thu" name="d[<?php echo $user->id; ?>][]">Thu</label>
                                    <label class="btn btn-default <?php echo (isset($user_days['fri'])) ? 'active' : ''; ?>"><input type="checkbox" <?php echo (isset($user_days['fri'])) ? 'checked="checked"' : ''; ?> value="fri" name="d[<?php echo $user->id; ?>][]">Fri</label>
                                </div>
                            </div>
                        </td>
                        <td class="colMinHour">
                            <?php
                            if (isset($min_time[0])) {
                                $min_select = $min_time[0];
                            } else {
                                $min_select = '04';
                            }
                            echo CHtml::dropDownList('mth[' . $user->id . ']', $min_select, array(
                                '-1' => '---',
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
                            ));

                            if (isset($min_time[1])) {
                                $min_time_2 = $min_time[1];
                            } else {
                                $min_time_2 = '00';
                            }

                            echo CHtml::dropDownList('mtm[' . $user->id . ']', $min_time_2, array(
                                '-1' => '---',
                                '00' => '00 min',
                                '15' => '15 min',
                                '30' => '30 min',
                                '45' => '45 min',
                            ));
                            ?>

                        </td>
                        <td class="colStartTime">
                            <?php
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
                            echo CHtml::dropDownList('sth[' . $user->id . ']', $workstart_select, array(
                                '-1' => '---',
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
                            ));

                            echo CHtml::dropDownList('stm[' . $user->id . ']', $workstart_select_2, array(
                                '-1' => '---',
                                '00' => '00',
                                '15' => '15',
                                '30' => '30',
                                '45' => '45',
                            ));
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</form>