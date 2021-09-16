<template>
  <div class="qunatity">
    <div
      class="qunatity-operator"
      @click="$store.commit('cart/INCREASE', product)"
    >
      <svg
        width="14"
        height="14"
        viewBox="0 0 14 14"
        fill="none"
        xmlns="http://www.w3.org/2000/svg"
      >
        <circle cx="7" cy="7" r="7" fill="white" />
        <path
          d="M7.50732 6.75146H9.72021V7.49268H7.50732V9.78076H6.76074V7.49268H4.55859V6.75146H6.76074V4.45264H7.50732V6.75146Z"
          fill="#565656"
        />
      </svg>
    </div>
    <div class="qunatity-number">{{ product.quantity }}</div>
    <div class="qunatity-operator" @click="decrease(product)">
      <svg
        width="14"
        height="14"
        viewBox="0 0 14 14"
        fill="none"
        xmlns="http://www.w3.org/2000/svg"
      >
        <circle cx="7" cy="7" r="7" fill="white" />
        <path
          d="M5.45117 7.45947V6.64307H8.08838V7.45947H5.45117Z"
          fill="#565656"
        />
      </svg>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    product: {
      type: Object,
    },
  },
  methods: {
    decrease(product) {
      if (product.quantity > 1) {
        this.$store.commit('cart/DECREASE', product)
      } else {
        this.$store.commit('cart/REMOVEPRODUCT', product)
      }
    },
  },
}
</script>

<style lang="scss" scoped>
.qunatity {
  width: 18px;
  padding: 2px 0;
  font-family: Open Sans, serif;
  font-style: normal;
  font-weight: bold;
  font-size: 11px;
  color: #565656;
  background: #ededed;
  border-radius: 30px;
  &-operator {
    cursor: pointer;
    user-select: none;
    svg {
      margin: 0 auto;
      display: block;
    }
  }
  &-number {
    text-align: center;
    margin: 2px 0;
  }
}
</style>
