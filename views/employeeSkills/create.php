<?php
/* @var $this EmployeeSkillsController */
/* @var $model EmployeeSkills */

$this->breadcrumbs=array(
	'Employee Skills'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EmployeeSkills', 'url'=>array('index')),
);
?>

<h1>Create EmployeeSkills</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>