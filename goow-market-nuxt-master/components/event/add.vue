<template>
  <div class="event">
    <div class="event__item">
      <div
        class="event__item-title"
        @click="$nuxt.$emit('open-eventadd-modal')"
      >
        <a
          class="event__item-button event__item-button--add"
          target="_blank"
        ></a>
        <p>Ajouter un évenement</p>
      </div>
      <p class="event__item-text">description...</p>
    </div>
  </div>
</template>
<style lang="scss" scoped>
.event {
  width: fit-content !important;
  max-width: 240px;
  min-width: 200px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
  margin: 0 10px 16px 10px;
  border-bottom-left-radius: 12px;
  border-bottom-right-radius: 12px;

  &__title {
    font-family: Open Sans;
    font-style: normal;
    font-weight: 600;
    font-size: 25px;
    line-height: 34px;
    color: #565656;
  }

  &__item {
    width: 100%;
    height: 131px;
    overflow: hidden;
    position: relative;
    &-button {
      margin-left: 10px;
      margin-top: 10px;
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
  }

  &__item-title {
    font-family: Open Sans;
    font-style: normal;
    font-weight: bold;
    font-size: 14px;
    line-height: 19px;
    font-weight: 600;
    color: #565656;
    background: #e8e8e8;
    border-top-left-radius: 12px;
    border-top-right-radius: 12px;
    cursor: pointer;
    padding: 10px 20px;
    p {
      margin-left: 30px;
    }
  }

  &__item-text {
    width: 100%;
    height: 70px;
    font-family: Open Sans;
    font-style: normal;
    font-weight: 400;
    font-size: 14px;
    line-height: 19px;
    color: #9a9a9a;
    opacity: 0.4;
    padding: 10px 30px;
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 3;
  }
}
</style>
