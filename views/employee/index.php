<div class="panel panel-default">
    <div
        class="panel-heading">Subordinates</div>

    <div class="panel-body">

        <?php
        $this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'job-titles-grid',
            'dataProvider' => $user->subordinates(),
            'itemsCssClass' => 'table table-hover',
            'columns' => array(
                'id',
                'displayName',
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