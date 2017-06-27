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

function getLocation(data) {
    var name_place = $("input[name=name]").val();
    var address = $("input[name=address]").val();
    var is_busy = $(data).attr('is_busy');
    if (is_busy == 'true') {
        return false;
    }
    $button = $(data);
    $button.attr({
        "is_busy" : true
    });
    $button.html('LOADDING ...');
    $map = $("#map");
    $input_lat = $("input[name=lat]");
    $input_lng = $("input[name=lng]");

    $.ajax({
        type: 'get',
        dataType: 'json',
        url: 'get-location',
        data: {"address": name_place + ' ' + address},
    }).done(function (result) {
        if (result.status == 'ZERO_RESULTS') {
            $input_lat.val('');
            $input_lng.val('');
            $map.addClass('hidden');
            alert('Not found this place. Please check the address!');
        } else {
            var lat = result.results[0].geometry.location.lat;
            var lng = result.results[0].geometry.location.lng;
            var name = result.results[0].name;
            $input_lat.val(lat);
            $input_lng.val(lng);
            loadMap(lat, lng, name);
            $map.removeClass('hidden');
        }
    }).fail(function () {
        $input_lat.val('');
        $input_lng.val('');
        $map.addClass('hidden');
        alert('Error! Please try again.');
    }).always(function()
    {
        $button.html('GET LOCATION');
        $button.attr({
            "is_busy" : false
        });
    });
}

function checkInsertPlace() {
    if ( ($("input[name=lat]").val() == "") || ($("input[name=lng]").val() == "")) {
        alert("Please get location for this place!");
        return false;
    }
}

var map, infoWindow;
function loadMap(lat, lng, name) {
    map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: lat, lng: lng},
        zoom: 16
    });
    infoWindow = new google.maps.InfoWindow;

    // Try HTML5 geolocation.
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
                lat: lat,
                lng: lng
            };

            infoWindow.setPosition(pos);
            infoWindow.setContent(name);
            infoWindow.open(map);
            map.setCenter(pos);
        }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
        });
    } else {
        // Browser doesn't support Geolocation
        handleLocationError(false, infoWindow, map.getCenter());
    }
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(browserHasGeolocation ?
        'Error: The Geolocation service failed.' :
        'Error: Your browser doesn\'t support geolocation.');
    infoWindow.open(map);
}