<template>
  <section id="expert" class="expert">
    <v-container>
      <v-row align="center" justify="center" class="expert__title">
        <h4 class="expert__title_h4">Вызов эксперта на место ДТП</h4>
      </v-row>
      <v-form class="pa-8">
        <v-text-field
          id="name"
          v-model="name"
          :error-messages="nameErrors"
          :counter="40"
          label="Имя"
          required
          type="text"
          class="form-input"
          @input="$v.name.$touch()"
          @blur="$v.name.$touch()"
          :loading="loading"
        ></v-text-field>
        <v-text-field
          id="phone"
          v-model="phone"
          :error-messages="phoneErrors"
          label="Телефон"
          required
          type="tel"
          placeholder="(999) 123-5689"
          @input="$v.phone.$touch()"
          @blur="$v.phone.$touch(); phoneMask()"
          :loading="loading"
        ></v-text-field>
        <v-radio-group
          v-model="select"
          :error-messages="selectErrors"
          @change="$v.select.$touch()"
          @blur="$v.select.$touch()"
        >
          <template #label>
            <div>Способ оплаты</div>
          </template>
          <v-radio
            value="online"
            title="Стоимость услуги 2000 руб. (две тысячи рублей). Оплата производится онлайн."
          >
            <template #label>
              <div>
                Оплата <strong class="primary--text">Онлайн</strong> картой
              </div>
            </template>
          </v-radio>
          <v-radio
            value="cash"
            title="Стоимость услуги 2000 руб. (две тысячи рублей). Оплата производится наличным расчетом эксперту"
          >
            <template #label>
              <div>
                Оплата <strong class="primary--text">Наличными</strong> эксперту
              </div>
            </template>
          </v-radio>
        </v-radio-group>
        <v-checkbox
          v-model="checkbox"
          :error-messages="checkboxErrors"
          required
          @change="$v.checkbox.$touch()"
          @blur="$v.checkbox.$touch()"
        >
          <template v-slot:label>
            <div>
              Я согласен с
              <v-tooltip bottom>
                <template v-slot:activator="{ on }">
                  <a
                    target="_blank"
                    href="/doc.pdf"
                    download=""
                    @click.stop
                    v-on="on"
                  >
                    условиями
                  </a>
                </template>
                Скачать условия и правила
              </v-tooltip>
              по оформлению услуги
            </div>
          </template>
        </v-checkbox>
        <v-btn :loading="loading" class="mr-4 mt-4" @click="submit"> Вызвать эксперта </v-btn>
        <v-btn :loading="loading" class="mr-4 mt-4" @click="clear"> Очистить </v-btn>
      </v-form>
      <v-row align="center" justify="center">
        <div>
          Наш эксперт приедет на место ДТП в течение 30 минут<span class="alert">*</span> с момента заказа услуги. Окажет консультацию по способу оформления ДТП (с участием ГИБДД или Европротокол). В зависимости от способа оформления ДТП подскажет порядок действий по процедуре оформления ДТП (схема, Извещение, составление документов сотрудниками ГИБДД). Подскажет порядок обращения в страховую компанию.
          Составит и заполнит Протокол оформления ДТП, в котором указываются все сведения, необходимые и достаточные для оформления ДТП сотрудники ГИБДД, для доказательства наличия ДТП и страхового случая, для определения ответственного за ДТП, осуществит фотографирование транспортных средств, места ДТП.
          <div class="alert">* Интервал приезда эксперта может меняться в зависимости от дорожной обстановки.</div>
        </div>
      </v-row>
    </v-container>
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
  </section>
</template>

<script>
import { validationMixin } from 'vuelidate'
import { required, maxLength, minLength } from 'vuelidate/lib/validators'

export default {
  name: 'Index',
  mixins: [validationMixin],

  validations: {
    name: { required, maxLength: maxLength(40) },
    phone: { required, maxLength: maxLength(14), minLength: minLength(10) },
    select: { required },
    checkbox: {
      checked(val) {
        return val
      },
    },
  },

  data: () => ({
    name: '',
    phone: '',
    select: '',
    checkbox: false,
    loading: false,
    response: '',
    error: false
  }),

  head() {
    return {
      title: 'Аварком',
    }
  },

  computed: {
    checkboxErrors() {
      const errors = []
      if (!this.$v.checkbox.$dirty) return errors
      !this.$v.checkbox.checked &&
      errors.push(
        'Пожалуйста, подтвердите согласие с правилами оказания услуги!'
      )
      return errors
    },
    selectErrors() {
      const errors = []
      if (!this.$v.select.$dirty) return errors
      !this.$v.select.required &&
      errors.push('Необходимо выбрать способ оплаты')
      return errors
    },
    nameErrors() {
      const errors = []
      if (!this.$v.name.$dirty) return errors
      !this.$v.name.maxLength &&
      errors.push('К сожалению, 40 символом максимум для имени')
      !this.$v.name.required &&
      errors.push('Нам нужно знать, как к Вам обращаться.')
      return errors
    },
    phoneErrors() {
      const errors = []
      if (!this.$v.phone.$dirty) return errors
      !this.$v.phone.required &&
      errors.push('Нам нужен Ваш номер телефона, чтобы связаться с Вами')
      !this.$v.phone.maxLength &&
      errors.push(
        'К сожалению, 14 символом максимум для имени номера телефона'
      )
      !this.$v.phone.minLength &&
      errors.push('Минимум 10 знаков. Например: 8999-999-9999')
      return errors
    },
  },

  methods: {
    submit() {
      this.$v.$touch()
      if (
        this.name !== '' &&
        this.name.length > 1 &&
        this.phone !== '' &&
        this.phone.length > 9 &&
        this.select !== '' &&
        this.checkbox === true
      ) {
        this.loading = true
        this.$axios
          .post(this.$store.state.api, {
            name: this.name,
            phone: this.phone,
            type: 'выезд на место ДТП',
          })
          .then((response) => (this.response = response))
          .catch((error) => {
            this.response = error
            this.error = true
          })
          .finally(() => {
            this.loading = false
            if (this.error !== true) {
              this.$router.replace({ path: '/done' })
            } else {
              alert('Что-то пошло не так, повторите попытку еще раз')
            }
          })
      }
    },
    clear() {
      this.$v.$reset()
      this.name = ''
      this.phone = ''
      this.select = null
      this.checkbox = false
    },
    phoneMask() {
      if (/\d/.test(this.phone)) {
        const phoneNumber = this.phone.match(/\d/g).join('')
          if (phoneNumber.length === 11 || phoneNumber.length === 10) {
            this.addPhoneNumber(phoneNumber)
        } else {
          this.phone = ''
        }
      } else {
        this.phone = ''
      }
    },
    addPhoneNumber(phoneNumber) {
      setTimeout(() => {
        this.phone = phoneNumber
      }, 800)
    }
  },
}
</script>
<style scoped>
.expert {
  padding-bottom: 50%;
}

.expert__title {
  border-top: 1px solid #b71c1c;
  border-bottom: 1px solid #b71c1c;
}

.expert__title_h4 {
  font-style: normal;
  font-weight: normal;
  font-size: 1.7rem;
  line-height: 29px;
  text-align: center;
  letter-spacing: 0.055em;
  padding: 3% 0;
}

.edit {
  position: fixed;
  z-index: 999;
  top: 25px;
  background-color: #3c3b3b;
  display: flex;
  flex-direction: column;
  height: 350px;
  width: 350px;
  &_text {
    color: white;
    margin-bottom: 50px;
  }
}
</style>
