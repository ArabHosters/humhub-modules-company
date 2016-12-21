<div class="panel panel-default">
    <div class="panel-body">
        <div class="pull-right">

            <div>
                <br />
                <?php if ($calendarEntry->content->canWrite()) : ?>
                    <?php echo HHtml::link(Yii::t('CalendarModule.views_entry_view', 'Edit this event'), '#', array('class' => 'btn btn-primary btn-sm', 'onclick' => 'openEditModal(' . $calendarEntry->id . ')')); ?>
                <?php endif; ?>
            </div>
            <br />            
        </div>

        <?php // $this->widget('application.modules.calendar.widgets.CalendarEntryDateWidget', array('calendarEntry'=>$calendarEntry)); ?>
        
        <br /><br />

        <?php echo Yii::t('CalendarModule.views_entry_view', 'Created by:'); ?> <strong><?php echo HHtml::link($calendarEntry->content->user->displayName, $calendarEntry->content->user->getUrl()); ?></strong><br />

        <?php // $this->widget('application.modules.calendar.widgets.CalendarEntryParticipantsWidget', array('calendarEntry'=>$calendarEntry)); ?>
        
        <br />

        <?php $this->beginWidget('CMarkdown'); ?><?php echo nl2br(CHtml::encode($calendarEntry->details)); ?><?php $this->endWidget(); ?>


        <hr>
        <!-- <a href="#">Download ICal</a> &middot; -->
        <?php // $this->widget('application.modules_core.like.widgets.LikeLinkWidget', array('object' => $calendarEntry)); ?> &middot;
        <?php // $this->widget('application.modules_core.comment.widgets.CommentLinkWidget', array('object' => $calendarEntry)); ?>
        <?php // $this->widget('application.modules_core.comment.widgets.CommentsWidget', array('object' => $calendarEntry)); ?>


    </div>

</div>

<script>
    function openEditModal(id) {
        var editUrl = '<?php echo Yii::app()->getController()->createContainerUrl('entry/edit', array('id' => '-id-')); ?>';
        editUrl = editUrl.replace('-id-', encodeURIComponent(id));
        $('#globalModal').modal({
            show: 'true',
            remote: editUrl
        });
    }
</script>    
