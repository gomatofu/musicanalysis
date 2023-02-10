<template>
  <div>
    <a>{{ $route.query.name }}</a>
    <el-button type="primary" @click="buttonClicked">Primary</el-button>
  </div>
  
</template>

<script>
import { onMounted } from 'vue'
export default ({
  setup() {
    console.log("start vue")

    onMounted(() => {
      alart(this.$route.params.name);
      alart('aaaaaaaa');
    })
  },
  data() {
    return {
      text: "",
    };
  },
  methods: {
    buttonClicked() {
      alart('aaaaaaaa');
      alart(this.$route.query.name);
    }
  },
})
</script>