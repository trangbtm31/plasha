/**
 * Created by Cuong on 20/05/2017.
 */

function LoadMoreFriendChat(data) {
    var is_busy = $(data).attr('is_busy');
    var page = $(data).attr('page');

    if (is_busy == 'true') {
        return false;
    }
    $button = $(data);
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

function appChat() {
    const app = new Vue({
        el: '.chat-room',

        data: {
            messages: []
        },

        created() {
            this.fetchMessages();
            Echo.private('chat')
                .listen('MessageSent', (e) => {
                    this.messages.push({
                        message: e.message.message,
                        user: e.user,
                        user_info: e.user_info
                    });
                });
        },

        methods: {
            fetchMessages() {
                axios.get('/messages').then(response => {
                    this.messages = response.data;
                });
            },

            addMessage(message) {
                this.messages.push(message);
                axios.post('/messages', message).then(response => {
                    console.log(response.data);
                });
            }
        }
    });
}

$( window ).on( "load", appChat );

function LoadMessage(data) {
    var is_busy = $(data).attr('is_busy');

    if (is_busy == 'true') {
        return false;
    }
    $(data).attr({
        "is_busy" : true
    });

    $.ajax({
        type: 'get',
        dataType: 'text',
        url: 'messages-ajax',
        data: {},
        success: function(result)
        {
            document.getElementById("chat-box").innerHTML = result;
            appChat();
        }
    })

    $(data).attr({
        "is_busy" : false
    });
}