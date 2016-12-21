<?php
/* @var $this EmploymentStatusController */
/* @var $model EmploymentStatus */

$this->breadcrumbs=array(
	'Employment Statuses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EmploymentStatus', 'url'=>array('index')),
);
?>

<h1>Create Employment Status</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>