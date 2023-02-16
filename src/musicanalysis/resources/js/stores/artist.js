import { defineStore } from "pinia"

export const useArtistStore = defineStore({
  id:"artist", 
  state: () => ({
    artistName:'',
    tableData:[],
    loading:false,
  }),
  actions: {
    async  artistSearch(artistName) {
        this.loading = true;
        await axios.get("/api/artists", {params: {name:artistName}})
        .then(response => {
          this.tableData = response.data;
              })
        this.loading = false;
    },
    artistsAlbumMove(artistId){
      this.$router.push({ name: 'artistsAlbum', params: { id: artistId.id } })
    }
  },
})
