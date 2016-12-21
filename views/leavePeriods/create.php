<?php
/* @var $this LeavePeriodsController */
/* @var $model LeavePeriods */

$this->breadcrumbs=array(
	'Leave Periods'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List LeavePeriods', 'url'=>array('index')),
);
?>

<h1>Create LeavePeriods</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>