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
import {DEFAULT_IMAGE, BASE_URL, IMAGE_FOLDER, PROJECTS_ENDPOINT} from '../constants'
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
      DEFAULT_IMAGE,
      BASE_URL,
      IMAGE_FOLDER,
      PROJECTS_ENDPOINT,
      loading: true,
      failed: false,
      projects: {},
    }
  },
  mounted() {
      this.getProjectsData()
  },
  methods: {
      getProjectsData() {
          this.loading = true
          axios.get(PROJECTS_ENDPOINT)
          .then((response) => {
            this.loading = false;
            this.projects = response.data.map( (project) => {
              project.image = project.image ? `${BASE_URL}/${IMAGE_FOLDER}/${project.image}` : DEFAULT_IMAGE;
              axios.head(project.image)
              .then((response) => {
                if(!response.headers['content-type'].toLowerCase().startsWith('image')){
                  throw new Error("Invalid response - content is not an image.");
                }
              }).catch(() => {
                project.image = DEFAULT_IMAGE;
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