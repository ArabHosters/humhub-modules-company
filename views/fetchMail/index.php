<div class="panel-heading">
    Transactions
</div>
<div class="panel-body">
    <?php
    echo CHtml::link('Check New Transactions', $this->createUrl('//company/fetchMail/grap'), array('class' => 'btn btn-primary', 'data-toggle' => 'modal', 'data-target' => '#globalModal'));
    ?>
    <?php
    $review_visible = Yii::app()->user->canReviewMail() ? 'true' : 'false';
    $view_visible = Yii::app()->user->canCheckReview() ? 'true' : 'false';

    $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'mail-grid',
        'dataProvider' => $model->search(),
        'itemsCssClass' => 'table table-hover',
        'columns' => array(
            'id',
            'bank',
            'amount',
            'time',
            'approved:boolean',
            array(
                'class' => 'CButtonColumn',
                'template' => '{view}{delete}',
                'htmlOptions' => array('width' => '90px'),
                'viewButtonUrl' => 'Yii::app()->createUrl("//company/fetchMail/show", array("id" => $data->id));',
                'deleteConfirmation' => 'Are you sure you want to archive this item?',
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
                            'data-original-title' => 'Review Entry',
                        ),
                    ),
                    'delete' => array
                        (
                        'label' => '<i class="fa fa-inbox"></i>',
                        'imageUrl' => false,
                        'options' => array(
                            'class' => 'btn btn-danger btn-xs tt',
                            'data-toggle' => 'tooltip',
                            'data-placement' => 'top',
                            'title' => '',
                            'data-original-title' => 'Archive Entry',
                        ),
                        'visible' => $review_visible,
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