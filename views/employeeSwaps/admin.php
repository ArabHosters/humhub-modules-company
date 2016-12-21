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
    //'filter' => $model,
    'itemsCssClass' => 'table table-hover',
    'columns' => array(
        array(
            'name' => 'id',
            'htmlOptions' => array('width' => 20),
        ),
        array(
            'header'=>'User',
            'name'=>'user.displayName'
        ),
        array(
            'header'=>'Swap With',
            'name'=>'userswaped.displayName'
        ),
        'status',
        array(
            'class' => 'CButtonColumn',
            'template' => '{update}',
            'htmlOptions' => array('width' => '90px'),
            'updateButtonUrl' => 'Yii::app()->createUrl("//company/entry/changeSwapStatus", array("id" => $data->id,"uguid"=>$data->user->guid));',
            'buttons' => array
                (
                'update' => array
                    (
                    'label' => '<i class="fa fa-pencil"></i>',
                    'imageUrl' => false,
                        'click' => 'function() {$("#globalModal").modal({show: "true",remote: $(this).attr("href")});return false;}',
                    'options' => array(
                        'style' => 'margin-right: 3px',
                        'class' => 'btn btn-primary btn-xs tt',
                        'data-toggle' => 'tooltip',
                        'data-placement' => 'top',
                        'title' => '',
                        'data-original-title' => 'Change Swap Status',
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
