<template>
  <div class="box active">
    <div :class="[active ? 'active' : '']" class="box__bottom">
      <form class="form" @submit.prevent="submit">
        <div class="form__inline">
          <div class="form__group">
            <label class="form__label">
              Expediteur
              <p class="form__input" type="text">
                {{ mainUser.email }}
              </p>
            </label>
            <p v-if="errors.has('merchant.title')" class="form__error">
              {{ errors.get('merchant.title') }}
            </p>
          </div>
          <div class="form__group">
            <label class="form__label">
              Objet
              <input
                v-model="formData.object"
                class="form__input"
                type="text"
                placeholder="Objet"
                @input="errors.clear('user.first_name')"
              />
            </label>
          </div>
        </div>

        <div class="form__inline">
          <div class="form__group">
            <label class="form__label">
              Message
              <textarea
                v-model="formData.msg"
                class="form__inputEmail"
                type="text"
                placeholder="Message..."
                @input="errors.clear('user.first_name')"
              />
            </label>
            <p v-if="errors.has('user.first_name')" class="form__error">
              {{ errors.get('user.first_name') }}
            </p>
          </div>
        </div>

        <div class="form__inline">
          <div class="form__group"></div>
          <div class="form__group" style="text-align: right">
            <button
              v-if="!loading"
              class="form__button form__button--green"
              type="submit"
              @click="submit()"
            >
              Envoyer
            </button>
            <button
              v-else
              class="form__button form__button--green"
              type="button"
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
    clients: {
      type: Object,
    },
    store: {
      type: Object,
    },
    mainUser: {
      type: Object,
    },
  },
  data() {
    return {
      active: true,
      formData: {
        msg: '',
        object: '',
        from: '',
      },
      loading: false,
    }
  },
  mounted() {},
  methods: {
    async submit() {
      try {
        this.loading = true
        this.formData.from = this.mainUser.email
        this.formData.store = this.store.title
        this.formData.clientList = this.clients
        await this.$axios
          .post('client-mail', this.formData)
          .then((res) => console.log(res))
        this.reset()
        this.loading = false
      } catch (e) {
        this.errors.record(e.response.data.errors)
        this.loading = false
      }
    },
    reset() {
      this.formData.msg = ''
      this.formData.object = ''
      this.formData.from = ''
      this.formData.store = ''
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
  }

  &__label {
    font-family: Open Sans;
    font-style: normal;
    font-weight: normal;
    font-size: 14px;
    line-height: 19px;
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
    &::placeholder {
      opacity: 0.4;
    }
  }

  &__inputEmail {
    width: 100%;
    height: 250px;
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
    &::placeholder {
      opacity: 0.4;
    }
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
    margin-bottom: 14px;
    &:hover {
      opacity: 0.9;
    }
    &--border {
      border: 1px solid rgba(0, 0, 0, 0.15);
    }
    img {
      margin-left: 10px;
    }
  }

  &__error {
    font-family: Montserrat, serif;
    color: #ff3333;
    font-size: 13px;
    margin: -8px 0 4px 10px;
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

.activities {
  max-width: 100%;
  display: flex;
  flex-wrap: wrap;
  justify-content: flex-start;

  &__item {
    max-height: 39px;
    background: #fce9c5;
    border-radius: 30px;
    padding: 9px 18px 10px 18px;
    cursor: pointer;
    margin: 10px 5px;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: opacity 0.1s;
    &:hover {
      opacity: 0.925;
    }
    &.active {
      border: 1px solid rgba(0, 0, 0, 0.25);
    }
  }

  &__title {
    font-family: Open Sans;
    font-style: normal;
    font-weight: normal;
    font-size: 15px;
    line-height: 20px;
    color: rgba(0, 0, 0, 0.4);
  }

  &__icon {
    height: 35px;
    width: 35px;
    margin-left: 4px;
  }
}
</style>
