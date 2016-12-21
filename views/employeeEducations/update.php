<?php
/* @var $this EmployeeEducationsController */
/* @var $model EmployeeEducations */

$this->breadcrumbs=array(
	'Employee Educations'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List EmployeeEducations', 'url'=>array('index')),
	array('label'=>'Create EmployeeEducations', 'url'=>array('create')),
);
?>

<h1>Update EmployeeEducations <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>