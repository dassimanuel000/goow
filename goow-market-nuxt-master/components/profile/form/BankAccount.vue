<template>
  <div class="payment">
    <button
      class="payment__button"
      type="button"
      @click="submitAccountLink('account_onboarding')"
    >
      Stripe onboarding
    </button>
    <button
      class="payment__button"
      type="button"
      @click="submitAccountLink('account_update')"
    >
      Stripe update
    </button>

    <div class="box active">
      <div class="box__wrap">
        <div class="box__top">
          <p class="box__id"></p>
          <p class="box__date"></p>
        </div>
        <div class="box__bottom">
          <form class="form" @submit.prevent="submitBankAccount">
            <p class="form__subtitle">Bank account</p>
            <div class="form__group">
              <label class="form__label">
                Account holder name
                <input
                  v-model="formData.account_holder_name"
                  class="form__input"
                  type="text"
                  placeholder="Account holder name"
                  @input="errors.clear('account_holder_name')"
                />
              </label>
              <p v-if="errors.has('account_holder_name')" class="form__error">
                {{ errors.get('account_holder_name') }}
              </p>
            </div>

            <div class="form__group">
              <label class="form__label">
                Account number
                <input
                  v-model="formData.account_number"
                  class="form__input"
                  type="text"
                  placeholder="Account number"
                  @input="errors.clear('account_number')"
                />
              </label>
              <p v-if="errors.has('account_number')" class="form__error">
                {{ errors.get('account_number') }}
              </p>
            </div>

            <div class="form__inline">
              <div class="form__group">
                <button v-if="!loading" class="form__button" type="submit">
                  Valider
                </button>
                <button v-else class="form__button" type="button">
                  <img class="form__loader" src="/icons/loader-light.svg" />
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    user: {
      type: Object,
    },
  },
  data() {
    return {
      formData: {},
      url: null,
      active: true,
      loading: false,
    }
  },
  computed: {},
  mounted() {
    this.formData = this.user
  },
  methods: {
    async submitAccountLink(type) {
      try {
        const res = (await this.$axios.post('stripe/account-link', { type }))
          .data
        window.location.replace(res.url)
      } catch (e) {
        this.errors.record(e.response.data.errors)
      }
    },
    async submitBankAccount() {
      try {
        this.loading = true
        await this.$axios.post('stripe/bank-account', this.formData)
        this.formData.account_number = ''
        this.formData.account_holder_name = ''
        this.loading = false
      } catch (e) {
        this.errors.record(e.response.data.errors)
        this.loading = false
      }
    },
  },
}
</script>

<style lang="scss" scoped>
.payment {
  max-width: 716px;
  padding: 10px 37px 15px 22px;
  margin-bottom: 10px;

  &__button {
    width: 240px;
    max-width: 100%;
    height: 40px;
    background: #e8e8e8;
    border-radius: 30px;
    font-family: Open Sans;
    font-style: normal;
    font-weight: normal;
    font-size: 12px;
    line-height: 16px;
    color: #6f6f6f;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    border: none;
    margin-bottom: 12px;
    transition: opacity 0.125s;
    &:hover {
      opacity: 0.9;
    }
  }
}

.form {
  width: 100%;

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
    margin: 2px 0 16px 0;
    &::placeholder {
      opacity: 0.4;
    }
  }

  &__subtitle {
    font-family: Open Sans;
    font-style: normal;
    font-weight: 600;
    font-size: 14px;
    line-height: 19px;
    color: #565656;
    margin: 20px 0 8px 0;
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
    width: 270px;
    height: 36px;
    background: #3b1099;
    box-shadow: 0 6px 4px rgba(0, 0, 0, 0.05);
    border-radius: 30px;
    cursor: pointer;
    border: none;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: opacity 0.12s;
    margin: 15px 0 20px 0;
    font-family: Montserrat;
    font-style: normal;
    font-weight: 600;
    font-size: 14px;
    line-height: 17px;
    text-align: center;
    color: #ffffff;
    &:hover {
      opacity: 0.88;
    }
  }
}

.box {
  max-width: 716px;
  background: #ffffff;
  box-shadow: 0 6px 8px rgba(0, 0, 0, 0.1);
  border-radius: 10px;
  padding: 10px 37px 15px 22px;
  margin-bottom: 10px;
  display: flex;

  &__wrap {
    width: calc(100% - 50px);
  }

  &__open {
    margin-left: 20px;
    cursor: pointer;
    display: inline-table;
    transition: all 0.2s;
    &.active {
      transform: rotateZ(180deg);
    }
  }

  &__top {
    display: flex;
    align-items: center;
  }

  &__bottom {
    width: 100%;
    display: flex;
    align-items: center;
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

  &.active .box__bottom {
    /*display: none;*/
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
    color: #565656;
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
</style>
