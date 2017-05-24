<template>
    <div class="send-message">
        <div class="input-group">
            <input id="btn-input" type="text" name="message" class="form-control" placeholder="Type your message" v-model="newMessage" @keyup.enter="sendMessage">

            <span class="input-group-btn">
                <button class="btn btn-default" id="btn-chat" @click="sendMessage">Send</button>
            </span>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['user', 'user_info'],
        data() {
            return {
                newMessage: ''
            }
        },

        methods: {
            sendMessage() {
                this.$emit('messagesent', {
                    user: this.user,
                    message: this.newMessage,
                    user_info: this.user_info,
                });
                this.newMessage = ''
            }
        },
    }
</script>