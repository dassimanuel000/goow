<template>
  <div class="profile">
    <ProfileSidebar />
    <div class="profile__content">
      <p class="profile__title">Marchands</p>
      <div class="profile__row">
        <button
          :class="[status === 'CONFIRMED' ? 'active' : '']"
          class="profile__button hidden-mobile"
          @click="
            status = 'CONFIRMED'
            addFormActive = false
          "
        >
          Marchands Validés
        </button>
        <button
          :class="[status === 'CONFIRMED' ? 'active' : '']"
          class="profile__button hidden-desktop"
          @click="
            status = 'CONFIRMED'
            addFormActive = false
          "
        >
          Validés
        </button>
        <button
          :class="[status === 'PENDING' ? 'active' : '']"
          class="profile__button hidden-mobile"
          @click="
            status = 'PENDING'
            addFormActive = false
          "
        >
          Marchands en attente
        </button>
        <button
          :class="[status === 'PENDING' ? 'active' : '']"
          class="profile__button hidden-desktop"
          @click="
            status = 'PENDING'
            addFormActive = false
          "
        >
          En attente
        </button>
        <a
          class="profile__link"
          @click="
            addFormActive = true
            status = ''
          "
        >
          <svg
            width="14"
            height="14"
            viewBox="0 0 14 14"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M7 13L7 0.999999"
              stroke="#6E6E6E"
              stroke-width="1.5"
              stroke-linecap="round"
            />
            <path
              d="M1 7L13 7"
              stroke="#6E6E6E"
              stroke-width="1.5"
              stroke-linecap="round"
            />
          </svg>
          <span :class="[addFormActive ? 'active' : '']">
            Ajouter un marchand</span
          >
        </a>
      </div>
      <MerchantCreateUser v-if="addFormActive" :market="market" />
      <div v-if="!addFormActive">
        <MerchantUser
          v-for="(merchant, merchantIndex) in market.merchants"
          :key="merchantIndex"
          :item="merchant"
        />
      </div>
    </div>
  </div>
</template>

<script>
export default {
  middleware: 'authenticated',
  data() {
    return {
      status: 'PENDING',
      market: {},
      addFormActive: false,
    }
  },
  watch: {
    status() {
      this.getMerchants()
    },
  },
  mounted() {
    this.getMerchants()

    this.$nuxt.$on('merchant-status-changed', () => this.getMerchants())

    this.$nuxt.$on('merchant-created', () => {
      this.status = 'CONFIRMED'
      this.addFormActive = false
      this.getMerchants()
    })

    if (this.$route.params.addFormActive) {
      this.addFormActive = this.$route.params.addFormActive
    }
  },
  methods: {
    getMerchants() {
      this.$axios
        .$get('my-market?merchant-status=' + this.status)
        .then((response) => {
          this.market = response.market
        })
    },
  },
}
</script>

<style lang="scss" scoped>
.profile {
  @media screen and (min-width: 1025px) {
    .hidden-desktop {
      display: none;
    }
  }
  @media screen and (max-width: 1024px) {
    .hidden-mobile {
      display: none;
    }
  }
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
    min-width: 110px;
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
    &.active {
      color: #3b1099;
      border: 2px solid #3b1196;
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
    text-align: center;
    cursor: pointer;
    text-decoration: none;
    &.active {
      color: rgba(0, 0, 0, 0.5);
      border: 2px solid rgba(0, 0, 0, 0.5);
    }
    svg {
      margin-right: 10px;
    }
    @media screen and (max-width: 769px) {
      svg {
        margin-right: 0px;
        margin-left: 15px;
      }
    }
  }
}
</style>
