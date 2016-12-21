<div class="modal-dialog modal-dialog-small animated fadeIn">
    <div class="modal-content">

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"
                    aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">
                <strong><?php echo Yii::t('ReportContent.widgets_views_reportSpamLink', 'Help Us Understand What\'s Happening'); ?>
                </strong>
            </h4>

        </div>
        <hr />
        <?php
        $form = $this->beginWidget('HActiveForm', array(
            'id' => 'report-content-form',
        ));
        ?>
        <?php echo $form->errorSummary($model); ?>
        <?php echo $form->hiddenField($model, 'object_id', array('value' => $object->id)); ?>
        <div class="modal-body text-left" id="myModalreport">
            <?php echo $form->labelEx($model, 'reason'); ?>
            <br />
            <?php
            echo $form->textArea($model, 'reason', array('class' => 'form-control', 'rows' => 6, 'cols' => 50));
            ?>
            <?php echo $form->error($model, 'reason'); ?>
        </div>
        <hr />
        <div class="modal-footer">

            <?php
            echo HHtml::ajaxButton(Yii::t('CalendarModule.views_entry_edit', 'Save'), $this->createUrl('//company/supervisor/report', array('id' => $object->id)), array(
                'type' => 'POST',
                'beforeSend' => 'function(){ setModalLoader(); }',
                'success' => 'function(html){ $("#globalModal").html(html);}',
                    ), array('class' => 'btn btn-primary', 'id' => 'sBtn'));
            ?>
        </div>
        <script>
            // Shake modal after wrong validation
<?php if ($form->errorSummary($model) != null) { ?>
                $('.modal-dialog').removeClass('fadeIn');
                $('.modal-dialog').addClass('shake');
<?php } ?>

        </script>
        <?php $this->endWidget(); ?>
    </div>
</div>
