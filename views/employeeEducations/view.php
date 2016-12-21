<?php
/* @var $this EmployeeEducationsController */
/* @var $model EmployeeEducations */

$this->breadcrumbs=array(
	'Employee Educations'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List EmployeeEducations', 'url'=>array('index')),
	array('label'=>'Create EmployeeEducations', 'url'=>array('create')),
	array('label'=>'Update EmployeeEducations', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete EmployeeEducations', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?','csrf'=>true)),
);
?>

<h1>View EmployeeEducations #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'education_id',
		'employee',
		'institute',
		'date_start',
		'date_end',
	),
)); ?>
