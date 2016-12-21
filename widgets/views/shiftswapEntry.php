<div class="panel panel-default">
    <div class="panel-body">

        <?php $this->beginContent('application.modules_core.wall.views.wallLayout', array('object' => $calendarEntry)); ?>
        <h5>You have applied for a shift swap</h5>
        <strong>Status: </strong><?php echo CHtml::encode($calendarEntry->status); ?><br />
        <strong>Request Time: </strong><?php echo $calendarEntry->request_time; ?><br />
        <?php
        if ($calendarEntry->details) {
            echo '<br/><b>Reason for Applying Shift Swap:</b><br/>';
        }
        ?>
        <?php $this->beginWidget('CMarkdown'); ?><?php echo nl2br(CHtml::encode($calendarEntry->details)); ?><?php $this->endWidget(); ?>

        <?php $this->endContent(); ?>

    </div>
</div>