<template>
  <a class="merchant-item__wrap" @click="addMerchant">
    <div class="merchant-item">
      <div class="merchant-item__image-wrap">
        <div>
          <svg
            width="110"
            height="110"
            viewBox="0 0 110 110"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M0.749984 55C0.749992 25.0385 25.0386 0.750008 55 0.750016C84.9615 0.750024 109.25 25.0386 109.25 55C109.25 84.9615 84.9614 109.25 55 109.25C25.0385 109.25 0.749976 84.9614 0.749984 55Z"
              stroke="#6E6E6E"
              stroke-width="1.5"
            />
            <path
              d="M79 56L33 56"
              stroke="#6E6E6E"
              stroke-width="1.5"
              stroke-linecap="round"
            />
            <path
              d="M56 77L56 33"
              stroke="#6E6E6E"
              stroke-width="1.5"
              stroke-linecap="round"
            />
          </svg>
          <p>Ajouter un Marchand</p>
        </div>
      </div>
      <div class="merchant-item__data">
        <div class="merchant-item__title-category">
          <a class="merchant-item__title">Title</a>
          <p class="merchant-item__subtitle">Title</p>
        </div>
        <!--
        <div class="merchant-item__grid">
          <div>
            <img
              class="merchant-item__icon"
              src="/icons/round-pushpin_1f4cd 7.svg"
            />
            <p>Distance</p>
          </div>
          <div>
            <img
              class="merchant-item__icon"
              src="/icons/3acf7049fa43017b1c8754cbedf14a04 10.svg"
            />
            <p>Livraison</p>
          </div>
          <div>
            <img class="merchant-item__icon" src="/icons/image 12.svg" />
            <p>Retrait</p>
          </div>
        </div>
        -->
      </div>
    </div>
  </a>
</template>

<script>
export default {
  methods: {
    addMerchant() {
      this.$router.push({
        name: 'profile-merchants',
        params: { addFormActive: true },
      })
    },
  },
}
</script>

<style lang="scss" scoped>
.merchant-item {
  width: 100%;
  height: 270px;
  overflow: hidden;
  background: #ffffff;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
  border-radius: 30px;
  margin: 0 auto;
  cursor: pointer;

  &:focus {
    outline: none !important;
  }

  &__wrap {
    width: auto;
    transition: opacity 0.1s;
    &:hover {
      opacity: 0.7;
    }
  }

  &__top {
    width: 100%;
    display: flex;
    position: absolute;
    top: 0;
    left: 0;
    padding: 15px;
  }

  &__like {
    margin-left: auto;
    cursor: pointer;
    &.active {
      background: #fff;
    }
  }

  &__tag {
    width: 97px;
    height: 27px;
    background: rgba(0, 0, 0, 0.6);
    border-radius: 15px;
    display: flex;
    justify-content: center;
    align-items: center;

    span {
      width: 9px;
      height: 9px;
      border-radius: 50%;
      background: #4caf50;
      margin-right: 4px;
    }

    p {
      font-family: Open Sans;
      font-style: normal;
      font-weight: 600;
      font-size: 14px;
      line-height: 19px;
      color: #4caf50;
      margin-left: 4px;
    }

    &--red {
      color: #e93f5e;

      span {
        background: #e93f5e;
      }

      p {
        color: #e93f5e;
      }
    }
  }

  &__image-wrap {
    width: 100%;
    height: 197px;
    border-radius: 30px;
    overflow: hidden;
    position: relative;
    background: #e8e8e8;
    display: flex;
    justify-content: center;
    align-items: center;
    p {
      font-family: Open Sans;
      font-style: normal;
      font-weight: normal;
      font-size: 12px;
      line-height: 16px;
      color: #6f6f6f;
    }
  }

  &__image {
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
    user-drag: none;
    user-select: none;
    -moz-user-select: none;
    -webkit-user-drag: none;
    -webkit-user-select: none;
    -ms-user-select: none;
    object-fit: cover;
  }

  &__data {
    width: 100%;
    padding: 0 20px;
    position: relative;
  }

  &__category-icon {
    width: 53px;
    height: 53px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    position: absolute;
    right: 16px;
    bottom: 42px;
    background: #e8e8e8;
    border: 1px solid #ffffff;
    box-sizing: border-box;
    box-shadow: 0 6px 4px rgba(0, 0, 0, 0.05);
  }

  &__title-category {
    width: calc(100% - 80px);
    opacity: 0.4;
  }

  &__title {
    font-family: Open Sans;
    font-style: normal;
    font-weight: 600;
    font-size: 16px;
    line-height: 22px;
    color: #2c2c2c;
    margin: 4px 0 2px 0;
    display: block;
    text-decoration: none;
  }

  &__subtitle {
    font-family: Open Sans;
    font-style: normal;
    font-weight: 600;
    font-size: 12px;
    line-height: 16px;
    color: #9a9a9a;
  }

  &__grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    justify-content: center;
    margin-top: 4px;
    opacity: 0.4;

    div {
      display: flex;
      align-items: center;
    }

    p {
      font-family: Open Sans;
      font-style: normal;
      font-weight: normal;
      font-size: 12px;
      line-height: 16px;
      color: #9a9a9a;
      margin-left: 8px;
    }
  }

  &__icon {
    height: 20px;
  }
}
</style>
