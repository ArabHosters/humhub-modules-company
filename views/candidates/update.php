<?php
/* @var $this CandidatesController */
/* @var $model Candidates */

$this->breadcrumbs=array(
	'Candidates'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Candidates', 'url'=>array('index')),
	array('label'=>'Create Candidates', 'url'=>array('create')),
	array('label'=>'View Candidates', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Update Candidates <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>