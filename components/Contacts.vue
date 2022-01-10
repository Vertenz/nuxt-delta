<template>
  <section id="contact">
    <v-lazy
      v-model="contactShow"
      :options="{ threshold: 1 }"
      transition="fade-transition"
    >
      <v-container>
        <v-row align="center" justify="center" class="contact__title">
          <div class="pa-4">
            <h3 class="contact__title_h">контакты</h3>
          </div>
        </v-row>
        <v-row>
          <div class="contact-block padding">
            <div class="contact-block__logo">
              <v-img
                :src="require('~/static/newIcon/help.svg')"
                alt="Телефон"
                :width="$vuetify.breakpoint.xs ? 50 : 70"
                :height="$vuetify.breakpoint.xs ? 50 : 70"
              />
            </div>
            <div class="contact-block__text">
              <a
                :href="'tel:' + $store.state.phone"
                class="contact-block__link"
              >
                <p class="contact-block__p">Позвонить нам</p>
                <p class="contact-block__p">Круглосуточная помощь</p>
              </a>
            </div>
          </div>
        </v-row>
        <v-row>
          <div class="contact-block padding">
            <div class="contact-block__logo">
              <v-img
                :src="require('~/static/newIcon/posovet.svg')"
                alt="E-mail"
                :width="$vuetify.breakpoint.xs ? 50 : 70"
                :height="$vuetify.breakpoint.xs ? 50 : 70"
              />
            </div>
            <div class="contact-block__text">
              <div class="contact-block__link" @click="email()">
                <p class="contact-block__p">Написать нам</p>
                <p class="contact-block__p">
                  Для более точного идентифицирования в теме укажите гос номе
                </p>
              </div>
            </div>
          </div>
        </v-row>
        <v-row>
          <div class="contact-block contact-block_smedia padding">
            <div class="contact-block__text">
              <h4 class="contact-block__h">Онлайн</h4>
              <div class="media">
                <a href="https://wa.me/74959371722" class="icon"
                  ><v-icon large>mdi-whatsapp</v-icon></a
                >
                <a
                  href="https://yandex.ru/maps/org/delta/1066101311/?ll=37.655320%2C55.755251&z=18"
                  class="icon"
                  ><v-icon large>mdi-alpha-y</v-icon></a
                >
              </div>
            </div>
          </div>
        </v-row>
        <v-row>
          <div class="address">
            <div class="address-title" @click="copyAddress">
              <h3 class="address-title__h">Наш адрес:</h3>
              <p class="address-title__p">г. Москва, ул. Земляной вал,</p>
              <p class="address-title__p">дом 38/40, стр. 5</p>
              <transition name="fade">
                <v-alert v-if="showCopy" type="success" class="address__alert">
                  Адрес скопирован
                </v-alert>
              </transition>
            </div>
            <iframe
              src="https://yandex.ru/map-widget/v1/?um=constructor%3A0e89918f68a809f094d596c2f071ced4edcb0539a6744528c5e8763c7ee494e5&amp;source=constructor"
              frameborder="0"
              class="address__map"
              title="Карта"
            ></iframe>
          </div>
        </v-row>
      </v-container>
    </v-lazy>
  </section>
</template>

<script>
export default {
  name: 'Contacts',
  data() {
    return {
      contactShow: false,
      fontBig: false,
      showCopy: false,
    }
  },
  methods: {
    email() {
      window.open('mailto:gsd24@gsd24.ru', '_blank')
    },
    copyAddress() {
      navigator.clipboard
        .writeText('ул. Земляной вал, дом 38/40, стр. 5')
        .then(() => {
          this.showCopy = true
          setTimeout(() => {
            this.showCopy = false
          }, 1500)
        })
        .catch((err) => console.log(err))
    },
  },
}
</script>

<style lang="scss" scoped>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.5s;
}
.fade-enter,
.fade-leave-to {
  opacity: 0;
}

iframe {
  min-width: 70vw !important;
  min-height: 70vh !important;
}

.contact {
  &__title {
    border-top: 1px solid #b71c1c;
    border-bottom: 1px solid #b71c1c;
    &_h {
      font-style: normal;
      font-weight: normal;
      font-size: 1.7rem;
      line-height: 29px;
      text-align: center;
      letter-spacing: 0.055em;
      padding: 3% 0;
    }
  }
}

.contact-block {
  display: flex;
  min-width: 100%;
  margin: 8% 0;
  padding: 3%;
  background-color: rgba(216, 18, 36, 0.1);
  justify-content: flex-start;
  align-items: center;
  &_smedia {
    justify-content: start;
  }
  &__text {
    margin-left: 10%;
  }
  &__logo {
    display: inline-block;
    padding: 1%;
  }
  &__h {
    font-size: 1.8rem;
  }
  &__p {
    font-size: 1.3rem;
    text-decoration: underline;
    &:hover {
      cursor: pointer;
    }
  }
}

.contact-block__text > a > p {
  margin: 8% 0;
}

.media {
  display: flex;
  align-items: center;
  margin-top: 25%;
  &__img {
    max-width: content-box;
  }
  & > a {
    padding: 4%;
  }
}

.address-title {
  padding: 5% 0;
  &__h,
  &__p {
    font-size: 2rem;
  }
}

.address__alert {
  position: absolute;
}

.icon {
  text-decoration: none;
  :hover {
    color: #b71c1c;
  }
}
@media (max-width: 328px) {
  iframe {
    width: 50vw;
    height: 50vh;
  }
  .contact-block__p {
    font-size: 1rem;
  }
}
</style>
