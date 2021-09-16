<template>
  <div class="merchant-item__wrap">
    <div class="merchant-item">
      <div class="merchant-item__image-wrap">
        <img
          :id="'item_image_' + product.id"
          class="merchant-item__image"
          :src="$api_storage_url + product.image"
        />
        <!-- <div class="merchant-item__top">
          <img class="merchant-item__country" src="/icons/france.png" />
        </div> -->
        <div
          v-if="$store.getters['cart/hasProduct'](product.id)"
          class="merchant-item__middle"
        >
          <button
            class="merchant-item__btn merchant-item__btn--minus"
            @click="remove"
          ></button>
          <p class="merchant-item__quantity">{{ productCart.quantity }}</p>
          <button
            class="merchant-item__btn merchant-item__btn--plus"
            @click="$store.commit('cart/INCREASE', productCart)"
          ></button>
        </div>
      </div>
      <div class="merchant-item__data">
        <div class="merchant-item__title-category">
          <div class="merchant-item__title">{{ product.title }}</div>
          <!-- <p class="merchant-item__subtitle"> -->
          <div style="display: flex">
            <div v-if="product.unit.id == 5 && product.unit_quantity > 1">
              <p class="merchant-item__subtitle">
                {{ product.unit_quantity }} pièces
              </p>
            </div>
            <div v-else-if="product.unit.id == 5 && product.unit_quantity == 1">
              <p class="merchant-item__subtitle">
                {{ product.unit_quantity }} pièce
              </p>
            </div>
            <div v-else>
              <p class="merchant-item__subtitle">
                {{ product.unit_quantity + product.unit.unit }}
              </p>
            </div>
            <div>
              <p class="merchant-item__subtitlePrice">
                {{ priceByUnit(product) }}
              </p>
            </div>
          </div>
          <!--</p>-->
          <p class="merchant-item__price">{{ product.price }}€</p>
        </div>
        <div v-if="isMyMerchant" class="merchant-item__updatedescription">
          <a
            target="_blank"
            class="merchant-item__updatedescriptionicone"
            @click="$nuxt.$emit('open-add-modal', product)"
          >
            <svg
              width="15"
              height="20"
              viewBox="0 0 15 20"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M14.7794 2.59091C14.5588 1.94318 14.1176 1.29545 13.2353 0.647727C12.5735 0.215909 11.9118 0 11.0294 0C10.1471 0 9.48529 0.431818 9.04412 1.07955L1.10294 12.3068C0.661765 12.5227 0.441176 13.1705 0.220588 15.7614C0 17.0568 0 18.3523 0 18.3523C0 18.3523 0 18.3523 0 18.5682C0 19 0.441176 19.2159 0.661765 19C0.661765 19 0.661765 19 0.882353 19C0.882353 19 1.98529 18.5682 3.30882 17.9205C5.73529 16.8409 6.17647 16.4091 6.39706 15.9773L14.5588 4.75C15 4.10227 15 3.45455 14.7794 2.59091ZM12.5735 1.72727C13.0147 2.15909 13.4559 2.59091 13.4559 3.02273C13.6765 3.45455 13.4559 3.88636 13.4559 4.10227C13.2353 4.31818 13.0147 4.53409 12.5735 4.53409C11.9118 4.53409 11.4706 4.31818 11.0294 3.88636C10.1471 3.45455 9.70588 2.375 10.1471 1.72727C10.5882 1.07955 11.6912 1.07955 12.5735 1.72727ZM5.29412 15.3295C5.29412 15.3295 4.85294 15.7614 2.64706 16.8409C2.20588 17.0568 1.76471 17.2727 1.32353 17.4886C1.32353 17.0568 1.32353 16.625 1.54412 15.9773C1.76471 13.3864 1.98529 12.9545 1.98529 12.9545L8.82353 3.45455C9.04412 4.10227 9.48529 4.53409 10.1471 4.96591C10.8088 5.39773 11.4706 5.61364 12.1324 5.61364L5.29412 15.3295Z"
                fill="#6E6E6E"
              />
            </svg>
          </a>
        </div>
        <div v-else>
          <a
            v-if="!$store.getters['cart/hasProduct'](product.id)"
            class="merchant-item__button merchant-item__button--add"
            @click="add"
          ></a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
  props: {
    product: {
      type: Object,
    },
    marketWorkingTime: {
      type: Array,
    },
    merchant: {
      type: Object,
    },
  },
  data() {
    return {
      quantity: 1,
    }
  },
  computed: {
    ...mapGetters({
      order: 'cart/order',
    }),
    productCart() {
      return this.$store.getters['cart/hasProduct'](this.product.id)
    },
    isMyMerchant() {
      if (!this.$auth.loggedIn) return false
      else if (this.$auth.user.is_merchant)
        return this.$auth.user.merchant.id === this.merchant.id
      return false
    },
  },
  methods: {
    priceByUnit(product) {
      if (product.unit_quantity > 1) {
        if (product.unit.unit === 'Kg') {
          const price = (1 * product.price) / product.unit_quantity
          const priceParse = parseFloat(price).toFixed(2)
          return ' - (' + priceParse + '€/ Kg)'
        }
        if (product.unit.unit === 'g') {
          const price = (1000 * product.price) / product.unit_quantity
          const priceParse = parseFloat(price).toFixed(2)
          return ' - (' + priceParse + '€/ Kg)'
        }
        if (product.unit.unit === 'L') {
          const price = (1 * product.price) / product.unit_quantity
          const priceParse = parseFloat(price).toFixed(2)
          return ' - (' + priceParse + '€/ L)'
        }
        if (product.unit.unit === 'mL') {
          const price = (1000 * product.price) / product.unit_quantity
          const priceParse = parseFloat(price).toFixed(2)
          return ' - (' + priceParse + '€/ L)'
        }
      }
    },
    add() {
      // if (
      //   this.order.market !== null &&
      //   this.order.market.id !== this.merchant.market.id
      // ) {
      //   this.$nuxt.$emit('error', {
      //     message: 'You have products in cart from another market',
      //   })
      //   return
      // }
      document.getElementById('item_image_' + this.product.id).className +=
        ' image-shadow'
      this.$store.commit('cart/ADD_PRODUCT', {
        product: this.product,
        quantity: 1,
        merchant: {
          id: this.merchant.id,
          userID: this.merchant.user_id,
          email: this.merchant.email,
          title: this.merchant.title,
        },
        merchantTime: this.merchant.merchant_working_time,
        market: this.merchant.market,
        marketTime: this.marketWorkingTime,
      })
    },
    remove() {
      if (this.productCart.quantity > 1)
        this.$store.commit('cart/DECREASE', this.productCart)
      else {
        const element = document.getElementById('item_image_' + this.product.id)
        element.classList.remove('image-shadow')
        this.$store.commit('cart/REMOVE', {
          product: this.product,
          quantity: 1,
        })
      }
    },
  },
  mounted() {},
}
</script>

<style lang="scss" scoped>
.merchant-item {
  width: 100%;
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
  }

  &__country {
    display: flex;
    justify-content: center;
    align-items: center;
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
    height: 85px;
    padding: 0 20px;
    position: relative;
    display: flex;
    align-items: center;
  }

  &__updatedescription {
    margin-left: auto;
    display: flex;
  }

  &__updatedescriptionicone {
    cursor: pointer;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    background: #e8e8e8;
    width: 64px;
    height: 64px;
  }

  &__middle {
    width: 100%;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    justify-content: center;
    align-items: center;
    position: absolute;
    top: 40px;
    left: 50%;
    transform: translateX(-50%);
    transition: opacity 0.3s;
  }

  &__btn {
    width: 40px;
    height: 39px;
    background: rgba(0, 0, 0, 0.56);
    border: 1px solid #ffffff;
    display: flex;
    justify-content: center;
    align-items: center;
    box-sizing: border-box;
    border-radius: 50%;
    position: relative;
    cursor: pointer;
    margin: 0 auto;

    &--plus {
      &:before {
        content: '';
        width: 1px;
        height: 14px;
        position: absolute;
        top: 50%;
        left: 50%;
        border-right: 1px solid #fff;
        transform: translate(-50%, -50%);
      }

      &:after {
        content: '';
        width: 14px;
        height: 1px;
        position: absolute;
        top: 50%;
        left: 50%;
        border-top: 1px solid #fff;
        transform: translate(-50%, -50%);
      }
    }

    &--minus {
      &:after {
        content: '';
        width: 14px;
        height: 1px;
        position: absolute;
        top: 50%;
        left: 50%;
        border-top: 1px solid #fff;
        transform: translate(-50%, -50%);
      }
    }
  }

  &__quantity {
    font-family: Open Sans;
    font-style: normal;
    font-weight: normal;
    font-size: 70px;
    line-height: 95px;
    color: #ffffff;
    margin: 0 auto;
    text-shadow: 2px 2px 5px #000000;
  }

  &__button {
    width: 64px;
    height: 64px;
    display: flex;
    justify-content: center;
    align-items: center;
    border: 1px solid #1ec173;
    box-sizing: border-box;
    border-radius: 50%;
    margin-left: auto;
    position: relative;
    cursor: pointer;

    &--add {
      &:before {
        content: '';
        width: 1px;
        height: 26px;
        position: absolute;
        top: 50%;
        left: 50%;
        border-right: 1px solid #1ec173;
        transform: translate(-50%, -50%);
      }

      &:after {
        content: '';
        width: 26px;
        height: 1px;
        position: absolute;
        top: 50%;
        left: 50%;
        border-top: 1px solid #1ec173;
        transform: translate(-50%, -50%);
      }
    }
  }

  &__title-category {
    width: calc(100% - 80px);
  }

  &__title {
    font-family: Open Sans;
    font-style: normal;
    font-weight: 600;
    font-size: 14px;
    line-height: 18px;
    color: #2c2c2c;
    margin: 6px 0 2px 0;
    display: block;
    text-decoration: none;
    max-height: 38px;
    max-width: 175px;
    overflow: hidden;
    text-overflow: clip;
    white-space: normal;
  }

  &__subtitle {
    font-family: Open Sans;
    font-style: normal;
    font-weight: 600;
    font-size: 12px;
    line-height: 16px;
    color: #9a9a9a;
  }

  &__subtitlePrice {
    font-family: Open Sans;
    font-style: normal;
    font-weight: 400;
    font-size: 12px;
    line-height: 16px;
    color: #9a9a9a;
  }

  &__price {
    font-family: Open Sans;
    font-style: normal;
    font-weight: 600;
    font-size: 16px;
    line-height: 22px;
    color: #2c2c2c;
    margin-top: 8px;
  }

  &__icon {
    height: 20px;
  }
}

.image-shadow {
  filter: brightness(50%);
  -webkit-filter: brightness(50%);
  -moz-filter: brightness(50%);
  -o-filter: brightness(50%);
  -ms-filter: brightness(50%);
}
</style>
