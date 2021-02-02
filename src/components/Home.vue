<template>
  <div id="home">
    <Header />
    <Banner />
    <AboutMe />
    <WhatsNew />
    <Portfolio />
    <Contact />
    <Footer />
  </div>
</template>

<script>
import Header from './Header.vue'
import Banner from './Banner.vue'
import AboutMe from './AboutMe.vue'
import WhatsNew from './WhatsNew.vue'
import Portfolio from './Portfolio.vue'
import Contact from './Contact.vue'
import Footer from './Footer.vue'

export default {
  name: 'Home',
  components: {
    Header,
    Banner,
    AboutMe,
    WhatsNew,
    Portfolio,
    Contact,
    Footer
  },
  data(){
    return{
      bannerImage: require('@/assets/banner.jpg'),
      defaultImage: require('@/assets/default.jpg'),
      avatarImage: require('@/assets/chris.jpg'),
      loading: true,
      projects: {}
    }
  },
  mounted() {
      this.getProjectsData()
  },
  methods: {
      getProjectsData() {
          this.loading = true
          import("@/data/projects.json")
          .then(({default: json}) => {
            this.loading = false;
            this.projects = json.projects.map( (project) => {
              project.image = project.image ? require('@/assets/' + project.image) : this.defaultImage;
              return project;
          })
          })
      }
  }
}
</script>