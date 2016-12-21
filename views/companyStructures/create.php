<?php
/* @var $this CompanyStructuresController */
/* @var $model CompanyStructures */

$this->breadcrumbs=array(
	'Company Structures'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CompanyStructures', 'url'=>array('index')),
);
?>

<h1>Create Company Structures</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>