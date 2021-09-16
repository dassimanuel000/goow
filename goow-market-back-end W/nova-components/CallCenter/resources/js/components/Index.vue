<template>
  <div>
    <heading class="mb-6">Call Center</heading>
    <div class="relative">
      <div class="mb-3"></div>
      <form autocomplete="off" @submit.prevent="submit">
        <div class="mb-8">
          <div class="card">
            <div class="flex items-center py-3 border-b border-50">
              <div class="flex items-center">
                <div class="px-3">
                  <h1 class="title">Stock</h1>
                </div>
              </div>
            </div>
            <div class="flex border-b border-40 remove-bottom-border">
              <div class="w-1/5 px-8 py-6">
                <label for="shop" class="inline-block text-80 pt-2 leading-tight">
                  Stock

                  <span class="text-danger text-sm">*</span>
                </label>
              </div>
              <div class="py-6 px-8 w-1/2">
                <div class="flex items-center mb-3">
                  <!---->
                  <select data-testid="shops-select" dusk="shop" class="form-control form-select w-full" v-model="selectedStock" @change="init">
                    <option value="" selected="selected" disabled="disabled">—</option>
                    <option value="3" v-for="(item, index) in stocks" :key="index" :value="item.name">{{ item.name }}</option>
                  </select>
                  <!---->
                </div>
                <div class="v-portal" transition="fade-transition" style="display: none;"></div>
                <!---->
                <!---->
                <div class="help-text help-text mt-2"></div>
              </div>
            </div>
          </div>

          <div v-if="selectedStock">

            <br />

            <div class="card">
              <div class="flex items-center py-3 border-b border-50">
                <div class="flex items-center">
                  <div class="px-3">
                    <h1 class="title">User</h1>
                  </div>
                </div>
              </div>
              <div class="flex border-b border-40">
                <div class="w-1/5 px-8 py-6">
                  <label for="personal_title" class="inline-block text-80 pt-2 leading-tight">
                    Email

                    <span class="text-danger text-sm">*</span>
                  </label>
                </div>
                <div class="py-6 px-8 w-1/2" style="display: flex; ">
                  <div class="w-2/3">
                    <input id="email" dusk="email" list="email-list" type="email" placeholder="Email" class="w-full form-control form-input form-input-bordered" :class="[errors.has('user.email') ? 'border-danger' : '']" v-model="formData.user.email" @input="errors.clear('user.email')" />
                    <!---->
                    <div class="help-text help-text mt-2 text-danger">
                      {{ errors.get('user.email') }}
                    </div>
                  </div>
                  <div class="w-1/3" style="display: flex; justify-content: flex-end; ">
                    <button type="button" class="btn btn-default btn-primary inline-flex items-center relative" @click="findUser">
                    <span class="">
                        Find
                    </span>
                      <!---->
                    </button>
                  </div>
                </div>
              </div>
              <div class="flex border-b border-40">
                <div class="w-1/5 px-8 py-6">
                  <label for="first_name" class="inline-block text-80 pt-2 leading-tight">
                    First Name

                    <span class="text-danger text-sm">*</span>
                  </label>
                </div>
                <div class="py-6 px-8 w-1/2">
                  <input id="first_name" dusk="first_name" list="first_name" type="text" placeholder="First Name" class="w-full form-control form-input form-input-bordered" :class="[errors.has('user.first_name') ? 'border-danger' : '']" v-model="formData.user.first_name" @input="errors.clear('user.first_name')" />
                  <!---->
                  <!---->
                  <div class="help-text help-text mt-2 text-danger">
                    {{ errors.get('user.first_name') }}
                  </div>
                </div>
              </div>
              <div class="flex border-b border-40">
                <div class="w-1/5 px-8 py-6">
                  <label for="last_name" class="inline-block text-80 pt-2 leading-tight">
                    Last Name

                    <span class="text-danger text-sm">*</span>
                  </label>
                </div>
                <div class="py-6 px-8 w-1/2">
                  <input id="last_name" dusk="last_name" list="last_name" type="text" placeholder="Last Name" class="w-full form-control form-input form-input-bordered" :class="[errors.has('user.last_name') ? 'border-danger' : '']" v-model="formData.user.last_name" @input="errors.clear('user.last_name')" />
                  <!---->
                  <!---->
                  <div class="help-text help-text mt-2 text-danger">
                    {{ errors.get('user.last_name') }}
                  </div>
                </div>
              </div>
              <div class="flex border-b border-40">
                <div class="w-1/5 px-8 py-6">
                  <label for="personal_title" class="inline-block text-80 pt-2 leading-tight">
                    Personal Title

                    <span class="text-danger text-sm">*</span>
                  </label>
                </div>
                <div class="py-6 px-8 w-1/2">
                  <select id="personal_title" dusk="personal_title" class="w-full form-control form-select" :class="[errors.has('user.personal_title') ? 'border-danger' : '']" v-model="formData.user.personal_title" @change="errors.clear('user.personal_title')">
                    <option value="" selected="selected" disabled="disabled">Choose an option</option>
                    <option value="Gdin">Gdin </option>
                    <option value="Gđa">Gđa </option>
                  </select>
                  <!---->
                  <div class="help-text help-text mt-2 text-danger">
                    {{ errors.get('user.personal_title') }}
                  </div>
                </div>
              </div>
              <div class="flex border-b border-40">
                <div class="w-1/5 px-8 py-6">
                  <label for="email" class="inline-block text-80 pt-2 leading-tight">
                    Company
                  </label>
                </div>
                <div class="py-6 px-8 w-1/2">
                  <input id="email" dusk="email" list="email-list" type="text" placeholder="Company" class="w-full form-control form-input form-input-bordered" :class="[errors.has('user.company') ? 'border-danger' : '']" v-model="formData.user.company" @input="errors.clear('user.company')" />
                  <!---->
                  <!---->
                  <div class="help-text help-text mt-2 text-danger">
                    {{ errors.get('user.company') }}
                  </div>
                </div>
              </div>
            </div>

            <br />

            <div class="card">
              <div class="flex items-center py-3 border-b border-50">
                <div class="flex items-center">
                  <div class="px-3">
                    <h1 class="title">Payment Address</h1>
                  </div>
                </div>
              </div>
              <div class="flex border-b border-40">
                <div class="w-1/5 px-8 py-6">
                  <label for="shop" class="inline-block text-80 pt-2 leading-tight">
                    Country

                    <span class="text-danger text-sm">*</span>
                  </label>
                </div>
                <div class="py-6 px-8 w-1/2">
                  <div class="flex items-center mb-3">
                    <!---->
                    <select data-testid="shops-select" dusk="shop" class="form-control form-select w-full" v-model="formData.paymentAddress.country" :class="[errors.has('paymentAddress.country') ? 'border-danger' : '']">
                      <option value="" selected="selected" disabled="disabled">—</option>
                      <option value="3" v-for="(item, index) in countries" :key="index" :value="item.name">{{ item.name }} </option>
                    </select>
                    <!---->
                  </div>
                  <div class="v-portal" transition="fade-transition" style="display: none;"></div>
                  <!---->
                  <!---->
                  <div class="help-text help-text mt-2"></div>
                  <div class="help-text help-text mt-2 text-danger">
                    {{ errors.get('paymentAddress.country') }}
                  </div>
                </div>
              </div>
              <div class="flex border-b border-40">
                <div class="w-1/5 px-8 py-6">
                  <label for="first_name" class="inline-block text-80 pt-2 leading-tight">
                    Address

                    <span class="text-danger text-sm">*</span>
                  </label>
                </div>
                <div class="py-6 px-8 w-1/2">
                  <input id="address" dusk="address" list="address-list" type="text" placeholder="Address" class="w-full form-control form-input form-input-bordered" :class="[errors.has('paymentAddress.address') ? 'border-danger' : '']" v-model="formData.paymentAddress.address" @input="errors.clear('paymentAddress.address')" />
                  <div class="help-text help-text mt-2 text-danger">
                    {{ errors.get('paymentAddress.address') }}
                  </div>
                </div>
              </div>
              <div class="flex border-b border-40">
                <div class="w-1/5 px-8 py-6">
                  <label for="first_name" class="inline-block text-80 pt-2 leading-tight">
                    City

                    <span class="text-danger text-sm">*</span>
                  </label>
                </div>
                <div class="py-6 px-8 w-1/2">
                  <input id="address" dusk="address" list="address-list" type="text" placeholder="City" class="w-full form-control form-input form-input-bordered" :class="[errors.has('paymentAddress.city') ? 'border-danger' : '']" v-model="formData.paymentAddress.city" @input="errors.clear('paymentAddress.city')" />
                  <div class="help-text help-text mt-2 text-danger">
                    {{ errors.get('paymentAddress.city') }}
                  </div>
                </div>
              </div>
              <div class="flex border-b border-40">
                <div class="w-1/5 px-8 py-6">
                  <label for="first_name" class="inline-block text-80 pt-2 leading-tight">
                    Postal Code

                    <span class="text-danger text-sm">*</span>
                  </label>
                </div>
                <div class="py-6 px-8 w-1/2">
                  <input id="address" dusk="address" list="address-list" type="number" placeholder="Postal Code" class="w-full form-control form-input form-input-bordered" :class="[errors.has('paymentAddress.postal_code') ? 'border-danger' : '']" v-model="formData.paymentAddress.postal_code" @input="errors.clear('paymentAddress.postal_code')" />
                  <div class="help-text help-text mt-2 text-danger">
                    {{ errors.get('paymentAddress.postal_code') }}
                  </div>
                </div>
              </div>
              <div class="flex border-b border-40">
                <div class="w-1/5 px-8 py-6">
                  <label for="first_name" class="inline-block text-80 pt-2 leading-tight">
                    Phone

                    <span class="text-danger text-sm">*</span>
                  </label>
                </div>
                <div class="py-6 px-8 w-1/2">
                  <input id="address" dusk="address" list="address-list" type="text" placeholder="Phone" class="w-full form-control form-input form-input-bordered" :class="[errors.has('paymentAddress.phone') ? 'border-danger' : '']" v-model="formData.paymentAddress.phone" @input="errors.clear('paymentAddress.phone')" />
                  <div class="help-text help-text mt-2 text-danger">
                    {{ errors.get('paymentAddress.phone') }}
                  </div>
                </div>
              </div>
              <div class="flex border-b border-40">
                <div class="w-1/5 px-8 py-6">
                  <label for="same_for_delivery" class="inline-block text-80 pt-2 leading-tight">
                    Same For Delivery

                    <span class="text-danger text-sm">*</span>
                  </label>
                </div>
                <div class="py-6 px-8 w-1/2">
                  <input type="checkbox" class="checkbox mt-2" id="same_for_delivery" name="Same For Delivery" v-model="formData.paymentAddress.same_for_delivery" />
                  <!---->
                  <div class="help-text help-text mt-2"></div>
                </div>
              </div>
            </div>

            <br />

            <div v-if="!formData.paymentAddress.same_for_delivery" class="card">
              <div class="flex items-center py-3 border-b border-50">
                <div class="flex items-center">
                  <div class="px-3">
                    <h1 class="title">Delivery Address</h1>
                  </div>
                </div>
              </div>
              <div class="flex border-b border-40">
                <div class="w-1/5 px-8 py-6">
                  <label for="shop" class="inline-block text-80 pt-2 leading-tight">
                    Country

                    <span class="text-danger text-sm">*</span>
                  </label>
                </div>
                <div class="py-6 px-8 w-1/2">
                  <div class="flex items-center mb-3">
                    <!---->
                    <select data-testid="shops-select" dusk="shop" class="form-control form-select w-full" v-model="formData.deliveryAddress.country" :class="[errors.has('deliveryAddress.country') ? 'border-danger' : '']">
                      <option value="" selected="selected" disabled="disabled">—</option>
                      <option value="3" v-for="(item, index) in countries" :key="index" :value="item.name">{{ item.name }} </option>
                    </select>
                    <!---->
                  </div>
                  <div class="v-portal" transition="fade-transition" style="display: none;"></div>
                  <!---->
                  <!---->
                  <div class="help-text help-text mt-2"></div>
                  <div class="help-text help-text mt-2 text-danger">
                    {{ errors.get('deliveryAddress.country') }}
                  </div>
                </div>
              </div>
              <div class="flex border-b border-40">
                <div class="w-1/5 px-8 py-6">
                  <label for="first_name" class="inline-block text-80 pt-2 leading-tight">
                    Address

                    <span class="text-danger text-sm">*</span>
                  </label>
                </div>
                <div class="py-6 px-8 w-1/2">
                  <input id="address" dusk="address" list="address-list" type="text" placeholder="Address" class="w-full form-control form-input form-input-bordered" :class="[errors.has('deliveryAddress.address') ? 'border-danger' : '']" v-model="formData.deliveryAddress.address" @input="errors.clear('deliveryAddress.address')" />
                  <div class="help-text help-text mt-2 text-danger">
                    {{ errors.get('deliveryAddress.address') }}
                  </div>
                </div>
              </div>
              <div class="flex border-b border-40">
                <div class="w-1/5 px-8 py-6">
                  <label for="first_name" class="inline-block text-80 pt-2 leading-tight">
                    City

                    <span class="text-danger text-sm">*</span>
                  </label>
                </div>
                <div class="py-6 px-8 w-1/2">
                  <input id="address" dusk="address" list="address-list" type="text" placeholder="City" class="w-full form-control form-input form-input-bordered" :class="[errors.has('deliveryAddress.city') ? 'border-danger' : '']" v-model="formData.deliveryAddress.city" @input="errors.clear('deliveryAddress.city')" />
                  <div class="help-text help-text mt-2 text-danger">
                    {{ errors.get('deliveryAddress.city') }}
                  </div>
                </div>
              </div>
              <div class="flex border-b border-40">
                <div class="w-1/5 px-8 py-6">
                  <label for="first_name" class="inline-block text-80 pt-2 leading-tight">
                    Postal Code

                    <span class="text-danger text-sm">*</span>
                  </label>
                </div>
                <div class="py-6 px-8 w-1/2">
                  <input id="address" dusk="address" list="address-list" type="number" placeholder="Postal Code" class="w-full form-control form-input form-input-bordered" :class="[errors.has('deliveryAddress.postal_code') ? 'border-danger' : '']" v-model="formData.deliveryAddress.postal_code" @input="errors.clear('deliveryAddress.postal_code')" />
                  <div class="help-text help-text mt-2 text-danger">
                    {{ errors.get('deliveryAddress.postal_code') }}
                  </div>
                </div>
              </div>
              <div class="flex border-b border-40">
                <div class="w-1/5 px-8 py-6">
                  <label for="first_name" class="inline-block text-80 pt-2 leading-tight">
                    Phone

                    <span class="text-danger text-sm">*</span>
                  </label>
                </div>
                <div class="py-6 px-8 w-1/2">
                  <input id="address" dusk="address" list="address-list" type="text" placeholder="Phone" class="w-full form-control form-input form-input-bordered" :class="[errors.has('deliveryAddress.phone') ? 'border-danger' : '']" v-model="formData.deliveryAddress.phone" @input="errors.clear('paymentAddress.phone')" />
                  <div class="help-text help-text mt-2 text-danger">
                    {{ errors.get('deliveryAddress.phone') }}
                  </div>
                </div>
              </div>
            </div>

            <div class="card">
              <div class="flex items-center py-3 border-b border-50">
                <div class="flex items-center">
                  <div class="px-3">
                    <h1 class="title">Products</h1>
                  </div>
                </div>
              </div>
              <div class="flex border-b border-40">
                <div class="w-1/5 px-8 py-6">
                  <label for="personal_title" class="inline-block text-80 pt-2 leading-tight">
                    Product

                    <span class="text-danger text-sm">*</span>
                  </label>
                </div>
                <div class="py-6 px-8 w-1/2">
                  <select id="personal_title" dusk="personal_title" class="w-full form-control form-select" v-model="selectedProduct" @change="getTreatments">
                    <option value="" selected="selected" disabled="disabled">Choose an option</option>
                    <option v-for="(item, index) in products" :key="index" :value="item.slug">{{ item.title }}</option>
                  </select>
                  <!---->
                  <div class="help-text help-text mt-2 text-danger">
                    {{ errors.get('product') }}
                  </div>
                </div>
              </div>
              <div class="flex border-b border-40">
                <div class="w-1/5 px-8 py-6">
                  <label for="personal_title" class="inline-block text-80 pt-2 leading-tight">
                    Treatments

                    <span class="text-danger text-sm">*</span>
                  </label>
                </div>
                <div class="py-6 px-8 w-1/2" style="display: flex; ">
                  <div class="w-2/3">
                    <select id="personal_title" dusk="personal_title" class="w-full form-control form-select" :class="[errors.has('treatments') ? 'border-danger' : '']" v-model="selectedTreatment.data" @input="errors.clear('treatments')">
                      <option value="" selected="selected" disabled="disabled">Choose an option</option>
                      <option v-for="(item, index) in treatments" :key="index" :value="item">{{ item.title }} {{ item.price }}</option>
                    </select>
                    <!---->
                    <div class="help-text help-text mt-2 text-danger">
                      {{ errors.get('treatments') }}
                    </div>
                  </div>
                  <div class="w-1/3" style="display: flex; justify-content: flex-end; ">
                    <input type="number" class="w-full form-control form-input form-input-bordered" v-model="selectedTreatment.count" min="1" style="margin: 0 10px; " />
                    <button type="button" class="btn btn-default btn-primary inline-flex items-center relative" @click="addTreatment" :disabled="!selectedTreatment.data">
                    <span class="">
                        Add
                    </span>
                      <!---->
                    </button>
                  </div>
                </div>
              </div>
              <div class="flex border-b border-40">
                <div class="w-1/5 px-8 py-6">
                  <label for="personal_title" class="inline-block text-80 pt-2 leading-tight">
                    Cart

                    <span class="text-danger text-sm">*</span>
                  </label>
                </div>
                <div style="width: 100%; padding-left: 2rem;">
                  <div v-for="(item, index) in formData.treatments" :key="index" class="py-6 px-8 w-1/2" style="display: flex; ">
                    <div class="w-2/3">
                      {{ item.title }} x {{ item.count }}
                    </div>
                    <div class="w-1/3" style="display: flex; justify-content: flex-end; ">
                      {{ item.price }}
                    </div>
                    <a class="remove" @click.prevent="removeTreatment(index)">
                      &#10005;
                    </a>
                  </div>
                </div>
              </div>
            </div>

            <br />

            <div class="card">
              <div class="flex items-center py-3 border-b border-50">
                <div class="flex items-center">
                  <div class="px-3">
                    <h1 class="title">Order</h1>
                  </div>
                </div>
              </div>
              <div class="flex border-b border-40">
                <div class="w-1/5 px-8 py-6">
                  <label for="shop" class="inline-block text-80 pt-2 leading-tight">
                    Payment Method

                    <span class="text-danger text-sm">*</span>
                  </label>
                </div>
                <div class="py-6 px-8 w-1/2">
                  <div class="flex items-center mb-3">
                    <!---->
                    <select data-testid="shops-select" dusk="shop" class="form-control form-select w-full" v-model="formData.payment_method" :class="[errors.has('payment_method') ? 'border-danger' : '']">
                      <option value="" selected="selected" disabled="disabled">—</option>
                      <option value="CACHE">Cache</option>
                      <option value="CHECK">Check</option>
                    </select>
                    <!---->
                  </div>
                  <div class="v-portal" transition="fade-transition" style="display: none;"></div>
                  <!---->
                  <!---->
                  <div class="help-text help-text mt-2"></div>
                  <div class="help-text help-text mt-2 text-danger">
                    {{ errors.get('payment_method') }}
                  </div>
                </div>
              </div>
              <div class="flex border-b border-40">
                <div class="w-1/5 px-8 py-6">
                  <label for="delivery_price" class="inline-block text-80 pt-2 leading-tight">
                    Delivery Price

                    <span class="text-danger text-sm">*</span>
                  </label>
                </div>
                <div class="py-6 px-8 w-1/2">
                  <input id="delivery_price" dusk="delivery_price" list="delivery_price-list" type="number" placeholder="Delivery Price" class="w-full form-control form-input form-input-bordered" :class="[errors.has('delivery_price') ? 'border-danger' : '']" v-model="formData.delivery_price" @input="errors.clear('delivery_price')" min="0" step="0.01" />
                  <!---->
                  <!---->
                  <div class="help-text help-text mt-2">
                    {{ errors.get('delivery_price') }}
                  </div>
                </div>
              </div>
              <div class="flex border-b border-40" resource-id="10">
                <div class="w-1/5 px-8 py-6">
                  <label for="comment" class="inline-block text-80 pt-2 leading-tight">
                    Comment

                    <!---->
                  </label>
                </div>
                <div class="py-6 px-8 w-1/2">
                  <textarea id="comment" dusk="comment" rows="5" placeholder="Comment" class="w-full form-control form-input form-input-bordered py-3 h-auto" v-model="formData.comment"></textarea>
                  <!---->
                  <div class="help-text help-text mt-2"></div>
                </div>
              </div>
            </div>

            <br />

            <div class="card">
              <div class="flex items-center py-3 border-b border-50">
                <div class="flex items-center">
                  <div class="px-3">
                    <h1 class="title">Promo Code</h1>
                  </div>
                </div>
              </div>
              <div class="flex border-b border-40">
                <div class="w-1/5 px-8 py-6">
                  <label for="personal_title" class="inline-block text-80 pt-2 leading-tight">
                    Promo Code

                    <span class="text-danger text-sm">*</span>
                  </label>
                </div>
                <div class="py-6 px-8 w-1/2" style="display: flex; ">
                  <div class="w-2/3">
                    <input id="delivery_price" dusk="delivery_price" list="delivery_price-list" type="text" placeholder="Promo Code" class="w-full form-control form-input form-input-bordered" :class="[errors.has('code') ? 'border-danger' : '']" v-model="formData.code" @input="errors.clear('code')" />
                    <!---->
                    <div class="help-text help-text mt-2 text-danger">
                      {{ errors.get('code') }}
                    </div>
                  </div>
                  <div class="w-1/3" style="display: flex; justify-content: flex-end; ">
                    <button type="button" class="btn btn-default btn-primary inline-flex items-center relative" @click.prevent="validPromoCode" :disabled="!formData.treatments.length">
                    <span class="">
                        Use
                    </span>
                      <!---->
                    </button>
                  </div>
                </div>
              </div>
            </div>

            <br />

            <div class="card">
              <div class="flex items-center py-3 border-b border-50">
                <div class="flex items-center">
                  <div class="px-3">
                    <h1 class="title">Final</h1>
                  </div>
                </div>
              </div>
              <div class="flex border-b border-40">
                <div class="w-1/5 px-8 py-6">
                  <label for="total" class="inline-block text-80 pt-2 leading-tight">
                    Total
                  </label>
                </div>
                <div class="py-6 px-8 w-1/2">
                  <p id="total" dusk="total" list="total-list" placeholder="Total" class="w-full form-control" v-if="formData.total">{{ parseFloat(formData.price).toFixed(2) }}</p>
                </div>
              </div>
              <div class="flex border-b border-40">
                <div class="w-1/5 px-8 py-6">
                  <label for="total" class="inline-block text-80 pt-2 leading-tight">
                    Delivery Price
                  </label>
                </div>
                <div class="py-6 px-8 w-1/2">
                  <p id="total" dusk="total" list="total-list" placeholder="Total" class="w-full form-control" v-if="formData.delivery_price">{{ parseFloat(formData.delivery_price).toFixed(2) }}</p>
                </div>
              </div>
              <div class="flex border-b border-40">
                <div class="w-1/5 px-8 py-6">
                  <label for="total" class="inline-block text-80 pt-2 leading-tight">
                    Final
                  </label>
                </div>
                <div class="py-6 px-8 w-1/2">
                  <p dusk="total" list="total-list" placeholder="Total" class="w-full form-control"  v-if="formData.total">
                    <span v-if="!promoCodeUsed">{{ parseFloat(formData.total).toFixed(2) }}</span>
                    <span v-else>
                      <span v-if="promoCode.type === 'PERCENT'">
                        {{ parseFloat(formData.total - (formData.total / 100) * promoCode.value).toFixed(2) }}
                        ({{ parseFloat(formData.total).toFixed(2) }} - {{ promoCode.value }}%)</span>
                      <span v-else>
                        {{ parseFloat(formData.total - promoCode.value).toFixed(2) }}
                        ({{ parseFloat(formData.total).toFixed(2) }} - {{ promoCode.value }})
                      </span>
                    </span>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div v-if="selectedStock" class="flex items-center">
          <button type="submit" class="btn btn-default btn-primary inline-flex items-center relative" dusk="create-button">
                    <span class="">
                        Create Order
                    </span>
            <!---->
          </button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import Errors from './../lib/Errors'

export default {
  data() {
    return {
      errors: new Errors(),
      formData: {
        confirmed: true,
        treatments: [],
        price: 0,
        delivery_price: 390.00,
        total: 0,
        user: {
          email: ''
        },
        paymentAddress: {
          same_for_delivery: true,
        },
        deliveryAddress: {},
      },
      stocks: [],
      countries: [],
      products: [],
      treatments: [],
      selectedProduct: null,
      selectedTreatment: {
        data: null,
        count: 1
      },
      selectedStock: null,
      promoCode: {},
      promoCodeUsed: false
    }
  },
  mounted() {
    Nova.request().get(`api/rs/stocks`).then((responsive) => this.stocks = responsive.data.stocks)

    parseFloat(this.formData.total).toFixed(2)
  },
  methods: {
    init() {
      Nova.request().get(`api/${this.selectedStock}/countries`).then((responsive) => this.countries = responsive.data.countries)
      Nova.request().get(`api/${this.selectedStock}/products`).then((responsive) => this.products = responsive.data.products)
      this.reset()
    },
    reset() {
      this.products = []
      this.treatments = []
      this.formData.user.first_name = ''
      this.formData.user.last_name = ''
      this.formData.user.email = ''
      this.formData.user.personal_title = ''
      this.formData.user.company = ''

      this.formData.paymentAddress.country = ''
      this.formData.paymentAddress.address = ''
      this.formData.paymentAddress.city = ''
      this.formData.paymentAddress.postal_code = ''
      this.formData.paymentAddress.phone = ''
      this.formData.paymentAddress.same_for_delivery = true

      this.formData.deliveryAddress.country = ''
      this.formData.deliveryAddress.address = ''
      this.formData.deliveryAddress.city = ''
      this.formData.deliveryAddress.postal_code = ''
      this.formData.deliveryAddress.phone = ''

      this.formData.price = ''
      this.formData.delivery_price = 390.00
      this.formData.total = ''

      this.selectedProduct = null
    },
    submit() {
      Nova.request().post(`api/${this.selectedStock}/orders`, this.formData).then((response) => {
        this.$router.push(`resources/orders/${response.data.order.id}`)
      }).catch((e) => {
        this.errors.record(e.response.data.errors)
      })
    },
    getTreatments() {
      Nova.request().get(`api/${this.selectedStock}/${this.selectedProduct}/treatments`).then((responsive) => this.treatments = responsive.data.treatments)
    },
    addTreatment() {
      this.formData.treatments.push(Object.assign(this.selectedTreatment.data, {
        count: this.selectedTreatment.count
      }))
      this.calculateTreatments()
      this.selectedProduct = null
      this.selectedTreatment.data = null
      this.selectedTreatment.count = 1
      this.treatments = []
    },
    removeTreatment(index) {
      this.formData.treatments.splice(index, 1)
      this.calculateTreatments()
    },
    calculateTreatments() {
      this.formData.price = 0
      let total = 0
      this.formData.treatments.forEach((item) => {
        total = parseFloat(total) + (parseFloat(item.price) * item.count)
      })
      this.formData.price = total
    },
    result(number1, number2) {
      return parseInt(number1) + parseInt(number2)
    },
    validPromoCode() {
      Nova.request().post(`api/${this.selectedStock}/promo_codes`, {code: this.formData.code}).then((response) => {
        if (!this.promoCodeUsed) {
          this.promoCode = response.data.promo_code
          this.promoCodeUsed = true
        }
      }).catch((e) => {
        this.errors.record(e.response.data.errors)
      })
    },
    findUser() {
      Nova.request().post('nova-vendor/call-center/users', {email: this.formData.user.email}).then((response) => {
        if (response.data.user)
          this.formData.user = response.data.user
      }).catch((e) => {
        this.errors.record(e.response.data.errors)
      })
    },
  },
  watch: {
    'formData.price': {
      handler (val) {
        this.formData.total = parseFloat(val) + parseFloat(this.formData.delivery_price)
      },
      deep: true
    },

    'formData.delivery_price': {
      handler (val) {
        this.formData.total = parseFloat(this.formData.price) + parseFloat(val)
      },
      deep: true
    },
  }
}
</script>

<style>
  .title {
    font-size: 1.5rem;
    font-weight: normal;
    margin-left: 15px;
  }
  .remove {
    margin-left: 20px;
    color: red;
    cursor: pointer;
  }
</style>
