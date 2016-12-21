
<div class="panel panel-default">
    <div
        class="panel-heading">Salary - Payment Details</div>

    <div class="panel-body">
        <?php
        $pay_grade = $user->profile->pay_grade;
        $pay_grade_details = PayGrades::model()->findByPk($pay_grade);
        ?>
        <div class="col-md-3">
            <strong>Pay Grade</strong> 
        </div>
        <div class="col-md-9">
            <?php if (isset($pay_grade_details)): ?>
                <?php echo $pay_grade_details->name; ?>
            <?php else: ?>
                Not Defined
            <?php endif; ?>
        </div>
        <div class="col-md-3">
            <strong>Salary</strong> 
        </div>
        <div class="col-md-9">
            <?php if (isset($pay_grade_details)): ?>
                Min: <?php echo $pay_grade_details->min_salary; ?> Max: <?php echo $pay_grade_details->max_salary; ?>
            <?php else: ?>
                Not Defined
            <?php endif; ?>
        </div>
        <div class="col-md-3">
            <strong>Currency</strong> 
        </div>
        <div class="col-md-9">
            <?php if (isset($pay_grade_details)): ?>
                <?php echo $pay_grade_details->currency; ?>
            <?php else: ?>
                Not Defined
            <?php endif; ?>
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div
        class="panel-heading">Salary - History</div>

    <div class="panel-body">
        <?php
        $month = Yii::app()->request->getQuery('month', date('m'));
        $year = Yii::app()->request->getQuery('year', date('Y'));
        $curent = $year . "-" . $month;
        ?>
        <form>
            <div class="col-md-2">
                <?php
                echo CHtml::dropDownList('month', $month, array(
                    '01' => 'Jan.',
                    '02' => 'Feb.',
                    '03' => 'Mar.',
                    '04' => 'Apr.',
                    '05' => 'May',
                    '06' => 'Jun.',
                    '07' => 'Jul.',
                    '08' => 'Aug.',
                    '09' => 'Sep.',
                    '10' => 'Oct.', '11' => 'Nov.', '12' => 'Dec.'), array('class' => 'form-control'));
                ?>
            </div>
            <div class="col-md-2">
                <?php
                $years = array_combine(range(date("Y"), 2020), range(date("Y"), 2020));
                echo CHtml::dropDownList('year', $year, $years, array('class' => 'form-control'));
                ?>
            </div>
            <div class="col-md-2">
                <input type="submit" value="GO" class="btn btn-info" />
            </div>
        </form>
    </div>
</div>
<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'employee-salary-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation' => false,
        ));
?>
<!-- check if flash message exists -->
<?php if(Yii::app()->user->hasFlash('data-saved')): ?>
    <div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <?php echo Yii::app()->user->getFlash('data-saved'); ?>
    </div>
<?php endif; ?>
<!-- check if flash message exists -->
<?php if(Yii::app()->user->hasFlash('data-failed')): ?>
    <div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <?php echo Yii::app()->user->getFlash('data-failed'); ?>
    </div>
<?php endif; ?>
<?php
$total_payped = Yii::app()->db->createCommand()
        ->select('sum(amount) as total_score')
        ->from('employee_salary t')
        ->join('salary_component', 't.component_id = salary_component.id')
        ->where('emp_id=:id AND salary_component.type=:type AND DATE_FORMAT( effect_date,  "%Y-%m" ) =:currdate', array(':id' => $user->user->id, ':type' => 0,':currdate' => $curent))
        ->queryRow();
$total_deduction = Yii::app()->db->createCommand()
        ->select('sum(amount) as total_score')
        ->from('employee_salary t')
        ->join('salary_component', 't.component_id = salary_component.id')
        ->where('emp_id=:id AND salary_component.type=:type AND DATE_FORMAT( effect_date,  "%Y-%m" ) =:currdate', array(':id' => $user->user->id, ':type' => 1,':currdate' => $curent))
        ->queryRow();
$company_cost = Yii::app()->db->createCommand()
        ->select('sum(amount) as total_score')
        ->from('employee_salary t')
        ->join('salary_component', 't.component_id = salary_component.id')
        ->where('emp_id=:id AND salary_component.company_cost=:type AND DATE_FORMAT( effect_date,  "%Y-%m" ) =:currdate', array(':id' => $user->user->id, ':type' => 1,':currdate' => $curent))
        ->queryRow();
?>
<div class="panel panel-default">
    <div class="panel-heading">Salary Inputs</div>
    <div class="panel-body">
        <?php
        Yii::app()->getClientScript()->registerScriptFile('jquery-ui.min.js');
        $criteria = new CDbCriteria;
        $criteria->condition = 'emp_id = :emp_id AND DATE_FORMAT( effect_date,  "%Y-%m" ) =:currdate';
        $criteria->params = array(':emp_id' => $user->user->id,':currdate' => $curent);
        $this->widget('ext.tabularinput.XTabularInput', array(
            'models' => EmployeeSalary::model()->findAll($criteria),
            'inputView' => '_salaryInput',
            'inputUrl' => $this->createUrl('addSalaryInputs', array("uguid" => Yii::app()->user->guid)),
            'inputCssClass' => 'row',
            'removeTemplate' => '<div class="col-md-2">{link}</div>',
            'addTemplate' => '<div class="action">{link}</div>',
            'addHtmlOptions' => array('class' => 'btn btn-info'),
            'removeHtmlOptions' => array('class' => 'btn btn-danger btn-xs'),
            'removeLabel' => '<i class="fa fa-times"></i>',
            'addLabel' => '<i class="fa fa-plus"> Add Component</i>'
        ));
        ?>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">Salary Summary</div>
    <div class="panel-body">
        <ol>
            <li>Total Earnings : <strong><?php echo $total_payped['total_score']; ?></strong></li>
            <li>Total Deductions : <strong><?php echo $total_deduction['total_score']; ?></strong></li>
            <li>Total Payed : <strong><?php echo $total_payped['total_score']-$total_deduction['total_score']; ?></strong></li>
            <li>Cost to the Company : <strong><?php echo $company_cost['total_score']; ?></strong></li>
        </ol>
        <div class="form-group">
            <input type="submit" value="Save" class="btn btn-primary" />
        </div>
    </div>
</div>
<?php $this->endWidget(); ?>