<?php $this->beginContent(); ?>
<div class="panel panel-default">
    <div class="panel-heading">
        Company Settings
    </div>
    <div class="panel-body">
        <div id="rights" style="margin-top: 0;">
            <div class="tabbable header-tabs">
                <div id="menu">
                    <?php if ((Yii::app()->controller->module && Yii::app()->controller->module->id == 'company' && (Yii::app()->controller->id == 'companyStructures' || Yii::app()->controller->id == 'companyOrgChart'))): ?>
                        <?php $this->renderPartial('/company_menu'); ?>
                    <?php elseif ((Yii::app()->controller->module && Yii::app()->controller->module->id == 'company' && (Yii::app()->controller->id == 'employmentStatus' || Yii::app()->controller->id == 'jobTitles' || Yii::app()->controller->id == 'payGrades' || Yii::app()->controller->id == 'salaryComponent'))): ?>
                        <?php $this->renderPartial('/job_menu'); ?>
                    <?php elseif ((Yii::app()->controller->module && Yii::app()->controller->module->id == 'company' && (Yii::app()->controller->id == 'skills' || Yii::app()->controller->id == 'educations' || Yii::app()->controller->id == 'certifications' || Yii::app()->controller->id == 'languages'))): ?>
                        <?php $this->renderPartial('/qualifications_menu'); ?>
                    <?php elseif ((Yii::app()->controller->module && Yii::app()->controller->module->id == 'company' && (Yii::app()->controller->id == 'vacancy') || Yii::app()->controller->id == 'candidates')): ?>
                        <?php $this->renderPartial('/recruit_menu'); ?>
                    <?php elseif (Yii::app()->controller->module && Yii::app()->controller->module->id == 'company' && (Yii::app()->controller->id == 'salarySettings')): ?>
                        <?php $this->renderPartial('/rules_menu'); ?>
                    <?php elseif (Yii::app()->controller->module && Yii::app()->controller->module->id == 'company' && (Yii::app()->controller->id == 'leavePeriods' || Yii::app()->controller->id == 'leaveTypes' || Yii::app()->controller->id == 'leaveRules' || Yii::app()->controller->id == 'holidays' || Yii::app()->controller->id == 'employeeLeaves' || Yii::app()->controller->id == 'employeeAttendance'|| Yii::app()->controller->id == 'employeeSwaps'|| Yii::app()->controller->id == 'workdays')): ?>
                        <?php $this->renderPartial('/_menu'); ?>
                    <?php endif; ?>
                </div>
                <div class="tab-content">
                    <?php echo $content; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endContent(); ?>