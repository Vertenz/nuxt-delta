<template>
  <section id="expert" class="expert">
    <v-container>
      <v-row align="center" justify="center" class="expert__title">
        <h4 class="expert__title_h4">Заказать расчёте стоимости ущерба</h4>
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
          :loading="loading"
          @input="$v.name.$touch()"
          @blur="$v.name.$touch()"
        ></v-text-field>
        <v-text-field
          id="phone"
          v-model="phone"
          :error-messages="phoneErrors"
          label="Телефон"
          required
          type="tel"
          placeholder="(999) 123-5689"
          :loading="loading"
          @input="$v.phone.$touch()"
          @blur="$v.phone.$touch()"
          @change="phoneMask()"
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
            title="Стоимость услуги зависит от необходимой работы. С вами свяжется оператор для уточнения всей информации"
          >
            <template #label>
              <div>
                Оплата <strong class="primary--text">Онлайн</strong> картой
              </div>
            </template>
          </v-radio>
          <v-radio
            value="cash"
            title="Стоимость услуги зависит от необходимой работы. С вами свяжется оператор для уточнения всей информации"
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
          <template #label>
            <div>
              Я согласен с
              <v-tooltip bottom>
                <template #activator="{ on }">
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
        <v-btn :loading="loading" class="mr-4 mt-4" @click="submit">
          Заказать расчет
        </v-btn>
        <v-btn :loading="loading" class="mr-4 mt-4" @click="clear">
          Очистить
        </v-btn>
      </v-form>
      <v-row align="center" justify="center">
        <div>
          Если вы потерпевший и намереваетесь обратиться в страховую компанию за
          возмещением ущерба, то страховая компания организует для вас
          экспертизу. Однако для других целей, например, для проверки
          правильности экспертизы, сделанной по заказу страховой компании, для
          обращения к виновнику ДТП за возмещением ущерба или в судебные
          инстанции, для определения стоимости восстановительного ремонта и
          прочих целей, вам может понадобиться полноценное, составленное и
          оформленное надлежащим образом, экспертное заключение. Закажите у нас
          данную услугу, наш эксперт осмотрит поврежденное имущество в удобном
          для вас месте, после чего эксперты-техники осуществят расчет ущерба с
          использованием лицензированных программных комплексов.
        </div>
      </v-row>
    </v-container>
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
    error: false,
  }),

  head() {
    return {
      title: 'Расчет',
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
        errors.push(
          'К сожалению, 40 символом максимальное количество для имени'
        )
      !this.$v.name.required &&
        errors.push(
          'К сожалению, 40 символом максимальное количество для имени'
        )
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
        this.$router.replace({ path: '/done' })
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
    },
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
</style>
