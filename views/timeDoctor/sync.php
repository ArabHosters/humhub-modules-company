
<div class="panel panel-default">
    <div class="panel-heading">
        Sync Timedoctor projects
    </div>
    <div class="panel-body">
        <?php
        if (!$userInfo || isset($userInfo['error'])) {
            if (isset($userInfo['error_description'])) {
                echo '<p>' . $userInfo['error_description'] . '</p>';
            }
            if (isset($userInfo['description'])) {
                echo '<p>' . $userInfo['description'] . '</p>';
            }
            if ($userInfo['error'] == 'invalid_grant') {
                $user = User::model()->findByPk(Yii::app()->user->id);
                $this->widget('application.modules.company.widgets.TimeDoctorButtonWidget', array('user' => $user));
            }
        }else{
        if ($userInfo->type != 'admin'):
            ?>
            <div class="alert alert-warning">You are not authorized to perform this action</div>
        <?php else: ?>
            <?php
            $new = 0;
            $updated = 0;
            $updated_ids = '';
            foreach ($projects['projects'] as $project) {
                if ($project['project_source'] == 'Rizeone') {
                    $rizeone_project = Project::model()->findByAttributes(array('timedoctor_id' => $project['project_id']));
                    if ($rizeone_project) {
                        if ($rizeone_project->archived != $project['archived'] || $rizeone_project->name != $project['project_name']) {
                            $rizeone_project->archived = $project['archived'];
                            $rizeone_project->name = $project['project_name'];
                            $rizeone_project->save();
                            $updated_ids .= $project['project_id'] . '<br>';
                            $updated++;
                        }
                    } else {
                        $rizeone_project = new Project();
                        $rizeone_project->name = $project['project_name'];
                        $rizeone_project->timedoctor_id = $project['project_id'];
                        $rizeone_project->archived = $project['archived'];
                        $rizeone_project->save();
                        $new++;
                    }
                }
            }
            ?>
            <b>New Projects: </b> <?php echo $new; ?> <br>
            <b>Updated Projects: </b> <?php echo $updated; ?> <br>
        <?php endif;} ?>
    </div>
</div>


