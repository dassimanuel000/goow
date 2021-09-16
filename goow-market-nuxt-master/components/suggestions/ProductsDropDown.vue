<template>
  <div class="content">
    <div>
      <input
        v-model="suggestionSearch"
        class="content__input"
        placeholder="Nom du produit *"
        type="text"
        @input="errors.clear('title')"
      />
    </div>
    <div v-if="isHidden" class="list">
      <div
        v-for="(product, index) in products"
        :key="`city_filter_${index}`"
        @click="handleProduct(product)"
      >
        <ul class="list__item">
          <div class="list__item-img">
            <img :src="$api_storage_url + product.image" />
          </div>
          <div class="list__item-title">
            <p>{{ product.title }}</p>
          </div>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'CityDropDownContent',
  props: ['activity'],
  data() {
    return {
      isHidden: false,
      products: [],
      choosenCity: null,
      suggestionSearch: '',
    }
  },
  watch: {
    suggestionSearch() {
      this.searchForSuggestion()
    },
    products() {
      if (this.products.length === 0) {
        if (this.suggestionSearch) {
          this.isHidden = false
          this.$nuxt.$emit('sendProductTitle', this.suggestionSearch)
        }
      }
    },
  },
  methods: {
    handleProduct(product) {
      this.suggestionSearch = product.title
      this.isHidden = false
      this.$nuxt.$emit('sendSuggestions', product)
    },
    searchForSuggestion() {
      this.$axios
        .get('product-suggestions/search', {
          params: {
            activity: this.activity,
            search_string: this.suggestionSearch,
          },
        })
        .then((res) => {
          this.isHidden = true
          this.products = res.data.productSuggestions
        })
    },
  },
}
</script>

<style lang="scss" scoped>
.content {
  width: 350px;
  padding-bottom: 19px;

  &__input {
    display: block;
    margin: 0 auto;
    width: 350px;
    height: 43px;
    box-sizing: border-box;
    border: none;
    border-radius: 7px;
    padding-left: 25px;
    margin-top: 14px;
    background: #f3f3f3;

    &::placeholder {
      /* Chrome, Firefox, Opera, Safari 10.1+ */
      font-family: Montserrat, serif;
      font-style: normal;
      font-weight: 300;
      font-size: 14px;
      line-height: 17px;
      color: #9a9a9a;
      opacity: 1; /* Firefox */
    }

    &:-ms-input-placeholder {
      /* Internet Explorer 10-11 */
      font-family: Montserrat, serif;
      font-style: normal;
      font-weight: 300;
      font-size: 14px;
      line-height: 17px;
      color: #9a9a9a;
    }

    &::-ms-input-placeholder {
      /* Microsoft Edge */
      font-family: Montserrat, serif;
      font-style: normal;
      font-weight: 300;
      font-size: 14px;
      line-height: 17px;
      color: #9a9a9a;
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
.list {
  margin-top: 5px;
  position: absolute;
  width: 350px;
  background: #ffffff;
  &__item {
    cursor: pointer;
    display: flex;
    height: 47.5px;
    border-bottom: solid 1px #565656;
    &-img {
      width: 45px;
      height: 45px;
      img {
        height: 100%;
        width: 100%;
        border-radius: 10px;
      }
    }
    &-title {
      width: 305px;
      height: 45px;
      p {
        text-align: center;
        margin: 15px 0px;
        font-family: Open Sans, serif;
        font-style: normal;
        font-weight: normal;
        font-size: 16px;
        line-height: 22px;
        color: #565656;
      }
    }
  }
  &__item:hover {
    background: #9a9a9a;
  }
  // &-item {
  //  cursor: pointer;
  //  margin-top: 10px;
  //  display: flex;
  //  justify-content: flex-start;
  //  align-items: center;
  //  &-icon {
  //   margin-left: 11px;
  //   margin-right: 17px;
  //  }
  //  &-text {
  //   font-family: Open Sans, serif;
  //   font-style: normal;
  //   font-weight: normal;
  //   font-size: 16px;
  //   line-height: 22px;

  //   color: #565656;
  //  }
  // }
}
</style>
