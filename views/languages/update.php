<?php
/* @var $this LanguagesController */
/* @var $model Languages */

$this->breadcrumbs=array(
	'Languages'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Languages', 'url'=>array('index')),
	array('label'=>'Create Languages', 'url'=>array('create')),
	array('label'=>'View Languages', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Update Languages <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>