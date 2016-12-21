<?php
/* @var $this PayGradesController */
/* @var $model PayGrades */

$this->breadcrumbs=array(
	'Pay Grades'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PayGrades', 'url'=>array('index')),
	array('label'=>'Create PayGrades', 'url'=>array('create')),
	array('label'=>'View PayGrades', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Update PayGrades <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>