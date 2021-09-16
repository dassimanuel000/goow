<template>
  <div class="content">
    <nuxt-link class="content-item content-item--no-padding" to="/profile"
      >Mon compte</nuxt-link
    >
    <nuxt-link class="content-item" to="/profile/orders"
      >Mes commandes</nuxt-link
    >
    <nuxt-link class="content-item" to="/profile/favorites"
      >Mes favoris</nuxt-link
    >
    <div v-if="$auth.user.is_market">
      <nuxt-link
        :to="`/markets/${$auth.user.market.slug}`"
        class="content-item"
      >
        Gestion du Marché
      </nuxt-link>
      <nuxt-link class="content-item" to="/profile/merchants">
        Gestion des Marchands
      </nuxt-link>
    </div>
    <div v-if="$auth.user.is_merchant">
      <nuxt-link
        v-if="$auth.user.merchant.length <= 1"
        :to="`/markets/${$auth.user.merchant[0].market.slug}/merchants/${$auth.user.merchant[0].slug}`"
        class="content-item"
      >
        Mon stand
      </nuxt-link>
      <nuxt-link v-else to="/profile/stands" class="content-item">
        Mes stands
      </nuxt-link>
    </div>
    <!-- <nuxt-link class="content-item" to="/">Notifications</nuxt-link> -->
    <!-- <nuxt-link class="content-item" to="/">Aide</nuxt-link> -->
    <nuxt-link class="content-item" to="/contact">Contactez-nous</nuxt-link>
    <a class="content-item content-item--no-border" @click="logout()"
      >Se déconnecter</a
    >
  </div>
</template>

<script>
export default {
  name: 'ProfileDropDown',
  methods: {
    logout() {
      this.$store.commit('cart/CLEAR')
      this.$auth.logout()
    },
  },
}
</script>

<style lang="scss" scoped>
.content {
  width: 216px;
  padding: 25px 20px 20px 20px;
  &-item {
    width: 100%;
    padding: 10px 0;
    border-bottom: 1px solid #e4e4e4;
    font-family: Open Sans, serif;
    font-style: normal;
    font-weight: normal;
    font-size: 16px;
    line-height: 22px;
    color: #9a9a9a;
    text-decoration: none;
    display: block;
    cursor: pointer;
    &--no-padding {
      padding-top: 0;
    }
    &--no-border {
      border: none;
    }
  }
  &-item:hover {
    color: #7151b8;
  }
}
</style>
