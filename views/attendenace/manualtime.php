
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
                <strong>Create</strong> Leave
            </h4>
        </div>
        <div class="modal-body">

            <?php echo $form->errorSummary($attendance); ?>

            <div id="datepicker_date">
                <div class="form-group">
                    <?php echo $form->labelEx($attendance, 'in_time'); ?>
                    <?php
                    $this->widget('ext.timepicker.timepicker', array(
                        'model' => $attendance,
                        'name' => 'in_time',
                    ));
                    ?>
                </div>
            </div>
            <div id="datepicker_date">
                <div class="form-group">
                    <?php echo $form->labelEx($attendance, 'out_time'); ?>
                    <?php
                    $this->widget('ext.timepicker.timepicker', array(
                        'model' => $attendance,
                        'name' => 'out_time',
                    ));
                    ?>
                </div>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($attendance, 'reason'); ?>
                <?php echo $form->dropdownList($attendance, 'reason', array('Overtime' => 'Overtime', 'System error' => 'System error', 'out of office meeting' => 'out of office meeting', 'Other' => 'Other'), array('class' => 'form-control', 'empty' => 'Select reason')); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($attendance, 'note'); ?>
                <?php echo $form->textArea($attendance, 'note', array('class' => 'form-control', 'rows' => '3', 'placeholder' => 'Description')); ?>
            </div>

        </div>



        <div class="modal-footer">

            <?php
            echo HHtml::ajaxButton('Add', $this->createUrl('//company/attendenace/addmanual'), array(
                'type' => 'POST',
                'beforeSend' => 'function(){ setModalLoader(); }',
                'success' => 'function(html){ $("#globalModal").html(html);}',
                    ), array('class' => 'btn btn-primary', 'id' => 'inviteBtn'));
            ?>

            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>

            <div id="event-loader" class="loader loader-modal hidden"><div class="sk-spinner sk-spinner-three-bounce"><div class="sk-bounce1"></div><div class="sk-bounce2"></div><div class="sk-bounce3"></div></div></div>

        </div>


    </div>
</div>
<script>
    // Shake modal after wrong validation
<?php if ($form->errorSummary($attendance) != null) { ?>
        $('.modal-dialog').removeClass('fadeIn');
        $('.modal-dialog').addClass('shake');
<?php } ?>

</script>


<?php $this->endWidget(); ?>