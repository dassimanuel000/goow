<template>
  <div class="city__wrap">
    <div class="city">
      <nuxt-link :to="`/explore?type=markets&city=${city.slug}`">
        <img class="city__image" :src="$api_storage_url + city.image" />
      </nuxt-link>
      <p class="city__title">{{ city.name }}</p>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    city: {
      type: Object,
    },
  },
}
</script>

<style lang="scss" scoped>
.city {
  text-align: center;
  align-items: center;
  margin: 20px 0;

  &__image {
    width: 71px;
    height: 71px;
    border-radius: 12px;
    overflow: hidden;
    user-drag: none;
    user-select: none;
    -moz-user-select: none;
    -webkit-user-drag: none;
    -webkit-user-select: none;
    -ms-user-select: none;
  }

  &__title {
    font-family: Open Sans;
    font-style: normal;
    font-weight: 600;
    font-size: 16px;
    line-height: 22px;
    color: #2c2c2c;
  }
}
</style>
