<?php
/* @var $this UserFeedbackController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'User Feedbacks',
);

$this->menu=array(
	array('label'=>'Create UserFeedback', 'url'=>array('create')),
	array('label'=>'Manage UserFeedback', 'url'=>array('admin')),
);
?>

<h1>User Feedbacks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
