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
              <div class="services__area_opacity accent"></div>
              <v-container>
                <v-row class="service__info-area">
                  <v-col class="services__block">
                    <v-img
                      :src="hrefLogo(servic.icon)"
                      :alt="servic.name"
                      :width="$vuetify.breakpoint.xs ? 80 : 100"
                      :height="$vuetify.breakpoint.xs ? 80 : 100"
                      :contain="true"
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
            'Консультация эксперта по поводу способа оформления ДТП.  Корректное составление документов с места ДТП. Помощь с определением виновности',
          price: '2000',
          fullDescription:
            'Чтобы не допустить ошибок, вызовите нашего эксперта. В процессе заполнения европротокала часто допускаются ошибки, которые приводя к отказу в выплате по страховому случаю, чтобы избежать таких ошибок вызовете нашего эксперта Для заказа услуги свяжитесь с нами',
          open: false,
        },
        {
          id: 2,
          name: 'Подготовка документов для суда',
          icon: 'sud',
          description:
            'Независимая экспертиза по определению стоимости восстановления транспортного средства. Подготовка искового заявления',
          price: '2000',
          fullDescription:
            'Подготовка документов по стоимости восстановления транспортного средства в рамках ОСАГО или по среднерыночной стоимости. Такой комплект документов пригодится Вам, если вы решаете вопрос о досудебной выплате по ущербу, или будете обращаться в суд, или будете подавать документы в РСА',
          open: false,
        },
        {
          id: 3,
          name: 'Расчет стоимости ущерба',
          icon: 'calc',
          description:
            'Определение стоимости восстановления ТС. Расчет утери товарной стоимости. Расчет стоимость годных остатков автомобиля (годные к эксплуатации детали, которые можно продать)',
          price: '2000',
          fullDescription:
            'Если вы потерпевший и намереваетесь обратиться в страховую компанию за возмещением ущерба, то страховая компания организует для вас экспертизу. Однако для других целей, например, для проверки правильности экспертизы, сделанной по заказу страховой компании, для обращения к виновнику ДТП за возмещением ущерба или в судебные инстанции, для определения стоимости восстановительного ремонта и прочих целей, вам может понадобиться полноценное, составленное и оформленное надлежащим образом, экспертное заключение. Закажите у нас данную услугу, наш эксперт осмотрит поврежденное имущество в удобном для вас месте, после чего эксперты-техники осуществят расчет ущерба с использованием лицензированных программных комплексов',
          open: false,
        },
        {
          id: 4,
          name: 'Постоянная поддержка',
          icon: 'help',
          description:
            'Круглосуточная помощь в оформлении ДТП. Возможность вызвать аварийного комиссара 24/7',
          price: '2000',
          fullDescription:
            'Консультация по всем вопросам о ДТП. Окажет консультацию по способу оформления ДТП (с участием ГИБДД или Европротокол). В зависимости от способа оформления ДТП подскажем порядок действий по процедуре оформления ДТП (схема, Извещение, составление документов сотрудниками ГИБДД). Подскажем порядок обращения в страховую компанию',
          open: false,
        },
        {
          id: 5,
          name: 'Сбор справок',
          icon: 'spravki',
          description:
            'Забрать документы о ДТП из отдела ГИБДД. Забрать документы из МВД. Курьерская доставка документов',
          price: '2000',
          fullDescription:
            'Часто на месте происшествия выдается только определение о возбуждении дела или протокол. Для обращения в страховую компанию Вам необходимо иметь закрывающий документ, чаще всего это постановление или определение об отказе',
          open: false,
        },
        {
          id: 6,
          name: 'Проверка полиса виновника',
          icon: 'check',
          description:
            'Проверка полиса по базе РСА. Проверка срока действия. Проверка указанного транспортного средства в полис',
          price: '2000',
          fullDescription:
            'Если у виновника ДТП нет действующего полиса ОСАГО, то возможно получить выплату только с виновника. Страховая компания, в рамках ОСАГО, не сможет оплатить Вам ущерб',
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
  position: relative;
  background-image: url('../static/serviceback.png');
  background-repeat: repeat-y;
  background-position: center;
  background-position-x: 83vw;
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

.service__img {
  background-size: auto !important;
}

.services__area {
  border: 1px solid #3c3b3b;
  transition: all 0.2s ease;
  backdrop-filter: drop-shadow(1px -1px 0 red);
  cursor: pointer;
  position: relative;
  &_opacity {
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    opacity: 0.6;
    z-index: -1;
  }
}

@media screen and (max-width: 480px) {
  .services__area {
    padding: 5px !important;
  }
  .service__info-area {
    display: flex;
    flex-direction: column;
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
