<template>
  <div>
    <div class="auth__title">Contact</div>
    <div class="auth__title">
      Un problème ? Une question ? Des remarques ? Ou simplement envie de nous
      faire un petit coucou ? Contactez-nous !
    </div>
    <form class="auth__form" @submit.prevent="submit">
      <input
        v-model="formData.first_name"
        class="auth__form-input"
        placeholder="Nom"
        @input="errors.clear('first_name')"
      />
      <div v-if="errors.has('first_name')" class="auth__error__wrapper">
        <div class="auth__error">{{ errors.get('first_name') }}</div>
      </div>
      <input
        v-model="formData.last_name"
        class="auth__form-input"
        placeholder="Prénom"
        @input="errors.clear('last_name')"
      />
      <div v-if="errors.has('last_name')" class="auth__error__wrapper">
        <div class="auth__error">{{ errors.get('last_name') }}</div>
      </div>
      <input
        v-model="formData.phone"
        class="auth__form-input"
        placeholder="Numero de telephone"
        @input="errors.clear('phone')"
      />
      <div v-if="errors.has('phone')" class="auth__error__wrapper">
        <div class="auth__error">{{ errors.get('phone') }}</div>
      </div>
      <input
        v-model="formData.email"
        class="auth__form-input"
        placeholder="Adresse mail"
        @input="errors.clear('email')"
      />
      <div v-if="errors.has('email')" class="auth__error__wrapper">
        <div class="auth__error">{{ errors.get('email') }}</div>
      </div>
      <input
        v-model="formData.subject"
        class="auth__form-input"
        placeholder="Sujet *"
        @input="errors.clear('subject')"
      />
      <div v-if="errors.has('subject')" class="auth__error__wrapper">
        <div class="auth__error">{{ errors.get('subject') }}</div>
      </div>
      <textarea
        v-model="formData.message"
        class="auth__form-input auth__form-input--textarea"
        placeholder="Message *"
        @input="errors.clear('message')"
      ></textarea>
      <div v-if="errors.has('message')" class="auth__error__wrapper">
        <div class="auth__error">{{ errors.get('message') }}</div>
      </div>
      <button class="auth__form-button" type="submit">Envoyer</button>
    </form>
  </div>
</template>

<script>
export default {
  layout: 'auth',
  data() {
    return {
      formData: {},
    }
  },
  head() {
    return {
      title: 'Contact',
    }
  },
  methods: {
    async submit() {
      try {
        await this.$axios.post('/contact', this.formData)
        await this.$swal.fire({
          imageUrl: '/images/good.png',
          imageHeight: 100,
          title: 'Message bien reçu ! ',
          text: 'Nous vous répondrons dans les plus brefs délais.',
        })
        this.formData.first_name = ''
        this.formData.last_name = ''
        this.formData.email = ''
        this.formData.phone = ''
        this.formData.subject = ''
        this.formData.message = ''
      } catch (e) {
        this.errors.record(e.response.data.errors)
      }
    },
  },
}
</script>
<style lang="scss" scoped>
.auth__form-input--textarea {
  min-width: 200px;
}
</style>
