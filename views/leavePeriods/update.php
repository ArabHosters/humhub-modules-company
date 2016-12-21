<?php
/* @var $this LeavePeriodsController */
/* @var $model LeavePeriods */

$this->breadcrumbs=array(
	'Leave Periods'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List LeavePeriods', 'url'=>array('index')),
	array('label'=>'Create LeavePeriods', 'url'=>array('create')),
	array('label'=>'View LeavePeriods', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Update LeavePeriods <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>