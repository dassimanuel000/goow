<template>
  <div class="box active">
    <div class="box__wrap">
      <div class="box__bottom">
        <div class="box__small active">
          <div>
            <p class="box__count box__count--bold">{{ paymentCard.brand }}</p>
            <p class="box__count">****{{ paymentCard.last4 }}</p>
          </div>
        </div>
      </div>
      <a class="box__remove" @click="remove">
        <svg
          width="11"
          height="13"
          viewBox="0 0 11 13"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
          opacity="0.1"
        >
          <path
            d="M8.66649 3.01123H1.73314C1.47314 3.01123 1.2998 3.17522 1.2998 3.42121V12.0309C1.2998 12.2359 1.47314 12.4409 1.73314 12.4409H8.66649C8.88316 12.4409 9.09982 12.2359 9.09982 12.0309V3.42121C9.09982 3.17522 8.88316 3.01123 8.66649 3.01123Z"
            fill="black"
          />
          <path
            d="M9.96666 1.78133H7.32333C7.10666 0.838346 6.24 0.141357 5.2 0.141357C4.16 0.141357 3.29333 0.838346 3.07666 1.78133H0.433333C0.173333 1.78133 0 1.94533 0 2.19132C0 2.43732 0.173333 2.60132 0.433333 2.60132H3.46666H6.93333H9.96666C10.2267 2.60132 10.4 2.43732 10.4 2.19132C10.4 1.94533 10.2267 1.78133 9.96666 1.78133ZM3.98666 1.78133C4.16 1.28934 4.63666 0.961344 5.2 0.961344C5.76333 0.961344 6.24 1.28934 6.41333 1.78133H3.98666Z"
            fill="black"
          />
        </svg>
      </a>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    paymentCard: {
      type: Object,
    },
  },
  methods: {
    remove() {
      this.$axios
        .delete('stripe/payment-cards/' + this.paymentCard.id)
        .then(() => this.$nuxt.$emit('get-payment-card'))
    },
  },
}
</script>

<style lang="scss" scoped>
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
    margin-top: 8px;
    padding: 0 0 2px 0;
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

  &__remove {
    display: flex;
    align-items: center;
    cursor: pointer;
    svg {
      transition: opacity 0.15s;
    }
    &:hover svg {
      opacity: 0.3;
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
    text-transform: capitalize;
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
    text-transform: capitalize;
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
</style>
