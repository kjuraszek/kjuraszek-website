<template>
  <header>
    <b-navbar class="is-dark" :fixed-top="true">
        <template #brand>
            <b-navbar-item tag="a" class="navbar-item site-name" href="#home" v-smooth-scroll="smoothScrollOptions">
                kjuraszek<span class="site-name-dot">.</span>pl
            </b-navbar-item>
        </template>
        <template #start>
            <b-navbar-item href="#aboutme" v-smooth-scroll="smoothScrollOptions">
                About me
            </b-navbar-item>
            <b-navbar-item href="#whatsnew" v-smooth-scroll="smoothScrollOptions">
                What's new
            </b-navbar-item>
            <b-navbar-item href="#projects" v-smooth-scroll="smoothScrollOptions">
                Projects
            </b-navbar-item>
            <b-navbar-item href="#contact" v-smooth-scroll="smoothScrollOptions">
                Contact
            </b-navbar-item>
        </template>
        <template #end>
            <b-navbar-item tag="div">
                <div class="has-text-center-tablet  has-text-center-mobile">
                    <b-button type="is-light" tag="a" href="https://github.com/kjuraszek" target="_blank" icon-pack="fab" icon-left="github" >Github</b-button>
                </div>
            </b-navbar-item>
        </template>
    </b-navbar>
  </header>  
</template>

<script>
export default {
  name: 'Header',
  data(){
      return{
          smoothScrollOptions: { duration: 500, offset: -50, updateHistory: false }
      }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.site-name{
      font-family: 'Amarante', cursive;
}
.site-name .site-name-dot{
  color:darkcyan;
  font-size: 2em;
  font-weight:700;
  margin-top: -9px;
}
</style>
