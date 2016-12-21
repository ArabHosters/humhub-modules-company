<?php
/* @var $this UserFeedbackController */
/* @var $model UserFeedback */

$this->breadcrumbs=array(
	'User Feedbacks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UserFeedback', 'url'=>array('index')),
	array('label'=>'Manage UserFeedback', 'url'=>array('admin')),
);
?>

<h1>Create UserFeedback</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>