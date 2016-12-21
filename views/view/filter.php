<div class="panel panel-default">
    <div class="panel-heading">
        Index      
    </div>
    <div class="panel-body">
        <table class="table table-condensed table-bordered table-striped">
            <thead><th><strong><?php echo $title ?></strong></th></thead>
            <tbody>
                <?php
                $now = date('H:i:s', time());
                foreach ($users as $team_user) {
                    $shifts = Workdays::model()->findAll(array(
                        'condition' => 'user_id = :user_id',
                        'params' => array(
                            ':user_id' => $team_user->user_id,
                        ),
                        'order' => 'start_work'
                    ));
                    echo "<tr><td>" . $team_user->user->displayName . "</td></tr>";
                    if (!empty($shifts)) {
                        echo '<tr><td><table>';
                        foreach ($shifts as $shift) {
                            $secs = strtotime($shift->min_time) - strtotime("00:00:00");
                            $start_time = date("h:i a", strtotime($shift->start_work));
                            $end_time = date("h:i a", strtotime($shift->start_work) + $secs);
                            echo '<tr><td>';
                            switch ($shift->work_day) {
                                case 'sat':
                                    echo 'Saturday';
                                    break;
                                case 'sun':
                                    echo 'Sunday';
                                    break;
                                case 'mon':
                                    echo 'Monday';
                                    break;
                                case 'wed':
                                    echo 'Wednesday';
                                    break;
                                case 'thu':
                                    echo 'Thursday';
                                    break;
                                case 'tue':
                                    echo 'Tuesday';
                                    break;
                                case 'fri':
                                    echo 'Friday';
                                    break;
                                default:
                                    break;
                            }
                            echo '<td>'.$start_time.' - '.$end_time.'</td></td>';
                            echo '</tr>';
                        }
                        echo '</td></tr></table>';
                    } else {
                        echo "<tr><td>No Shifts</td></tr>";
                    }
                    
                    
                }
                ?>
            </tbody>
        </table>
    </div>
</div>