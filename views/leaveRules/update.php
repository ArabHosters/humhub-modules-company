<?php
/* @var $this LeaveRulesController */
/* @var $model LeaveRules */

$this->breadcrumbs=array(
	'Leave Rules'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List LeaveRules', 'url'=>array('index')),
	array('label'=>'Create LeaveRules', 'url'=>array('create')),
	array('label'=>'View LeaveRules', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Update LeaveRules <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>