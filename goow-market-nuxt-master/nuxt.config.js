require('dotenv').config()
export default {
  env: {
    apiUrl: process.env.API_BASE_URL,
  },
  loading: '~/components/LoadingBar.vue',
  head: {
    title: 'GOOW',
    htmlAttrs: {
      lang: 'en',
    },
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: '' },
    ],
    link: [
      { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' },
      {
        rel: 'stylesheet',
        href:
          'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;1,100;1,200;1,300;1,400&display=swap',
      },
      {
        rel: 'stylesheet',
        href:
          'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap',
      },
    ],
    script: [{ src: 'https://js.stripe.com/v3/' }],
  },

  css: [{ src: '~/assets/app.scss', lang: 'sass' }],

  plugins: [
    '~/plugins/mixin',
    '~/plugins/vue2-google-maps',
    '~/plugins/vue-observe-visibility',
    { src: '~/plugins/vue-range-slider', ssr: false },
    { src: '~/plugins/vuex-persistedstate', ssr: false },
    { src: '~/plugins/vue-datepicker', ssr: false },
    { src: '~/plugins/vuedraggable', ssr: false },
    { src: '~/plugins/vue-smooth-picker', ssr: false },
  ],

  components: [
    '~/components',
    { path: '~/components/event', prefix: 'event' },
    { path: '~/components/product', prefix: 'product' },
    { path: '~/components/shop', prefix: 'shop' },
    { path: '~/components/order', prefix: 'order' },
    { path: '~/components/modal', prefix: 'modal' },
    { path: '~/components/merchant', prefix: 'merchant' },
    { path: '~/components/profile', prefix: 'profile' },
    { path: '~/components/profile/form', prefix: 'profile-form' },
  ],

  buildModules: ['@nuxtjs/eslint-module'],

  modules: [
    '@nuxtjs/axios',
    '@nuxtjs/auth',
    '@nuxtjs/dotenv',
    '@nuxtjs/moment',
    'vue-sweetalert2/nuxt',
  ],

  moment: {
    locales: ['fr'],
  },

  axios: {
    baseURL: process.env.API_URL,
    debug: process.env.AXIOS_DEBUG_MODE,
  },

  auth: {
    redirect: {
      home: false,
    },
    strategies: {
      local: {
        endpoints: {
          login: {
            url: 'auth/login',
            method: 'post',
            propertyName: 'access_token',
          },
          user: {
            url: 'auth/user',
            method: 'get',
            propertyName: 'data',
          },
          logout: {
            url: 'auth/logout',
            method: 'get',
            propertyName: false,
          },
        },
      },
    },
    plugins: [{ src: '~/plugins/echo', ssr: false }],
  },

  build: {},
}
