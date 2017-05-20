/**
 * Created by Cuong on 20/05/2017.
 */

function LoadMoreFriendChat(data) {
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
        url: 'chat-friend-ajax',
        data: {"page": page},
        success: function(result)
        {
            $("ul.contact-list").append(result);
        }
    })
    .always(function()
    {
        $button.html('Load more friend');
        $button.attr({
            "is_busy" : false,
            "page"    : page
        });
    });
}