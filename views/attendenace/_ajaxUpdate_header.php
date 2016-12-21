<?php

$curent = date("Y-m-d", time());

if ($attendance->out_time == '0000-00-00 00:00:00') {

    echo HHtml::ajaxLink('Check OUT', $this->createUrl('//company/attendenace/punchHeader', array('id' => $attendance->id)), array(
        'type' => "POST",
        'data' => array('type' => 'checkout'),
        'beforeSend' => 'function(){ $("#postform-loader").removeClass("hidden"); }',
        'complete' => "function(response) {
                         $('.contentForm_options .btn').show(); $('#postform-loader').addClass('hidden');   
                            }",
        'update' => '#data-header'
            ), array('class' => 'btn btn-info')
    );

    if ($attendance->type == 2) {
        echo HHtml::ajaxLink('Continue Work', $this->createUrl('//company/attendenace/punchHeader', array('id' => $attendance->id)), array(
            'type' => "POST",
            'data' => array('type' => 'continue'),
            'beforeSend' => 'function(){ $("#postform-loader").removeClass("hidden"); }',
            'complete' => "function(response) {
                         $('.contentForm_options .btn').show(); $('#postform-loader').addClass('hidden');   
                            }",
            'update' => '#data-header'
                ), array('class' => 'btn btn-danger')
        );
    } else {
        echo HHtml::ajaxLink('Break', $this->createUrl('//company/attendenace/punchHeader', array('id' => $attendance->id)), array(
            'type' => "POST",
            'data' => array('type' => 'break'),
            'beforeSend' => 'function(){ $("#postform-loader").removeClass("hidden"); }',
            'complete' => "function(response) {
                         $('.contentForm_options .btn').show(); $('#postform-loader').addClass('hidden');   
                            }",
            'update' => '#data-header'
                ), array('class' => 'btn btn-danger')
        );
    }
} else {
    echo HHtml::ajaxLink('Check In', $this->createUrl('//company/attendenace/punchHeader'), array(
        'type' => "POST",
        'data' => array('type' => 'checkin'),
        'beforeSend' => 'function(){ $("#postform-loader").removeClass("hidden"); }',
        'complete' => "function(response) {
                         $('.contentForm_options .btn').show(); $('#postform-loader').addClass('hidden');   
                            }",
        'update' => '#data-header'
            ), array('class' => 'btn btn-info')
    );
}
?>