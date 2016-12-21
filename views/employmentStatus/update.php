<?php
/* @var $this EmploymentStatusController */
/* @var $model EmploymentStatus */

$this->breadcrumbs=array(
	'Employment Statuses'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List EmploymentStatus', 'url'=>array('index')),
	array('label'=>'Create EmploymentStatus', 'url'=>array('create')),
	array('label'=>'View EmploymentStatus', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Update Employment Status <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>