<?php
/* @var $this EducationsController */
/* @var $model Educations */

$this->breadcrumbs=array(
	'Educations'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Educations', 'url'=>array('index')),
	array('label'=>'Create Educations', 'url'=>array('create')),
	array('label'=>'View Educations', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Update Educations <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>