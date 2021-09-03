<template>
  <v-container class="mt-4" @click.right="al()">
    <v-row align="center" justify="center" class="mb-12">
      <v-col cols="12" md="4">
        <v-hover v-slot="{ hover }">
          <v-sheet
            :elevation="hover ? 30 : 6"
            :color="hover ? 'secondary' : ''"
            class="pa-4 d-flex justify-center align-center"
          >
            <NuxtLink to="/edit/expert" no-prefetch class="main__link">
              <div class="center center_main padding">
                <div>
                  <div class="avarcom__top d-flex justify-center align-center">
                    <v-img
                      :src="require('../../assets/newIcon/helpDtp.svg')"
                      alt="Help / Помощь"
                      max-width="180"
                      max-height="178"
                    />
                  </div>
                  <div class="avarcom__bottom">
                    <h2 class="avarcom__h2">Помощь на месте</h2>
                    <h3 class="avarcom__h3">Вызвать эксперта(аварком)</h3>
                    <p class="avarcom__p">24 часа, Москва и область</p>
                  </div>
                </div>
              </div>
            </NuxtLink>
          </v-sheet>
        </v-hover>
      </v-col>
      <v-col cols="12" md="4">
        <v-hover v-slot="{ hover }">
          <v-sheet
            :elevation="hover ? 30 : 6"
            :color="hover ? 'secondary' : ''"
            class="pa-4 d-flex justify-center align-center"
          >
            <NuxtLink to="/edit/calc" no-prefetch class="main__link">
              <div class="center center_main padding">
                <div>
                  <div class="avarcom__top d-flex justify-center align-center">
                    <v-img
                      :src="require('../../assets/newIcon/calc.svg')"
                      alt="Раcчет"
                      max-width="180"
                      max-height="178"
                    />
                  </div>
                  <div class="avarcom__bottom">
                    <h2 class="avarcom__h2">Оценить ущерб</h2>
                    <h3 class="avarcom__h3">подготовка заключения</h3>
                    <p class="avarcom__p">Заказать расчет стоимости ущерба</p>
                  </div>
                </div>
              </div>
            </NuxtLink>
          </v-sheet>
        </v-hover>
      </v-col>
      <v-col cols="12" md="4">
        <v-hover v-slot="{ hover }">
          <v-sheet
            :elevation="hover ? 30 : 6"
            :color="hover ? 'secondary' : ''"
            class="pa-4 d-flex justify-center align-center"
          >
            <a href="tel:+4959371722" to="/call" class="main__link">
              <div class="center center_main padding">
                <div>
                  <div class="avarcom__top d-flex justify-center align-center">
                    <v-img
                      :src="require('../../assets/newIcon/posovet.svg')"
                      alt="Звонок"
                      max-width="180"
                      max-height="178"
                    />
                  </div>
                  <div class="avarcom__bottom">
                    <h2 class="avarcom__h2">Посоветоваться</h2>
                    <h3 class="avarcom__h3">как все сделать правильно</h3>
                    <p class="avarcom__p">звонок бесплатный</p>
                  </div>
                </div>
              </div>
            </a>
          </v-sheet>
        </v-hover>
      </v-col>
    </v-row>
    <v-lazy
      v-model="servicesShow"
      :options="{ threshold: 1 }"
      transition="fade-transition"
    >
      <LazyOurServices v-if="servicesShow" />
    </v-lazy>
    <v-lazy
      v-model="contactShow"
      :options="{ threshold: 1 }"
      transition="fade-transition"
    >
      <LazyContacts v-if="contactShow" />
    </v-lazy>
    <div v-if="editEnable" id="edit" class="edit">
      <textarea
        id="edit_text"
        v-model="text"
        :placeholder="text"
        class="edit_text"
      ></textarea>
      <v-btn @click="changeText">Применить</v-btn>
      <v-btn @click="close"><v-icon dark> mdi-skull-crossbones </v-icon></v-btn>
      <v-btn @mousedown.stop="changePosition">
        <v-icon dark> mdi-arrow-all </v-icon></v-btn
      >
    </div>
  </v-container>
</template>

<script>
export default {
  data() {
    return {
      loading: false,
      servicesShow: false,
      contactShow: false,
      editEnable: false,
      el: '',
      text: '',
      changePlace: false,
    }
  },
  head() {
    return {
      title: 'Автоэкспертиза',
    }
  },
  methods: {
    nextSection() {
      if (this.servicesShow === true) {
        this.contactShow = true
      } else {
        this.servicesShow = true
      }
    },
    al() {
      if (!this.editEnable) {
        this.text = event.target.textContent
        this.el = event.target
        this.editEnable = true
        event.preventDefault()
      } else {
        alert(
          'нужно закрыть окно редактирования текста (одновременно может быть только одно окно)'
        )
      }
    },
    changeText() {
      console.log(this.text)
      this.el.textContent = this.text
    },
    changePosition() {
      document.body.onmouseup = () => {
        if (!this.changePlace) {
          const block = document.getElementById('edit')
          block.style.left = event.clientX + 'px'
          block.style.top = event.clientY + 'px'
          this.changePlace = true
        }
      }
      this.changePlace = false
    },
    close() {
      this.text = ''
      this.el = ''
      this.editEnable = false
    },
  },
}
</script>

<style lang="scss" scoped>
.main__link {
  text-decoration: none;
  color: var(--v-accent-lighten5);
}

.avarcom__top {
  text-align: center;
}

.arrow {
  text-align: center;
  text-decoration: none;
  list-style: none;
  :hover {
    color: #b71c1c;
  }
}
.center_main {
  max-height: 283px;
}

.avarcom__bottom {
  color: white;
}

.edit {
  position: fixed;
  z-index: 999;
  top: 25px;
  background-color: #3c3b3b;
  display: flex;
  flex-direction: column;
  min-height: 350px;
  min-width: 350px;
  max-height: 750px;
  max-width: 750px;
  &_text {
    color: white;
    margin-bottom: 50px;
  }
}
</style>
