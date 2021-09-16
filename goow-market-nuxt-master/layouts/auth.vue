<template>
  <div>
    <Nav />
    <Backlight />
    <div class="auth">
      <div class="auth__card">
        <div v-if="this.$route.name === 'login'" class="auth__menu">
          <nuxt-link :to="`/register`" class="auth__menu-item">
            Nouveau client ?
          </nuxt-link>
          <nuxt-link :to="`/login`" class="auth__menu-item">
            Déjà client ?
          </nuxt-link>
        </div>
        <Nuxt />
      </div>
    </div>
    <Footer />
  </div>
</template>

<script>
export default {}
</script>

<style lang="scss">
.auth {
  width: 100%;
  height: 809px;
  position: relative;

  &__merchant-register {
    font-family: Open Sans;
    font-style: normal;
    font-weight: 600;
    font-size: 18px;
    line-height: 25px;
    text-decoration-line: underline;
    color: #3b1099;
    text-align: center;
    margin-top: 74px;
    cursor: pointer;
    display: block;
  }

  &__error {
    font-family: Montserrat, serif;
    color: #ff3333;
    font-size: 13px;
    padding-left: 11px;
    margin-top: 6px;
    &__wrapper {
      width: 403px;
      margin: 0 auto;
    }
  }

  &__form {
    margin-top: 37px;
    &-input {
      font-size: 16px;
      display: block;
      margin: 0 auto;
      width: 403px;
      height: 43px;
      box-sizing: border-box;
      -webkit-appearance: none !important;
      box-shadow: 0 6px 8px rgba(0, 0, 0, 0.1) !important;
      -webkit-box-shadow: 0 6px 8px rgba(0, 0, 0, 0.1) !important;
      -moz-box-shadow: 0 6px 8px rgba(0, 0, 0, 0.1) !important;
      border: none;
      border-radius: 25px;
      padding-left: 25px;
      margin-top: 14px !important;
      &:nth-of-type(1) {
        margin-top: 0;
      }
      &::placeholder {
        /* Chrome, Firefox, Opera, Safari 10.1+ */
        font-family: Montserrat, serif;
        font-style: normal;
        font-weight: 300;
        font-size: 14px;
        line-height: 17px;
        color: #9a9a9a;
        opacity: 1; /* Firefox */
      }

      &:-ms-input-placeholder {
        /* Internet Explorer 10-11 */
        font-family: Montserrat, serif;
        font-style: normal;
        font-weight: 300;
        font-size: 14px;
        line-height: 17px;
        color: #9a9a9a;
      }

      &::-ms-input-placeholder {
        /* Microsoft Edge */
        font-family: Montserrat, serif;
        font-style: normal;
        font-weight: 300;
        font-size: 14px;
        line-height: 17px;
        color: #9a9a9a;
      }

      &--textarea {
        max-width: 403px;
        min-width: 403px;
        height: 120px;
        resize: none;
        margin-top: 14px !important;
        &:focus {
          outline: none;
        }
        @media screen and (max-width: 769px) {
          max-width: 100%;
        }
      }
    }
    &-select {
      display: block;
      width: 403px;
      height: 43px;
      box-sizing: border-box;
      box-shadow: 0px 6px 8px rgba(0, 0, 0, 0.1);
      border: none;
      border-radius: 25px;
      margin: 14px auto 0 auto;
      background: #ffffff;
      font-family: Open Sans;
      font-style: normal;
      font-weight: 300;
      font-size: 14px;
      line-height: 19px;
      color: #9a9a9a;
      padding: 0 22px;
      outline: none;
    }
    &-text {
      text-align: center;
      font-family: Montserrat, serif;
      font-style: normal;
      font-weight: 300;
      font-size: 14px;
      line-height: 17px;
      color: #565656;
      margin-top: 15px;
    }
    &-button {
      display: block;
      margin: 20px auto 20px auto;
      max-width: 300px;
      padding: 8px 44px 10px 44px;
      background: #3b1099;
      border-radius: 30px;
      text-align: center;
      font-family: Montserrat, serif;
      font-style: normal;
      font-weight: 600;
      font-size: 14px;
      line-height: 17px;
      cursor: pointer;
      color: #ffffff;
      border: none;
      /*transition: opacity 0.15s;*/
      /*&:hover {*/
      /*  opacity: 0.95;*/
      /*}*/
    }
  }
  &__main {
    text-align: center;
    font-family: Montserrat, serif;
    font-style: normal;
    font-weight: 600;
    font-size: 35px;
    &-color {
      color: #3b1099;
    }
  }
  &__title {
    font-family: Montserrat, serif;
    font-style: normal;
    font-weight: 600;
    font-size: 18px;
    line-height: 22px;
    color: #000000;
    text-align: center;
    margin-top: 48px;
  }

  &__card {
    margin: 100px auto 0 auto;
    width: 630px;
    min-height: 600px;
    border-radius: 30px;
    @media screen and (max-width: 769px) {
      margin: 0px auto 0px auto;
    }
  }
  &__menu {
    display: flex;
    margin: 0 auto;
    justify-content: space-between;
    width: 423px;
    margin-top: 27px;
    @media screen and (max-width: 769px) {
      margin-top: 0px;
    }
    &-item {
      font-family: Montserrat, serif;
      font-style: normal;
      font-weight: 600;
      font-size: 22px;
      line-height: 27px;
      color: #c4c4c4;
      text-decoration: none;
      &.nuxt-link-exact-active {
        color: #3b1196 !important;
        padding-bottom: 9px;
        border-bottom: 2px solid #3b1099;
      }
      @media screen and (max-width: 769px) {
        margin-top: 20px;
      }
    }
  }
}
@media screen and (max-width: 768px) {
  .auth {
    background-color: #fff;
    &__error {
      &__wrapper {
        width: 100%;
        text-align: center;
        padding: 0 20px;
      }
    }
    &__card {
      width: 100%;
      box-shadow: none;
    }
    &__menu {
      width: 100%;
      padding: 0 30px;
      &-item {
        font-size: 18px;
      }
    }
    &__title {
      font-size: 16px;
    }
    &__form {
      &-input {
        -webkit-appearance: none !important;
        box-shadow: 0 6px 8px rgba(0, 0, 0, 0.1);
        -webkit-box-shadow: 0 6px 8px rgba(0, 0, 0, 0.1) !important;
        -moz-box-shadow: 0 6px 8px rgba(0, 0, 0, 0.1);
        border: none;
        font-size: 16px;
        width: 90%;
      }
    }
  }
}
</style>
