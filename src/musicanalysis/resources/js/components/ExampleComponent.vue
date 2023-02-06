<template>
    <div>
        <li><router-link to="/routing">Rounting Test</router-link></li>
        <el-input v-model="text" placeholder="Please input" /> <br>
        <el-button type="primary" @click="buttonClicked">Primary</el-button>
        <el-table  v-loading="store.loading" @row-click="handleClick" :data="store.responseData" stripe style="width: 100%">
          <el-table-column prop='image' label="image" style="width: 20%">
          </el-table-column>
          <el-table-column prop="name" label="name" style="width: 20%" />
          <el-table-column prop="genres" label="genres" style="width: 15%" />
          <el-table-column prop="popularity" label="popularity" style="width: 10%" />
          <el-table-column prop="url" label="url" style="width: 35%"/>
        </el-table>
        <img :src="message">
    </div>
</template>

<script>
import { searchStore } from '@/stores/search'

export default {
  setup() {
    const store = searchStore()

    return {
      store,
    }
  },
  data() {
    return {
      message: "",
      text: "",
    };
  },
  
  methods: {
    // ローディング表示
    loadingStart() {
      this.loading = true;
    },
    loadingStop() {
      this.loading = false;
    },
    buttonClicked() {
      this.store.artistSearch(this.text);
    },
    handleClick(val) {
      this.$router.push('/routing')
      }
  },
};
</script>

<style>
body {
  margin: 0;
}
.example-showcase .el-loading-mask {
  z-index: 9;
}
</style>