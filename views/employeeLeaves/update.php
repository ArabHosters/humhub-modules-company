<?php
/* @var $this EmployeeLeavesController */
/* @var $model EmployeeLeaves */

$this->breadcrumbs=array(
	'Employee Leaves'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Employee Leaves', 'url'=>array('index')),
	array('label'=>'View Employee Leaves', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Update Employee Leaves <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>