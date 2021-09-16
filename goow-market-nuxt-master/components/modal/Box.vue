<template>
  <div :class="{ active: active }" class="modal-box" @click="close($event)">
    <div id="modal-box-container" class="modal-box__container">
      <slot></slot>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    active: {
      type: Boolean,
      required: true,
    },
  },
  methods: {
    close(e) {
      const el = document.getElementById('modal-box-container')

      if (el)
        if (this.active && !el.contains(e.target))
          this.$nuxt.$emit('close-modal-box')
    },
  },
}
</script>

<style lang="scss" scoped>
.modal-box {
  display: none;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.3);
  position: fixed;
  top: 0;
  left: 0;
  z-index: 2;
  &.active {
    display: block;
  }

  &__container {
    background: #ffffff;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    border-radius: 30px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 35px 60px 45px 60px;
  }
}
</style>
