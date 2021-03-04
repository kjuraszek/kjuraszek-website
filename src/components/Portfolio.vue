<template>
  <section class="section" id="projects">
    <div class="container">
      <h2 class="title is-2">Chapter 3: Projects</h2>
      <p class="subtitle"><em>dragons, epic battles, powerful spells ? forget it, this is far more thrilling!</em></p>
      <template v-if="!loading">
        <div class="buttons">
          <b-button 
          v-for="(tag, index) in tags"
          @click="changeTag($event, tag)"
          :key="index" 
          :type="tag===filteredTag ? 'is-danger':'is-danger is-light'"
          >
            {{tag}}
          </b-button>
        </div>

        <div class="has-text-left">
          <b-switch 
          v-model="extendedProjectsView" 
          type="is-danger" 
          size="is-medium">
            Extended projects info
          </b-switch>
        </div>

        <p class="is-6" v-if="!loading">
          <em>showing {{ items.length.toString() + (items.length === 1 ? " project" : " projects")}} from newest</em>
        </p>
        
        <div >
          <transition-group
          tag="div" 
          name="fade" 
          mode="out-in"
          class="columns is-desktop is-multiline">
            <PortfolioItem 
          v-for="(item, index) in items" 
          v-bind:item="item"
          v-bind:index="index"
          v-bind:extended="extendedProjectInfo"
          :key="item.id" />
          </transition-group>
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
  data(){
    return{
      selectedTag: 'all',
      extendedProjectsView: true
    }
  },
  methods:{
    changeTag: function(event, t){
      this.selectedTag = t
    },
  },
  computed:{
    filteredTag: function(){
      return this.selectedTag;
    },
    extendedProjectInfo: function(){
      return this.extendedProjectsView;
    },
    loading: function(){
      return this.$parent.loading;
    },
    items: function(){
      if(this.$parent.projects.length === 0){
        return [];
      } else {
        if( this.selectedTag === "all"){
          return  [...this.$parent.projects].sort((a,b) => b.id - a.id);
        } else {
          return  [...this.$parent.projects].sort((a,b) => b.id - a.id)
          .filter( project => project.tags.includes(this.selectedTag));
        }
      }
    },
    tags: function(){
      let projects = this.$parent.projects;
      return projects.length > 0 ? 
      [... new Set(["all"].concat(...projects.map( (project) => project.tags)))]
      .sort((a,b) => a > b) : 
      []
    }
  },
  components:{
    PortfolioItem
  },
}
</script>