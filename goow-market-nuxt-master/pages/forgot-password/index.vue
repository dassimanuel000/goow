<template>
  <div>
    <div class="auth__title">
      Demande de changement de mot de passe bien reçue !
    </div>
    <form v-if="!sent" class="auth__form" @submit.prevent="submit">
      <input
        v-model="formData.email"
        class="auth__form-input"
        placeholder="Adresse mail *"
        @input="errors.clear('email')"
      />
      <div v-if="errors.has('email')" class="auth__error__wrapper">
        <div class="auth__error">{{ errors.get('email') }}</div>
      </div>
      <button type="submit" class="auth__form-button forgot-btn">
        Retrouver mon mot de passe
      </button>
    </form>
    <div v-else class="auth__title">
      Un mail vous à été envoyé ouvrez-le et laissez-vous guider.
    </div>
  </div>
</template>

<script>
export default {
  layout: 'auth',
  middleware: 'guest',
  data() {
    return {
      formData: {
        email: '',
      },
      sent: false,
    }
  },
  head() {
    return {
      title: 'Mot de passe oublié ?',
    }
  },
  methods: {
    async submit() {
      try {
        await this.$axios.post('auth/password/create', this.formData)
        this.sent = true
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
