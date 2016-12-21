<div class="panel-heading">
    Time Doctor Work Log
</div>
<div class="panel-body">
    <?php if (Yii::app()->user->hasFlash('worklognotice')): ?>

        <div class="alert alert-warning">
            <?php echo Yii::app()->user->getFlash('worklognotice'); ?>
        </div>

    <?php else: ?>
        <?php
        if (!$worklog || isset($worklog['error'])) {
            if (isset($worklog['error_description'])) {
                echo '<p>' . $worklog['error_description'] . '</p>';
            }
            if (isset($worklog['description'])) {
                echo '<p>' . $worklog['description'] . '</p>';
            }
            if ($worklog['error'] != 'No timedoctor for this user') {
                $user = User::model()->findByPk(Yii::app()->user->id);
                $this->widget('application.modules.company.widgets.TimeDoctorButtonWidget', array('user' => $user));
            }
        } else {
            $items = $worklog['worklogs']['items'];
            if (!empty($items)) {
                ?>
                <div class="btn-group pull-right">
                    <button id="w5" class="btn btn-default dropdown-toggle" href="#" title="Export" data-toggle="dropdown" aria-expanded="false"><i class="glyphicon glyphicon-export"></i>  <span class="caret"></span></button>
                    <ul id="w6" class="dropdown-menu dropdown-menu-right"><li role="presentation" class="dropdown-header">Export Page Data</li>
                        <li title="Excel">
                            <form method="post">
                                <input type="hidden" name="<?php echo Yii::app()->request->csrfTokenName; ?>" value="<?php echo Yii::app()->request->csrfToken; ?>" />
                                <input type="hidden" name="download" value="1"/>
                                <button class="export-xls btn" type="submit">
                                    <i class="text-success fa fa-file-excel-o"></i> Excel
                                </button>
                            </form>
                        </li>
                </div>
                <table class="table table-condensed table-bordered table-striped">
                    <thead><tr><th>Task name</th><th>project name</th><th>Time Worked</th></tr></thead>
                    <tbody>
                        <?php foreach ($items as $key => $value): ?>
                            <tr>
                                <td><?php echo $value['task_name']; ?></td>
                                <td><?php echo $value['project_name']; ?></td>
                                <td><?php echo Rizer::seconds_to_hours($value['length']); ?> Hours</td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php }else { ?>
                <div class="alert alert-warning">
                    No Worklog items for selected date range
                </div>
            <?php } ?>
        <?php } ?>
    <?php endif; ?>
    <?php if($attendance): ?>
    <h3>Attendance Log</h3>
    <div class="btn-group pull-right">
        <button id="w5" class="btn btn-default dropdown-toggle" href="#" title="Export" data-toggle="dropdown" aria-expanded="false"><i class="glyphicon glyphicon-export"></i>  <span class="caret"></span></button>
        <ul id="w6" class="dropdown-menu dropdown-menu-right"><li role="presentation" class="dropdown-header">Export Page Data</li>
            <li title="Excel">
                <form method="post">
                    <input type="hidden" name="<?php echo Yii::app()->request->csrfTokenName; ?>" value="<?php echo Yii::app()->request->csrfToken; ?>" />
                    <input type="hidden" name="download" value="2"/>
                    <button class="export-xls btn" type="submit">
                        <i class="text-success fa fa-file-excel-o"></i> Excel
                    </button>
                </form>
            </li>
    </div>
    <table class="table table-condensed table-bordered table-striped">
        <thead><tr><th>In Time</th><th>Out Time</th><th>Total</th><th>Type</th></tr></thead>
        <tbody>
            <?php foreach ($attendance as $timelog): ?>
                <tr>
                    <td><?php echo $timelog->in_time; ?></td>
                    <td><?php echo $timelog->out_time; ?></td>
                    <td>
                        <?php
                        $timediff = strtotime($timelog->out_time) - strtotime($timelog->in_time);
                        echo Rizer::seconds_to_hours($timediff);
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($timelog->type == 1) {
                            echo 'Working';
                        } else {
                            echo 'Break';
                        }
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif; ?>
</div>