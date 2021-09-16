<template>
  <div class="home">
    <div class="home__top">
      <div class="container">
        <div class="home__container">
          <img class="home__image" src="/images/image32.png" />
          <div class="home__top-text">
            <p class="home__title">Découvrez les Marchés à proximité</p>
            <p class="home__subtitle">
              La carte spécialement conçue par Goow vous offre un aperçu des
              marchés situés près de chez vous. Grâce à la géolocalisation, vous
              serez en mesure de commander des produits sains provenant
              directement de vos marchés.
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="section-2 container">
      <p class="section-2__title">Plongez-vous au coeur de vos marchés</p>
      <p class="section-2__subtitle">
        Une large variété de marchés est à voir ici, découvrez-les en cliquant
        ci-dessous
      </p>
      <div class="section-2__items">
        <nuxt-link to="/explore?type=markets" class="section-2__item__markets">
          <p class="section-2__item-title">Cliquez ici !</p>
          <svg
            width="120"
            height="48"
            viewBox="0 0 120 19"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M119.5 33.5H0C27.0002 33.5 35.1 0 63.5 0C91.9 0 100 33.5 119.5 33.5Z"
              fill="white"
            />
            <path
              d="M70 22L63 14L56 22"
              stroke="#FEB42B"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
          </svg>
        </nuxt-link>
        <!-- <a class="section-2__item__services">
     <p class="section-2__item-title">Un service</p>
     <svg
      width="120"
      height="52"
      viewBox="0 0 120 34"
      fill="none"
      xmlns="http://www.w3.org/2000/svg"
     >
      <path
       d="M119.5 33.5H0C27.0002 33.5 35.1 0 63.5 0C91.9 0 100 33.5 119.5 33.5Z"
       fill="white"
      />
      <path
       d="M70 22L63 14L56 22"
       stroke="#FEB42B"
       stroke-width="2"
       stroke-linecap="round"
       stroke-linejoin="round"
      />
     </svg>
    </a> -->
      </div>
    </div>
    <div class="section-3 container">
      <div class="section-3__title">
        Selectionnez la ville qui vous intéresse
      </div>
      <div class="section-3__subtitle">
        Nos villes partenaires ont des marchés tous plus intéressants les uns
        que les autres. Choisissez celle qui vous intéresse et laissez-vous
        guider !
      </div>
      <div class="section-3__iconecity">
        <CityItem v-for="(item, index) in cities" :key="index" :city="item" />
      </div>
    </div>
    <div class="section-4">
      <div class="container">
        <div class="section-4__container">
          <div class="section-4__text">
            <p class="section-4__title">Vous êtes professionnel ?</p>
            <p class="section-4__subtitle">
              Goow met à la disposition de tous les marchands une vitrine
              digitale grâce à laquelle vous serez mis en avant. Joindre Goow
              vous permettra de gagner en visibilité et de toujours garder le
              lien avec vos clients. Cliquez ici pour rejoindre cette aventure !
            </p>
            <nuxt-link class="section-4__link" to="/i-am-merchant">
              Créer ma boutique
            </nuxt-link>
          </div>
          <img
            class="section-4__image"
            src="/images/1308278-afp_1qn7f9-checknews-fleuristejpg 2.png"
          />
        </div>
      </div>
    </div>
    <div class="section-5">
      <div class="container">
        <p class="section-5__title">Ils nous font confiance</p>
        <div class="section-5__container">
          <div class="section-5__item">
            <a href="http://fnscmf.com/"
              ><img class="section-5__image" src="/images/unnamed-1 1.png" />
            </a>
          </div>
          <div class="section-5__item">
            <img class="section-5__image" src="/images/unnamed 2.png" />
          </div>
          <div class="section-5__item">
            <img
              class="section-5__image"
              src="/images/French-tech-horizontal1 1.png"
            />
          </div>
          <!-- <div class="section-5__item">
            <img class="section-5__image" src="/images/logo-ex-color 1.png" />
          </div> -->
          <div class="section-5__item">
            <img class="section-5__image" src="/images/g5073.png" />
          </div>
        </div>
      </div>
    </div>
    <script
      src="//code.tidio.co/4frkcdp6ai9zt8ok1q2vjset1pm3gplg.js"
      async
    ></script>
  </div>
</template>

<script>
export default {
  async asyncData({ $axios }) {
    const cities = (await $axios.$get('cities')).cities
    return { cities }
  },
  mounted() {
    if (this.$route.query.verified) {
      this.showSuccessVerifiedEmail()
    }
  },
  methods: {
    showSuccessVerifiedEmail() {
      this.$swal.fire(
        'Succès !',
        'Vous avez vérifié votre e-mail avec succès',
        'success'
      )
    },
  },
}
</script>

<style lang="scss" scoped>
.home {
  margin-top: 4px;

  &__top {
    width: 100%;
    height: 500px;
    background: url('/images/Capture.png') center no-repeat;
    background-size: cover;
  }

  &__container {
    display: flex;
    align-items: center;

    @media screen and (max-width: 1024px) {
      display: block;
    }
  }

  &__top-text {
    height: fit-content;
  }

  &__image {
    height: 551px;

    @media screen and (max-width: 1024px) {
      height: 151px;
    }
  }

  &__title {
    font-family: Montserrat;
    font-style: normal;
    font-weight: 600;
    font-size: 40px;
    line-height: 49px;
    color: #565656;

    @media screen and (max-width: 1024px) {
      font-size: 30px;
      line-height: 39px;
    }
  }

  &__subtitle {
    font-family: Open Sans;
    font-style: normal;
    font-weight: normal;
    font-size: 25px;
    line-height: 34px;
    color: #565656;

    @media screen and (max-width: 1024px) {
      font-size: 18px;
      line-height: 25px;
    }
  }

  .section-2 {
    margin-top: 100px;

    &__title {
      font-family: Montserrat;
      font-style: normal;
      font-weight: 600;
      font-size: 25px;
      line-height: 30px;
      text-align: center;
      color: #565656;
    }

    &__subtitle {
      font-family: Open Sans;
      font-style: normal;
      font-weight: normal;
      font-size: 20px;
      line-height: 27px;
      text-align: center;
      color: #9a9a9a;
    }

    &__items {
      margin-top: 40px;
      display: flex;
      justify-content: center;

      @media screen and (max-width: 1024px) {
        display: grid;
        text-align: center;
      }
    }

    &__item {
      &__markets {
        width: 750px;
        height: 409px;
        border-radius: 20px;
        background: url('/images/marketpaint_optimized.jpg') center no-repeat;
        background-size: cover;
        padding-top: 40px;
        margin: 0 10px;
        position: relative;
        text-decoration: none;
        @media screen and (max-width: 1024px) {
          width: 328px;
        }
      }
      &__shops {
        width: 328px;
        height: 409px;
        background: url('/images/Shops.png') center no-repeat;
        background-size: cover;
        padding-top: 40px;
        margin: 0 10px;
        position: relative;
        text-decoration: none;
      }
      &__services {
        width: 328px;
        height: 409px;
        background: url('/images/Services.png') center no-repeat;
        background-size: cover;
        padding-top: 40px;
        margin: 0 10px;
        position: relative;
        text-decoration: none;
      }
    }

    &__item-title {
      font-family: Montserrat;
      font-style: normal;
      font-weight: 600;
      font-size: 30px;
      line-height: 37px;
      text-align: center;
      color: #ffffff;
    }

    &__arrow {
      position: absolute;
      left: 50%;
      bottom: 11px;
      transform: translateX(-50%);
      z-index: 2;
    }

    svg {
      position: absolute;
      left: 50%;
      bottom: 0;
      transform: translateX(-50%);
    }
  }

  .section-3 {
    justify-content: center;
    margin: 80px auto;

    &__title {
      font-family: Montserrat;
      font-style: normal;
      font-weight: 600;
      font-size: 25px;
      line-height: 30px;
      text-align: center;
      color: #565656;
    }

    &__subtitle {
      font-family: Open Sans;
      font-style: normal;
      font-weight: normal;
      font-size: 20px;
      line-height: 27px;
      text-align: center;
      color: #9a9a9a;
    }

    &__iconecity {
      display: grid;
      grid-template-columns: repeat(5, 1fr);

      @media screen and (max-width: 1024px) {
        grid-template-columns: repeat(3, 1fr);
      }
      @media screen and (max-width: 769px) {
        grid-template-columns: repeat(2, 1fr);
      }
      @media screen and (max-width: 450px) {
        grid-template-columns: repeat(1, 1fr);
      }
    }
  }

  .section-4 {
    width: 100%;
    background: #feb42b;
    padding: 50px 0;

    &__container {
      display: flex;

      @media screen and (max-width: 1024px) {
        display: grid;
        text-align: center;
      }
    }

    &__title {
      font-family: Montserrat;
      font-style: normal;
      font-weight: 600;
      font-size: 40px;
      line-height: 49px;
      color: #ffffff;
    }

    &__subtitle {
      font-family: Open Sans;
      font-style: normal;
      font-weight: normal;
      font-size: 25px;
      line-height: 34px;
      color: #ffffff;
      margin-top: 20px;
    }

    &__link {
      width: 150px;
      height: 39px;
      border: 1px solid #ffffff;
      box-sizing: border-box;
      border-radius: 30px;
      font-family: Open Sans;
      font-style: normal;
      font-weight: normal;
      font-size: 15px;
      line-height: 20px;
      color: #ffffff;
      display: flex;
      justify-content: center;
      align-items: center;
      cursor: pointer;
      margin-top: 45px;

      @media screen and (max-width: 1024px) {
        margin: 10px auto;
      }
    }

    &__image {
      @media screen and (max-width: 1024px) {
        width: 100%;
        margin: 0 auto;
      }
    }
  }

  .section-5 {
    margin: 50px auto;

    &__container {
      display: flex;
      justify-content: center;

      @media screen and (max-width: 1024px) {
        display: grid;
      }
    }

    &__title {
      font-family: Montserrat;
      font-style: normal;
      font-weight: 600;
      font-size: 25px;
      line-height: 30px;
      text-align: center;
      color: #565656;
      margin-bottom: 20px;
    }

    &__item {
      height: 80px;
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 10px 20px;
    }

    &__image {
      height: 100%;
      object-fit: contain;
    }
  }
}
</style>
