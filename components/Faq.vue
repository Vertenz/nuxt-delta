<template>
  <section id="faq" class="faq">
    <v-lazy
      v-model="faqShow"
      :options="{ threshold: 1 }"
      transition="fade-transition"
    >
      <v-container>
        <v-row align="center" justify="center" class="faq__title">
          <div class="pa-4">
            <h3 class="faq__title_h">Часто задаваемые вопросы</h3>
          </div>
        </v-row>
        <div class="faq__block padding">
          <details class="dtp">
            <summary id="evroRules" class="dtp__summary">
              <h4>Когда можно оформить ДТП без ГАИ, по европротоколу?</h4>
            </summary>
            <div class="dtp__culprit">
              <h5>
                Без ГИБДД оформить аварию можно, если одновременно выполнены
                следующие 5 условий европротокола:
              </h5>
              <ul class="dtp__ul">
                <li class="dtp__li">
                  в ДТП повреждены только транспортные средства (это могут быть
                  автомобили, мотоциклы, тягачи с прицепами и т.п.)
                </li>
                <li class="dtp__li">люди не пострадали</li>
                <li class="dtp__li">
                  не повреждены никакие грузы, имущество водителей/пассажиров,
                  заборы, столбы, отбойники и т.п.
                </li>
                <li class="dtp__li">
                  столкнулись только два транспортных средства
                </li>
                <li class="dtp__li">
                  на каждое из двух транспортных средств есть действующие полисы
                  ОСАГО
                </li>
              </ul>
              <p>
                Максимальный размер выплаты по ДТП, оформленному без ГИБДД,
                зависит от ряда обстоятельств. Подробнее
                <a
                  href="https://autoins.ru/evropeyskiy-protokol/uproshchennoe-oformlenie-dtp/"
                  target="_blank"
                  >тут</a
                >
              </p>
            </div>
            <h5 class="dtp__attention">
              Вы можете вызвать на место ДТП эксперта
              <router-link to="/expert">на нашем сайте.</router-link> для
              получения профессиональной помощи
            </h5>
          </details>
          <details class="dtp">
            <summary class="dtp__summary">
              <h4>Можно ли оформить без ГАИ аварию, если нет ОСАГО?</h4>
            </summary>
            <div class="dtp__culprit">
              <p>
                Если на одно из транспортных средств, попавших в аварию, нет
                действующего полиса ОСАГО, то воспользоваться европротоколом
                нельзя. В этом случае придется вызывать на место ДТП сотрудников
                ГИБДД.
              </p>
              <p>
                Частенько бывает, что водитель забывает вовремя продлить
                страховку и попадает в ДТП. Поэтому при оформлении европротокола
                нужно внимательно проверить срок действия ОСАГО для обеих машин.
                Обнаружили, что полис не действует на дату ДТП? – вызывайте
                ГИБДД.
              </p>
              <p>
                Полис ОСАГО можно проверить на
                <a href="https://dkbm-web.autoins.ru/dkbm-web-1.0/bsostate.htm"
                  >сайте РСА.</a
                >
              </p>
              <p>
                Бывает так, что страховка ОСАГО есть, но попавший в аварию
                водитель не вписан в полис. В этом случае ДТП можно оформить без
                ГИБДД. Но виновник аварии, не вписанный в полис, рискует
                получить регрессное требование от страховой компании на сумму
                выплаченного ущерба.
              </p>
            </div>
            <h4 class="dtp__attention">
              Вы можете вызвать на место ДТП эксперта
              <router-link to="/expert">на нашем сайте.</router-link> для
              получения профессиональной помощи
            </h4>
          </details>
          <details class="dtp">
            <summary class="dtp__summary">
              <h4>
                Машина с иностранными номерами - можно ли оформить ДТП без
                ГИБДД?
              </h4>
            </summary>
            <div class="dtp__culprit">
              <p>
                ДТП с участием машины с иностранными номерами можно оформить без
                ГАИ, – если соблюдаются все пять условий европротокола
                <a href="#evroRules">(см. тут)</a>. При этом на машину с
                иностранными номерами вместо ОСАГО может быть полис «Зеленая
                карта».
              </p>
              <h4 class="dtp__attention">
                Вы можете вызвать на место ДТП эксперта
                <router-link to="/expert">на нашем сайте.</router-link> для
                получения профессиональной помощи
              </h4>
            </div>
          </details>
          <details class="dtp">
            <summary class="dtp__summary">
              <h4>
                Сколько денег выплатит страховая, если ДТП оформлено без ГИБДД?
              </h4>
            </summary>
            <div class="dtp__culprit">
              <h5>
                Максимальная выплата по ОСАГО для аварии, оформленной без ГАИ,
                составляет 100.000 руб. Но она может быть увеличена до 400.000
                руб. при выполнении следующих двух условий:
              </h5>
              <ul class="dtp__ul">
                <li class="dtp__li">
                  Авария оформлена с использованием специального мобильного
                  приложения. Оно позволяет зафиксировать место ДТП и сделать
                  его фотосъемку. Для регистрации в приложении нужно иметь
                  профиль на портале гос. услуг.
                </li>
                <li class="dtp__li">
                  У обоих участников ДТП нет разногласий, а также противоречий в
                  описании обстоятельств аварии.
                </li>
              </ul>
              <p>
                Размер ущерба от конкретного ДТП определяется по результатам
                Независимой технической экспертизы.
              </p>
              <p>
                Если размер ущерба превысит лимит выплаты по европротоколу,
                страховая компания по ОСАГО заплатит максимальную сумму.
                Оставшуюся часть ущерба должен будет возместить виновник аварии.
              </p>
              <h4 class="dtp__attention">
                Оценить примерный размер ущерба о своей аварии Вы можете
                <router-link to="/expert">на нашем сайте.</router-link>
              </h4>
            </div>
          </details>
          <details class="dtp">
            <summary class="dtp__summary">
              <h4>
                Договорились оформить ДТП без ГАИ. Можно ли съехать с места ДТП?
              </h4>
            </summary>
            <div class="dtp__culprit">
              <p>
                Убрать ваше транспортное средство с место ДТП возможно в том
                случае, если при происшествии есть пострадавшие, и необходима
                необходима медицинская помощь и нет возможности транспортировать
                пострадавшего на ином транспорте. Если нужно устранить
                опасность, непосредственно угрожающую личности или интересам
                общества или государства. И эта опасность не может быть
                устранена иными средствами, а причиненный вред является менее
                значительным, чем предотвращенный.
              </p>
              <h4 class="dtp__attention">
                Вызовите эксперта
                <router-link to="/expert">на нашем сайте</router-link>. Для
                получения профессиональной помощи
              </h4>
            </div>
          </details>
          <details class="dtp">
            <summary class="dtp__summary">
              <h4>Я попал в ДТП. Что делать?</h4>
            </summary>
            <div class="dtp__culprit">
              <h4>а) Я виновник</h4>
              <p>
                Так как пунктом 2 статьи 11 Федерального закона № 40-ФЗ (об
                ОСАГО) от 25 апреля 2002 года предусматривается обязанность
                лица, которое является или может быть признано виновником ДТП,
                уведомить об аварии свою страховую компанию. Вам необходимо
                уведомить стразовую компанию о ДТП. Не ремонтируйте автомобиль
                15 дней. Оставьте у себя копию извещения о ДТП, проверьте, что
                все данные на ней читаются.
              </p>
              <h4 class="dtp__attention">
                Вы можете вызвать на место ДТП эксперта
                <router-link to="/expert">на нашем сайте.</router-link> для
                получения профессиональной помощи
              </h4>
            </div>
            <div class="dtp__victim">
              <h4>б) Я потерпевший</h4>
              <p>
                Если пострадали только автомобили, то вы можете заполнить
                европротокол. Обязательно проверьте все данные, проверьте полис
                виновника ДТП. О всей необходимой информации Вы можете узнать
                нга нашем сайте.
              </p>
              <h4 class="dtp__attention">
                Или вы можете вызвать на место ДТП эксперта
                <router-link to="/expert">на нашем сайте.</router-link> для
                получения профессиональной помощи
              </h4>
            </div>
          </details>
        </div>
      </v-container>
    </v-lazy>
  </section>
</template>

<script>
export default {
  name: 'Faq',
  data() {
    return {
      faqShow: false,
    }
  },
}
</script>

<style scoped>
.faq {
  background-size: cover;
  padding-bottom: 10%;
}

.faq__title {
  border-top: 1px solid #b71c1c;
  border-bottom: 1px solid #b71c1c;
}

.faq__title_h {
  font-style: normal;
  font-weight: normal;
  font-size: 1.7rem;
  line-height: 29px;
  text-align: center;
  letter-spacing: 0.055em;
  padding: 3% 0;
}

.dtp__summary {
  -moz-user-select: none;
  -ms-user-select: none;
  -o-user-select: none;
  -webkit-user-select: none;
  margin-top: 5%;
  padding: 1%;
  display: block;
}

.dtp__summary > h4 {
  text-align: center;
  font-size: 1.5rem;
  font-weight: normal;
}

details[open] > summary > h4 {
  transition: 0.3s;
  font-weight: lighter;
}

.dtp__summary::-webkit-details-marker {
  display: none;
}

.dtp__summary:focus,
.dtp:active {
  border: none;
  outline: none;
}

.dtp__summary::before {
  content: '';
  padding-right: 0.5em;
}

.dtp[open] {
  border: none;
}
.dtp[open] > .dtp__summary::before {
  content: '';
}
.dtp__ul {
  display: flex;
  flex-direction: column;
}
.dtp__li {
  list-style-type: decimal;
  list-style-position: inside;
  padding-left: 5px;
  padding-bottom: 5px;
  padding-top: 5px;
}
.dtp__attention {
  padding-top: 3%;
  font-size: larger;
}
.dtp__culprit {
  padding: 5% 0;
  backdrop-filter: blur(2px);
}
</style>
