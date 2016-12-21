<div class="panel panel-default">
    <div
        class="panel-heading">Salary - Payment Details</div>

    <div class="panel-body">
        <?php
        $total_payped = 0;
        $total_deduction = 0;
        $company_cost = 0;
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
<div class="panel panel-default">
    <div class="panel-heading">All Earnings</div>
    <div class="panel-body">
        <?php foreach ($earnings as $earning): ?>
            <?php
            $emp_salaries = $user->getsalary($earning->id,$curent);
            foreach ($emp_salaries as $emp_sal):
                if (isset($emp_sal->amount))
                    $total_payped += $emp_sal->amount;
                if ($earning->company_cost != 0 && isset($emp_sal->amount)) {
                    $company_cost += $emp_sal->amount;
                }
                ?>
                <div class="row">
                    <div class="form-group">
                        <div class="col-sm-3"><?php echo $earning->name; ?></div>
                        <div class="col-sm-2">
                            <?php echo isset($emp_sal->amount) ? $emp_sal->amount : 0; ?>
                        </div>
                        <div class="col-sm-3">
                            <?php echo isset($emp_sal->effect_date) ? $emp_sal->effect_date : 0; ?>
                        </div>
                        <div class="col-sm-4">
                            <?php
                            echo $emp_sal->details;
                            ?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">All Deductions</div>
    <div class="panel-body">
        <?php foreach ($deductions as $deduction): ?>
            <?php
            $emp_deductions = $user->getsalary($deduction->id,$curent);
            foreach ($emp_deductions as $emp_deduction):
                if (isset($emp_deduction->amount))
                    $total_deduction += $emp_deduction->amount;
                if ($earning->company_cost != 0 && isset($emp_deduction->amount)) {
                    $company_cost += $emp_deduction->amount;
                }
                ?>
                <div class="row">
                    <div class="form-group">
                        <div class="col-sm-3"><?php echo $deduction->name; ?></div>
                        <div class="col-sm-2">
                            <?php echo isset($emp_deduction->amount) ? $emp_deduction->amount : 0; ?>
                        </div>
                        <div class="col-sm-3">
                            <?php echo isset($emp_deduction->effect_date) ? $emp_deduction->effect_date : 0; ?>
                        </div>
                        <div class="col-sm-4">
                            <?php
                            echo $emp_deduction->details;
                            ?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </div>
</div>
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
//$company_cost = Yii::app()->db->createCommand()
//        ->select('sum(amount) as total_score')
//        ->from('employee_salary t')
//        ->join('salary_component', 't.component_id = salary_component.id')
//        ->where('emp_id=:id AND salary_component.company_cost=:type', array(':id' => $user->user->id, ':type' => 1))
//        ->queryRow();
?>
<div class="panel panel-default">
    <div class="panel-heading">Salary Summary</div>
    <div class="panel-body">
        <ol>
            <li>Total Earnings : <strong><?php echo $total_payped['total_score']; ?></strong></li>
            <li>Total Deductions : <strong><?php echo $total_deduction['total_score']; ?></strong></li>
            <li>Total Payed : <strong><?php echo $total_payped['total_score'] - $total_deduction['total_score']; ?></strong></li>
        </ol>
    </div>
</div>