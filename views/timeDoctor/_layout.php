<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>Filter</strong> Work Log                </div>
                <div class="panel-body">
                    <?php
                    $form = $this->beginWidget('CActiveForm', array(
                        'action' => Yii::app()->createUrl($this->route),
                        'method' => 'get',
                        'id' => 'filter-form'
                    ));
                    ?>
                    <?php if (Yii::app()->user->isAdmin()): ?>
                    <div class="form-group">
                    <?php
                    $this->widget('booster.widgets.TbSelect2', array(
                        'name' => 'owner_id',
                        'data' => CHtml::listData(User::model()->findAll(), 'id', 'displayName'),
                        'htmlOptions' => array(
                            'empty' => 'Select User'
                        ),
                            )
                    );
                    ?>
                </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <div class="input-group date" id="datepicker2">
                            <?php
                            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                'options' => array(
                                    'showAnim' => 'fold',
                                ),
                                'name' => 'start_date',
                                'htmlOptions' => array(
                                    'class' => 'form-control',
                                    'placeholder' => 'From Date'
                                ),
                                'options' => array(
                                    'dateFormat' => 'yy-mm-dd',
                                    'showButtonPanel' => true,
                                    'changeMonth' => true,
                                    'changeYear' => true,
                                ),
                            ));
                            ?>
                            <span class="input-group-addon"><i class="fa fa-th"></i></span>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="input-group date" id="datepicker2">
                            <?php
                            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                'options' => array(
                                    'showAnim' => 'fold',
                                ),
                                'name' => 'end_date',
                                'htmlOptions' => array(
                                    'class' => 'form-control',
                                    'placeholder' => 'To Date'
                                ),
                                'options' => array(
                                    'dateFormat' => 'yy-mm-dd',
                                    'showButtonPanel' => true,
                                    'changeMonth' => true,
                                    'changeYear' => true,
                                ),
                            ));
                            ?>
                            <span class="input-group-addon"><i class="fa fa-th"></i></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Submit" class="btn btn-primary" />
                    </div>
                    <?php $this->endWidget(); ?>
                </div>
            </div>
        </div>
        <div class="col-md-10">
            <div class="panel panel-default">
                <?php echo $content; ?>
            </div>
        </div>
    </div>
</div>
