<template>
  <div v-on-clickaway="closeOnClickOutside">
    <span class="title" @click="toggleDropDown()" v-html="title"></span>
    <div
      :style="`transform: translateX(${translateX}%);`"
      class="card"
      :class="!isShown ? 'hidden' : ''"
    >
      <slot :isShown="isShown"></slot>
    </div>
  </div>
</template>

<script>
import { directive as onClickaway } from 'vue-clickaway'

export default {
  name: 'NavDropDown',
  directives: {
    onClickaway,
  },
  props: {
    translateX: {
      type: Number,
      default: 0,
    },
    backlight: {
      type: Boolean,
      default: false,
    },
    title: {
      type: String,
      default: 'Title',
    },
  },
  data() {
    return {
      isShown: false,
    }
  },
  watch: {
    isShown() {
      if (this.backlight) {
        this.$nuxt.$emit('setBacklight', this.isShown)
      }
    },
  },
  mounted() {
    this.closeOnFilterChangedEvent()
  },
  methods: {
    closeOnFilterChangedEvent() {
      const self = this
      this.$nuxt.$on('filterChanged', function (data) {
        self.isShown = false
      })
    },
    toggleDropDown() {
      this.isShown = !this.isShown
    },
    closeOnClickOutside() {
      this.isShown = false
    },
  },
}
</script>

<style lang="scss" scoped>
.title {
  cursor: pointer;
}
.hidden {
  display: none;
}
.card {
  z-index: 99;
  position: absolute;
  top: 70px;
  left: -5px;
  background: #ffffff;
  box-shadow: 0 6px 4px rgba(0, 0, 0, 0.05);
  border-radius: 20px;
}
</style>
