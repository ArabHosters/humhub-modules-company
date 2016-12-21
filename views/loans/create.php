<?php
/* @var $this LoansController */
/* @var $model EmployeeLoan */

$this->breadcrumbs=array(
	'Employee Loans'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EmployeeLoan', 'url'=>array('index')),
	array('label'=>'Manage EmployeeLoan', 'url'=>array('admin')),
);
?>

<div class="panel panel-default">
    <div class="panel-heading">
        Create EmployeeLoan
    </div>
    <div class="panel-body">
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
</div>