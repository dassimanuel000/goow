<template>
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
        <input v-model="citySearch" type="text" placeholder="Votre adresse" />
      </div>
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
    </div>
    <div class="content__list">
      <div
        v-if="citySearch !== userLocation.city"
        class="content__list-item"
        @click="getLatLng()"
      >
        <div
          class="content__list-item-icon"
          style="margin-left: 8px; margin-right: 13px"
        >
          <svg
            width="20"
            height="20"
            viewBox="0 0 20 20"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <g clip-path="url(#clip0)">
              <path
                d="M10 0.508374H10.0156L10.0312 0.507399C10.0413 0.506769 10.0767 0.511491 10.1163 0.552051C10.1548 0.591425 10.1679 0.635514 10.166 0.667165L10.1652 0.681816V0.696493V2.27251V2.73006L10.6209 2.77055C14.1289 3.08226 16.95 5.88894 17.2401 9.39477L17.278 9.85354H17.7384H19.357C19.3871 9.85354 19.4298 9.86761 19.4689 9.90668C19.5079 9.94573 19.5222 9.98882 19.5222 10.0195C19.5222 10.0501 19.5079 10.0932 19.4689 10.1323C19.4298 10.1713 19.3871 10.1854 19.357 10.1854H17.7827H17.3251L17.2847 10.6412C16.9732 14.1542 14.1691 16.9778 10.6682 17.2681L10.2095 17.3062V17.7664V19.3424C10.2095 19.3759 10.1928 19.4279 10.1485 19.4743C10.1045 19.5203 10.0632 19.5306 10.0443 19.5306C10.0255 19.5306 9.9842 19.5203 9.94022 19.4743C9.89587 19.4279 9.87916 19.3759 9.87916 19.3424V17.7664V17.3089L9.42341 17.2684C5.91539 16.9567 3.09438 14.15 2.80428 10.6442L2.76632 10.1854H2.30599H0.731707H0.71608L0.700484 10.1864C0.668426 10.1884 0.623114 10.1762 0.581107 10.1395C0.539279 10.103 0.523017 10.0618 0.521201 10.0327C0.519164 10.0001 0.531525 9.95442 0.568207 9.91232C0.601089 9.87458 0.637559 9.85782 0.665318 9.85354H0.665361H0.665491H0.665621H0.665751H0.665881H0.666011H0.666141H0.66627H0.6664H0.66653H0.66666H0.66679H0.66692H0.66705H0.66718H0.66731H0.66744H0.66757H0.6677H0.66783H0.667959H0.668089H0.668219H0.668349H0.668479H0.668609H0.668739H0.668869H0.668999H0.669129H0.669259H0.669389H0.669518H0.669648H0.669778H0.669908H0.670038H0.670168H0.670298H0.670428H0.670558H0.670688H0.670818H0.670948H0.671078H0.671207H0.671337H0.671467H0.671597H0.671727H0.671857H0.671987H0.672117H0.672247H0.672377H0.672507H0.672637H0.672767H0.672896H0.673026H0.673156H0.673286H0.673416H0.673546H0.673676H0.673806H0.673936H0.674066H0.674196H0.674326H0.674455H0.674585H0.674715H0.674845H0.674975H0.675105H0.675235H0.675365H0.675495H0.675625H0.675755H0.675885H0.676014H0.676144H0.676274H0.676404H0.676534H0.676664H0.676794H0.676924H0.677054H0.677184H0.677314H0.677444H0.677574H0.677703H0.677833H0.677963H0.678093H0.678223H0.678353H0.678483H0.678613H0.678743H0.678873H0.679003H0.679133H0.679262H0.679392H0.679522H0.679652H0.679782H0.679912H0.680042H0.680172H0.680302H0.680432H0.680562H0.680692H0.680821H0.680951H0.681081H0.681211H0.681341H0.681471H0.681601H0.681731H0.681861H0.681991H0.682121H0.682251H0.682381H0.68251H0.68264H0.68277H0.6829H0.68303H0.68316H0.68329H0.68342H0.68355H0.68368H0.68381H0.68394H0.684069H0.684199H0.684329H0.684459H0.684589H0.684719H0.684849H0.684979H0.685109H0.685239H0.685369H0.685499H0.685629H0.685758H0.685888H0.686018H0.686148H0.686278H0.686408H0.686538H0.686668H0.686798H0.686928H0.687058H0.687188H0.687317H0.687447H0.687577H0.687707H0.687837H0.687967H0.688097H0.688227H0.688357H0.688487H0.688617H0.688747H0.688877H0.689006H0.689136H0.689266H0.689396H0.689526H0.689656H0.689786H0.689916H0.690046H0.690176H0.690306H0.690436H0.690565H0.690695H0.690825H0.690955H0.691085H0.691215H0.691345H0.691475H0.691605H0.691735H0.691865H0.691995H0.692124H0.692254H0.692384H0.692514H0.692644H0.692774H0.692904H0.693034H0.693164H0.693294H0.693424H0.693554H0.693684H0.693813H0.693943H0.694073H0.694203H0.694333H0.694463H0.694593H0.694723H0.694853H0.694983H0.695113H0.695243H0.695373H0.695502H0.695632H0.695762H0.695892H0.696022H0.696152H0.696282H0.696412H0.696542H0.696672H0.696802H0.696932H0.697061H0.697191H0.697321H0.697451H0.697581H0.697711H0.697841H0.697971H0.698101H0.698231H0.698361H0.698491H0.69862H0.69875H0.69888H0.69901H0.69914H0.69927H0.6994H0.69953H0.69966H0.69979H0.69992H0.70005H0.70018H0.700309H0.700439H0.700569H0.700699H0.700829H0.700959H0.701089H0.701219H0.701349H0.701479H0.701609H0.701739H0.701868H0.701998H0.702128H0.702258H0.702388H0.702518H0.702648H0.702778H0.702908H0.703038H0.703168H0.703298H0.703427H0.703557H0.703687H0.703817H0.703947H0.704077H0.704207H0.704337H0.704467H0.704597H0.704727H0.704857H0.704987H0.705116H0.705246H0.705376H0.705506H0.705636H0.705766H0.705896H0.706026H0.706156H0.706286H0.706416H0.706546H0.706676H0.706805H0.706935H0.707065H0.707195H0.707325H0.707455H0.707585H0.707715H0.707845H0.707975H0.708105H0.708235H0.708364H0.708494H0.708624H0.708754H0.708884H0.709014H0.709144H0.709274H0.709404H0.709534H2.26164H2.71927L2.75969 9.3977C3.07114 5.88473 5.87525 3.06114 9.37613 2.7708L9.83481 2.73276V2.27251V0.696493C9.83481 0.663047 9.85152 0.611084 9.89588 0.564661C9.93986 0.51863 9.98118 0.508374 10 0.508374ZM16.9523 9.99728C16.9523 6.14785 13.8687 3.05998 10.0222 3.05998C6.17566 3.05998 3.09202 6.14785 3.09202 9.99728C3.09202 13.8467 6.17566 16.9346 10.0222 16.9346C13.8687 16.9346 16.9523 13.8467 16.9523 9.99728ZM8.30488 9.99728C8.30488 9.05203 9.07932 8.27752 10.0222 8.27752C10.9461 8.27752 11.7395 9.05527 11.7395 9.99728C11.7395 10.9425 10.965 11.717 10.0222 11.717C9.07932 11.717 8.30488 10.9425 8.30488 9.99728ZM11.4091 9.99728C11.4091 9.23331 10.7866 8.60937 10.0222 8.60937C9.22737 8.60937 8.63525 9.24155 8.63525 9.99728C8.63525 10.7612 9.2577 11.3852 10.0222 11.3852C10.7866 11.3852 11.4091 10.7612 11.4091 9.99728Z"
                fill="white"
                stroke="#C4C4C4"
              />
            </g>
            <defs>
              <clipPath id="clip0">
                <rect width="20" height="20" fill="white" />
              </clipPath>
            </defs>
          </svg>
        </div>
        <div class="content__list-item-text">Me géolocaliser</div>
      </div>
      <div
        v-for="(city, index) in cities"
        :key="`city_filter_${index}`"
        class="content__list-item"
        @click="handleCity(city.slug)"
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
          {{ city.name }} {{ city.postal_code }}
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
</template>

<script>
export default {
  name: 'CityDropDownContent',
  data() {
    return {
      cities: [],
      choosenCity: null,
      citySearch: '',
      userLocation: {
        lat: null,
        lng: null,
        city: null,
      },
    }
  },
  watch: {
    citySearch() {
      this.searchForCity()
    },
  },
  mounted() {
    this.$axios.$get('cities').then((res) => {
      this.cities = res.cities
    })
  },
  methods: {
    handleCity(city) {
      this.choosenCity = city
      this.$nuxt.$emit('filterChanged', {
        filterName: 'city',
        value: this.choosenCity,
      })
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
    getLatLng() {
      if (this.userLocation.city) {
        this.citySearch = this.userLocation.city
        return
      }

      const self = this
      navigator.geolocation.getCurrentPosition(
        (pos) => {
          const crd = pos.coords
          self.userLocation.lat = crd.latitude.toString()
          self.userLocation.lng = crd.longitude.toString()
          self.getCity()
        },
        () => {},
        {
          enableHighAccuracy: true,
          timeout: 5000,
          maximumAge: 0,
        }
      )
    },
    getCity() {
      const self = this
      const xhr = new XMLHttpRequest()

      xhr.open(
        'GET',
        'https://maps.googleapis.com/maps/api/geocode/json?latlng=' +
          self.userLocation.lat +
          ',' +
          self.userLocation.lng +
          '&language=en&sensor=true&key=' +
          process.env.GOOGLE_API_KEY,
        true
      )
      xhr.send()
      xhr.onreadystatechange = processRequest
      xhr.addEventListener('readystatechange', processRequest, false)

      function processRequest(e) {
        if (xhr.readyState === 4 && xhr.status === 200) {
          const response = JSON.parse(xhr.responseText)
          self.userLocation.city =
            response.results[
              response.results.length - 1
            ].address_components[1].long_name
          self.citySearch = self.userLocation.city
        }
      }
    },
  },
}
</script>

<style lang="scss" scoped>
.content {
  width: 341px;
  padding-top: 16px;
  padding-left: 26px;
  padding-right: 26px;
  padding-bottom: 19px;

  &__input {
    display: flex;
    max-width: 288px;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 12px;
    padding: 8px 10px;
    border: 1px solid #e4e4e4;
    box-sizing: border-box;
    border-radius: 6px;
    input {
      border: none;
      height: 100%;
      margin-left: 10px;
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
}
</style>
