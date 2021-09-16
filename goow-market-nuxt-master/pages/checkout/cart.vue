<template>
  <div class="cart-page">
    <ModalBox :active="modal.active">
      <form
        v-if="modal.model === 'ADDRESS'"
        class="edit-form"
        @submit.prevent="updateAddress"
      >
        <div class="edit-form__column">
          <p class="edit-form__title">Adresse</p>
          <a class="edit-form__close" @click="modal.active = false">
            <svg
              width="17"
              height="17"
              viewBox="0 0 17 17"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M1 1L16 16"
                stroke="#C4C4C4"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
              <path
                d="M16 1L1 16"
                stroke="#C4C4C4"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
          </a>
        </div>
        <div class="edit-form__border"></div>
        <div class="edit-form__group">
          <input
            v-model="formData.address.city"
            class="edit-form__input"
            type="text"
            placeholder="City *"
          />
          <p v-if="errors.has('city')" class="edit-form__error">
            {{ errors.get('city') }}
          </p>
        </div>
        <div class="edit-form__group">
          <input
            v-model="formData.address.postal_code"
            class="edit-form__input"
            type="text"
            placeholder="Postal code *"
          />
          <p v-if="errors.has('postal_code')" class="edit-form__error">
            {{ errors.get('postal_code') }}
          </p>
        </div>
        <div class="edit-form__group">
          <input
            v-model="formData.address.address"
            class="edit-form__input"
            type="text"
            placeholder="Address *"
          />
          <p v-if="errors.has('address')" class="edit-form__error">
            {{ errors.get('address') }}
          </p>
        </div>
        <button class="edit-form__submit" type="submit">Submit</button>
      </form>

      <!-- <form
        v-if="modal.model === 'PAYMENT_CARD'"
        class="edit-form"
        @submit.prevent="updatePaymentCard"
      >
        <div class="edit-form__column">
          <p class="edit-form__title">Moyen de paiement</p>
          <a class="edit-form__close" @click="modal.active = false">
            <svg
              width="17"
              height="17"
              viewBox="0 0 17 17"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M1 1L16 16"
                stroke="#C4C4C4"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
              <path
                d="M16 1L1 16"
                stroke="#C4C4C4"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
          </a>
        </div>
        <div class="edit-form__border"></div>
        <div
          v-for="(item, index) in paymentCards"
          :key="index"
          :class="[item.default ? 'active' : '']"
          class="options__payment-wrap options__payment-img--light pc-item"
        >
          <div class="options__payment-img">
            <img src="/icons/visa.svg" />
          </div>
          <span class="options__payment-text">
            ****
                           {{ item }} <br />
            <span class="options__small-text">{{ item.last4 }}</span>
          </span>
          <a
            class="options__payment-edit"
            @click="
              activeModal('PAYMENT_CARD')
              formData.payment = item
            "
          >
          </a>
        </div>
        <nuxt-link class="payment-link" to="/profile"
          >Ajouter un moyen de paiement</nuxt-link
        >
      </form> -->
    </ModalBox>
    <div class="container">
      <div class="cart-page__wrap">
        <div class="cart__container cart__container--desktop">
          <p class="cart-page__title">Mon Panier</p>
          <p class="cart-page__description">
            Il ne reste plus qu’une étape avant de valider votre commande
          </p>

          <div class="cart">
            <div class="cart__wrap">
              <div class="cart-item__wrap">
                <div
                  v-for="(item, index) in productByMerchants"
                  :key="index"
                  class="cart-item"
                >
                  <div class="cart-item__top">
                    <p class="cart-item__title">{{ item.merchant.title }}</p>
                    <a
                      class="cart-item__remove"
                      @click="remove(item.merchant.id)"
                    >
                      <svg
                        width="11"
                        height="13"
                        viewBox="0 0 11 13"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M8.66665 3.03333H1.73332C1.47332 3.03333 1.29999 3.20666 1.29999 3.46666V12.5667C1.29999 12.7833 1.47332 13 1.73332 13H8.66665C8.88332 13 9.09999 12.7833 9.09999 12.5667V3.46666C9.09999 3.20666 8.88332 3.03333 8.66665 3.03333Z"
                          fill="black"
                          fill-opacity="0.3"
                        />
                        <path
                          d="M9.96667 1.73333H7.32333C7.10667 0.736667 6.24 0 5.2 0C4.16 0 3.29333 0.736667 3.07667 1.73333H0.433333C0.173333 1.73333 0 1.90667 0 2.16667C0 2.42667 0.173333 2.6 0.433333 2.6H3.46667H6.93333H9.96667C10.2267 2.6 10.4 2.42667 10.4 2.16667C10.4 1.90667 10.2267 1.73333 9.96667 1.73333ZM3.98667 1.73333C4.16 1.21333 4.63667 0.866667 5.2 0.866667C5.76333 0.866667 6.24 1.21333 6.41333 1.73333H3.98667Z"
                          fill="black"
                          fill-opacity="0.3"
                        />
                      </svg>
                    </a>
                  </div>
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
            </div>
          </div>
        </div>
        <div class="options">
          <!--          <div class="switch__container switch__container&#45;&#45;desktop">-->
          <!--            <div class="switch switch&#45;&#45;desktop">-->
          <!--              <a-->
          <!--                :class="[orderType === 'DELIVERY' ? 'active' : '']"-->
          <!--                class="switch__button switch__button&#45;&#45;left"-->
          <!--                @click="orderType = 'DELIVERY'"-->
          <!--              >-->
          <!--                Livraison à domicile-->
          <!--              </a>-->
          <!--              <a-->
          <!--                :class="[orderType === 'TAKEAWAY' ? 'active' : '']"-->
          <!--                class="switch__button switch__button&#45;&#45;right"-->
          <!--                @click="orderType = 'TAKEAWAY'"-->
          <!--              >-->
          <!--                Retrait sur place-->
          <!--              </a>-->
          <!--              <div-->
          <!--                :class="[-->
          <!--                  orderType === 'DELIVERY'-->
          <!--                    ? 'switch__box&#45;&#45;left'-->
          <!--                    : 'switch__box&#45;&#45;right',-->
          <!--                ]"-->
          <!--                class="switch__box"-->
          <!--              ></div>-->
          <!--            </div>-->
          <!--          </div>-->
          <div class="options__button">Retrait sur place</div>
          <div class="options__dates">
            <a
              v-for="(item, index) in schedule.dates"
              :key="index"
              :class="[item.key === scheduled.date ? 'active' : '']"
              class="options__date"
              @click="setTime(item)"
            >
              <div>
                {{ item.value.date }}
                <span>{{ item.value.day }}</span>
              </div>
            </a>
          </div>
          <select v-model="scheduledTime" class="options__select">
            <option value=""></option>
            <option
              v-for="(item, index) in schedule.time"
              :key="index"
              :value="item"
            >
              {{ item }}
            </option>
          </select>
          <div class="options__border"></div>
          <div class="options__address">
            <p>Ou ?</p>
            <div class="options__address-wrap">
              <img class="options__map-icon" src="/icons/map.svg" />
              <div>
                {{ order.market.title }} <br /><br />
                <span style="text-decoration: none">{{
                  JSON.parse(order.market.address).name
                }}</span>
                <br />
                <span style="text-transform: none"
                  >{{ JSON.parse(order.market.address).postcode }}
                  {{ JSON.parse(order.market.address).city }}</span
                >
              </div>
            </div>
          </div>
          <div class="cart__container cart__container--mobile">
            <div class="options__border"></div>
            <p class="cart-page__title">Mon Panier</p>
            <p class="cart-page__description">
              Il ne reste plus qu’une étape avant de valider votre commande
            </p>
            <div class="cart">
              <div class="cart__wrap">
                <div class="cart-item__wrap">
                  <div
                    v-for="(item, index) in productByMerchants"
                    :key="index"
                    class="cart-item"
                  >
                    <div class="cart-item__top">
                      <p class="cart-item__title">{{ item.merchant.title }}</p>
                      <a
                        class="cart-item__remove"
                        @click="remove(item.merchant.id)"
                      >
                        <svg
                          width="11"
                          height="13"
                          viewBox="0 0 11 13"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            d="M8.66665 3.03333H1.73332C1.47332 3.03333 1.29999 3.20666 1.29999 3.46666V12.5667C1.29999 12.7833 1.47332 13 1.73332 13H8.66665C8.88332 13 9.09999 12.7833 9.09999 12.5667V3.46666C9.09999 3.20666 8.88332 3.03333 8.66665 3.03333Z"
                            fill="black"
                            fill-opacity="0.3"
                          />
                          <path
                            d="M9.96667 1.73333H7.32333C7.10667 0.736667 6.24 0 5.2 0C4.16 0 3.29333 0.736667 3.07667 1.73333H0.433333C0.173333 1.73333 0 1.90667 0 2.16667C0 2.42667 0.173333 2.6 0.433333 2.6H3.46667H6.93333H9.96667C10.2267 2.6 10.4 2.42667 10.4 2.16667C10.4 1.90667 10.2267 1.73333 9.96667 1.73333ZM3.98667 1.73333C4.16 1.21333 4.63667 0.866667 5.2 0.866667C5.76333 0.866667 6.24 1.21333 6.41333 1.73333H3.98667Z"
                            fill="black"
                            fill-opacity="0.3"
                          />
                        </svg>
                      </a>
                    </div>
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
              </div>
            </div>
          </div>
          <div class="options__border"></div>
          <div class="options__payment">
            <p>Retrait sur place</p>
            <!-- <div class="options__payment-wrap options__payment-img--light">
              <div class="options__payment-img">
                <img src="/icons/visa.svg" />
              </div>
              <span class="options__payment-text">
                {{ paymentCard.brand }} <br />
                <span class="options__small-text"
                  >****{{ paymentCard.last4 }}</span
                >
              </span>
              <a
                class="options__payment-edit"
                @click="
                  activeModal('PAYMENT_CARD')
                  formData.payment = item
                "
              >
                <img src="/icons/pen.svg" />
              </a>
            </div> -->
          </div>
          <div class="options__border"></div>
          <div class="options__info">
            <div class="options__info-left">
              <br />
              <p>Total</p>
            </div>
            <div class="options__info-right">
              <br />
              <span>{{ $price(order.amount) }}</span>
            </div>
          </div>
          <div v-if="this.productByMerchants.length >= 1">
            <button
              v-if="!loading"
              class="options__submit"
              type="submit"
              @click="createOrder"
            >
              Confirmer la commande
            </button>
            <button v-else class="options__submit">
              <img class="options__loader" src="/icons/loader-light.svg" />
            </button>
          </div>
          <div v-else>
            <button
              v-if="!loading"
              class="options__submit"
              style="color: #7e7691; pointer-events: none"
              type="submit"
            >
              Votre panier et vide
            </button>
            <button v-else class="options__submit">
              <img class="options__loader" src="/icons/loader-light.svg" />
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
  middleware: ['authenticated', 'hasOrder'], // hasPaymentCard
  data() {
    return {
      schedule: {
        dates: [],
        time: [
          '10:00 - 10:30',
          '10:30 - 11:00',
          '11:00 - 11:30',
          '11:30 - 12:00',
          '12:00 - 12:30',
          '12:30 - 13:00',
          '13:00 - 13:30',
          '13:30 - 14:00',
          '14:00 - 14:30',
          '14:30 - 15:00',
          '15:00 - 15:30',
          '15:30 - 16:00',
        ],
      },
      orderType: 'DELIVERY',
      modal: {
        active: false,
        model: '',
      },
      formData: {
        address: {},
        payment: {},
      },
      paymentCard: {},
      paymentCards: [],
      loading: false,
      stripe: {},
    }
  },
  computed: {
    ...mapGetters({
      order: 'cart/order',
      scheduled: 'cart/scheduled',
      productByMerchants: 'cart/productByMerchants',
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
    this.checkDate()
    if (!this.$auth.user.email_verified_at) this.$router.back()

    /* global Stripe */
    this.stripe = Stripe(process.env.STRIPE_PUBLIC_KEY)

    Object.assign(this.formData.address, this.$auth.user)

    this.$nuxt.$on('close-modal-box', () => (this.modal.active = false))

    this.getDefaultPaymentCard()

    this.getPaymentCards()
  },
  methods: {
    checkDate() {
      const merchantTime = []
      const orderDays = []
      let capitaleFirstLeter = ''
      // On récupere les jours d'ouverture du marché et on le met au format 'Lun.'
      this.order.merchantTime.forEach((time) => {
        capitaleFirstLeter = this.capitalizeFirstLetter(time.day)
        merchantTime.push(capitaleFirstLeter.slice(0, 3) + '.')
      })
      // On crée le premier jours a partir de la date d'aujordhui puis on rajoute 30jours de plus
      this.schedule.dates.push({
        key: this.$moment().format('YYYY-MM-DD'),
        value: {
          date: this.$moment().format('DD'),
          day: this.$moment().format('ddd'),
        },
      })
      for (let i = 1; i < 30; i++) {
        this.schedule.dates.push({
          key: this.$moment().add(i, 'days').format('YYYY-MM-DD'),
          value: {
            date: this.$moment().add(i, 'days').format('DD'),
            day: this.$moment().add(i, 'days').format('ddd'),
          },
        })
      }
      // On ajoute dans le tableau orderDay tous les jours ou le marchands ouvre
      this.schedule.dates.forEach((date, Zindex) => {
        merchantTime.forEach((day, Xindex) => {
          if (date.value.day === day) {
            orderDays.push(date)
          }
        })
      })
      this.schedule.dates = orderDays.splice(0, 7)
    },
    setTime(item) {
      let capitaleFirstLeter = ''
      let trimedDay = ''
      this.$store.commit('cart/SET_SCHEDULED_DATE', item.key)
      // On met les options par defaut a 0
      this.schedule.time = []

      // Si une date et choisie je verifie a quelle jours il corresponds
      this.order.merchantTime.forEach((time) => {
        capitaleFirstLeter = this.capitalizeFirstLetter(time.day)
        trimedDay = capitaleFirstLeter.slice(0, 3) + '.'
        if (trimedDay === item.value.day) {
          // Je récupere ensuite les horraire de fin et de debut du marchands
          const hoursStart = this.$moment(time.hours_start, 'hh:mm:ss')
            .add(30, 'm')
            .format('HH:mm')
          const hoursEnd = this.$moment(time.hours_end, 'hh:mm:ss')
            .subtract(30, 'm')
            .format('HH:mm')

          this.schedule.time.push(
            hoursStart +
              '-' +
              this.$moment(hoursStart, 'hh:mm:ss').add(30, 'm').format('HH:mm')
          )
          // Je boucle ensuite afin d'avoir tous les horraires
          let i = 0
          while (this.schedule.time[i] < hoursEnd) {
            this.schedule.time.push(
              this.$moment(this.schedule.time[i], 'hh:mm:ss')
                .add(30, 'm')
                .format('HH:mm') +
                '-' +
                this.$moment(this.schedule.time[i], 'hh:mm:ss')
                  .add(60, 'm')
                  .format('HH:mm')
            )
            i++
          }
        }
      })
    },
    capitalizeFirstLetter(string) {
      return string.charAt(0).toLowerCase() + string.slice(1)
    },
    createSetupPaymentIntent() {
      this.loading = true
      this.$axios
        .post('stripe/setup-intent')
        .then((res) => {
          this.confirmSetupIntent(res.data.client_secret)
        })
        .catch((e) => {
          this.loading = false
          console.log((this.error = e))
        })
    },
    confirmSetupIntent(clientSecret) {
      this.stripe
        .confirmCardSetup(clientSecret, {
          payment_method: this.paymentCard.id,
        })
        .then((res) => {
          this.loading = false
          if (!res.error) {
            this.createOrder()
          } else console.log(res.error)
        })
    },
    createOrder() {
      let scheduled = false
      let scheduledAt = ''
      if (this.scheduled.date.length && this.scheduled.time.length) {
        scheduled = true
        scheduledAt = `${this.scheduled.date} ${
          this.scheduled.time.split('-')[0]
        }`
      }
      this.loading = true
      this.$axios
        .post('checkout', {
          order: {
            payment_method: 'CARD',
            order_type: 'TAKEAWAY',
            scheduled,
            scheduled_at: scheduledAt,
            merchants: this.productByMerchants,
          },
        })
        .then(() => {
          this.$store.commit('cart/CLEAR')
          this.$router.push('/checkout/confirmation')
        })
        .catch((e) => {
          this.loading = false
          console.log((this.error = e))
        })
    },
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
    activeModal(model) {
      this.modal.active = true
      this.modal.model = model
    },
    getPaymentCards() {
      this.$axios
        .get('payment-cards')
        .then((response) => (this.paymentCards = response.data.payment_cards))
      // this.$axios.get('stripe/payment-cards').then((response) => this.paymentCards = response.data)
    },
    getDefaultPaymentCard() {
      this.$axios('stripe/payment-cards/default').then(
        (response) => (this.paymentCard = response.data)
      )
    },
    async updateAddress() {
      try {
        await this.$axios.put(
          `users/${this.$auth.user.id}/address`,
          this.formData.address
        )
        this.modal.active = false
      } catch (e) {
        this.errors.record(e.response.data.errors)
      }
    },
    async updatePaymentCard() {
      try {
        await this.$axios.put(
          `payment-cards/${this.formData.payment.id}`,
          this.formData.payment
        )
        this.modal.active = false
      } catch (e) {
        this.errors.record(e.response.data.errors)
      }
    },
  },
}
</script>

<style lang="scss" scoped>
.cart-page {
  &__title {
    font-family: Open Sans;
    font-style: normal;
    font-weight: 600;
    font-size: 15px;
    line-height: 19px;
    color: #565656;
    margin: 70px 0 10px 0;
    @media screen and (max-width: 1024px) {
      margin: 0 0 10px 0;
    }
  }

  &__description {
    font-family: Open Sans;
    font-style: normal;
    font-weight: 600;
    font-size: 12px;
    line-height: 19px;
    color: #565656;
    margin-bottom: 10px;
    @media screen and (max-width: 1024px) {
      margin: 0 0 10px 0;
    }
  }

  &__wrap {
    display: flex;
    @media screen and (max-width: 1024px) {
      display: block;
    }
  }

  .options {
    margin: 0 0 50px 60px;
    @media screen and (max-width: 1024px) {
      margin: 0 0 50px 0;
    }

    &__dates {
      display: flex;
      margin-bottom: 12px;
      @media screen and (max-width: 769px) {
        overflow-x: scroll;
        padding: 0 0 20px 0;
      }
    }

    &__date {
      width: 45px;
      height: 45px;
      background: #e5e5e5;
      border-radius: 50%;
      cursor: pointer;
      font-family: Open Sans;
      font-style: normal;
      font-weight: 600;
      font-size: 14px;
      text-transform: capitalize;
      color: #9a9a9a;
      display: flex;
      justify-content: center;
      align-items: center;
      line-height: 12px;
      margin-right: 8px;
      span {
        font-weight: normal;
        font-size: 8px;
        line-height: 11px;
        display: block;
      }
      &.active {
        background: #3b1099;
        color: #ffffff;
      }
      @media screen and (max-width: 769px) {
        width: 43px;
        min-width: 43px;
        height: 43px;
        line-height: 11px;
        margin-right: 2px;
      }
    }

    &__button {
      width: 180px;
      height: 40px;
      box-sizing: border-box;
      border-radius: 30px;
      background: #3b1099;
      margin: 60px 0 24px 0;
      display: flex;
      justify-content: center;
      align-items: center;
      letter-spacing: 0.7px;
      cursor: pointer;
      font-family: Open Sans;
      font-style: normal;
      font-weight: 600;
      font-size: 14px;
      line-height: 19px;
      color: #fff;
      transition: all 0.15s;
      padding-bottom: 4px;
    }

    &__select {
      width: 100%;
      height: 43px;
      background: #ffffff;
      border: 1px solid #c4c4c4;
      box-sizing: border-box;
      border-radius: 20px;
      font-family: Open Sans;
      font-style: normal;
      font-weight: 300;
      font-size: 14px;
      line-height: 19px;
      color: #9a9a9a;
      padding: 0 22px;
      margin-bottom: 12px;
      outline: none;
    }

    &__border {
      height: 1px;
      border-top: 1px solid #e6e6e6;
      margin-bottom: 12px;
    }

    &__loader {
      height: 18px;
      animation-name: spin-animation;
      animation-duration: 750ms;
      animation-iteration-count: infinite;
      animation-timing-function: linear;
    }

    &__submit {
      width: 364px;
      max-width: 100%;
      height: 39px;
      background: #3b1099;
      border-radius: 30px;
      font-family: Montserrat;
      font-style: normal;
      font-weight: 600;
      font-size: 14px;
      line-height: 17px;
      color: #ffffff;
      display: flex;
      justify-content: center;
      align-items: center;
      border: none;
      cursor: pointer;
      text-decoration: none;
      &:hover {
        opacity: 0.9;
      }
    }

    &__payment {
      p {
        font-family: Open Sans;
        font-style: normal;
        font-weight: 600;
        font-size: 14px;
        line-height: 19px;
        color: #565656;
        margin-bottom: 16px;
      }
    }

    &__payment-wrap {
      display: flex;
      align-items: center;
      margin-bottom: 21px;
    }

    &__payment-img {
      width: 71px;
      height: 39px;
      background: #3b1099;
      border-radius: 7px;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    &__payment-text {
      font-family: Open Sans;
      font-style: normal;
      font-weight: normal;
      font-size: 14px;
      line-height: 19px;
      letter-spacing: -0.04em;
      color: #9a9a9a;
      margin-left: 20px;
    }

    &__small-text {
      opacity: 0.8;
      font-size: 12px;
    }

    &__payment-edit {
      margin-left: auto;
      transition: opacity 0.15s;
      cursor: pointer;
      &:hover {
        opacity: 0.9;
      }
    }

    &__info {
      display: flex;
      margin-bottom: 25px;

      p {
        font-family: Open Sans;
        font-style: normal;
        font-weight: normal;
        font-size: 12px;
        line-height: 16px;
        text-transform: capitalize;
        color: #c4c4c4;
      }
      span {
        font-family: Open Sans;
        font-style: normal;
        font-weight: 600;
        font-size: 16px;
        line-height: 22px;
        text-transform: capitalize;
        color: #565656;
      }
    }

    &__address {
      padding-bottom: 16px;
      p {
        font-family: Open Sans;
        font-style: normal;
        font-weight: 600;
        font-size: 14px;
        line-height: 19px;
        color: #565656;
        margin-bottom: 12px;
      }
    }

    &__address-wrap {
      display: flex;
      font-family: Open Sans;
      font-style: normal;
      font-weight: normal;
      font-size: 14px;
      line-height: 14px;
      letter-spacing: -0.04em;
      text-transform: uppercase;
      color: #9a9a9a;
      span {
        font-size: 12px;
        opacity: 0.6;
      }
    }

    &__map-icon {
      height: fit-content;
      margin-right: 20px;
    }

    &__info-left {
      width: 50%;
      text-align: left;
    }

    &__info-right {
      width: 50%;
      text-align: right;
      padding-right: 25px;
    }
  }

  .cart {
    display: block !important;
    overflow: hidden;
    background: #ffffff;
    box-shadow: 0 6px 8px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    margin-bottom: 50px;

    &__container {
      width: 60%;
      @media screen and (max-width: 1024px) {
        width: 100%;
      }
      &--desktop {
        display: block;
        @media screen and (max-width: 1024px) {
          display: none;
        }
      }
      &--mobile {
        display: none;
        @media screen and (max-width: 1024px) {
          display: block;
        }
      }
    }

    &__wrap {
      padding: 0 16px 16px 16px;
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
        border-radius: 50%;
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
  }
}

.switch {
  width: 366px;
  max-width: 100%;
  height: 40px;
  box-sizing: border-box;
  border-radius: 30px;
  background: #e6e6e6;
  position: relative;
  z-index: 1;
  margin: 60px 0 24px 0;
  @media screen and (max-width: 1024px) {
    width: 320px;
    margin: 60px auto 24px auto;
  }

  &__container--desktop {
    height: 40px;
    margin-bottom: 12px;
  }

  &__box {
    width: 50%;
    height: 40px;
    border-radius: 30px;
    position: absolute;
    top: -1px;
    background: #3b1099;
    z-index: 1;
    transition: all 0.35s;
    &--left {
      left: -4px;
    }
    &--right {
      left: 50%;
    }
  }

  &__button {
    width: 50%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    letter-spacing: 0.7px;
    position: absolute;
    top: 0;
    z-index: 2;
    cursor: pointer;
    font-family: Open Sans;
    font-style: normal;
    font-weight: 600;
    font-size: 14px;
    line-height: 19px;
    color: #9a9a9a;
    transition: all 0.15s;
    padding-bottom: 4px;
    @media screen and (max-width: 1024px) {
      font-size: 12px;
      line-height: 15px;
      letter-spacing: 0.5px;
    }
    @media screen and (max-width: 769px) {
      font-size: 11px;
      line-height: 12px;
      letter-spacing: 0.4px;
    }
    &:hover {
      opacity: 0.9;
    }
    &--left {
      left: 0;
    }
    &--right {
      right: 0;
    }
    &.active {
      opacity: 1;
      cursor: default;
      color: #ffffff;
      svg path {
        fill: #000;
      }
    }
    svg {
      margin-right: 6px;
    }
  }
}

.edit-form {
  text-align: center;

  &__title {
    font-family: Montserrat;
    font-style: normal;
    font-weight: 600;
    font-size: 14px;
    line-height: 19px;
    color: #565656;
  }

  &__column {
    display: flex;
    align-items: center;
  }

  &__close {
    margin-left: auto;
    transition: opacity 0.15s;
    cursor: pointer;
    &:hover {
      opacity: 0.8;
    }
  }

  &__border {
    height: 1px;
    border-top: 1px solid #e4e4e4;
    margin: 10px 0;
  }

  &__group {
    margin-bottom: 20px;
  }

  &__input {
    width: 325px;
    height: 43px;
    background: #ffffff;
    box-shadow: 0px 6px 8px rgba(0, 0, 0, 0.1);
    border-radius: 20px;
    font-family: Open Sans;
    font-style: normal;
    font-weight: 300;
    font-size: 14px;
    line-height: 19px;
    color: #9a9a9a;
    padding: 0 22px;
    border: none;
    margin-bottom: 10px;
  }

  &__error {
    font-family: Open Sans;
    color: #ff3333;
    font-size: 13px;
    padding-left: 11px;
    margin: 0 0 6px 0;
  }

  &__submit {
    width: 196px;
    height: 36px;
    background: #3b1099;
    border-radius: 30px;
    font-family: Montserrat;
    font-style: normal;
    font-weight: 600;
    font-size: 14px;
    line-height: 17px;
    color: #ffffff;
    cursor: pointer;
    border: none;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: opacity 0.15s;
    margin: 0 auto;
    &:hover {
      opacity: 0.85;
    }
  }

  .pc-item {
    width: 450px;
    padding: 9px 16px;
    background: #ffffff;
    box-shadow: 0 6px 8px rgb(0 0 0 / 10%);
    border-radius: 10px;
    &.active {
      border: 2px solid #3b1099;
      box-sizing: border-box;
    }
  }

  .payment-link {
    width: 239px;
    height: 40px;
    background: #e8e8e8;
    border-radius: 30px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: Open Sans;
    font-style: normal;
    font-weight: normal;
    font-size: 12px;
    line-height: 16px;
    color: #6f6f6f;
    cursor: pointer;
    text-decoration: none;
    margin: 25px auto 50px auto;
    transition: opacity 0.125s;
    &:hover {
      opacity: 0.85;
    }
  }
}
</style>
