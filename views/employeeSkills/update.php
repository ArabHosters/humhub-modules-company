<?php
/* @var $this EmployeeSkillsController */
/* @var $model EmployeeSkills */

$this->breadcrumbs=array(
	'Employee Skills'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List EmployeeSkills', 'url'=>array('index')),
	array('label'=>'Create EmployeeSkills', 'url'=>array('create')),
	array('label'=>'View EmployeeSkills', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Update EmployeeSkills <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>