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
      bannerImage: process.env.MIX_BASE_URL + '/img/banner.jpg',
      defaultImage: process.env.MIX_BASE_URL + '/img/default.jpg',
      avatarImage: process.env.MIX_BASE_URL + '/img/chris.jpg',
      contactEmail: process.env.MIX_VUE_APP_CONTACT_EMAIL,
      linkedInUrl: process.env.MIX_VUE_APP_LINKEDIN_URL,
      lastFmUrl: process.env.MIX_VUE_APP_LASTFM_URL,
      githubUrl: process.env.MIX_VUE_APP_GITHUB_URL,
      loading: true,
      failed: false,
      projects: {}
    }
  },
  mounted() {
      this.getProjectsData()
  },
  methods: {
      getProjectsData() {
          this.loading = true
          axios.get(process.env.MIX_BASE_URL+"/data/projects.json")
          .then((response) => {
            this.loading = false;
            this.projects = response.data.map( (project) => {
              project.image = project.image ? `${process.env.MIX_BASE_URL}/img/${project.image}` : this.defaultImage;
              axios.head(project.image)
              .then((response) => {
                if(!response.headers['content-type'].toLowerCase().startsWith('image')){
                  throw new Error("Invalid response - content is not an image.");
                }
              }).catch(() => {
                project.image = this.defaultImage;
              });
              return project;
            })
          })
          .catch(error => {
            console.log(error);
            this.loading = false;
            this.failed = true;
          })
      }
  }
}
</script>