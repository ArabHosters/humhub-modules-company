<?php
/* @var $this SkillsController */
/* @var $model Skills */

$this->breadcrumbs=array(
	'Skills'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Skills', 'url'=>array('index')),
	array('label'=>'Create Skills', 'url'=>array('create')),
	array('label'=>'Update Skills', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Skills', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?','csrf'=>true)),
);
?>

<h1>View Skills #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
	),
)); ?>
