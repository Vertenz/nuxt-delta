<template>
  <v-row align="center" justify="center" class="mb-12">
    <v-col cols="12" md="4">
      <v-hover v-slot="{ hover }">
        <NuxtLink to="/expert" no-prefetch class="main__link">
          <v-sheet
            :elevation="hover ? 30 : 6"
            :color="hover ? 'secondary' : ''"
            class="pa-4 d-flex justify-center align-center"
          >
            <div class="center center_main padding">
              <div>
                <div class="avarcom__top d-flex justify-center align-center">
                  <v-img
                    :src="require('~/static/newIcon/helpDtp.svg')"
                    alt="Help / Помощь"
                    max-width="180"
                    max-height="178"
                  />
                </div>
                <div class="avarcom__bottom">
                  <h2 class="avarcom__h2">Помощь на месте</h2>
                  <h3 class="avarcom__h3">Вызвать эксперта</h3>
                  <p class="avarcom__p">24 часа, Москва и МО</p>
                </div>
              </div>
            </div>
          </v-sheet>
        </NuxtLink>
      </v-hover>
    </v-col>
    <v-col cols="12" md="4">
      <v-hover v-slot="{ hover }">
        <NuxtLink to="/calc" no-prefetch class="main__link">
          <v-sheet
            :elevation="hover ? 30 : 6"
            :color="hover ? 'secondary' : ''"
            class="pa-4 d-flex justify-center align-center"
          >
            <div class="center center_main padding">
              <div>
                <div class="avarcom__top d-flex justify-center align-center">
                  <v-img
                    :src="require('~/static/newIcon/calc.svg')"
                    alt="Рачет"
                    max-width="180"
                    max-height="178"
                  />
                </div>
                <div class="avarcom__bottom">
                  <h2 class="avarcom__h2">Оценить ущерб</h2>
                  <h3 class="avarcom__h3">Подготовка заключения</h3>
                  <p class="avarcom__p">Заказать расчет стоимости ущерба</p>
                </div>
              </div>
            </div>
          </v-sheet>
        </NuxtLink>
      </v-hover>
    </v-col>
    <v-col cols="12" md="4">
      <v-hover v-slot="{ hover }">
        <a href="tel:+4959371722" to="/call" class="main__link">
          <v-sheet
            :elevation="hover ? 30 : 6"
            :color="hover ? 'secondary' : ''"
            class="pa-4 d-flex justify-center align-center"
          >
            <div class="center center_main padding">
              <div>
                <div class="avarcom__top d-flex justify-center align-center">
                  <v-img
                    :src="require('~/static/newIcon/posovet.svg')"
                    alt="Звонок"
                    max-width="180"
                    max-height="178"
                  />
                </div>
                <div class="avarcom__bottom">
                  <h2 class="avarcom__h2">Посоветоваться</h2>
                  <h3 class="avarcom__h3">как все сделать правильно</h3>
                  <p class="avarcom__p">Звонок бесплатный</p>
                </div>
              </div>
            </div>
          </v-sheet>
        </a>
      </v-hover>
    </v-col>
  </v-row>
</template>

<script>
export default {
  name: 'MenuSection',
}
</script>

<style lang="scss" scoped>
.main__link {
  text-decoration: none;
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
</style>
