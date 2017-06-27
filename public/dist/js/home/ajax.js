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
    var start_time = $('#start-time').val();
    var end_time = $('#end-time').val();
    var har_error = false;

    $button = $('#btn-suggest-place');
    var is_busy = $button.attr('is_busy');

    if (is_busy == 'true') {
        return false;
    }
    $button.html('Please waiting ^^');
    $button.attr({
        "is_busy" : true
    });

    if (total_cost == '') {
        $('#total_cost_error').html('Please type maximum cost for this plan!').show();
        har_error = true;
    } else {
        $('#total_cost_error').hide();
    }
    if (start_time == '') {
        $('#start_time_error').html('Please choose start time!').show();
        har_error = true;
    } else {
        $('#start_time_error').hide();
    }
    if (end_time == '') {
        $('#end_time_error').html('Please choose end time!').show();
        har_error = true;
    } else {
        $('#end_time_error').hide();
    }

    var start = new Date(start_time);
    var end = new Date(end_time);
    var now = new Date();
    if ((start > end) || (now > start)){
        $('#start_end_error').html('').show();
        if (start > end) {
            $('#start_end_error').append('<p>End time must be after start time. Please choose again!</p>');
        }
        if (now > start) {
            $('#start_end_error').append('<p>Start time must be after now. Please choose again!</p>');
        }
        har_error = true;
    } else {
        $('#start_end_error').hide();
    }

    if (har_error == false) {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                lat = position.coords.latitude;
                lng = position.coords.longitude;
                $.ajax({
                    type: 'get',
                    dataType: 'text',
                    url: 'auto-find-place',
                    data: {"total_cost": total_cost,
                        "find_place": find_place,
                        "start_time" : start_time,
                        "end_time" : end_time,
                        "lat" : lat.toString(),
                        "lng" : lng.toString(),
                    },
                    success: function(result)
                    {
                        document.getElementById('recommend-place').innerHTML = result;
                    }
                }).always(function()
                {
                    $button.html('Suggest');
                    $button.attr({
                        "is_busy" : false
                    });
                });
            }, function() {
                $.ajax({
                    type: 'get',
                    dataType: 'text',
                    url: 'auto-find-place',
                    data: {"total_cost": total_cost,
                        "find_place": find_place,
                        "start_time" : start_time,
                        "end_time" : end_time,
                        "lat" : '',
                        "lng" : '',
                    },
                    success: function(result)
                    {
                        document.getElementById('recommend-place').innerHTML = result;
                    }
                }).always(function()
                {
                    $button.html('Suggest');
                    $button.attr({
                        "is_busy" : false
                    });
                });
            });
        } else {
            $.ajax({
                type: 'get',
                dataType: 'text',
                url: 'auto-find-place',
                data: {"total_cost": total_cost,
                    "find_place": find_place,
                    "start_time" : start_time,
                    "end_time" : end_time,
                    "lat" : '',
                    "lng" : '',
                },
                success: function(result)
                {
                    document.getElementById('recommend-place').innerHTML = result;
                }
            }).always(function()
            {
                $button.html('Suggest');
                $button.attr({
                    "is_busy" : false
                });
            });
        }
    } else {
        $button.html('Suggest');
        $button.attr({
            "is_busy" : false
        });
    }
}

var find_place = document.getElementsByName("find_place");

var showNumPlace = function() {
    var find = document.querySelector('input[name="find_place"]:checked').value;
    var num_place = $('.num-place');
    if ( find == 'save-money' || find == 'luxury-place' ){
        num_place.removeClass('hidden');
    } else {
        num_place.addClass('hidden');
    }
}

for (var i = 0; i < find_place.length; i++) {
    find_place[i].addEventListener('click', showNumPlace);
}

function create_place() {
    $('form.create_place').on('submit', function(){
        var url = "create-place",
            that = $(this),
            data = {};
        that.find('[name]').each(function(index,value){
            console.log(value);
        })
        return false;
    })
    /*var data = {}
     $.ajax({
     type: 'post',
     url: 'create-place',
     success:function(result)
     {
     $('#create-place').append(result);
     }
     })*/

}