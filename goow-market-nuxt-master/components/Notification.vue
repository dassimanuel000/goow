<template>
  <div :class="[active ? 'active' : '']" class="notification">
    <div class="notification__wrap">
      <p class="notification__title">{{ title }}</p>
      <p class="notification__text">
        {{ text }}
      </p>
      <nuxt-link
        class="notification__link"
        to="/profile/orders"
        @click.native="active = false"
        >#{{ order.id }} Order</nuxt-link
      >
    </div>
    <a class="notification__close" @click="active = false">
      <svg
        width="17"
        height="17"
        viewBox="0 0 17 17"
        fill="none"
        xmlns="http://www.w3.org/2000/svg"
        style="cursor: pointer"
        data-v-30994a57=""
      >
        <path
          d="M1 1L16 16"
          stroke="#C4C4C4"
          stroke-linecap="round"
          stroke-linejoin="round"
          data-v-30994a57=""
        ></path>
        <path
          d="M16 1L1 16"
          stroke="#C4C4C4"
          stroke-linecap="round"
          stroke-linejoin="round"
          data-v-30994a57=""
        ></path>
      </svg>
    </a>
  </div>
</template>

<script>
export default {
  data() {
    return {
      active: false,
      order: {
        id: '',
      },
      title: '',
      text: '',
      status: '',
    }
  },
  mounted() {
    if (this.$auth.loggedIn) {
      this.$echo
        .private(`App.Models.User.${this.$auth.user.id}`)
        .listen('OrderStatus', (e) => {
          this.active = true
          this.title = e.title
          this.text = e.text
          this.status = e.status
          this.order = e.order
        })
    }
  },
}
</script>

<style lang="scss" scoped>
.notification {
  display: none;
  width: 320px;
  min-height: 55px;
  position: fixed;
  top: 20px;
  right: 120px;
  z-index: 3;
  box-shadow: 0 6px 8px rgba(0, 0, 0, 0.1);
  border-radius: 6px;
  padding: 8px 16px;
  align-items: center;
  background: #fff;
  border: 1px solid #e4e4e4;
  box-sizing: border-box;
  &.active {
    display: flex;
  }

  &__wrap {
    width: calc(100% - 30px);
  }

  &__title {
    font-family: Montserrat;
    font-style: normal;
    font-weight: 600;
    font-size: 20px;
    line-height: 20px;
    color: #c4c4c4;
  }

  &__text {
    font-family: Open Sans;
    font-style: normal;
    font-weight: normal;
    font-size: 14px;
    line-height: 19px;
    color: #9a9a9a;
    margin: 2px 0 2px 0;
  }

  &__link {
    font-family: Open Sans;
    font-size: 14px;
    line-height: 19px;
    color: #3b1099;
    font-style: normal;
    font-weight: normal;
    text-decoration: none;
    letter-spacing: 0.6px;
  }

  &__close {
    margin-left: auto;
    cursor: pointer;
    transition: opacity 0.1s;
    &:hover {
      opacity: 0.8;
    }
  }
}
</style>
