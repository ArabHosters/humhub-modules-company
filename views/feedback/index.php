
<?php
$form = $this->beginWidget('HActiveForm', array(
    'id' => 'pages-edit-form',
    'enableAjaxValidation' => false,
        ));
?>
<div class="modal-dialog modal-dialog-small animated fadeIn">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">
                Feedback
            </h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <?php echo $form->labelEx($feedback, 'feedback_comment'); ?>
                <?php echo $form->textArea($feedback, 'feedback_comment', array('class' => 'form-control', 'rows' => '3', 'placeholder' => 'Your Feedback')); ?>
            </div>
        </div>

        <div class="modal-footer">
            <?php
            echo HHtml::ajaxButton('Submit', $this->createUrl('feedback/index'), array(
                'type' => 'POST',
                'beforeSend' => 'function(){ setModalLoader(); }',
                'success' => 'function(html){ $("#globalModal").html(html);}',
                    ), array('class' => 'btn btn-primary', 'id' => 'feedbackBtn'));
            ?>
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>

            <div id="event-loader" class="loader loader-modal hidden"><div class="sk-spinner sk-spinner-three-bounce"><div class="sk-bounce1"></div><div class="sk-bounce2"></div><div class="sk-bounce3"></div></div></div>

        </div>


    </div>
</div>

<script>
    // Shake modal after wrong validation
<?php if ($form->errorSummary($feedback) != null) { ?>
        $('.modal-dialog').removeClass('fadeIn');
        $('.modal-dialog').addClass('shake');
<?php } ?>

</script>
<?php $this->endWidget(); ?>