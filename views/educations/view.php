<?php
/* @var $this EducationsController */
/* @var $model Educations */

$this->breadcrumbs=array(
	'Educations'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Educations', 'url'=>array('index')),
	array('label'=>'Create Educations', 'url'=>array('create')),
	array('label'=>'Update Educations', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Educations', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?','csrf'=>true)),
);
?>

<h1>View Educations #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
	),
)); ?>
