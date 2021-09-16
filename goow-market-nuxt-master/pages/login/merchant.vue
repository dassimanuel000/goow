<template>
  <div>
    <div class="auth__main">
      <p>Bienvenue sur <span class="auth__main-color">Goow</span></p>
    </div>
    <div class="auth__title">
      <p>
        Pour votre première connexion, saisir l'adresse mail liée à votre compte
        marchand
      </p>
    </div>
    <form class="auth__form">
      <input
        v-model="formData.email"
        class="auth__form-input"
        placeholder="Adresse mail *"
      />
      <div v-if="containsErrors('email')" class="auth__error__wrapper">
        <div class="auth__error">veuillez entrer votre adresse mail *</div>
      </div>
      <div class="auth__title">Création de votre mot de passe</div>
      <input
        v-model="formData.password"
        class="auth__form-input"
        placeholder="Mot de passe *"
        :type="hidepassword"
      />
      <div v-if="containsErrors('password')" class="auth__error__wrapper">
        <div
          v-if="
            this.errors.errors.password ==
            'The password must be at least 8 characters.'
          "
          class="auth__error__wrapper"
        >
          <div class="auth__error">Doit contenir au minimum 8 caractères *</div>
        </div>
        <div
          v-if="this.errors.errors.password == 'The field is required.'"
          class="auth__error__wrapper"
        >
          <div class="auth__error">Un mot de passe est requis *</div>
        </div>
      </div>
      <div class="paswordfield">
        <input
          v-model="verif_password"
          class="auth__form-input"
          placeholder="Confirmer le Mot de passe *"
          type="password"
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
      <div
        v-if="this.verif_password != this.formData.password"
        class="auth__error__wrapper"
      >
        <div class="auth__error">le mot de Passe ne corresond pas *</div>
      </div>
      <div class="auth__form-button" @click="submit">Valider</div>
      <!-- <nuxt-link class="auth__merchant-register" to="/register/merchant">
        Je me créé en tant que professionnel
      </nuxt-link> -->
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
      verif_password: '',
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
      if (this.verif_password === this.formData.password) {
        try {
          await this.$axios.post('merchant-profiles/password', this.formData)
          const res = await this.$auth.loginWith('local', {
            data: this.formData,
          })
          if (res.data.data.is_merchant) {
            this.$router.push(
              `/markets/${res.data.data.merchant.market.slug}/merchants/${res.data.data.merchant.slug}`
            )
          }
        } catch (e) {
          this.errors.record(e.response.data.errors)
        }
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
