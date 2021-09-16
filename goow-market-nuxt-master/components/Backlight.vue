<template>
  <div
    v-if="showBacklight"
    style="
      width: 100%;
      height: 100%;
      z-index: 90;
      position: fixed;
      top: 0;
      left: 0;
      background-color: rgba(0, 0, 0, 0.3);
    "
  ></div>
</template>

<script>
export default {
  name: 'Backlight',
  data() {
    return {
      showBacklight: false,
    }
  },
  mounted() {
    this.$nuxt.$on('setBacklight', (showBacklight) => {
      this.showBacklight = showBacklight
    })
  },
}
</script>

<style scoped></style>
