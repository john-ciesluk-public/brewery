<template>
  <section>
    <a href="#" type="primary" @click="open=true">{{ title }}</a>
    <modal v-model="open" @hide="callback" ref="modal" :footer="false">
        <span slot="title"><h2 class="modal-title" id="events-modal-title">{{ title }}</h2></span>
        <p class="modal-description" align="justify" id="events-modal-description">{{ description }}</p>
    </modal>
  </section>
</template>
<script>
  export default {
    data () {
      return {
        open: false
      }
    },
    props: ['title','description']
  }
</script>
