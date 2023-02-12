<template>
  <div>
    <el-button type="primary" @click="artistSearch">Primary</el-button>
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

  },
  async mounted() {
    this.store.albumSearch(this.$route.params.id);
  }
})
</script>