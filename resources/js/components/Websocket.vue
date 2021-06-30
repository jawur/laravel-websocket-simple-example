<template>
  <div class="container">
    <h1>Hello</h1>
  </div>
</template>

<script>
export default {
  mounted() {
    window.Echo.channel('message')
        .listen('WebsocketEvent', (e) => {
          console.log(e)
        })

    console.log('Component mounted.')
  }
}
</script>
