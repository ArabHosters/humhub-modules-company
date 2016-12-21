<?php
/* @var $this EmployeeLeavesController */
/* @var $model EmployeeLeaves */

$this->breadcrumbs=array(
	'Employee Leaves'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EmployeeLeaves', 'url'=>array('index')),
);
?>

<h1>Create Employee Leaves</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>