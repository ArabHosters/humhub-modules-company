<?php
/* @var $this EmployeeCertificationsController */
/* @var $model EmployeeCertifications */

$this->breadcrumbs = array(
    'Employee Certifications' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'List Employee Certifications', 'url' => array('index')),
);
?>
<div class="panel-heading">
    Create Employee Certifications
</div>

<?php $this->renderPartial('_form', array('model' => $model)); ?>