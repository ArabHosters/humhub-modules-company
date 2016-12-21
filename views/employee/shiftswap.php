<div class="panel panel-default">
    <div
        class="panel-heading">Shift Swap Requests</div>

    <div class="panel-body">

        <?php
        $this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'job-titles-grid',
            'dataProvider' => $user->shiftswaps(),
            'itemsCssClass' => 'table table-hover',
            'columns' => array(
                'id',
                'status',
                'date_start',
                'date_end',
//                array(
//                    'class' => 'CButtonColumn',
//                    'template' => '{delete}',
//                    'htmlOptions' => array('width' => '90px'),
//                    'buttons' => array
//                        (
//                        'delete' => array
//                            (
//                            'label' => '<i class="fa fa-times"></i>',
//                            'imageUrl' => false,
//                            'options' => array(
//                                'class' => 'btn btn-danger btn-xs tt',
//                                'data-toggle' => 'tooltip',
//                                'data-placement' => 'top',
//                                'title' => '',
//                                'data-original-title' => 'Cancel Swap',
//                            ),
//                        ),
//                    ),
//                ),
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
</div>