<template>
  <div class="profile">
    <ProfileSidebar />
    <div v-if="$auth.user.is_merchant" class="profile__content">
      <p class="profile__title">Mes commandes</p>
      <div class="profile__row">
        <button
          :class="[status === 'PENDING' ? 'active' : '']"
          class="profile__button"
          @click="getMerchantsOrders('PENDING')"
        >
          À Valider
        </button>
        <button
          :class="[status === 'IN_PROGRESS' ? 'active' : '']"
          class="profile__button"
          @click="getMerchantsOrders('IN_PROGRESS')"
        >
          À Préparer
        </button>
        <button
          :class="[status === 'READY' ? 'active' : '']"
          class="profile__button"
          @click="getMerchantsOrders('READY')"
        >
          Prêt
        </button>
        <button
          :class="[status === 'COMPLETED' ? 'active' : '']"
          class="profile__button"
          @click="getMerchantsOrders('COMPLETED')"
        >
          Terminé
        </button>
      </div>
      <div v-if="orders.length <= 1">
        <OrderItem v-for="(item, index) in orders" :key="index" :item="item" />
      </div>
      <div v-else>
        <div v-for="(merchant, index) in orders" :key="index">
          <div v-if="merchant != ''">
            <OrderItem
              v-for="(item, index) in merchant"
              :key="index"
              :item="item"
            />
          </div>
        </div>
      </div>
    </div>
    <div v-else class="profile__content">
      <p class="profile__title">Mes commandes</p>
      <div class="profile__row">
        <button
          :class="[status.includes('IN_PROGRESS') ? 'active' : '']"
          class="profile__button"
          @click="getOrders(['PENDING', 'IN_PROGRESS', 'READY'])"
        >
          En cours
        </button>
        <div class="roundIconCount">
          <a href="#"> {{ orders.length }} </a>
        </div>
        <button
          :class="[status === 'COMPLETED' ? 'active' : '']"
          class="profile__button"
          @click="getOrders('COMPLETED')"
        >
          Terminées
        </button>
        <div class="roundIconCount">
          <a href="#"> {{ orders.status }} </a>
        </div>
      </div>
      <OrderItem v-for="(item, index) in orders" :key="index" :item="item" />
    </div>
  </div>
</template>

<script>
export default {
  middleware: 'authenticated',
  data() {
    return {
      orderInfo: [],
      status: 'IN_PROGRESS',
      orders: [],
    }
  },
  mounted() {
    if (this.$auth.user.is_merchant) {
      this.getMerchantsOrders('PENDING')
    } else {
      this.getOrders(['PENDING', 'IN_PROGRESS', 'READY'])
    }

    this.$nuxt.$on('order-status-changed', () => {
      this.getMerchantsOrders(this.status)
    })
  },
  methods: {
    // Signed in as customer
    getOrders(status) {
      this.status = status
      this.$axios.$get('orders?status=' + status).then((response) => {
        this.orders = response.orders
      })
    },
    // Signed in as merchant
    getMerchantsOrders(status) {
      this.status = status
      this.$axios
        .$get('merchant-profiles/orders?status=' + status)
        .then((response) => {
          this.orders = response.orders
        })
    },

    isMultipleStands() {
      if (this.orders.length <= 1) {
        return false
      } else {
        return true
      }
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
    display: flex;
    margin: 20px 0;
  }

  &__button {
    width: 129px;
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
}
</style>

<style lang="scss" scoped>
.roundIconCount {
  position: relative;
  overflow: hidden;
  bottom: -10px;
  left: -27px;
  width: 20px;
  height: 20px;
  border-radius: 20px;
  background: #3b1099;
  text-align: center;
  font-family: Open Sans, serif;
  font-style: normal;
  font-weight: normal;
  font-size: 14px;
  line-height: 20px;
  a {
    color: white;
    text-decoration: none;
  }
}
</style>
