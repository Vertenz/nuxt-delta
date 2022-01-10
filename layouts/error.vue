<template>
  <v-app dark>
    <div v-if="error.statusCode === 404">
      <section class="not-exist">
        <h5 class="not-exist__title">{{ pageNotFound }}</h5>
        <h6 class="not-exist__text">
          Можете связаться с нами или вернуться на главную
        </h6>
        <NuxtLink to="/">
          <div class="not-exist__button">На главную</div>
        </NuxtLink>
      </section>
    </div>
    <div v-else>
      <section class="not-exist">
        <h5 class="not-exist__title">{{ otherError }}</h5>
        <h6 class="not-exist__text">
          Можете связаться с нами или вернуться на главную
        </h6>
        <NuxtLink to="/">
          <div class="not-exist__button">На главную</div>
        </NuxtLink>
      </section>
    </div>
  </v-app>
</template>

<script>
export default {
  layout: 'empty',
  props: {
    error: {
      type: Object,
      default: null,
    },
  },
  data() {
    return {
      pageNotFound: '404 Страница не найдена',
      otherError: 'Ошибка загрузки страницы',
    }
  },
  head() {
    const title =
      this.error.statusCode === 404 ? this.pageNotFound : this.otherError
    return {
      title,
    }
  },
}
</script>

<style scoped>
.not-exist {
  max-width: 100vw;
  height: 100vh;
  background-color: red;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  border-radius: 5%;
}
.not-exist__title {
  color: #fff;
  font-weight: bold;
  font-size: 5rem;
}
.not-exist__text {
  color: #fff;
  font-size: 2rem;
}
.not-exist__button {
  background-color: #fff;
  color: red;
  box-shadow: 0 4px 4px rgba(0, 0, 0, 0.25);
  padding: 1em 4em;
  font-size: 1.2rem;
}
</style>
