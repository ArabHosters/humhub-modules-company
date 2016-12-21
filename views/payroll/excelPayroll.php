<html><head><meta http-equiv="content-type" content="text/html; charset=utf-8">
    </title></head><body>
    <?php if ($components !== null): ?>
        <table border="1">
            <tr>
                <th>Employee</th>
                <?php foreach ($components as $component): ?>
                    <?php
                    $type = ($component->type == 0) ? '(Earning)' : '(Deduction)';
                    ?>
                    <th><?php echo $component->name . ' ' . $type; ?></th>
                <?php endforeach; ?>
                <th>Total</th>
            </tr>
            <?php foreach ($users as $user): ?>
                <tr>
                    <th><?php echo $user->displayName; ?></th>
                    <?php foreach ($components as $component): ?>
                        <?php
                        $salary = EmployeeSalary::model()->find(array(
                            'select' => 'sum(amount) AS totalAmount',
                            'condition' => "emp_id =:user_id and component_id =:component_id and DATE_FORMAT( effect_date,  '%Y-%m' ) =:currdate",
                            'params' => array(
                                ':user_id' => $user->id,
                                'component_id' => $component->id,
                                ':currdate' => $curent
                            )
                        ));
                        ?>
                        <th><?php echo ($salary->totalAmount) ? $salary->totalAmount : 0; ?></th>
                    <?php endforeach; ?>
                    <th>
                        <?php
                        $total_payped = Yii::app()->db->createCommand()
                                ->select('sum(amount) as total_score')
                                ->from('employee_salary t')
                                ->join('salary_component', 't.component_id = salary_component.id')
                                ->where('emp_id=:id AND salary_component.type=:type AND DATE_FORMAT( effect_date,  "%Y-%m" ) =:currdate', array(':id' => $user->id, ':type' => 0, ':currdate' => $curent))
                                ->queryRow();
                        $total_deduction = Yii::app()->db->createCommand()
                                ->select('sum(amount) as total_score')
                                ->from('employee_salary t')
                                ->join('salary_component', 't.component_id = salary_component.id')
                                ->where('emp_id=:id AND salary_component.type=:type AND DATE_FORMAT( effect_date,  "%Y-%m" ) =:currdate', array(':id' => $user->id, ':type' => 1, ':currdate' => $curent))
                                ->queryRow();
                        ?>
                        <?php echo $total_payped['total_score'] - $total_deduction['total_score']; ?>
                    </th>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</body></html>