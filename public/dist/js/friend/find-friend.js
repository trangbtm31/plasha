/**
 * Created by Cuong on 17/05/2017.
 */
function refresh_recommend_friend() {
    $.ajax({
        type: 'get',
        dataType: 'text',
        url: 'reload-recommend-friend',
        data: {},
        success: function(result)
        {
            document.getElementById("list-friend-recommend").innerHTML = result;
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