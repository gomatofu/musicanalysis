<template>
    <div>
        <el-input v-model="text" placeholder="Please input" /> <br>
        <el-button type="primary" v-on:click="buttonClicked">Primary</el-button>
        <el-table :data="responseData" stripe style="width: 100%">
          <el-table-column label="image" style="width: 20%">
            <template slot-scope="scope" class="image-slot">
              <el-image style="width: 90px; height: 90px" :src="scope.row.image" lazy>
              </el-image>
          </template>
          </el-table-column>
          <el-table-column prop="name" label="name" style="width: 20%" />
          <el-table-column prop="genres" label="genres" style="width: 15%" />
          <el-table-column prop="popularity" label="popularity" style="width: 10%" />
          <el-table-column prop="url" label="url" style="width: 35%"/>
        </el-table>
        <img :src="message">
    </div>
</template>

<script>

export default {
  data() {
    return {
      message: "",
      text: "",
      responseData:[],
    };
  },
  
  methods: {
    async buttonClicked() {
      await axios.get("/api/hello", {params: {name:this.text}})
      .then(response => {
        this.responseData = response.data;
            })
    },
  },
};
</script>