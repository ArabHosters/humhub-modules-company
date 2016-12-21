<?php
/* @var $this EmployeeLeavesController */
/* @var $model EmployeeLeaves */

$this->breadcrumbs = array(
    'Employee Leaves' => array('index'),
    'Manage',
);
?>

<h1>Manage Employee Leaves</h1>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'employee-leaves-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'itemsCssClass' => 'table table-hover',
    'columns' => array(
        array(
            'name' => 'id',
            'htmlOptions' => array('width' => 20),
        ),
        array(
            'name' => 'ownerUsernameSearch',
            'type' => 'raw',
            'filter' => CHtml::activeTextField($model, 'ownerUsernameSearch', array('placeholder' => 'Search for Employee')),
            'value' => '$data->user->username'
        ),
        'leaveType.name',
        array(// display 'create_time' using an expression
            'name' => 'date_start',
            'value' => 'date("M j, Y", strtotime($data->date_start))',
        ),
        array(// display 'create_time' using an expression
            'name' => 'date_end',
            'value' => 'date("M j, Y", strtotime($data->date_end))',
        ),
        'status',
        array(
            'class' => 'CButtonColumn',
            'template' => '{view}{update}{delete}',
            'htmlOptions' => array('width' => '90px'),
            'viewButtonUrl' => 'Yii::app()->createUrl("//company/entry/view", array("id" => $data->id,"uguid"=>$data->user->guid));',
            'updateButtonUrl' => 'Yii::app()->createUrl("//company/entry/changeStatus", array("id" => $data->id,"uguid"=>$data->user->guid));',
            'buttons' => array
                (
                'view' => array
                    (
                    'label' => '<i class="fa fa-eye"></i>',
                    'imageUrl' => false,
                    'click' => 'function() {$("#globalModal").modal({show: "true",remote: $(this).attr("href")});return false;}',
                    'options' => array(
                        'style' => 'margin-right: 3px',
                        'class' => 'btn btn-primary btn-xs tt',
                        'data-toggle' => 'tooltip',
                        'data-placement' => 'top',
                        'title' => '',
                        'data-original-title' => 'Show Leave Days',
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
                        'data-original-title' => 'Change Leave Status',
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
                        'data-original-title' => 'Cancel Leave',
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
<script type="text/javascript">
    $(document).ready(function() {
        $('.grid-view-loading').show();
        $('.grid-view-loading').css('display', 'block !important');
        $('.grid-view-loading').css('opacity', '1 !important');
    });

</script>