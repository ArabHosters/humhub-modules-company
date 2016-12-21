<?php
/* @var $this EducationsController */
/* @var $model Educations */

$this->breadcrumbs=array(
	'Educations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Educations', 'url'=>array('index')),
);
?>

<h1>Create Educations</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>