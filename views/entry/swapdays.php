<?php
$form = $this->beginWidget('HActiveForm', array(
    'id' => 'leaves-edit-form',
    'enableAjaxValidation' => false,
        ));
?>
<div class="modal-dialog modal-dialog-small animated fadeIn">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">
                <?php echo '<strong>Shift</strong> Swap'; ?>
            </h4>
        </div>
        <div class="modal-body">
            <div class="control-group">
                <label class="control-label">Swap Dates</label>
                <div class="controls">
                    <table class="table table-condensed table-bordered table-striped" id="leave_days_table">
                        <thead>
                            <tr>
                                <th>Leave Date</th>
                                <th>Leave Type</th>
                            </tr>
                        </thead>
                        <tbody id="leave_days_table_body">
                            <?php
                            foreach ($dayMap as $key => $value) {
                                $curent = date("M j, Y (l)", strtotime($key));
                                if ($value == 1) {
                                    ?>

                                    <tr>
                                        <td>
                                            <?php echo $curent; ?>
                                        </td>
                                        <td>
                                            <div class="checkbox">
                                                <label>
                                                    <?php echo CHtml::checkBox('WorkdaysSwapdays[' . $key . ']'); ?>
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                } else {
                                    echo '<tr><td>' . $curent . '</td><td><span class="label label-info">Non working day</span</td></tr>';
                                }
                            }
                            ?>
                        </tbody>
                    </table> 	
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Swap Notes</label>
                <div class="controls">
                    <?php echo $shiftEntry->details; ?>	
                </div>
            </div>

        </div>



        <div class="modal-footer">

            <?php
            echo HHtml::hiddenField('date_start', $shiftEntry->date_start);
            echo HHtml::hiddenField('date_end', $shiftEntry->date_end);
            echo HHtml::hiddenField('user_id', $shiftEntry->user_id);
            echo HHtml::hiddenField('swap_with', $shiftEntry->swap_with);
            echo HHtml::hiddenField('details', $shiftEntry->details);
            echo HHtml::ajaxButton('Apply Swap', $this->createContainerUrl('entry/shiftswap', array('id' => $shiftEntry->id)), array(
                'type' => 'POST',
                'beforeSend' => 'function(){ setModalLoader(); }',
                'success' => 'function(html){ $("#globalModal").html(html);}',
                    ), array('class' => 'btn btn-primary'));
            ?>

            <button type="button" class="btn btn-primary"
                    data-dismiss="modal"><?php echo Yii::t('CalendarModule.views_entry_edit', 'Close'); ?></button>

            <div id="event-loader" class="loader loader-modal hidden"><div class="sk-spinner sk-spinner-three-bounce"><div class="sk-bounce1"></div><div class="sk-bounce2"></div><div class="sk-bounce3"></div></div></div>

        </div>


    </div>
</div>
<?php $this->endWidget(); ?>