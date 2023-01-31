<template>
    <div>
        <el-input v-model="text" placeholder="Please input" /> <br>
        <el-button type="primary" v-on:click="buttonClicked">Primary</el-button>
        <el-table :data="tableData" stripe style="width: 100%">
          <el-table-column prop="name" label="name" width="180" />
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
      tableData:[],
    };
  },
  
  methods: {
    async buttonClicked() {
      axios.get("/api/hello", {params: {name:this.text}})
      .then(response => {
                this.tableData = response.data;
            })
      setTimeout('alert(response.data);', 10000);
    },
  },
};
</script>