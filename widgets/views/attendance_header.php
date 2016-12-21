<div class="pull-left">
    <div id="data-header">
        <?php
        $curent = date("Y-m-d", time());
        ?>
        <?php
        $attendance = Attendance::model()->find(array(
            'condition' => "user_id =:user_id and DATE_FORMAT( in_time,  '%Y-%m-%d' ) =:currdate and (out_time is NULL or out_time = '0000-00-00 00:00:00')",
            //'condition' => "user_id =:user_id and DATE_FORMAT( in_time,  '%Y-%m-%d' ) =:currdate",
            'params' => array(
                ':user_id' => Yii::app()->user->id,
                ':currdate' => $curent
            )
        ));
        if ($attendance) {
            $start_timer = time() - strtotime($attendance->in_time);
            ?>
            <?php
            echo HHtml::ajaxLink('Check OUT', $this->createUrl('//company/attendenace/punchHeader', array('id' => $attendance->id)), array(
                'type' => "POST",
                'data' => array('type' => 'checkout'),
                'beforeSend' => 'function(){ $("#postform-loader").removeClass("hidden"); }',
                'complete' => "function(response) {
                         $('.contentForm_options .btn').show(); $('#postform-loader').addClass('hidden');   
                            }",
                'update' => '#data-header'
                    ), array('class' => 'btn btn-info')
            );
            if ($attendance->type == 2) {
                echo HHtml::ajaxLink('Continue Work', $this->createUrl('//company/attendenace/punchHeader', array('id' => $attendance->id)), array(
                    'type' => "POST",
                    'data' => array('type' => 'continue'),
                    'beforeSend' => 'function(){ $("#postform-loader").removeClass("hidden"); }',
                    'complete' => "function(response) {
                         $('.contentForm_options .btn').show(); $('#postform-loader').addClass('hidden');   
                            }",
                    'update' => '#data-header'
                        ), array('class' => 'btn btn-default')
                );
            } else {
                echo HHtml::ajaxLink('Break', $this->createUrl('//company/attendenace/punchHeader', array('id' => $attendance->id)), array(
                    'type' => "POST",
                    'data' => array('type' => 'break'),
                    'beforeSend' => 'function(){ $("#postform-loader").removeClass("hidden"); }',
                    'complete' => "function(response) {
                         $('.contentForm_options .btn').show(); $('#postform-loader').addClass('hidden');   
                            }",
                    'update' => '#data-header'
                        ), array('class' => 'btn btn-danger')
                );
            }
        } else {
            echo HHtml::ajaxLink('Check In', $this->createUrl('//company/attendenace/punchHeader'), array(
                'type' => "POST",
                'data' => array('type' => 'checkin'),
                'beforeSend' => 'function(){ $("#postform-loader").removeClass("hidden"); }',
                'complete' => "function(response) {
                         $('.contentForm_options .btn').show(); $('#postform-loader').addClass('hidden');   
                            }",
                'update' => '#data-header'
                    ), array('class' => 'btn btn-info')
            );
        }
        ?>
    </div>
    <div id="postform-loader" class="loader loader-postform hidden">
        <div class="sk-spinner sk-spinner-three-bounce">
            <div class="sk-bounce1"></div>
            <div class="sk-bounce2"></div>
            <div class="sk-bounce3"></div>
        </div>
    </div>
</div>