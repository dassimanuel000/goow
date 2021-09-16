<template>
  <div>
    <Notification />
    <div class="nav">
      <div class="nav__group">
        <nuxt-link :to="`/`" class="nav__logo">
          <svg
            width="125"
            height="33"
            viewBox="0 0 125 33"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <g clip-path="url(#clip0)">
              <path
                d="M51.3835 0C42.5463 0 35.3486 7.40648 35.3486 16.5C35.3486 25.5935 42.5463 33 51.3835 33V0Z"
                fill="#FEB42B"
              />
              <path
                d="M51.1836 33C52.7075 33 53.9428 25.6127 53.9428 16.5C53.9428 7.3873 52.7075 0 51.1836 0C49.6598 0 48.4245 7.3873 48.4245 16.5C48.4245 25.6127 49.6598 33 51.1836 33Z"
                fill="#FB914E"
              />
              <path
                d="M67.5384 33C76.3755 33 83.5732 25.5935 83.5732 16.5C83.5732 7.40648 76.3755 0 67.5384 0V33Z"
                fill="#1EC173"
              />
              <path
                d="M67.7783 33C69.3021 33 70.5374 25.6127 70.5374 16.5C70.5374 7.3873 69.3021 0 67.7783 0C66.2545 0 65.0192 7.3873 65.0192 16.5C65.0192 25.6127 66.2545 33 67.7783 33Z"
                fill="#119352"
              />
              <path
                d="M56.6619 31.7244C58.1857 31.7244 59.421 24.9082 59.421 16.5C59.421 8.09173 58.1857 1.27551 56.6619 1.27551C55.1381 1.27551 53.9028 8.09173 53.9028 16.5C53.9028 24.9082 55.1381 31.7244 56.6619 31.7244Z"
                fill="#FF4583"
              />
              <path
                d="M62.1801 31.7244C63.7039 31.7244 64.9392 24.9082 64.9392 16.5C64.9392 8.09173 63.7039 1.27551 62.1801 1.27551C60.6563 1.27551 59.421 8.09173 59.421 16.5C59.421 24.9082 60.6563 31.7244 62.1801 31.7244Z"
                fill="#3B1099"
              />
              <path
                d="M31.6299 14.3604H27.0313V16.7469C27.0313 23.1247 21.993 28.3092 15.7949 28.3092C9.59693 28.3092 4.55854 23.1247 4.55854 16.7469C4.55854 10.3691 9.59693 5.18456 15.7949 5.18456C18.714 5.18456 21.5131 6.33668 23.5924 8.43518L25.2319 10.0811L28.4309 6.66585L26.7914 5.01997C23.8724 2.09852 19.9536 0.452637 15.8349 0.452637C7.07773 0.452637 0 7.77683 0 16.7469C0 25.717 7.07773 33.0412 15.8349 33.0412C24.5921 33.0412 31.6699 25.7581 31.6699 16.7469L31.6299 14.3604Z"
                fill="#565656"
              />
              <path
                d="M31.6298 13.8254H21.4331V18.5574H31.6298V13.8254Z"
                fill="#565656"
              />
              <path
                d="M120.721 1.06982L114.083 27.1571L107.126 1.06982H102.847L111.084 31.9302H117.122L125 1.06982H120.721Z"
                fill="#565656"
              />
              <path
                d="M102.687 1.06982L96.0492 27.1571L89.0915 1.06982H84.8128L93.0502 31.9302H99.0883L106.966 1.06982H102.687Z"
                fill="#565656"
              />
            </g>
            <defs>
              <clipPath id="clip0">
                <rect width="125" height="33" fill="white" />
              </clipPath>
            </defs>
          </svg>
        </nuxt-link>
        <div class="nav__options hidden-mobile">
          <!--          <div class="nav__options-item">-->
          <!--            <NavDropDown key="commerceDDown" :title="title">-->
          <!--              <TypeDropDownContent></TypeDropDownContent>-->
          <!--            </NavDropDown>-->
          <!--          </div>-->
          <div class="nav__options-item">
            <NavDropDown key="activitesDDown" title="Activités">
              <ActivitiesDropDownContent></ActivitiesDropDownContent>
            </NavDropDown>
          </div>
          <div class="nav__options-item">
            <NavDropDown key="villeDDown" title="Ville">
              <CityDropDownContent></CityDropDownContent>
            </NavDropDown>
          </div>
          <!--          <div class="nav__options-filter">-->
          <!--            <NavDropDown-->
          <!--              key="villeDDown"-->
          <!--              :backlight="true"-->
          <!--              :translate-x="20"-->
          <!--              title='<svg-->
          <!--            width="23"-->
          <!--          height="19"-->
          <!--          viewBox="0 0 23 19"-->
          <!--          fill="none"-->
          <!--          xmlns="http://www.w3.org/2000/svg"-->
          <!--          >-->
          <!--          <path-->
          <!--            d="M20.7885 7.90227V0.863636C20.7885 0.388636 20.3904 0 19.9038 0C19.4173 0 19.0192 0.388636 19.0192 0.863636V7.90227C17.7365 8.29091 16.8077 9.41364 16.8077 10.7955C16.8077 12.1773 17.7365 13.3 19.0192 13.6886V18.1364C19.0192 18.6114 19.4173 19 19.9038 19C20.3904 19 20.7885 18.6114 20.7885 18.1364V13.6886C22.0712 13.3 23 12.1773 23 10.7955C23 9.41364 22.0712 8.29091 20.7885 7.90227ZM12.3846 1.425V0.863636C12.3846 0.388636 11.9865 0 11.5 0C11.0135 0 10.6154 0.388636 10.6154 0.863636V1.425C9.33269 1.81364 8.40385 2.93636 8.40385 4.31818C8.40385 5.7 9.33269 6.82273 10.6154 7.21136V18.1364C10.6154 18.6114 11.0135 19 11.5 19C11.9865 19 12.3846 18.6114 12.3846 18.1364V7.21136C13.6673 6.82273 14.5962 5.7 14.5962 4.31818C14.5962 2.93636 13.6673 1.81364 12.3846 1.425ZM3.98077 11.7886V0.863636C3.98077 0.388636 3.58269 0 3.09615 0C2.60962 0 2.21154 0.388636 2.21154 0.863636V11.7886C0.928846 12.1773 0 13.3 0 14.6818C0 16.0636 0.928846 17.1864 2.21154 17.575V18.1364C2.21154 18.6114 2.60962 19 3.09615 19C3.58269 19 3.98077 18.6114 3.98077 18.1364V17.575C5.26346 17.1864 6.19231 16.0636 6.19231 14.6818C6.19231 13.3 5.26346 12.1773 3.98077 11.7886Z"-->
          <!--            fill="black"-->
          <!--          />-->
          <!--          </svg>'-->
          <!--            >-->
          <!--              <FiltersDropDown></FiltersDropDown>-->
          <!--            </NavDropDown>-->
          <!--          </div>-->
          <div class="nav__options-search">
            <svg
              width="36"
              height="36"
              viewBox="0 0 36 36"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M0 18C0 8.05888 8.05888 0 18 0C27.9411 0 36 8.05888 36 18C36 27.9411 27.9411 36 18 36C8.05888 36 0 27.9411 0 18Z"
                fill="#3B1099"
              />
              <circle
                cx="17"
                cy="17"
                r="6.15"
                stroke="white"
                stroke-width="1.7"
              />
              <path
                d="M22 22L25 25"
                stroke="white"
                stroke-width="1.7"
                stroke-linecap="round"
                stroke-linejoin="bevel"
              />
            </svg>
          </div>
        </div>
      </div>
      <div class="nav__group hidden-mobile">
        <div class="nav__pages">
          <nuxt-link :to="`/`" class="nav__pages-item active"
            >Accueil</nuxt-link
          >
          <nuxt-link :to="`/explore`" class="nav__pages-item"
            >Explorer</nuxt-link
          >
          <!-- <nuxt-link to="/projects" class="nav__pages-item"
            >Le projet</nuxt-link
          > -->
          <nuxt-link
            v-if="!$auth.user"
            to="/i-am-merchant"
            class="nav__pages-item"
            >Je suis commercant</nuxt-link
          >
        </div>
        <div class="nav__user">
          <div class="nav__user-profile">
            <nuxt-link v-if="!$auth.user" to="/login">
              <svg
                width="25"
                height="30"
                viewBox="0 0 25 30"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <g clip-path="url(#clip0)">
                  <path
                    d="M19.7232 8.19753C19.7232 12.217 16.4656 15.4398 12.4999 15.4398C8.53241 15.4398 5.27673 12.2151 5.27673 8.24228C5.27673 4.22285 8.5343 1 12.4999 1C16.4694 1 19.7232 4.18187 19.7232 8.19753ZM18.9374 8.24228C18.9374 4.65313 16.0337 1.79012 12.4999 1.79012C8.96863 1.79012 6.06245 4.65067 6.06245 8.19753C6.06245 11.7867 8.96616 14.6497 12.4999 14.6497C16.0288 14.6497 18.9374 11.8364 18.9374 8.24228Z"
                    fill="#565656"
                    stroke="#565656"
                  />
                  <path
                    d="M0.5 28.605C0.5 22.9951 5.78531 18.3195 12.5 18.3195C19.1713 18.3195 24.5 22.9962 24.5 28.605C24.5 28.8223 24.3209 29 24.1071 29C23.8934 29 23.7143 28.8223 23.7143 28.605C23.7143 23.2822 18.5827 19.1096 12.5 19.1096C6.41726 19.1096 1.28571 23.2822 1.28571 28.605C1.28571 28.8223 1.10662 29 0.892857 29C0.679091 29 0.5 28.8223 0.5 28.605Z"
                    fill="#565656"
                    stroke="#565656"
                  />
                </g>
                <defs>
                  <clipPath id="clip0">
                    <rect
                      width="25"
                      height="29"
                      fill="white"
                      transform="translate(0 0.5)"
                    />
                  </clipPath>
                </defs>
              </svg>
            </nuxt-link>
            <NavDropDown
              v-else
              key="villeDDown"
              :translate-x="-39"
              title=' <svg
            width="25"
            height="30"
            viewBox="0 0 25 30"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <g clip-path="url(#clip0)">
              <path
                d="M19.7232 8.19753C19.7232 12.217 16.4656 15.4398 12.4999 15.4398C8.53241 15.4398 5.27673 12.2151 5.27673 8.24228C5.27673 4.22285 8.5343 1 12.4999 1C16.4694 1 19.7232 4.18187 19.7232 8.19753ZM18.9374 8.24228C18.9374 4.65313 16.0337 1.79012 12.4999 1.79012C8.96863 1.79012 6.06245 4.65067 6.06245 8.19753C6.06245 11.7867 8.96616 14.6497 12.4999 14.6497C16.0288 14.6497 18.9374 11.8364 18.9374 8.24228Z"
                fill="#565656"
                stroke="#565656"
              />
              <path
                d="M0.5 28.605C0.5 22.9951 5.78531 18.3195 12.5 18.3195C19.1713 18.3195 24.5 22.9962 24.5 28.605C24.5 28.8223 24.3209 29 24.1071 29C23.8934 29 23.7143 28.8223 23.7143 28.605C23.7143 23.2822 18.5827 19.1096 12.5 19.1096C6.41726 19.1096 1.28571 23.2822 1.28571 28.605C1.28571 28.8223 1.10662 29 0.892857 29C0.679091 29 0.5 28.8223 0.5 28.605Z"
                fill="#565656"
                stroke="#565656"
              />
            </g>
            <defs>
              <clipPath id="clip0">
                <rect
                  width="25"
                  height="29"
                  fill="white"
                  transform="translate(0 0.5)"
                />
              </clipPath>
            </defs>
          </svg>'
            >
              <ProfileDropDown></ProfileDropDown>
            </NavDropDown>
          </div>
          <div class="nav__user-shop">
            <div class="roundIcon">
              <a @click="cartindex"> {{ productIndex }} </a>
            </div>
            <NavDropDown
              key="activitesDDown"
              style="margin-top: 4px"
              :translate-x="-80"
              title='<svg
            width="29"
            height="30"
            viewBox="0 0 29 30"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <g clip-path="url(#clip0)">
              <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                d="M6.74843 0.560791C5.10692 0.560791 3.83019 1.83753 3.83019 3.47904V10.2274H2.91824C1.27673 10.2274 0 11.5042 0 13.1457C0 14.4224 0.91195 15.5168 2.18868 15.8815L5.4717 27.3721C5.83648 28.6488 6.93082 29.5608 8.20755 29.5608H20.7925C22.0692 29.5608 23.1635 28.6488 23.5283 27.3721L26.8113 15.8815C28.0881 15.5168 29 14.4224 29 13.1457C29 11.5042 27.7233 10.2274 26.0818 10.2274H25.1698V3.47904C25.1698 1.83753 23.8931 0.560791 22.2516 0.560791H6.74843ZM6.74843 2.38469H22.2516C22.7987 2.38469 23.1635 2.74947 23.1635 3.29664V7.85639L22.434 7.12684C21.8868 6.57967 21.1572 6.21489 20.4277 6.21489C19.6981 6.21489 18.9686 6.57967 18.4214 7.12684L17.327 8.22114C16.9623 7.1268 15.8679 6.39724 14.5912 6.39724C13.4969 6.39724 12.5849 6.94443 12.2201 7.67399C11.3082 6.76204 10.2138 6.39724 8.93711 6.39724C7.84277 6.39724 6.93082 6.76202 6.01887 7.30919V3.47904C5.83648 2.93187 6.20126 2.38469 6.74843 2.38469ZM14.4088 8.22114C14.956 8.22114 15.3208 8.58591 15.3208 9.13308V10.045H13.4969V9.13308C13.4969 8.58591 13.8616 8.22114 14.4088 8.22114ZM8.75472 8.22114C10.0314 8.22114 11.1258 8.95071 11.4906 10.2274H6.01887C6.38365 8.95071 7.47799 8.22114 8.75472 8.22114ZM20.2453 8.22114C20.4277 8.22114 20.7925 8.40355 20.9748 8.58594L22.6164 10.2274H18.0566L19.6981 8.58594C19.8805 8.40355 20.0629 8.22114 20.2453 8.22114ZM2.91824 12.0513H26.0818C26.6289 12.0513 26.9937 12.4161 26.9937 12.9633C26.9937 13.5105 26.6289 13.8752 26.0818 13.8752H10.5786C9.30189 13.8752 9.30189 15.8815 10.5786 15.8815H24.805L21.7044 26.8249C21.522 27.1897 21.1572 27.5545 20.7925 27.5545H8.20755C7.84277 27.5545 7.47799 27.1897 7.2956 26.8249L4.19497 15.8815H6.74843C8.02516 15.8815 8.02516 13.8752 6.74843 13.8752H2.91824C2.37107 13.8752 2.00629 13.5105 2.00629 12.9633C2.00629 12.4161 2.37107 12.0513 2.91824 12.0513Z"
                fill="#565656"
              />
            </g>
            <defs>
              <clipPath id="clip0">
                <rect
                  width="29"
                  height="29"
                  fill="white"
                  transform="translate(0 0.5)"
                />
              </clipPath>
            </defs>
          </svg>'
            >
              <CartDropDown></CartDropDown>
            </NavDropDown>
          </div>
        </div>
      </div>
      <div class="hidden-desktop">
        <div class="flex">
          <div v-if="productIndex != 0" class="spacebettwen">
            <a style="display: flex; height: 45px" @click="openCart">
              <div class="roundIcon">
                <a @click="cartindex"> {{ productIndex }} </a>
              </div>
              <svg
                style="margin-right: 25px; margin-top: 7px"
                width="29"
                height="30"
                viewBox="0 0 29 30"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <g clip-path="url(#clip0)">
                  <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M6.74843 0.560791C5.10692 0.560791 3.83019 1.83753 3.83019 3.47904V10.2274H2.91824C1.27673 10.2274 0 11.5042 0 13.1457C0 14.4224 0.91195 15.5168 2.18868 15.8815L5.4717 27.3721C5.83648 28.6488 6.93082 29.5608 8.20755 29.5608H20.7925C22.0692 29.5608 23.1635 28.6488 23.5283 27.3721L26.8113 15.8815C28.0881 15.5168 29 14.4224 29 13.1457C29 11.5042 27.7233 10.2274 26.0818 10.2274H25.1698V3.47904C25.1698 1.83753 23.8931 0.560791 22.2516 0.560791H6.74843ZM6.74843 2.38469H22.2516C22.7987 2.38469 23.1635 2.74947 23.1635 3.29664V7.85639L22.434 7.12684C21.8868 6.57967 21.1572 6.21489 20.4277 6.21489C19.6981 6.21489 18.9686 6.57967 18.4214 7.12684L17.327 8.22114C16.9623 7.1268 15.8679 6.39724 14.5912 6.39724C13.4969 6.39724 12.5849 6.94443 12.2201 7.67399C11.3082 6.76204 10.2138 6.39724 8.93711 6.39724C7.84277 6.39724 6.93082 6.76202 6.01887 7.30919V3.47904C5.83648 2.93187 6.20126 2.38469 6.74843 2.38469ZM14.4088 8.22114C14.956 8.22114 15.3208 8.58591 15.3208 9.13308V10.045H13.4969V9.13308C13.4969 8.58591 13.8616 8.22114 14.4088 8.22114ZM8.75472 8.22114C10.0314 8.22114 11.1258 8.95071 11.4906 10.2274H6.01887C6.38365 8.95071 7.47799 8.22114 8.75472 8.22114ZM20.2453 8.22114C20.4277 8.22114 20.7925 8.40355 20.9748 8.58594L22.6164 10.2274H18.0566L19.6981 8.58594C19.8805 8.40355 20.0629 8.22114 20.2453 8.22114ZM2.91824 12.0513H26.0818C26.6289 12.0513 26.9937 12.4161 26.9937 12.9633C26.9937 13.5105 26.6289 13.8752 26.0818 13.8752H10.5786C9.30189 13.8752 9.30189 15.8815 10.5786 15.8815H24.805L21.7044 26.8249C21.522 27.1897 21.1572 27.5545 20.7925 27.5545H8.20755C7.84277 27.5545 7.47799 27.1897 7.2956 26.8249L4.19497 15.8815H6.74843C8.02516 15.8815 8.02516 13.8752 6.74843 13.8752H2.91824C2.37107 13.8752 2.00629 13.5105 2.00629 12.9633C2.00629 12.4161 2.37107 12.0513 2.91824 12.0513Z"
                    fill="#565656"
                  />
                </g>
                <defs>
                  <clipPath id="clip0">
                    <rect
                      width="29"
                      height="29"
                      fill="white"
                      transform="translate(0 0.5)"
                    />
                  </clipPath>
                </defs>
              </svg>
            </a>
          </div>
          <div class="burger icon" @click="openMobileNav">
            <svg
              viewBox="0 -53 384 384"
              width="28px"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="m368 154.667969h-352c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h352c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0"
              />
              <path
                d="m368 32h-352c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h352c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0"
              />
              <path
                d="m368 277.332031h-352c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h352c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0"
              />
            </svg>
          </div>
        </div>
        <div class="overlay" :class="isMobileNavOpen ? 'overlay__shown' : ''">
          <!-- Button to close the overlay navigation -->
          <a href="javascript:void(0)" class="closebtn" @click="closeMobileNav"
            >&times;</a
          >

          <!-- Overlay content -->
          <div class="overlay-content">
            <div v-if="!$auth.user">
              <nuxt-link :to="`/login`" @click.native="closeMobileNav"
                >Me connecter</nuxt-link
              >
              <nuxt-link :to="`/`" @click.native="closeMobileNav"
                >Accueil</nuxt-link
              >
              <nuxt-link :to="`/explore`" @click.native="closeMobileNav"
                >Explorer</nuxt-link
              >
              <!-- <nuxt-link :to="`/projects`" @click.native="closeMobileNav"
                >Le projet</nuxt-link
              > -->
              <nuxt-link :to="`/i-am-merchant`" @click.native="closeMobileNav"
                >Je suis commercant</nuxt-link
              >
            </div>
            <div v-else>
              <nuxt-link :to="`/profile`" @click.native="closeMobileNav"
                >Mon Compte</nuxt-link
              >
              <div v-if="$auth.user.is_market">
                <nuxt-link
                  :to="`/markets/${$auth.user.market.slug}`"
                  @click.native="closeMobileNav"
                >
                  Gestion du Marché
                </nuxt-link>
                <nuxt-link
                  to="/profile/merchants"
                  @click.native="closeMobileNav"
                >
                  Gestion des Marchands
                </nuxt-link>
              </div>
              <div v-if="$auth.user.is_merchant">
                <nuxt-link
                  v-if="$auth.user.merchant.length <= 1"
                  :to="`/markets/${$auth.user.merchant[0].market.slug}/merchants/${$auth.user.merchant[0].slug}`"
                  class="content-item"
                >
                  Mon stand
                </nuxt-link>
                <nuxt-link v-else to="/profile/stands" class="content-item">
                  Mes stands
                </nuxt-link>
              </div>
              <div v-if="!$auth.user.is_market">
                <nuxt-link
                  :to="`/profile/orders`"
                  @click.native="closeMobileNav"
                  >Mes commandes
                </nuxt-link>
              </div>
              <nuxt-link :to="`/explore`" @click.native="closeMobileNav"
                >Explorer</nuxt-link
              >

              <!-- <nuxt-link :to="`/projects`" @click.native="closeMobileNav"
                >Le projet</nuxt-link
              > -->

              <nuxt-link
                :to="`/profile/favorites`"
                @click.native="closeMobileNav"
                >Mes favoris</nuxt-link
              >
              <nuxt-link :to="`/contact`" @click.native="closeMobileNav"
                >Contact</nuxt-link
              >
              <a @click="logout()">Se déconnecter</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="nav__n"></div>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'
import NavDropDown from './NavDropDown/NavDropDown'
import ActivitiesDropDownContent from './NavDropDown/ActivitiesDropDownContent'
import ProfileDropDown from './NavDropDown/ProfileDropDown'
import CityDropDownContent from './NavDropDown/CityDropDownContent'
import CartDropDown from './NavDropDown/CartDropDown'

export default {
  name: 'Nav',
  components: {
    NavDropDown,
    ActivitiesDropDownContent,
    CityDropDownContent,
    ProfileDropDown,
    CartDropDown,
  },
  data() {
    return {
      round: '',
      productIndex: 0,
      isMobileNavOpen: false,
      title: 'Marchés',
      filtersData: {
        city: null,
        type: 'markets',
        activity: null,
        time: null,
        dateTimeDelivery: {
          time: null,
          date: null,
          delivery: null,
        },
      },
    }
  },
  computed: {
    ...mapGetters({
      productByMerchants: 'cart/productByMerchants',
    }),
    cartindex() {
      this.indexraz()
      this.productByMerchants.forEach((order) => {
        order.products.forEach((items) => {
          this.productIndex = this.productIndex + items.quantity
        })
      })
      return this.productIndex
    },
  },
  watch: {
    $route(val) {
      this.type = val.query.type
      this.path = val.path.split('/')
      this.saveTypeDropDownContentName(this.path, this.type)
    },
  },
  mounted() {
    this.setEventsOnFiltersChange()
  },
  methods: {
    indexraz() {
      this.productIndex = 0
    },
    logout() {
      this.$store.commit('cart/CLEAR')
      this.$auth.logout()
    },
    setEventsOnFiltersChange() {
      const self = this
      this.$nuxt.$on('filterChanged', function (data) {
        self.filtersData[data.filterName] = data.value
        self.redirectToExploreWithFilters()
      })
    },
    redirectToExploreWithFilters() {
      this.$router.push({
        name: 'explore',
        query: {
          city: this.filtersData.city,
          type: this.filtersData.type,
          activity: this.filtersData.activity,
          time: this.filtersData.dateTimeDelivery.time,
          date: this.filtersData.dateTimeDelivery.date,
          delivery: this.filtersData.dateTimeDelivery.delivery,
        },
      })
    },
    openMobileNav() {
      this.isMobileNavOpen = true
    },
    closeMobileNav() {
      this.isMobileNavOpen = false
    },
    openCart() {
      this.$router.push('/checkout/cart')
    },
    saveTypeDropDownContentName(path, name) {
      if (name === 'shops') {
        this.title = 'Commerces'
      }
      if (name === 'markets' || path[1] === 'markets') {
        this.title = 'Marchés'
      } else {
        this.title = 'Commerces'
      }

      return this.title
    },
  },
}
</script>

<style lang="scss" scoped>
.roundIcon {
  width: 20px;
  height: 20px;
  border-radius: 20px;
  background: #3b1099;
  text-align: center;
  font-family: Open Sans, serif;
  font-style: normal;
  font-weight: normal;
  font-size: 16px;
  line-height: 20px;
  a {
    color: white;
  }
}
.flex {
  display: flex;
  align-items: center;
  max-width: 700px;
}
.spacebettwen {
  margin-left: 10px;
}
.nav__pages-item.nuxt-link-exact-active {
  border-bottom: 2px solid #3b1099;
}
.nav {
  width: 100%;
  height: 87px;
  background: #ffffff;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.07);
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding-left: 27px;
  padding-right: 27px;
  position: fixed;
  top: 0;
  left: 0;
  z-index: 2;

  &__n {
    width: 100%;
    height: 87px;
  }

  &__logo {
    max-width: 125px;
    height: 33px;
  }

  &__group {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 700px;
    width: 45%;
    &:nth-of-type(1) {
      max-width: 425px;
    }
  }

  &__options {
    position: relative;
    font-family: Open Sans, serif;
    font-style: normal;
    font-weight: normal;
    font-size: 16px;
    line-height: 22px;
    color: #565656;
    min-width: 200px;
    max-width: 371px;
    height: 46px;
    border: 1px solid rgba(0, 0, 0, 0.13);
    box-sizing: border-box;
    border-radius: 30px;
    display: flex;
    align-items: center;
    padding: 5px 5px 5px 5px;

    &-item {
      border-right: 1px solid #c4c4c4;
      text-align: left;
      padding: 0 15px;
      &:nth-of-type(2) {
        border: none;
      }
    }

    &-filter {
      margin-top: 5px;
      margin-left: 5px;
      margin-right: 45px;
    }

    &-search {
      position: absolute;
      top: 4px;
      right: 5px;
    }
  }
  &__pages {
    display: flex;
    width: 420px;
    justify-content: space-between;
    align-items: start;
    font-family: Open Sans, serif;
    font-style: normal;
    font-weight: normal;
    padding-top: 12px;
    max-height: 42px;
    font-size: 16px;
    line-height: 22px;
    color: #9a9a9a;
    &-item {
      padding-bottom: 6px;
      text-decoration: none;
      color: #9a9a9a;
    }
  }
  &__user {
    margin-left: 40px;
    display: flex;
    justify-content: space-between;
    &-profile {
      position: relative;
      padding-right: 30px;
      border-right: 1px solid #c4c4c4;
    }
    &-shop {
      display: flex;
      height: 45px;
      position: relative;
      padding-left: 30px;
    }
  }
}
@media screen and (min-width: 1025px) {
  .hidden-desktop {
    display: none;
  }
}
@media screen and (max-width: 1024px) {
  .hidden-mobile {
    display: none;
  }
}
.overlay {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 3;
  left: 0;
  top: 0;
  background-color: rgb(255, 255, 255);
  background-color: rgba(255, 255, 255, 0.99);
  overflow-x: hidden;
  transition: 0.5s;
  &__shown {
    width: 100%;
  }
}

.overlay-content {
  position: relative;
  top: 25%;
  width: 100%;
  text-align: center;
  margin-top: 30px;
}

.overlay a {
  font-family: Montserrat, serif;
  padding: 8px;
  text-decoration: none;
  font-size: 30px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.overlay a:hover,
.overlay a:focus {
  color: #3b1099;
}

.overlay .closebtn {
  position: absolute;
  top: 20px;
  right: 45px;
  font-size: 60px;
}

@media screen and (max-height: 450px) {
  .overlay a {
    font-size: 20px;
  }
  .overlay .closebtn {
    font-size: 40px;
    top: 15px;
    right: 35px;
  }
}
</style>
