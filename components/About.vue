<template>
  <section id="about" class="about">
    <v-lazy
      v-model="aboutShow"
      :options="{ threshold: 1 }"
      transition="fade-transition"
    >
      <v-container>
        <v-row align="center" justify="center" class="about__title">
          <h3 class="about__title_h4">О нас</h3>
        </v-row>
        <v-row>
          <div class="main">
            <p class="main__text">
              Группа содействия <span class="alert">«Дельта»</span> - лидер
              рынка аварийных комиссаров, независимой автоэкспертизы и правовой
              поддержки автовладельцев. Компания насчитывает более 200
              сотрудников, 50 из них входят в службу аварийных комиссаров.
              Оперативные подразделения группы «Дельта» работают в
              круглосуточном режиме. Для удобства наших клиентов мы развернули
              по всей Москве сеть филиалов.
            </p>

            <p class="main__text">
              Мы стремимся сделать отношения между автомобилистами и страховыми
              компаниями доверительными и бесконфликтными. Кроме того, группа
              «Дельта» эффективно борется с мошенничеством на дорогах.
            </p>

            <p class="main__text">
              Наша компания известна не только самой сильной службой аварийных
              комиссаров в Москве. В области автострахования мы внедряем новые
              стандарты. Такой инновационной программой, которую используют
              теперь многие страховые компании, стала программа
              VIP-обслуживания.
            </p>

            <p class="main__text">
              Клиенты группы «Дельта» часто и не подозревают, какой сложный
              конвейер запускается одним телефонным звонком. Они уверены в
              главном – практически любая проблема с автомобилем будет решена
              специалистами компании так быстро, насколько это вообще возможно.
            </p>
          </div>
        </v-row>
        <v-row>
          <Slider></Slider>
        </v-row>
      </v-container>
    </v-lazy>
  </section>
</template>

<script>
export default {
  name: 'About',
  data() {
    return {
      aboutShow: false,
    }
  },
}
</script>

<style scoped>
.about {
  padding-bottom: 50%;
}

.about__title {
  border-top: 1px solid #b71c1c;
  border-bottom: 1px solid #b71c1c;
}

.about__title_h4 {
  font-style: normal;
  font-weight: normal;
  font-size: 1.7rem;
  line-height: 29px;
  text-align: center;
  letter-spacing: 0.055em;
  padding: 3% 0;
}

.main__text {
  margin-top: 5%;
  font-size: 1.2rem;
}
</style>
