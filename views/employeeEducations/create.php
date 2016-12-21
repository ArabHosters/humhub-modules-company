<?php
/* @var $this EmployeeEducationsController */
/* @var $model EmployeeEducations */

$this->breadcrumbs=array(
	'Employee Educations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EmployeeEducations', 'url'=>array('index')),
);
?>

<h1>Create EmployeeEducations</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>