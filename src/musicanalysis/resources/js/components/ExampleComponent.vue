<template>
    <div>
        <h1>Laravel 9 And Vue 3</h1>
        <input type="text" v-model="text"/>
        <button v-on:click="buttonClicked">クリック</button>
        <h1>{{ text }}</h1>
        <img :src="message">
    </div>
</template>

<script>
export default {
  data() {
    return {
      message: "",
      text: "",
    };
  },
  methods: {
    async buttonClicked() {
      const res = await axios.get("/api/hello", {params: {name:this.text}});
      this.message = res.data;
    },
  },
};
</script>