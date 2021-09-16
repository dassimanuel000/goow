import Vue from 'vue'
import Echo from 'laravel-echo'

export default ({ app }) => {
  const echo = {}

  echo.install = function (Vue) {
    Vue.prototype.$pusher = require('pusher-js')
    Vue.prototype.$echo = new Echo({
      auth: {
        headers: {
          Authorization: app.$auth.getToken('local'),
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

  Vue.use(echo)
}
