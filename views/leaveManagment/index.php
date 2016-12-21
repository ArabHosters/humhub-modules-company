<div class="panel panel-default">
    <div class="panel-body">
        <?php
        $this->widget('application.modules.company.widgets.FullCalendarWidget', array(
            'canWrite' => $this->contentContainer->canWrite(),
            'loadUrl' => Yii::app()->getController()->createContainerUrl('leaveManagment/loadAjax'),
            'createUrl' => Yii::app()->getController()->createContainerUrl('entry/edit', array('date_start' => '-start-', 'date_end' => '-end-', 'fullCalendar' => '1'))
        ));
        ?>

    </div>
</div>