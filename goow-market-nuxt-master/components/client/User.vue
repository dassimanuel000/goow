<template>
  <div class="box active">
    <div class="box__wrap">
      <div class="box__top">
        <svg
          class="box__image"
          width="25"
          height="29"
          viewBox="0 0 25 29"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M19.7232 7.69753C19.7232 11.717 16.4656 14.9398 12.4999 14.9398C8.53241 14.9398 5.27673 11.7151 5.27673 7.74228C5.27673 3.72285 8.5343 0.5 12.4999 0.5C16.4694 0.5 19.7232 3.68187 19.7232 7.69753ZM18.9374 7.74228C18.9374 4.15313 16.0337 1.29012 12.4999 1.29012C8.96863 1.29012 6.06245 4.15067 6.06245 7.69753C6.06245 11.2867 8.96616 14.1497 12.4999 14.1497C16.0288 14.1497 18.9374 11.3364 18.9374 7.74228Z"
            fill="#3B1099"
            stroke="#3B1099"
          />
          <path
            d="M0.5 28.1048C0.5 22.495 5.78531 17.8193 12.5 17.8193C19.1713 17.8193 24.5 22.4961 24.5 28.1048C24.5 28.3221 24.3209 28.4999 24.1071 28.4999C23.8934 28.4999 23.7143 28.3221 23.7143 28.1048C23.7143 22.7821 18.5827 18.6095 12.5 18.6095C6.41726 18.6095 1.28571 22.7821 1.28571 28.1048C1.28571 28.3221 1.10662 28.4999 0.892857 28.4999C0.679091 28.4999 0.5 28.3221 0.5 28.1048Z"
            fill="#3B1099"
            stroke="#3B1099"
          />
        </svg>
        <p class="box__id">
          {{ item.first_name | firtCaps }} {{ item.last_name | firtCaps }}
        </p>
        <div class="box__icons-wrap">
          <p v-if="item.phone != ''" class="box__phone">{{ item.phone }}</p>
          <p v-if="item.phone != ''" class="box__between">|</p>
          <p class="box__email">{{ item.email | lowerCase }}</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Vue from 'vue'
Vue.filter('lowerCase', function (value) {
  return value.toLowerCase()
})
Vue.filter('firtCaps', function (value) {
  const lowerCaseAll = value.toLowerCase()
  return lowerCaseAll.charAt(0).toUpperCase() + lowerCaseAll.slice(1)
})
export default {
  props: {
    item: {
      type: Object,
    },
  },
  data() {
    return {}
  },
  methods: {},
}
</script>

<style lang="scss" scoped>
.box {
  max-width: 600px;
  background: #ffffff;
  box-shadow: 0 6px 8px rgba(0, 0, 0, 0.1);
  border-radius: 10px;
  padding: 12px 12px 12px 30px;
  margin-bottom: 10px;

  &__wrap {
    width: 100%;
    display: flex;
  }

  &__icons-wrap {
    margin-left: auto;
    display: flex;
    width: 50%;
    justify-content: right;

    @media screen and (max-width: 769px) {
      margin-left: 0px;
      width: 100%;
    }
  }

  &__top {
    width: 100%;
    display: flex;
    align-items: center;
  }

  &__id {
    font-family: Open Sans;
    font-style: normal;
    font-weight: 600;
    font-size: 14px;
    line-height: 19px;
    color: #9a9a9a;
    width: 20%;
  }

  &__image {
    width: 47px;
    height: 47px;
    border-radius: 50%;
    margin-right: 11px;
    object-fit: cover;
  }

  &__email {
    font-family: Open Sans;
    font-style: normal;
    font-weight: 600;
    font-size: 14px;
    line-height: 19px;
    color: #e08347;
    width: 100%;
    text-align: right;
    overflow: hidden;
  }

  &__phone {
    font-family: Open Sans;
    font-style: normal;
    font-weight: 600;
    font-size: 14px;
    line-height: 19px;
    color: #e08347;
    min-width: 50%;
    text-align: left;
    overflow: hidden;
  }

  &__between {
    width: 5%;
    text-align: center;
  }
}
</style>
