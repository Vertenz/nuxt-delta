<template>
  <v-container @click.right="al()">
    <Evro></Evro>
    <div v-if="editEnable" id="edit" class="edit">
      <textarea
        id="edit_text"
        v-model="text"
        :placeholder="text"
        class="edit_text"
        rows="5"
        wrap="hard"
        autofocus
      ></textarea>
      <v-btn @click="changeText">Применить</v-btn>
      <v-btn @click="close">
        <v-icon dark> mdi-skull-crossbones</v-icon>
      </v-btn>
      <v-btn @mousedown.stop="changePosition">
        <v-icon dark> mdi-arrow-all</v-icon>
      </v-btn>
      <v-btn
        @click="sendChange"
        style="margin-top: 20px; border: 1px solid purple"
        >Изменить на совсем</v-btn
      >
    </div>
  </v-container>
</template>

<script>
export default {
  name: 'Evroprotokol',
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
      title: 'европротокол',
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
        this.el.style.cssText = `
            background-color: darkslategrey;
            filter: drop-shadow(2px 4px 6px black);
            `
        event.preventDefault()
      } else {
        alert(
          'нужно закрыть окно редактирования текста (одновременно может быть только одно окно)'
        )
      }
    },
    changeText() {
      this.textBefore = this.el.innerHTML
      this.el.textContent = this.text
    },
    changePosition() {
      document.body.onmouseup = () => {
        if (!this.changePlace) {
          const block = document.getElementById('edit')
          block.style.left = event.clientX - 175 + 'px'
          block.style.top = event.clientY - 175 + 'px'
          this.changePlace = true
        }
      }
      this.changePlace = false
    },
    close() {
      this.el.style.cssText = ` `
      this.text = ''
      this.el = ''
      this.editEnable = false
    },
    sendChange() {
      const agree = confirm(
        'Это окончательный вариант? И уже предварительно был просмотрен?'
      )
      if (agree) {
        this.$axios
          .post(this.$store.state.api, {
            pathName: window.location.pathname,
            tag: this.el.tagName,
            class: this.el.className || 'none',
            textBefore: this.textBefore,
            newText: this.el.innerHTML,
          })
          .then((res) =>
            alert(
              'Успешно отправлено! В ближайшее время поменяю. ' + res.statusText
            )
          )
          .catch((err) =>
            alert(
              'Что-то пошло не так! Надо попробовать еще разок. Ошибка ' + err
            )
          )
      }
    },
  },
}
</script>
<style lang="scss">
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
    height: max-content;
  }
}
</style>
