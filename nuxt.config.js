export default {
  // Global page headers: https://go.nuxtjs.dev/config-head
  head: {
    titleTemplate: '%s - Дельта',
    title: 'Аварком',
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { name: 'robots', content: 'noindex, nofollow' },
      { hid: 'description', name: 'description', content: '' },
    ],
    link: [{ rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' }],
  },

  // Global CSS: https://go.nuxtjs.dev/config-css
  css: [],

  // Plugins to run before rendering page: https://go.nuxtjs.dev/config-plugins
  plugins: [],

  // Auto import components: https://go.nuxtjs.dev/config-components
  components: true,

  // Modules for dev and build (recommended): https://go.nuxtjs.dev/config-modules
  buildModules: [
    // https://go.nuxtjs.dev/eslint
    '@nuxtjs/eslint-module',
    // https://go.nuxtjs.dev/stylelint
    '@nuxtjs/stylelint-module',
    // https://go.nuxtjs.dev/vuetify
    '@nuxtjs/vuetify',
    '@nuxtjs/pwa',
  ],

  // Modules: https://go.nuxtjs.dev/config-modules
  modules: [
    // https://go.nuxtjs.dev/axios
    '@nuxtjs/axios',
    // https://go.nuxtjs.dev/pwa
    '@nuxtjs/pwa',
    // https://github.com/nuxt-community/robots-module
    '@nuxtjs/robots',
  ],

  robots: {
    UserAgent: '*',
    Disallow: '*',
  },

  // Axios module configuration: https://go.nuxtjs.dev/config-axios
  axios: {
    baseURL: 'https://deltapilot.xyz/',
  },

  pwa: {
    manifest: {
      name: 'avarcom',
      lang: 'ru',
      description: 'служба аварийных коммисаров',
      background_color: '#121212',
      theme_color: '#b71c1c',
      start_url: 'https://deltapilot.xyz/',
    },
    icons: {
      iconFileName:
        process.env.NODE_ENV === 'staging' ? 'icon_dev.png' : 'icon.png',
    },
  },

  vuetify: {
    theme: {
      options: {
        customProperties: true,
      },
      dark: true,
      themes: {
        dark: {
          primary: '#FFF',
          secondary: '#424242',
          accent: '#121212',
          error: '#FF5252',
          info: '#2196F3',
          success: '#4CAF50',
          warning: '#FFC107',
        },
        light: {
          primary: '#000',
          secondary: '#424242',
          accent: '#EAF0EE',
          error: '#FF5252',
          info: '#2196F3',
          success: '#4CAF50',
          warning: '#FFC107',
        },
      },
    },
  },
  build: {},

  server: {
    port: 3000,
  },
}
