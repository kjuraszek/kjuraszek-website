<template>
  <section class="section is-info has-background has-background-danger-dark" id="contact">
    <div class="container">
      <h2 class="title has-text-white  is-2">Chapter 4: Contact</h2>
      <p class="subtitle has-text-white"><em>the story ends with a moral - contact with me</em></p>
      <div class="columns is-desktop is-centered">
        <div class="column is-narrow">
          <b-button tag ="a" type="is-light mx-1" icon-pack="fas" icon-left="envelope" :href="`mailto:${CONTACT_EMAIL}`">Stay in touch!</b-button>
        </div>
        <div class="column is-narrow">
          <b-button tag ="a" type="is-light mx-1" icon-pack="fab" icon-left="github" :href="GITHUB_URL" target="_blank">Github</b-button>
        </div>
        <div class="column is-narrow">
          <b-button tag ="a" type="is-light mx-1" icon-pack="fab" icon-left="lastfm-square" :href="LASTFM_URL" target="_blank">What am i listening to?</b-button>
        </div>
        <div class="column is-narrow">
          <b-button tag ="a" type="is-light mx-1" icon-pack="fab" icon-left="linkedin" :href="LINKEDIN_URL" target="_blank">LinkedIn</b-button>
         </div>
      </div>
    </div>
  </section>
</template>

<script>
import {CONTACT_EMAIL, LINKEDIN_URL, LASTFM_URL, GITHUB_URL} from '../constants'

export default {
  name: 'Contact',
  data(){
    return{
      CONTACT_EMAIL,
      LINKEDIN_URL,
      LASTFM_URL,
      GITHUB_URL,
    }
  },
}
</script>
