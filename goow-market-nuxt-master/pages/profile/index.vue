<template>
  <div class="profile">
    <ProfileSidebar />
    <div class="profile__content">
      <p class="profile__title">Mon Compte</p>

      <div v-if="!$auth.user.email_verified_at" class="profile__row">
        <button
          v-if="!verificationEmailSent"
          class="profile__button profile__button--gray profile__button--left"
          type="button"
          @click="sendVerificationEmail"
        >
          Envoi du mail de verification
        </button>
        <p v-else>Envoyé</p>
      </div>
      <div class="profile__row">
        <button
          :class="[form === 'INFO' ? 'active' : '']"
          class="profile__button"
          @click="form = 'INFO'"
        >
          Mes Informations
        </button>
        <button
          v-if="$auth.users"
          :class="[form === 'ADDRESS' ? 'active' : '']"
          class="profile__button"
          @click="form = 'ADDRESS'"
        >
          Mes Adresses
        </button>
        <button
          v-if="$auth.user.is_merchant"
          :class="[form === 'BANK_ACCOUNT' ? 'active' : '']"
          class="profile__button"
          @click="form = 'BANK_ACCOUNT'"
        >
          Moyens de Paiement
        </button>
        <button
          v-if="!$auth.user.is_merchant"
          :class="[form === 'PAYMENT' ? 'active' : '']"
          class="profile__button"
          @click="form = 'PAYMENT'"
        >
          Moyens de Paiement
        </button>
      </div>
      <ProfileFormInfo v-if="form === 'INFO'" :user="user" />
      <div v-if="form === 'ADDRESS'">
        <ProfileFormCreateAddress />
        <ProfileFormUpdateAddress
          v-for="(item, index) in addresses"
          :key="index"
          :address="item"
        />
        <div class="profile__row">
          <button
            class="profile__button profile__button--gray"
            type="button"
            @click="$nuxt.$emit('create-address-form')"
          >
            Ajouter une adresse
          </button>
        </div>
      </div>
      <ProfileFormBankAccount v-if="form === 'BANK_ACCOUNT'" :user="user" />
      <ProfileFormCreatePaymentCard v-if="form === 'PAYMENT'" />
      <div v-if="form === 'PAYMENT'">
        <ProfileFormPaymentCard
          v-for="(item, index) in paymentCards"
          :key="index"
          :payment-card="item"
        />
      </div>
    </div>
  </div>
</template>

<script>
export default {
  middleware: 'authenticated',
  async asyncData({ $axios }) {
    const user = (await $axios.$get('auth/user')).data
    return { user }
  },
  data() {
    return {
      form: 'INFO',
      markets: [],
      addFormActive: false,
      addresses: [],
      paymentCards: [],
      verificationEmailSent: false,
    }
  },
  mounted() {
    this.getAddresses()
    // this.getPaymentCards()

    this.$nuxt.$on('address-created', () => this.getAddresses())
    // this.$nuxt.$on('get-payment-card', () => this.getPaymentCards())

    if (!this.$auth.user.is_market && !this.$auth.user.is_merchant) {
      // this.form = 'PAYMENT'
      this.form = 'INFO'
    }
  },
  methods: {
    getMerchants() {
      this.$axios
        .$get('my-markets?merchant-status=' + this.status)
        .then((response) => {
          this.markets = response.markets
        })
    },
    getAddresses() {
      this.$axios
        .get('users/address')
        .then((response) => (this.addresses = response.data.addresses))
    },
    // getPaymentCards() {
    //   this.$axios
    //     .get('stripe/payment-cards')
    //     .then((response) => (this.paymentCards = response.data.data))
    // },
    sendVerificationEmail() {
      this.$axios
        .post('verification')
        .then(() => (this.verificationEmailSent = true))
    },
  },
}
</script>

<style lang="scss" scoped>
.profile {
  display: flex;

  &__content {
    width: 100%;
    min-height: 100vh;
    padding: 40px 0 80px 80px;
    background: #fff;
    @media screen and (max-width: 1024px) {
      padding: 40px 20px 80px 20px;
    }
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
    max-width: 716px;
    display: flex;
    margin: 20px 0;
  }

  &__button {
    width: 185px;
    height: 40px;
    color: #565656;
    box-sizing: border-box;
    border-radius: 30px;
    font-family: Open Sans;
    font-style: normal;
    font-weight: 600;
    font-size: 14px;
    line-height: 19px;
    border: none;
    background: #fff;
    cursor: pointer;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: opacity 0.125s;
    &:hover {
      opacity: 0.9;
    }
    &.active {
      color: #3b1099;
      border: 2px solid #3b1196;
    }
    &--gray {
      background: #e8e8e8;
      color: #6f6f6f;
      margin: 20px auto;
      text-align: center;
    }
    &--left {
      margin: 20px 0;
    }
  }

  &__link {
    width: 193px;
    height: 40px;
    background: #e8e8e8;
    border-radius: 30px;
    font-family: Open Sans;
    font-style: normal;
    font-weight: normal;
    font-size: 12px;
    line-height: 16px;
    color: #6f6f6f;
    margin-left: auto;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    text-decoration: none;
    &.active {
      color: rgba(0, 0, 0, 0.5);
      border: 2px solid rgba(0, 0, 0, 0.5);
    }
  }
}
</style>
