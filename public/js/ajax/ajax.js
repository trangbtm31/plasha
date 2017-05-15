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

    $element = $('#comment-plan-'+plan_id+' .comment-content');

    $button = $(data);

    if (is_busy == true) {
        return false;
    }
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
        is_busy = false;
    });
}

function likePlan(data) {
    var plan_id = $(data).attr('plan_id');
    $element = $('#plan-' + plan_id + ' .button-like');
    if ($element.hasClass('like'))
    {
        $element.removeClass('like').addClass("liked");
        $.ajax({
            type: 'get',
            dataType: 'text',
            url: 'like-ajax/',
            data: {"plan_id": plan_id},
            success: function(result)
            {
                var x = document.getElementById("comment-plan-" + plan_id);
                var y = x.getElementsByTagName("button")[0];
                y.setAttribute("page", comment_page);
                $element.append(result);
            }
        })
    }
    else
    {
        $element.removeClass('liked').addClass("like");
    }
}