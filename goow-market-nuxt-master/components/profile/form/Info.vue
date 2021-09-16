<template>
  <div class="box active">
    <div class="box__bottom">
      <form class="form" @submit.prevent="updateInfo">
        <div class="form__inline">
          <div class="form__group">
            <label class="form__label">
              Nom
              <input
                v-model="formDataInfo.first_name"
                class="form__input"
                type="text"
                placeholder="Nom du Marchand"
                @input="errors.clear('first_name')"
              />
            </label>
            <p v-if="errors.has('first_name')" class="form__error">
              {{ errors.get('first_name') }}
            </p>
          </div>
          <div class="form__group">
            <label class="form__label">
              Prénom
              <input
                v-model="formDataInfo.last_name"
                class="form__input"
                type="text"
                placeholder="Prénom"
                @input="errors.clear('last_name')"
              />
            </label>
            <p v-if="errors.has('last_name')" class="form__error">
              {{ errors.get('last_name') }}
            </p>
          </div>
        </div>

        <div class="form__group">
          <label class="form__label">
            Email
            <input
              v-model="formDataInfo.email"
              class="form__input"
              type="email"
              placeholder="Email"
              disabled
              @input="errors.clear('email')"
            />
          </label>
          <p v-if="errors.has('email')" class="form__error">
            {{ errors.get('email') }}
          </p>
        </div>

        <div class="form__group">
          <label class="form__label">
            Numéro de téléphone
            <input
              v-model="formDataInfo.phone"
              class="form__input"
              type="number"
              placeholder="Numéro de téléphone"
              @input="errors.clear('phone')"
            />
          </label>
          <p v-if="errors.has('user.phone')" class="form__error">
            {{ errors.get('user.phone') }}
          </p>
        </div>

        <div class="form__inline">
          <div></div>
          <div class="form__group">
            <button class="form__button" type="submit">Valider</button>
          </div>
        </div>
      </form>
      <div class="form__title" @click="Password()">
        <p>Modifier mon mot de passe</p>
      </div>
      <div v-if="changePassword">
        <form class="form" @submit.prevent="updatePassword">
          <p class="form__subtitle">Changer son mot de passe</p>
          <div class="form__group">
            <label class="form__label">
              Mot de passe actuel
              <input
                v-model="formDataPass.current_password"
                class="form__input"
                type="password"
                placeholder="Mot de passe actuel"
                @input="errors.clear('current_password')"
              />
            </label>
            <p v-if="errors.has('current_password')" class="form__error">
              {{ errors.get('current_password') }}
            </p>
          </div>

          <div class="form__group">
            <label class="form__label">
              Nouveau mot de passe
              <input
                v-model="formDataPass.password"
                class="form__input"
                type="password"
                placeholder="Nouveau mot de passe"
                @input="errors.clear('password')"
              />
            </label>
            <p v-if="errors.has('password')" class="form__error">
              {{ errors.get('password') }}
            </p>
          </div>

          <div class="form__group">
            <label class="form__label">
              Resaisir nouveau mot de passe
              <input
                v-model="formDataPass.password_confirmation"
                class="form__input"
                type="password"
                placeholder="Resaisir nouveau mot de passe"
                @input="errors.clear('password')"
              />
            </label>
            <p v-if="errors.has('password')" class="form__error">
              {{ errors.get('password') }}
            </p>
          </div>

          <div class="form__inline">
            <div></div>
            <div class="form__group">
              <button class="form__button" type="submit">Valider</button>
            </div>
          </div>
        </form>
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
      changePassword: false,
      formDataInfo: {},
      formDataPass: {},
    }
  },
  mounted() {
    this.formDataInfo = this.user
  },
  methods: {
    Password() {
      if (this.changePassword) {
        this.changePassword = false
      } else {
        this.changePassword = true
      }
    },
    async updateInfo() {
      try {
        await this.$axios.put('users/info', this.formDataInfo)
        this.$auth.fetchUser()
      } catch (e) {
        this.errors.record(e.response.data.errors)
      }
    },
    async updatePassword() {
      try {
        await this.$axios.put('users/password', this.formDataPass)
        this.formDataPass.current_password = ''
        this.formDataPass.password = ''
        this.formDataPass.password_confirmation = ''
        this.Password()
      } catch (e) {
        this.errors.record(e.response.data.errors)
      }
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
    display: block;
    align-items: center;
    margin-top: 20px;
    padding: 0 0 20px 0;
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
  &__title {
    font-family: Open Sans;
    font-style: normal;
    font-weight: 600;
    font-size: 14px;
    line-height: 19px;
    color: #565656;
    margin: 20px 0 8px 0;
  }
  &__title:hover {
    color: #3b1099;
    cursor: pointer;
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
    width: 100%;
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
    margin-left: 4px;
  }
}
</style>
