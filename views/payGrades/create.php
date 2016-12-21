<?php
/* @var $this PayGradesController */
/* @var $model PayGrades */

$this->breadcrumbs=array(
	'Pay Grades'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PayGrades', 'url'=>array('index')),
);
?>

<h1>Create PayGrades</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>