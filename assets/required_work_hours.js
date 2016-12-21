var users_cache = {}, cnt = {};



function addZero(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}

var d = new Date();
var h = addZero(d.getHours());

$(document).ready(function() {
function updateSaveButton() {
    var $save = $('#save-form');
    if ($save.hasClass('inactive')) {
        $save.attr("disabled", false);
        $save.removeClass('inactive');
    }
}
//click day none
    $('.users_details .day-none').live('click', function() {
        var id = $(this).attr('user');
        $("input[name='d[" + id + "][]']").each(function() {
            $(this).attr("checked", false);
            $(this).parent().removeClass('active');
        });
        updateSaveButton();
    });
            $('.users_details .day').live('click', function(e, call) {
                updateSaveButton();
            });

    $('#save-form').click(function() {
        if ($(this).is('.inactive')) {
            return false;
        }
    });

    window.onbeforeunload = function() {
        if ($('#save-form').is('.inactive')) {
            return;
        } else {
            return 'You have unsaved changes!'
        }
    }

    $('.td-dropdown').change(function() {
        userId = $(this).attr('user-data-id');
        workendhour = new Date();
        workstarthour = new Date();
        starttime = $('input[name="workstarthour[' + userId + ']"]').val();
        endtime = $('input[name="workendhour[' + userId + ']"]').val();
        workstarthour.setHours(starttime);
        workendhour.setHours(endtime);
        if (endtime < 12 && starttime > 12) {
            workstarthour.setDate(parseInt(d.getDate())-1);
        }
        if (d >= workstarthour && workendhour > d) {
            alert("this user shift already started");
        }

        //handle minimum minutes dropdown with this id mtm[userId]
        if ($('.td-dropdown[name="mth[' + userId + ']"]').val() != '-1') {
            //enable the mtm
            //apply value of 00 to the min
            if ($('.td-dropdown[name="mtm[' + userId + ']"]').val() == '-1') {
                $('.td-dropdown[name="mtm[' + userId + ']"]').val(0);
            }
        } else {
            //disable the mtm
            $('.td-dropdown[name="mtm[' + userId + ']"]').val('-1');
        }

        //handle start minutes and am/pm , enable when start hours is selected
        if ($('.td-dropdown[name="sth[' + userId + ']"]').val() != '-1') {
            //enable the stm
            //apply value of 00 to the stm
            if ($('.td-dropdown[name="stm[' + userId + ']"]').val() == '-1') {

                $('.td-dropdown[name="stm[' + userId + ']"]').val(0);
            }

        }
        updateSaveButton()
    })

});