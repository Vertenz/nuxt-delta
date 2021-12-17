<template>
  <v-container>
    <v-row>
      <v-carousel
        height="500"
        width="max-content"
        :hide-delimiter-background="
          $vuetify.breakpoint.md ||
          $vuetify.breakpoint.lg ||
          $vuetify.breakpoint.xl
        "
        :hide-delimiters="
          $vuetify.breakpoint.md ||
          $vuetify.breakpoint.lg ||
          $vuetify.breakpoint.xl
        "
        :show-arrows="
          $vuetify.breakpoint.md ||
          $vuetify.breakpoint.lg ||
          $vuetify.breakpoint.xl
        "
      >
        <template #prev="{ on, attrs }">
          <v-btn
            color="secondary"
            v-bind="attrs"
            v-on="on"
            @click="cycle = true"
            >Назад</v-btn
          >
        </template>
        <template #next="{ on, attrs }">
          <v-btn
            color="secondary"
            v-bind="attrs"
            v-on="on"
            @click="cycle = true"
            >Далее</v-btn
          >
        </template>
        <v-carousel-item>
          <v-sheet class="black" height="100%">
            <v-row class="fill-height blur" align="center" justify="center">
              <div class="text-h2">
                <div class="about__block">
                  <h2 class="about__h">Физическим лицам</h2>
                  <p
                    class="about__text"
                    @click="
                      addText('ak')
                      expand = true
                    "
                  >
                    Cлужба аварийных комиссаров
                  </p>
                  <p
                    class="about__text"
                    @click="
                      addText('help')
                      expand = true
                    "
                  >
                    Круглосуточная поддержка
                  </p>
                  <p
                    class="about__text"
                    @click="
                      expand = true
                      addText('calc')
                    "
                  >
                    Независимая экспертиза, оценка
                  </p>
                  <p
                    class="about__text"
                    @click="
                      expand = true
                      addText('onlineCalc')
                    "
                  >
                    Онлайн оценка ущерба
                  </p>
                </div>
              </div>
            </v-row>
          </v-sheet>
        </v-carousel-item>
        <v-carousel-item>
          <v-sheet class="black" height="100%">
            <v-row class="fill-height" align="center" justify="center">
              <div class="text-h2">
                <div class="about__block">
                  <h2 class="about__h">Юридическим лицам</h2>
                  <p
                    class="about__text"
                    @click="
                      addText('help')
                      expand = true
                    "
                  >
                    Правовая поддержка
                  </p>
                  <p
                    class="about__text"
                    @click="
                      addText('ak')
                      expand = true
                    "
                  >
                    Взаимодействие со страховыми
                  </p>
                  <p
                    class="about__text"
                    @click="
                      addText('help')
                      expand = true
                    "
                  >
                    Сбор документов
                  </p>
                  <p
                    class="about__text"
                    @click="
                      expand = true
                      addText('calc')
                    "
                  >
                    Оценка ущерба
                  </p>
                </div>
              </div>
            </v-row>
          </v-sheet>
        </v-carousel-item>
      </v-carousel>
    </v-row>
    <v-row>
      <v-expand-transition>
        <v-card
          v-show="expand"
          height="max"
          width="100%"
          class="mx-auto secondary pa-8"
        >
          <v-btn
            class="mx-2"
            fab
            small
            color="red"
            @click="
              expand = false
              cycle = true
            "
          >
            <v-icon> mdi-close </v-icon>
          </v-btn>
          <div>{{ text }}</div>
        </v-card>
      </v-expand-transition>
    </v-row>
  </v-container>
</template>

<script>
export default {
  name: 'Slider',
  data() {
    return {
      expand: false,
      text: '',
      cycle: true,
      info: {
        ak:
          'Правильное оформление ДТП, зачастую является гарантом определения ответственных за причинение вреда\n' +
          '            имуществу,\n' +
          '            жизни и здоровью. В Российском законодательстве в особых случаях есть возможность оформить ДТП без\n' +
          '            длительного\n' +
          '            ожидания компетентных органов ГИБДД - т.н. Европротокол. Наша служба аварийных комиссаров призвана помочь и\n' +
          '            упростить оформление ДТП, а так же оказать квалифицированную помочь и консультацию на месте ДТП.',
        help:
          'В современном мире у многих компаний Контакт-центры заменены роботизированными системами, ботами, ИИ,\n' +
          '            которые\n' +
          '            призваны упростить навигацию по предоставляемым услугам. Однако ничто не сможет заменить человеческое\n' +
          '            общение.\n' +
          '            Мы принципиально не вводим автоматизированные цифровые технологии в общение с нашими клиентами. Позвонив\n' +
          '            нам,\n' +
          '            вы в считанные секунды начинаете диалог с нашим сотрудником. С нами многоминутные ожидания и выбор\n' +
          '            дополнительных опций в телефонном меню исключены.',
        calc:
          'Многие считают, что независимая экспертиза, которая сотрудничает со страховыми компаниями, не является\n' +
          '            независимой. С нами это не так. При определении размера ущерба, оценки имущества, мы руководствуемся\n' +
          '            исключительно актуальной нормативно-правовой базой и законодательными документами, которыми обязаны\n' +
          '            руководствоваться оценщики и эксперты-техники. При проведении экспертизы, у нас нет субъективного мнения,\n' +
          '            нет\n' +
          '            заинтересованности в ее результатах, мы руководствуемся законом и только им.',
        onlineCalc:
          'Наша команда экспертов и применение собственных технических средств, позволяют нам в считанные минуты\n' +
          '            определить предварительный размер ущерба причиненный вашему имуществу. Для этого зачастую достаточно лишь\n' +
          '            сделанных вами же фотографий поврежденного имущества и информация об оцениваемом объекте.',
      },
    }
  },
  methods: {
    addText(name) {
      this.text = this.info[name]
      this.cycle = false
    },
  },
}
</script>
<style scoped>
.about__block {
  margin-top: 5%;
  background: url('../static/newIcon/backServices.svg') no-repeat center;
  min-height: 150px;
  text-align: center;
}

.about__text {
  margin: 10px 0;
  font-size: 1.5rem;
  backdrop-filter: blur(50px);
}

.about__text:hover {
  cursor: pointer;
  color: red;
}

.about__h {
  font-size: 2.3rem;
}

@media (max-width: 426px) {
  .about__h {
    max-width: min-content;
  }
  .about__text {
    font-size: 1rem;
  }
}
</style>
