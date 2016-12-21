<?php
/* @var $this LoansController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Employee Loans',
);

$this->menu=array(
	array('label'=>'Create EmployeeLoan', 'url'=>array('create')),
	array('label'=>'Manage EmployeeLoan', 'url'=>array('admin')),
);
?>

<h1>Employee Loans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
