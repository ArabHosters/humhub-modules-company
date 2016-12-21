<?php
/* @var $this EmployeeSkillsController */
/* @var $model EmployeeSkills */

$this->breadcrumbs=array(
	'Employee Skills'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List EmployeeSkills', 'url'=>array('index')),
	array('label'=>'Create EmployeeSkills', 'url'=>array('create')),
	array('label'=>'Update EmployeeSkills', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete EmployeeSkills', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?','csrf'=>true)),
);
?>

<h1>View EmployeeSkills #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'skill_id',
		'employee',
		'details',
	),
)); ?>
