<template>
  <div class="market">
    <ModalBox :active="modalBox.active">
      <div
        v-if="modalBox.model === 'ADD_DESCRIPTION'"
        class="description-modal"
      >
        <div class="description-modal__header">
          <p class="description-modal__title">Description</p>
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
        <form action="#" @submit.prevent="updateDescription">
          <div class="description-modal__container">
            <textarea
              v-model="modalBox.data.description"
              class="description-modal__textarea"
              placeholder="200 caractères maximum"
            >
            </textarea>
            <div v-if="errors.has('description')" class="market-item__error">
              La description doit contenir moins de 600 caractères.
            </div>
          </div>
          <button type="submit" class="add-modal__form-button">
            Enregistrer
          </button>
        </form>
      </div>

      <div v-if="modalBox.model === 'ADD_TIME'" class="time-modal">
        <div class="time-modal__header">
          <p class="time-modal__title">Mes horaires</p>
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
        <div class="time-modal__form">
          <p style="margin-bottom: 20px">Je suis présent sur le marché le :</p>
          <form action="#" @submit="submitTime">
            <div
              class="time-modal__form-line"
              v-for="workingTime in marketWorkingTime"
              :key="workingTime.index"
            >
              <tr>
                <td class="time-modal__form-input">
                  <input
                    v-model="workingTime.checked"
                    :value="workingTime"
                    type="checkbox"
                    name="workingTime.day"
                  />
                </td>
                <td class="time-modal__form-day">
                  <span style="font-weight: bold">{{ workingTime.day }}</span>
                </td>
                <td class="time-modal__form-time">
                  <span class="textLight">{{
                    workingTime.hours_start | formatTime
                  }}</span>
                  /
                  <span class="textLight">{{
                    workingTime.hours_end | formatTime
                  }}</span>
                </td>
              </tr>
            </div>
            <div class="time-modal__form-button">
              <button type="submit">Valider</button>
            </div>
          </form>
        </div>
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

      <div v-if="modalBox.model === 'ADD_EVENT'" class="add-modal">
        <div v-if="!modalBox.data">
          <form action="#" @submit.prevent="submitEvent">
            <div class="add-modal__header">
              <p class="add-modal__title">Ajouter un évenement</p>
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
            <input
              v-model="eventFormData.title"
              class="add-modal__form-input"
              type="text"
              placeholder="Titre de l'évenement"
            />
            <p v-if="errors.has('title')" class="market-item__error">
              Veuillez ajouté un titre à l'évenement.
            </p>
            <textarea
              v-model="eventFormData.description"
              type="text"
              class="add-modal__form-textinput"
              placeholder="Déscription de l'évenement *"
            />
            <p v-if="errors.has('description')" class="market-item__error">
              Veuillez ajouté une description à l'évenement.
            </p>
            <button type="submit" class="add-modal__form-button">
              Ajouter
            </button>
          </form>
        </div>
        <div v-else>
          <form action="#" @submit.prevent="updateEvent">
            <div class="add-modal__header">
              <p class="add-modal__title">Modifier un évenement</p>
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
            <input
              v-model="modalBox.data.title"
              class="add-modal__form-input"
              type="text"
              placeholder="Titre de l'evenement *"
            />
            <p v-if="errors.has('title')" class="add-modal__error">
              Veuillez ajouté un titre à l'évenement.
            </p>
            <textarea
              v-model="modalBox.data.description"
              type="text"
              class="add-modal__form-textinput"
              placeholder="Déscription de l'évenement *"
            />
            <p v-if="errors.has('description')" class="market-item__error">
              Veuillez ajouté une description à l'évenement.
            </p>
            <button type="submit" class="add-modal__form-button">
              Modifier
            </button>
          </form>
        </div>
      </div>

      <div v-if="modalBox.model === 'ADD_CATEGORY'" class="description-modal">
        <div v-if="!modalBox.data">
          <div class="description-modal__header">
            <p class="description-modal__title">Categorie</p>
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
          <form action="#" @submit.prevent="addCategory">
            <input
              v-model="formDataCategory.title"
              class="add-modal__form-input"
              placeholder="Nom de la catégorie *"
              type="text"
              @input="errors.clear('title')"
            />
            <p v-if="errors.has('title')" class="add-modal__error">
              Veuillez ajouter un nom à la catégorie.
            </p>
            <button type="submit" class="add-modal__form-button">
              Enregistrer
            </button>
          </form>
        </div>
        <div v-else>
          <div class="description-modal__header">
            <p class="description-modal__title">Modifier une categorie</p>
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
          <form action="#" @submit.prevent="updateCategory">
            <input
              v-model="modalBox.data.title"
              class="add-modal__form-input"
              placeholder="Nom de la catégorie *"
              type="text"
              @input="errors.clear('title')"
            />
            <p v-if="errors.has('title')" class="add-modal__error">
              {{ errors.get('title') }}
            </p>
            <button type="submit" class="add-modal__form-button">
              Modifier
            </button>
          </form>
        </div>
      </div>

      <div v-if="modalBox.model === 'LIST_CATEGORY'" class="listcategory-modal">
        <div class="listcategory-modal__header">
          <p class="description-modal__title">Categories des produits</p>
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
        <div class="scrollable">
          <draggable
            v-model="productCategories"
            ghost-class="listcategory__ghost"
            @start="drag = true"
            @end="drag = false"
            @change="updateProductCategories"
            :delay="500"
            :delay-on-touch-only="true"
          >
            <a
              v-for="item in productCategories"
              :key="item.id"
              class="listcategory"
            >
              <div class="listcategory__title">
                <p>{{ item.title }}</p>
              </div>
              <div class="listcategory__button">
                <div class="listcategory__button-drag">
                  <a target="_blank">
                    <svg
                      width="18"
                      height="10"
                      viewBox="0 0 18 10"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <rect width="18" height="2" fill="#C4C4C4" />
                      <rect y="4" width="18" height="2" fill="#C4C4C4" />
                      <rect y="8" width="18" height="2" fill="#C4C4C4" />
                    </svg>
                  </a>
                </div>
              </div>
              <div class="listcategory__button-update">
                <button
                  target="_blank"
                  @click="deleteCategory(item, productCategories.indexOf(item))"
                >
                  <svg
                    width="14"
                    height="20"
                    viewBox="0 0 22 28"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M2.94444 7.5H18.0556C18.3012 7.5 18.5 7.68848 18.5 7.91304V27.087C18.5 27.1465 18.4637 27.2524 18.3573 27.3552C18.252 27.457 18.1349 27.5 18.0556 27.5H2.94444C2.67035 27.5 2.5 27.2841 2.5 27.087V7.91304C2.5 7.75794 2.55082 7.66512 2.60725 7.61057C2.66519 7.55455 2.76976 7.5 2.94444 7.5Z"
                      stroke="#D00505"
                    />
                    <path
                      d="M15.0013 4.09772L15.0815 4.5H15.4917H21.0833C21.2309 4.5 21.3219 4.55021 21.3793 4.61286C21.4404 4.67946 21.5 4.80126 21.5 5C21.5 5.19874 21.4404 5.32054 21.3793 5.38714C21.3219 5.44979 21.2309 5.5 21.0833 5.5H14.6667H7.33333H0.916667C0.769084 5.5 0.678095 5.44979 0.62066 5.38714C0.55961 5.32054 0.5 5.19874 0.5 5C0.5 4.80126 0.55961 4.67946 0.62066 4.61286C0.678095 4.55021 0.769084 4.5 0.916667 4.5H6.50833H6.91853L6.99869 4.09772C7.41846 1.99124 9.07735 0.5 11 0.5C12.9226 0.5 14.5815 1.99124 15.0013 4.09772ZM7.95516 3.85389L7.75774 4.5H8.43333H13.5667H14.2423L14.0448 3.85389C13.6207 2.46567 12.4338 1.5 11 1.5C9.56625 1.5 8.37934 2.46567 7.95516 3.85389Z"
                      stroke="#D00505"
                    />
                  </svg>
                </button>
              </div>
            </a>
          </draggable>
        </div>
        <p
          v-if="categoryError"
          class="add-modal__error"
          style="max-width: 270px"
        >
          {{ categoryError }}
        </p>
      </div>

      <div v-if="modalBox.model === 'ADD_PRODUCT'" class="add-modal">
        <div v-if="!modalBox.data">
          <div class="add-modal__header">
            <p class="add-modal__title">Ajouter un produit</p>
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
          <form action="#" @submit.prevent="submitProduct">
            <div class="add-modal__form">
              <!-- <SuggestionsProductsDropDown :activity="merchant.activity.id" /> -->
              <input
                v-model="formDataProduct.title"
                class="add-modal__form-input"
                placeholder="Nom du produit *"
                type="text"
                @input="errors.clear('title')"
              />
              <p v-if="errors.has('title')" class="add-modal__error">
                Veuillez rajouter un nom au produits.
              </p>
              <div class="image__wrap">
                <div class="image">
                  <div v-if="!image">
                    <div class="image__button-wrap">
                      <input
                        id="img"
                        class="add-modal__form-input"
                        type="file"
                        label="Image"
                        name="uploadfile"
                        style="display: none"
                        required
                        @change="createProductImage"
                      />
                      <label
                        for="img"
                        class="image__button image__button--add"
                      ></label>
                    </div>
                    <div class="image__data">
                      <label class="image__span">
                        Ajouter une image du produit
                      </label>
                    </div>
                  </div>
                  <div v-else>
                    <div class="image__button-wrap">
                      <img :src="$api_storage_url + image" />
                    </div>
                    <div class="image__data">
                      <label class="image__span" @click="removeImage">
                        Modifier l'image du produit
                      </label>
                    </div>
                  </div>
                </div>
                <p v-if="errors.has('image')" class="add-modal__error">
                  Veuillez rajouter une image ou réduire la taille de l'image
                  (inférieur à 10Mo)
                </p>
              </div>
              <div class="add-modal__form-quantities">
                <select
                  v-model="formDataProduct.unit_id"
                  class="add-modal__form-shortinput"
                  @input="errors.clear('unit_id')"
                >
                  <option value="" selected disabled>Unité</option>
                  <option v-for="unit in units" :key="unit.id" :value="unit.id">
                    {{ unit.unit }}
                  </option>
                </select>
                <input
                  v-model="formDataProduct.unit_quantity"
                  class="add-modal__form-shortinput"
                  placeholder="Quantité *"
                  type="number"
                  step="0.01"
                  @input="errors.clear('unit_quantity')"
                />
              </div>
              <p v-if="errors.has('unit_id')" class="add-modal__error">
                Veuillez choisir une unité.
              </p>
              <p v-if="errors.has('unit_quantity')" class="add-modal__error">
                Veuillez préciser une quantité.
              </p>
              <div class="add-modal__form-price">
                <input
                  v-model="formDataProduct.price"
                  class="add-modal__form-priceInput"
                  placeholder="Prix *"
                  type="number"
                  step="0.01"
                  @input="errors.clear('price')"
                />
                <p class="euro">€</p>
                <div
                  style="display: flex"
                  v-if="units[formDataProduct.unit_id - 1]"
                >
                  <p v-if="formDataProduct.unit_quantity > 1" class="unit">
                    {{ formDataProduct.unit_quantity }}/{{
                      units[formDataProduct.unit_id - 1].unit
                    }}
                  </p>
                </div>
              </div>
              <p v-if="errors.has('price')" class="add-modal__error">
                Veuillez préciser le prix du produit.
              </p>
              <select
                v-model="formDataProduct.product_category_id"
                class="add-modal__form-input"
                @change="errors.clear('product_category_id')"
              >
                <option value="" disabled selected>Catégorie du produit</option>
                <option
                  v-for="category in productCategories"
                  :key="category.id"
                  :value="category.id"
                >
                  {{ category.title }}
                </option>
              </select>
            </div>
            <button class="add-modal__form-button" type="submit">
              Ajouter
            </button>
          </form>
        </div>
        <div v-else>
          <div class="add-modal__header">
            <p class="add-modal__title">Modifier un produit</p>
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
          <form action="#" @submit.prevent="updateProduct">
            <div class="add-modal__form">
              <input
                v-model="modalBox.data.title"
                class="add-modal__form-input"
                placeholder="Nom du produit *"
                type="text"
                @input="errors.clear('title')"
              />
              <p v-if="errors.has('title')" class="add-modal__error">
                Veuillez rajouter un nom au produits.
              </p>
              <div class="image__wrap">
                <div class="image">
                  <div v-if="!modalBox.data.image">
                    <div class="image__button-wrap">
                      <input
                        id="img"
                        class="add-modal__form-input"
                        type="file"
                        label="Image"
                        name="uploadfile"
                        style="display: none"
                        required
                        @change="updateProductImage"
                      />
                      <label
                        for="img"
                        class="image__button image__button--add"
                      ></label>
                    </div>
                    <div class="image__data">
                      <label class="image__span">
                        Ajouter une image du produit
                      </label>
                    </div>
                  </div>
                  <div v-else>
                    <div class="image__button-wrap">
                      <img :src="$api_storage_url + modalBox.data.image" />
                    </div>
                    <div class="image__data">
                      <label class="image__span" @click="removeImage">
                        Modifier l'image du produit
                      </label>
                    </div>
                  </div>
                </div>
                <p v-if="errors.has('image')" class="add-modal__error">
                  Veuillez rajouter une image ou réduire la taille de l'image
                  (inférieur à 10Mo)
                </p>
              </div>
              <div class="add-modal__form-quantities">
                <select
                  v-model="modalBox.data.unit_id"
                  class="add-modal__form-shortinput"
                  @input="errors.clear('unit_id')"
                >
                  <option value="" selected disabled hidden>Unité</option>
                  <option v-for="unit in units" :key="unit.id" :value="unit.id">
                    {{ unit.unit }}
                  </option>
                </select>
                <p v-if="errors.has('unit_id')" class="add-modal__error">
                  Veuillez choisir une unité.
                </p>
                <input
                  v-model="modalBox.data.unit_quantity"
                  class="add-modal__form-shortinput"
                  placeholder="Quantité *"
                  type="number"
                  @input="errors.clear('unit_quantity')"
                />
                <p v-if="errors.has('unit_quantity')" class="add-modal__error">
                  Veuillez préciser une quantité.
                </p>
              </div>
              <div class="add-modal__form-price">
                <input
                  v-model="modalBox.data.price"
                  class="add-modal__form-priceInput"
                  placeholder="Prix *"
                  type="number"
                  step="0.01"
                  @input="errors.clear('price')"
                />
                <p class="euro">€</p>
                <div
                  style="display: flex"
                  v-if="units[modalBox.data.unit_id - 1]"
                >
                  <p v-if="modalBox.data.unit_quantity > 1" class="unit">
                    {{ modalBox.data.unit_quantity }}/{{
                      units[modalBox.data.unit_id - 1].unit
                    }}
                  </p>
                </div>
              </div>
              <p v-if="errors.has('price')" class="add-modal__error">
                Veuillez préciser le prix du produit.
              </p>
              <select
                v-model="modalBox.data.product_category_id"
                class="add-modal__form-input"
                @change="errors.clear('product_category_id')"
              >
                <option
                  v-for="category in productCategories"
                  :key="category.id"
                  :value="category.id"
                >
                  {{ category.title }}
                </option>
              </select>
            </div>
            <div class="add-modal__savedeletebutton">
              <button class="add-modal__form-button" type="submit">
                Modifier
              </button>
              <button class="deleteProduct" @click.prevent="deleteProduct">
                Supprimer
              </button>
            </div>
          </form>
        </div>
      </div>
    </ModalBox>
    <div class="market__header">
      <div>
        <p class="market__title">{{ merchant.title }}</p>
        <p class="market__subtitle">{{ merchant.activity.title }}</p>
        <div
          class="market__icon"
          :style="{ backgroundColor: merchant.activity.color }"
        >
          <img height="70px" :src="$api_storage_url + merchant.activity.icon" />
        </div>
      </div>
    </div>
    <div class="market__wrapper">
      <div class="market__column">
        <div class="market__breadcrumb">
          <nuxt-link
            class="market__breadcrumb-item"
            :to="`/explore?city=${merchant.market.city.name}`"
            >{{ merchant.market.city.name }}</nuxt-link
          >
          /
          <nuxt-link
            class="market__breadcrumb-item"
            :to="`/markets/${merchant.market.slug}`"
            >{{ merchant.market.title }}</nuxt-link
          >/
          {{ merchant.title }}
        </div>
        <div class="market__infos">
          <a class="market__button" :href="`mailto:${useremail}`"
            >Messagerie
          </a>
          <a class="market__button" :href="`tel:${userphone}`">Telephone</a>
        </div>
        <div class="market__likes">
          <div>
            Ajouter aux favoris
            <a
              class="market__like-image"
              @click="$like(merchant.slug, 'merchants')"
              ><img
                v-if="!$liked_merchants(merchant.id)"
                src="/icons/Vector1.svg"
              />
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
        </div>
      </div>
      <div class="market__container">
        <div class="market__left">
          <div class="market-item">
            <div class="market-item__image-wrap">
              <div v-if="merchant.image">
                <img
                  class="market-item__image"
                  :src="$api_storage_url + merchant.image"
                />
              </div>
              <div v-else>
                <div v-if="merchant.activity.image">
                  <img
                    class="market-item__image"
                    :src="$api_storage_url + merchant.activity.image"
                  />
                </div>
                <div v-else>
                  <img
                    class="market-item__image"
                    :src="$api_storage_url + 'images/merchant/default/Shop.jpg'"
                  />
                </div>
              </div>
              <a v-if="isMyMerchant" class="market-item__edit edit-button">
                <img src="/icons/pen-icon.svg" />
                <input type="file" @change="onMerchantFileChange" />
              </a>
              <div class="market-item__top">
                <div v-if="merchant.today.is_open" class="market-item__tag">
                  <span></span>
                  <p>Ouvert</p>
                </div>
                <div v-else class="market-item__tag market-item__tag--red">
                  <span></span>
                  <p>Fermé</p>
                </div>
                <a
                  class="market-item__like"
                  @click="$like(merchant.slug, 'merchants')"
                >
                  <img
                    v-if="!$liked_merchants(merchant.id)"
                    src="/icons/Vector1.svg"
                  />
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
            </div>
            <!-- <div class="market-item__data">
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
            </div> -->
          </div>
          <p v-if="errors.has('image')" class="add-modal__error">
            Veuillez rajouter une image ou réduire la taille de l'image
            (inférieur à 10Mo)
          </p>
          <div class="switch hidden-mobile">
            <div class="switch__top">
              <a
                :class="[switcher === 'FIRST' ? 'active' : '']"
                class="switch__link"
                @click="switcher = 'FIRST'"
                >Localisation</a
              >
              <!-- <a
                :class="[switcher === 'SECOND' ? 'active' : '']"
                class="switch__link"
                @click="switcher = 'SECOND'"
                >Livraison</a
              > -->
              <!-- <a
                :class="[switcher === 'THIRD' ? 'active' : '']"
                class="switch__link"
                @click="switcher = 'THIRD'"
                >Click&Collect</a
              > -->
            </div>
            <div v-if="switcher === 'FIRST'">
              <p class="switch__title">Marchand : {{ merchant.title }}</p>
              <p class="switch__address">
                {{ JSON.parse(merchant.market.address).value }}
              </p>
              <!-- <p class="switch__address">
                Stand numéro : {{ merchant.address }}
              </p> -->
              <!-- <GmapMap
        :center="{
         lat: parseFloat(merchant.market.latitude),
         lng: parseFloat(merchant.market.longitude),
        }"
        :zoom="16"
        :options="options"
        class="switch__map"
       >
        <GmapMarker
         :position="{
          lat: parseFloat(merchant.market.latitude),
          lng: parseFloat(merchant.market.longitude),
         }"
         :clickable="true"
         :icon.sync="marker"
        />
       </GmapMap> -->
              <br />
            </div>
            <div v-else-if="switcher === 'SECOND'"></div>
            <div v-else-if="switcher === 'THIRD'">
              <div v-if="isMyMerchant" class="switch__box">
                <div class="switch__title">
                  <p>Click&Collect :</p>
                  <span v-if="isActive" class="switch__on">Activer</span>
                  <span v-if="!isActive" class="switch__off"> Désactiver</span>
                </div>
                <div class="switch__button">
                  <label class="switch" for="toggle_switch">
                    <input
                      id="toggle_switch"
                      v-model="checkedValue"
                      type="checkbox"
                    />
                    <span class="slider round"></span>
                  </label>
                </div>
              </div>
              <div>
                <div v-if="isActive" class="switch__container">
                  <div>
                    <svg
                      width="41"
                      height="36"
                      viewBox="0 0 41 36"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <g clip-path="url(#clip0)">
                        <path
                          d="M18.1868 36C8.13619 36 0 27.9474 0 18C0 8.05263 8.13619 0 18.1868 0C23.2918 0 28.2374 2.21053 31.5875 5.84211C31.9066 6.1579 31.9066 6.63158 31.5875 6.94737C31.2685 7.26316 30.7899 7.26316 30.4708 6.94737C24.4086 0.31579 13.8794 -0.157895 7.01946 5.84211C0.159533 11.8421 -0.319066 22.4211 5.90272 29.0526C12.1245 35.6842 22.6537 36.3158 29.3541 30.1579C32.8638 27 34.7782 22.5789 34.7782 18C34.7782 16.2632 34.4591 14.5263 33.9805 12.9474C33.821 12.4737 34.1401 12 34.4591 11.8421C34.9377 11.6842 35.4163 12 35.5759 12.3158C36.0545 14.0526 36.3735 15.9474 36.3735 17.8421C36.3735 27.9474 28.2374 36 18.1868 36Z"
                          fill="#1EC173"
                        />
                        <path
                          d="M18.187 25.2633C18.0275 25.2633 17.7084 25.2633 17.5489 25.1054L8.29594 15.9476C7.97687 15.6318 7.97687 15.1581 8.29594 14.8423C8.61501 14.5265 9.09361 14.5265 9.41267 14.8423L18.0275 23.3686L39.724 1.57913C40.043 1.26334 40.5216 1.26334 40.8407 1.57913C41.1598 1.89492 41.1598 2.3686 40.8407 2.68439L18.8251 25.1054C18.6656 25.2633 18.5061 25.2633 18.187 25.2633Z"
                          fill="#1EC173"
                        />
                      </g>
                    </svg>
                  </div>
                  <div>
                    <p class="switch__titlegreen">Click & collect</p>
                    <p class="switch__subtitle">
                      Directement dans votre marché
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="market__right">
          <div class="market__description">
            <div v-if="merchant.description">
              <p>
                {{ merchant.description }}
              </p>
            </div>
            <div v-else>
              <div v-if="isMyMerchant" class="market__buttondescription">
                <div
                  class="market__buttondescription__item"
                  @click="$nuxt.$emit('open-description-modal', merchant)"
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
            <div v-if="isMyMerchant" class="market__updatedescription">
              <div v-if="merchant.description">
                <a
                  target="_blank"
                  class="market__updatedescriptionicone"
                  @click="$nuxt.$emit('open-description-modal', merchant)"
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
              </div>
            </div>
          </div>
          <div v-if="merchant.merchant_working_time != ''" class="is-open">
            <div
              :class="[workingTimesActive ? 'active' : '']"
              class="is-open__wrap"
              @click="workingTimesActive = !workingTimesActive"
            >
              <div
                v-if="
                  merchant.today.merchant_working_time && merchant.today.is_open
                "
                class="is-open__wrap"
              >
                <span></span>
                <p class="is-open__text">Ouvert</p>
                <p class="is-open__time">
                  {{
                    $moment(
                      merchant.today.merchant_working_time.hours_start,
                      'HH:mm:ss'
                    ).format('HH:mm')
                  }}
                  -
                  {{
                    $moment(
                      merchant.today.merchant_working_time.hours_end,
                      'HH:mm:ss'
                    ).format('HH:mm')
                  }}h
                </p>
              </div>
              <div
                v-else-if="
                  (merchant.today.merchant_working_time &&
                    !merchant.today.is_open) ||
                  !merchant.today.merchant_working_time
                "
                class="is-open__wrap is-open__wrap--red"
              >
                <span></span>
                <p class="is-open__text">Fermé</p>
              </div>
              <div class="updatetime">
                <a
                  v-if="isMyMerchant"
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
              v-if="merchant.merchant_working_time.length"
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
          <div
            v-if="isMyMerchant && merchant.merchant_working_time == ''"
            class="is-open"
          >
            <div class="market__buttondescription">
              <div
                class="market__buttondescription__item"
                @click="$nuxt.$emit('open-workingtime-modal')"
              >
                <div class="market__buttondescription__button">
                  <a
                    target="_blank"
                    class="market__buttondescription__button market__buttondescription__button--add"
                  >
                  </a>
                </div>
                <div class="market__buttondescription__title">
                  <p>Ajouter mes horaires</p>
                </div>
              </div>
            </div>
          </div>
          <div class="events">
            <div v-if="merchant.events != ''" class="events__top">
              <p v-if="merchant.events != ''" class="events__title">Annonces</p>
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
            <VueSlickCarousel
              v-if="merchant.events.length"
              ref="events"
              v-bind="carousel.events"
            >
              <EventAdd v-if="isMyMerchant" />
              <EventItem
                v-for="(item, index) in merchant.events"
                :key="index"
                :event="item"
                :is-my-merchant="isMyMerchant"
              />
              <span></span>
            </VueSlickCarousel>
            <VueSlickCarousel v-else ref="events" v-bind="carousel.events">
              <EventAdd v-if="isMyMerchant" />
              <span></span>
            </VueSlickCarousel>
            <div v-if="merchant.events != ''" class="ligne"></div>
            <div v-else>
              <div v-if="isMyMerchant" class="ligne"></div>
            </div>
          </div>
          <div class="discover">
            <div v-if="merchant.products != ''" class="events__top">
              <p>Découvrez les produits</p>
              <!-- <div class="events__controllers">
                <a class="events__button" @click="$refs.categories.prev()">
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
                <a class="events__button" @click="$refs.categories.next()">
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
              </div> -->
            </div>
            <div v-if="productCategories.length">
              <CategoryAdd v-if="isMyMerchant" />
              <div v-if="isMyMerchant" class="categoryButton">
                <div v-if="productCategories.length != 'null'">
                  <div class="categoryButton__icon">
                    <a
                      target="_blank"
                      @click="$nuxt.$emit('open-listcategory-modal')"
                    >
                      <svg
                        width="35"
                        height="35"
                        viewBox="0 0 39 39"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M0 19.5C0 8.73045 8.73045 0 19.5 0C30.2696 0 39 8.73045 39 19.5C39 30.2696 30.2696 39 19.5 39C8.73045 39 0 30.2696 0 19.5Z"
                          fill="#E8E8E8"
                        />
                        <path
                          d="M26.7794 12.5909C26.5588 11.9432 26.1176 11.2955 25.2353 10.6477C24.5735 10.2159 23.9118 10 23.0294 10C22.1471 10 21.4853 10.4318 21.0441 11.0795L13.1029 22.3068C12.6618 22.5227 12.4412 23.1705 12.2206 25.7614C12 27.0568 12 28.3523 12 28.3523C12 28.3523 12 28.3523 12 28.5682C12 29 12.4412 29.2159 12.6618 29C12.6618 29 12.6618 29 12.8824 29C12.8824 29 13.9853 28.5682 15.3088 27.9205C17.7353 26.8409 18.1765 26.4091 18.3971 25.9773L26.5588 14.75C27 14.1023 27 13.4545 26.7794 12.5909ZM24.5735 11.7273C25.0147 12.1591 25.4559 12.5909 25.4559 13.0227C25.6765 13.4545 25.4559 13.8864 25.4559 14.1023C25.2353 14.3182 25.0147 14.5341 24.5735 14.5341C23.9118 14.5341 23.4706 14.3182 23.0294 13.8864C22.1471 13.4545 21.7059 12.375 22.1471 11.7273C22.5882 11.0795 23.6912 11.0795 24.5735 11.7273ZM17.2941 25.3295C17.2941 25.3295 16.8529 25.7614 14.6471 26.8409C14.2059 27.0568 13.7647 27.2727 13.3235 27.4886C13.3235 27.0568 13.3235 26.625 13.5441 25.9773C13.7647 23.3864 13.9853 22.9545 13.9853 22.9545L20.8235 13.4545C21.0441 14.1023 21.4853 14.5341 22.1471 14.9659C22.8088 15.3977 23.4706 15.6136 24.1324 15.6136L17.2941 25.3295Z"
                          fill="#6E6E6E"
                        />
                      </svg>
                    </a>
                  </div>
                </div>
              </div>
              <VueSlickCarousel ref="categories" v-bind="carousel.categories">
                <a
                  v-for="(item, index) in productCategories"
                  :key="index"
                  :class="[isFilterActive(item.id) ? 'active' : '']"
                  class="discover__item"
                  :style="{ backgroundColor: item.color }"
                  @click="filter(item.id)"
                  >{{ item.title }}</a
                >
              </VueSlickCarousel>
              <br />
            </div>
            <div v-else>
              <div v-if="isMyMerchant">
                <CategoryAdd />
              </div>
              <div v-else class="discover__wrap">
                <VueSlickCarousel>
                  <div class="discover__empty" hidden></div>
                </VueSlickCarousel>
              </div>
            </div>
          </div>
          <div class="products">
            <ProductAdd v-if="isMyMerchant" />
            <ProductItem
              v-for="(item, index) in merchant.products"
              :key="index"
              :product="item"
              :merchant="merchant"
              :marketWorkingTime="marketWorkingTime"
            />
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

// import SuggestionsProductsDropDown from '~/components/suggestions/ProductsDropDown'

Vue.filter('formatTime', function (value) {
  if (value) {
    const parts = value.split(':')
    return parts[0] + ':' + parts[1]
  }
})
export default {
  components: {
    VueSlickCarousel,
    EventItem,
    // SuggestionsProductsDropDown,
  },
  mixins: [training],
  async asyncData({ $axios, params, error }) {
    try {
      const resUnit = await $axios.$get(`units`)
      const units = resUnit.units
      const res = await $axios.$get(`merchants/${params.slug}`)
      const merchant = res.merchant
      const marketWorkingTime = res.marketWorkingTime
      const useremail = res.user[0].email
      const userphone = res.user[0].phone
      const productCategories = res.merchant.product_categories
      const options = {
        zoomControl: false,
        mapTypeControl: false,
        scaleControl: false,
        streetViewControl: false,
        rotateControl: true,
        fullscreenControl: false,
        disableDefaultUI: false,
        styles: require('~/static/json/map.json'),
      }
      return {
        merchant,
        useremail,
        userphone,
        units,
        marketWorkingTime,
        productCategories,
        options,
      }
    } catch (e) {
      error({ statusCode: 404, message: '404' })
    }
  },
  data() {
    return {
      timeError: false,
      timeErrorMsg:
        'Il semblerait que votre stand ouvre plus tôt ou ferme plus tard que les horraires de votre marché. Merci de respecter les horraires du marché.',
      categoryError: '',
      newSmothPicker: [
        {
          currentIndex: 1,
          flex: 3,
          list: [],
          onClick: this.clickOnGender,
          textAlign: 'center',
          className: 'row-group',
        },
      ],
      newSmothPickerSecond: [
        {
          currentIndex: 1,
          flex: 3,
          list: [],
          onClick: this.clickOnGender,
          textAlign: 'center',
          className: 'row-group',
        },
      ],
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
      workingTimeForm: [],
      switchButton: false,
      image: '',
      imagePreviewURL: null,
      switcher: 'FIRST',
      marker: '/icons/marker.png',
      merchant: {},
      useremail: '',
      userphone: '',
      filters: [],
      workingTimesActive: false,
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
      formDataProduct: {
        description: 'Example',
        unit_id: '',
        product_category_id: '',
      },
      formDataCategory: {
        merchant_id: '',
        title: '',
      },
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
        categories: {
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
      eventFormData: {},
      descriptionFormData: {},
      eventId: '',
      formDataImage: {},
      productCategories: [],
    }
  },
  computed: {
    isActive() {
      return this.switchButton
    },
    checkedValue: {
      get() {
        return this.switchButton
      },
      set(newValue) {
        this.switchButton = newValue
      },
    },
    isMyMerchant() {
      if (!this.$auth.loggedIn) return false
      else if (this.$auth.user.is_merchant) {
        if (this.$auth.user.merchant.length <= 1) {
          return this.$auth.user.merchant[0].id === this.merchant.id
        } else if (this.$auth.user.merchant.length > 1) {
          for (
            let index = 0;
            index < this.$auth.user.merchant.length;
            index++
          ) {
            if (this.$auth.user.merchant[index].id === this.merchant.id)
              return true
          }
        }
      }
      return false
    },
  },
  mounted() {
    this.marketWorkingTime.forEach((marketWt) => {
      let check = false
      while (!check) {
        this.merchant.merchant_working_time.forEach((merchantWt) => {
          if (marketWt.day === merchantWt.day) {
            marketWt.checked = true
            check = true
          }
        })
        if (check !== true) {
          marketWt.checked = false
          check = true
        }
      }
    })

    this.$nuxt.$on('open-description-modal', (val) => {
      this.openAddDescriptionModal(val)
    })

    this.$nuxt.$on('open-time-modal', (val) => {
      this.openAddTimeModal(val)
    })

    this.$nuxt.$on('open-event-modal', (val) => {
      this.modalBox.model = 'EVENT'
      this.modalBox.active = true
      this.modalBox.data = val
    })

    this.$nuxt.$on('open-eventadd-modal', (val) => {
      this.openAddEventModal(val)
    })

    this.$nuxt.$on('deleteEvent', (val) => {
      this.deleteEvent(val)
    })

    this.$nuxt.$on('open-add-modal', (val) => {
      this.openAddProductModal(val)
    })

    this.$nuxt.$on('open-category-modal', (val) => {
      this.openAddCategoryModal(val)
    })

    this.$nuxt.$on('open-listcategory-modal', (val) => {
      this.openListCategoryModal(val)
    })

    this.$nuxt.$on('open-workingtime-modal', (val) => {
      this.openAddTimeModal()
    })

    this.$nuxt.$on('sendSuggestions', (product) => {
      this.formDataProduct.title = product.title
      this.formDataProduct.image = product.image
      this.image = product.image
    })

    this.$nuxt.$on('sendProductTitle', (suggestionSearch) => {
      this.formDataProduct.title = suggestionSearch
    })

    this.$nuxt.$on('close-modal-box', () => {
      this.closeModal()
    })
  },
  methods: {
    updateProductCategories() {
      this.productCategories.forEach((item, index) => {
        item.sort_order = index + 1
      })

      this.$axios
        .put('products-category', {
          product_categories: this.productCategories,
        })
        .then((response) => {
          console.log(response.data)
        })
        .catch((error) => {
          console.log(error)
        })
    },
    reload() {
      window.location.reload()
    },
    filter(id) {
      const index = this.filters.findIndex((item) => item === id)
      if (index === -1) this.filters.push(id)
      else this.filters.splice(index, 1)
      this.$axios
        .get(
          `merchants/${
            this.$route.params.slug
          }?product_categories=${this.filters.join()}`
        )
        .then((res) => (this.merchant = res.data.merchant))
    },
    isFilterActive(id) {
      return this.filters.findIndex((item) => item === id) !== -1
    },

    openAddDescriptionModal(val) {
      this.modalBox.model = 'ADD_DESCRIPTION'
      this.modalBox.active = true
      if (val) {
        this.modalBox.data = val
      }
    },
    openAddTimeModal(val) {
      this.modalBox.model = 'ADD_TIME'
      this.modalBox.active = true
      if (val) {
        this.modalBox.data = val
      }
    },
    openAddEventModal(val) {
      this.modalBox.model = 'ADD_EVENT'
      this.modalBox.active = true
      this.modalBox.data = val
    },
    openAddProductModal(val) {
      this.modalBox.model = 'ADD_PRODUCT'
      this.modalBox.active = true
      if (val) {
        this.modalBox.data = val
      }
    },
    openAddCategoryModal(val) {
      this.modalBox.model = 'ADD_CATEGORY'
      this.modalBox.active = true
      if (val) {
        this.modalBox.data = val
      } else {
        this.modalBox.data = ''
      }
    },
    openListCategoryModal(val) {
      this.modalBox.model = 'LIST_CATEGORY'
      this.modalBox.active = true
      if (val) {
        this.modalBox.data = val
      }
    },
    closeModal() {
      this.modalBox.model = ''
      this.modalBox.active = false
      this.modalBox.data = ''
    },

    async submitEvent() {
      this.eventFormData.merchant_id = this.merchant.id
      try {
        const newEvent = await this.$axios.post('events', this.eventFormData)
        this.merchant.events.push(newEvent.data)
        this.eventFormData.title = ''
        this.eventFormData.description = ''
        this.modalBox.active = false
      } catch (e) {
        this.errors.record(e.response.data.errors)
      }
    },
    async updateEvent() {
      this.eventId = this.modalBox.data.id
      this.eventFormData.title = this.modalBox.data.title
      this.eventFormData.description = this.modalBox.data.description
      this.eventFormData.merchant_id = this.merchant.id
      try {
        await this.$axios.patch('events/' + this.eventId, this.eventFormData)
        this.eventFormData.merchant_id = ''
        this.eventFormData.title = ''
        this.eventFormData.description = ''
        this.errors.clear('title')
        this.errors.clear('description')
        this.closeModal()
      } catch (e) {
        this.errors.record(e.response.data.errors)
      }
    },
    async deleteEvent(val) {
      const eventId = val.id
      const index = this.merchant.events.indexOf(val)
      try {
        await this.$axios.delete('events/' + eventId)
        this.merchant.events.splice(index, 1)
      } catch (e) {
        this.errors.record(e.response.data.errors)
      }
    },

    async updateDescription() {
      this.descriptionFormData.description = this.modalBox.data.description
      this.descriptionFormData.id = this.merchant.id
      try {
        await this.$axios.post(
          'merchant-profiles/description',
          this.descriptionFormData
        )
        this.closeModal()
      } catch (e) {
        this.errors.record(e.response.data.errors)
      }
    },

    async submitProduct() {
      this.formDataProduct.merchant_id = this.merchant.id
      let newproduct = {}
      try {
        await this.$axios
          .post('products', this.formDataProduct)
          .then((response) => {
            newproduct = response.data.product
            if (newproduct) {
              newproduct.unit = {
                id: this.units[newproduct.unit_id - 1].id,
                unit: this.units[newproduct.unit_id - 1].unit,
              }
              this.merchant.products.push(newproduct)
              this.formDataProduct.title = ''
              this.image = ''
              this.formDataProduct.unit_id = ''
              this.formDataProduct.unit_quantity = ''
              this.formDataProduct.price = ''
              this.formDataProduct.product_category_id = ''
              this.modalBox.active = false
            }
          })
      } catch (e) {
        this.errors.record(e.response.data.errors)
      }
    },
    async updateProduct() {
      this.productId = this.modalBox.data.id
      this.formDataProduct = this.modalBox.data
      this.formDataProduct.merchant_id = this.merchant.id
      try {
        await this.$axios.patch(
          'products/' + this.productId,
          this.formDataProduct
        )
        this.modalBox.active = false
      } catch (e) {
        this.errors.record(e.response.data.errors)
      }
    },
    async deleteProduct() {
      const productId = this.modalBox.data.id
      const product = this.modalBox.data
      const index = this.merchant.products.indexOf(product)
      try {
        await this.$axios.delete('products/' + productId)
        this.merchant.products.splice(index, 1)
        this.modalBox.active = false
      } catch (e) {
        this.errors.record(e.response.data.errors)
      }
    },
    async createProductImage(e) {
      const file = e.target.files || e.dataTransfer.files
      if (!file.length) return
      const formData = new FormData()
      formData.append('image', file[0])
      try {
        const res = await this.$axios.post('product/image', formData)
        this.image = res.data
        this.formDataProduct.image = res.data
        this.errors.clear('image')
      } catch (e) {
        this.errors.record(e.response.data.errors)
      }
    },
    async updateProductImage(e) {
      const file = e.target.files || e.dataTransfer.files
      if (!file.length) return
      const formData = new FormData()
      formData.append('image', file[0])
      try {
        const res = await this.$axios.post('product/image', formData)
        this.image = res.data
        this.modalBox.data.image = res.data
      } catch (e) {
        this.errors.record(e.response.data.errors)
      }
    },

    async addCategory() {
      this.formDataCategory.merchant_id = this.merchant.id
      try {
        const category = await this.$axios.post(
          'products-category',
          this.formDataCategory
        )
        this.productCategories.push(category.data)
        this.modalBox.active = false
        this.formDataCategory.title = ''
      } catch (e) {
        this.errors.record(e.response.data.errors)
      }
    },
    async updateCategory() {
      this.categoryId = this.modalBox.data.id
      this.formDataCategory = this.modalBox.data
      try {
        await this.$axios.put(
          'products-category/' + this.categoryId,
          this.formDataCategory
        )
        this.modalBox.active = false
        this.modalBox.data.title = ''
      } catch (e) {
        this.errors.record(e.response.data.errors)
      }
    },
    async deleteCategory(item, index) {
      const categoryId = item.id
      this.categoryError = ''
      try {
        await this.$axios.delete('products-category/' + categoryId)
        this.merchant.product_categories.splice(index, 1)
      } catch (e) {
        if (e.response.data.message) {
          this.categoryError =
            'Cette catégorie est liée à des produits, supprimer ou changer la catégorie des produits concernés.'
        }
      }
    },

    removeImage(e) {
      if (this.image) {
        this.image = ''
      } else {
        this.modalBox.data.image = ''
      }
    },

    onMerchantFileChange(event) {
      this.errors.clear('image')
      this.formDataImage.image = event.target.files[0]
      this.updateImage()
    },
    async updateImage() {
      const formData = new FormData()
      formData.append('image', this.formDataImage.image)
      try {
        const res = await this.$axios.post('merchant-profiles/image', formData)
        this.formDataImage.image = ''
        this.merchant.image = res.data
        this.errors.clear('image')
      } catch (e) {
        this.errors.record(e.response.data.errors)
      }
    },
    submitTime() {
      const checkedWorkingTime = []
      const uncheckedWorkingTime = []
      this.marketWorkingTime.forEach((marketWt) => {
        if (marketWt.checked === true) {
          checkedWorkingTime.push(marketWt)
        } else {
          uncheckedWorkingTime.push(marketWt)
        }
      })
      this.$axios
        .post('merchant-profiles/working-times', {
          workingTimes: checkedWorkingTime,
          remove: uncheckedWorkingTime,
          merchantId: this.merchant.id,
        })
        .then(() => {
          this.workingTimeModal.active = false
          this.$axios
            .$get(`merchants/${this.merchant.slug}`)
            .then((res) => (this.merchant = res.merchant))
        })
    },
    getWorkingTime(day) {
      return this.merchant.merchant_working_time.find(
        (item) => item.day === day
      )
    },
    isToday(day) {
      if (this.merchant.today.merchant_working_time) {
        if (
          day.value.toUpperCase() ===
          this.merchant.today.merchant_working_time.day.toUpperCase()
        ) {
          return true
        }
        return false
      }
      return false
    },
  },
}
</script>

<style lang="scss" scoped>
@media screen and (max-width: 1024px) {
  .hidden-mobile {
    display: none;
  }
}
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
    margin: 45px auto 0 auto;
    border: none;
    &:hover {
      opacity: 0.95;
    }
  }
}
.image {
  width: 100%;
  height: 210px;
  overflow: hidden;
  background: #ffffff;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
  border-radius: 15px 15px 0px 0px;
  margin: 14px 0px 0px 0px;

  &:focus {
    outline: none !important;
  }

  &__button-wrap {
    width: 100%;
    height: 185px;
    border-radius: 15px 15px 0px 0px;
    overflow: hidden;
    background: #e8e8e8;
    img {
      width: 100%;
    }
  }

  &__button {
    width: 64px;
    height: 64px;
    display: flex;
    justify-content: center;
    align-items: center;
    border: 1.5px solid #6e6e6e;
    border-radius: 50%;
    position: relative;
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
  &__data {
    width: 100%;
    height: 25px;
    position: relative;
    display: flex;
    text-align: center;
    background: #f1f1f1;
  }

  &__span {
    width: 293px;
    position: absolute;
    font-family: Open Sans;
    font-style: normal;
    font-weight: normal;
    font-size: 12px;
    line-height: 16px;
    color: #6f6f6f;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }

  &__wrap {
    width: 293px;
    margin: 0 auto;
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
    position: relative;
  }

  &__title {
    text-shadow: 3px 3px #3b1099;
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

  &__subtitle {
    text-shadow: 2px 2px #4caf50;
    font-family: Open Sans;
    font-style: normal;
    font-weight: normal;
    font-size: 25px;
    line-height: 34px;
    color: #ffffff;
    text-align: center;
  }

  &__icon {
    width: 100px;
    height: 100px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    position: absolute;
    bottom: -45px;
    left: 50%;
    transform: translateX(-50%);
  }

  &__column {
    width: 100%;
    display: flex;
    margin: 10px 0;
    @media screen and (max-width: 1024px) {
      margin-top: 45px;
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
    text-decoration: none;
    @media screen and (max-width: 769px) {
      text-align: center;
      font-size: 12px;
      line-height: 18px;
    }
  }

  &__breadcrumb-item {
    text-decoration: none;
    color: #9a9a9a;
  }

  &__infos {
    display: flex;
    margin-left: auto;
    @media screen and (max-width: 769px) {
      display: flex;
    }
  }

  &__likes-stars {
    display: flex;
    margin-left: auto;
  }

  &__button {
    border: 1px solid #9a9a9a;
    box-sizing: border-box;
    border-radius: 30px;
    font-family: Open Sans;
    font-style: normal;
    font-weight: normal;
    font-size: 15px;
    line-height: 20px;
    color: #9a9a9a;
    padding: 7px 29px 9px 29px;
    cursor: pointer;
    margin-right: 12px;
    text-decoration: none;
    display: table;
    transition: background-color 0.125s;
    &:hover {
      background: rgba(196, 196, 196, 0.15);
    }
    @media screen and (max-width: 769px) {
      font-size: 9px;
      line-height: 12px;
      margin-bottom: 10px;
      width: 49%;
      text-align: center;
      margin-top: 10px;
    }
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
    @media screen and (max-width: 769px) {
      width: 100%;
      justify-content: center;
    }
  }

  &__like-image {
    cursor: pointer;
    display: flex;
    justify-content: center;
    @media screen and (max-width: 769px) {
      margin-right: auto;
      margin-top: 5px;
    }
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
  }

  &__container {
    display: grid;
    grid-template-columns: 290px calc(100% - 340px);
    grid-gap: 50px;

    @media screen and (max-width: 1024px) {
      grid-template-columns: 100%;
    }
  }

  &__left {
  }

  &__right {
  }

  &__description {
    display: flex;
    margin-bottom: 10px;
    p {
      font-family: Open Sans;
      font-style: normal;
      font-weight: normal;
      font-size: 17px;
      line-height: 23px;
      color: #9a9a9a;
    }
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

  &__updatedescription {
    margin-left: auto;
    display: flex;
  }

  &__updatedescriptionicone {
    cursor: pointer;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    background: #e8e8e8;
    width: 33px;
    height: 33px;
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

    &__error {
      font-family: Montserrat, serif;
      color: #ff3333;
      font-size: 13px;
      padding-left: 11px;
      margin-top: 6px;
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
        background: rgba(145, 42, 29, 0.99);
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
      img {
        object-fit: cover;
      }
    }

    &__edit {
      position: absolute;
      bottom: 15px;
      right: 0;
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

  .event-modal {
    width: 100%;
    max-width: 769px;
    border-radius: 30px;
    @media screen and (max-width: 769px) {
      width: 120px;
    }

    &__header {
      margin: -35px -60px 45px -60px;
      background: #feb42b;
      padding: 12px;
      border-top-left-radius: 30px;
      border-top-right-radius: 30px;
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
      border-top-left-radius: 30px;
      border-top-right-radius: 30px;
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

  .add-modal {
    width: 100%;
    max-width: 350px;
    max-height: 800px;
    border-radius: 20px;
    &__savedeletebutton {
      text-align: center;
      .deleteProduct {
        font-family: Open Sans;
        font-style: normal;
        font-weight: 400;
        font-size: 13px;
        text-decoration: underline;
        line-height: 19px;
        color: red;
        cursor: pointer;
        background-color: #ffffff;
        border: none;
      }
    }
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
      color: #565656;
      font-weight: 600;
      font-size: 14px;
    }

    &__form {
      margin-top: 37px;
      &-price {
        display: flex;
        width: 100%;
        margin-top: 14px;
        height: 43px;
        justify-content: center;
        justify-items: center;
        .euro {
          font-family: Open Sans;
          font-style: normal;
          color: #565656;
          font-weight: 600;
          font-size: 30px;
          margin: 0px 4px;
          height: 43px;
        }
        .unit {
          font-family: Open Sans;
          font-style: normal;
          color: #565656;
          font-weight: 600;
          font-size: 22px;
          margin: auto;
          margin-left: 15px;
        }
      }
      &-priceInput {
        text-align: center;
        display: block;
        max-width: 125px;
        box-sizing: border-box;
        border: none;
        border-radius: 7px;
        font-size: 16px;
        padding-left: 25px;
        background: #f3f3f3;
      }
      &-quantities {
        width: 100%;
        text-align: center;
        margin-top: 14px;
        height: 43px;
      }
      &-input {
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
        font-size: 16px;

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
      }

      &-shortinput {
        background: #f3f3f3;
        width: 49%;
        height: 100%;
        box-sizing: border-box;
        border: none;
        font-size: 16px;
        border-radius: 7px;
        padding-left: 25px;
      }

      &-text {
        text-align: center;
        font-family: Montserrat, serif;
        font-style: normal;
        font-weight: 300;
        font-size: 14px;
        line-height: 17px;
        color: #565656;
        margin-top: 15px;
      }

      &-textinput {
        display: block;
        margin: 0 auto;
        width: 350px;
        height: 200px;
        box-sizing: border-box;
        border: none;
        border-radius: 7px;
        padding-left: 25px;
        margin-top: 14px;
        font-size: 14px;
        font-family: Open Sans;
        font-style: normal;
        background: #f3f3f3;
      }

      &-button {
        display: block;
        margin: 50px auto 20px auto;
        max-width: 300px;
        padding: 8px 44px 10px 44px;
        background: #3b1099;
        border-radius: 30px;
        text-align: center;
        font-family: Montserrat, serif;
        font-style: normal;
        font-weight: 600;
        font-size: 14px;
        line-height: 17px;
        cursor: pointer;
        color: #ffffff;
        border: none;
      }
    }

    &__error {
      font-family: Montserrat, serif;
      color: #ff3333;
      font-size: 13px;
      padding-left: 11px;
      margin-top: 6px;
    }
  }

  .description-modal {
    width: 100%;
    max-width: 356px;
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
      font-size: 16px;
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
  .scrollable {
    overflow: scroll;
    overflow-x: hidden;
    max-height: 750px;
    margin-bottom: 10px;
    margin-top: 10px;
  }

  .scrollable::-webkit-scrollbar {
    display: none;
  }
  .listcategory-modal {
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
    &__add {
      display: flex;
      justify-content: center;
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

    &__form {
      width: 270px;
      max-height: 800px;
      margin-top: 30px;
      font-family: Open Sans;
      font-style: normal;
      font-weight: normal;
      font-size: 14px;
      line-height: 19px;
      color: #9a9a9a;
      &-line {
        height: 30px;
        border-bottom: 1px solid #e6e6e6;
        margin-bottom: 15px;
      }
      &-input {
        width: 30%;
        text-align: left;
        input {
          height: 16px;
          width: 16px;
        }
      }
      &-day {
        width: 30%;
        text-align: center;
        // border: blue 1px solid;
      }
      &-time {
        .textLight {
          color: #3b1099;
        }
      }
      &-button {
        text-align: center;
        button {
          cursor: pointer;
          width: 50%;
          height: 36px;
          background: #3b1099;
          color: white;
          box-shadow: 0px 6px 4px rgba(0, 0, 0, 0.05);
          border-radius: 30px;
          border: none;
        }
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
    &__box {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    &__top {
      margin-bottom: 10px;
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      justify-items: center;
      padding: 2px 0;
    }

    &__container {
      display: flex;
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
      display: flex;
      font-family: Open Sans;
      font-style: normal;
      font-weight: 600;
      font-size: 16px;
      line-height: 22px;
      color: #2c2c2c;
    }

    &__titlegreen {
      color: #1ec173;
      font-family: Open Sans;
      font-style: normal;
      font-weight: 600;
      font-size: 16px;
      line-height: 22px;
    }

    &__subtitle {
      font-family: Open Sans;
      font-style: normal;
      font-weight: normal;
      font-size: 12px;
      line-height: 16px;
      color: #9a9a9a;
    }

    &__on {
      margin-left: 8px;
      font-family: Open Sans;
      font-style: normal;
      font-weight: normal;
      font-size: 16px;
      text-transform: capitalize;
      color: #1ec173;
    }
    &__off {
      margin-left: 8px;
      font-family: Open Sans;
      font-style: normal;
      font-weight: normal;
      font-size: 16px;
      text-transform: capitalize;
      color: #d00505;
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

    &__button {
      display: flex;
      margin-left: auto;
      .switch {
        position: relative;
        display: flex;
        width: 70px;
        height: 34px;
      }
      .switch input {
        opacity: 0;
        width: 0;
        height: 0;
      }
      .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ddd6ec;
        border: solid 1px #3b1099;
        -webkit-transition: 0.4s;
        transition: 0.4s;
      }

      .slider:before {
        position: absolute;
        content: '';
        height: 32px;
        width: 32px;
        background-color: white;
        -webkit-transition: 0.4s;
        transition: 0.4s;
      }

      input:checked + .slider {
        background-color: #3b1099;
      }

      input:focus + .slider {
        box-shadow: 0 0 1px #3b1099;
      }

      input:checked + .slider:before {
        -webkit-transform: translateX(36px);
        -ms-transform: translateX(36px);
        transform: translateX(36px);
      }

      /* Rounded sliders */
      .slider.round {
        border-radius: 34px;
      }

      .slider.round:before {
        border-radius: 50%;
      }
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
      &.active img {
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
  }

  .events {
    .ligne {
      border-bottom: 1px solid #e4e4e4;
    }
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
      @media screen and (max-width: 769px) {
        font-size: 20px;
      }
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

  .categoryButton {
    float: left;
    display: flex;
    height: 39px;
    width: 10%;
    margin-right: 20px;
    // width: 20%; //Avec tous les button
    justify-content: center;
    align-items: center;
    &__icon {
      margin: 0 10px;
    }
    a {
      cursor: pointer;
    }
  }

  .category {
    margin-right: 20px;
  }

  .listcategory {
    width: 270px;
    display: flex;
    margin: 0 10px;
    padding: 5px;
    border-bottom: 1px solid #e6e6e6;
    cursor: grabbing;
    align-items: center;
    &__ghost {
      background: rgba(0, 0, 0, 0.1);
    }
    &__title {
      align-items: center;
      font-family: Open Sans;
      font-style: normal;
      font-weight: normal;
      font-size: 14px;
      line-height: 19px;
      text-transform: capitalize;
      color: #9a9a9a;
    }
    &__button {
      align-items: center;
      display: flex;
      margin-right: 15px;
      margin-left: auto;
      cursor: pointer;
    }
    &__button-update {
      z-index: 4;
      button {
        border: none;
        background: none;
      }
    }
    &__button-drag {
      margin-left: 5px;
    }

    hr {
      margin-bottom: auto;
    }
  }

  .discover {
    margin-top: 20px;

    p {
      font-family: Open Sans;
      font-style: normal;
      font-weight: 600;
      font-size: 25px;
      line-height: 34px;
      color: #565656;
      border-top: 1px solid #e4e4e4;
      @media screen and (max-width: 769px) {
        font-size: 20px;
      }
    }

    &__carousel {
    }

    &__item {
      width: fit-content !important;
      height: 39px;
      border: 1px solid #c4c4c4;
      box-sizing: border-box;
      border-radius: 30px;
      display: flex !important;
      justify-content: center;
      align-items: center;
      font-family: Open Sans;
      font-style: normal;
      font-weight: 600;
      font-size: 14px;
      line-height: 19px;
      text-transform: capitalize;
      padding: 0 20px;
      margin-right: 6px;
      color: #c4c4c4;
      white-space: nowrap;
      cursor: pointer;
      &.active {
        color: #5017b1;
        border-color: #7151b8;
      }
      &:focus {
        outline: none;
      }
    }

    &__empty {
      width: calc(100% - 20px) !important;
      height: 39px !important;
      padding: 0 20px;
      display: flex !important;
      justify-content: center;
    }
  }
  .products {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-gap: 30px;
    grid-row-gap: 48px;

    &__border {
      border-bottom: 1px solid #e4e4e4;
      padding: 25px 0 8px 0;
    }

    @media screen and (max-width: 1216px) {
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
  .merchantcompleted {
    font-family: Open Sans;
    font-style: normal;
    font-weight: 600;
    text-align: center;
    font-size: 20px;
    color: #3b1099;
    margin-bottom: 20px;
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
</style>

<style lang="scss">
.slick-slider {
  position: inherit !important;
  display: block !important;
}
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
</style>
