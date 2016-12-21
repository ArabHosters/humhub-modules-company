<?php
/* @var $this EmploymentStatusController */
/* @var $model EmploymentStatus */

$this->breadcrumbs=array(
	'Employment Statuses'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List EmploymentStatus', 'url'=>array('index')),
	array('label'=>'Create EmploymentStatus', 'url'=>array('create')),
	array('label'=>'Update EmploymentStatus', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete EmploymentStatus', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?','csrf'=>true)),
);
?>

<h1>View Employment Status #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
	),
)); ?>
