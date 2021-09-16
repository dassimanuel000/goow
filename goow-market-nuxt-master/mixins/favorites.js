export default {
  methods: {
    $like(slug, url) {
      if (!this.$auth.loggedIn) {
        this.$router.push('/login')
        return
      }
      this.$axios.post(`${url}/${slug}`).then(() => this.$auth.fetchUser())
      if (url === 'markets') {
        this.$liked_markets()
      }
      if (url === 'merchants') {
        this.$liked_merchants()
      }
    },

    $liked_markets(id) {
      const index = this.$auth.loggedIn
        ? this.$auth.user.liked_markets.findIndex((item) => item.id === id)
        : -1
      return index > -1
    },

    $liked_merchants(id) {
      const index = this.$auth.loggedIn
        ? this.$auth.user.liked_merchants.findIndex((item) => item.id === id)
        : -1
      return index > -1
    },
  },
}
