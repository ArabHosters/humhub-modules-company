<?php
/* @var $this LeaveRulesController */
/* @var $model LeaveRules */

$this->breadcrumbs=array(
	'Leave Rules'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List LeaveRules', 'url'=>array('index')),
	array('label'=>'Create LeaveRules', 'url'=>array('create')),
	array('label'=>'Update LeaveRules', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete LeaveRules', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?','csrf'=>true)),
);
?>

<h1>View LeaveRules #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'leave_type',
		'job_title',
		'employment_status',
		'employee',
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
