<?php
/* @var $this SalaryComponentController */
/* @var $model SalaryComponent */

$this->breadcrumbs=array(
	'Salary Components'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SalaryComponent', 'url'=>array('index')),
	array('label'=>'Create SalaryComponent', 'url'=>array('create')),
	array('label'=>'View SalaryComponent', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Update Salary Component <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>