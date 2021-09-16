<template>
  <div class="explore">
    <div class="explore__header">
      <p class="explore__title">
        En un clic, choisissez votre marché préféré et laissez-vous guider !
      </p>
    </div>
    <div
      v-if="filterData.type === 'markets' && markets && markets.length"
      class="explore__container"
    >
      <div class="explore__left">
        <div class="explore__column">
          <div v-if="!filtercity">
            <!-- <p class="explore__small-title">A proximité</p> -->
            <p class="explore__small-title">À la une</p>
          </div>
          <div v-else>
            <p class="explore__small-title">{{ filtercity }}</p>
          </div>
          <div class="content dontCloseOnClick">
            <div class="content-item">
              <button class="profile__button">
                {{ filterData.city }}
              </button>
            </div>
            <div class="content-item" :style="'background-color: limegreen'">
              {{ filterData.activity }}
              {{ updateFilterActivity(filterData.activity) }}
            </div>
          </div>
          <div class="explore__slider-controller">
            <!-- <p>Afficher (plus de 500)</p> -->
            <a class="explore__button" @click="$refs.markets.prev()">
              <svg
                width="10"
                height="16"
                viewBox="0 0 10 16"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M9 1L1 8L9 15"
                  stroke="#9A9A9A"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
            </a>
            <a class="explore__button" @click="$refs.markets.next()">
              <svg
                width="10"
                height="16"
                viewBox="0 0 10 16"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M1 15L9 8L1 0.999999"
                  stroke="#9A9A9A"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
            </a>
          </div>
        </div>
        <VueSlickCarousel ref="markets" v-bind="carousel.market">
          <MarketItem
            v-for="(item, index) in markets"
            :key="index"
            :market="item"
          />
        </VueSlickCarousel>

        <div class="explore__column">
          <p class="explore__small-title">Villes</p>
          <div class="explore__slider-controller">
            <!-- <p>Afficher (plus de 500)</p> -->
            <a class="explore__button" @click="$refs.cities.prev()">
              <svg
                width="10"
                height="16"
                viewBox="0 0 10 16"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M9 1L1 8L9 15"
                  stroke="#9A9A9A"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
            </a>
            <a class="explore__button" @click="$refs.cities.next()">
              <svg
                width="10"
                height="16"
                viewBox="0 0 10 16"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M1 15L9 8L1 0.999999"
                  stroke="#9A9A9A"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
            </a>
          </div>
        </div>
        <VueSlickCarousel ref="cities" v-bind="carousel.city">
          <CityItem v-for="(item, index) in cities" :key="index" :city="item" />
        </VueSlickCarousel>
        <div v-if="!filtercity">
          <div v-for="(item, index) in cities" :key="index">
            <div class="explore__column">
              <p class="explore__small-title">{{ item.name }}</p>
              <div class="explore__slider-controller">
                <!-- <p>Afficher (plus de 500)</p> -->
                <a
                  class="explore__button"
                  @click="$refs.cityMarkets[index].prev()"
                >
                  <svg
                    width="10"
                    height="16"
                    viewBox="0 0 10 16"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M9 1L1 8L9 15"
                      stroke="#9A9A9A"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                  </svg>
                </a>
                <a
                  class="explore__button"
                  @click="$refs.cityMarkets[index].next()"
                >
                  <svg
                    width="10"
                    height="16"
                    viewBox="0 0 10 16"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M1 15L9 8L1 0.999999"
                      stroke="#9A9A9A"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                  </svg>
                </a>
              </div>
            </div>
            <VueSlickCarousel ref="cityMarkets" v-bind="carousel.market">
              <MarketItem
                v-for="(market, marketIdex) in item.markets"
                :key="marketIdex"
                :market="market"
              />
            </VueSlickCarousel>
          </div>
        </div>
      </div>
      <GmapMap
        :center="{
          lat: parseFloat(map.latitude),
          lng: parseFloat(map.longitude),
        }"
        :zoom="12"
        :options="options"
        class="explore__map"
      >
        <template v-for="(item, index) in markets">
          <GmapMarker
            v-if="JSON.parse(item.address).latlng"
            :key="index"
            :position="{
              lat: JSON.parse(item.address).latlng.lat,
              lng: JSON.parse(item.address).latlng.lng,
            }"
            :clickable="true"
            :icon.sync="marker"
          />
        </template>
      </GmapMap>
    </div>

    <div v-else-if="filterData.type === 'shops'" class="explore__container">
      <div class="explore__left">
        <div
          class="explore__column"
          style="
            display: flex;
            flex-direction: row;
            justify-content: space-between;
          "
        >
          <a class="explore__button" style="margin-right: 10px">
            <svg
              width="10"
              height="16"
              viewBox="0 0 10 16"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M9 1L1 8L9 15"
                stroke="#9A9A9A"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
          </a>
          <div class="activities__scroll">
            <div
              v-for="(activity, index) in activities"
              :key="`activity_${index}`"
              :style="`background-color: ${activity.color}; border-radius: 50%;height:53px;width:53px;display: flex;align-items: center;margin-right: 10px;`"
              @click="updateFilterActivity(activity.id)"
            >
              <img
                style="display: block; margin: 0 auto"
                :src="$api_storage_url + activity.icon"
              />
            </div>
          </div>
          <a class="explore__button">
            <svg
              width="10"
              height="16"
              viewBox="0 0 10 16"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M1 15L9 8L1 0.999999"
                stroke="#9A9A9A"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
          </a>
        </div>
        <div v-if="shops && shops.shops.length > 0" class="explore__column">
          <p class="explore__small-title">A proximité</p>
          <div class="explore__slider-controller">
            <!-- <p>Afficher (plus de 500)</p> -->
            <a class="explore__button" @click="$refs.markets.prev()">
              <svg
                width="10"
                height="16"
                viewBox="0 0 10 16"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M9 1L1 8L9 15"
                  stroke="#9A9A9A"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
            </a>
            <a class="explore__button" @click="$refs.markets.next()">
              <svg
                width="10"
                height="16"
                viewBox="0 0 10 16"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M1 15L9 8L1 0.999999"
                  stroke="#9A9A9A"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
            </a>
          </div>
        </div>
        <VueSlickCarousel
          v-if="shops && shops.shops.length"
          ref="markets"
          v-bind="carousel.market"
        >
          <ShopItem
            v-for="(shop, shopIndex) in shops.shops"
            :key="shopIndex"
            :shop="shop"
          />
        </VueSlickCarousel>
        <template v-if="shops && shops.shops.length && shops.cities.length">
          <div class="explore__column">
            <p class="explore__small-title">Villes</p>
            <div class="explore__slider-controller">
              <!-- <p>Afficher (plus de 500)</p> -->
              <a class="explore__button" @click="$refs.cities.prev()">
                <svg
                  width="10"
                  height="16"
                  viewBox="0 0 10 16"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M9 1L1 8L9 15"
                    stroke="#9A9A9A"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </svg>
              </a>
              <a class="explore__button" @click="$refs.cities.next()">
                <svg
                  width="10"
                  height="16"
                  viewBox="0 0 10 16"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M1 15L9 8L1 0.999999"
                    stroke="#9A9A9A"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </svg>
              </a>
            </div>
          </div>
          <VueSlickCarousel ref="cities" v-bind="carousel.city">
            <CityItem
              v-for="(item, index) in cities"
              :key="index"
              :city="item"
            />
          </VueSlickCarousel>
          <div v-for="(item, index) in shops.cities" :key="index">
            <div class="explore__column">
              <p class="explore__small-title">{{ item.name }}</p>
              <div class="explore__slider-controller">
                <!-- <p>Afficher (plus de 500)</p> -->
                <a class="explore__button" @click="$refs.shop[index].prev()">
                  <svg
                    width="10"
                    height="16"
                    viewBox="0 0 10 16"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M9 1L1 8L9 15"
                      stroke="#9A9A9A"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                  </svg>
                </a>
                <a class="explore__button" @click="$refs.shop[index].next()">
                  <svg
                    width="10"
                    height="16"
                    viewBox="0 0 10 16"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M1 15L9 8L1 0.999999"
                      stroke="#9A9A9A"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                  </svg>
                </a>
              </div>
            </div>
            <VueSlickCarousel ref="shop" v-bind="carousel.market">
              <ShopItem
                v-for="(shop, shopIndex) in item.shops"
                :key="shopIndex"
                :shop="shop"
              />
            </VueSlickCarousel>
          </div>
        </template>
      </div>
      <GmapMap
        :center="{
          lat: parseFloat(map.latitude),
          lng: parseFloat(map.longitude),
        }"
        :zoom="12"
        :options="options"
        class="explore__map"
      >
        <template v-for="(item, index) in shops.shops">
          <GmapMarker
            v-if="JSON.parse(item.address).latlng"
            :key="index"
            :position="{
              lat: parseFloat(JSON.parse(item.address).latlng.lat),
              lng: parseFloat(JSON.parse(item.address).latlng.lng),
            }"
            :clickable="true"
            :icon="$api_storage_url + item.activity.icon"
          />
        </template>
      </GmapMap>
    </div>
  </div>
</template>

<script>
import VueSlickCarousel from 'vue-slick-carousel'
import MarketItem from '~/components/MarketItem'
import ShopItem from '~/components/shop/Item'
import CityItem from '~/components/CityItem'
import 'vue-slick-carousel/dist/vue-slick-carousel.css'

export default {
  components: {
    CityItem,
    ShopItem,
    MarketItem,
    VueSlickCarousel,
  },
  async asyncData({ $axios, route }) {
    let type = ''
    if (route.query.type !== 'markets' && route.query.type !== 'shops') {
      type = 'markets'
    } else {
      type = route.query.type
    }

    const marketsInitial = (
      await $axios.$get('markets', {
        params: {
          city_slug: route.query.city,
          activity_id: route.query.activity,
          time: route.query.time,
          date: route.query.date,
          delivery: route.query.delivery,
        },
      })
    ).markets

    const cities = (await $axios.$get('cities')).cities
    const activities = (await $axios.$get('activities')).activities
    const shopsInitial = await $axios.$get('shops')
    const options = {
      zoomControl: true,
      mapTypeControl: false,
      scaleControl: false,
      streetViewControl: false,
      rotateControl: true,
      fullscreenControl: false,
      disableDefaultUI: false,
      styles: require('~/static/json/map.json'),
    }
    return { cities, marketsInitial, options, shopsInitial, type, activities }
  },
  data() {
    return {
      filterData: {
        city: null,
        activity: null,
        type: 'markets',
        time: null,
      },
      map: {
        latitude: '48.900552',
        longitude: '2.25929',
      },
      filtercity: '',
      markets: [],
      shops: {},
      marker: '/icons/map-pin-icon.svg',
      carousel: {
        market: {
          dots: false,
          dotsClass: 'slick-dots',
          infinite: false,
          initialSlide: 0,
          slidesToShow: 3,
          slidesToScroll: 1,
          autoplay: false,
          arrows: false,
          responsive: [
            {
              breakpoint: 1216,
              settings: {
                slidesToShow: 2,
                initialSlide: 0,
              },
            },
            {
              breakpoint: 769,
              settings: {
                slidesToShow: 1,
                initialSlide: 0,
              },
            },
          ],
        },
        city: {
          dots: false,
          dotsClass: 'slick-dots',
          infinite: false,
          initialSlide: 0,
          slidesToShow: 5,
          slidesToScroll: 1,
          autoplay: false,
          arrows: false,
          responsive: [
            {
              breakpoint: 1216,
              settings: {
                slidesToShow: 3,
                initialSlide: 0,
              },
            },
            {
              breakpoint: 1024,
              settings: {
                slidesToShow: 5,
                initialSlide: 0,
              },
            },
            {
              breakpoint: 769,
              settings: {
                slidesToShow: 3,
                initialSlide: 0,
              },
            },
          ],
        },
      },
    }
  },
  watch: {
    $route(val) {
      if (val.query.type) {
        this.filterData.type = val.query.type
      }
      this.filterData.city = val.query.city
      this.filterData.activity = val.query.activity
      this.filterData.time = val.query.time
      this.filterData.date = val.query.date
      this.filterData.delivery = val.query.delivery
      this.loadNewData()
    },
  },
  created() {
    this.markets = this.marketsInitial
    this.shops = this.shopsInitial
  },
  methods: {
    strUcFirst(a) {
      return (a + '').charAt(0).toUpperCase() + a.substr(1)
    },
    updateFilterActivity(activity) {
      this.filterData.activity = activity
      this.loadNewData()
    },
    getcity(slugCity) {
      this.$axios
        .$get('/cities/city', {
          params: {
            slug: slugCity,
          },
        })
        .then((res) => {
          const lng = JSON.parse(res.city.location).latlng.lng
          const lat = JSON.parse(res.city.location).latlng.lat
          this.filtercity = res.city.name
          if (JSON.parse(res.city.location).latlng) {
            this.map.latitude = lat
            this.map.longitude = lng
          }
        })
    },
    loadNewData() {
      this.$axios
        .$get(this.filterData.type, {
          params: {
            city_slug: this.filterData.city,
            activity_id: this.filterData.activity,
            time: this.filterData.time,
            date: this.filterData.date,
            delivery: this.filterData.delivery,
          },
        })
        .then((res) => {
          if (this.filterData.city) {
            this.getcity(this.filterData.city)
          } else {
            this.filtercity = ''
          }
          if (this.filterData.type === 'markets') {
            this.markets = res.markets
          }

          if (this.filterData.type === 'shops') {
            this.shops = res
          }
        })
    },
  },
}
</script>

<style lang="scss" scoped>
@media screen and (min-width: 1025px) {
  .hidden-desktop {
    display: none;
  }
}
@media screen and (max-width: 1024px) {
  .hidden-mobile {
    display: none;
  }
}
.activities {
  &__scroll {
    display: flex;
    flex-direction: row;
    overflow-x: scroll;
    width: 100%;
    -ms-overflow-style: none;
    scrollbar-width: none;
    &::-webkit-scrollbar {
      display: none;
    }
  }
}
.explore {
  width: 100%;
  padding-bottom: 110px;
  &__container {
    display: flex;

    @media screen and (max-width: 1024px) {
      display: block;
    }
  }

  &__map {
    width: 100%;
    height: 700px;
    position: sticky;
    top: 0;

    @media screen and (max-width: 1700px) {
      width: 465px;
    }
    @media screen and (max-width: 1380px) {
      width: 410px;
    }
    @media screen and (max-width: 1024px) {
      margin-top: 50px;
    }
  }

  &__header {
    width: 100%;
    height: 250px;
    background: url('/images/Banniere-_Marche_1.png') center no-repeat;
    background-size: cover;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  &__title {
    text-shadow: 4px 4px #3b1099;
    font-family: Montserrat;
    font-style: normal;
    font-weight: 600;
    font-size: 40px;
    line-height: 49px;
    color: #ffffff;

    @media screen and (max-width: 1024px) {
      font-size: 35px;
      line-height: 45px;
      text-align: center;
      text-shadow: 4px 1px #3b1099;
    }

    @media screen and (max-width: 769px) {
      font-size: 28px;
      line-height: 38px;
      text-align: center;
      text-shadow: 4px 1px #3b1099;
    }
  }

  &__left {
    width: calc(100% - 35%);
    padding-left: 30px;
    padding-right: 25px;

    @media screen and (max-width: 1700px) {
      width: calc(100% - 465px);
    }
    @media screen and (max-width: 1380px) {
      width: calc(100% - 410px);
    }
    @media screen and (max-width: 1024px) {
      width: 100%;
    }
  }

  &__column {
    display: flex;
    align-items: center;
    margin: 20px 15px 20px 15px;

    @media screen and (max-width: 1024px) {
      display: flex;
    }
  }

  &__slider-controller {
    display: flex;
    align-items: center;
    margin-left: auto;
  }

  &__small-title {
    font-family: Open Sans;
    font-style: normal;
    font-weight: 600;
    font-size: 25px;
    line-height: 34px;
    color: #000000;
  }

  &__small-subtitle {
    font-family: Open Sans;
    font-style: normal;
    font-weight: 600;
    font-size: 20px;
    line-height: 34px;
    margin-left: 15px;
    color: #9a9a9a;
    @media screen and (max-width: 1024px) {
      font-size: 16px;
    }
  }

  &__slider-controller {
    p {
      font-family: Open Sans;
      font-style: normal;
      font-weight: normal;
      font-size: 16px;
      line-height: 22px;
      color: #9a9a9a;
    }
  }

  &__button {
    width: 33px;
    height: 33px;
    border: 0.8px solid #9a9a9a;
    box-sizing: border-box;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    border-radius: 50%;
    margin-left: 12px;
  }
}
.content {
  width: 816px;
  padding: 22px 28px 28px 18px;
  display: flex;
  flex-wrap: wrap;
  justify-content: flex-start;
  &-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    cursor: pointer;
    margin-left: 10px;
    margin-bottom: 12px;
    border-radius: 30px;
    padding: 9px 8px 10px 10px;
    img {
      margin-left: 10px;
      width: 20px;
    }
  }
}
</style>

<style lang="scss">
.slick-slide {
  user-drag: none;
  user-select: none;
  -moz-user-select: none;
  -webkit-user-drag: none;
  -webkit-user-select: none;
  -ms-user-select: none;
  div:focus {
    outline: none !important;
  }
  div img:focus {
    outline: none !important;
  }
}
</style>

<style lang="scss" scoped>
.profile {
  display: flex;

  &__button {
    width: 185px;
    height: 40px;
    color: #565656;
    box-sizing: border-box;
    border-radius: 30px;
    font-family: Open Sans;
    font-style: normal;
    font-weight: 600;
    font-size: 14px;
    line-height: 19px;
    border: none;
    background: #fff;
    cursor: pointer;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: opacity 0.125s;
    color: #3b1196;
    border: 2px solid #3b1196 !important;
    &:hover {
      opacity: 0.9;
    }
    &.active {
      color: #a396be;
      border: 2px solid #3b1196 !important;
    }
    &--gray {
      background: #e8e8e8;
      color: #6f6f6f;
      margin: 20px auto;
      text-align: center;
    }
    &--left {
      margin: 20px 0;
    }
  }
}
</style>
