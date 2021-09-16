<template>
  <div class="box active">
    <div class="box__wrap">
      <div class="box__top">
        <div v-if="item.image">
          <img class="box__image" :src="$api_storage_url + item.image" />
        </div>
        <div v-else>
          <div v-if="item.activity.image">
            <img
              class="box__image"
              :src="$api_storage_url + item.activity.image"
            />
          </div>
          <div v-else>
            <img
              class="box__image"
              :src="$api_storage_url + 'images/merchant/default/Shop.jpg'"
            />
          </div>
        </div>
        <p class="box__id">{{ item.title }}</p>
        <div class="box__icons-wrap">
          <svg
            width="18"
            height="10"
            viewBox="0 0 18 10"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <rect width="18" height="2" fill="#C4C4C4" />
            <rect y="4" width="18" height="2" fill="#C4C4C4" />
            <rect y="8" width="18" height="2" fill="#C4C4C4" />
          </svg>
          <a
            :class="[active ? 'active' : '']"
            class="box__open"
            @click="active = !active"
          >
            <svg
              width="16"
              height="10"
              viewBox="0 0 16 10"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M15 9L8 1L1 9"
                stroke="#9A9A9A"
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
          </a>
        </div>
      </div>
    </div>
    <div :class="[active ? 'active' : '']" class="box__bottom">
      <form class="form">
        <div class="form__inline">
          <div class="form__group">
            <label class="form__label">
              Activité
              <a
                class="form__activity"
                :style="{ background: item.activity.color }"
              >
                {{ item.activity.title }}
                <img
                  class="form__icon"
                  :src="$api_storage_url + item.activity.icon"
                />
              </a>
            </label>
          </div>
          <div class="form__group">
            <label class="form__label">
              Nom du Marchand
              <input
                class="form__input"
                type="text"
                :placeholder="item.title"
                disabled
              />
            </label>
          </div>
        </div>
        <div class="form__inline">
          <div class="form__group">
            <label class="form__label">
              Nom
              <input
                class="form__input"
                type="text"
                :placeholder="item.user.first_name"
                disabled
              />
            </label>
          </div>
          <div class="form__group">
            <label class="form__label">
              Prénom
              <input
                class="form__input"
                type="text"
                :placeholder="item.user.last_name"
                disabled
              />
            </label>
          </div>
        </div>
        <div class="form__inline">
          <div class="form__group">
            <label class="form__label">
              Email
              <input
                class="form__input"
                type="text"
                :placeholder="item.user.email"
                disabled
              />
            </label>
          </div>
          <div class="form__group">
            <label class="form__label">
              Téléphone
              <input
                class="form__input"
                type="text"
                :placeholder="item.user.phone"
                disabled
              />
            </label>
          </div>
        </div>
        <div class="form__inline">
          <div class="form__group"></div>
          <div v-if="item.status === 'PENDING'" class="form__group">
            <!-- <button
              class="form__button form__button--red"
              type="button"
              @click="submit('REJECTED')"
            >
              Annuler
            </button> -->
            <button
              class="form__button form__button--green"
              type="button"
              @click="submit('CONFIRMED')"
            >
              <img src="/icons/confirm.svg" />
              Confirmer
            </button>
          </div>
          <div v-else class="form__group">
            <button
              v-if="!loading"
              class="form__button form__button--red"
              type="button"
              @click="submit('REJECTED')"
            >
              <img src="/icons/trash.svg" />
              Supprimer
            </button>
            <button
              v-else
              class="form__button form__button--red"
              type="button"
              @click="submit('REJECTED')"
            >
              <img class="form__loader" src="/icons/loader-light.svg" />
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    item: {
      type: Object,
    },
  },
  data() {
    return {
      active: false,
      loading: false,
    }
  },
  methods: {
    submit(status) {
      this.$nextTick(() => {
        this.$nuxt.$loading.start()
        setTimeout(() => this.$nuxt.$loading.finish(), 5000)
      })
      this.$axios
        .post(`merchant-profiles/status`, {
          email: this.item.user.email,
          slug: this.item.slug,
          status,
        })
        .then(() => {
          this.$nuxt.$emit('merchant-status-changed')
          this.loading = false
        })
        .catch(() => {
          this.loading = false
        })
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
    display: none;
    align-items: center;
    margin-top: 20px;
    padding: 0 0 20px 0;
    &.active {
      display: block;
    }
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
.form {
  width: 100%;
  &__icon {
    height: 34px;
    width: 34px;
  }

  &__inline {
    width: 100%;
    display: grid;
    grid-template-columns: 48% 48%;
    grid-gap: 4%;
  }

  &__label {
    font-family: Open Sans;
    font-style: normal;
    font-weight: normal;
    font-size: 14px;
    line-height: 19px;
    text-transform: capitalize;
    color: #d1d1d1;
    margin-bottom: 2px;
  }

  &__input {
    width: 100%;
    height: 39px;
    background: #f3f3f3;
    border-radius: 7px;
    padding: 10px 22px;
    font-family: Open Sans;
    font-style: normal;
    font-weight: normal;
    font-size: 14px;
    line-height: 19px;
    color: #9a9a9a;
    border: none;
    margin-bottom: 16px;
  }

  &__loader {
    height: 18px;
    animation-name: spin-animation;
    animation-duration: 750ms;
    animation-iteration-count: infinite;
    animation-timing-function: linear;
  }

  &__activity {
    width: fit-content;
    max-width: 100%;
    height: 39px;
    padding: 0 24px;
    border-radius: 30px;
    font-family: Open Sans;
    font-style: normal;
    font-weight: normal;
    font-size: 15px;
    line-height: 20px;
    color: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    transition: opacity 0.125s;
    img {
      margin-left: 10px;
    }
    &:hover {
      opacity: 0.9;
    }
  }

  &__button {
    width: 155px;
    height: 39px;
    font-family: Montserrat;
    font-style: normal;
    font-weight: 600;
    font-size: 14px;
    line-height: 17px;
    border-radius: 30px;
    cursor: pointer;
    border: none;
    transition: opacity 0.12s;
    margin-top: 30px;
    // à supprimer a l'ajout du boutton annulé
    float: right;
    &:hover {
      opacity: 0.88;
    }
    &--red {
      color: #d00505;
      background: #ffe4e4;
    }
    &--green {
      background: #cfefe5;
      color: #1ec173;
    }
  }
}
</style>
