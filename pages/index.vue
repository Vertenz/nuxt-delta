<template>
  <v-container class="mt-4">
    <ButtonSection />
    <v-lazy
      v-model="servicesShow"
      :options="{ threshold: 1 }"
      transition="fade-transition"
    >
      <LazyOurServices v-if="servicesShow" />
    </v-lazy>
    <v-lazy
      v-model="contactShow"
      :options="{ threshold: 1 }"
      transition="fade-transition"
    >
      <LazyContacts v-if="contactShow" />
    </v-lazy>
  </v-container>
</template>

<script>
export default {
  data() {
    return {
      loading: false,
      servicesShow: false,
      contactShow: false,
    }
  },
  head() {
    return {
      title: 'Автоэкспертиза',
    }
  },
  methods: {
    nextSection() {
      if (this.servicesShow === true) {
        this.contactShow = true
      } else {
        this.servicesShow = true
      }
    },
  },
}
</script>
