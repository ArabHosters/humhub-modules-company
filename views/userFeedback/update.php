<?php
/* @var $this UserFeedbackController */
/* @var $model UserFeedback */

$this->breadcrumbs=array(
	'User Feedbacks'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UserFeedback', 'url'=>array('index')),
	array('label'=>'Create UserFeedback', 'url'=>array('create')),
	array('label'=>'View UserFeedback', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage UserFeedback', 'url'=>array('admin')),
);
?>

<h1>Update UserFeedback <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>