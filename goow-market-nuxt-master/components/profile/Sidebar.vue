<template>
  <div class="profile">
    <div class="profile__sidebar">
      <nuxt-link to="/profile" class="profile__sidebar-item"
        >Mon compte</nuxt-link
      >
      <div v-if="!$auth.user.is_market">
        <nuxt-link to="/profile/orders" class="profile__sidebar-item"
          >Mes commandes</nuxt-link
        >
        <nuxt-link to="/profile/favorites" class="profile__sidebar-item"
          >Mes favoris</nuxt-link
        >
      </div>
      <div v-if="$auth.user.is_market">
        <nuxt-link
          :to="`/markets/${$auth.user.market.slug}`"
          class="profile__sidebar-item"
        >
          Gestion du marché
        </nuxt-link>
        <nuxt-link to="/profile/merchants" class="profile__sidebar-item">
          Gestion des Marchands
        </nuxt-link>
        <nuxt-link to="/profile/clients" class="profile__sidebar-item">
          Clients
        </nuxt-link>
      </div>
      <div v-if="$auth.user.is_merchant">
        <div v-if="$auth.user.merchant.length <= 1">
          <nuxt-link
            :to="`/markets/${$auth.user.merchant[0].market.slug}/merchants/${$auth.user.merchant[0].slug}`"
            class="profile__sidebar-item"
          >
            Mon stand
          </nuxt-link>
        </div>
        <div v-else>
          <nuxt-link to="/profile/stands" class="profile__sidebar-item">
            Mes stands
          </nuxt-link>
        </div>
        <nuxt-link to="/profile/clients" class="profile__sidebar-item">
          Clients
        </nuxt-link>
      </div>
      <!-- <nuxt-link to="/" class="profile__sidebar-item">Notifications</nuxt-link> -->
      <nuxt-link
        to="/contact"
        class="profile__sidebar-item profile__sidebar-item--no-border"
        >Contactez-nous</nuxt-link
      >
    </div>
  </div>
</template>

<script>
export default {}
</script>

<style lang="scss" scoped>
.profile {
  display: flex;

  &__sidebar {
    width: 386px;
    min-height: 100vh;
    background: #f9f9f9;
    padding: 0 25px;
    @media screen and (max-width: 1024px) {
      display: none;
    }
  }

  &__sidebar-item {
    font-family: Open Sans;
    font-style: normal;
    font-weight: normal;
    font-size: 18px;
    line-height: 25px;
    color: #9a9a9a;
    display: block;
    text-decoration: none;
    padding: 30px 12px;
    border-bottom: 1px solid #e6e6e6;
    &.nuxt-link-exact-active {
      color: #3b1099;
    }
    &--no-border {
      border-bottom: none;
    }
  }

  &__content {
    width: 100%;
    min-height: 100vh;
    padding: 40px 0 80px 80px;
    background: #fff;
    @media screen and (max-width: 1024px) {
      padding: 40px 20px 80px 20px;
    }
  }
}
</style>
