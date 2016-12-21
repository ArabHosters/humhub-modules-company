<?php
/* @var $this SalaryComponentController */
/* @var $model SalaryComponent */

$this->breadcrumbs = array(
    'Salary Components' => array('index'),
    $model->name,
);

$this->menu = array(
    array('label' => 'List SalaryComponent', 'url' => array('index')),
    array('label' => 'Create SalaryComponent', 'url' => array('create')),
    array('label' => 'Update SalaryComponent', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete SalaryComponent', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?','csrf'=>true)),
);
?>

<h1>View Salary Component #<?php echo $model->id; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'name',
        array(
            'name' => 'type',
            'value' => ($model->type == 0) ? "Earning": "Deduction"
        ),
        array(
            'name' => 'total_paypal',
            'value' => ($model->total_paypal == 0) ? "No": "Yes"
        ),
        array(
            'name' => 'company_cost',
            'value' => ($model->company_cost == 0) ? "No": "Yes"
        ),
        array(
            'name' => 'amout',
            'value' => ($model->amout == 0) ? "No": "Yes"
        ),
        array(
            'name' => 'percentage',
            'value' => ($model->percentage == 0) ? "No": "Yes"
        ),
        array(
            'name' => 'recurring',
            'value' => ($model->recurring == 0) ? "No": "Yes"
        ),
    ),
));
?>
