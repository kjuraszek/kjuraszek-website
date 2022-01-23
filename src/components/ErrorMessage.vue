<template>
  <div class="columns is-centered">
    <div class="column is-half-desktop is-one-third-widescreen">
        <b-message 
            title="Error loading data" 
            type="is-dark"
            size="is-medium" 
            has-icon icon="exclamation-triangle"
            :closable="false">
            Unfortunately an error occurred on data load. Please refresh the page.
        </b-message>
    </div>
  </div>
</template>

<script>
export default {
  name: 'ErrorMessage',
}
</script>
