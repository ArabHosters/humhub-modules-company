<?php
/* @var $this LeaveTypesController */
/* @var $model LeaveTypes */

$this->breadcrumbs=array(
	'Leave Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List LeaveTypes', 'url'=>array('index')),
);
?>

<h1>Create LeaveTypes</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>