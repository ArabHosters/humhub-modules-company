<?php
/* @var $this CandidatesController */
/* @var $model Candidates */

$this->breadcrumbs=array(
	'Candidates'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Candidates', 'url'=>array('index')),
);
?>

<h1>Create Candidates</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>