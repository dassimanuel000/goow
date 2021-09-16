<template>
  <div class="event">
    <div class="event__item">
      <div class="event__item-title">
        <p>{{ event.title }}</p>
        <div v-if="isMyMarket || isMyMerchant" class="event__item-updatedelete">
          <a
            class="update"
            target="_blank"
            @click="$nuxt.$emit('open-eventadd-modal', event)"
          >
            <img src="/icons/update.svg" />
          </a>
          <a
            class="delete"
            target="_blank"
            @click="$nuxt.$emit('deleteEvent', event)"
          >
            <img src="/icons/delete.svg" />
          </a>
        </div>
      </div>
      <div v-if="event.description.length < 95">
        <p class="event__item-text">{{ event.description }}</p>
      </div>
      <div v-else @click="show()" class="event__item-text">
        <p>{{ displaytrime() }}</p>
        <!-- <a
          class="event__item-see-more"
          target="_blank"
          rel="noopener noreferrer"
          @click="show()"
        >
          voir plus
        </a> -->
      </div>
    </div>
  </div>
</template>

<script>
const trimedDescription = ''

export default {
  props: {
    event: {
      type: Object,
    },
    isMyMarket: {
      type: Boolean,
      required: false,
      default: false,
    },
    isMyMerchant: {
      type: Boolean,
      required: false,
      default: false,
    },
  },
  data() {
    return {
      trimedDescription,
      eventId: '',
    }
  },
  methods: {
    show() {
      if (this.event.description.length > 95) {
        this.$nuxt.$emit('open-event-modal', this.event)
      }
    },
    displaytrime() {
      const lenghtMax = 100
      this.trimedDescription =
        this.event.description.substring(0, lenghtMax) + '...'
      return this.trimedDescription
    },

    displayPopUp() {
      alert(this.event.description)
    },
  },
}
</script>

<style lang="scss" scoped>
.event {
  width: fit-content !important;
  max-width: 312px;
  min-width: 200px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
  margin: 0 10px 16px 10px;
  border-bottom-left-radius: 12px;
  border-bottom-right-radius: 12px;

  &__title {
    font-family: Open Sans;
    font-style: normal;
    font-weight: 600;
    font-size: 14px;
    line-height: 16px;
    color: #565656;
  }

  &__item {
    width: 100%;
    height: 131px;
  }

  &__item-title {
    height: 39px;
    font-family: Open Sans;
    font-style: normal;
    font-weight: 600;
    font-size: 14px;
    line-height: 16px;
    text-transform: capitalize;
    color: #ffffff;
    background: #feb42b;
    border-top-left-radius: 12px;
    border-top-right-radius: 12px;
    padding: 10px 20px;
    p {
      max-width: 210px;
      overflow: hidden;
      float: left;
    }
  }

  &__item-updatedelete {
    float: right;
    .update {
      width: 30px;
      height: 30px;
      img {
        width: 24px;
        height: 24px;
        cursor: pointer;
      }
    }
    .delete {
      width: 30px;
      height: 30px;
      img {
        width: 24px;
        height: 24px;
        cursor: pointer;
      }
    }
  }

  &__item-text {
    width: 100%;
    height: 70px;
    font-family: Open Sans;
    font-style: normal;
    font-weight: 400;
    font-size: 14px;
    line-height: 19px;
    color: #9a9a9a;
    padding: 10px 30px;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 3;
    p {
      max-width: 252px;
      max-height: 56px;
      overflow: hidden;
    }
  }

  &__item-see-more {
    color: #bebebe;
    text-decoration: underline;
    font-size: 14px;
    float: right;
    padding-right: 15px;
    padding-bottom: 5px;
    cursor: pointer;
    transition: color 0.1s;
    &:hover {
      color: #a8a5a5;
    }
  }
}
</style>
