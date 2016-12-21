<?php
/* @var $this EmployeeLanguagesController */
/* @var $model EmployeeLanguages */

$this->breadcrumbs=array(
	'Employee Languages'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EmployeeLanguages', 'url'=>array('index')),
);
?>

<h1>Create EmployeeLanguages</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>