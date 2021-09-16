<template>
  <div class="cart">
    <div class="cart__top">
      <p class="cart__title">Mon panier</p>
    </div>
    <div class="cart__wrap">
      <!--      <div class="cart__grid">-->
      <!--        <button class="cart__service cart__service&#45;&#45;left active">-->
      <!--          <img src="/icons/3acf7049fa43017b1c8754cbedf14a04 24.svg" />-->
      <!--          Je retire en boutique-->
      <!--        </button>-->
      <!--        <button class="cart__service">-->
      <!--          <img src="/icons/image27.svg" />-->
      <!--          Je me fais livrer-->
      <!--        </button>-->
      <!--      </div>-->
      <!--      <div class="cart__grid cart__grid&#45;&#45;small">-->
      <!--        <div class="cart__select-field cart__select-field&#45;&#45;left">-->
      <!--          <span>Jour</span>-->
      <!--          <select v-model="scheduledDate">-->
      <!--            <option value=""></option>-->
      <!--            <option-->
      <!--              v-for="(item, index) in schedule.dates"-->
      <!--              :key="index"-->
      <!--              :value="item.key"-->
      <!--            >-->
      <!--              {{ item.value }}-->
      <!--            </option>-->
      <!--          </select>-->
      <!--        </div>-->
      <!--        <div class="cart__select-field">-->
      <!--          <span>Jour</span>-->
      <!--          <select v-model="scheduledTime">-->
      <!--            <option value=""></option>-->
      <!--            <option-->
      <!--              v-for="(item, index) in schedule.time"-->
      <!--              :key="index"-->
      <!--              :value="item"-->
      <!--            >-->
      <!--              {{ item }}-->
      <!--            </option>-->
      <!--          </select>-->
      <!--        </div>-->
      <!--      </div>-->
      <div class="cart-item__wrap">
        <div
          v-for="(item, index) in productByMerchants"
          :key="index"
          class="cart-item"
        >
          <!--          <div class="cart-item__top">-->
          <!--            <p class="cart-item__title">{{ item.merchant.title }}</p>-->
          <!--            <a class="cart-item__remove" @click="remove(item.merchant.id)">-->
          <!--              <svg-->
          <!--                width="11"-->
          <!--                height="13"-->
          <!--                viewBox="0 0 11 13"-->
          <!--                fill="none"-->
          <!--                xmlns="http://www.w3.org/2000/svg"-->
          <!--              >-->
          <!--                <path-->
          <!--                  d="M8.66665 3.03333H1.73332C1.47332 3.03333 1.29999 3.20666 1.29999 3.46666V12.5667C1.29999 12.7833 1.47332 13 1.73332 13H8.66665C8.88332 13 9.09999 12.7833 9.09999 12.5667V3.46666C9.09999 3.20666 8.88332 3.03333 8.66665 3.03333Z"-->
          <!--                  fill="black"-->
          <!--                  fill-opacity="0.3"-->
          <!--                />-->
          <!--                <path-->
          <!--                  d="M9.96667 1.73333H7.32333C7.10667 0.736667 6.24 0 5.2 0C4.16 0 3.29333 0.736667 3.07667 1.73333H0.433333C0.173333 1.73333 0 1.90667 0 2.16667C0 2.42667 0.173333 2.6 0.433333 2.6H3.46667H6.93333H9.96667C10.2267 2.6 10.4 2.42667 10.4 2.16667C10.4 1.90667 10.2267 1.73333 9.96667 1.73333ZM3.98667 1.73333C4.16 1.21333 4.63667 0.866667 5.2 0.866667C5.76333 0.866667 6.24 1.21333 6.41333 1.73333H3.98667Z"-->
          <!--                  fill="black"-->
          <!--                  fill-opacity="0.3"-->
          <!--                />-->
          <!--              </svg>-->
          <!--            </a>-->
          <!--          </div>-->
          <div
            v-for="(product, productIndex) in item.products"
            :key="productIndex"
            class="cart-item__product"
          >
            <QuantitySelector :product="product" />
            <img :src="$api_storage_url + product.product.image" />
            <div>
              <p>{{ product.product.title }}</p>
              <span
                >{{ product.product.unit_quantity }}
                {{ product.product.unit.unit }}</span
              >
            </div>
            <p class="cart-item__amount">
              {{ $price(product.product.price * product.quantity) }}
            </p>
          </div>
        </div>
      </div>
      <a class="cart__submit" @click="submit">
        Valider mon panier
        <b>{{ $price(order.amount) }}</b>
      </a>
    </div>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
  data() {
    return {
      formData: {
        schedule: {
          date: '',
          time: '',
        },
      },
      schedule: {
        dates: [
          {
            key: this.$moment().format('YYYY-MM-DD'),
            value: 'Demain',
          },
        ],
        time: [
          '10:00 - 10:30',
          '10:30 - 11:00',
          '11:00 - 11:30',
          '11:30 - 12:00',
        ],
      },
    }
  },
  computed: {
    ...mapGetters({
      isActive: 'cart/isActive',
      order: 'cart/order',
      productByMerchants: 'cart/productByMerchants',
      scheduled: 'cart/scheduled',
    }),
    scheduledDate: {
      get() {
        return this.scheduled.date
      },
      set(value) {
        this.$store.commit('cart/SET_SCHEDULED_DATE', value)
      },
    },
    scheduledTime: {
      get() {
        return this.scheduled.time
      },
      set(value) {
        this.$store.commit('cart/SET_SCHEDULED_TIME', value)
      },
    },
  },
  mounted() {
    for (let i = 1; i < 7; i++) {
      this.schedule.dates.push({
        key: this.$moment().add(i, 'days').format('YYYY-MM-DD'),
        value: this.$moment().add(i, 'days').format('dddd DD MMM'),
      })
    }
  },
  methods: {
    remove(merchant) {
      const index = this.productByMerchants.findIndex(
        (item) => item.merchant.id === merchant
      )
      this.productByMerchants[index].products.forEach((item) => {
        this.$store.commit('cart/REMOVE', {
          product: item.product,
          quantity: item.quantity,
        })
      })
    },
    submit() {
      this.$router.push('/checkout/cart')
    },
  },
}
</script>

<style lang="scss" scoped>
.cart {
  width: 359px;
  display: block !important;
  border-radius: 20px;
  overflow: hidden;

  &__top {
    background: #3b1099;
    display: flex;
    justify-content: center;
    padding: 12px 0;
  }

  &__title {
    font-family: Open Sans;
    font-style: normal;
    font-weight: 600;
    font-size: 16px;
    line-height: 22px;
    color: #ffffff;
  }

  &__wrap {
    padding: 0 16px 16px 16px;
  }

  &__grid {
    display: grid;
    grid-template-columns: repeat(2, 50%);
    justify-content: center;
    border-top: 1px solid #e1e1e1;
    &--small {
      border-bottom: 1px solid #e1e1e1;
    }
  }

  &__select-field {
    padding: 3px 6px;
    &--left {
      border-right: 1px solid #e1e1e1;
    }

    span {
      font-family: Open Sans;
      font-style: normal;
      font-weight: normal;
      font-size: 9px;
      line-height: 12px;
      letter-spacing: -0.05em;
      color: #c4c4c4;
    }

    select {
      border: 0;
      outline: 0;
      font-family: Open Sans;
      font-style: normal;
      font-weight: 600;
      font-size: 11px;
      line-height: 15px;
      color: #3b1099;
      text-transform: capitalize;
    }
  }

  &__service {
    border: none;
    cursor: pointer;
    font-family: Open Sans;
    font-style: normal;
    font-weight: normal;
    font-size: 11px;
    line-height: 16px;
    letter-spacing: 0.1px;
    color: #9a9a9a;
    display: flex;
    justify-content: center;
    align-items: center;
    background: #fff;
    white-space: nowrap;
    padding: 4px 0;
    transition: opacity 0.15s;
    &:hover {
      opacity: 0.85;
    }
    &--left {
      border-right: 1px solid #e1e1e1;
    }
    &.active {
      font-weight: 600;
      color: #3b1099;
    }
    img {
      margin-right: 5px;
    }
  }

  .cart-item {
    border-bottom: 1px solid #e1e1e1;
    padding: 8px 0;
    &:last-of-type {
      border: none;
    }

    &__top {
      display: flex;
      margin: 8px 0;
    }

    &__title {
      font-family: Open Sans;
      font-style: normal;
      font-weight: normal;
      font-size: 14px;
      line-height: 19px;
      color: #9a9a9a;
    }

    &__remove {
      margin-left: auto;
      cursor: pointer;
      transition: opacity 0.15s;
      &:hover {
        opacity: 0.9;
      }
    }

    &__product {
      display: flex;
      align-items: center;
      margin-bottom: 8px;
    }

    img {
      width: 47px;
      height: 47px;
      object-fit: cover;
      border-radius: 5px;
      margin: 0 15px;
    }

    p {
      font-family: Open Sans;
      font-style: normal;
      font-weight: 600;
      font-size: 12px;
      line-height: 16px;
      color: #2c2c2c;
    }

    span {
      font-family: Open Sans;
      font-style: normal;
      font-weight: normal;
      font-size: 12px;
      line-height: 16px;
      color: #9a9a9a;
    }

    &__wrap {
      padding-bottom: 35px;
    }

    &__amount {
      margin-left: auto;
    }
  }

  &__submit {
    width: 100%;
    height: 36px;
    background: #3b1099;
    border-radius: 30px;
    font-family: Open Sans;
    font-style: normal;
    font-weight: normal;
    font-size: 14px;
    line-height: 19px;
    color: #ffffff;
    border: none;
    cursor: pointer;
    transition: opacity 0.15s;
    display: flex;
    align-items: center;
    padding: 0 26px;
    text-decoration: none;
    &:hover {
      opacity: 0.9;
    }
    b {
      margin-left: auto;
    }
  }
}
</style>
