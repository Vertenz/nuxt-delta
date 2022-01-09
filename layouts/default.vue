<template>
  <v-app root>
    <v-navigation-drawer
      v-model="drawer"
      :mini-variant="miniVariant"
      :clipped="clipped"
      :src="require('static/backmain.png')"
      class="nav"
      fixed
      app
      nuxt
    >
      <v-list class="mt-10">
        <v-switch
          v-model="$vuetify.theme.dark"
          inset
          label="Поменять тему"
          persistent-hint
          class="nav__theme-switch"
        ></v-switch>
        <v-list-item
          v-for="(item, i) in items"
          :key="i"
          :to="item.to"
          nuxt
          router
          exact
          no-prefetch
          class="menu__item"
        >
          <v-list-item-action>
            <v-icon>{{ item.icon }}</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title class="menu__text" v-text="item.title" />
          </v-list-item-content>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>
    <v-app-bar :clipped-left="clipped" fixed app>
      <v-app-bar-nav-icon title="меню" @click.stop="drawer = !drawer" />
      <v-spacer></v-spacer>
      <div class="header__title">
        <NuxtLink to="/" class="header__href" no-prefetch>
          <v-img
            :src="require('../static/newIcon/logoDelta.svg')"
            alt="ГС Дельта"
            max-width="180"
            max-height="178"
          />
        </NuxtLink>
      </div>
      <v-spacer></v-spacer>
      <div class="header__tel">
        <a :href="'tel:' + $store.state.phone"
          ><v-icon>mdi-cellphone-wireless</v-icon></a
        >
      </div>
    </v-app-bar>
    <v-main>
      <v-container>
        <nuxt />
      </v-container>
    </v-main>
    <v-footer :absolute="!fixed" class="center" app>
      <span class="center">
        &copy; {{ new Date().getFullYear() }} Группа содействия "Дельта".
      </span>
    </v-footer>
  </v-app>
</template>

<script>
export default {
  data() {
    return {
      clipped: false,
      drawer: false,
      fixed: false,
      items: [
        {
          icon: 'mdi-home',
          title: 'На главную',
          to: '/',
        },
        {
          icon: 'mdi-clipboard-list',
          title: 'Услуги / Цены',
          to: '/services',
        },
        {
          icon: 'mdi-book-open-page-variant',
          title: 'О нас',
          to: '/aboutus',
        },
        {
          icon: 'mdi-account-question',
          title: 'Ответы на вопросы',
          to: '/question',
        },
        {
          icon: 'mdi-file-document-edit',
          title: 'Европротокол',
          to: '/evroprotokol',
        },
        {
          icon: 'mdi-contacts',
          title: 'Контакты',
          to: '/contact',
        },
        {
          icon: 'mdi-car-cog',
          title: 'Вызвать эксперта',
          to: '/expert',
        },
      ],
      miniVariant: false,
      light: false,
    }
  },
}
</script>
<style lang="scss">
.center {
  display: flex;
  justify-content: center;
  align-items: center;
}

.header__title {
  display: flex;
  align-items: center;
}

.header__tel {
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
}

.menu__item {
  margin-bottom: 11%;
}

.menu__text {
  font-size: 1.2rem;
  white-space: normal;
}

.nav {
  max-height: 100% !important;
  &__theme-switch {
    padding-left: 2em;
  }
}

.alert {
  color: red;
}
</style>
