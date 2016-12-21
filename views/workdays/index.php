<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/required_work_hours.css" rel="stylesheet">
<div id="results"></div>
<div id="postform-loader" class="loader loader-postform hidden">
    <div class="sk-spinner sk-spinner-three-bounce">
        <div class="sk-bounce1"></div>
        <div class="sk-bounce2"></div>
        <div class="sk-bounce3"></div>
    </div>
</div>
<?php
$month = Yii::app()->request->getQuery('month', date('m'));
$year = Yii::app()->request->getQuery('year', date('Y'));
?>
<form>
    <div class="row">
        <div class="col-md-2">
            <?php
            echo CHtml::dropDownList('month', $month, array(
                '01' => 'Jan.',
                '02' => 'Feb.',
                '03' => 'Mar.',
                '04' => 'Apr.',
                '05' => 'May',
                '06' => 'Jun.',
                '07' => 'Jul.',
                '08' => 'Aug.',
                '09' => 'Sep.',
                '10' => 'Oct.', '11' => 'Nov.', '12' => 'Dec.'), array('class' => 'form-control'));
            ?>
        </div>
        <div class="col-md-2">
            <?php
            $years = array_combine(range(date("Y"), 2020), range(date("Y"), 2020));
            echo CHtml::dropDownList('year', $year, $years, array('class' => 'form-control'));
            ?>
        </div>
        <div class="col-md-2">
            <input type="submit" value="GO" class="btn btn-info" />
        </div>
    </div>
</form>
<form id="required_work_hours" method="post">
    <input type="hidden" name="<?php echo Yii::app()->request->csrfTokenName; ?>" value="<?php echo Yii::app()->request->csrfToken; ?>" />

    <input type="hidden" name="month" value="<?php echo $month; ?>" />
    <input type="hidden" name="year" value="<?php echo $year; ?>" />
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <?php
                echo CHtml::ajaxSubmitButton('Save', $this->createUrl('saveWorkDays'), array(
                    'update' => '#results',
                    'type' => "post",
                    'beforeSend' => 'function(){ $("#postform-loader").removeClass("hidden"); }',
                    'complete' => "function(response) {
                            $('.contentForm_options .btn').show(); $('#postform-loader').addClass('hidden');
                            $('#save-form').attr('disabled', true);
                            $('#save-form').addClass('inactive')
                        }",
                        ), array('class' => 'btn btn-info inactive', 'id' => 'save-form', 'disabled' => 'disabled')
                );
                ?>
            </div>
        </div>
    </div>
    <div id="previewState">
        <?php
        $this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'user-grid',
            'dataProvider' => $model->resetScope()->search(),
            'filter' => $model,
            'rowCssClass' => array('users_details'),
            'itemsCssClass' => 'table table-hover',
            'columns' => array(
                array(
                    'value' => 'CHtml::image($data->profileImage->getUrl())',
                    'type' => 'raw',
                    'htmlOptions' => array('width' => '30px'),
                ),
                array(
                    'name' => 'username',
                    'header' => Yii::t('AdminModule.views_user_index', 'Username'),
                    'filter' => CHtml::activeTextField($model, 'username', array('placeholder' => Yii::t('AdminModule.views_user_index', 'Search for username'))),
                ),
                array(
                    'header' => 'Required Work Days',
                    'value' => function($data) {
                Yii::app()->controller->renderPartial('_weekdays', array(
                    'data' => $data
                ));
            },
                ),
                array(
                    'header' => 'Minimum Daily Hours',
                    'value' => function($data) {
                Yii::app()->controller->renderPartial('_daily_hours', array(
                    'data' => $data
                ));
            },
                ),
                array(
                    'header' => 'Break Hours',
                    'value' => function($data) {
                Yii::app()->controller->renderPartial('_break_hours', array(
                    'data' => $data
                ));
            },
                ),
                array(
                    'header' => 'Start Work Time',
                    'value' => function($data) {
                Yii::app()->controller->renderPartial('_work_time', array(
                    'data' => $data
                ));
            },
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
</form>