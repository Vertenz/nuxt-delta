<template>
  <div class="test" @click="testMethod">
    <h1>test</h1>
  </div>
</template>

<script>
export default {
  name: 'Test',
  methods: {
    testMethod() {
      window.navigator.clipboard.writeText('test')
    },
  },
}
</script>

<style scoped>
.test {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 250px;
  height: 250px;
  border: 5px solid red;
}
</style>
