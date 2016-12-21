<?php
/* @var $this CertificationsController */
/* @var $model Certifications */

$this->breadcrumbs=array(
	'Certifications'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Certifications', 'url'=>array('index')),
	array('label'=>'Create Certifications', 'url'=>array('create')),
	array('label'=>'View Certifications', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Update Certifications <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>