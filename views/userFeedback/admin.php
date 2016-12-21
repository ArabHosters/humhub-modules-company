<?php
/* @var $this UserFeedbackController */
/* @var $model UserFeedback */

$this->breadcrumbs = array(
    'User Feedbacks' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List UserFeedback', 'url' => array('index')),
    array('label' => 'Create UserFeedback', 'url' => array('create')),
);
?>

<h1>Manage User Feedbacks</h1>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'user-feedback-grid',
    'dataProvider' => $model->search(),
    'itemsCssClass' => 'table table-hover',
    'columns' => array(
        'id',
        'user.displayName',
        'feedback_comment',
        array(
            'class' => 'CButtonColumn',
            'template' => '{view}{delete}',
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
                        'data-original-title' => 'View',
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
                        'data-original-title' => 'Edit',
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
                        'data-original-title' => 'Delete',
                    ),
                ),
            ),
        ),
    ),
));
?>
