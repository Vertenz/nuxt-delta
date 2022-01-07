<template>
  <section class="evro">
    <v-lazy
      v-model="evroShow"
      :options="{ threshold: 1 }"
      transition="fade-transition"
    >
      <v-container>
        <v-row align="center" justify="center" class="evro__title padding">
          <h3 class="evro__title_h4">Бланк Европротокола</h3>
        </v-row>
        <v-row>
          <div class="padding center flex mt-8">
            <v-stepper v-model="e1" width="100%">
              <v-stepper-header>
                <v-stepper-step :complete="e1 > 1" step="1">
                  Первым делом
                </v-stepper-step>

                <v-divider></v-divider>

                <v-stepper-step :complete="e1 > 2" step="2">
                  Внимание
                </v-stepper-step>

                <v-divider></v-divider>

                <v-stepper-step :complete="e1 > 3" step="3">
                  Важно
                </v-stepper-step>
                <v-divider></v-divider>

                <v-stepper-step step="4"> Европротокол </v-stepper-step>
              </v-stepper-header>

              <v-stepper-items>
                <v-stepper-content step="1">
                  <v-card
                    class="mb-12 d-flex flex-column"
                    color="grey darken-3 pa-4 d-flex justify-center align-center"
                    height="200px"
                  >
                    <div>
                      <p>
                        Обязательно обезопасьте себя на дороге. Включите
                        аварийный сигнал и выставьте знак аварийной остановки
                      </p>
                    </div>
                    <v-icon class="icon">mdi-alert-outline</v-icon>
                  </v-card>

                  <v-btn @click="e1 = 2"> Далее </v-btn>

                  <v-btn text @click="e1 = 1"> К первому </v-btn>
                </v-stepper-content>

                <v-stepper-content step="2">
                  <v-card
                    class="mb-12"
                    color="grey darken-3 pa-4 d-flex justify-center align-center"
                    height="200px"
                  >
                    <div>
                      <p>Проверьте полис виновника. Сделайте фото места ДТП.</p>
                    </div>
                  </v-card>

                  <v-btn @click="e1 = 3"> Далее </v-btn>

                  <v-btn text @click="e1 = 1"> К первому </v-btn>
                </v-stepper-content>

                <v-stepper-content step="3">
                  <v-card
                    class="mb-12"
                    color="grey darken-3 pa-4 d-flex justify-center align-center"
                    height="200px"
                  >
                    <div>
                      <p>Оповестите страховые компании о ДТП</p>
                    </div>
                  </v-card>

                  <v-btn @click="e1 = 4"> Далее </v-btn>

                  <v-btn text @click="e1 = 1"> К первому </v-btn>
                </v-stepper-content>
                <v-stepper-content step="4">
                  <v-card
                    class="mb-12"
                    color="grey darken-3 pa-4 d-flex justify-center align-center"
                    height="200px"
                  >
                    <div>
                      <p>
                        Вместе со вторым участником ДТП заполните извещение о
                        ДТП (европротокол) в мобильном приложении(при его
                        наличии) и бумажном виде.
                      </p>
                    </div>
                  </v-card>

                  <v-btn disabled> Далее </v-btn>

                  <v-btn text @click="e1 = 1"> К первому </v-btn>
                </v-stepper-content>
              </v-stepper-items>
            </v-stepper>
            <v-btn
              to="https://autoins.ru/upload/%D0%98%D0%B7%D0%B2%20%D0%BE%20%D0%94%D0%A2%D0%9F%20%D1%81%20%D0%BD%D0%BE%D1%8F%202019.doc"
              class="evro__button pa-5"
            >
              скачать бланк европротокола
            </v-btn>
            <div class="rule">
              <h3 class="rule__h">Правила оформления европротокола</h3>
              <ul>
                <li>в ДТП нет потерпевших</li>
                <li>в ДТП участвуют только два ТС</li>
                <li>
                  повреждения получили только участвовавшие в ДТП автомобили
                </li>
                <li>
                  вы, и второй водитель вписаны в действующие полисы ОСАГО или
                  международный полис «Зеленая карта», выданные на участвующие в
                  ДТП автомобили
                </li>
                <li>
                  по предварительной оценке нанесенный ТС ущерб не превышает
                  превышает максимальную сумму страховой выплаты
                </li>
                <li>
                  вы и второй водитель согласны оформить ДТП без вызова
                  сотрудников ГИБДД и подписать европротокол
                </li>
              </ul>
              <div class="exm">
                <h4 class="exm__h">
                  <a
                    href="../static/evro.png"
                    target="_blank"
                    download="evro.png"
                    >Образец заполнения европротокола</a
                  >
                </h4>
                <img class="exm__img" src="~/static/evro.png" alt="Образец" />
              </div>
            </div>
          </div>
        </v-row>
      </v-container>
    </v-lazy>
  </section>
</template>

<script>
export default {
  name: 'Evro',
  data() {
    return {
      e1: 1,
      evroShow: false,
    }
  },
}
</script>

<style scoped>
.evro {
  padding-bottom: 20%;
}

.evro__title {
  border-top: 1px solid #b71c1c;
  border-bottom: 1px solid #b71c1c;
}

.evro__title_h4 {
  font-style: normal;
  font-weight: normal;
  font-size: 1.7rem;
  line-height: 29px;
  text-align: center;
  letter-spacing: 0.055em;
  padding: 3% 0;
}

.evro__button {
  margin-top: 5%;
  display: flex;
}

.evro__button > a {
  background-color: #fff;
  color: red;
  box-shadow: 0 4px 4px rgba(0, 0, 0, 0.25);
  padding: 1em 2em;
  font-size: 1.2rem;
}

.exm__img {
  max-width: 100%;
}

.flex {
  flex-direction: column;
}
.rule {
  margin-top: 5%;
}
.rule__h {
  font-size: 1.5rem;
}

.icon {
  font-size: 3rem;
  color: #b71c1c;
}
</style>
