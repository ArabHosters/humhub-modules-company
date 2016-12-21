<?php
/* @var $this JobTitlesController */
/* @var $model JobTitles */

$this->breadcrumbs=array(
	'Job Titles'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Job Titles', 'url'=>array('index')),
	array('label'=>'Create Job Titles', 'url'=>array('create')),
	array('label'=>'View Job Titles', 'url'=>array('view', 'id'=>$model->id)),
 );
?>

<h1>Update Job Titles <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>