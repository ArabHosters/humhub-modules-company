<?php
/* @var $this CompanyStructuresController */
/* @var $model CompanyStructures */

$this->breadcrumbs=array(
	'Company Structures'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Company Structures', 'url'=>array('index')),
	array('label'=>'Create Company Structures', 'url'=>array('create')),
	array('label'=>'View Company Structures', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>Update Company Structures <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>