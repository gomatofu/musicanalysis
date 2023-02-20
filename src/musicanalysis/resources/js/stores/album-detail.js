import { defineStore } from "pinia"

export const useAlbumDetailStore = defineStore({
  id:"albumDetail",
  state: () => ({
    tableData:[],
    page: 1,
    total: 0,
    pageSize: 10,
    loading:false,
  }),
  getters: {
    pagedTableData: (state) => state.tableData.slice((state.page - 1) * state.pageSize,state.page * state.pageSize)
  },
  actions: {
    async albumDetailSearch(id) {
        this.loading = true;
        await axios.get("/api/albums/"+id, {params: {id:id}})
        .then(response => {
          this.tableData = response.data;
              })
        this.total = this.tableData.length;
        this.loading = false;
    },
    setPage (currentPage) {
      this.page = currentPage
    },
  },
})