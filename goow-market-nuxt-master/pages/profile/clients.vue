<template>
  <div class="profile">
    <ProfileSidebar />
    <div class="profile__content">
      <p class="profile__title">Clients</p>
      <div class="profile__row">
        <div v-if="$auth.user.is_market">
          <p v-if="!emailForm" class="profile__smallTitle">
            Liste des clients favoris du marché
          </p>
        </div>
        <div v-if="$auth.user.is_merchant">
          <p v-if="!emailForm" class="profile__smallTitle">
            Liste des clients favoris de votre stand
          </p>
        </div>
        <p v-if="emailForm" class="profile__smallTitle">
          Envoyer un email à tous vos clients.
        </p>
        <a
          v-if="!emailForm"
          class="profile__link"
          @click="
            emailForm = true
            status = ''
          "
        >
          <span>Envoyer un email</span>
          <svg
            width="21"
            height="14"
            viewBox="0 0 21 14"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <g clip-path="url(#clip0)">
              <path
                d="M20.9999 0.44191C20.9999 0.397746 20.9999 0.353582 20.9541 0.309418V0.265254C20.9541 0.22109 20.9084 0.22109 20.9084 0.176926L20.8626 0.132762L20.8169 0.0885976C20.8169 0.0885976 20.8169 0.0885976 20.7711 0.0885976C20.7254 0.0444336 20.6796 0.0444336 20.6339 0.0444336C20.6339 0.0444336 20.5881 0.0444336 20.5424 0.0444336C20.4966 0.0444336 20.4966 0.0444336 20.4509 0.0444336H20.4051L0.365894 4.24002C0.0913841 4.28418 -0.0458707 4.505 -0.000119111 4.72582C0.0456325 4.85831 0.137136 4.94664 0.228639 5.03497L6.08485 7.9498L7.13714 13.4703C7.13714 13.5145 7.18289 13.5586 7.18289 13.6028C7.18289 13.6028 7.18289 13.6028 7.18289 13.647C7.22864 13.6911 7.22864 13.7353 7.27439 13.7353C7.32014 13.7794 7.36589 13.7794 7.36589 13.7794C7.41164 13.7794 7.4574 13.7794 7.50315 13.7794C7.59465 13.7794 7.68615 13.7353 7.77766 13.6911L11.3463 11.1296L15.2352 13.8678C15.4182 14.0003 15.7384 13.9561 15.8757 13.7794C15.9214 13.7353 15.9214 13.6911 15.9214 13.6911L20.9999 0.574402C20.9999 0.530238 20.9999 0.486074 20.9999 0.44191ZM8.69269 8.52393C8.69269 8.56809 8.69269 8.56809 8.69269 8.52393C8.64694 8.56809 8.60119 8.61226 8.60119 8.65642L8.55544 8.70059V8.74475L7.68615 11.4829L6.99988 7.90563L15.6469 3.44506L8.69269 8.52393ZM17.4313 1.54601L6.49661 7.15484L1.78419 4.81415L17.4313 1.54601ZM8.41818 12.2337L9.19596 9.62803L10.6143 10.6438L8.41818 12.2337ZM15.3724 12.852L9.74498 8.92141L19.5816 1.6785L15.3724 12.852Z"
                fill="#C4C4C4"
              />
            </g>
            <defs>
              <clipPath id="clip0">
                <rect width="21" height="14" fill="white" />
              </clipPath>
            </defs>
          </svg>
        </a>
      </div>
      <div v-if="$auth.user.is_market">
        <ClientEmail
          v-if="emailForm"
          :clients="marketClients"
          :store="market"
          :mainUser="marketUser"
        />
        <div v-if="!emailForm">
          <ClientUser
            v-for="(client, clientIndex) in marketClients"
            :key="clientIndex"
            :item="client"
          />
        </div>
      </div>
      <div v-if="$auth.user.is_merchant">
        <ClientEmail
          v-if="emailForm"
          :clients="merchantClients"
          :store="merchant"
          :mainUser="merchantUser"
        />
        <div v-if="!emailForm">
          <ClientUser
            v-for="(client, clientIndex) in merchantClients"
            :key="clientIndex"
            :item="client"
          />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  middleware: 'authenticated',
  data() {
    return {
      marketUser: [],
      market: [],
      marketClients: [],
      merchantUser: [],
      merchant: [],
      merchantClients: [],
      emailForm: false,
    }
  },
  mounted() {
    if (this.$auth.user.is_market) {
      this.marketUser = this.$auth.user
      this.market = this.$auth.user.market
    }
    if (this.$auth.user.is_merchant) {
      this.merchantUser = this.$auth.user
      this.merchant = this.$auth.user.merchant
    }

    this.getClients()
  },
  methods: {
    async getClients() {
      if (this.$auth.user.is_market) {
        try {
          const clients = await this.$axios.get('liked-clients')
          this.marketClients = clients.data
        } catch (e) {
          this.errors.record(e.response.data.errors)
        }
      }
      if (this.$auth.user.is_merchant) {
        try {
          const clients = await this.$axios.get('merchant-liked-clients')
          this.merchantClients = clients.data
        } catch (e) {
          this.errors.record(e.response.data.errors)
        }
      }
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

  &__smallTitle {
    font-family: Montserrat;
    font-style: normal;
    font-weight: 420;
    font-size: 16px;
    color: #3b1099;
  }

  &__row {
    max-width: 600px;
    display: flex;
    margin: 20px 0;
    place-items: center;
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
    justify-content: space-evenly;
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
