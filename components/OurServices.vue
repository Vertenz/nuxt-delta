<template>
  <section id="services" class="services">
    <v-lazy
      v-model="servicesShow"
      :options="{ threshold: 1 }"
      transition="fade-transition"
    >
      <v-container>
        <v-row align="center" justify="center" class="service__title">
          <div class="pa-4">
            <h3 class="service__title_h">Чем мы еще можем помочь?</h3>
          </div>
        </v-row>
        <v-row class="wrapper">
          <v-container>
            <v-col
              v-for="servic in services"
              :key="servic.id"
              class="mb-12 pa-8 services__area"
              @click="servic.open = !servic.open"
            >
              <v-container>
                <v-row>
                  <v-col class="services__block">
                    <v-img
                      :src="hrefLogo(servic.icon)"
                      :alt="servic.name"
                      :width="$vuetify.breakpoint.xs ? 80 : 100"
                      :height="$vuetify.breakpoint.xs ? 80 : 100"
                    />
                    <div class="services__h4">
                      <h4>{{ servic.name }}</h4>
                    </div>
                    <div class="services__price">
                      <p>цена: {{ servic.price }}руб.</p>
                    </div>
                  </v-col>
                  <v-col>
                    <div
                      v-for="description in servic.description.split('.')"
                      :key="description"
                    >
                      <p class="services__description">
                        {{ description }}
                      </p>
                    </div>
                  </v-col>
                </v-row>
                <v-row>
                  <v-expand-transition>
                    <div
                      v-show="servic.open"
                      class="mx-auto secondary pa-1 services__description"
                    >
                      <p
                        class="services__description services__description_transition"
                      >
                        {{ servic.fullDescription }}
                        Для заказа услуги
                        <a
                          :href="'tel:' + $store.state.phone"
                          class="services__href"
                          >свяжитесь с нами</a
                        >
                      </p>
                    </div>
                  </v-expand-transition>
                </v-row>
              </v-container>
            </v-col>
          </v-container>
        </v-row>
      </v-container>
    </v-lazy>
  </section>
</template>
<script>
export default {
  name: 'Services',
  data() {
    return {
      expand: true,
      servicesShow: false,
      services: [
        {
          id: 1,
          name: 'Оформление Европротокола',
          icon: 'evro',
          description:
            'Консультация эксперта по поводу способа оформления ДТП. Корректное составление документов с места ДТП. Помощь с определением виновности',
          price: '2000',
          fullDescription:
            ' Чтобы не допустить ошибок, вызовите нашего эксперта..',
          open: false,
        },
        {
          id: 2,
          name: 'Подготовка документов для суда',
          icon: 'sud',
          description:
            'Независимая экспертиза по определению стоимости восстановления транспортного средства. Подготовка искового заявления',
          price: '2000',
          fullDescription: 'Тут Полное описание услуги.',
          open: false,
        },
        {
          id: 3,
          name: 'Расчет стоимости ущерба',
          icon: 'calc',
          description:
            'Определение стоимости восстановления ТС. Расчет утери товарной стоимости. Расчет стоимость годных остатков автомобиля (годные к эксплуатации детали, которые можно продать)',
          price: '2000',
          fullDescription: 'Тут Полное описание услуги.',
          open: false,
        },
        {
          id: 4,
          name: 'Постоянная поддержка',
          icon: 'help',
          description:
            'Круглосуточная помощь в оформлении ДТП. Возможность вызвать аварийного комиссара 24/7.',
          price: '2000',
          fullDescription: 'Тут Полное описание услуги.',
          open: false,
        },
        {
          id: 5,
          name: 'Сбор справок',
          icon: 'spravki',
          description: 'Забрать справки из отдела ГАИ',
          price: '2000',
          fullDescription: 'Тут Полное описание услуги.',
          open: false,
        },
        {
          id: 6,
          name: 'Проверка полиса виновника',
          icon: 'check',
          description:
            'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A architecto assumenda cumque ea eos excepturi fugit laboriosam molestias nostrum, tempore.',
          price: '2000',
          fullDescription: 'Тут Полное описание услуги.',
          open: false,
        },
      ],
    }
  },
  methods: {
    hrefLogo(name) {
      const href = require(`~/static/newIcon/${name.toLowerCase()}.svg`)
      return href
    },
  },
}
</script>

<style lang="scss" scoped>
.wrapper {
  background-image: url('../static/newIcon/backServices.svg');
  background-repeat: no-repeat;
  background-position: unset;
  background-size: cover;
  backdrop-filter: brightness(1);
}

.services__h4 {
  & > h4 {
    font-size: 1.3rem;
  }
}

@media screen and (max-width: 400px) {
  .services__h4 {
    width: 100%;
    text-align: center;
  }
}

.service__title {
  border-top: 1px solid #b71c1c;
  border-bottom: 1px solid #b71c1c;
}

.service__title_h {
  font-style: normal;
  font-weight: normal;
  font-size: 1.7rem;
  line-height: 29px;
  text-align: center;
  letter-spacing: 0.055em;
  padding: 3% 0;
}

.services__area {
  border: 1px solid #3c3b3b;
  transition: all 0.2s ease;
  background: rgba(1, 1, 1, 0.7);
  backdrop-filter: drop-shadow(12px 11px 23px red);
  cursor: pointer;
}

@media screen and (max-width: 400px) {
  .services__area {
    padding: 5px !important;
  }
}

.services__description {
  font-style: normal;
  font-weight: normal;
  font-size: 1rem;
  line-height: 17px;
  letter-spacing: 0.055em;
  white-space: pre-line;
  &_transition {
    align-items: center;
    justify-content: center;
    display: flex;
    flex-wrap: wrap;
  }
}

.services__href {
  color: burlywood;
}

.services__block {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

@media screen and (max-width: 400px) {
  .services__block {
    min-width: 100%;
  }
}

.fullDescription-fade-enter-active {
  transition: all 0.3s ease;
}

.fullDescription-fade-leave-active {
  transition: all 0.8s cubic-bezier(1, 0.5, 0.8, 1);
}
</style>
