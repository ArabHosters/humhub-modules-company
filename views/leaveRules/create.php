<?php
/* @var $this LeaveRulesController */
/* @var $model LeaveRules */

$this->breadcrumbs=array(
	'Leave Rules'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List LeaveRules', 'url'=>array('index')),
);
?>

<h1>Create LeaveRules</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>