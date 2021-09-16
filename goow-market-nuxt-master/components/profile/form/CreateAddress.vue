<template>
  <div class="box active">
    <div class="box__wrap">
      <div class="box__bottom">
        <div :class="[!active ? 'active' : '']" class="box__small"></div>
        <div :class="[active ? 'active' : '']" class="box__big">
          <form class="form" @submit.prevent="submit">
            <div class="form__inline">
              <div class="form__group">
                <label class="form__label">
                  Ville
                  <input
                    v-model="formData.city"
                    class="form__input"
                    type="text"
                    placeholder="ville"
                    @input="errors.clear('city')"
                  />
                </label>
                <p v-if="errors.has('city')" class="form__error">
                  {{ errors.get('city') }}
                </p>
              </div>
              <div class="form__group">
                <label class="form__label">
                  Code Postal
                  <input
                    v-model="formData.postal_code"
                    class="form__input"
                    type="number"
                    placeholder="Postal code"
                    @input="errors.clear('postal_code')"
                  />
                </label>
                <p v-if="errors.has('postal_code')" class="form__error">
                  {{ errors.get('postal_code') }}
                </p>
              </div>
            </div>

            <div class="form__group">
              <label class="form__label">
                Address
                <input
                  v-model="formData.address"
                  class="form__input"
                  type="text"
                  placeholder="Address"
                  @input="errors.clear('address')"
                />
              </label>
              <p v-if="errors.has('address')" class="form__error">
                {{ errors.get('address') }}
              </p>
            </div>

            <div class="form__inline">
              <div class="form__group">
                <button class="form__button" type="submit">Valider</button>
              </div>
            </div>
          </form>
          <GmapMap
            :center="{
              lat: parseFloat(formData.latitude),
              lng: parseFloat(formData.longitude),
            }"
            :zoom="16"
            :options="options"
            class="form__map"
            @click="mark"
          >
            <GmapMarker
              :position="{
                lat: parseFloat(formData.latitude),
                lng: parseFloat(formData.longitude),
              }"
              :clickable="true"
              :icon.sync="marker"
            />
          </GmapMap>
        </div>
      </div>
    </div>
    <a
      :class="[active ? 'active' : '']"
      class="box__open"
      @click="active = !active"
    >
      <svg
        width="16"
        height="10"
        viewBox="0 0 16 10"
        fill="none"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path
          d="M15 9L8 1L1 9"
          stroke="#9A9A9A"
          stroke-width="1.5"
          stroke-linecap="round"
          stroke-linejoin="round"
        />
      </svg>
    </a>
  </div>
</template>

<script>
export default {
  props: {
    user: {
      type: Object,
    },
  },
  data() {
    return {
      active: false,
      formData: {
        latitude: '48.916670348728786',
        longitude: '2.437289048671502',
      },
      addresses: [],
      marker: '/icons/marker.png',
      options: {
        zoomControl: false,
        mapTypeControl: false,
        scaleControl: false,
        streetViewControl: false,
        rotateControl: true,
        fullscreenControl: false,
        disableDefaultUI: false,
        styles: require('~/static/json/map.json'),
      },
    }
  },
  mounted() {
    this.$nuxt.$on('create-address-form', () => (this.active = true))
  },
  methods: {
    async submit() {
      try {
        await this.$axios.post('users/address', this.formData)
        this.formData.city = ''
        this.formData.postal_code = ''
        this.formData.address = ''
        this.active = false
        this.$nuxt.$emit('address-created')
      } catch (e) {
        this.errors.record(e.response.data.errors)
      }
    },
    mark(e) {
      this.formData.latitude = e.latLng.lat()
      this.formData.longitude = e.latLng.lng()
    },
  },
}
</script>

<style lang="scss" scoped>
.box {
  max-width: 716px;
  background: #ffffff;
  box-shadow: 0 6px 8px rgba(0, 0, 0, 0.1);
  border-radius: 10px;
  padding: 10px 37px 15px 22px;
  margin-bottom: 10px;
  display: flex;

  &__wrap {
    width: 100%;
    display: flex;
  }

  &__icons-wrap {
    margin-left: auto;
  }

  &__open {
    cursor: pointer;
    display: inline-table;
    transition: all 0.2s;
    margin-left: 25px;
    &.active {
      transform: rotateZ(180deg);
    }
  }

  &__top {
    width: 100%;
    display: flex;
    align-items: center;
  }

  &__bottom {
    width: 100%;
    display: block;
    align-items: center;
    margin-top: 20px;
    padding: 0 0 20px 0;
  }

  &__small {
    width: 100%;
    display: none;
    &.active {
      display: flex;
    }
  }

  &__big {
    width: 100%;
    display: none;
    &.active {
      display: block;
    }
  }

  &__merchant {
    font-family: Open Sans;
    font-style: normal;
    font-weight: normal;
    font-size: 14px;
    line-height: 19px;
    color: #9a9a9a;
    margin: 10px 0;
  }

  &__count {
    font-family: Open Sans;
    font-style: normal;
    font-weight: normal;
    font-size: 12px;
    line-height: 16px;
    text-transform: capitalize;
    color: #9a9a9a;
    &--bold {
      font-weight: 600;
      font-size: 14px;
      line-height: 19px;
      color: #565656;
    }
  }

  &__tag {
    background: #cfefe5;
    border-radius: 4px;
    padding: 2px 11px;
    font-family: Open Sans;
    font-style: normal;
    font-weight: 600;
    font-size: 12px;
    line-height: 16px;
    text-transform: capitalize;
    color: #1ec173;
    cursor: pointer;
    margin-left: 18px;
    span {
      margin-left: 4px;
    }
  }

  &__price {
    margin-left: auto;
    font-family: Open Sans;
    font-style: normal;
    font-weight: 600;
    font-size: 14px;
    line-height: 19px;
    text-transform: capitalize;
    color: #1ec173;
  }

  &__id {
    font-family: Open Sans;
    font-style: normal;
    font-weight: 600;
    font-size: 14px;
    line-height: 19px;
    text-transform: capitalize;
    color: #9a9a9a;
  }

  &__date {
    font-family: Open Sans;
    font-style: normal;
    font-weight: normal;
    font-size: 12px;
    line-height: 16px;
    text-transform: capitalize;
    color: #c4c4c4;
    margin-left: auto;
  }

  &__quantity {
    font-family: Open Sans;
    font-style: normal;
    font-weight: 600;
    font-size: 14px;
    line-height: 0;
    color: #565656;
    margin-right: 7px;
  }

  &__image {
    width: 47px;
    height: 47px;
    border-radius: 50%;
    margin-right: 11px;
    object-fit: cover;
  }

  &__product {
    font-family: Open Sans;
    font-style: normal;
    font-weight: 600;
    font-size: 12px;
    line-height: 16px;
    color: #2c2c2c;
  }

  &__unit {
    font-family: Open Sans;
    font-style: normal;
    font-weight: normal;
    font-size: 12px;
    line-height: 16px;
    color: #9a9a9a;
  }

  &__product-price {
    font-family: Open Sans;
    font-style: normal;
    font-weight: normal;
    font-size: 12px;
    line-height: 16px;
    color: #2b2b2b;
    margin-left: auto;
  }

  &__product-items {
    border-bottom: 1px solid #e1e1e1;
    margin-bottom: 10px;
  }

  &__product-item {
    width: 100%;
    display: flex;
    align-items: center;
    margin-bottom: 12px;
  }

  &__info {
    display: flex;
  }

  &__info-left {
    width: 50%;
    text-align: left;
    p {
      font-family: Open Sans;
      font-style: normal;
      font-weight: normal;
      font-size: 12px;
      line-height: 16px;
      text-transform: capitalize;
      color: #c4c4c4;
    }
  }

  &__info-right {
    width: 50%;
    text-align: right;
    p {
      font-family: Open Sans;
      font-style: normal;
      font-weight: normal;
      font-size: 12px;
      line-height: 16px;
      text-transform: capitalize;
      color: #9a9a9a;
    }
    h1 {
      font-family: Open Sans;
      font-style: normal;
      font-weight: 600;
      font-size: 16px;
      line-height: 22px;
      text-transform: capitalize;
      color: #565656;
    }
  }
}

.form {
  width: 100%;

  &__inline {
    width: 100%;
    display: grid;
    grid-template-columns: 48% 48%;
    grid-gap: 4%;
  }

  &__label {
    font-family: Open Sans;
    font-style: normal;
    font-weight: normal;
    font-size: 14px;
    line-height: 19px;
    text-transform: capitalize;
    color: #d1d1d1;
    margin-bottom: 2px;
  }

  &__input {
    width: 100%;
    height: 39px;
    background: #f3f3f3;
    border-radius: 7px;
    padding: 10px 22px;
    font-family: Open Sans;
    font-style: normal;
    font-weight: normal;
    font-size: 14px;
    line-height: 19px;
    color: #9a9a9a;
    border: none;
    margin: 2px 0 16px 0;
    &::placeholder {
      opacity: 0.4;
    }
  }

  &__subtitle {
    font-family: Open Sans;
    font-style: normal;
    font-weight: 600;
    font-size: 14px;
    line-height: 19px;
    color: #565656;
    margin: 20px 0 8px 0;
  }

  &__activity {
    width: fit-content;
    max-width: 100%;
    height: 39px;
    padding: 0 24px;
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
    margin-bottom: 14px;
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

  &__error {
    font-family: Montserrat, serif;
    color: #ff3333;
    font-size: 13px;
    margin: -8px 0 4px 10px;
  }

  &__button {
    width: 270px;
    height: 36px;
    background: #3b1099;
    box-shadow: 0 6px 4px rgba(0, 0, 0, 0.05);
    border-radius: 30px;
    cursor: pointer;
    border: none;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: opacity 0.12s;
    margin: 15px 0 20px 0;
    font-family: Montserrat;
    font-style: normal;
    font-weight: 600;
    font-size: 14px;
    line-height: 17px;
    text-align: center;
    color: #ffffff;
    &:hover {
      opacity: 0.88;
    }
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
  }
}
</style>

<style lang="scss">
.vue-map-container {
  width: 100%;
  height: 238px;
  outline: none !important;
  &:focus {
    outline: none !important;
  }
}
</style>
