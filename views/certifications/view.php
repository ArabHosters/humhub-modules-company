<?php
/* @var $this CertificationsController */
/* @var $model Certifications */

$this->breadcrumbs=array(
	'Certifications'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Certifications', 'url'=>array('index')),
	array('label'=>'Create Certifications', 'url'=>array('create')),
	array('label'=>'Update Certifications', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Certifications', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?','csrf'=>true)),
);
?>

<h1>View Certifications #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
	),
)); ?>
