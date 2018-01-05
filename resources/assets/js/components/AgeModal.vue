<template>
  <section>
    <modal v-model="open1" ref="modal" :footer="false" :backdrop="false" :dismiss-btn="false" :keyboard="false" class="text-center">
        <span slot="title"><h4 class="modal-title text-center">{{ title }}</h4></span>
        <a href="/age" type="button" class="btn btn-tan btn-padded btn-twentyone">I am over 21 years old</a>
        <a type="button" class="btn btn-red btn-padded" href="/">I am under 21 years old</a>
    </modal>
  </section>
</template>
<script>
  export default {
    data () {
      return {
        open1: true
      }
    },
    props: ['title'],
    methods: {
        show: true
    }
  }
</script>
