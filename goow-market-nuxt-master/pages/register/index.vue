<template>
  <div>
    <div class="auth__title">Créez votre compte</div>
    <form class="auth__form" @submit.prevent="submit">
      <input
        v-model="formData.first_name"
        class="auth__form-input"
        placeholder="Nom *"
      />
      <div v-if="containsErrors('first_name')" class="auth__error__wrapper">
        <div class="auth__error">Nom est requis *</div>
      </div>
      <input
        v-model="formData.last_name"
        class="auth__form-input"
        placeholder="Prénom *"
      />
      <div v-if="containsErrors('last_name')" class="auth__error__wrapper">
        <div class="auth__error">Prénom est requis *</div>
      </div>
      <input
        v-model="formData.phone"
        class="auth__form-input"
        placeholder="Numéro de téléphone"
      />
      <input
        v-model="formData.email"
        class="auth__form-input"
        placeholder="Adresse mail *"
      />
      <div v-if="containsErrors('email')" class="auth__error__wrapper">
        <div
          v-if="
            this.errors.errors.email ==
            'The email must be a valid email address.'
          "
          class="auth__error__wrapper"
        >
          <div class="auth__error">
            L'email est requis et doit être valide *
          </div>
        </div>
        <div
          v-if="this.errors.errors.email == 'The value has already been taken.'"
          class="auth__error__wrapper"
        >
          <div class="auth__error">Cet email existe deja *</div>
        </div>
      </div>
      <input
        v-model="formData.password"
        class="auth__form-input"
        type="password"
        placeholder="Mot de passe *"
      />
      <div v-if="containsErrors('password')" class="auth__error__wrapper">
        <div class="auth__error">
          Le mot de passe est requis et doit comporter au moins 8 caractères *
        </div>
      </div>
      <div class="auth__form-text">Doit contenir au minimum 8 caractères.</div>
      <button class="auth__form-button" type="submit">Je m’inscris</button>
      <nuxt-link class="auth__merchant-register" to="/register/merchant">
        Je me créé en tant que professionnel
      </nuxt-link>
    </form>
  </div>
</template>

<script>
export default {
  layout: 'auth',
  middleware: 'guest',
  data() {
    return {
      formData: {},
    }
  },
  head() {
    return {
      title: 'Register',
    }
  },
  methods: {
    async submit() {
      try {
        await this.$axios.post('/auth/register', this.formData)
        await this.$swal.fire({
          imageUrl: '/images/good.png',
          imageHeight: 100,
          title: 'Inscription presque terminée !',
          text:
            'Vous avez du courrier ! Un mail vous a été envoyé. Ouvrez-le et cliquez sur valider afin de vérifier votre compte.',
        })
        await this.$auth.loginWith('local', {
          data: {
            email: this.formData.email,
            password: this.formData.password,
          },
        })
        this.$router.push('/explore')
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
