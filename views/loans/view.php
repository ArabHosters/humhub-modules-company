<?php
/* @var $this LoansController */
/* @var $model EmployeeLoan */

$this->breadcrumbs=array(
	'Employee Loans'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List EmployeeLoan', 'url'=>array('index')),
	array('label'=>'Create EmployeeLoan', 'url'=>array('create')),
	array('label'=>'Update EmployeeLoan', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete EmployeeLoan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EmployeeLoan', 'url'=>array('admin')),
);
?>

<div class="panel panel-default">
    <div class="panel-heading">
        View Employee Loan
    </div>
    <div class="panel-body">

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'amount',
		'loan_date',
		'repay_date',
		'repay_amount',
		'note',
		'status',
	),
)); ?>
</div>
</div>