import Vue from 'vue'
import Echo from 'laravel-echo'
import Errors from '~/lib/Errors'

Vue.mixin({
  data() {
    return {
      errors: new Errors(),
      echo: null,
    }
  },
  computed: {
    $api_storage_url() {
      return process.env.API_BASE_URL + '/storage/'
    },
    $echo() {
      if (!this.echo) {
        this.$connect()
        return this.echo
      }
      return this.echo
    },
  },
  methods: {
    $price(number) {
      return new Intl.NumberFormat('de-DE', {
        style: 'currency',
        currency: 'EUR',
      }).format(number)
    },
    $connect() {
      if (!this.echo) {
        this.echo = new Echo({
          auth: {
            headers: {
              Authorization: this.$auth.getToken('local'),
            },
          },
          broadcaster: 'pusher',
          authModule: true,
          connectOnLogin: true,
          disconnectOnLogout: true,
          authEndpoint: process.env.API_BASE_URL + '/api/broadcasting/auth',
          key: process.env.PUSHER_APP_KEY,
          cluster: process.env.PUSHER_APP_CLUSTER,
          forceTLS: true,
          encrypted: process.env.PUSHER_APP_ENCRYPTED,
        })
      }
    },
  },
})
