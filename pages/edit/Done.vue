<template>
  <v-container>
    <v-row justify="center" align="center">
      <h2>Спасибо за доверие!</h2>
    </v-row>
    <v-row justify="center" align="center">
      <h3>
        Ваша заявка принята. В ближайшее время с Вами свяжутся для уточнения
        деталей.
      </h3>
      <p>В скором времени вы будете перенаправлены на главную страницу</p>
    </v-row>
    <v-row justify="center" align="center">
      <NuxtLink to="/" no-prefetch>
        <div class="done__button">На главную</div>
      </NuxtLink>
    </v-row>
    <v-row align="center" justify="center">
      <v-img src="~/assets/newIcon/logoDelta.svg"></v-img>
    </v-row>
  </v-container>
</template>

<script>
export default {
  name: 'Done',
  mounted() {
    setTimeout(() => {
      this.$router.replace({ path: '/' })
    }, 5000)
  },
}
</script>
