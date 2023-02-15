<template>
  <div>
    <div>
      <el-carousel :interval="2000" type="card" height="200px" width="500px">
    <el-carousel-item v-for="item in store.tableData" :key="store.tableData">
      <img class="item__image" :src="item.image" alt="" />
    </el-carousel-item>
  </el-carousel>
  <el-button type="primary" @click="buttonClicked">Primary</el-button>
      <el-table
        v-loading="store.loading" 
        @row-click="handleClick" 
        :data="store.pagedTableData" 
        stripe style="width: 100%">

        <el-table-column label="image" :min-width="10" >
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
        <el-table-column prop="name" label="name" :min-width="30" />
        <el-table-column prop="release_date" label="release_date" :min-width="15" />
        <el-table-column prop="track" label="track" :min-width="15" />
        <el-table-column label="url" :min-width="30">
          <template #default="scope">
            <el-link :href="scope.row.url">{{scope.row.url}}</el-link>
           </template>
        </el-table-column>
      </el-table>
      <el-pagination layout="prev, pager, next" :page-size="store.pageSize" :total="store.total" @current-change="setPage">
      </el-pagination>
    </div>
  </div>
</template>

<script>
import { albumStore } from '@/stores/album'
export default ({
  name: "Album",
  setup() {
    const store = albumStore();
    return {
      store,
    }
  },
  data() {
    return {
    };
  },

  methods: {
    setPage(currentPage) {
      this.store.setPage(currentPage);
    },
  },
  async mounted() {
    this.store.albumSearch(this.$route.params.id);
  }
})
</script>

<style scoped>
.item__image{
  color: #475669;
  opacity: 0.75;
  line-height: 200px;
  margin: 0;
  text-align: center;
  height: 200px;
}
</style>