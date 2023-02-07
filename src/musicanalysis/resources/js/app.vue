<template>
  <div>
    <div class="common-layout">
      <el-container>
        <el-header  class="common-header">
          <div class='title'>
            <p>Music Analysis</p>
          </div>
        </el-header>
        <el-container>
          <Aside/>
          <el-main><router-view></router-view></el-main>
        </el-container>
      </el-container>
    </div>
  </div>
</template>

<script>
import Header from '@/components/layout/Header';
import Aside from '@/components/layout/Aside';

export default {
  name: "layout",
  components:{
    Header,
    Aside,
  }
};
</script>

<style scoped>
.el-container {
  height: 100vh;
}
.el-header {
  background-color: #37474F;
}
.title {
  text-align: left;
  color: #E6EE9C;
}
</style>