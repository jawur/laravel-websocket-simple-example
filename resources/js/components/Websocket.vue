<template>
  <div class="container">
    <br>
    <br>
    <h1>Messages:</h1>
    <br>
    <div v-if="messages">
      <div v-for="message in messages" class="alert alert-success" role="alert">
        {{ message }}
      </div>
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

  mounted() {
    window.Echo.channel('message')
        .listen('WebsocketEvent', (event) => {
          this.messages.push(event.message);
        })

    console.log('Component mounted.')
  }
}
</script>
