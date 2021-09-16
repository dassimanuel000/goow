<template>
  <div>
    <Nav />
    <Backlight />
    <Nuxt />
    <ModalBox :active="modalBox.active">
      <p class="modal-box__title">{{ modalBox.message }}</p>
    </ModalBox>
    <Footer />
  </div>
</template>

<script>
export default {
  data() {
    return {
      modalBox: {
        active: false,
        message: '',
      },
    }
  },
  mounted() {
    this.$nuxt.$on('error', (val) => {
      this.modalBox.active = true
      this.modalBox.message = val.message
    })

    this.$nuxt.$on('close-modal-box', () => (this.modalBox.active = false))
  },
}
</script>

<style lang="scss">
.modal-box__title {
  max-width: 420px;
  font-family: Open Sans;
  font-style: normal;
  font-weight: normal;
  font-size: 14px;
  line-height: 19px;
  text-align: center;
  color: #9a9a9a;
  margin: 0 auto 0 auto;
}
</style>
