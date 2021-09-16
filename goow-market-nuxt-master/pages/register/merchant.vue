<template>
  <div>
    <ModalBox :active="activityModal">
      <div class="activities">
        <a
          v-for="(item, index) in activities"
          :key="index"
          class="activities__item"
          :class="[formData.merchant.activity_id === item.id ? 'active' : '']"
          :style="`background: ${item.color}`"
          @click="selectActivity(item)"
        >
          <span class="activities__title">{{ item.title }}</span>
          <img
            v-if="item.icon"
            class="activities__icon"
            :src="$api_storage_url + item.icon"
          />
        </a>
      </div>
    </ModalBox>
    <div class="auth">
      <div class="auth__title">Créez votre boutique</div>
      <div class="auth__description">
        Réalisez l’inscription de votre marché en quelques clics et le tour est
        joué ! Pour cela, remplissez ce formulaireafin de valider votre profil.
      </div>
      <form class="auth__form" @submit.prevent="submit">
        <div class="content">
          <div class="content__input">
            <div>
              <svg
                width="13"
                height="15"
                viewBox="0 0 13 15"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M6.5 15C9.02041 10.875 13 10.375 13 6.125C13 2.75 10.0816 0 6.5 0C2.91837 0 0 2.75 0 6.125C0 10.375 3.97959 11 6.5 15Z"
                  fill="#3B1099"
                />
              </svg>
              <input
                v-model="citySearch"
                style="font-size: 16px"
                type="text"
                :placeholder="[
                  formData.merchant.city ? formData.merchant.city : 'Ville',
                ]"
                autocomplete="off"
                @click="cityListActive = true"
              />
            </div>
            <a @click="cityListActive = false">
              <svg
                width="17"
                height="17"
                viewBox="0 0 17 17"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
                style="cursor: pointer"
                @click="citySearch = ''"
              >
                <path
                  d="M1 1L16 16"
                  stroke="#C4C4C4"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <path
                  d="M16 1L1 16"
                  stroke="#C4C4C4"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
            </a>
          </div>
          <div :class="[cityListActive ? 'active' : '']" class="content__list">
            <div
              v-for="(city, index) in cities"
              :key="`city_filter_${index}`"
              class="content__list-item"
              @click="selectCity(city)"
            >
              <div class="content__list-item-icon">
                <svg
                  width="13"
                  height="15"
                  viewBox="0 0 13 15"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M6.5 15C9.02041 10.875 13 10.375 13 6.125C13 2.75 10.0816 0 6.5 0C2.91837 0 0 2.75 0 6.125C0 10.375 3.97959 11 6.5 15Z"
                    fill="#B9B9B9"
                  />
                </svg>
              </div>
              <div class="content__list-item-text">
                {{ city.name }}
              </div>
            </div>
            <div
              v-if="!cities.length"
              class="content__list-item"
              style="cursor: default"
            >
              <div
                class="content__list-item-icon"
                style="margin-left: 8px; margin-right: 13px"
              ></div>
              <div class="content__list-item-text">Aucun résultat</div>
            </div>
          </div>
        </div>
        <div v-if="errors.has('merchant.city')" class="auth__error__wrapper">
          <div class="auth__error">{{ errors.get('merchant.city') }}</div>
        </div>

        <div class="markets">
          <a class="markets__input" @click="marketListActive = true">
            <p style="font-size: 16px" v-if="formData.merchant.market_id">
              {{ selectedMarket.title }}
            </p>
            <span v-else>Nom du marché</span>
          </a>
          <div
            :class="[marketListActive ? 'active' : '']"
            class="markets__list"
          >
            <a
              v-for="(item, index) in markets"
              :key="index"
              class="markets__item"
              @click="selectMarket(item)"
            >
              <svg
                width="27"
                height="29"
                viewBox="0 0 27 29"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <g clip-path="url(#clip0)">
                  <path
                    d="M18.6407 12.924L13.5 4.59326V7.65537L17.255 13.7346L18.6407 12.924Z"
                    fill="#5017B1"
                  />
                  <path
                    d="M15.8692 14.545L13.5 10.6724V13.7795L14.4834 15.3556L15.8692 14.545Z"
                    fill="#5017B1"
                  />
                  <path
                    d="M26.9552 8.06054L26.0164 6.48445L23.2002 5.04346L25.5694 8.8711L26.9552 8.06054Z"
                    fill="#5017B1"
                  />
                  <path
                    d="M24.1837 9.68181L20.4288 3.60261L17.6572 2.16162L22.798 10.4924L24.1837 9.68181Z"
                    fill="#5017B1"
                  />
                  <path
                    d="M21.4123 11.3028L14.8858 0.720497L13.5 0V1.53106L20.0265 12.1134L21.4123 11.3028Z"
                    fill="#5017B1"
                  />
                  <path
                    d="M20.0266 25.7577L21.4124 24.9471V19.7686L20.0266 20.5791V25.7577Z"
                    fill="#3B1196"
                  />
                  <path
                    d="M17.2549 27.3788L18.6406 26.5682V21.3896L17.2549 22.2002V27.3788Z"
                    fill="#3B1196"
                  />
                  <path
                    d="M22.9321 19.048V24.0014L24.0944 23.326V18.3726L22.9321 19.048Z"
                    fill="#3B1196"
                  />
                  <path
                    d="M25.4802 17.652V22.6054L26.6425 21.93V16.9766L25.4802 17.652Z"
                    fill="#3B1196"
                  />
                  <path
                    d="M14.4834 28.9999L15.8692 28.1893V23.0107L14.4834 23.8213V28.9999Z"
                    fill="#3B1196"
                  />
                  <path
                    d="M8.35938 12.924L13.5001 4.59326V7.65537L9.74514 13.7346L8.35938 12.924Z"
                    fill="#5017B1"
                  />
                  <path
                    d="M11.1309 14.545L13.5001 10.6724V13.7795L12.5166 15.3556L11.1309 14.545Z"
                    fill="#5017B1"
                  />
                  <path
                    d="M0 8.06054L0.983444 6.48445L3.75497 5.04346L1.38576 8.8711L0 8.06054Z"
                    fill="#5017B1"
                  />
                  <path
                    d="M2.77148 9.68181L6.52645 3.60261L9.34268 2.16162L4.15725 10.4924L2.77148 9.68181Z"
                    fill="#5017B1"
                  />
                  <path
                    d="M5.54297 11.3028L12.1142 0.720497L13.4999 0V1.53106L6.97343 12.1134L5.54297 11.3028Z"
                    fill="#5017B1"
                  />
                  <path
                    d="M1.38576 11.1676L0 10.357V8.10547L1.38576 8.91603V11.1676Z"
                    fill="#5017B1"
                  />
                  <path
                    d="M2.77148 9.68164V11.708L4.15725 12.5186V10.5372L2.77148 9.68164Z"
                    fill="#5017B1"
                  />
                  <path
                    d="M5.54297 11.3027V13.2841L6.92873 14.0947V12.1133L5.54297 11.3027Z"
                    fill="#5017B1"
                  />
                  <path
                    d="M8.35938 12.9238V14.9052L9.74514 15.7158V13.7344L8.35938 12.9238Z"
                    fill="#5017B1"
                  />
                  <path
                    d="M11.1309 14.5449V16.5263L12.5166 17.3368V15.3105L11.1309 14.5449Z"
                    fill="#5017B1"
                  />
                  <path
                    d="M25.5696 11.1676L27 10.357V8.10547L25.5696 8.91603V11.1676Z"
                    fill="#3B1196"
                  />
                  <path
                    d="M22.8428 10.4922V12.4736L24.2285 11.663V9.68164L22.8428 10.4922Z"
                    fill="#3B1196"
                  />
                  <path
                    d="M20.0713 12.1133V14.0947L21.457 13.2841V11.3027L20.0713 12.1133Z"
                    fill="#3B1196"
                  />
                  <path
                    d="M17.2549 13.6895V15.6708L18.6406 14.8603V12.8789L17.2549 13.6895Z"
                    fill="#3B1196"
                  />
                  <path
                    d="M14.4834 15.3106V17.2919L15.8692 16.4814V14.5L14.4834 15.3106Z"
                    fill="#3B1196"
                  />
                  <path
                    d="M6.97343 25.7577L5.54297 24.9471V19.7686L6.97343 20.5791V25.7577Z"
                    fill="#5017B1"
                  />
                  <path
                    d="M9.74514 27.3788L8.35938 26.5682V21.3896L9.74514 22.2002V27.3788Z"
                    fill="#5017B1"
                  />
                  <path
                    d="M2.90552 18.3726V23.326L4.06777 24.0014V19.048L2.90552 18.3726Z"
                    fill="#5017B1"
                  />
                  <path
                    d="M0.357666 16.9766V21.93L1.51992 22.6054V17.652L0.357666 16.9766Z"
                    fill="#5017B1"
                  />
                  <path
                    d="M12.5166 28.9999L11.1309 28.1893V23.0107L12.5166 23.8213V28.9999Z"
                    fill="#5017B1"
                  />
                </g>
                <defs>
                  <clipPath id="clip0">
                    <rect width="27" height="29" fill="white" />
                  </clipPath>
                </defs>
              </svg>
              <span>{{ item.title }}</span>
            </a>
          </div>
        </div>
        <div
          v-if="errors.has('merchant.market_id')"
          class="auth__error__wrapper"
        >
          <div class="auth__error">{{ errors.get('merchant.market_id') }}</div>
        </div>

        <button
          v-if="formData.merchant.activity_id"
          style="font-size: 16px"
          class="auth__activity auth__form-link"
          type="button"
          @click="activityModal = true"
        >
          <p>{{ selectedActivity.title }}</p>
          <img
            class="activities__icon"
            :src="$api_storage_url + selectedActivity.icon"
          />
        </button>
        <button
          v-else
          class="auth__activity auth__activity--border auth__form-link"
          type="button"
          @click="activityModal = true"
        >
          <span>Activité</span>
        </button>
        <div
          v-if="errors.has('merchant.activity_id')"
          class="auth__error__wrapper"
        >
          <div class="auth__error">
            {{ errors.get('merchant.activity_id') }}
          </div>
        </div>

        <br />
        <input
          v-model="formData.user.email"
          class="auth__form-input"
          placeholder="Adresse mail *"
          type="email"
        />
        <div v-if="errors.has('user.email')" class="auth__error__wrapper">
          <div class="auth__error">{{ errors.get('user.email') }}</div>
        </div>

        <input
          v-model="formData.merchant.title"
          class="auth__form-input"
          placeholder="Nom du stand*"
        />
        <div v-if="errors.has('merchant.title')" class="auth__error__wrapper">
          <div class="auth__error">{{ errors.get('merchant.title') }}</div>
        </div>

        <input
          v-model="formData.user.first_name"
          class="auth__form-input"
          placeholder="Nom *"
        />
        <div v-if="errors.has('user.first_name')" class="auth__error__wrapper">
          <div class="auth__error">{{ errors.get('user.first_name') }}</div>
        </div>
        <input
          v-model="formData.user.last_name"
          class="auth__form-input"
          placeholder="Prénom *"
        />
        <div v-if="errors.has('user.last_name')" class="auth__error__wrapper">
          <div class="auth__error">{{ errors.get('user.last_name') }}</div>
        </div>
        <input
          v-model="formData.user.phone"
          class="auth__form-input"
          placeholder="Numéro de téléphone *"
        />
        <div v-if="errors.has('user.phone')" class="auth__error__wrapper">
          <div class="auth__error">{{ errors.get('user.phone') }}</div>
        </div>

        <button class="auth__form-button" type="submit">Je m’inscris</button>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  layout: 'auth',
  middleware: 'guest',
  async asyncData({ $axios }) {
    const cities = (await $axios.$get('cities')).cities
    const activities = (await $axios.$get('activities')).activities
    return { cities, activities }
  },
  data() {
    return {
      cities: [],
      city: '',
      markets: [],
      formData: {
        user: {},
        merchant: {
          market_id: '',
          activity_id: null,
        },
      },
      activityModal: false,
      selectedActivity: {},
      citySearch: '',
      cityListActive: false,
      marketListActive: false,
      selectedMarket: {},
    }
  },
  head() {
    return {
      title: 'Register',
    }
  },
  watch: {
    citySearch() {
      this.searchForCity()
    },
  },
  mounted() {
    this.$nuxt.$on('close-modal-box', () => (this.activityModal = false))
  },
  methods: {
    selectCity(city) {
      this.formData.merchant.city = city.name
      this.cityListActive = false
      this.markets = this.cities.find((item) => item.id === city.id).markets
      this.formData.merchant.market_id = null
      this.selectedMarket = {}
    },
    selectMarket(market) {
      this.formData.merchant.market_id = market.id
      this.marketListActive = false
      this.selectedMarket = market
    },
    selectActivity(activity) {
      this.formData.merchant.activity_id = activity.id
      this.selectedActivity = activity
      this.activityModal = false
    },
    async submit() {
      console.log(this.formData)
      try {
        await this.$axios.post('auth/register-merchant', this.formData)
        this.$swal
          .fire(
            'Succès !',
            'La demande a été effectuée auprès du responsable du marché, plus que quelques instants avant de pouvoir créer votre boutique',
            'success'
          )
          .then(() => {
            this.$router.push('/')
          })
      } catch (e) {
        this.errors.record(e.response.data.errors)
      }
    },
    searchForCity() {
      this.$axios
        .get('cities/search', {
          params: {
            search_string: this.citySearch,
          },
        })
        .then((res) => {
          this.cities = res.data.cities
        })
    },
  },
}
</script>

<style lang="scss" scoped>
.auth {
  @media screen and (max-width: 1024px) {
    width: fit-content;
    &__title {
      margin-top: 10px;
    }
  }
  .auth__form-link {
    cursor: pointer;
    text-align: left;
    p {
      font-style: normal;
      font-weight: normal;
      font-size: 13px;
      line-height: 22px;
      color: #565656;
    }
  }

  &__description {
    font-family: Open Sans;
    font-style: normal;
    font-weight: normal;
    font-size: 16px;
    text-align: center;
    line-height: 20px;
    color: #000000;
  }

  &__form {
    width: 403px;
    margin: 37px auto 0 auto;
    &-input {
      font-size: 16px;
    }
  }

  &__activity {
    margin: 0 auto;
    height: 43px;
    max-width: 100%;
    padding: 0 100px;
    border-radius: 30px;
    font-family: Open Sans;
    font-style: normal;
    font-weight: normal;
    font-size: 15px;
    line-height: 20px;
    color: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    transition: opacity 0.125s;
    border: none;
    &:hover {
      opacity: 0.9;
    }
    &--border {
      border: 1px solid rgba(0, 0, 0, 0.15);
    }
    img {
      margin-left: 10px;
    }
  }

  .markets {
    position: relative;

    &__input {
      display: flex;
      max-width: 100%;
      justify-content: space-between;
      align-items: center;
      padding: 8px 25px;
      box-sizing: border-box;
      margin: 14px auto 12px auto;
      width: 403px;
      height: 43px;
      box-shadow: 0 6px 8px rgba(0, 0, 0, 0.1);
      border: none;
      border-radius: 25px;
      background: #fff;
      cursor: pointer;
      p {
        font-family: Montserrat, serif;
        font-style: normal;
        font-weight: normal;
        font-size: 13px;
        line-height: 22px;
        color: #565656;
      }
      span {
        font-family: Montserrat, serif;
        font-style: normal;
        font-weight: 300;
        font-size: 14px;
        line-height: 17px;
        color: #9a9a9a;
      }
    }

    &__list {
      display: none;
      width: 403px;
      position: absolute;
      top: 70px;
      left: 50%;
      transform: translateX(-50%);
      background: #ffffff;
      box-shadow: 0 6px 4px rgb(0 0 0 / 5%);
      border-radius: 20px;
      padding: 10px 24px 21px 24px;
      &.active {
        display: block;
      }
    }

    &__item {
      cursor: pointer;
      width: 100%;
      font-family: Open Sans, serif;
      font-style: normal;
      font-weight: normal;
      font-size: 16px;
      line-height: 22px;
      color: #565656;
      display: flex;
      justify-content: flex-start;
      align-items: center;
      padding-bottom: 9px;
      border-bottom: 1px solid #e4e4e4;
      margin-bottom: 12px;
      svg {
        margin-right: 20px;
      }
    }
    @media screen and (max-width: 1024px) {
      width: 360px;
      margin: auto;
      position: relative;
    }
  }

  .activities {
    max-width: 100%;
    display: flex;
    flex-wrap: wrap;
    justify-content: flex-start;

    &__item {
      max-height: 39px;
      background: #fce9c5;
      border-radius: 30px;
      padding: 9px 18px 10px 18px;
      cursor: pointer;
      margin: 10px 5px;
      display: flex;
      justify-content: center;
      align-items: center;
      transition: opacity 0.1s;
      &:hover {
        opacity: 0.925;
      }
      &.active {
        border: 1px solid rgba(0, 0, 0, 0.25);
      }
    }

    &__title {
      font-family: Open Sans;
      font-style: normal;
      font-weight: normal;
      font-size: 15px;
      line-height: 20px;
      color: rgba(0, 0, 0, 0.4);
    }

    &__icon {
      margin-left: 4px;
      height: 35px;
      width: 35px;
    }
  }

  .content {
    width: 403px;
    padding-top: 16px;
    margin: auto;
    position: relative;
    &__input {
      display: flex;
      max-width: 100%;
      justify-content: space-between;
      align-items: center;
      padding: 8px 25px;
      box-sizing: border-box;
      margin: 14px auto 12px auto;
      width: 403px;
      height: 43px;
      box-shadow: 0 6px 8px rgba(0, 0, 0, 0.1);
      border: none;
      border-radius: 25px;
      background: #fff;

      input {
        border: none;
        height: 100%;
        margin-left: 10px;
        background: transparent;
      }
      &-icon {
        margin-right: 13px;
      }
      &-text {
        font-family: Open Sans, serif;
        font-style: normal;
        font-weight: normal;
        font-size: 16px;
        line-height: 22px;
        color: #565656;
      }
    }
    &__list {
      display: none;
      width: 100%;
      position: absolute;
      z-index: 2;
      background: #fff;
      box-shadow: 0 6px 8px rgba(0, 0, 0, 0.1);
      border: none;
      border-radius: 12px;
      padding: 5px 0 15px 0;
      &.active {
        display: block;
      }
      &-item {
        cursor: pointer;
        margin-top: 10px;
        display: flex;
        justify-content: flex-start;
        align-items: center;
        &-icon {
          margin-left: 11px;
          margin-right: 17px;
        }
        &-text {
          font-family: Open Sans, serif;
          font-style: normal;
          font-weight: normal;
          font-size: 16px;
          line-height: 22px;

          color: #565656;
        }
      }
    }
    @media screen and (max-width: 1024px) {
      width: 360px;
    }
  }
}
</style>
