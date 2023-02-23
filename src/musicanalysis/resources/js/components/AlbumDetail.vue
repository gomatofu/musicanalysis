<template>
    <div>
      <div>
    <h2>chart sample</h2>
    <Chart :chartdata="chartdata"></Chart>
  </div>
        <el-table   v-loading="albumDetailStore.loading" 
                    :data="albumDetailStore.pagedTableData" 
                    stripe style="width: 100%">
          <el-table-column prop="disc_number" label="disc_number" :min-width="5" />
          <el-table-column prop="name" label="name" :min-width="30" />
          <el-table-column prop="time" label="duration_ms" :min-width="10" />
          <el-table-column prop="key" label="key" :min-width="5" />
          <el-table-column prop="mode" label="mode" :min-width="5" />
          <el-table-column prop="tempo" label="tempo" :min-width="5" />
          <el-table-column label="preview_url" :min-width="40">
          <template #default="scope">
            <a v-bind:href="scope.row.preview_url" target="_blank">{{scope.row.preview_url}}</a>
           </template>
        </el-table-column>
        </el-table>
        <el-pagination 
          layout="prev, pager, next" 
          :page-size="albumDetailStore.pageSize" 
          :total="albumDetailStore.total" 
          @current-change="setPage">
      </el-pagination>
    </div>
</template>

<script setup name="AlbumDetail">
import { onMounted } from "vue";
import { useRoute } from 'vue-router'
import { useAlbumDetailStore } from '@/stores/album-detail'

const albumDetailStore = useAlbumDetailStore();
const route = useRoute();

const setPage = (currentPage) => {
  albumDetailStore.setPage(currentPage);
};
onMounted(() => {
  albumDetailStore.albumDetailSearch(route.params.id);
});
</script>

<script>
import Chart from '@/components/chart/Chart';

export default {
  components: {
    Chart,
  },
  data(){
    return {
        chartdata: {
          labels: [
        'Red',
        'Yellow',
        'Blue'
        ],
        datasets: [{
          data: [10, 20, 30]
        }],
        },
    }
  },
}
</script>

<style>
body {
  margin: 0;
}
.example-showcase .el-loading-mask {
  z-index: 9;
}
</style>