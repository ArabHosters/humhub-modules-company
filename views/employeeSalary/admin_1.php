
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
<?php
$total_payped = 0;
$total_deduction = 0;
$company_cost = 0;
?>
<div class="panel panel-default">
    <div class="panel-heading">All Earnings</div>
    <div class="panel-body">
        <?php foreach ($earnings as $earning): ?>
            <?php
            $emp_sal = $user->getsalary($earning->id);
            if (isset($emp_sal->amount))
                $total_payped += $emp_sal->amount;
            if ($earning->company_cost != 0 && isset($emp_sal->amount)) {
                $company_cost += $emp_sal->amount;
            }
            ?>
            <div class="row">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email"><?php echo $earning->name; ?></label>
                    <div class="col-sm-4">
                        <input type="hidden" name='EmployeeSalary[<?php echo $earning->id; ?>][emp_sal]' value="<?php echo isset($emp_sal->id) ? $emp_sal->id : 0; ?>">
                        <input type="text" name='EmployeeSalary[<?php echo $earning->id; ?>][amount]' class="form-control" value="<?php echo isset($emp_sal->amount) ? $emp_sal->amount : 0; ?>" placeholder="<?php echo $earning->name; ?>">
                    </div>
                    <div class="col-sm-4">
                        <div class="input-group date" id="datepicker2">
                            <?php
                            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                'options' => array(
                                    'showAnim' => 'fold',
                                ),
                                'name' => "EmployeeSalary[" . $earning->id . "][start_date]",
                                'value' => isset($emp_sal->effect_date) ? $emp_sal->effect_date : 0,
                                'htmlOptions' => array(
                                    'id' => 'Effective' . $earning->id,
                                    'class' => 'form-control',
                                    'placeholder' => 'Effective Date'
                                ),
                                'options' => array(
                                    'dateFormat' => 'yy-mm-dd',
                                    'showButtonPanel' => true,
                                    'changeMonth' => true,
                                    'changeYear' => true,
                                ),
                            ));
                            ?>
                            <span class="input-group-addon"><i class="fa fa-th"></i></span>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">All Deductions</div>
    <div class="panel-body">
        <?php foreach ($deductions as $deduction): ?>
            <?php
            $emp_deduction = $user->getsalary($deduction->id);
            if (isset($emp_deduction->amount))
                $total_deduction += $emp_deduction->amount;
            if ($earning->company_cost != 0 && isset($emp_deduction->amount)) {
                $company_cost += $emp_deduction->amount;
            }
            ?>
            <div class="row">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email"><?php echo $deduction->name; ?></label>
                    <div class="col-sm-4">
                        <input type="hidden" name='EmployeeSalary[<?php echo $deduction->id; ?>][emp_sal]' value="<?php echo isset($emp_deduction->id) ? $emp_deduction->id : 0; ?>">
                        <input type="text" name='EmployeeSalary[<?php echo $deduction->id; ?>][amount]' class="form-control" value="<?php echo isset($emp_deduction->amount) ? $emp_deduction->amount : 0; ?>" placeholder="<?php echo $deduction->name; ?>">
                    </div>
                    <div class="col-sm-4">
                        <div class="input-group date" id="datepicker2">
                            <?php
                            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                'options' => array(
                                    'showAnim' => 'fold',
                                ),
                                'name' => "EmployeeSalary[" . $deduction->id . "][start_date]",
                                'value' => isset($emp_deduction->effect_date) ? $emp_deduction->effect_date : 0,
                                'htmlOptions' => array(
                                    'id' => 'Effective' . $deduction->id,
                                    'class' => 'form-control',
                                    'placeholder' => 'Effective Date'
                                ),
                                'options' => array(
                                    'dateFormat' => 'yy-mm-dd',
                                    'showButtonPanel' => true,
                                    'changeMonth' => true,
                                    'changeYear' => true,
                                ),
                            ));
                            ?>
                            <span class="input-group-addon"><i class="fa fa-th"></i></span>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">Salary Summary</div>
    <div class="panel-body">
        <ol>
            <li>Total Payable : <strong><?php echo $total_payped; ?></strong></li>
            <li>Total Deductions : <strong><?php echo $total_deduction; ?></strong></li>
            <li>Cost to the Company : <strong><?php echo $company_cost; ?></strong></li>
        </ol>
        <div class="form-group">
            <input type="submit" value="Save" class="btn btn-primary" />
        </div>
    </div>
</div>
<?php $this->endWidget(); ?>