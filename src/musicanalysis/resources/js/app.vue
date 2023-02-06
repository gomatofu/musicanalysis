<template>
  <div>
    <div class="common-layout">
      <el-container>
        <el-header class="common-header flex-float">
          <div class="flex">
            <h1 class="title">商铺后台管理系统</h1>
          </div>

          <el-button type="danger">退出</el-button>
        </el-header>
        <el-container>
          <el-aside class="common-aside" width="200px">
            <el-menu background-color="none" text-color="#fff" :router="true">
              <el-sub-menu index="1">
                <template #title>
                  <el-icon><location /></el-icon>
                  <span>账号管理</span>
                </template>

                <el-menu-item-group>
                  <el-menu-item index="/user">用户列表</el-menu-item>
                  <!-- <el-menu-item index="1-2">item two</el-menu-item> -->
                </el-menu-item-group>
              </el-sub-menu>

              <el-sub-menu index="2">
                <template #title>
                  <el-icon><location /></el-icon>
                  <span>角色管理</span>
                </template>

                <el-menu-item-group>
                  <el-menu-item index="/role">角色列表</el-menu-item>
                  <!-- <el-menu-item index="1-2">item two</el-menu-item> -->
                </el-menu-item-group>
              </el-sub-menu>
            </el-menu>
          </el-aside>
          <el-main><router-view></router-view></el-main>
        </el-container>
      </el-container>
    </div>
  </div>
</template>

<script>
export default {
  name: "layout",
  setup() {},
};
</script>
<style >
.el-container {
  height: 100vh;
  overflow: hidden;
}
.common-header {
  background: rgb(63 67 72);
}

.common-aside {
  background: rgb(48, 55, 65);
}
.logo {
  width: 60px;
}
.title {
  color: #fff;
}
</style>