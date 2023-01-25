<template>
  <div>
    Hello Vue !!
    <input type="text" />
  </div>
  
</template>

<script>
import { onMounted } from 'vue'
export default ({
  setup() {
    console.log("start vue")

    onMounted(() => {
      console.log('start mounted !')
    })
  },
})
</script>