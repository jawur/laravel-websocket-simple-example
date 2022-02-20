<template>
    <div class="container">
        <br>
        <br>
        <div v-if="messages.length">
            <h1>Messages:</h1>

            <div class="alert alert-success" role="alert">
                <p v-for="message in messages">
                    {{ message }}
                </p>
            </div>
        </div>
        <div v-else>
            <p>
                Open your terminal and enter a command: <code>php artisan broadcast:message 'Your message here'</code>
            </p>
            <p>Or user URL: <code>{{ domain }}/messages/Your message here</code></p>
            <br>
            <b>
                If no messages are displayed, or you get a "Connection closed" then just clear your browsers
                Local Storage property and refresh the page. Click the button to do that:
            </b>
            <br>
            <button type="button" class="btn btn-success" v-on:click="clearStorage()">Clear Storage</button>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            messages: []
        }
    },

    computed: {
        domain: function () {
            return location.protocol + '//' + location.host;
        }
    },

    mounted() {
        window.Echo.channel('message')
            .listen('WebsocketEvent', (event) => {
                this.messages.push(event.message);
            });
    },

    methods: {
        clearStorage() {
            localStorage.clear();
            location.reload();
        }
    }
}
</script>
