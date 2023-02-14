<template>
  <div>
    <div>
        <el-table   
              v-loading="store.loading" 
              @row-click="handleClick" 
              :data="store.pagedTableData" 
              stripe style="width: 100%">
          <el-table-column prop='image' label="image" style="width: 20%">
          </el-table-column>
          <el-table-column prop="name" label="name" style="width: 20%" />
          <el-table-column prop="release_date" label="release_date" style="width: 15%" />
          <el-table-column prop="track" label="track" style="width: 10%" />
          <el-table-column prop="url" label="url" style="width: 35%"/>
        </el-table>
        <el-pagination layout="prev, pager, next" :page-size="store.pageSize" :total="store.total" @current-change="setPage">
     </el-pagination>
    </div>
  </div>
  
</template>

<script>
import { albumStore } from '@/stores/album'
export default ({
  name: "Albums",
  setup() {
    const store = albumStore()

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