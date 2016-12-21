<?php
/* @var $this LeaveTypesController */
/* @var $model LeaveTypes */

$this->breadcrumbs=array(
	'Leave Types'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List LeaveTypes', 'url'=>array('index')),
	array('label'=>'Create LeaveTypes', 'url'=>array('create')),
	array('label'=>'View LeaveTypes', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Update LeaveTypes <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>