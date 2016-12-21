<?php
/* @var $this EmployeeLanguagesController */
/* @var $model EmployeeLanguages */

$this->breadcrumbs=array(
	'Employee Languages'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List EmployeeLanguages', 'url'=>array('index')),
	array('label'=>'Create EmployeeLanguages', 'url'=>array('create')),
	array('label'=>'View EmployeeLanguages', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Update EmployeeLanguages <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>