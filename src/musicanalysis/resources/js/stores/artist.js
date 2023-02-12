import { defineStore } from "pinia"

export const artistStore = defineStore("artist", {
  state: () => ({
    responseData:[],
    loading:false,
  }),
  getters: {
  },
  actions: {
    async  artistSearch(name) {
        this.loading = true;
        await axios.get("/api/artist", {params: {name:name}})
        .then(response => {
          this.responseData = response.data;
              })
        this.loading = false;
    },
  },
})
