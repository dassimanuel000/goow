<template>
  <div class="i-am-merchant">
    <ModalBox :active="modal.active">
      <p class="modal__text">Vous êtes déjà connecté</p>
    </ModalBox>
    <div class="container">
      <div class="section-1">
        <div class="section-1__left">
          <p class="section-1__title">
            Pourquoi travailler avec
            <span class="background_purple">GOOW</span>
            ?
          </p>
          <a
            :class="[boxes.firstActive ? 'active' : '']"
            class="section-1__box"
            @click="boxes.firstActive = !boxes.firstActive"
          >
            <img class="section-1__box-icon" src="/icons/caddie2.png" />
            <span>Mettez en lumière votre stand</span>
          </a>
          <div
            :class="[boxes.firstActive ? 'active' : '']"
            class="section-1__text-wrap"
          >
            <p class="section-1__text">
              L’équipe de Goow sera à vos côtés pour vous accompagner dans cette
              aventure digitale.
              <br />
              <br />
              Depuis la plateforme Goow, votre boutique en ligne vous permettra
              de booster votre activité.
            </p>
          </div>
          <a
            :class="[boxes.secondActive ? 'active' : '']"
            class="section-1__box"
            @click="boxes.secondActive = !boxes.secondActive"
          >
            <img class="section-1__box-icon" src="/icons/computer.png" />
            <span>Prenez contrôle de votre marché en ligne</span>
          </a>
          <div
            :class="[boxes.secondActive ? 'active' : '']"
            class="section-1__text-wrap"
          >
            <p class="section-1__text">
              Prenez contrôle de votre marché en ligne. Mettez en avant votre
              stand et proposez le Click and Collect ou la livraison sur le site
              sInternet et sur mobile. Votre boutique vous appartient.
            </p>
          </div>
          <a
            :class="[boxes.thirdActive ? 'active' : '']"
            class="section-1__box"
            @click="boxes.thirdActive = !boxes.thirdActive"
          >
            <img class="section-1__box-icon" src="/icons/speech-balloon.png" />
            <span>Gardez le lien avec vos consommateurs en ligne</span>
          </a>
          <div
            :class="[boxes.thirdActive ? 'active' : '']"
            class="section-1__text-wrap"
          >
            <p class="section-1__text">
              Goow vous permet de répondre directement aux demandes de vos
              consommateurs et s’adapte aux nouveaux modes de consommation.
              <br />
              <br />
              La proximité étant une valeur au sein même des marchés, Goow
              s’engage à garder ce lien entre eux et vous, en ligne.
            </p>
          </div>
          <a class="section-1__link" @click="link">S’inscrire dès maintenant</a>
        </div>
        <img class="section-1__image" src="/images/Mask02.png" />
      </div>
    </div>
    <div class="section-2">
      <div class="container">
        <div class="section-2__wrap">
          <div class="section-2__image-wrap">
            <img class="section-2__image" src="/images/phone.png" />
          </div>
          <div>
            <p class="section-2__title">
              Personnalisez votre boutique en ligne
            </p>
            <div class="section-2__column">
              <img class="section-2__icon" src="/icons/check-icon.svg" />
              <p class="section-2__text">Suivez vos commandes en ligne</p>
            </div>
            <div class="section-2__column">
              <img class="section-2__icon" src="/icons/check-icon.svg" />
              <p class="section-2__text">
                Proposez le Click & collect ainsi que la livraison
              </p>
            </div>
            <div class="section-2__column">
              <img class="section-2__icon" src="/icons/check-icon.svg" />
              <p class="section-2__text">Autorisez les paiements en ligne</p>
            </div>
            <a class="section-2__link" @click="link">Je créé ma boutique</a>
          </div>
        </div>
      </div>
    </div>
    <div class="section-3">
      <div class="container">
        <p class="section-3__title">Comment ça fonctionne ?</p>
        <div class="section-3__wrap">
          <div class="section-3__image-wrap">
            <img
              class="section-3__image"
              src="/images/jade-marchand-I-chqgKXC_g-unsplash 1.png"
            />
          </div>
          <div class="section-3__content">
            <div class="block">
              <div class="block__column">
                <div class="block__circle">1</div>
                <div class="block__text-wrap">
                  <p class="block__title">Remplissez le formulaire simplifié</p>
                  <p class="block__text">
                    Ce formulaire simplifié créé spécialement pour les marchés
                    vous permettra de valider votre inscription. Il ne vous
                    restera plus qu’à attendre la validation
                  </p>
                </div>
              </div>
              <div class="block__column">
                <div class="block__circle">2</div>
                <div class="block__text-wrap">
                  <p class="block__title">Création de votre boutique</p>
                  <p class="block__text">
                    Le responsable du marché valide votre boutique en moins de
                    24 heures. Une fois cela fait, vous n’aurez plus qu'à
                    cliquer sur le lien de validation
                  </p>
                </div>
              </div>
              <div class="block__column">
                <div class="block__circle">3</div>
                <div class="block__text-wrap">
                  <p class="block__title">Validez votre profil</p>
                  <p class="block__text">
                    Vous serez automatiquement redirigé vers votre boutique
                    personnelle une fois votre profil validé
                  </p>
                </div>
              </div>
              <div class="block__column">
                <div class="block__circle">4</div>
                <div class="block__text-wrap">
                  <p class="block__title">
                    Votre boutique en ligne est prête !
                  </p>
                  <p class="block__text">
                    Votre boutique est en mesure de recevoir les commandes de
                    vos clients, il ne vous reste plus qu’à les préparer et à
                    les tenir à disposition
                  </p>
                </div>
              </div>
            </div>
            <a class="section-3__link" @click="link"
              >S’inscrire dès maintenant</a
            >
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      boxes: {
        firstActive: true,
        secondActive: false,
        thirdActive: false,
      },
      modal: {
        active: false,
      },
    }
  },
  mounted() {
    this.$nuxt.$on('close-modal-box', () => (this.modal.active = false))
  },
  methods: {
    link() {
      if (this.$auth.loggedIn) {
        this.modal.active = true
        return
      }
      this.$router.push('/register/merchant')
    },
  },
}
</script>

<style lang="scss" scoped>
.i-am-merchant {
  .modal__text {
    font-family: Open Sans;
    font-style: normal;
    font-weight: normal;
    font-size: 16px;
    line-height: 22px;
    color: #9a9a9a;
  }

  .section-1 {
    display: grid;
    grid-template-columns: 60% 35%;
    grid-gap: 5%;
    margin-top: 80px;
    margin-bottom: 130px;
    @media screen and (max-width: 1024px) {
      grid-template-columns: 100%;
      grid-gap: 0;
    }

    &__left {
      max-width: 516px;
      @media screen and (max-width: 1024px) {
        margin: 0 auto 50px auto;
      }
    }

    &__image {
      max-width: 100%;
      @media screen and (max-width: 1024px) {
        margin: 0 auto;
      }
    }

    &__title {
      font-family: Montserrat;
      font-style: normal;
      font-weight: 600;
      font-size: 40px;
      line-height: 49px;
      color: #565656;
      margin-bottom: 30px;
    }

    &__text-wrap {
      display: none;
      padding-left: 50px;
      margin-top: 12px;
      &.active {
        display: block;
      }
    }

    &__text {
      font-family: Open Sans;
      font-style: normal;
      font-weight: normal;
      font-size: 16px;
      line-height: 22px;
      color: #9a9a9a;
    }

    &__box {
      width: 100%;
      height: 43px;
      background: #ffffff;
      box-shadow: 0 6px 8px rgba(0, 0, 0, 0.1);
      border-radius: 20px;
      font-family: Open Sans;
      font-style: normal;
      font-weight: 600;
      font-size: 16px;
      line-height: 22px;
      color: #9a9a9a;
      display: flex;
      align-items: center;
      padding: 0 22px;
      cursor: pointer;
      margin-top: 12px;
      transition: color 0.1s;
      &.active {
        color: #3b1099;
      }
    }

    &__box-icon {
      margin-right: 12px;
      width: 20px;
      height: 20px;
    }

    &__link {
      max-width: 100%;
      width: 301px;
      height: 43px;
      font-family: Open Sans;
      font-style: normal;
      font-weight: 600;
      font-size: 16px;
      line-height: 22px;
      color: #ffffff;
      background: #5017b1;
      box-shadow: 0 6px 8px rgba(0, 0, 0, 0.1);
      border-radius: 20px;
      display: flex;
      justify-content: center;
      align-items: center;
      text-decoration: none;
      cursor: pointer;
      transition: opacity 0.2s;
      margin-top: 50px;
      &:hover {
        opacity: 0.95;
      }
    }
  }

  .section-2 {
    width: 100%;
    background: #3b1099;
    padding: 90px 0;

    &__wrap {
      display: grid;
      grid-template-columns: 30% 65%;
      grid-gap: 5%;
      @media screen and (max-width: 1024px) {
        grid-template-columns: 100%;
      }
    }

    &__title {
      font-family: Montserrat;
      font-style: normal;
      font-weight: 600;
      font-size: 40px;
      line-height: 49px;
      color: #ffffff;
      margin-bottom: 20px;
    }

    &__image-wrap {
      width: 100%;
      height: 300px;
      position: relative;
    }

    &__image {
      position: absolute;
      top: -150px;
    }

    &__column {
      display: flex;
      align-items: center;
      margin: 19px 0;
    }

    &__icon {
      margin-right: 12px;
    }

    &__text {
      font-family: Open Sans;
      font-style: normal;
      font-weight: 600;
      font-size: 18px;
      line-height: 25px;
      color: #ffffff;
    }

    &__link {
      width: 301px;
      max-width: 100%;
      height: 43px;
      background: #ffffff;
      box-shadow: 0 6px 8px rgba(0, 0, 0, 0.1);
      border-radius: 20px;
      font-family: Open Sans;
      font-style: normal;
      font-weight: 600;
      font-size: 16px;
      line-height: 22px;
      color: #3b1099;
      display: flex;
      justify-content: center;
      align-items: center;
      text-decoration: none;
      cursor: pointer;
      transition: opacity 0.15s;
      margin-top: 50px;
      &:hover {
        opacity: 0.98;
      }
    }
  }

  .section-3 {
    padding: 34px 0 260px 0;

    &__title {
      font-family: Montserrat;
      font-style: normal;
      font-weight: 600;
      font-size: 40px;
      line-height: 49px;
      color: #565656;
      margin: 34px 0;
      text-align: center;
    }

    &__wrap {
      display: grid;
      grid-template-columns: 30% 55%;
      grid-gap: 15%;
      @media screen and (max-width: 1024px) {
        grid-template-columns: 100%;
      }
    }

    &__image-wrap {
      text-align: center;
    }

    &__image {
      max-width: 100%;
    }

    &__link {
      width: 301px;
      max-width: 100%;
      height: 43px;
      font-family: Open Sans;
      font-style: normal;
      font-weight: 600;
      font-size: 16px;
      line-height: 22px;
      color: #ffffff;
      background: #5017b1;
      box-shadow: 0 6px 8px rgba(0, 0, 0, 0.1);
      border-radius: 20px;
      display: flex;
      justify-content: center;
      align-items: center;
      text-decoration: none;
      cursor: pointer;
      transition: opacity 0.2s;
      margin: 50px auto 0 auto;
      &:hover {
        opacity: 0.95;
      }
    }
  }

  .block {
    width: fit-content;
    margin: 0 auto;

    &__column {
      width: 100%;
      display: flex;
      margin-bottom: 25px;
    }

    &__circle {
      width: 86px;
      height: 86px;
      font-family: Montserrat;
      font-style: normal;
      font-weight: 600;
      font-size: 45px;
      line-height: 55px;
      display: flex;
      justify-content: center;
      align-items: center;
      border-radius: 50%;
      margin-right: 32px;
      background: #fbfbfb;
      box-shadow: 0 7px 4px rgba(0, 0, 0, 0.05);
      color: #3b1099;
      &.active {
        color: #ffffff;
        background: #3b1099;
        box-shadow: 0 7px 4px rgba(0, 0, 0, 0.05);
      }
      @media screen and (max-width: 769px) {
        width: 50px;
        min-width: 50px;
        height: 50px;
        font-size: 35px;
        line-height: 35px;
      }
    }

    &__text-wrap {
      max-width: 304px;
    }

    &__title {
      font-family: Open Sans;
      font-style: normal;
      font-weight: 600;
      font-size: 18px;
      line-height: 25px;
      color: #3b1099;
      margin-bottom: 4px;
    }

    &__text {
      font-family: Open Sans;
      font-style: normal;
      font-weight: normal;
      font-size: 16px;
      line-height: 22px;
      color: #9a9a9a;
    }
  }
  .background_purple {
    color: #3b1099;
  }
}
</style>
