<template>
  <section class="section is-info has-background has-background-danger-dark" id="whatsnew">
    <div class="container">
      <h2 class="title has-text-white  is-2">Chapter 2: What's New?</h2>
      <p class="subtitle has-text-white"><em>latest adventures of our figure</em></p>
      <template v-if="!loading">
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
        <b-skeleton size="is-large" :count="7" :active="loading"></b-skeleton>
    </div>
  </section>
</template>

<script>
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
    items: function(){
      return this.$parent.projects.length > 0 ? [...this.$parent.projects].sort((a,b) => b.id - a.id) : []
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
  }
}
</script>
