<?php
/* @var $this EmployeeLanguagesController */
/* @var $model EmployeeLanguages */

$this->breadcrumbs=array(
	'Employee Languages'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List EmployeeLanguages', 'url'=>array('index')),
	array('label'=>'Create EmployeeLanguages', 'url'=>array('create')),
	array('label'=>'Update EmployeeLanguages', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete EmployeeLanguages', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?','csrf'=>true)),
);
?>

<h1>View EmployeeLanguages #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'language_id',
		'employee',
		'reading',
		'speaking',
		'writing',
		'understanding',
	),
)); ?>
