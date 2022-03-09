<template>
  <section class="section" id="projects">
    <div class="container">
      <h2 class="title is-2">Chapter 3: Projects</h2>
      <p class="subtitle"><em>dragons, epic battles, powerful spells ? forget it, this is far more thrilling!</em></p>
      <template v-if="!loading && !failed">
        <div class="has-text-left mt-4">
          <b-switch 
            v-model="visibleControls"
            aria-controls="portfolioControls" 
            type="is-danger" 
            size="is-medium">
              Visible controls
          </b-switch>
        </div>
        <b-collapse
            aria-id="portfolioControls"
            animation="slide"
            v-model="visibleControls">
            <div class="columns">

              <div class="column is-one-quarters-desktop is-two-fifths-tablet has-text-left my-4">
                <b-switch
                v-model="extendedProjectsView"
                type="is-danger" 
                size="is-medium">
                  Extended info
                </b-switch>
                <b-field 
                  class="my-4"
                  type="is-danger" 
                  label="Sort by"
                  label-position="on-border">
                  <b-select
                    v-model="sortPortfolioItemsBy"
                    size="is-medium">
                    <option 
                      v-for="option in sortingOptions"
                      :value="option.name"
                      :key="option.name">
                      {{option.label}}
                    </option>
                  </b-select>
                  <p class="control">  
                    <b-button 
                    type="is-danger"
                    size="is-medium"
                    class="button"
                    icon-pack="fas"
                    :icon-right="sortPortfolioItemsOrder==='asc' ? 'sort-numeric-down' : 'sort-numeric-up'" 
                    @click="switchSortingOrder()"/>
                </p>
                </b-field>
              </div>

              <div class="column buttons my-4">
                <b-button 
                v-for="(tag, index) in tags"
                @click="changeTag($event, tag)"
                :key="index" 
                :type="tag===filteredTag ? 'is-danger':'is-danger is-light'"
                >
                  {{tag}}
                </b-button>
              </div>

          </div>
        </b-collapse>

        <p class="is-6 my-4" v-if="!loading">
          <em>showing {{ items.length.toString() + (items.length === 1 ? " project" : " projects")}} 
            in {{ sortPortfolioItemsOrder==="asc" ? "ascending" : "descending" }} 
            order sorted by {{ sortPortfolioItemsBy }}</em>
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
      <template v-else-if="loading && !failed">
        <b-skeleton size="is-large" :count="7"></b-skeleton>
      </template>
      <template v-else-if="failed">
        <ErrorMessage />
      </template>
    </div>
  </section>
</template>

<script>
import PortfolioItem from './PortfolioItem.vue'
import ErrorMessage from './ErrorMessage.vue'

export default {
  name: 'Portfolio',
  data(){
    return{
      selectedTag: 'all',
      sortPortfolioItemsBy: 'id',
      sortPortfolioItemsOrder: 'desc',
      visibleControls: true,
      extendedProjectsView: true,
      sortingOptions:[
        {"name": "id", "label": "id"},
        {"name": "progress", "label": "progress"},
        {"name": "tags", "label": "tags quantity"},
        {"name": "title", "label": "title"}
      ]
    }
  },
  methods:{
    changeTag: function(event, t){
      this.selectedTag = t
    },
    switchSortingOrder: function(){
      this.sortPortfolioItemsOrder = this.sortPortfolioItemsOrder==='asc' ? 'desc' : 'asc'
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
    failed: function(){
      return this.$parent.failed
    },
    items: function(){
      if(this.$parent.projects.length === 0){
        return [];
      } else {
        let portfolioItems = []
        // sorting in desc order by default
        if(this.sortPortfolioItemsBy === "id"){ 
          portfolioItems = [...this.$parent.projects].sort(
            (a,b) => (b.id - a.id));
        } else if(this.sortPortfolioItemsBy === "progress"){
          portfolioItems = [...this.$parent.projects].sort(
            (a,b) => (b.progress - a.progress));
        } else if(this.sortPortfolioItemsBy === "tags"){
          portfolioItems = [...this.$parent.projects].sort(
            (a,b) => (b.tags.length - a.tags.length));
        } else if(this.sortPortfolioItemsBy === "title"){
          portfolioItems = [...this.$parent.projects].sort(
            (a,b) => (b.title.toLowerCase() > a.title.toLowerCase()));
        } else {
          portfolioItems = [...this.$parent.projects].sort(
            (a,b) => (b.id - a.id));
        }
        if(this.sortPortfolioItemsOrder === 'asc'){
          portfolioItems.reverse();
        }
        if(this.selectedTag === "all"){
          return  portfolioItems;
        } else {
          return  portfolioItems.filter( project => project.tags.includes(this.selectedTag));
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
    PortfolioItem,
    ErrorMessage
  },
}
</script>