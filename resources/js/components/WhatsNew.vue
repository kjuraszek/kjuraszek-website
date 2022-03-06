<template>
  <section class="section is-info has-background has-background-danger-dark" id="whatsnew">
    <div class="container">
      <h2 class="title has-text-white  is-2">Chapter 2: What's New?</h2>
      <p class="subtitle has-text-white"><em>latest adventures of our figure</em></p>
      <template v-if="!loading && !failed">
      <b-carousel-list
        v-model="values"
        :data="items"
        :arrow="arrow"
        :arrow-hover="arrowHover"
        :items-to-show="perList"
        :items-to-list="increment"
        :repeat="repeat"
        :has-drag="drag"
        :has-grayscale="gray"
        :has-opacity="opacity"
        :icon-pack="iconPack"
        :icon-size="iconSize"
        :icon-prev="iconPrev"
        :icon-next="iconNext"
        />
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
import ErrorMessage from './ErrorMessage.vue'

export default {
  name: 'WhatsNew',
  data(){
        return {
          arrow: true,
            arrowHover: false,
            drag: true,
            gray: false,
            opacity: false,
            values: 0,
            perList: 3,
            increment: 1,
            iconPack: "fas",
            iconPrev: "arrow-left",
            iconNext: "arrow-right",
            iconSize: "is-medium",
            repeat: false
        }
    },

  mounted() {
    this.onResize();
    this.$nextTick(() => {
      window.addEventListener('resize', this.onResize);
    })
  },
  computed:{
    loading: function(){
      return this.$parent.loading
    },
    failed: function(){
      return this.$parent.failed
    },
    items: function(){
      // sorting items from newest (highest id) and limiting to max 5 items
      return this.$parent.projects.length > 0 ? 
      [...this.$parent.projects].sort((a,b) => b.id - a.id).slice( 0, 
      (this.$parent.projects.length > 5 ? 5 : this.$parent.projects.length) ) : []
    }
  },

  beforeDestroy() { 
    window.removeEventListener('resize', this.onResize); 
  },

  methods: {  
    onResize() {
      if(window.innerWidth < 768){
        this.perList = 1;
      } else if(window.innerWidth < 992){
        this.perList = 2;
      } else if(window.innerWidth < 1200){
        this.perList = 3;
      } else {
        this.perList = 4;
      }
    }
  },

  components:{
    ErrorMessage
  },
}
</script>
