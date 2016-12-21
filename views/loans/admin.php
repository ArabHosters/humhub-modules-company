<div class="panel panel-default">
    <div class="panel-heading">
        Manage Employee Loans
    </div>
    <div class="panel-body">
        <?php
        $this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'employee-loan-grid',
            'dataProvider' => $model->search(),
            'filter' => $model,
            'itemsCssClass' => 'table table-hover',
            'columns' => array(
                'id',
                'user.displayName',
                'amount',
                'loan_date',
                'repay_date',
                'repay_amount',
                'status',
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

    </div>
</div>