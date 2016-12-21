<?php
/* @var $this LeavePeriodsController */
/* @var $model LeavePeriods */

$this->breadcrumbs=array(
	'Leave Periods'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List LeavePeriods', 'url'=>array('index')),
	array('label'=>'Create LeavePeriods', 'url'=>array('create')),
	array('label'=>'Update LeavePeriods', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete LeavePeriods', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?','csrf'=>true)),
);
?>

<h1>View LeavePeriods #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'date_start',
		'date_end',
		'status',
	),
)); ?>
