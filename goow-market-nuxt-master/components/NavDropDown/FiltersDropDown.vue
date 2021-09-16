<template>
  <div v-observe-visibility="visibilityChanged" class="filters">
    <div class="filters__title">Plus de filtres</div>
    <div class="filters__filter-title">Spécialité</div>
    <div class="filters__speciality">
      <div class="filters__speciality-item">Biologique 🌱</div>
      <div class="filters__speciality-item">Biologique 🌱</div>
    </div>
    <div class="filters__filter-title">Date et Horaire</div>
    <div class="filters__date-wrap">
      <div class="filters__date">
        <div
          :class="date === todaysDate ? 'selected' : ''"
          class="filters__date-item"
          @click="date = todaysDate"
        >
          Aujourd’hui
        </div>
        <div
          :class="date === tomorrowsDate ? 'selected' : ''"
          class="filters__date-item"
          @click="date = tomorrowsDate"
        >
          Demain
        </div>
        <no-ssr>
          <datepicker
            v-model="date"
            class="filters__date-calendar"
          ></datepicker>
          <div class="filters__date-svg">
            <svg
              width="16"
              height="18"
              viewBox="0 0 16 18"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M1.53143 2.10401H1.98857C2.12571 2.10401 2.21714 2.0105 2.21714 1.87024C2.21714 1.72998 2.12571 1.63647 1.98857 1.63647H1.53143C0.685714 1.63647 0 2.33777 0 3.20271V16.4339C0 17.2988 0.685714 18.0001 1.53143 18.0001H14.4686C15.3143 18.0001 16 17.2988 16 16.4339V3.20271C16 2.33777 15.3143 1.63647 14.4686 1.63647H13.9429C13.8057 1.63647 13.7143 1.72998 13.7143 1.87024C13.7143 2.0105 13.8057 2.10401 13.9429 2.10401H14.4686C15.0629 2.10401 15.5429 2.59492 15.5429 3.20271V6.07803H0.457143V3.20271C0.457143 2.59492 0.937143 2.10401 1.53143 2.10401ZM15.5429 6.54557V16.4339C15.5429 17.0417 15.0629 17.5326 14.4686 17.5326H1.53143C0.937143 17.5326 0.457143 17.0417 0.457143 16.4339V6.54557H15.5429Z"
                fill="black"
                fill-opacity="0.4"
              />
              <path
                d="M5.09717 1.87024C5.09717 2.0105 5.1886 2.10401 5.32574 2.10401H10.6515C10.7886 2.10401 10.88 2.0105 10.88 1.87024C10.88 1.72998 10.7886 1.63647 10.6515 1.63647H5.32574C5.21145 1.63647 5.09717 1.72998 5.09717 1.87024Z"
                fill="black"
                fill-opacity="0.4"
              />
              <path
                d="M2.97136 10.987H4.11422C4.50279 10.987 4.79993 10.6831 4.79993 10.2857V9.11683C4.79993 8.71942 4.50279 8.41553 4.11422 8.41553H2.97136C2.58279 8.41553 2.28564 8.71942 2.28564 9.11683V10.2857C2.28564 10.6831 2.58279 10.987 2.97136 10.987ZM2.74279 9.11683C2.74279 8.97657 2.83422 8.88306 2.97136 8.88306H4.11422C4.25136 8.88306 4.34279 8.97657 4.34279 9.11683V10.2857C4.34279 10.4259 4.25136 10.5194 4.11422 10.5194H2.97136C2.83422 10.5194 2.74279 10.4259 2.74279 10.2857V9.11683Z"
                fill="black"
                fill-opacity="0.4"
              />
              <path
                d="M7.31413 10.987H8.45699C8.84556 10.987 9.1427 10.6831 9.1427 10.2857V9.11683C9.1427 8.71942 8.84556 8.41553 8.45699 8.41553H7.31413C6.92556 8.41553 6.62842 8.71942 6.62842 9.11683V10.2857C6.62842 10.6831 6.92556 10.987 7.31413 10.987ZM7.08556 9.11683C7.08556 8.97657 7.17699 8.88306 7.31413 8.88306H8.45699C8.59413 8.88306 8.68556 8.97657 8.68556 9.11683V10.2857C8.68556 10.4259 8.59413 10.5194 8.45699 10.5194H7.31413C7.17699 10.5194 7.08556 10.4259 7.08556 10.2857V9.11683Z"
                fill="black"
                fill-opacity="0.4"
              />
              <path
                d="M11.6569 10.987H12.7998C13.1883 10.987 13.4855 10.6831 13.4855 10.2857V9.11683C13.4855 8.71942 13.1883 8.41553 12.7998 8.41553H11.6569C11.2683 8.41553 10.9712 8.71942 10.9712 9.11683V10.2857C10.9712 10.6831 11.2683 10.987 11.6569 10.987ZM11.4283 9.11683C11.4283 8.97657 11.5198 8.88306 11.6569 8.88306H12.7998C12.9369 8.88306 13.0283 8.97657 13.0283 9.11683V10.2857C13.0283 10.4259 12.9369 10.5194 12.7998 10.5194H11.6569C11.5198 10.5194 11.4283 10.4259 11.4283 10.2857V9.11683Z"
                fill="black"
                fill-opacity="0.4"
              />
              <path
                d="M2.97136 15.4286H4.11422C4.50279 15.4286 4.79993 15.1247 4.79993 14.7273V13.5585C4.79993 13.1611 4.50279 12.8572 4.11422 12.8572H2.97136C2.58279 12.8572 2.28564 13.1611 2.28564 13.5585V14.7273C2.28564 15.1247 2.58279 15.4286 2.97136 15.4286ZM2.74279 13.5585C2.74279 13.4182 2.83422 13.3247 2.97136 13.3247H4.11422C4.25136 13.3247 4.34279 13.4182 4.34279 13.5585V14.7273C4.34279 14.8676 4.25136 14.9611 4.11422 14.9611H2.97136C2.83422 14.9611 2.74279 14.8676 2.74279 14.7273V13.5585Z"
                fill="black"
                fill-opacity="0.4"
              />
              <path
                d="M7.31413 15.4286H8.45699C8.84556 15.4286 9.1427 15.1247 9.1427 14.7273V13.5585C9.1427 13.1611 8.84556 12.8572 8.45699 12.8572H7.31413C6.92556 12.8572 6.62842 13.1611 6.62842 13.5585V14.7273C6.62842 15.1247 6.92556 15.4286 7.31413 15.4286ZM7.08556 13.5585C7.08556 13.4182 7.17699 13.3247 7.31413 13.3247H8.45699C8.59413 13.3247 8.68556 13.4182 8.68556 13.5585V14.7273C8.68556 14.8676 8.59413 14.9611 8.45699 14.9611H7.31413C7.17699 14.9611 7.08556 14.8676 7.08556 14.7273V13.5585Z"
                fill="black"
                fill-opacity="0.4"
              />
              <path
                d="M11.6569 15.4286H12.7998C13.1883 15.4286 13.4855 15.1247 13.4855 14.7273V13.5585C13.4855 13.1611 13.1883 12.8572 12.7998 12.8572H11.6569C11.2683 12.8572 10.9712 13.1611 10.9712 13.5585V14.7273C10.9712 15.1247 11.2683 15.4286 11.6569 15.4286ZM11.4283 13.5585C11.4283 13.4182 11.5198 13.3247 11.6569 13.3247H12.7998C12.9369 13.3247 13.0283 13.4182 13.0283 13.5585V14.7273C13.0283 14.8676 12.9369 14.9611 12.7998 14.9611H11.6569C11.5198 14.9611 11.4283 14.8676 11.4283 14.7273V13.5585Z"
                fill="black"
                fill-opacity="0.4"
              />
              <path
                d="M11.4287 0.701299V3.03896C11.4287 3.43636 11.7259 3.74026 12.1144 3.74026H12.5716C12.9601 3.74026 13.2573 3.43636 13.2573 3.03896V0.701299C13.2573 0.303896 12.9601 0 12.5716 0H12.1144C11.7259 0 11.4287 0.303896 11.4287 0.701299ZM12.8001 0.701299V3.03896C12.8001 3.17922 12.7087 3.27273 12.5716 3.27273H12.1144C11.9773 3.27273 11.8859 3.17922 11.8859 3.03896V0.701299C11.8859 0.561039 11.9773 0.467532 12.1144 0.467532H12.5716C12.7087 0.467532 12.8001 0.561039 12.8001 0.701299Z"
                fill="black"
                fill-opacity="0.4"
              />
              <path
                d="M3.88553 3.74026C4.2741 3.74026 4.57125 3.43636 4.57125 3.03896V0.701299C4.57125 0.303896 4.2741 0 3.88553 0H3.42839C3.03982 0 2.74268 0.303896 2.74268 0.701299V3.03896C2.74268 3.43636 3.03982 3.74026 3.42839 3.74026H3.88553ZM3.19982 3.03896V0.701299C3.19982 0.561039 3.29125 0.467532 3.42839 0.467532H3.88553C4.02268 0.467532 4.1141 0.561039 4.1141 0.701299V3.03896C4.1141 3.17922 4.02268 3.27273 3.88553 3.27273H3.42839C3.29125 3.27273 3.19982 3.17922 3.19982 3.03896Z"
                fill="black"
                fill-opacity="0.4"
              />
            </svg>
          </div>
        </no-ssr>
      </div>
      <no-ssr>
        <vue-range-slider
          v-if="isVisible"
          v-model="time"
          formatter="{value}:00"
          tooltip-dir="bottom"
          :min="1"
          :max="24"
          :bg-style="{
            backgroundColor: '#EDEDED',
          }"
          :tooltip-style="{
            color: '#3B1196',
            backgroundColor: 'rgba(0, 0, 0, 0)',
            borderColor: 'rgba(0, 0, 0, 0)',
          }"
          :process-style="{
            backgroundColor: '#3B1196',
          }"
        ></vue-range-slider>
      </no-ssr>
    </div>
    <!--    <div class="filters__filter-title">Livraison</div>-->
    <!--    <div class="filters__delivery">-->
    <!--      <div class="filters__delivery-item">-->
    <!--        <input-->
    <!--          id="retrait"-->
    <!--          v-model="delivery"-->
    <!--          type="checkbox"-->
    <!--          value="retrait"-->
    <!--        />-->
    <!--        <label for="retrait">Retrait</label>-->
    <!--      </div>-->
    <!--      <div class="filters__delivery-item">-->
    <!--        <input-->
    <!--          id="click&collect"-->
    <!--          v-model="delivery"-->
    <!--          type="checkbox"-->
    <!--          value="click&collect"-->
    <!--        />-->
    <!--        <label for="click&collect">Click & Collect</label>-->
    <!--      </div>-->
    <!--      <div class="filters__delivery-item">-->
    <!--        <input-->
    <!--          id="livraison"-->
    <!--          v-model="delivery"-->
    <!--          type="checkbox"-->
    <!--          value="livraison"-->
    <!--        />-->
    <!--        <label for="livraison">Livraison</label>-->
    <!--      </div>-->
    <!--    </div>-->
    <div class="filters__footer">
      <div class="filters__footer-reset">Tout effacer</div>
      <div class="filters__footer-btn" @click="filter()">
        Affiche plus 500 marchés
      </div>
    </div>
  </div>
</template>

<script>
import 'vue-range-component/dist/vue-range-slider.css'

export default {
  name: 'FiltersDropDown',
  data() {
    return {
      time: [1, 24],
      isVisible: false,
      date: null,
      delivery: [],
      todaysDate: new Date(),
      tomorrowsDate: this.$moment().add(1, 'day').toDate(),
    }
  },
  methods: {
    visibilityChanged(isVisible, entry) {
      this.isVisible = isVisible
    },
    filter() {
      this.$nuxt.$emit('filterChanged', {
        filterName: 'dateTimeDelivery',
        value: {
          time: this.time,
          date: this.date,
          delivery: this.delivery,
        },
      })
    },
  },
}
</script>
<style lang="scss">
.vdp-datepicker {
  input {
    font-family: Open Sans;
    font-style: normal;
    font-weight: normal;
    font-size: 14px;
    line-height: 19px;
    width: 123px;
    height: 43px;
    border: none;
    background: rgba(196, 196, 196, 0.13);
    border-radius: 5px;
    color: #9a9a9a;
    padding-left: 24px;
    cursor: pointer;
  }
}
</style>
<style scoped lang="scss">
.selected {
  border: 1px solid #3b1099 !important;
  color: #3b1099;
}
.filters {
  width: 630px;
  height: 600px;
  padding: 24px 43px 40px 35px;
  &__title {
    font-family: Montserrat;
    font-style: normal;
    font-weight: 600;
    font-size: 30px;
    line-height: 37px;
    color: black;
    padding-bottom: 7px;
    border-bottom: 1px solid #e4e4e4;
  }
  &__filter {
    &-title {
      font-family: Montserrat;
      font-style: normal;
      font-weight: 600;
      font-size: 18px;
      color: black;
      margin-top: 11px;
    }
  }
  &__speciality {
    margin-top: 15px;
    padding-bottom: 35px;
    border-bottom: 1px solid #e4e4e4;
    display: flex;
    align-items: center;
    flex-direction: row;
    cursor: pointer;
    &-item {
      text-align: center;
      line-height: 39px;
      margin-right: 12px;
      width: 150px;
      height: 39px;
      background: rgba(30, 193, 115, 0.2);
      border-radius: 30px;
    }
  }
  &__date {
    display: flex;
    align-items: center;
    flex-direction: row;
    margin-bottom: 20px;
    &-svg {
      background: rgba(196, 196, 196, 0.13);
      border-radius: 5px;
      height: 43px;
      width: 30px;
      display: flex;
      align-items: center;
    }
    &-item {
      text-align: center;
      line-height: 39px;
      cursor: pointer;
      width: 150px;
      height: 39px;
      border: 1px solid #c4c4c4;
      margin-right: 18px;
      box-sizing: border-box;
      border-radius: 30px;
    }
    &-wrap {
      margin-top: 15px;
      padding-bottom: 45px;
      border-bottom: 1px solid #e4e4e4;
    }
  }
  &__delivery {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: space-between;
    width: 80%;
    margin-top: 23px;
    &-item {
      cursor: pointer;
    }
  }
  &__footer {
    margin-top: 80px;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
    &-reset {
      font-family: Open Sans;
      font-style: normal;
      font-weight: 600;
      font-size: 14px;
      line-height: 19px;
      color: #2c2c2c;
      cursor: pointer;
    }
    &-btn {
      cursor: pointer;
      text-align: center;
      line-height: 18px;
      color: white;
      background: #3b1099;
      border-radius: 30px;
      padding: 8px 25px 10px 25px;
    }
  }
}
</style>
