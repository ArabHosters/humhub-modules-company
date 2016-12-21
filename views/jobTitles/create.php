<?php
/* @var $this JobTitlesController */
/* @var $model JobTitles */

$this->breadcrumbs=array(
	'Job Titles'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List JobTitles', 'url'=>array('index')),
);
?>

<h1>Create Job Titles</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>