<template>
  <div class="verification">
    <div class="verification__container">
      <p class="verification__title">Adresse mail vérifiée !</p>
      <p class="verification__title">
        Bienvenue sur GooW ! Commencez votre exploration en cliquant sur le
        bouton ci-dessous.
      </p>
      <nuxt-link to="/" class="verification__link verification__link--blue"
        >Retourner à la page d’accueil</nuxt-link
      >
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    const arr = this.$route.fullPath.split('/')
    this.$axios.get(`verification/${arr[arr.length - 1]}`).then((response) => {
      this.$auth.fetchUser()
    })
  },
}
</script>

<style lang="scss" scoped>
.verification {
  min-height: 100vh;
  display: flex;
  justify-content: center;

  &__container {
    margin-top: 100px;
    @media screen and (max-width: 769px) {
      margin-top: 50px;
    }
  }

  &__title {
    max-width: 268px;
    font-family: Montserrat;
    font-style: normal;
    font-weight: 600;
    font-size: 30px;
    line-height: 37px;
    text-align: center;
    color: #c4c4c4;
    margin: 40px auto 58px auto;
  }

  &__link {
    width: 364px;
    max-width: 100%;
    height: 39px;
    border-radius: 30px;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    border: none;
    font-family: Montserrat;
    font-style: normal;
    font-weight: 600;
    font-size: 14px;
    line-height: 17px;
    text-decoration: none;
    margin: 0 auto 8px auto;
    transition: opacity 0.15s;
    &:hover {
      opacity: 0.9;
    }
    &--blue {
      background: #3b1099;
      color: #ffffff;
    }
    &--light {
      background: #e8e8e8;
      color: #3b1099;
      margin-bottom: 100px;
    }
  }
}
</style>
