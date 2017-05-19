/**
 * Created by Cuong on 17/05/2017.
 */
function resize_image() {
    var cw = $('#list-friend-recommend .avatar-photo').width();
    $('#list-friend-recommend .avatar-photo').css({'height':cw+'px'});
}
$(window).bind("load", function() {
    resize_image();
});

window.onresize = function(event) {
    resize_image();
}

function refresh_recommend_friend() {
    $.ajax({
        type: 'get',
        dataType: 'text',
        url: 'reload-recommend-friend',
        data: {},
        success: function(result)
        {
            document.getElementById("list-friend-recommend").innerHTML = result;
            resize_image();
        }
    })
}
function add_friend(data) {
    var user_id = $(data).attr('user_id');
    if ($(data).hasClass('button-add-friend')) {
        $.ajax({
            type: 'get',
            dataType: 'json',
            url: 'add-friend-request',
            data: {"user_id": user_id},
            success: function (result) {
                //Trường hợp a đã gửi lời mời, sau đó b gửi lời mời thì sẽ trở thành bạn bè
                if (result['success'] == 'friend') {
                    data.innerHTML = "Friend";
                    $(data).removeClass('button-add-friend').addClass('friend-request-sent');
                } else if (result['success'] == true) {
                    data.innerHTML = "Sent";
                    $(data).removeClass('button-add-friend').addClass('friend-request-sent');
                }
            }
        })
    } else if ($(data).hasClass('friend-request-sent')) {
        $.ajax({
            type: 'get',
            dataType: 'json',
            url: 'cancel-friend-request',
            data: {"user_id": user_id},
            success: function (result) {
                if (result['success'] == true) {
                    data.innerHTML = "Add Friend";
                    $(data).removeClass('friend-request-sent').addClass('button-add-friend');
                }
            }
        })
    }
}
function accept_friend(data) {
    var user_id = $(data).attr('user_id');
    $.ajax({
        type: 'get',
        dataType: 'json',
        url: 'accept-friend',
        data: {"user_id": user_id},
        success: function (result) {
            if (result['success'] == true) {
                $(".user-request-"+user_id).remove();
            }
        }
    })
}
function deny_friend(data) {
    var user_id = $(data).attr('user_id');
    $.ajax({
        type: 'get',
        dataType: 'json',
        url: 'deny-friend',
        data: {"user_id": user_id},
        success: function (result) {
            if (result['success'] == true) {
                $("#user-request-"+user_id).remove();
            }
        }
    })
}

function LoadMoreRequestFriend(data) {
    var is_busy = $(data).attr('is_busy');
    var page = $(data).attr('page');

    if (is_busy == 'true') {
        return false;
    }
    $button = $(data)
    $button.attr({
        "is_busy" : true
    });
    $button.html('Loading ...');

    page++;
    $.ajax({
        type: 'get',
        dataType: 'text',
        url: 'friend-request-ajax',
        data: {"page": page},
        success: function(result)
        {
            $(".friend-request-list").append(result);
        }
    })
        .always(function()
        {
            $button.html('Load More Request');
            $button.attr({
                "is_busy" : false,
                "page"    : page
            });
        });
}