<?php
/* @var $this EmployeeCertificationsController */
/* @var $model EmployeeCertifications */

$this->breadcrumbs=array(
	'Employee Certifications'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List EmployeeCertifications', 'url'=>array('index')),
	array('label'=>'Create EmployeeCertifications', 'url'=>array('create')),
	array('label'=>'View EmployeeCertifications', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Update EmployeeCertifications <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>