<template>
  <div class="merchant-item__wrap">
    <nuxt-link
      class="nodecoration"
      :to="`/markets/${merchant.market.slug}/merchants/${merchant.slug}`"
    >
      <div class="merchant-item">
        <div class="merchant-item__image-wrap">
          <div v-if="merchant.image">
            <img
              class="merchant-item__image"
              :src="$api_storage_url + merchant.image"
            />
          </div>
          <div v-else>
            <div v-if="merchant.activity.image">
              <img
                class="merchant-item__image"
                :src="$api_storage_url + merchant.activity.image"
              />
            </div>
            <div v-else>
              <img
                class="merchant-item__image"
                :src="$api_storage_url + 'images/merchant/default/Shop.jpg'"
              />
            </div>
          </div>
          <div class="merchant-item__top">
            <div v-if="merchant.today.is_open" class="merchant-item__tag">
              <span></span>
              <p>Ouvert</p>
            </div>
            <div v-else class="merchant-item__tag merchant-item__tag--red">
              <span></span>
              <p>Fermé</p>
            </div>
            <div class="merchant-item__tag num_produit">
              <a style="text-decoration: none" class="text" href="">
                {{ '8 ' }}
              </a>
              <svg
                style="margin-left: 5px"
                xmlns="http://www.w3.org/2000/svg"
                width="16"
                height="16"
                viewBox="0 0 24 24"
                fill="none"
                stroke="#000000"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
              >
                <path
                  d="M6 2L3 6v14c0 1.1.9 2 2 2h14a2 2 0 0 0 2-2V6l-3-4H6zM3.8 6h16.4M16 10a4 4 0 1 1-8 0"
                />
              </svg>
            </div>
            <a
              class="merchant-item__like"
              @click="$like(merchant.slug, 'merchants')"
            >
              <svg
                v-if="!$liked_merchants(merchant.id)"
                width="27"
                height="24"
                viewBox="0 0 27 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M12.9217 3.25261L13.5 3.95308L14.0783 3.25261C15.3573 1.70363 17.2211 0.75 19.26 0.75C23.1113 0.75 26.25 3.98775 26.25 7.98984C26.25 12.6437 23.1004 16.4537 19.776 19.1646C18.1296 20.5072 16.4793 21.5478 15.2387 22.253C14.6193 22.6052 14.1042 22.8725 13.7458 23.0509C13.653 23.0971 13.5708 23.1374 13.5 23.1715C13.4292 23.1374 13.347 23.0971 13.2542 23.0509C12.8958 22.8725 12.3807 22.6052 11.7613 22.253C10.5207 21.5478 8.87036 20.5072 7.22399 19.1646C3.89963 16.4537 0.75 12.6437 0.75 7.98984C0.75 3.98582 3.89059 0.75 7.71 0.75C9.78056 0.75 11.6438 1.70496 12.9217 3.25261Z"
                  fill="black"
                  fill-opacity="0.6"
                  stroke="white"
                  stroke-width="1.5"
                />
              </svg>
              <svg
                v-else
                width="27"
                height="24"
                viewBox="0 0 27 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M12.9314 3.15278L13.5 3.81379L14.0686 3.15278C15.3434 1.67079 17.2094 0.75 19.26 0.75C23.14 0.75 26.25 3.87246 26.25 7.66908C26.25 12.1088 23.1171 15.7566 19.7877 18.3626C18.1415 19.6511 16.4911 20.6499 15.2501 21.3271C14.6305 21.6652 14.1153 21.9219 13.7567 22.0933C13.6591 22.1399 13.5732 22.1802 13.5 22.2141C13.4268 22.1802 13.3409 22.1399 13.2433 22.0933C12.8847 21.9219 12.3695 21.6652 11.7499 21.3271C10.5089 20.6499 8.85846 19.6511 7.21228 18.3626C3.88292 15.7566 0.75 12.1088 0.75 7.66908C0.75 3.87057 3.86187 0.75 7.71 0.75C9.79222 0.75 11.6577 1.67205 12.9314 3.15278Z"
                  fill="#E93F5E"
                  stroke="white"
                  stroke-width="1.5"
                />
              </svg>
            </a>
          </div>
        </div>
        <div class="merchant-item__data">
          <div class="merchant-item__title-category">
            <p class="merchant-item__title">{{ merchant.title }}</p>
            <p
              class="merchant-item__subtitle"
              :style="{ color: merchant.activity.color }"
            >
              {{ merchant.activity.title }}
            </p>
          </div>
          <a
            class="merchant-item__category-icon"
            :style="{ backgroundColor: merchant.activity.color }"
          >
            <img
              :src="$api_storage_url + merchant.activity.icon"
              class="merchant-item__category-img"
            />
          </a>
          <!--
          <div class="merchant-item__grid">
            <div>
              <img
                class="merchant-item__icon"
                src="/icons/round-pushpin_1f4cd 7.svg"
              />
              <p>0.1km</p>
            </div>
            <div>
              <img
                class="merchant-item__icon"
                src="/icons/3acf7049fa43017b1c8754cbedf14a04 10.svg"
              />
              <p>3,50€</p>
            </div>
            <div>
              <img class="merchant-item__icon" src="/icons/image 12.svg" />
              <p>Retrait</p>
            </div>
          </div>
          -->
        </div>
      </div>
    </nuxt-link>
  </div>
</template>

<script>
import training from '~/mixins/favorites'

export default {
  mixins: [training],
  props: {
    merchant: {
      type: Object,
    },
  },
}
</script>

<style lang="scss" scoped>
.nodecoration {
  text-decoration: none;
}
.merchant-item {
  width: 100%;
  height: 270px;
  overflow: hidden;
  background: #ffffff;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
  border-radius: 30px;
  margin: 0 auto;

  &:focus {
    outline: none !important;
  }

  &__wrap {
    width: auto;
  }

  &__top {
    width: 100%;
    display: flex;
    position: absolute;
    top: 0;
    left: 0;
    padding: 15px;
  }

  &__like {
    margin-left: auto;
    cursor: pointer;
  }

  &__tag {
    width: 97px;
    height: 27px;
    background: rgba(0, 0, 0, 0.6);
    border-radius: 15px;
    display: flex;
    justify-content: center;
    align-items: center;

    span {
      width: 9px;
      height: 9px;
      border-radius: 50%;
      background: #4caf50;
      margin-right: 4px;
    }

    p {
      font-family: Open Sans;
      font-style: normal;
      font-weight: 600;
      font-size: 14px;
      line-height: 19px;
      color: #4caf50;
      margin-left: 4px;
    }

    &--red {
      color: #e93f5e;

      span {
        background: #e93f5e;
      }

      p {
        color: #e93f5e;
      }
    }
  }

  &__image-wrap {
    width: 100%;
    height: 197px;
    border-radius: 30px;
    overflow: hidden;
    position: relative;
  }

  &__image {
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
    user-drag: none;
    user-select: none;
    -moz-user-select: none;
    -webkit-user-drag: none;
    -webkit-user-select: none;
    -ms-user-select: none;
    object-fit: cover;
  }

  &__data {
    width: 100%;
    padding: 0 20px;
    position: relative;
  }

  &__category-icon {
    width: 53px;
    height: 53px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    position: absolute;
    right: 16px;
    bottom: 25px;
  }

  &__category-img {
    width: 40px;
    height: 40px;
  }

  &__title-category {
    width: calc(100% - 30px);
  }

  &__title {
    max-width: 215px;
    max-height: 22px;
    overflow: hidden;
    font-family: Open Sans;
    font-style: normal;
    font-weight: 600;
    font-size: 14px;
    line-height: 22px;
    color: #2c2c2c;
    margin: 4px 0 2px 0;
    display: block;
    text-decoration: none;
  }

  &__subtitle {
    font-family: Open Sans;
    font-style: normal;
    font-weight: 600;
    font-size: 12px;
    line-height: 16px;
    color: #9a9a9a;
  }

  &__grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    justify-content: center;
    margin-top: 4px;

    div {
      display: flex;
      align-items: center;
    }

    p {
      font-family: Open Sans;
      font-style: normal;
      font-weight: normal;
      font-size: 12px;
      line-height: 16px;
      color: #9a9a9a;
      margin-left: 8px;
    }
  }

  &__icon {
    height: 20px;
  }
}
</style>

<style>
.num_produit {
  max-width: 70px !important;
  background-color: yellow !important;
  position: relative;
  bottom: -140px;
  right: 97px;
  color: #000;
}
</style>
