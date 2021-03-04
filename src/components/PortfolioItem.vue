<template>
    <div class="column is-half-desktop is-one-third-widescreen is-one-quarter-fullhd">
        <article class="card">
          <template v-if="extended">
            <div class="card-image has-background-black">
                <b-image :src="item.image" ratio="is-4by3" :alt="item.title"></b-image>
            </div>
            <div class="card-content">
              <h3 class="title is-3">{{item.title}}</h3>
              <hr>
              <b-taglist>
                <b-tag v-for="tag in item.tags" :key="tag">{{ tag }}</b-tag>
              </b-taglist>
              <p>Progress:</p>
              <b-progress v-if="item.progress" :value="item.progress" type="is-success" show-value></b-progress>
              <b-progress v-else :value="0"></b-progress>
              <div class="content">
                {{item.desc}}
              </div>
              <div class="columns">
                <div class="column is-half">
                  <b-button v-if="item.github" type="is-primary" tag="a" :href="item.github" target="_blank" icon-pack="fab" icon-left="github" expanded>Github</b-button>
                  <b-button v-else type="is-light" icon-pack="fab" icon-left="github" disabled expanded>Github</b-button>
                </div>
                <div class="column is-half">
                  <b-button v-if="item.demo" type="is-warning" tag="a" :href="item.demo" target="_blank" icon-pack="fas" icon-left="play-circle" expanded>Live demo</b-button>
                  <b-button v-else type="is-warning" icon-pack="fas" icon-left="play-circle" disabled expanded>Live demo</b-button>
                </div>
              </div>
            </div>
          </template>
          <template v-else>
              <div class="card-content">
                <h3 class="title is-3">{{item.title}}</h3>
                <hr>
                <div class="content">
                  {{item.desc}}
                </div>
                <div class="columns">
                  <div class="column is-half">
                    <b-button v-if="item.github" type="is-primary" tag="a" :href="item.github" target="_blank" icon-pack="fab" icon-left="github" expanded>Github</b-button>
                    <b-button v-else type="is-light" icon-pack="fab" icon-left="github" disabled expanded>Github</b-button>
                  </div>
                  <div class="column is-half">
                    <b-button v-if="item.demo" type="is-warning" tag="a" :href="item.demo" target="_blank" icon-pack="fas" icon-left="play-circle" expanded>Live demo</b-button>
                    <b-button v-else type="is-warning" icon-pack="fas" icon-left="play-circle" disabled expanded>Live demo</b-button>
                  </div>
                </div>
            </div>
          </template>
        </article> 
      </div>
</template>

<script>
export default {
  name: 'PortfolioItem',
  props: ['item','extended']
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
article, .card {
  height:100%;
}
.card-image .image{
  opacity:0.8;
}
</style>