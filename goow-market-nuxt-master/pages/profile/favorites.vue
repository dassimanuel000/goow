<template>
  <div class="profile">
    <ProfileSidebar />
    <div class="profile__content">
      <p class="profile__title">Mes favoris</p>
      <div class="profile__row">
        <button
          :class="[type === 'MARKETS' ? 'active' : '']"
          class="profile__button"
          @click="type = 'MARKETS'"
        >
          Marchés
        </button>
        <button
          :class="[type === 'COMMERCES' ? 'active' : '']"
          class="profile__button"
          @click="type = 'COMMERCES'"
        >
          Marchands
        </button>
      </div>
      <div v-if="type === 'MARKETS'">
        <div
          v-for="(items, index) in this.$auth.user.liked_markets"
          :key="index"
          class="box active"
        >
          <div class="box__image">
            <img :src="$api_storage_url + items.image" />
          </div>
          <div class="box__wrap">
            <div class="box__top">
              <a :href="'/markets/' + items.slug" class="box__name">{{
                items.title
              }}</a>
            </div>
            <div class="box__bottom">
              <span class="box__address">{{
                JSON.parse(items.address).value
              }}</span>
            </div>
          </div>
          <a
            :class="[$liked_markets(items.id) ? 'active' : '']"
            class="box__favorites"
            @click="$like(items.slug, 'markets'), reload()"
            ><img src="/icons/favorites.svg"
          /></a>
        </div>
      </div>
      <div v-if="type === 'COMMERCES'">
        <div
          v-for="(items, index) in this.$auth.user.liked_merchants"
          :key="index"
          class="box active"
        >
          <div class="box__image">
            <img :src="$api_storage_url + items.image" />
          </div>
          <div class="box__wrap">
            <div class="box__top">
              <a
                :href="
                  '/markets/' + items.market.slug + '/merchants/' + items.slug
                "
                class="box__name"
                >{{ items.title }}</a
              >
            </div>
            <div class="box__bottom">
              <span
                class="box__activity"
                :style="activityColor(items.activity.color)"
                >{{ items.activity.title }}</span
              >
            </div>
          </div>
          <a
            :class="[$liked_merchants(items.id) ? 'active' : '']"
            class="box__favorites"
            @click="$like(items.slug, 'merchants'), reload()"
            ><img src="/icons/favorites.svg"
          /></a>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import training1 from '~/mixins/favorites'
export default {
  mixins: [training1],
  data() {
    return {
      type: 'MARKETS',
      isHidden: false,
    }
  },

  methods: {
    activityColor(hexaColor) {
      return {
        color: hexaColor,
      }
    },
    reload() {
      this.$forceUpdate()
    },
  },
}
</script>
<style lang="scss" scoped>
.profile {
  display: flex;

  .box {
    max-width: 716px;
    background: #ffffff;
    box-shadow: 0 6px 8px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    padding: 10px 10px 10px 10px;
    margin-bottom: 10px;
    display: flex;

    &__wrap {
      width: calc(100% - 50px);
      margin-left: 15px;
    }

    &__top {
      display: flex;
      align-items: center;
    }

    &__image {
      img {
        vertical-align: middle;
        border-radius: 50%;
        width: 56.5px;
        height: 56.5px;
      }
    }

    &__name {
      text-decoration: none;
      font-family: Open Sans;
      font-style: normal;
      font-weight: 600;
      font-size: 14px;
      line-height: 19px;
      text-transform: capitalize;
      color: #565656;
    }

    &__address {
      font-family: Open Sans;
      font-style: normal;
      font-weight: normal;
      font-size: 12px;
      line-height: 16px;
      color: #9a9a9a;
    }

    &__activity {
      font-family: Open Sans;
      font-style: normal;
      font-weight: normal;
      font-size: 12px;
      line-height: 16px;
    }

    &__favorites {
      // &.active {
      //   background: rgba(145, 42, 29, 0.99);
      // }
      cursor: pointer;
    }
  }
  &__sidebar {
    width: 386px;
    min-height: 100vh;
    background: #f9f9f9;
    padding: 0 25px;
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
    padding: 40px 20px 80px 20px;
    background: #fff;
  }

  &__title {
    font-family: Montserrat;
    font-style: normal;
    font-weight: 600;
    font-size: 20px;
    line-height: 24px;
    color: #c4c4c4;
  }

  &__row {
    display: flex;
    margin: 20px 0;
  }

  &__button {
    width: 129px;
    height: 40px;
    font-family: Open Sans;
    font-style: normal;
    font-weight: 600;
    font-size: 14px;
    line-height: 19px;
    color: #565656;
    box-sizing: border-box;
    border-radius: 30px;
    border: none;
    background: #fff;
    cursor: pointer;
    &.active {
      color: #3b1099;
      border: 2px solid #3b1196;
    }
  }
}
</style>
