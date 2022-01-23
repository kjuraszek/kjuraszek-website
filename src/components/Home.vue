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
import axios from 'axios';

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
      bannerImage: process.env.BASE_URL + 'img/banner.jpg',
      defaultImage: process.env.BASE_URL + 'img/default.jpg',
      avatarImage: process.env.BASE_URL + 'img/chris.jpg',
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
          axios.get(process.env.BASE_URL+"data/projects.json")
          .then((response) => {
            this.loading = false;
            this.projects = response.data.map( (project) => {
              project.image = project.image ? `${process.env.BASE_URL}img/${project.image}` : this.defaultImage;
              return project;
          })
          })
          .catch(error => {
            console.log(error);
          })
      }
  }
}
</script>