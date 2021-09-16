<template>
  <div>
    <div class="auth__title">Connectez-vous avec votre adresse mail</div>
    <form class="auth__form" @submit.prevent="submit">
      <div>
        <input
          v-model="formData.email"
          class="auth__form-input"
          placeholder="Adresse mail *"
        />
      </div>
      <div v-if="containsErrors('email')" class="auth__error__wrapper">
        <div class="auth__error">{{ errors.errors.email[0] }}</div>
      </div>
      <div class="paswordfield">
        <input
          v-model="formData.password"
          class="auth__form-input"
          placeholder="Mot de passe *"
          :type="hidepassword"
        />
        <div
          v-if="hidepassword == 'password'"
          class="showhide"
          @click="password('show')"
        >
          <p>Voir mon mot de passe</p>
          <button type="button" class="hideandshow">
            <img src="/icons/eyesOpen.svg" />
          </button>
        </div>
        <div v-else class="showhide" @click="password('hide')">
          <p>Cacher mon mot de passe</p>
          <button type="button" class="hideandshow">
            <img src="/icons/eyesClose.svg" />
          </button>
        </div>
      </div>
      <div v-if="containsErrors('password')" class="auth__error__wrapper">
        <div class="auth__error">Passe est requis *</div>
      </div>
      <button class="auth__form-button" type="submit">Je me connecte</button>
      <nuxt-link :to="`/forgot-password`" class="auth__form-text forgot-text"
        >Mot de passe oublié ?</nuxt-link
      >
      <nuxt-link class="auth__merchant-register" to="/register/merchant">
        Créer son compte professionnel
      </nuxt-link>
    </form>
    <script
      src="//code.tidio.co/4frkcdp6ai9zt8ok1q2vjset1pm3gplg.js"
      async
    ></script>
  </div>
</template>

<script>
export default {
  layout: 'auth',
  middleware: 'guest',
  data() {
    return {
      hidepassword: 'password',
      formData: {
        email: '',
        password: '',
      },
    }
  },
  head() {
    return {
      title: 'Login',
    }
  },
  methods: {
    password(state) {
      if (state === 'show') {
        this.hidepassword = 'text'
      } else {
        this.hidepassword = 'password'
      }
    },
    async submit() {
      try {
        const res = await this.$auth.loginWith('local', {
          data: this.formData,
        })
        if (res.data.data.is_merchant) {
          if (res.data.data.merchant.length <= 1) {
            this.$router.push(
              `/markets/${res.data.data.merchant[0].market.slug}/merchants/${res.data.data.merchant[0].slug}`
            )
          } else {
            this.$router.push('/profile/stands')
          }
        } else {
          this.$router.push('/explore')
        }
      } catch (e) {
        this.errors.record(e.response.data.errors)
      }
    },
    containsErrors(field) {
      return field in this.errors.errors
    },
  },
}
</script>

<style scoped>
@media screen and (max-width: 768px) {
  .showhide {
    width: 90% !important;
  }
}
.showhide {
  display: flex;
  width: 403px;
  height: 43px;
  margin: 0 auto;
  margin-top: 14px;
  justify-content: flex-end;
  font-family: Montserrat, serif;
  font-style: normal;
  font-weight: 600;
  font-size: 12px;
  line-height: 22px;
  color: #000000;
  text-align: center;
  cursor: pointer;
}
.showhide:active {
  color: #3b1099;
}
.hideandshow {
  margin-left: 10px;
  height: 25px;
  width: 25px;
  border: none;
  background: none;
}
.forgot-text {
  display: block;
  text-decoration: none;
  margin-top: 24px;
}
</style>
