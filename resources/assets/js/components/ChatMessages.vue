<template>
    <ul class="chat-message">
        <li v-for="message in messages">
            <div v-if="message.user.id === current_user.id" class="right">
                <img :src="'images/users/' + message.user_info.avatar" alt="" class="profile-photo-sm pull-right">
                <div class="chat-item">
                    <div class="chat-item-header">
                        <h5>
                            {{ message.user.first_name }} {{ message.user.last_name }}
                        </h5>
                        <small class="text-muted">3 days ago</small>
                    </div>
                    <p>
                        {{ message.message }}
                    </p>
                </div>
            </div>
            <div v-else class="left">
                <img :src="'images/users/' + message.user_info.avatar" alt="" class="profile-photo-sm pull-left">
                <div class="chat-item">
                    <div class="chat-item-header">
                        <h5>
                            {{ message.user.first_name }} {{ message.user.last_name }}
                        </h5>
                        <small class="text-muted">3 days ago</small>
                    </div>
                    <p>
                        {{ message.message }}
                    </p>
                </div>
            </div>
        </li>
    </ul>
</template>

<script>
  export default {
    props: ['messages', 'current_user']
  };
</script>