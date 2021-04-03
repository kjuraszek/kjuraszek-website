<template>
  <div id="app">
    <router-view></router-view>
  </div>
</template>

<script>

export default {
  name: 'App'
}
</script>

<style lang="sass">
@import url('https://fonts.googleapis.com/css2?family=Amarante&family=KoHo&display=swap')
#app 
  font-family: Avenir, Helvetica, Arial, sans-serif
  -webkit-font-smoothing: antialiased
  -moz-osx-font-smoothing: grayscale
  text-align: center
  color: #2c3e50

h1, h2, h3, h4, h5, h6
  font-family: 'KoHo', sans-serif

.section h2, footer h2
  border-bottom: solid 2px

</style>
