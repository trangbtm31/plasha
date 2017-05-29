var is_busy = false;
var page = 1;
var stopped = false;

$(document).ready(function()
{
    $(window).scroll(function()
    {
        $element = $('#content');
        $loadding = $('#loadding');
        if($(window).scrollTop() + $(window).height() >= $element.height())
        {
            if (is_busy == true){
                return false;
            }
            if (stopped == true){
                return false;
            }
            is_busy = true;
            page++;
            $loadding.removeClass('hidden');
            $.ajax({
                type        : 'get',
                dataType    : 'text',
                url         : 'plan-ajax',
                data        : {page : page},
                success     : function (result)
                {
                    $element.append(result);
                }
            })
            .always(function()
            {
                $loadding.addClass('hidden');
                is_busy = false;
            });
            return false;
        }
    });
});
function LoadMoreComment(data) {
    var plan_id = $(data).attr('plan_id');
    var is_busy = $(data).attr('is_busy');
    var comment_page = $(data).attr('page');

    if (is_busy == 'true') {
        return false;
    }
    $button = $(data)
    $button.attr({
        "is_busy" : true
    });
    $element = $('#comment-plan-'+plan_id+' .comment-content');
    comment_page++;

    $button.html('LOADDING ...');
    $.ajax({
        type: 'get',
        dataType: 'text',
        url: 'comment-ajax',
        data: {"comment_page": comment_page, "plan_id": plan_id},
        success: function(result)
        {
            var x = document.getElementById("comment-plan-" + plan_id);
            var y = x.getElementsByTagName("button")[0];
            y.setAttribute("page", comment_page);
            $element.append(result);
        }
    })
    .always(function()
    {
        $button.html('LOAD MORE');
        $button.attr({
            "is_busy" : false
        });
    });
}

function likePlan(data) {
    var plan_id = $(data).attr('plan_id');

    //Get element like button
    $element = $('#plan-' + plan_id + ' .button-like');

    //If
    if ($element.hasClass('dislike'))
    {
        $.ajax({
            type: 'get',
            dataType: 'text',
            url: 'like-ajax',
            data: {"plan_id": plan_id},
            success: function(result)
            {
                $element.removeClass('dislike').addClass("like");
                $element[0].getElementsByClassName('total-like')[0].textContent = result;
            }
        })
    }
    else if ($element.hasClass('like'))
    {
        $.ajax({
            type: 'get',
            dataType: 'text',
            url: 'dislike-ajax',
            data: {"plan_id": plan_id},
            success: function(result)
            {
                $element.removeClass('like').addClass("dislike");
                $element[0].getElementsByClassName('total-like')[0].textContent = result;
            }
        })
    }
}

/* Load more friend online */
function more_fr_onl(data) {
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
        url: 'load-more-friend-online',
        data: {"page": page},
        success: function(result)
        {
            $("#friend-chat-online").append(result);
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

function auto_place() {
    var total_cost = document.getElementById('total_cost').value;
    var find_place = document.querySelector('input[name="find_place"]:checked').value;

    $.ajax({
        type: 'get',
        dataType: 'text',
        url: 'auto-find-place',
        data: {"total_cost": total_cost, "find_place": find_place},
        success: function(result)
        {
            document.getElementById('recommend-place').innerHTML = result;
        }
    })
}