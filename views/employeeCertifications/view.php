<?php
/* @var $this EmployeeCertificationsController */
/* @var $model EmployeeCertifications */

$this->breadcrumbs=array(
	'Employee Certifications'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List EmployeeCertifications', 'url'=>array('index')),
	array('label'=>'Create EmployeeCertifications', 'url'=>array('create')),
	array('label'=>'Update EmployeeCertifications', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete EmployeeCertifications', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?','csrf'=>true)),
);
?>

<h1>View EmployeeCertifications #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'certification_id',
		'employee',
		'institute',
		'date_start',
		'date_end',
	),
)); ?>
