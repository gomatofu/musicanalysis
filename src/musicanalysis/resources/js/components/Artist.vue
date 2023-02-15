<template>
    <div>
        <el-input v-model="text" placeholder="Please input" /> <br>
        <el-button type="primary" @click="buttonClicked">Primary</el-button>
        <el-table  v-loading="store.loading" @row-click="handleClick" :data="store.responseData" stripe style="width: 100%">
          <el-table-column label="image" width="180">
           <template #default="scope">
             <el-image
               style="width: 100px; height: 100px"
               :src="scope.row.image"
               :zoom-rate="1.2"
               :initial-index="4"
               fit="cover"
             />
           </template>
        </el-table-column>
          <el-table-column prop="name" label="name" style="width: 20%" />
          <el-table-column prop="genres" label="genres" style="width: 15%" />
          <el-table-column prop="popularity" label="popularity" style="width: 10%" />
          <el-table-column label="url" style="width: 35%">
          <template #default="scope">
            <el-link :href="scope.row.url">{{scope.row.url}}</el-link>
           </template>
        </el-table-column>
        </el-table>
    </div>
</template>

<script>
import { artistStore } from '@/stores/artist'

export default {
  name:'Artist',
  setup() {
    const store = artistStore()

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
    buttonClicked() {
      this.store.artistSearch(this.text);
    },
    handleClick(val) {
      this.$router.push({ name: 'album', params: { id: val.id } })
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