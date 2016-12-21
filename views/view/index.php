<!-- Include Date Range Picker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<div class="panel panel-default">
    <div class="panel-heading">
        Index      
    </div>
    <div class="panel-body">
        <?php
        $filter_by = Yii::app()->request->getParam('daterange');
        $start_end = explode(' - ', $filter_by);
        if (!empty($start_end[0]) && !empty($start_end[1])) {
            $filter_by_output = $filter_by;
            $defaultDate=date('Y-m-d', strtotime($start_end[0]));
        } else {
            $filter_by_output = '';
            $defaultDate = date('Y-m-d');
        }
        ?>
        <script type="text/javascript">
            $(function () {
                $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,basicWeek,basicDay'
                    },
                    defaultDate: '<?php echo $defaultDate; ?>',
                    displayEventEnd: true,
                    events: {
                        url: '<?php echo $this->createUrl('loadAjax'); ?>',
                        data: {
                            daterange: '<?php echo $filter_by; ?>',
                        },
                    }
                });
                $('#config-demo').daterangepicker({
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Week': [moment().startOf('week'), moment().endOf('week')],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    }
                });
            });
        </script>
        <?php
        echo '<strong>Today:</strong> ' . date("l, d F Y");
        $now = date('H:i:s', time());
        $day = date('D', time());
        $curent = date('Y-m');
        $current_shift = Workdays::model()->find(array(
            'condition' => 'user_id = :user_id AND work_day = :work_day and DATE_FORMAT( effect_date,  "%Y-%m" ) =:currdate',
            'params' => array(
                ':work_day' => $day,
                ':user_id' => Yii::app()->user->id,
                ':currdate' => $curent
            )
        ));

        if (isset($current_shift)) {
            $secs = strtotime($current_shift->min_time) - strtotime("00:00:00");
            $start_time = date("H:i:s", strtotime($current_shift->start_work));
            $end_time = date("H:i:s", strtotime($current_shift->start_work) + $secs);
            if ($start_time <= $now && $end_time >= $now) {
                echo '<p>Your shift is up and running</p>';
            } else {
                echo '<p>Your shift is over you can go home now</p>';
            }
        } else {
            echo '<p>You are day off today</p>';
        }
        ?>
        <div class="row">
            <div class="col-md-12">
                <form class="form-horizontal">
                    <div class="form-group">
                        <div class="col-md-6 filterdate">
                            <input type="text" name="daterange" id="config-demo" class="form-control" value="<?php echo $filter_by_output; ?>">
                            <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                        </div>
                        <div class="col-md-6">
                            <input type="submit" value="filter" class="btn btn-success" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div id='calendar'></div>
            </div>
        </div>
    </div>
</div>