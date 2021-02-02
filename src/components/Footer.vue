<template>
    <footer class="footer">
    <div class="container">
        <h2 class="title is-2">Chapter 5: The End</h2>
        <p class="subtitle"><em>and they lived happily ever after</em></p>
        <div class="content has-text-centered">
            <p>
                © {{ new Date().getFullYear() }} <a href="#home" v-smooth-scroll="smoothScrollOptions">kjuraszek.pl</a>
            </p>
        </div>
        </div>
    </footer>
</template>

<script>
export default {
  name: 'Footer',
  data(){
      return {
          smoothScrollOptions: { duration: 500, offset: -50, updateHistory: false }
      }
  }
}
</script>
