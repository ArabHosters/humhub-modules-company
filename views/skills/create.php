<?php
/* @var $this SkillsController */
/* @var $model Skills */

$this->breadcrumbs=array(
	'Skills'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Skills', 'url'=>array('index')),
);
?>

<h1>Create Skills</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>