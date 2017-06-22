/**
 * Created by Cuong on 16/06/2017.
 */
$(window).on('hashchange', function() {
    if (window.location.hash) {
        var page = window.location.hash.replace('#', '');
        if (page == Number.NaN || page <= 0) {
            return false;
        } else {
            getData(page);
        }
    }
});
$(document).ready(function() {
    $(document).on('click', '.pagination a', function (e) {
        getData($(this).attr('href').split('page=')[1]);
        e.preventDefault();
    });
});
function getData(page) {
    $.ajax({
        url : '?page=' + page,
        dataType: 'json',
    }).done(function (data) {
        $('.data').html(data);
        location.hash = page;
    }).fail(function () {
        alert('Data could not be loaded.');
    });
}

$("body").bind("ajaxSend", function(elm, xhr, s){
    if (s.type == "POST") {
        xhr.setRequestHeader('X-CSRF-Token', getCSRFTokenValue());
    }
});

$.ajaxSetup({
    headers:
        { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
});

function change_ad_permission(data) {
    if ($(data).hasClass('btn-success'))
    {
        $.ajax({
            type: 'post',
            dataType: 'text',
            url: 'add-admin-permission',
            data: {"user_id": $(data).attr('user_id')},
        }).done(function (result) {
            if (result == 'true') {
                $(data).removeClass('btn-success').addClass('btn-danger');
                $(data).find("i").text('close');
                $(data).find("span").text('Del');
                $(data).parent().parent().find("td.is-admin").text('Yes');
            } else {
                alert('False! Please try again.');
            }
        }).fail(function () {
            alert('Error! Please try again.');
        });
    }
    else if ($(data).hasClass('btn-danger'))
    {
        $.ajax({
            type: 'post',
            dataType: 'text',
            url: 'del-admin-permission',
            data: {"user_id": $(data).attr('user_id')},
        }).done(function (result) {
            if (result == 'true') {
                $(data).removeClass('btn-danger').addClass('btn-success');
                $(data).find("i").text('check');
                $(data).find("span").text('Add');
                $(data).parent().parent().find("td.is-admin").text('No');
            } else {
                alert('False! Please try again.');
            }
        }).fail(function () {
            alert('Error! Please try again.');
        });
    }
}

function del_place(data) {
    if (confirm('Are you sure you want to delete ' + $(data).parent().parent().find("td.name").html() + '?')) {
        var id = $(data).parent().parent().find("td.id").html();
        $.ajax({
            type: 'post',
            dataType: 'text',
            url: 'del-place',
            data: {"id": id},
        }).done(function (result) {
            if (result == 'true') {
                var page = window.location.hash.replace('#', '');
                if (page == Number.NaN || page <= 0) {
                    page = 1;
                }
                getData(page);
            } else {
                alert('False! Please try again.');
            }
        }).fail(function () {
            alert('Error! Please try again.');
        });
    }
}

function load_info(data) {
    var id = $(data).parent().parent().find("td.id").html();
    $.ajax({
        type: 'post',
        dataType: 'text',
        url: 'info-place',
        data: {"id": id},
    }).done(function (result) {
        $('.modal-content').html(result);
    }).fail(function () {
        alert('Error! Please try again.');
    });
}

function edit_place_form(data) {
    var id = $(data).parent().parent().find("td.id").html();
    $.ajax({
        type: 'post',
        dataType: 'text',
        url: 'edit-place-form',
        data: {"id": id},
    }).done(function (result) {
        $('.modal-content').html(result);
    }).fail(function () {
        alert('Error! Please try again.');
    });
}


function edit_place(data) {
    $("#editPlace").submit(function(e) {
        e.preventDefault();

        $.ajax({
            type: 'post',
            dataType: 'text',
            url: 'edit-place',
            data: $("#editPlace").serialize(),
        }).done(function (result) {
            if (result == 'true') {
                alert('Edit successful!');
                var page = window.location.hash.replace('#', '');
                if (page == Number.NaN || page <= 0) {
                    page = 1;
                }
                getData(page);
            } else {
                alert('False! Please try again.');
            }
        }).fail(function () {
            alert('Error! Please try again.');
        });

        $('#myModal').modal('hide');
    });

}

$(document).ready(function() {
    $('.timepicker').datetimepicker({
        format: 'HH:mm'
    });
});