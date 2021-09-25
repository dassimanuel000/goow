<template>
  <div class="market">
    <ModalBox :active="modalBox.active">
      <div v-if="modalBox.model === 'DESCRIPTION'" class="edit-modal">
        <div class="edit-modal__header">
          <p class="edit-modal__title">Description</p>
        </div>
        <form @submit.prevent="updateDescription">
          <textarea
            v-model="formDataDesc.description"
            class="edit-modal__textarea"
            placeholder="600 caractéres maximum"
          ></textarea>
          <div v-if="errors.has('description')" class="edit-modal__error">
            La description doit contenir moins de 600 caractères.
          </div>
          <button class="edit-modal__submit" type="submit">Sauvegarder</button>
        </form>
      </div>

      <div v-if="modalBox.model === 'ADD_TIME'" class="time-modal">
        <div class="time-modal__header">
          <p class="time-modal__title">Horaires</p>
          <a target="_blank" @click="closeModal()">
            <svg
              width="17"
              height="17"
              viewBox="0 0 17 17"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M1 1L16 16"
                stroke="#C4C4C4"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
              <path
                d="M16 1L1 16"
                stroke="#C4C4C4"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
          </a>
        </div>
        <div class="time-modal__container">
          <div class="time-modal__date">
            <a target="_blank" class="time-modal__timeIcone">lun</a>
            <a target="_blank" class="time-modal__timeIcone">mar</a>
            <a target="_blank" class="time-modal__timeIcone">mer</a>
            <a target="_blank" class="time-modal__timeIcone">jeu</a>
            <a target="_blank" class="time-modal__timeIcone">ven</a>
            <a target="_blank" class="time-modal__timeIcone">sam</a>
            <a target="_blank" class="time-modal__timeIcone">dim</a>
          </div>
          <div class="time-modal__time">
            <select id="time" name="time" class="time-modal__select">
              <option value="00">00</option>
              <option value="01">01</option>
              <option value="02">02</option>
              <option value="03">03</option>
            </select>
          </div>
          <div class="time-modal__addTime">
            <button type="submit" class="time-modal__button">
              <svg
                width="14"
                height="14"
                viewBox="0 0 14 14"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M7 13L7 0.999999"
                  stroke="#6E6E6E"
                  stroke-width="1.5"
                  stroke-linecap="round"
                />
                <path
                  d="M1 7L13 7"
                  stroke="#6E6E6E"
                  stroke-width="1.5"
                  stroke-linecap="round"
                />
              </svg>
              Ajouter une plage horaire
            </button>
          </div>
        </div>
        <button type="submit" class="add-modal__form-button">
          Enregistrer
        </button>
      </div>

      <div v-if="modalBox.model === 'EVENT'" class="event-modal">
        <div class="event-modal__header">
          <p class="event-modal__title">
            {{ modalBox.data.title }}
          </p>
        </div>
        <div class="event-modal__container">
          <p class="event-modal__text">
            {{ modalBox.data.description }}
          </p>
        </div>
      </div>

      <div v-if="modalBox.model === 'ADD_EVENT'" class="edit-modal">
        <div v-if="!modalBox.data">
          <div class="edit-modal__header">
            <p class="edit-modal__title">Ajouter une annonce</p>
            <a target="_blank" @click="closeModal()">
              <svg
                width="17"
                height="17"
                viewBox="0 0 17 17"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M1 1L16 16"
                  stroke="#C4C4C4"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <path
                  d="M16 1L1 16"
                  stroke="#C4C4C4"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
            </a>
          </div>
          <form @submit.prevent="addEvent">
            <div class="edit-modal__group">
              <input
                v-model="formDataEvent.title"
                class="edit-modal__input"
                placeholder="Titre de l'évenement"
                @input="errors.clear('title')"
              />
              <div v-if="errors.has('title')" class="edit-modal__error">
                {{ errors.get('title') }}
              </div>
            </div>
            <div class="edit-modal__group">
              <textarea
                v-model="formDataEvent.description"
                class="edit-modal__textarea"
                placeholder="Déscription de l'évenement *"
                @input="errors.clear('description')"
              ></textarea>
              <div v-if="errors.has('description')" class="edit-modal__error">
                {{ errors.get('description') }}
              </div>
            </div>
            <button class="edit-modal__submit" type="submit">Ajouter</button>
          </form>
        </div>
        <div v-else>
          <div class="edit-modal__header">
            <p class="edit-modal__title">Modifier une annonce</p>
            <a target="_blank" @click="closeModal()">
              <svg
                width="17"
                height="17"
                viewBox="0 0 17 17"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M1 1L16 16"
                  stroke="#C4C4C4"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <path
                  d="M16 1L1 16"
                  stroke="#C4C4C4"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
            </a>
          </div>
          <form @submit.prevent="updateEvent">
            <div class="edit-modal__group">
              <input
                v-model="modalBox.data.title"
                class="edit-modal__input"
                placeholder="Titre de l'évenement"
                @input="errors.clear('title')"
              />
              <div v-if="errors.has('title')" class="edit-modal__error">
                {{ errors.get('title') }}
              </div>
            </div>
            <div class="edit-modal__group">
              <textarea
                v-model="modalBox.data.description"
                class="edit-modal__textarea"
                placeholder="Déscription de l'évenement *"
                @input="errors.clear('description')"
              ></textarea>
              <div v-if="errors.has('description')" class="edit-modal__error">
                {{ errors.get('description') }}
              </div>
            </div>
            <button class="edit-modal__submit" type="submit">Modifier</button>
          </form>
        </div>
      </div>
    </ModalBox>
    <div :class="{ active: workingTimeModal.active }" class="working-time">
      <div id="working-time-container" class="working-time__container">
        <div
          v-if="
            !workingTimeModal.dropdown.first &&
            !workingTimeModal.dropdown.second
          "
          class="description-modal"
        >
          <div class="description-modal__header">
            <p class="description-modal__title">Horaires</p>
            <a target="_blank" @click="workingTimeModal.active = false">
              <svg
                width="17"
                height="17"
                viewBox="0 0 17 17"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M1 1L16 16"
                  stroke="#C4C4C4"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <path
                  d="M16 1L1 16"
                  stroke="#C4C4C4"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
            </a>
          </div>
          <div class="description-modal__container">
            <div class="working-time__row">
              <a
                v-for="(item, index) in days"
                :key="index"
                :class="[
                  workingTimeForm.days.findIndex((i) => i === item.value) !== -1
                    ? 'active'
                    : '',
                ]"
                class="working-time__item"
                @click="selectDay(item)"
                >{{ item.key }}</a
              >
            </div>
            <a
              class="working-time__select"
              @click="workingTimeModal.dropdown.first = true"
            >
              {{ workingTimeForm.hours_start | formatTime }} -
              {{ workingTimeForm.hours_end | formatTime }}
              <svg
                width="16"
                height="10"
                viewBox="0 0 16 10"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M0.999999 1L8 9L15 1"
                  stroke="#9A9A9A"
                  stroke-width="1.5"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
            </a>
            <br />
            <br />
            <br />
            <div class="working-time__row">
              <a
                v-for="(item, index) in days"
                :key="index"
                :class="[
                  workingTimeForm2.days.findIndex((i) => i === item.value) !==
                  -1
                    ? 'active'
                    : '',
                ]"
                class="working-time__item"
                @click="selectDay2(item)"
                >{{ item.key }}</a
              >
            </div>
            <a
              class="working-time__select"
              @click="workingTimeModal.dropdown.second = true"
            >
              {{ workingTimeForm2.hours_start | formatTime }} -
              {{ workingTimeForm2.hours_end | formatTime }}
              <svg
                width="16"
                height="10"
                viewBox="0 0 16 10"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M0.999999 1L8 9L15 1"
                  stroke="#9A9A9A"
                  stroke-width="1.5"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
            </a>
            <button class="working-time__submit" @click="submitWorkingTime">
              Enregister
            </button>
          </div>
        </div>
        <div
          v-else-if="workingTimeModal.dropdown.first"
          class="description-modal"
        >
          <div class="description-modal__header">
            <a
              class="description-modal__title"
              style="
                width: 100px;
                background-color: #3b1099;
                border-radius: 10px;
                color: white;
                height: 25px;
                align-items: center;
              "
              @click="workingTimeModal.dropdown.first = false"
            >
              <svg
                style="margin-left: 10px"
                width="10"
                height="16"
                viewBox="0 0 10 16"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M9 1L1 8L9 15"
                  stroke="white"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
              <span style="margin-left: 20px">Valider</span>
            </a>
            <a target="_blank" @click="workingTimeModal.active = false">
              <svg
                width="17"
                height="17"
                viewBox="0 0 17 17"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M1 1L16 16"
                  stroke="#C4C4C4"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <path
                  d="M16 1L1 16"
                  stroke="#C4C4C4"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
            </a>
          </div>
          <div class="description-modal__container">
            <p class="description-modal__subtitle">Ouvert à</p>
            <smooth-picker :data="smoothPicker" :change="selectStartTime" />
            <p class="description-modal__subtitle">Fermé à</p>
            <smooth-picker :data="smoothPicker" :change="selectEndTime" />
          </div>
        </div>
        <div
          v-else-if="workingTimeModal.dropdown.second"
          class="description-modal"
        >
          <div class="description-modal__header">
            <a
              class="description-modal__title"
              style="
                width: 100px;
                background-color: #3b1099;
                border-radius: 10px;
                color: white;
                height: 25px;
                align-items: center;
              "
              @click="workingTimeModal.dropdown.second = false"
            >
              <svg
                style="margin-left: 10px"
                width="10"
                height="16"
                viewBox="0 0 10 16"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M9 1L1 8L9 15"
                  stroke="#C4C4C4"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
              <span style="margin-left: 20px">Valider</span>
            </a>
            <a target="_blank" @click="workingTimeModal.active = false">
              <svg
                width="17"
                height="17"
                viewBox="0 0 17 17"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M1 1L16 16"
                  stroke="#C4C4C4"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <path
                  d="M16 1L1 16"
                  stroke="#C4C4C4"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
            </a>
          </div>
          <div class="description-modal__container">
            <p class="description-modal__subtitle">Ouvert à</p>
            <smooth-picker
              :data="smoothPicker"
              :change="selectStartTimeSecond"
            />
            <p class="description-modal__subtitle">Fermé à</p>
            <smooth-picker :data="smoothPicker" :change="selectEndTimeSecond" />
          </div>
        </div>
      </div>
    </div>
    <div class="market__header">
      <p class="market__title">{{ market.title }}</p>
    </div>
    <div class="market__wrapper">
      <div class="market__column">
        <div class="market__breadcrumb">
          <nuxt-link
            class="market__breadcrumb-item"
            :to="`/explore?city=${market.city.name}`"
            >{{ market.city.name }}</nuxt-link
          >
          / {{ market.title }}
        </div>
        <div class="market__likes-stars">
          <div class="market__likes">
            Ajouter aux favoris
            <a
              :class="[$liked_markets(market.id) ? 'active' : '']"
              class="market__like-image"
              @click="$like(market.slug, 'markets')"
            >
              <img v-if="!$liked_markets(market.id)" src="/icons/Vector1.svg" />
              <svg
                v-else
                width="27"
                height="24"
                viewBox="0 0 27 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M12.9314 3.15278L13.5 3.81379L14.0686 3.15278C15.3434 1.67079 17.2094 0.75 19.26 0.75C23.14 0.75 26.25 3.87246 26.25 7.66908C26.25 12.1088 23.1171 15.7566 19.7877 18.3626C18.1415 19.6511 16.4911 20.6499 15.2501 21.3271C14.6305 21.6652 14.1153 21.9219 13.7567 22.0933C13.6591 22.1399 13.5732 22.1802 13.5 22.2141C13.4268 22.1802 13.3409 22.1399 13.2433 22.0933C12.8847 21.9219 12.3695 21.6652 11.7499 21.3271C10.5089 20.6499 8.85846 19.6511 7.21228 18.3626C3.88292 15.7566 0.75 12.1088 0.75 7.66908C0.75 3.87057 3.86187 0.75 7.71 0.75C9.79222 0.75 11.6577 1.67205 12.9314 3.15278Z"
                  fill="#E93F5E"
                  stroke="white"
                  stroke-width="1.5"
                />
              </svg>
            </a>
          </div>
          <div class="market__stars">
            {{ market.review_score }} <a><img src="/icons/Vector2.svg" /></a>
          </div>
        </div>
      </div>
      <div class="market__container">
        <div class="market__left">
          <div class="market-item">
            <div class="market-item__image-wrap">
              <div v-if="market.image">
                <img
                  class="market-item__image"
                  :src="$api_storage_url + market.image"
                />
              </div>
              <div v-else>
                <img
                  class="market-item__image"
                  :src="$api_storage_url + 'images/market/market.png'"
                />
              </div>
              <a v-if="isMyMarket" class="market-item__edit edit-button">
                <img src="/icons/pen-icon.svg" />
                <input type="file" @change="onFileChange" />
              </a>
              <div class="market-item__top">
                <div v-if="market.today.is_open" class="market-item__tag">
                  <span></span>
                  <p>Ouvert</p>
                </div>
                <div v-else class="market-item__tag market-item__tag--red">
                  <span></span>
                  <p>Fermé</p>
                </div>
              </div>
            </div>
            <div class="market-item__data">
              <!--
              <div class="market-item__grid">
                <div>
                  <img
                    class="market-item__icon"
                    src="/icons/round-pushpin_1f4cd 7.svg"
                  />
                  <p>0.1km</p>
                </div>
                <div>
                  <img
                    class="market-item__icon"
                    src="/icons/3acf7049fa43017b1c8754cbedf14a04 10.svg"
                  />
                  <p>3,50€</p>
                </div>
                <div>
                  <img class="market-item__icon" src="/icons/image 12.svg" />
                  <p>Retrait</p>
                </div>
              </div>
              -->
            </div>
          </div>
          <p v-if="errors.has('image')" class="market-item__error">
            {{ errors.get('image') }}
          </p>
          <div class="switch hidden-mobile">
            <div class="switch__top">
              <a
                :class="[switcher === 'FIRST' ? 'active' : '']"
                class="switch__link"
                @click="switcher = 'FIRST'"
                >Localisation</a
              >
              <!--              <a-->
              <!--                :class="[switcher === 'SECOND' ? 'active' : '']"-->
              <!--                class="switch__link"-->
              <!--                @click="switcher = 'SECOND'"-->
              <!--                >Livraison</a-->
              <!--              >-->
              <!--              <a-->
              <!--                :class="[switcher === 'THIRD' ? 'active' : '']"-->
              <!--                class="switch__link"-->
              <!--                @click="switcher = 'THIRD'"-->
              <!--                >Click&Collect</a-->
              <!--              >-->
            </div>
            <div v-if="switcher === 'FIRST'">
              <p class="switch__title">{{ market.title }}</p>
              <p class="switch__address">
                {{ JSON.parse(market.address).value }}
              </p>
              <GmapMap
                v-if="JSON.parse(market.address).latlng"
                :center="{
                  lat: JSON.parse(market.address).latlng.lat,
                  lng: JSON.parse(market.address).latlng.lng,
                }"
                :zoom="16"
                :options="options"
                class="switch__map"
              >
                <GmapMarker
                  :position="{
                    lat: JSON.parse(market.address).latlng.lat,
                    lng: JSON.parse(market.address).latlng.lng,
                  }"
                  :clickable="true"
                  :icon.sync="marker"
                />
              </GmapMap>
              <br />
              <!-- <p class="switch__title">Plan du marché</p>
              <img class="switch__plan-image" src="/images/MaskGroup2.png" /> -->
            </div>
            <div v-else-if="switcher === 'SECOND'"></div>
            <div v-else-if="switcher === 'THIRD'"></div>
          </div>
        </div>
        <div class="market__right">
          <div class="market__description-wrap">
            <div v-if="market.description">
              <p class="market__description">
                {{ market.description }}
              </p>
            </div>
            <div v-else>
              <div v-if="isMyMarket" class="market__buttondescription">
                <div
                  class="market__buttondescription__item"
                  @click="openDescriptionModal"
                >
                  <div class="market__buttondescription__button">
                    <a
                      target="_blank"
                      class="market__buttondescription__button market__buttondescription__button--add"
                    >
                    </a>
                  </div>
                  <div class="market__buttondescription__title">
                    <p>Ajouter une description</p>
                  </div>
                </div>
              </div>
            </div>
            <div v-if="isMyMarket" class="market__updatedescription">
              <div v-if="market.description">
                <a
                  v-if="isMyMarket"
                  class="market__description-edit edit-button"
                  @click="openDescriptionModal"
                >
                  <img src="/icons/pen-icon.svg" />
                </a>
              </div>
            </div>
          </div>
          <div class="is-open">
            <div
              :class="[workingTimesActive ? 'active' : '']"
              class="is-open__wrap"
              @click="workingTimesActive = !workingTimesActive"
            >
              <div
                v-if="market.today.market_working_time && market.today.is_open"
                class="is-open__wrap"
              >
                <span></span>
                <p class="is-open__text">Ouvert</p>
                <p class="is-open__time">
                  {{
                    $moment(
                      market.today.market_working_time.hours_start,
                      'HH:mm:ss'
                    ).format('HH:mm')
                  }}
                  -
                  {{
                    $moment(
                      market.today.market_working_time.hours_end,
                      'HH:mm:ss'
                    ).format('HH:mm')
                  }}h
                </p>
              </div>
              <div
                v-else-if="
                  (market.today.market_working_time && !market.today.is_open) ||
                  !market.today.market_working_time
                "
                class="is-open__wrap is-open__wrap--red"
              >
                <span></span>
                <p class="is-open__text">Fermé</p>
              </div>
              <div class="updatetime">
                <a
                  v-if="isMyMarket"
                  target="_blank"
                  class="updatetimeicone"
                  @click="$nuxt.$emit('open-workingtime-modal')"
                >
                  <svg
                    width="15"
                    height="20"
                    viewBox="0 0 15 20"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M14.7794 2.59091C14.5588 1.94318 14.1176 1.29545 13.2353 0.647727C12.5735 0.215909 11.9118 0 11.0294 0C10.1471 0 9.48529 0.431818 9.04412 1.07955L1.10294 12.3068C0.661765 12.5227 0.441176 13.1705 0.220588 15.7614C0 17.0568 0 18.3523 0 18.3523C0 18.3523 0 18.3523 0 18.5682C0 19 0.441176 19.2159 0.661765 19C0.661765 19 0.661765 19 0.882353 19C0.882353 19 1.98529 18.5682 3.30882 17.9205C5.73529 16.8409 6.17647 16.4091 6.39706 15.9773L14.5588 4.75C15 4.10227 15 3.45455 14.7794 2.59091ZM12.5735 1.72727C13.0147 2.15909 13.4559 2.59091 13.4559 3.02273C13.6765 3.45455 13.4559 3.88636 13.4559 4.10227C13.2353 4.31818 13.0147 4.53409 12.5735 4.53409C11.9118 4.53409 11.4706 4.31818 11.0294 3.88636C10.1471 3.45455 9.70588 2.375 10.1471 1.72727C10.5882 1.07955 11.6912 1.07955 12.5735 1.72727ZM5.29412 15.3295C5.29412 15.3295 4.85294 15.7614 2.64706 16.8409C2.20588 17.0568 1.76471 17.2727 1.32353 17.4886C1.32353 17.0568 1.32353 16.625 1.54412 15.9773C1.76471 13.3864 1.98529 12.9545 1.98529 12.9545L8.82353 3.45455C9.04412 4.10227 9.48529 4.53409 10.1471 4.96591C10.8088 5.39773 11.4706 5.61364 12.1324 5.61364L5.29412 15.3295Z"
                      fill="#6E6E6E"
                    />
                  </svg>
                </a>
                <a>
                  <img src="/icons/Polygon18.png" />
                </a>
              </div>
            </div>
            <div
              v-if="market.market_working_time.length"
              :class="[workingTimesActive ? 'active' : '']"
              class="is-open__times"
            >
              <ul>
                <li
                  v-for="(item, index) in days"
                  :key="index"
                  :class="[isToday(item) == true ? 'active' : '']"
                >
                  <div class="is-open__container">
                    <div class="is-open__times-day">{{ item.value }}</div>
                    <div class="is-open__times-time">
                      <p v-if="getWorkingTime(item.value) !== undefined">
                        {{
                          $moment(
                            getWorkingTime(item.value).hours_start,
                            'HHmm'
                          ).format('HH:mm')
                        }}
                        -
                        {{
                          $moment(
                            getWorkingTime(item.value).hours_end,
                            'HHmm'
                          ).format('HH:mm')
                        }}
                      </p>
                      <p v-else class="is-open__times-day">Fermé</p>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <div class="events">
            <div class="events__top">
              <p class="events__title">Annonces</p>
              <div class="events__controllers">
                <a class="events__button" @click="$refs.events.prev()">
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
                <a class="events__button" @click="$refs.events.next()">
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
            <div v-if="market.events.length">
              <VueSlickCarousel ref="events" v-bind="carousel.events">
                <EventAdd v-if="isMyMarket" />
                <EventItem
                  v-for="(item, index) in market.events"
                  :key="index"
                  :event="item"
                  :is-my-market="isMyMarket"
                />
              </VueSlickCarousel>
            </div>
            <div v-else>
              <EventAdd v-if="isMyMarket" />
            </div>
          </div>
          <div class="discover">
            <p @click="getNumMerchand()">
              Découvrez les marchands
              {{ options.id_merch }}
            </p>
            <div class="discover__column">
              <div class="discover__left">
                <!-- <a v-if="isMyMarket" class="discover__edit edit-button">
         <img src="/icons/pen-icon.svg" />
        </a> -->
                <!--                <a class="discover__filter-button">-->
                <!--                  Filtres-->
                <!--                  <div class="discover__filter-image">-->
                <!--                    <img src="/icons/filter.png" />-->
                <!--                  </div>-->
                <!--                </a>-->
                <div class="activitiescarousel">
                  <VueSlickCarousel
                    ref="activities"
                    v-bind="carousel.activities"
                  >
                    <div
                      v-for="(item, index) in merchantActivities"
                      :key="index"
                      class="activitiescarousel__items"
                    >
                      <a
                        class="discover__category-button"
                        :class="[isFilterActive(item.id) ? 'active' : '']"
                        :style="{ backgroundColor: item.color }"
                        @click="filter(item.id)"
                      >
                        <img
                          :src="$api_storage_url + item.icon"
                          class="discover__img"
                        />
                      </a>
                      <div class="roundIconMarchand">
                        <a href="#">
                          {{ options.id_merch[index] }}
                        </a>
                      </div>
                    </div>
                    <!-- <a
                      v-for="(item, index) in merchantActivities"
                      :key="index"
                      :class="[isFilterActive(item.id) ? 'active' : '']"
                      class="discover__category-button"
                      :style="{ backgroundColor: item.color }"
                      @click="filter(item.id)"
                    >
                      <img
                        :src="$api_storage_url + item.icon"
                        class="discover__img"
                      />
                    </a> -->
                  </VueSlickCarousel>
                </div>
              </div>
              <div class="discover__right"></div>
            </div>
          </div>
          <div class="shops">
            <MerchantCreateItem v-if="isMyMarket" />
            <MerchantItem
              v-for="(item, index) in market.merchants"
              :key="index"
              :merchant="item"
            />
          </div>
          <div class="shops__border"></div>
          <div class="stars">
            <p class="stars__title">
              {{ $users }} Les avis récents sur
              <span>le marché marceau</span>
            </p>
            <div class="stars__column">
              <div class="stars__score-wrap">
                <div class="stars__score">{{ market.review_score }}</div>
                <div class="stars__text-wrap">
                  <p class="stars__text">
                    Appréciation générale (0 commentaires)
                  </p>
                  <img class="stars__icon" src="/icons/star.png" />
                  <img class="stars__icon" src="/icons/star.png" />
                  <img class="stars__icon" src="/icons/star.png" />
                  <img class="stars__icon" src="/icons/star.png" />
                  <img class="stars__icon" src="/icons/star.png" />
                </div>
              </div>
              <div class="stars__buttons">
                <a
                  v-if="$auth.user"
                  :class="[reviewActive === 'FORM' ? 'active' : '']"
                  class="stars__button"
                  @click="selectReview('FORM')"
                  >Donnez un avis</a
                >
                <nuxt-link v-else class="stars__button" to="/login">
                  Connectez vous pour laisser un avis
                </nuxt-link>
                <a
                  :class="[reviewActive === 'VIEW' ? 'active' : '']"
                  class="stars__button"
                  @click="selectReview('VIEW')"
                  >Voir les avis</a
                >
              </div>
            </div>
          </div>
          <div v-if="reviewActive === 'VIEW'" class="review">
            <div
              v-for="(item, index) in market.reviews"
              :key="index"
              class="review__wrap"
            >
              <div class="review__column">
                <div class="review__left">
                  <p class="review__user">{{ item.user.first_name }}</p>
                  <div class="review__stars">
                    <img
                      v-for="index in item.score"
                      :key="index"
                      class="review__star"
                      src="/icons/star.svg"
                    />
                    <img
                      v-for="index in 5 - item.score"
                      :key="index"
                      class="review__star"
                      src="/icons/star-white.svg"
                    />
                  </div>
                </div>
                <div class="review__date">
                  {{ $moment(item.created_at).format('DD/M/YYYY HH:mm') }}
                </div>
              </div>
              <p class="review__comment">{{ item.comment }}</p>
            </div>
          </div>
          <div v-else-if="reviewActive === 'FORM'" class="review">
            <p class="review__title">Donner un avis</p>
            <p class="review__subtitle">Votre note</p>
            <div class="review__stars">
              <br />
              <a
                v-for="index in formData.score"
                :key="index"
                class="review__star"
                @click="
                  formData.score = index
                  errors.clear('score')
                "
              >
                <img src="/icons/star.svg" />
              </a>
              <a
                v-for="i in 5 - formData.score"
                :key="10 + i"
                class="review__star"
                @click="
                  formData.score = formData.score + i
                  errors.clear('score')
                "
              >
                <img src="/icons/star-white.svg" />
              </a>
            </div>
            <p v-if="errors.has('score')" class="review__error">
              {{ errors.get('score') }}
            </p>
            <form class="review__form" @submit.prevent="submitReview">
              <textarea
                v-model="formData.comment"
                class="review__input"
                placeholder="Laisser un commentaire"
                @input="errors.clear('comment')"
              ></textarea>
              <p v-if="errors.has('comment')" class="review__error">
                {{ errors.get('comment') }}
              </p>
              <button class="review__submit">Envoyer</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Vue from 'vue'
import VueSlickCarousel from 'vue-slick-carousel'
import EventItem from '~/components/event/Item'
import 'vue-slick-carousel/dist/vue-slick-carousel.css'
import training from '~/mixins/favorites'
Vue.filter('formatTime', function (value) {
  if (value) {
    const parts = value.split(':')
    return parts[0] + ':' + parts[1]
  }
})
export default {
  // props: ['users'],
  components: {
    VueSlickCarousel,
    EventItem,
  },
  mixins: [training],
  async asyncData({ $axios, params, error }) {
    try {
      const res = await $axios.$get(`markets/${params.slug}`)
      const market = res.market
      const merchantActivities = res.activities
      const options = {
        zoomControl: false,
        mapTypeControl: false,
        scaleControl: false,
        streetViewControl: false,
        rotateControl: true,
        fullscreenControl: false,
        disableDefaultUI: false,
        styles: require('~/static/json/map.json'),
        id_merch: res.id_merchand,
      }
      return {
        market,
        merchantActivities,
        options,
      }
    } catch (e) {
      error({ statusCode: 404, message: '404' })
    }
  },
  data() {
    return {
      smoothPicker: [
        {
          currentIndex: 1,
          flex: 3,
          list: [
            '06:00',
            '06:30',
            '07:00',
            '07:30',
            '08:00',
            '08:30',
            '09:00',
            '09:30',
            '10:00',
            '10:30',
            '11:00',
            '11:30',
            '12:00',
            '12:30',
            '13:00',
            '13:30',
            '14:00',
            '14:30',
            '15:00',
            '15:30',
            '16:00',
            '16:30',
            '17:00',
            '17:30',
            '18:00',
            '18:30',
            '19:00',
            '19:30',
            '20:00',
            '20:30',
            '21:00',
            '21:30',
            '22:00',
          ],
          onClick: this.clickOnGender,
          textAlign: 'center',
          className: 'row-group',
        },
      ],
      days: [
        {
          key: 'Lun',
          value: 'Lundi',
        },
        {
          key: 'Mar',
          value: 'Mardi',
        },
        {
          key: 'Mer',
          value: 'Mercredi',
        },
        {
          key: 'Jeu',
          value: 'Jeudi',
        },
        {
          key: 'Ven',
          value: 'Vendredi',
        },
        {
          key: 'Sam',
          value: 'Samedi',
        },
        {
          key: 'Dim',
          value: 'Dimanche',
        },
      ],
      workingTimeForm: {
        days: [],
        hours_start: '',
        hours_end: '',
      },
      workingTimeForm2: {
        days: [],
        hours_start: '',
        hours_end: '',
      },
      marker: '/icons/map-pin-icon.svg',
      market: {
        city: {},
      },
      switcher: 'FIRST',
      filters: [],
      workingTimesActive: false,
      carousel: {
        events: {
          dots: false,
          dotsClass: 'slick-dots',
          infinite: false,
          initialSlide: 0,
          slidesToScroll: 1,
          autoplay: false,
          arrows: false,
          variableWidth: true,
        },
        activities: {
          dots: false,
          dotsClass: 'slick-dots',
          infinite: false,
          initialSlide: 0,
          slidesToScroll: 1,
          autoplay: false,
          arrows: false,
          variableWidth: true,
        },
      },
      formData: {
        score: 0,
        comment: '',
        market_id: null,
      },
      formDataDesc: {
        description: '',
      },
      formDataImage: {
        image: '',
      },
      formDataEvent: {
        description: '',
      },
      reviewActive: '',
      workingTimeModal: {
        active: false,
        data: {},
        dropdown: {
          first: false,
          second: false,
        },
      },
      modalBox: {
        model: '',
        active: false,
        data: '',
      },
      num_merchand_by_activity: '',
    }
  },
  computed: {
    isMyMarket() {
      if (!this.$auth.loggedIn) return false
      else if (
        this.$auth.user.is_market &&
        this.$auth.user.market.id === this.market.id
      )
        return true
      return false
    },
  },
  mounted() {
    this.$nuxt.$on('open-event-modal', (val) => {
      this.modalBox.model = 'EVENT'
      this.modalBox.active = true
      this.modalBox.data = val
    })
    this.$nuxt.$on('open-time-modal', (val) => {
      this.openAddTimeModal(val)
    })
    this.$nuxt.$on('open-eventadd-modal', (val) => {
      this.openAddEventModal(val)
    })
    this.$nuxt.$on('deleteEvent', (val) => {
      this.deleteEvent(val)
    })
    this.$nuxt.$on('close-modal-box', () => {
      this.closeModal()
    })
    this.$nuxt.$on('open-workingtime-modal', (val) => {
      this.workingTimeModal.active = true
    })
    this.market.market_working_time.forEach((item) => {
      if (!this.workingTimeForm.days.length) {
        this.workingTimeForm.days.push(item.day)
        this.workingTimeForm.hours_start = item.hours_start
        this.workingTimeForm.hours_end = item.hours_end
      } else if (
        this.workingTimeForm.hours_start === item.hours_start &&
        this.workingTimeForm.hours_end === item.hours_end
      ) {
        this.workingTimeForm.days.push(item.day)
        this.workingTimeForm.hours_start = item.hours_start
        this.workingTimeForm.hours_end = item.hours_end
      } else {
        this.workingTimeForm2.days.push(item.day)
        this.workingTimeForm2.hours_start = item.hours_start
        this.workingTimeForm2.hours_end = item.hours_end
      }
    })
    this.getUsers()
    // this.getNumMerchand()
  },
  methods: {
    filter(id) {
      const index = this.filters.findIndex((item) => item === id)
      if (index === -1) this.filters.push(id)
      else this.filters.splice(index, 1)
      this.$axios
        .get(
          `markets/${this.$route.params.slug}?activities=${this.filters.join()}`
        )
        .then((res) => (this.market = res.data.market))
    },
    isFilterActive(id) {
      return this.filters.findIndex((item) => item === id) !== -1
    },
    selectReview(val) {
      if (this.reviewActive === val) this.reviewActive = ''
      else this.reviewActive = val
    },
    closeModal() {
      this.modalBox.model = ''
      this.modalBox.active = false
      this.modalBox.data = {}
    },
    openAddTimeModal(val) {
      this.modalBox.model = 'ADD_TIME'
      this.modalBox.active = true
      if (val) {
        this.modalBox.data = val
      }
    },
    openDescriptionModal() {
      this.modalBox.model = 'DESCRIPTION'
      this.modalBox.active = true
      this.formDataDesc.id = this.market.id
      this.formDataDesc.description = this.market.description
    },
    openAddEventModal(val) {
      this.modalBox.model = 'ADD_EVENT'
      this.modalBox.active = true
      this.modalBox.data = val
    },

    async submitReview() {
      try {
        this.formData.market_id = this.market.id
        await this.$axios.post('reviews', this.formData)
        this.formData.score = 0
        this.formData.comment = ''
        this.market = (
          await this.$axios.$get(`markets/${this.$route.params.slug}`)
        ).market
      } catch (e) {
        this.errors.record(e.response.data.errors)
      }
    },
    async updateDescription() {
      try {
        await this.$axios.post('market-profiles/description', this.formDataDesc)
        this.market.description = this.formDataDesc.description
        this.closeModal()
      } catch (e) {
        this.errors.record(e.response.data.errors)
      }
    },
    onFileChange(event) {
      this.errors.clear('image')
      this.formDataImage.image = event.target.files[0]
      this.updateImage()
    },
    async updateImage() {
      const formData = new FormData()
      formData.append('image', this.formDataImage.image)
      try {
        const res = await this.$axios.post('market-profiles/image', formData)
        this.formDataImage.image = ''
        this.market.image = res.data
      } catch (e) {
        this.errors.record(e.response.data.errors)
      }
    },
    async addEvent() {
      this.formDataEvent.market_id = this.market.id
      try {
        await this.$axios.post('events', this.formDataEvent)
        this.formDataEvent.title = ''
        this.formDataEvent.description = ''
        this.market = (
          await this.$axios.$get(`markets/${this.$route.params.slug}`)
        ).market
      } catch (e) {
        this.errors.record(e.response.data.errors)
      }
      this.modalBox.active = false
    },
    async updateEvent() {
      this.eventId = this.modalBox.data.id
      this.formDataEvent.title = this.modalBox.data.title
      this.formDataEvent.description = this.modalBox.data.description
      this.formDataEvent.market_id = this.market.id
      try {
        await this.$axios
          .put('events/' + this.eventId, this.formDataEvent)
          .then(
            ((this.formDataEvent.market_id = ''),
            (this.formDataEvent.title = ''),
            (this.formDataEvent.description = ''))
          )
      } catch (e) {
        console.log(e)
      }
      this.modalBox.active = false
    },
    async deleteEvent(val) {
      this.eventId = val.id
      try {
        await this.$axios.delete('events/' + this.eventId).then(
          (this.market = (
            await this.$axios.$get(`markets/${this.$route.params.slug}`)
          ).market)(
            this.market.events.forEach((element) => {
              if (element.id === this.eventId) {
                element.title = ''
                element.description = ''
              }
            })
          )
        )
      } catch (e) {
        this.errors.record(e.response.data.errors)
      }
    },
    selectDay(day) {
      const index2 = this.workingTimeForm2.days.findIndex(
        (item) => item === day.value
      )
      if (index2 !== -1) return
      const index = this.workingTimeForm.days.findIndex(
        (item) => item === day.value
      )
      if (index === -1) this.workingTimeForm.days.push(day.value)
      else this.workingTimeForm.days.splice(index, 1)
    },
    selectDay2(day) {
      const index2 = this.workingTimeForm.days.findIndex(
        (item) => item === day.value
      )
      if (index2 !== -1) return
      const index = this.workingTimeForm2.days.findIndex(
        (item) => item === day.value
      )
      if (index === -1) this.workingTimeForm2.days.push(day.value)
      else this.workingTimeForm2.days.splice(index, 1)
    },
    selectStartTime(gIndex, iIndex) {
      this.workingTimeForm.hours_start = this.smoothPicker[gIndex].list[iIndex]
    },
    selectEndTime(gIndex, iIndex) {
      this.workingTimeForm.hours_end = this.smoothPicker[gIndex].list[iIndex]
    },
    selectStartTimeSecond(gIndex, iIndex) {
      this.workingTimeForm2.hours_start = this.smoothPicker[gIndex].list[iIndex]
    },
    selectEndTimeSecond(gIndex, iIndex) {
      this.workingTimeForm2.hours_end = this.smoothPicker[gIndex].list[iIndex]
    },
    submitWorkingTime() {
      const arr = []
      this.days.forEach((day) => {
        const index = this.workingTimeForm.days.findIndex(
          (item) => day.value === item
        )
        const index2 = this.workingTimeForm2.days.findIndex(
          (item) => day.value === item
        )
        if (index === -1 && index2 === -1) arr.push(day.value)
      })
      this.$axios
        .post('market-profiles/working-times', {
          frm1: this.workingTimeForm,
          frm2: this.workingTimeForm2,
          remove: arr,
        })
        .then(() => {
          this.workingTimeModal.active = false
          this.arr = []
          this.$axios
            .$get(`markets/${this.market.slug}`)
            .then((res) => (this.market = res.market))
        })
    },
    getWorkingTime(day) {
      return this.market.market_working_time.find((item) => item.day === day)
    },
    isToday(day) {
      if (this.market.today.market_working_time) {
        if (
          day.value.toUpperCase() ===
          this.market.today.market_working_time.day.toUpperCase()
        ) {
          return true
        }
        return false
      }
      return false
    },
    getUsers() {
      this.$axios.get('/api/users').then((response) => {
        this.users = response.data
      })
    },
    getNumMerchand() {
      this.$axios.get('get_num_merchand').then((response) => {
        alert(this.merchantActivities.index)
      })
    },
  },
}
</script>

<style lang="scss" scoped>
.working-time {
  display: none;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.3);
  position: fixed;
  top: 0;
  left: 0;
  z-index: 3;
  &.active {
    display: block;
  }

  &__container {
    background: #ffffff;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    border-radius: 30px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 20px 20px 20px 20px;
  }

  &__row {
    display: flex;
    justify-content: center;
    align-items: center;
  }

  &__item {
    width: 39px;
    height: 39px;
    background: #9a9a9a;
    border-radius: 30px;
    font-family: Open Sans;
    font-style: normal;
    font-weight: normal;
    font-size: 12px;
    line-height: 16px;
    text-transform: capitalize;
    color: #ffffff;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0 3px;
    cursor: pointer;
    transition: opacity 0.2s;
    &:hover {
      opacity: 0.9;
    }
    &.active {
      background: #3b1099;
    }
  }

  &__select {
    width: 316px;
    height: 43px;
    background: #f3f3f3;
    border-radius: 7px;
    font-family: Open Sans;
    font-style: normal;
    font-weight: 300;
    font-size: 14px;
    line-height: 19px;
    color: #9a9a9a;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 12px 23px;
    cursor: pointer;
    transition: opacity 0.2s;
    margin-top: 12px;
    &:hover {
      opacity: 0.85;
    }
    svg {
      margin-left: auto;
    }
  }

  &__button {
    width: 207px;
    height: 40px;
    background: #e8e8e8;
    border-radius: 30px;
    font-family: Open Sans;
    font-style: normal;
    font-weight: normal;
    font-size: 12px;
    line-height: 16px;
    color: #6f6f6f;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    transition: opacity 0.2s;
    margin-top: 12px;
    &:hover {
      opacity: 0.85;
    }
    svg {
      margin-right: 4px;
    }
  }

  &__submit {
    width: 270px;
    height: 36px;
    background: #3b1099;
    box-shadow: 0px 6px 4px rgba(0, 0, 0, 0.05);
    border-radius: 30px;
    font-family: Montserrat;
    font-style: normal;
    font-weight: 600;
    font-size: 14px;
    line-height: 17px;
    color: #ffffff;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    transition: opacity 0.15s;
    margin: 108px auto 0 auto;
    border: none;
    &:hover {
      opacity: 0.95;
    }
  }
}
.review {
  &__wrap {
    padding-bottom: 12px;
    margin-top: 16px;
    border-bottom: 1px solid #e4e4e4;
  }

  &__column {
    display: flex;
    align-items: center;
  }

  &__left {
    display: flex;
    align-items: center;
  }

  &__user {
    font-family: Montserrat;
    font-style: normal;
    font-weight: 600;
    font-size: 14px;
    line-height: 17px;
    color: #565656;
    margin-right: 25px;
  }

  &__stars {
    display: flex;
    align-items: center;
  }

  &__star {
    margin-right: 3px;
    cursor: pointer;
  }

  &__date {
    font-family: Open Sans;
    font-style: normal;
    font-weight: 600;
    font-size: 12px;
    line-height: 16px;
    text-align: right;
    color: #9a9a9a;
    margin-left: auto;
  }

  &__comment {
    font-family: Open Sans;
    font-style: normal;
    font-weight: normal;
    font-size: 14px;
    line-height: 19px;
    color: #000000;
    margin-top: 21px;
  }

  &__title {
    font-family: Open Sans;
    font-style: normal;
    font-weight: 600;
    font-size: 25px;
    line-height: 34px;
    color: #565656;
    margin: 20px 0 2px 0;
  }

  &__subtitle {
    font-family: Open Sans;
    font-style: normal;
    font-weight: 600;
    font-size: 12px;
    line-height: 16px;
    color: #9a9a9a;
    margin-bottom: 6px;
  }

  &__form {
    margin-top: 20px;
  }

  &__input {
    min-width: 920px;
    max-width: 920px;
    min-height: 120px;
    max-height: 120px;
    background: #ffffff;
    box-shadow: 0 6px 4px rgba(0, 0, 0, 0.05);
    border-radius: 20px;
    padding: 23px 28px;
    border: none;
    outline: none;
    resize: none;
    &::placeholder {
      font-family: Open Sans;
      font-style: normal;
      font-weight: normal;
      font-size: 14px;
      line-height: 19px;
      color: #c4c4c4;
    }
  }

  &__error {
    font-family: Montserrat, serif;
    color: #ff3333;
    font-size: 13px;
    padding-left: 11px;
    margin-top: 6px;
  }

  &__submit {
    width: 200px;
    height: 46px;
    background: #3b1099;
    border: 1px solid #c4c4c4;
    box-sizing: border-box;
    border-radius: 30px;
    font-family: Montserrat;
    font-style: normal;
    font-weight: 600;
    font-size: 14px;
    line-height: 17px;
    text-align: center;
    color: #ffffff;
    cursor: pointer;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 15px;
    transition: opacity 0.2s;
    &:hover {
      opacity: 0.9;
    }
  }
}

.edit-modal {
  &__header {
    width: 100%;
    display: flex;
    a {
      margin-left: auto;
    }
  }
  &__title {
    border-top-left-radius: 30px;
    border-top-right-radius: 30px;
    font-family: Open Sans;
    font-style: normal;
    font-weight: 600;
    font-size: 14px;
    line-height: 19px;
    color: #565656;
    margin-bottom: 6px;
  }

  &__group {
    margin-bottom: 20px;
  }

  &__input {
    display: block;
    margin: 0 auto;
    width: 100%;
    height: 43px;
    box-sizing: border-box;
    border: none;
    border-radius: 7px;
    padding-left: 25px;
    background: #f3f3f3;
    &::placeholder {
      opacity: 0.4;
    }
  }

  &__textarea {
    width: 100%;
    height: 229px;
    background: #f5f5f5;
    border-radius: 20px;
    resize: none;
    font-family: Open Sans;
    font-style: normal;
    font-weight: normal;
    font-size: 12px;
    line-height: 16px;
    color: #6f6f6f;
    padding: 18px 24px;
    border: none;
    outline: none;
    &::placeholder {
      opacity: 0.4;
    }
  }

  &__error {
    font-family: Montserrat, serif;
    color: #ff3333;
    font-size: 13px;
    padding-left: 11px;
    margin: 2px 0;
  }

  &__submit {
    width: 270px;
    max-width: 100%;
    height: 36px;
    background: #3b1099;
    box-shadow: 0 6px 4px rgba(0, 0, 0, 0.05);
    border-radius: 30px;
    font-family: Montserrat;
    font-style: normal;
    font-weight: 600;
    font-size: 14px;
    line-height: 17px;
    text-align: center;
    color: #ffffff;
    cursor: pointer;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: opacity 0.125s;
    border: none;
    margin-top: 50px;
    &:hover {
      opacity: 8.5;
    }
  }
}

@media screen and (max-width: 1024px) {
  .hidden-mobile {
    display: none;
  }
}
.market {
  width: 100%;
  padding-bottom: 110px;

  &__wrapper {
    max-width: 1440px;
    margin: 0 auto;
    padding: 0 80px;
    @media screen and (max-width: 769px) {
      padding: 0 12px;
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
    }

    @media screen and (max-width: 769px) {
      font-size: 28px;
      line-height: 38px;
      text-align: center;
    }
  }

  &__column {
    width: 100%;
    display: flex;
    margin: 10px 0;
    @media screen and (max-width: 1024px) {
      display: block;
    }
  }

  &__breadcrumb {
    font-family: Open Sans;
    font-style: normal;
    font-weight: normal;
    font-size: 17px;
    line-height: 23px;
    color: #9a9a9a;
    &-item {
      text-decoration: none;
      color: #9a9a9a;
    }
    @media screen and (max-width: 1024px) {
      text-align: center;
      font-size: 12px;
      line-height: 18px;
    }
  }

  &__likes-stars {
    display: flex;
    margin-left: auto;
  }

  &__likes {
    display: flex;
    align-items: center;
    font-family: Open Sans;
    font-style: normal;
    font-weight: normal;
    font-size: 14px;
    line-height: 19px;
    color: #c4c4c4;
  }

  &__like-image {
    cursor: pointer;
    width: 40px;
    display: flex;
    justify-content: center;
  }

  &__stars {
    display: flex;
    align-items: center;
    font-family: Open Sans;
    font-style: normal;
    font-weight: normal;
    font-size: 15px;
    line-height: 20px;
    color: #c4c4c4;
    margin-left: 28px;
    img {
      margin-left: 10px;
      cursor: pointer;
    }
    @media screen and (max-width: 1024px) {
      margin-left: auto;
    }
  }

  &__container {
    display: grid;
    grid-template-columns: 290px calc(100% - 360px);
    grid-gap: 70px;

    @media screen and (max-width: 1024px) {
      grid-template-columns: 100%;
    }
  }

  &__left {
  }

  &__right {
  }

  &__description-edit {
    margin-left: auto;
  }

  &__description {
    width: calc(100% - 75px);
    font-family: Open Sans;
    font-style: normal;
    font-weight: normal;
    font-size: 17px;
    line-height: 23px;
    color: #9a9a9a;
  }

  &__buttondescription {
    display: flex;
    width: 250px;
    height: 40px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    margin-bottom: 16px;
    border-radius: 30px;
    padding: 0 20px;
    background: #e8e8e8;
    p {
      font-family: Open Sans;
      font-style: normal;
      font-weight: 600;
      font-size: 14px;
      line-height: 16px;
      color: #565656;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    &__item {
      cursor: pointer;
      height: 100%;
      display: flex;
      align-items: center;
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

  .market-item {
    width: 292px;
    height: 197px;
    overflow: hidden;
    background: #ffffff;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    border-radius: 30px;
    margin: 0 auto;

    &:focus {
      outline: none !important;
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

    &__error {
      font-family: Montserrat, serif;
      color: #ff3333;
      font-size: 13px;
      padding-left: 11px;
      margin-top: 6px;
    }

    &__image-wrap {
      width: 100%;
      height: 197px;
      border-radius: 30px;
      overflow: hidden;
      position: relative;
      img {
        object-fit: cover;
      }
    }

    &__edit {
      position: absolute;
      top: 15px;
      right: 15px;
      z-index: 1;
      input {
        width: 100%;
        height: 100%;
        position: absolute;
        opacity: 0;
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
    }

    &__data {
      width: 100%;
      padding: 0 20px;
    }

    &__grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      justify-content: center;
      margin-top: 10px;

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
  .description-modal {
    width: 100%;
    max-width: 350px;
    max-height: 800px;
    border-radius: 20;
    &__header {
      width: 100%;
      display: flex;
      a {
        cursor: pointer;
        margin-left: auto;
        display: flex;
      }
    }

    &__title {
      font-family: Open Sans;
      font-style: normal;
      font-weight: 600;
      font-size: 14px;
      line-height: 19px;
      color: #565656;
      margin-left: unset !important;
    }

    &__subtitle {
      font-family: Open Sans;
      font-style: normal;
      font-weight: 600;
      font-size: 14px;
      line-height: 19px;
      color: #6f6f6f;
      text-align: center;
      margin-top: 20px;
    }

    &__container {
      min-width: 250px;
      display: block;
      margin-top: 37px;
    }

    &__textarea {
      resize: none;
      height: 250px;
      width: 350px;
      border: none;
      background: #f5f5f5;
      border-radius: 20px;
      padding: 10px 10px;
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
    }
  }
  .event-modal {
    width: 100%;
    max-width: 769px;

    @media screen and (max-width: 769px) {
      width: 120px;
    }

    &__header {
      border-top-left-radius: 30px;
      border-top-right-radius: 30px;
      margin: -35px -60px 45px -60px;
      background: #feb42b;
      padding: 12px;
    }

    &__title {
      font-family: Open Sans;
      font-style: normal;
      font-weight: bold;
      font-size: 16px;
      line-height: 22px;
      text-transform: capitalize;
      color: #ffffff;
      background: #feb42b;
      border-top-left-radius: 12px;
      border-top-right-radius: 12px;
      padding: 10px 20px;
    }

    &__container {
      margin: -25px -30px -25px -30px;
      padding: 12px;
    }

    &__text {
      font-family: Open Sans;
      font-style: normal;
      font-weight: 400;
      font-size: 14px;
      line-height: 19px;
      color: #9a9a9a;
    }
  }
  .time-modal {
    width: 100%;
    max-width: 350px;
    max-height: 800px;
    border-radius: 20;
    &__header {
      width: 100%;
      display: flex;
      a {
        cursor: pointer;
        margin-left: auto;
        display: flex;
      }
    }

    &__title {
      font-family: Open Sans;
      font-style: normal;
      font-weight: 600;
      font-size: 14px;
      line-height: 19px;
      color: #565656;
    }

    &__container {
      display: block;
      margin-top: 37px;
    }

    &__date {
      display: flex;
    }

    &__timeIcone {
      margin: 5px 5px;
      cursor: pointer;
      display: flex;
      justify-content: center;
      align-items: center;
      border-radius: 50%;
      background: #9a9a9a;
      width: 40px;
      height: 40px;
      font-family: Open Sans;
      font-style: normal;
      font-weight: normal;
      font-size: 14px;
      line-height: 16px;
      text-transform: capitalize;
      color: #ffffff;
    }

    &__time {
      margin-top: 10px;
      width: 100%;
      height: 43px;
    }

    &__select {
      width: 100%;
      height: 100%;
      border-radius: 7px;
      background: #f3f3f3;
      border: none;
      option {
        margin-right: 10px;
      }
    }

    &__addTime {
      margin-top: 10px;
    }

    &__button {
      justify-content: center;
      cursor: pointer;
      border: none;
      width: 207px;
      height: 40px;
      background: #e8e8e8;
      border-radius: 30px;
      font-family: Open Sans;
      font-style: normal;
      font-weight: normal;
      font-size: 12px;
      line-height: 16px;
      color: #6f6f6f;
    }
  }
  .switch {
    margin-top: 20px;

    &__top {
      margin-bottom: 10px;
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      justify-items: center;
      padding: 2px 0;
    }

    &__link {
      width: 100%;
      text-align: center;
      font-family: Open Sans;
      font-style: normal;
      font-weight: 600;
      font-size: 14px;
      line-height: 19px;
      color: #9a9a9a;
      padding: 2px 0;
      cursor: pointer;
      border-bottom: 1px solid #e4e4e4;
      &.active {
        color: #7151b8;
        border-bottom: 1px solid #7151b8;
      }
    }

    &__title {
      font-family: Open Sans;
      font-style: normal;
      font-weight: 600;
      font-size: 16px;
      line-height: 22px;
      color: #2c2c2c;
    }

    &__address {
      font-family: Open Sans;
      font-style: normal;
      font-weight: normal;
      font-size: 12px;
      line-height: 16px;
      color: #9a9a9a;
    }

    &__map {
      width: 100%;
      height: 180px;
      margin-top: 20px;
    }

    &__plan-image {
      width: 100%;
      margin-top: 2px;
    }
  }

  .is-open {
    width: 100%;
    padding: 8px 0;
    border-top: 1px solid #e4e4e4;
    border-bottom: 1px solid #e4e4e4;
    margin: 11px 0;
    span {
      width: 9px;
      height: 9px;
      background: #4caf50;
      border-radius: 50%;
    }
    .updatetime {
      margin-left: auto;
      display: flex;
      align-items: center;
      img {
        transition: all 0.15s;
      }
    }

    .updatetimeicone {
      margin-right: 10px;
      cursor: pointer;
      display: flex;
      justify-content: center;
      align-items: center;
      border-radius: 50%;
      background: #e8e8e8;
      width: 33px;
      height: 33px;
    }
    &__wrap {
      width: 100%;
      display: flex;
      cursor: pointer;
      &.active .is-open__icon {
        transform: rotate(180deg);
      }
    }

    &__container {
      display: grid;
      grid-template-columns: 25% 75%;
    }

    &__times {
      display: none;
      &.active {
        display: block;
      }
      ul li {
        list-style: none;
        margin-bottom: 3px;
        &.active {
          .is-open__times-day,
          .is-open__times-time {
            font-weight: bold;
          }
        }
      }
    }

    &__times-day,
    &__times-time {
      font-family: Open Sans;
      font-style: normal;
      font-weight: normal;
      font-size: 17px;
      line-height: 23px;
      color: #9a9a9a;
      display: flex;
    }

    &__text {
      font-family: Open Sans;
      font-style: normal;
      font-weight: 600;
      font-size: 25px;
      line-height: 34px;
      color: #4caf50;
      margin-left: 8px;
    }

    &__wrap {
      display: flex;
      align-items: center;

      &--red {
        span {
          background: #e93f5e;
        }
        .is-open__text {
          color: #e93f5e;
        }
      }
    }

    &__time {
      font-family: Open Sans;
      font-style: normal;
      font-weight: 600;
      font-size: 17px;
      line-height: 23px;
      color: #c4c4c4;
      margin-left: 12px;
    }

    &__edit {
      margin-right: 10px;
    }

    &__icon {
      margin-left: auto;
      display: flex;
      align-items: center;
      transition: all 0.15s;
    }
  }

  .events {
    &__top {
      display: flex;
      margin-bottom: 10px;
    }

    &__title {
      font-family: Open Sans;
      font-style: normal;
      font-weight: 600;
      font-size: 25px;
      line-height: 34px;
      color: #565656;
    }

    &__add {
      width: 192px;
      height: 40px;
      background: #e8e8e8;
      border-radius: 30px;
      font-family: Open Sans;
      font-style: normal;
      font-weight: normal;
      font-size: 12px;
      line-height: 16px;
      color: #6f6f6f;
      display: flex;
      justify-content: center;
      align-items: center;
      margin-left: 25px;
      cursor: pointer;
    }

    &__controllers {
      margin-left: auto;
      display: flex;
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
  .activitiescarousel {
    width: fit-content !important;
    max-width: 920px;
    @media screen and (max-width: 769px) {
      width: fit-content !important;
      min-width: 200px;
    }

    &__items {
      margin-right: 15px;
    }
  }

  .discover {
    margin: 20px 0 35px 0;

    p {
      font-family: Open Sans;
      font-style: normal;
      font-weight: 600;
      font-size: 25px;
      line-height: 34px;
      color: #565656;
      border-top: 1px solid #e4e4e4;
      padding: 10px 0;
    }

    &__category-button {
      width: 53px;
      height: 53px;
      display: flex;
      justify-content: center;
      align-items: center;
      cursor: pointer;
      border-radius: 50%;
      border: 2px solid transparent;
      &.active {
        border-color: rgba(0, 0, 0, 0.1);
      }
    }

    &__img {
      height: 40px;
      width: 40px;
    }

    &__left {
      display: flex;
      align-items: center;
    }

    &__filter-button {
      width: 123px;
      height: 44px;
      border: 1px solid #c4c4c4;
      box-sizing: border-box;
      border-radius: 30px;
      font-family: Montserrat;
      font-style: normal;
      font-weight: 600;
      font-size: 14px;
      line-height: 17px;
      color: #565656;
      display: flex;
      justify-content: center;
      align-items: center;
      cursor: pointer;
    }

    &__filter-image {
      width: 36px;
      height: 36px;
      background: rgba(196, 196, 196, 0.4);
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      margin-left: 8px;
    }

    &__edit {
      margin-right: 15px;
    }
  }

  .shops {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-gap: 30px;
    grid-row-gap: 48px;

    &__border {
      border-bottom: 1px solid #e4e4e4;
      padding: 25px 0 8px 0;
    }

    @media screen and (max-width: 1408px) {
      grid-template-columns: repeat(2, 1fr);
    }
    @media screen and (max-width: 1024px) {
      justify-content: space-around;
    }
    @media screen and (max-width: 769px) {
      grid-template-columns: repeat(1, 1fr);
    }
    @media screen and (max-width: 600px) {
      justify-content: center;
    }
  }

  .stars {
    &__button {
      text-align: center;
      text-decoration: none;
    }
    &__title {
      font-family: Open Sans;
      font-style: normal;
      font-weight: bold;
      font-size: 25px;
      line-height: 34px;
      color: #565656;
      margin: 10px 0 16px 0;

      span {
        font-weight: normal;
        font-size: 22px;
      }
    }

    &__column {
      display: flex;
      align-items: center;
      border-bottom: 1px solid #e4e4e4;
      padding-bottom: 12px;

      @media screen and (max-width: 769px) {
        display: block;
      }
    }

    &__score-wrap {
      display: flex;
      align-items: center;
    }

    &__score {
      width: 81px;
      min-width: 81px;
      height: 81px;
      border: 1px solid #565656;
      box-sizing: border-box;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: Open Sans;
      font-style: normal;
      font-weight: 600;
      font-size: 20px;
      line-height: 27px;
      color: #565656;
    }

    &__text-wrap {
      margin-left: 20px;
    }

    &__text {
      font-family: Open Sans;
      font-style: normal;
      font-weight: 600;
      font-size: 12px;
      line-height: 16px;
      color: #9a9a9a;
      margin-bottom: 4px;
    }

    &__buttons {
      display: flex;
      margin-left: auto;
      @media screen and (max-width: 769px) {
        margin-top: 12px;
      }
    }

    &__button {
      width: 200px;
      height: 46px;
      border: 1px solid #c4c4c4;
      box-sizing: border-box;
      border-radius: 30px;
      font-family: Montserrat;
      font-style: normal;
      font-weight: 600;
      font-size: 14px;
      line-height: 17px;
      color: #565656;
      margin-left: 23px;
      display: flex;
      justify-content: center;
      align-items: center;
      cursor: pointer;
      transition: color 0.1s;
      &.active {
        background: rgba(196, 196, 196, 0.2);
      }
    }
  }

  .edit-button {
    width: 39px;
    height: 39px;
    background: #e8e8e8;
    border-radius: 30px;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-right: 15px;
    cursor: pointer;
    transition: opacity 0.9s;
    &:hover {
      opacity: 0.85;
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
.smooth-picker .smooth-handle-layer {
  cursor: pointer !important;
}
.smooth-picker .smooth-handle-layer .smooth-bottom {
  border-top: none !important;
}
.smooth-picker .smooth-handle-layer .smooth-top {
  border-bottom: none !important;
}
.roundIconMarchand {
  position: relative;
  bottom: 20px;
  left: 5px;
  width: 20px;
  height: 20px;
  border-radius: 20px;
  background: #3b1099;
  text-align: center;
  font-family: Open Sans, serif;
  font-style: normal;
  font-weight: normal;
  font-size: 14px;
  line-height: 20px;
  a {
    color: white;
    text-decoration: none;
  }
}
</style>
