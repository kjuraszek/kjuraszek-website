<template>
  <section class="section" id="aboutme">
    <div class="container has-text-center">
      <h2 class="title is-2">Chapter 1: About me</h2>
      <p class="subtitle"><em>as in every tale - we have to introduce main character</em></p>
      <div class="box p-1 mb-4">
      <b-image
            :src="avatarImg"
            alt="Krzysztof Juraszek"
            :rounded="true"
            class=""
        ></b-image>
        </div>
        <div class="columns is-centered">
          <div class="column is-two-thirds-tablet is-half-desktop">
            <p class="is-size-4 has-text-center"><strong>Hello there!</strong></p>
            <p class="has-text-center">My name is <em>Chris</em> ( in Polish: <em>Krzysztof</em> ). 
            I am a Gdańsk-based developer. 
            I have some experience in JavaScript, Python, PHP, HTML and CSS.</p>
            <p class="has-text-center">See for yourself - below are some of my projects.</p>
          </div>
        </div>
    </div>
  </section>
</template>

<script>
export default {
  name: 'AboutMe',
  data(){
    return{
      avatarImg: this.$parent.avatarImage
    }
  }
}
</script>

<style scoped>
#aboutme .box{
  border-radius:100%;
  max-width:200px;
  margin:auto;
  -webkit-box-shadow: 0 0.5em 1em -0.125em rgba(10, 10, 10, 0.1),0 0px 10px 3px rgba(10, 10, 10, 0.65);
  box-shadow: 0 0.5em 1em -0.125em rgba(10, 10, 10, 0.1),0 0px 10px 3px rgba(10, 10, 10, 0.65);
}      
</style>