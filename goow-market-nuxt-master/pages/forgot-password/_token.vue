<template>
  <div>
    <div class="auth__title">Mot de passe oublié ?</div>
    <form class="auth__form" @submit.prevent="submit">
      <input
        v-model="formData.password"
        class="auth__form-input"
        placeholder="Mot de passe *"
        type="password"
      />
      <input
        v-model="formData.password_confirmation"
        class="auth__form-input"
        placeholder="Confirmation mot de passe *"
        type="password"
      />
      <div v-if="errors.has('password')" class="auth__error__wrapper">
        <div class="auth__error">{{ errors.get('password') }}</div>
      </div>
      <button type="submit" class="auth__form-button forgot-btn">
        Retrouver mon mot de passe
      </button>
    </form>
  </div>
</template>

<script>
export default {
  layout: 'auth',
  middleware: 'guest',
  data() {
    return {
      formData: {
        password: '',
        password_confirmation: '',
      },
    }
  },
  head() {
    return {
      title: 'Mot de passe oublié ?',
    }
  },
  methods: {
    async submit() {
      this.formData.token = this.$route.params.token
      try {
        const response = await this.$axios.$post(
          'auth/password/reset',
          this.formData
        )
        await this.$auth.loginWith('local', {
          data: {
            email: response.data.email,
            password: this.formData.password,
          },
        })
        this.$router.push('/')
      } catch (e) {
        this.errors.record(e.response.data.errors)
      }
    },
  },
}
</script>

<style scoped>
.forgot-btn {
  margin-top: 44px;
}
</style>
