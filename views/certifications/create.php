<?php
/* @var $this CertificationsController */
/* @var $model Certifications */

$this->breadcrumbs=array(
	'Certifications'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Certifications', 'url'=>array('index')),
);
?>

<h1>Create Certifications</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>