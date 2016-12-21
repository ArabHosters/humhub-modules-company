<?php
/* @var $this EmployeeLeavesController */
/* @var $model EmployeeLeaves */

$this->breadcrumbs = array(
    'Employee Leaves' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'List Employee Leaves', 'url' => array('index')),
    array('label' => 'Update Employee Leaves', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Employee Leaves', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?','csrf'=>true)),
);
?>

<h1>View Employee Leaves #<?php echo $model->id; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'employee',
        'leave_type',
        'leave_period',
        'date_start',
        'date_end',
        'details',
        'status',
        'attachment',
    ),
));
?>
