<template>
  <div class="merchant-item__wrap">
    <div class="merchant-item">
      <div class="merchant-item__button-wrap">
        <a
          class="merchant-item__button merchant-item__button--add"
          target="_blank"
          @click="$nuxt.$emit('open-add-modal')"
        >
        </a>
        <p class="merchant-item__span">Ajouter un produit</p>
      </div>
      <div class="merchant-item__data">
        <div class="merchant-item__title-category">
          <a class="merchant-item__title">Nom produit</a>
          <p class="merchant-item__subtitle">Quantité</p>
          <p class="merchant-item__price">Prix</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {}
  },
}
</script>

<style lang="scss" scoped>
.merchant-item {
  width: 100%;
  height: 292px;
  overflow: hidden;
  background: #ffffff;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
  border-radius: 30px;
  margin: 0 auto;

  &:focus {
    outline: none !important;
  }

  &__button-wrap {
    width: 100%;
    height: 197px;
    border-radius: 30px;
    overflow: hidden;
    position: relative;
    background: #e8e8e8;
  }

  &__button {
    width: 64px;
    height: 64px;
    display: flex;
    justify-content: center;
    align-items: center;
    border: 1.5px solid #6e6e6e;
    border-radius: 50%;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    cursor: pointer;

    &--add {
      &:before {
        content: '';
        width: 1px;
        height: 26px;
        position: absolute;
        top: 50%;
        left: 50%;
        border-right: 1.5px solid #6e6e6e;
        transform: translate(-50%, -50%);
      }

      &:after {
        content: '';
        width: 26px;
        height: 1px;
        position: absolute;
        top: 50%;
        left: 50%;
        border-top: 1.5px solid #6e6e6e;
        transform: translate(-50%, -50%);
      }
    }
  }

  &__span {
    font-family: Open Sans;
    font-style: normal;
    font-weight: 600;
    font-size: 14px;
    line-height: 16px;
    color: #6f6f6f;
    display: flex;
    justify-content: center;
    position: absolute;
    top: 75%;
    left: 50%;
    transform: translate(-50%, -50%);
  }

  &__data {
    width: 100%;
    padding: 0 20px;
    position: relative;
    display: flex;
    align-items: center;
  }

  &__title-category {
    width: calc(100% - 80px);
  }

  &__title {
    font-family: Open Sans;
    font-style: normal;
    font-weight: 600;
    font-size: 16px;
    line-height: 22px;
    color: #9a9a9a;
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

  &__price {
    font-family: Open Sans;
    font-style: normal;
    font-weight: 600;
    font-size: 16px;
    line-height: 22px;
    color: #9a9a9a;
    margin-top: 8px;
  }
}
</style>
