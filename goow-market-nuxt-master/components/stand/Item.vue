<template>
  <div class="merchant-item__wrap">
    <p class="marketTitle">
      {{ merchant.market.title }},
      {{ merchant.market.city.name }}
    </p>
    <div class="merchant-item">
      <nuxt-link
        class="nodecoration"
        :to="`/markets/${merchant.market.slug}/merchants/${merchant.slug}`"
      >
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
              <img class="merchant-item__image" />
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
        </div>
      </nuxt-link>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    merchant: {
      type: Object,
    },
  },
}
</script>

<style lang="scss" scoped>
.marketTitle {
  font-family: Open Sans;
  font-style: normal;
  font-weight: 600;
  font-size: 14px;
  line-height: 16px;
}
.nodecoration {
  text-decoration: none;
}
.merchant-item {
  max-width: 350px;
  width: 100%;
  height: 270px;
  overflow: hidden;
  background: #ffffff;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
  border-radius: 30px;
  margin: 20px 0px 10px 15px;
  @media screen and (max-width: 1024px) {
    margin: 20px 0px;
  }

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
