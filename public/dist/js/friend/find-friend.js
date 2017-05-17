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
function add_friend() {
    $.ajax({
        type: 'get',
        dataType: 'text',
        url: 'reload-recommend-friend',
        data: {},
        success: function(result)
        {
            //document.getElementById("list-friend-recommend").innerHTML = result;
        }
    })
}