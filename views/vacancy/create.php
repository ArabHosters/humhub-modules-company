<?php
/* @var $this VacancyController */
/* @var $model Vacancy */

$this->breadcrumbs=array(
	'Vacancies'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Vacancy', 'url'=>array('index')),
);
?>

<h1>Create Vacancy</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>