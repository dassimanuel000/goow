<template>
  <div class="category">
    <div class="category__item" @click="$nuxt.$emit('open-category-modal')">
      <div class="category__button">
        <a class="category__button category__button--add" target="_blank"></a>
      </div>
      <div class="category__title">
        <p>Ajouter une catégorie</p>
      </div>
    </div>
  </div>
</template>
<style lang="scss" scoped>
.category {
  display: flex;
  width: 250px;
  height: 40px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
  margin-bottom: 16px;
  border-radius: 30px;
  padding: 0 20px;
  justify-content: center;
  align-items: center;
  background: #e8e8e8;
  &__item {
    cursor: pointer;
    height: 100%;
    padding: 2.5px;
    display: flex;
  }
  &__button {
    width: 35px;
    height: 35px;
    display: flex;
    justify-content: center;
    align-items: center;
    position: absolute;
    &--add {
      &:before {
        content: '';
        width: 1px;
        height: 15px;
        position: absolute;
        top: 50%;
        left: 50%;
        border-right: 1.5px solid #6e6e6e;
        transform: translate(-50%, -50%);
      }

      &:after {
        content: '';
        width: 15px;
        height: 1px;
        position: absolute;
        top: 50%;
        left: 50%;
        border-top: 1.5px solid #6e6e6e;
        transform: translate(-50%, -50%);
      }
    }
  }
  &__title {
    font-family: Open Sans;
    font-style: normal;
    font-weight: 600;
    font-size: 14px;
    line-height: 16px;
    color: #565656;
    margin-left: 45px;
    display: flex;
    justify-content: center;
    align-items: center;
  }
}
</style>
