<template>
  <div class="projects">
    <div class="section-1">
      <div class="section-1__wrap">
        <div>
          <div class="container section-1__container">
            <img class="section-1__image" src="/images/phone.png" />
          </div>
          <div class="section-1__box-wrap section-1__box-wrap--left">
            <svg
              class="section-1__vector"
              width="571"
              height="665"
              viewBox="0 0 571 665"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M571 332.5C571 273.811 528.142 219.613 458.691 190.895L-2.14142 -5.01056e-05L-2.14148 665L458.691 474.105C528 445.387 571 391.189 571 332.5Z"
                fill="#3B1099"
              />
            </svg>
            <div class="section-1__box">
              <p class="section-1__title section-1__title--white">
                Trouvez votre marchand idéal !
                <img
                  class="section-1__icone"
                  src="/icons/right-pointing-magnifying-glass.png"
                />
              </p>
              <p class="section-1__text section-1__text--white">
                Une fois la géolocalisation activée, Goow met à votre
                disposition un ensemble de marchands situés à proximité.
                Dénichez celui qui vous intéresse et visitez sa boutique.
              </p>
            </div>
          </div>
          <div class="container section-1__container">
            <img class="section-1__image" src="/images/phone.png" />
            <div class="section-1__text-wrap section-1__text-wrap--margin">
              <p class="section-1__title section-1__title--blue">
                Commandez !
                <img class="section-1__icone" src="/icons/basket.png" />
              </p>
              <p class="section-1__text section-1__text--blue">
                Une fois vos produits sélectionnés, il ne vous reste plus qu’à
                passer commande et à les récupérer où vous voulez, quand vous
                voulez !
              </p>
            </div>
          </div>
        </div>
        <div class="section-1__center">
          <div class="section-1__circle">1</div>
          <div class="section-1__circle">2</div>
          <div class="section-1__circle">3</div>
          <div class="section-1__circle">4</div>
          <div class="section-1__border"></div>
        </div>
        <div>
          <div class="container section-1__container">
            <div class="section-1__text-wrap section-1__text-wrap--left">
              <p class="section-1__title section-1__title--blue">
                Localisez-vous<img
                  class="section-1__icone"
                  src="/icons/round-pushpin_1f4cd.png"
                />
              </p>
              <p class="section-1__text section-1__text--blue">
                Goow utilise la géolocalisation afin de trouver les marchés
                situés près de chez vous. Utilisez-la et sélectionnez votre
                ville pour dénicher votre futur marché préféré !
              </p>
            </div>
            <img class="section-1__image" src="/images/phone.png" />
          </div>
          <div class="section-1__box-wrap section-1__box-wrap--right">
            <svg
              class="section-1__vector section-1__vector--right"
              width="552"
              height="665"
              viewBox="0 0 552 665"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M0 332.5C0 391.189 42.8583 445.387 112.309 474.105L573.141 665L573.141 0L112.309 190.895C42.9998 219.613 0 273.811 0 332.5Z"
                fill="#3B1099"
              />
            </svg>
            <div class="section-1__box">
              <p class="section-1__title section-1__title--white">
                Choisissez vos produits
                <img
                  class="section-1__icone"
                  src="/icons/open-hands-sign_1f450.png"
                />
              </p>
              <p class="section-1__text section-1__text--white">
                Après avoir choisi la boutique qui vous intéresse, vous aurez à
                choisir les produits locaux qui vous intéressent.
              </p>
            </div>
          </div>
          <div class="container section-1__container">
            <img class="section-1__image" src="/images/phone.png" />
          </div>
        </div>
      </div>
      <nuxt-link class="section-1__link" to="/login">Je m’inscris</nuxt-link>
    </div>
    <div class="section-2">
      <div class="container">
        <p class="section-2__subtitle">N’ATTENDEZ PLUS</p>
        <p class="section-2__title">Choisissez Goow</p>
        <p class="section-2__text">
          Goow se base sur six thèmes-clés pour mener à bien son projet
        </p>
        <div class="section-2__column">
          <div class="section-2__box">
            <div class="section-2__circle section-2__circle--blue">
              <img
                class="section-2__icone"
                src="/icons/thumbs-up-signpng.png"
              />
            </div>
            <p>Le soutien des commerces de marchés</p>
          </div>
          <div class="section-2__box">
            <div class="section-2__circle section-2__circle--yellow">
              <img
                class="section-2__icone"
                src="/icons/electric-light-bulb.png"
              />
            </div>
            <p>Une solution spécialisée pour les marchés</p>
          </div>
          <div class="section-2__box">
            <div class="section-2__circle section-2__circle--pink">
              <img class="section-2__icone" src="/icons/grinning-face.png" />
            </div>

            <p>Pas de commission pour les marchands</p>
          </div>
        </div>
        <div class="section-2__column">
          <div class="section-2__box">
            <div class="section-2__circle section-2__circle--blue">
              <img class="section-2__icone" src="/icons/handshake.png" />
            </div>
            <p>Garder le lien avec les clients</p>
          </div>
          <div class="section-2__box">
            <div class="section-2__circle section-2__circle--yellow">
              <img class="section-2__icone" src="/icons/ok-hand-sign.png" />
            </div>
            <p>Éviter les files d’attentes</p>
          </div>
          <div class="section-2__box">
            <div class="section-2__circle section-2__circle--pink">
              <img
                class="section-2__icone"
                src="icons\face-with-stuck-out-tongue.png
"
              />
            </div>
            <p>Des produits sains et locaux</p>
          </div>
        </div>
      </div>
    </div>
    <div class="section-3">
      <div class="container">
        <p class="section-3__subtitle">PRÉSENTATIONS</p>
        <p class="section-3__title">Vos marchands sont sur GOOW</p>
        <p class="section-3__text">
          A Goow, nous tenons à valoriser le savoir-faire des marchands aux
          quatre coins de la France. Découvrez-les sans plus attendre !
        </p>
        <div class="section-3__merchants">
          <MerchantItem
            v-for="(item, index) in merchants"
            :key="index"
            :merchant="item"
          />
        </div>
        <nuxt-link class="section-3__link" to="/explore"
          >Découvrir plus de commerçants</nuxt-link
        >
      </div>
    </div>
  </div>
</template>

<script>
export default {
  async asyncData({ $axios }) {
    const merchants = (await $axios.$get('merchants?take=6')).merchants
    return { merchants }
  },
  data() {
    return {}
  },
}
</script>

<style lang="scss" scoped>
.projects {
  .section-1 {
    padding: 100px 0;

    &__wrap {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      grid-gap: 100px;
      @media screen and (max-width: 1024px) {
        grid-gap: 20px;
      }
      @media screen and (max-width: 962px) {
        grid-template-columns: repeat(1, 1fr);
        grid-gap: 0;
      }
    }

    &__center {
      position: absolute;
      left: 50%;
      transform: translateX(-50%);
      margin-top: 150px;
      @media screen and (max-width: 962px) {
        display: none;
      }
    }

    &__circle {
      width: 86px;
      height: 86px;
      background: #fbfbfb;
      box-shadow: 0 7px 4px rgba(0, 0, 0, 0.05);
      display: flex;
      justify-content: center;
      align-items: center;
      border-radius: 50%;
      font-family: Montserrat;
      font-style: normal;
      font-weight: 600;
      font-size: 45px;
      line-height: 55px;
      color: #3b1099;
      margin-bottom: 400px;
      position: relative;
      z-index: 1;
      &.active {
        background: #3b1099;
        color: #ffffff;
      }
      &:nth-of-type(4) {
        margin-bottom: 0;
      }
    }

    &__border {
      width: 2px;
      height: 100%;
      position: absolute;
      top: 0;
      left: 50%;
      z-index: 0;
      border-right: 1px solid #3b1099;
    }

    &__box-wrap {
      height: 571px;
      position: relative;
      &--left {
        left: 0;
      }
      &--right {
        .section-1__vector,
        .section-1__box {
          right: 0;
        }
      }
      svg {
        max-width: 100%;
      }
    }

    &__container {
      text-align: center;
    }

    &__vector {
      position: absolute;
      z-index: 0;
    }

    &__box {
      width: 370px;
      max-width: 100%;
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      z-index: 2;
      margin: 0 auto;
      padding: 0 20px;
    }

    &__text-wrap {
      width: 370px;
      max-width: 100%;
      text-align: left;
      margin: 0 auto;
      &--left {
        margin: 0;
      }
      &--margin {
        margin-top: 100px;
      }
      @media screen and (max-width: 769px) {
        width: unset;
      }
    }

    &__subtitle {
      font-family: Open Sans;
      font-style: normal;
      font-weight: normal;
      font-size: 13px;
      line-height: 18px;
      letter-spacing: 0.1em;
      margin-bottom: 6px;
      &--white {
        color: #ffffff;
      }
    }

    &__title {
      font-family: Montserrat;
      font-style: normal;
      font-weight: 600;
      font-size: 40px;
      line-height: 49px;
      margin-bottom: 16px;
      &--white {
        color: #ffffff;
      }
    }

    &__text {
      font-family: Open Sans;
      font-style: normal;
      font-weight: normal;
      font-size: 16px;
      line-height: 22px;
      &--white {
        color: #ffffff;
      }
      &--blue {
        color: #3b1099;
      }
    }

    &__icone {
      height: 40px;
      width: 40px;
    }

    &__link {
      width: 353px;
      max-width: 100%;
      height: 43px;
      background: #5017b1;
      box-shadow: 0 6px 8px rgba(0, 0, 0, 0.1);
      border-radius: 20px;
      font-family: Open Sans;
      font-style: normal;
      font-weight: 600;
      font-size: 16px;
      line-height: 22px;
      color: #ffffff;
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 100px auto 0 auto;
      cursor: pointer;
      text-decoration: none;
      transition: opacity 0.9s;
      &:hover {
        opacity: 0.9;
      }
    }
  }

  .section-2 {
    background: rgba(59, 16, 153, 0.06);
    text-align: center;
    padding: 67px 0 128px 0;

    &__subtitle {
      font-family: Open Sans;
      font-style: normal;
      font-weight: normal;
      font-size: 13px;
      line-height: 18px;
      letter-spacing: 0.1em;
      color: #9a9a9a;
      margin-bottom: 8px;
    }

    &__title {
      font-family: Montserrat;
      font-style: normal;
      font-weight: 600;
      font-size: 40px;
      line-height: 49px;
      color: #565656;
      margin-bottom: 8px;
    }

    &__text {
      font-family: Open Sans;
      font-style: normal;
      font-weight: normal;
      font-size: 25px;
      line-height: 34px;
      text-align: center;
      color: #9a9a9a;
      margin-bottom: 40px;
    }

    &__icone {
      height: 30px;
      width: 30px;
    }

    &__column {
      display: flex;
      justify-content: center;
      margin-bottom: 20px;
      @media screen and (max-width: 769px) {
        display: block;
      }
    }

    &__box {
      text-align: center;
      margin: 0 60px;
      @media screen and (max-width: 769px) {
        width: 159px;
        margin: 16px auto;
      }
      p {
        width: 159px;
        font-family: Open Sans;
        font-style: normal;
        font-weight: normal;
        font-size: 13px;
        line-height: 18px;
        text-align: center;
        letter-spacing: 0.1em;
        color: #9a9a9a;
      }
    }

    &__circle {
      width: 74px;
      height: 74px;
      display: flex;
      justify-content: center;
      align-items: center;
      border-radius: 50%;
      margin: 0 auto 7px auto;
      &--blue {
        background: #daf3ff;
      }
      &--yellow {
        background: #fff9da;
      }
      &--punk {
        background: #ffe5da;
      }
    }
  }

  .section-3 {
    text-align: center;
    padding: 41px 0 58px 0;

    &__subtitle {
      font-family: Open Sans;
      font-style: normal;
      font-weight: normal;
      font-size: 13px;
      line-height: 18px;
      letter-spacing: 0.1em;
      color: #9a9a9a;
      margin-bottom: 8px;
    }

    &__title {
      font-family: Montserrat;
      font-style: normal;
      font-weight: 600;
      font-size: 40px;
      line-height: 49px;
      color: #565656;
      margin-bottom: 8px;
    }

    &__text {
      font-family: Open Sans;
      font-style: normal;
      font-weight: normal;
      font-size: 25px;
      line-height: 34px;
      text-align: center;
      color: #9a9a9a;
      margin-bottom: 40px;
    }

    &__merchants {
      max-width: 1024px;
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      grid-gap: 30px;
      grid-row-gap: 48px;
      margin: 0 auto 85px auto;

      &__border {
        border-bottom: 1px solid #e4e4e4;
        padding: 25px 0 8px 0;
      }

      @media screen and (max-width: 1408px) {
        grid-template-columns: repeat(2, 1fr);
      }
      @media screen and (max-width: 1024px) {
        justify-content: space-around;
      }
      @media screen and (max-width: 769px) {
        grid-template-columns: repeat(1, 100%);
      }
      @media screen and (max-width: 600px) {
        justify-content: center;
      }
    }

    &__link {
      width: 353px;
      max-width: 100%;
      height: 43px;
      background: #5017b1;
      box-shadow: 0 6px 8px rgba(0, 0, 0, 0.1);
      border-radius: 20px;
      font-family: Open Sans;
      font-style: normal;
      font-weight: 600;
      font-size: 16px;
      line-height: 22px;
      color: #ffffff;
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 0 auto;
      cursor: pointer;
      text-decoration: none;
      transition: opacity 0.9s;
      &:hover {
        opacity: 0.9;
      }
    }
  }
}
</style>
