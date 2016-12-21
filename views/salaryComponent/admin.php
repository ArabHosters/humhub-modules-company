<?php
/* @var $this SalaryComponentController */
/* @var $model SalaryComponent */

$this->breadcrumbs = array(
    'Salary Components' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Salary Component', 'url' => array('index')),
    array('label' => 'Create Salary Component', 'url' => array('create')),
);
?>

<h1>Manage Salary Components</h1>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'salary-component-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'itemsCssClass' => 'table table-hover',
    'columns' => array(
        'id',
        'name',
        array(
            'name' => 'type',
            'value' => '($data->type == 0) ? "Earning": "Deduction"'
        ),
        array(
            'name' => 'total_paypal',
            'value' => '($data->total_paypal == 0) ? "No": "Yes"'
        ),
        array(
            'name' => 'recurring',
            'value' => '($data->recurring == 0) ? "No": "Yes"'
        ),
        /*
          'percentage',
         */
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
                        'data-original-title' => 'View Component',
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
                        'data-original-title' => 'Edit Component',
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
                        'data-original-title' => 'Delete Component',
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
