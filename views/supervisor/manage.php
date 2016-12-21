<div class="panel-heading">
    Manage Subordinates
</div>
<div class="panel-body">
    <?php
    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'job-titles-grid',
        'dataProvider' => $user->subordinates(),
        'itemsCssClass' => 'table table-hover',
        'columns' => array(
            'id',
            'displayName',
            array(
                'class' => 'CButtonColumn',
                'template' => '{view}',
                'htmlOptions' => array('width' => '90px'),
                'viewButtonUrl' => 'Yii::app()->createUrl("//company/supervisor/report", array("id" => $data->id,"uguid"=>$data->guid));',
                'updateButtonUrl' => 'Yii::app()->createUrl("//company/entry/changeStatus", array("id" => $data->id,"uguid"=>$data->guid));',
                'deleteButtonUrl' => 'Yii::app()->createUrl("//company/entry/delete", array("id" => $data->id,"uguid"=>$data->guid));',
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
//                    'update' => array
//                        (
//                        'label' => '<i class="fa fa-pencil"></i>',
//                        'imageUrl' => false,
//                        'options' => array(
//                            'style' => 'margin-right: 3px',
//                            'class' => 'btn btn-primary btn-xs tt',
//                            'data-toggle' => 'tooltip',
//                            'data-placement' => 'top',
//                            'title' => '',
//                            'data-original-title' => 'Change Leave Status',
//                        ),
//                    ),
//                    'delete' => array
//                        (
//                        'label' => '<i class="fa fa-times"></i>',
//                        'imageUrl' => false,
//                        'options' => array(
//                            'class' => 'btn btn-danger btn-xs tt',
//                            'data-toggle' => 'tooltip',
//                            'data-placement' => 'top',
//                            'title' => '',
//                            'data-original-title' => 'Cancel Leave',
//                        ),
//                    ),
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
</div>