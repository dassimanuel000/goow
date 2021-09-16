<template>
  <div class="merchant-item__wrap">
    <div class="merchant-item">
      <div class="merchant-item__image-wrap">
        <img
          class="merchant-item__image"
          :src="$api_storage_url + shop.image"
        />
        <div class="merchant-item__top">
          <div v-if="shop.is_open" class="merchant-item__tag">
            <span></span>
            <p>Ouvert</p>
          </div>
          <div v-else class="merchant-item__tag merchant-item__tag--red">
            <span></span>
            <p>Fermé</p>
          </div>
          <a
            :class="[$liked_merchants(shop.id) ? 'active' : '']"
            class="merchant-item__like"
            @click="$like(shop.slug, 'merchants')"
          >
            <svg
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
          </a>
        </div>
      </div>
      <div class="merchant-item__data">
        <div class="merchant-item__title-category">
          <p class="merchant-item__title">{{ shop.title }}</p>
          <p
            class="merchant-item__subtitle"
            :style="{ color: shop.activity.color }"
          >
            {{ shop.activity.title }}
          </p>
        </div>
        <a
          class="merchant-item__category-icon"
          :style="{ backgroundColor: shop.activity.color }"
        >
          <img :src="$api_storage_url + shop.activity.icon" />
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
  </div>
</template>

<script>
import training from '~/mixins/favorites'

export default {
  mixins: [training],
  props: {
    shop: {
      type: Object,
    },
  },
}
</script>

<style lang="scss" scoped>
.merchant-item {
  width: 292px;
  height: 292px;
  overflow: hidden;
  background: #ffffff;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
  border-radius: 30px;
  margin: 0 auto;

  &:focus {
    outline: none !important;
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
    &.active {
      background: #fff;
    }
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
    bottom: 42px;
  }

  &__title-category {
    width: calc(100% - 80px);
  }

  &__title {
    font-family: Open Sans;
    font-style: normal;
    font-weight: 600;
    font-size: 16px;
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
