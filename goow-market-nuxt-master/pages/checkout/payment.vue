<template>
  <div class="payment">
    <div class="payment__container">
      <div class="form">
        <p class="form__title">Détails du paiement</p>
        <div class="form__group">
          <input
            id="name"
            class="form__input form__input--name"
            type="text"
            placeholder="Nom"
          />
          <div id="error-card-name" class="form__error"></div>
        </div>
        <div class="form__group">
          <div id="cardNumber" class="form__input"></div>
          <div id="error-card-number" class="form__error"></div>
        </div>
        <div class="form__inline">
          <div class="form__group">
            <div id="cardExpiry" class="form__input"></div>
            <div id="error-card-expiry" class="form__error"></div>
          </div>
          <div class="form__group">
            <div id="cardCvc" class="form__input"></div>
            <div id="error-card-cvc" class="form__error"></div>
          </div>
        </div>
        <button class="form__submit" @click="createPaymentIntent">
          <span v-if="!loading">Pay</span>
          <img v-else class="form__loader" src="/icons/loader-light.svg" />
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
  middleware: ['authenticated', 'hasOrder'],
  data() {
    return {
      stripe: null,
      card: null,
      loading: false,
    }
  },
  computed: {
    ...mapGetters({
      scheduled: 'cart/scheduled',
      productByMerchants: 'cart/productByMerchants',
    }),
  },
  mounted() {
    this.init()
  },
  methods: {
    init() {
      /* global Stripe */
      this.stripe = Stripe(process.env.STRIPE_PUBLIC_KEY)
      this.stripeElements = this.stripe.elements()
      this.cardNumber = this.stripeElements.create('cardNumber')
      this.cardNumber.mount('#cardNumber')
      this.cardExpiry = this.stripeElements.create('cardExpiry')
      this.cardExpiry.mount('#cardExpiry')
      this.cardCvc = this.stripeElements.create('cardCvc')
      this.cardCvc.mount('#cardCvc')

      this.cardNumber.on('change', (event) => {
        const error = document.getElementById('error-card-number')
        if (event.error) error.textContent = event.error.message
        else error.textContent = ''
      })

      this.cardExpiry.on('change', (event) => {
        const error = document.getElementById('error-card-expiry')
        if (event.error) error.textContent = event.error.message
        else error.textContent = ''
      })

      this.cardCvc.on('change', (event) => {
        const error = document.getElementById('error-card-cvc')
        if (event.error) error.textContent = event.error.message
        else error.textContent = ''
      })
    },
    createPaymentIntent() {
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
            scheduled,
            scheduled_at: scheduledAt,
            merchants: this.productByMerchants,
          },
        })
        .then((res) => {
          this.confirmCardSetup(res.data.client_secret)
        })
        .catch((err) => {
          this.loading = false
          console.log(err)
        })
    },
    confirmCardSetup(clientSecret) {
      this.stripe
        .confirmCardPayment(clientSecret, {
          payment_method: {
            card: this.cardNumber,
            billing_details: {
              name: document.getElementById('name').value,
            },
          },
        })
        .then((res) => {
          this.loading = false
          if (!res.error) {
            this.$store.commit('cart/CLEAR')
            this.$router.push('/checkout/confirmation')
          } else console.log(res.error)
        })
    },
  },
}
</script>

<style lang="scss" scoped>
.payment {
  min-height: 100vh;

  &__container {
    width: 500px;
    margin: 0 auto;
  }
}

.form {
  margin-top: 150px;

  &__title {
    color: rgba(26, 26, 26, 0.9);
    font-weight: 500;
    font-size: 16px;
    font-family: Montserrat, serif;
  }

  &__group {
    width: 100%;
    margin: 12px 0;
  }

  &__inline {
    display: flex;
    .form__group {
      width: 48%;
      &:nth-of-type(2) {
        margin-left: auto;
      }
    }
  }

  &__input {
    width: 100%;
    padding: 10px 12px;
    color: rgba(26, 26, 26, 0.9);
    font-size: 16px;
    line-height: 1.5;
    border: 0;
    box-shadow: 0 0 0 1px #e0e0e0, 0 2px 4px 0 rgb(0 0 0 / 7%),
      0 1px 1.5px 0 rgb(0 0 0 / 5%);
    border-radius: 6px;
    background: #fff;
    &--name {
      margin-bottom: 12px;
    }
    /*&:focus {*/
    /*  box-shadow: 0 0 0 3px rgba(58,151,212,0.36);*/
    /*  outline: none;*/
    /*}*/
  }

  &__submit {
    background-color: rgb(84, 105, 212);
    box-shadow: 0px 2px 5px rgba(60, 66, 87, 0.12),
      0px 1px 1px rgba(0, 0, 0, 0.08), inset 0px -1px 1px rgba(0, 0, 0, 0.12);
    color: #fff;
    font-weight: 500;
    font-size: 14px;
    line-height: 20px;
    margin: 0;
    cursor: pointer;
    border: none;
    text-decoration: none;
    padding: 8px 22px;
    border-radius: 8px;
    transition: opacity 0.15s;
    display: flex;
    justify-content: center;
    align-items: center;
    &:hover {
      opacity: 0.9;
    }
    &:focus {
      box-shadow: 0 0 0 3px rgba(58, 151, 212, 0.36);
      outline: none;
    }
  }

  &__loader {
    height: 18px;
    animation-name: spin-animation;
    animation-duration: 750ms;
    animation-iteration-count: infinite;
    animation-timing-function: linear;
  }

  &__error {
    font-family: Montserrat, serif;
    color: #ff3333;
    font-size: 13px;
    padding-left: 4px;
    margin-top: 6px;
  }
}
</style>
