<h1>Manage Attendance</h1>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'employee-attendance-grid',
    'dataProvider' => $model->searchEdited(),
    'filter' => $model,
    'itemsCssClass' => 'table table-hover',
    'columns' => array(
        array(
            'name' => 'id',
            'htmlOptions' => array('width' => 20),
        ),
        array(
            'name' => 'ownerUsernameSearch',
            'filter' => CHtml::activeTextField($model, 'ownerUsernameSearch'),
            'value' => function ($data, $row) {
        if (!$data->owner)
            return "-";

        return $data->owner->username;
    }
        ),
        'reason',
        array(
            'name' => 'status',
            'filter' => array('Pending' => 'Pending', 'Approved' => 'Approved', 'Rejected' => 'Rejected'),
        ),
        array(
            'class' => 'CButtonColumn',
            'template' => '{view}{delete}',
            'htmlOptions' => array('width' => '90px'),
            'viewButtonUrl' => 'Yii::app()->createUrl("//company/attendenace/editAttendance", array("id" => $data->id));',
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
                        'data-original-title' => 'Review',
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