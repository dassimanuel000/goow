<template>
  <div class="box active">
    <div class="box__wrap">
      <div class="box__bottom">
        <div :class="[!active ? 'active' : '']" class="box__small">
          <div>
            <p class="box__count box__count--bold">
              Ajouter une nouvelle carte de Paiement
            </p>
            <p class="box__count"></p>
          </div>
        </div>
        <div :class="[active ? 'active' : '']" class="box__big">
          <div class="payment">
            <div class="payment__container">
              <div class="form">
                <div class="form__group">
                  <div
                    id="cardNumber"
                    class="form__input form__input--border"
                  ></div>
                  <div id="error-card-number" class="form__error"></div>
                </div>
                <!--                <div class="form__group">-->
                <!--                  <input-->
                <!--                    id="name"-->
                <!--                    v-model="owner_name"-->
                <!--                    class="form__input form__input&#45;&#45;name"-->
                <!--                    type="text"-->
                <!--                    placeholder="Nom du propriétaire"-->
                <!--                  />-->
                <!--                  <div id="error-card-name" class="form__error"></div>-->
                <!--                </div>-->
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
                <button v-if="!loading" class="form__submit" @click="submit">
                  <span>Valider</span>
                </button>
                <button v-else class="form__submit">
                  <img class="form__loader" src="/icons/loader-light.svg" />
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <a
      :class="[active ? 'active' : '']"
      class="box__open"
      @click="active = !active"
    >
      <svg
        width="16"
        height="10"
        viewBox="0 0 16 10"
        fill="none"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path
          d="M15 9L8 1L1 9"
          stroke="#9A9A9A"
          stroke-width="1.5"
          stroke-linecap="round"
          stroke-linejoin="round"
        />
      </svg>
    </a>
  </div>
</template>

<script>
export default {
  data() {
    return {
      active: true,
      stripe: null,
      stripeElements: null,
      card: null,
      loading: false,
      owner_name: '',
      cardNumber: '',
      cardExpiry: '',
      cardCvc: '',
      error: '',
    }
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
    submit() {
      this.loading = true
      this.stripe.createToken(this.cardNumber).then((res) => {
        if (res.error) {
          this.loading = false
          return
        }
        this.$axios
          .post('stripe/payment-cards', res)
          .then(() => {
            this.reset()
            this.$nuxt.$emit('get-payment-card')
          })
          .catch((e) => {
            console.log((this.error = e.response.data.errors))
            this.loading = false
          })
      })
    },
    reset() {
      this.owner_name = ''
      this.stripeElements.getElement('cardNumber').clear()
      this.stripeElements.getElement('cardExpiry').clear()
      this.stripeElements.getElement('cardCvc').clear()
      this.loading = false
      this.active = false
    },
  },
}
</script>

<style lang="scss" scoped>
.payment {
  &__container {
    width: 500px;
  }
}

.box {
  max-width: 716px;
  background: #ffffff;
  box-shadow: 0 6px 8px rgba(0, 0, 0, 0.1);
  border-radius: 10px;
  padding: 10px 37px 15px 22px;
  margin-bottom: 10px;
  display: flex;

  &__wrap {
    width: 100%;
    display: flex;
  }

  &__icons-wrap {
    margin-left: auto;
  }

  &__open {
    cursor: pointer;
    display: inline-table;
    transition: all 0.2s;
    margin-left: 25px;
    &.active {
      transform: rotateZ(180deg);
    }
  }

  &__top {
    width: 100%;
    display: flex;
    align-items: center;
  }

  &__bottom {
    width: 100%;
    display: block;
    align-items: center;
    margin-top: 20px;
    padding: 0 0 20px 0;
  }

  &__small {
    width: 100%;
    display: none;
    &.active {
      display: flex;
    }
  }

  &__big {
    width: 100%;
    display: none;
    &.active {
      display: block;
    }
  }

  &__merchant {
    font-family: Open Sans;
    font-style: normal;
    font-weight: normal;
    font-size: 14px;
    line-height: 19px;
    color: #9a9a9a;
    margin: 10px 0;
  }

  &__count {
    font-family: Open Sans;
    font-style: normal;
    font-weight: normal;
    font-size: 12px;
    line-height: 16px;
    color: #9a9a9a;
    &--bold {
      font-weight: 600;
      font-size: 14px;
      line-height: 19px;
      color: #565656;
    }
  }

  &__tag {
    background: #cfefe5;
    border-radius: 4px;
    padding: 2px 11px;
    font-family: Open Sans;
    font-style: normal;
    font-weight: 600;
    font-size: 12px;
    line-height: 16px;
    color: #1ec173;
    cursor: pointer;
    margin-left: 18px;
    span {
      margin-left: 4px;
    }
  }

  &__price {
    margin-left: auto;
    font-family: Open Sans;
    font-style: normal;
    font-weight: 600;
    font-size: 14px;
    line-height: 19px;
    text-transform: capitalize;
    color: #1ec173;
  }

  &__id {
    font-family: Open Sans;
    font-style: normal;
    font-weight: 600;
    font-size: 14px;
    line-height: 19px;
    text-transform: capitalize;
    color: #9a9a9a;
  }

  &__date {
    font-family: Open Sans;
    font-style: normal;
    font-weight: normal;
    font-size: 12px;
    line-height: 16px;
    text-transform: capitalize;
    color: #c4c4c4;
    margin-left: auto;
  }

  &__quantity {
    font-family: Open Sans;
    font-style: normal;
    font-weight: 600;
    font-size: 14px;
    line-height: 0;
    color: #565656;
    margin-right: 7px;
  }

  &__image {
    width: 47px;
    height: 47px;
    border-radius: 50%;
    margin-right: 11px;
    object-fit: cover;
  }

  &__product {
    font-family: Open Sans;
    font-style: normal;
    font-weight: 600;
    font-size: 12px;
    line-height: 16px;
    color: #2c2c2c;
  }

  &__unit {
    font-family: Open Sans;
    font-style: normal;
    font-weight: normal;
    font-size: 12px;
    line-height: 16px;
    color: #9a9a9a;
  }

  &__product-price {
    font-family: Open Sans;
    font-style: normal;
    font-weight: normal;
    font-size: 12px;
    line-height: 16px;
    color: #2b2b2b;
    margin-left: auto;
  }

  &__product-items {
    border-bottom: 1px solid #e1e1e1;
    margin-bottom: 10px;
  }

  &__product-item {
    width: 100%;
    display: flex;
    align-items: center;
    margin-bottom: 12px;
  }

  &__info {
    display: flex;
  }

  &__info-left {
    width: 50%;
    text-align: left;
    p {
      font-family: Open Sans;
      font-style: normal;
      font-weight: normal;
      font-size: 12px;
      line-height: 16px;
      text-transform: capitalize;
      color: #c4c4c4;
    }
  }

  &__info-right {
    width: 50%;
    text-align: right;
    p {
      font-family: Open Sans;
      font-style: normal;
      font-weight: normal;
      font-size: 12px;
      line-height: 16px;
      text-transform: capitalize;
      color: #9a9a9a;
    }
    h1 {
      font-family: Open Sans;
      font-style: normal;
      font-weight: 600;
      font-size: 16px;
      line-height: 22px;
      text-transform: capitalize;
      color: #565656;
    }
  }
}

.form {
  width: 100%;

  &__inline {
    width: 100%;
    display: grid;
    grid-template-columns: 48% 48%;
    grid-gap: 4%;
  }

  &__label {
    font-family: Open Sans;
    font-style: normal;
    font-weight: normal;
    font-size: 14px;
    line-height: 19px;
    text-transform: capitalize;
    color: #d1d1d1;
    margin-bottom: 2px;
  }

  &__input {
    width: 100%;
    height: 39px;
    background: #f3f3f3;
    border-radius: 7px;
    padding: 10px 22px;
    font-family: Open Sans;
    font-style: normal;
    font-weight: normal;
    font-size: 14px;
    line-height: 19px;
    color: #9a9a9a;
    border: none;
    margin: 2px 0 16px 0;
    &::placeholder {
      opacity: 0.4;
    }
    &--border {
      border: 2px solid #3b1099;
      box-sizing: border-box;
      background: #fff;
    }
  }

  &__loader {
    height: 18px;
    animation-name: spin-animation;
    animation-duration: 750ms;
    animation-iteration-count: infinite;
    animation-timing-function: linear;
  }

  &__subtitle {
    font-family: Open Sans;
    font-style: normal;
    font-weight: 600;
    font-size: 14px;
    line-height: 19px;
    color: #565656;
    margin: 20px 0 8px 0;
  }

  &__activity {
    width: fit-content;
    max-width: 100%;
    height: 39px;
    padding: 0 24px;
    border-radius: 30px;
    font-family: Open Sans;
    font-style: normal;
    font-weight: normal;
    font-size: 15px;
    line-height: 20px;
    color: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    transition: opacity 0.125s;
    margin-bottom: 14px;
    &:hover {
      opacity: 0.9;
    }
    &--border {
      border: 1px solid rgba(0, 0, 0, 0.15);
    }
    img {
      margin-left: 10px;
    }
  }

  &__error {
    font-family: Montserrat, serif;
    color: #ff3333;
    font-size: 13px;
    margin: -8px 0 4px 10px;
  }

  &__submit {
    width: 270px;
    height: 36px;
    background: #3b1099;
    box-shadow: 0 6px 4px rgba(0, 0, 0, 0.05);
    border-radius: 30px;
    font-family: Montserrat;
    font-style: normal;
    font-weight: 600;
    font-size: 14px;
    line-height: 17px;
    text-align: center;
    color: #ffffff;
    cursor: pointer;
    border: none;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: opacity 0.12s;
    margin: 15px 0 20px 0;
    &:hover {
      opacity: 0.88;
    }
  }
}
</style>
