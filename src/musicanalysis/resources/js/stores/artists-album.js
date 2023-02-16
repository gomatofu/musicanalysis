import { defineStore } from "pinia"

export const useArtistsAlbumStore = defineStore({
  id:"artistsAlbum",
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
    async artistsAlbumSearch(id) {
        this.loading = true;
        await axios.get("/api/artists/"+id+"/albums", {params: {id:id}})
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