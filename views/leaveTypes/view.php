<?php
/* @var $this LeaveTypesController */
/* @var $model LeaveTypes */

$this->breadcrumbs=array(
	'Leave Types'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List LeaveTypes', 'url'=>array('index')),
	array('label'=>'Create LeaveTypes', 'url'=>array('create')),
	array('label'=>'Update LeaveTypes', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete LeaveTypes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?','csrf'=>true)),
);
?>

<h1>View Leave Type #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'supervisor_leave_assign',
		'employee_can_apply',
		'apply_beyond_current',
		'leave_accrue',
		'carried_forward',
		'default_per_year',
		'carried_forward_percentage',
		'carried_forward_leave_availability',
		'propotionate_on_joined_date',
	),
)); ?>
