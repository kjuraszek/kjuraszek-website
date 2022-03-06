<template>
  <section class="hero is-info is-mobile  is-large has-background has-background-danger-dark">
    <img alt="Banner component source code" class="hero-background is-transparent" v-bind:src="bannerImg" />
    <div class="hero-body">
      <div class="container">
        <h1 class="title is-1">
          kjuraszek
        </h1>
        <p class="subtitle is-5">
          <em>a tale about developer and his portfolio</em>
        </p>
      </div>
    </div>
  </section> 
</template>

<script>
export default {
  name: 'Banner',
  data(){
    return{
      bannerImg: this.$parent.bannerImage
    }
  }
}
</script>

<style scoped lang="sass">
.hero.has-background
  position: relative
  overflow: hidden

.hero-background
  position: absolute
  object-fit: cover
  object-position: top center
  width: 100%
  height: 100%
  opacity: 0.4

</style>
