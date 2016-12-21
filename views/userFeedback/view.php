<?php
/* @var $this UserFeedbackController */
/* @var $model UserFeedback */

$this->breadcrumbs=array(
	'User Feedbacks'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List UserFeedback', 'url'=>array('index')),
	array('label'=>'Create UserFeedback', 'url'=>array('create')),
	array('label'=>'Update UserFeedback', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete UserFeedback', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UserFeedback', 'url'=>array('admin')),
);
?>

<h1>View UserFeedback #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'feedback_comment',
		'feedback_details',
	),
)); ?>
