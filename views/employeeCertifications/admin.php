<?php
/* @var $this EmployeeCertificationsController */
/* @var $model EmployeeCertifications */

$this->breadcrumbs = array(
    'Employee Certifications' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Employee Certifications', 'url' => array('index')),
    array('label' => 'Create Employee Certifications', 'url' => array('create')),
);
?>

<div class="panel-heading">
    Manage Employee Certifications
</div>
<div class="panel-body">

    <?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'employee-certifications-grid',
        'dataProvider' => $model->search(),
        'itemsCssClass' => 'table table-hover',
        'filter' => $model,
        'columns' => array(
            'id',
            'certification_id',
            'employee',
            'institute',
            'date_start',
            'date_end',
            array(
                'class' => 'CButtonColumn',
                'template' => '{view}{update}{delete}',
                'htmlOptions' => array('width' => '90px'),
                'buttons' => array
                    (
                    'view' => array
                        (
                        'label' => '<i class="fa fa-eye"></i>',
                        'imageUrl' => false,
                        'options' => array(
                            'style' => 'margin-right: 3px',
                            'class' => 'btn btn-primary btn-xs tt',
                            'data-toggle' => 'tooltip',
                            'data-placement' => 'top',
                            'title' => '',
                            'data-original-title' => 'View Holiday',
                        ),
                    ),
                    'update' => array
                        (
                        'label' => '<i class="fa fa-pencil"></i>',
                        'imageUrl' => false,
                        'options' => array(
                            'style' => 'margin-right: 3px',
                            'class' => 'btn btn-primary btn-xs tt',
                            'data-toggle' => 'tooltip',
                            'data-placement' => 'top',
                            'title' => '',
                            'data-original-title' => 'Edit Holiday',
                        ),
                    ),
                    'delete' => array
                        (
                        'label' => '<i class="fa fa-times"></i>',
                        'imageUrl' => false,
                        'options' => array(
                            'class' => 'btn btn-danger btn-xs tt',
                            'data-toggle' => 'tooltip',
                            'data-placement' => 'top',
                            'title' => '',
                            'data-original-title' => 'Delete Holiday',
                        ),
                    ),
                ),
            ),
        ),
        'pager' => array(
            'class' => 'CLinkPager',
            'maxButtonCount' => 5,
            'nextPageLabel' => '<i class="fa fa-step-forward"></i>',
            'prevPageLabel' => '<i class="fa fa-step-backward"></i>',
            'firstPageLabel' => '<i class="fa fa-fast-backward"></i>',
            'lastPageLabel' => '<i class="fa fa-fast-forward"></i>',
            'header' => '',
            'htmlOptions' => array('class' => 'pagination'),
        ),
        'pagerCssClass' => 'pagination-container',
    ));
    ?>
</div>