<?php
/* @var $this VacancyController */
/* @var $model Vacancy */

$this->breadcrumbs = array(
    'Vacancies' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Vacancy', 'url' => array('index')),
    array('label' => 'Create Vacancy', 'url' => array('create')),
);
?>

<h1>Manage Vacancies</h1>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'vacancy-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'itemsCssClass' => 'table table-hover',
    'columns' => array(
        'id',
        'name',
        array(
            'header' => 'Company',
            'name' => 'company.title',
        ),
        array(
            'header' => 'Department',
            'name' => 'department.title',
        ),
        array(
            'header' => 'Hiring Manager',
            'name' => 'manager.displayName',
        ),
        'num_of_pos',
        /*
          'posting_details',
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
                        'data-original-title' => 'View Vacancy',
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
                        'data-original-title' => 'Edit Vacancy',
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
                        'data-original-title' => 'Delete Vacancy',
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
