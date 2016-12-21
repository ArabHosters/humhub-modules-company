<?php
/* @var $this SalaryComponentController */
/* @var $model SalaryComponent */

$this->breadcrumbs=array(
	'Salary Components'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SalaryComponent', 'url'=>array('index')),
);
?>

<h1>Create Salary Component</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>