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
        if (!$worklog || isset($worklog['error'])):
            if (isset($worklog['error_description'])) {
                echo '<p>'.$worklog['error_description'].'</p>';
            }
            if (isset($worklog['description'])) {
                echo '<p>'.$worklog['description'].'</p>';
            }
            $user = User::model()->findByPk(Yii::app()->user->id);
            $this->widget('application.modules.company.widgets.TimeDoctorButtonWidget', array('user' => $user));
        else:

            $items = $worklog['worklogs']['items'];
            if (!empty($items)):
//                Yii::app()->numberFormatter->formatDecimal($value['length'] / 60);
                ?>
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
            <?php else: ?>
                <div class="alert alert-warning">
                    No Worklog items for selected date range
                </div>
            <?php endif; ?>
        <?php endif; ?>
    <?php endif; ?>
</div>