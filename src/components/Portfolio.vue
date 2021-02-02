<template>
  <section class="section" id="projects">
    <div class="container">
      <h2 class="title is-2">Chapter 3: Projects</h2>
      <p class="subtitle"><em>dragons, epic battles, powerful spells ? forget it, this is far more thrilling!</em></p>
      <p class="is-6" v-if="!loading"><em>showing {{ items.length.toString() + (items.length === 1 ? " project" : " projects")}} from newest</em></p>
      <template v-if="!loading">
      <div class="columns is-desktop is-multiline">
        <PortfolioItem 
        v-for="(item, index) in items" 
        v-bind:item="item"
        v-bind:index="index"
        :key="item.id" />
      </div>
      </template>
      <b-skeleton size="is-large" :count="7" :active="loading"></b-skeleton>
    </div>
  </section>
</template>

<script>
import PortfolioItem from './PortfolioItem.vue'

export default {
  name: 'Portfolio',
  computed:{
    loading: function(){
      return this.$parent.loading
    },
    items: function(){
      return this.$parent.projects.length > 0 ? [...this.$parent.projects].sort((a,b) => b.id - a.id) : []
    }
  },
  components:{
    PortfolioItem
  }
}
</script>