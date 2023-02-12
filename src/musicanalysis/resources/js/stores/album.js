import { defineStore } from "pinia"

export const albumStore = defineStore("album", {
  state: () => ({
    responseData:[],
    loading:false,
  }),
  getters: {
  },
  actions: {
    async albumSearch(id) {
        this.loading = true;
        await axios.get("/api/album/"+id, {params: {id:id}})
        .then(response => {
          this.responseData = response.data;
              })
        this.loading = false;
    },
  },
  persist: true,
})