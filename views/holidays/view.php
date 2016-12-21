<?php
/* @var $this HolidaysController */
/* @var $model Holidays */

$this->breadcrumbs=array(
	'Holidays'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Holidays', 'url'=>array('index')),
	array('label'=>'Create Holidays', 'url'=>array('create')),
	array('label'=>'Update Holidays', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Holidays', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?','csrf'=>true)),
);
?>

<h1>View Holidays #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'dateh',
		'status',
	),
)); ?>
