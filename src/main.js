import Vue from 'vue'
import VueRouter from 'vue-router'
import App from './App.vue'
import Home from './components/Home.vue'

import Buefy from 'buefy'
import 'buefy/dist/buefy.css'

import VueSmoothScroll from 'vue2-smooth-scroll'

import { library } from '@fortawesome/fontawesome-svg-core'
import { faArrowLeft, faArrowRight, faPlayCircle, faEnvelope, faSortNumericDown, faSortNumericUp } from '@fortawesome/free-solid-svg-icons'
import { faGithub, faLastfmSquare, faLinkedin } from '@fortawesome/free-brands-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

Vue.use(VueRouter)
Vue.use(Buefy, {
  defaultIconComponent: 'font-awesome-icon',
  defaultIconPack: 'fas',
});
Vue.use(VueSmoothScroll)

library.add({faArrowLeft, faArrowRight, faPlayCircle, faEnvelope, faGithub, faLastfmSquare, faLinkedin, faSortNumericDown, faSortNumericUp})

Vue.component('font-awesome-icon', FontAwesomeIcon)

const router = new VueRouter({
  mode: 'history',
  base: __dirname,
  routes: [
    { 
      path: '/', 
      component: Home 
    },
    {
      path: '*',
      name: 'catchAll',
      component: Home
    }
  ]
})

Vue.config.productionTip = false

new Vue({
  router,
  render: h => h(App),
}).$mount('#app')
