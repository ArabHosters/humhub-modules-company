<?php
/* @var $this PayGradesController */
/* @var $model PayGrades */

$this->breadcrumbs=array(
	'Pay Grades'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List PayGrades', 'url'=>array('index')),
	array('label'=>'Create PayGrades', 'url'=>array('create')),
	array('label'=>'Update PayGrades', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PayGrades', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?','csrf'=>true)),
);
?>

<h1>View PayGrades #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'currency',
		'min_salary',
		'max_salary',
	),
)); ?>
