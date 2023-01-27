require('./bootstrap');

import { createApp } from 'vue'
import router from './router.js'
import ElementPlus from 'element-plus'
import 'element-plus/dist/index.css'
import App from './app.vue';

const app = createApp({})

app.component('app-vue', App);
app.use(router);
app.use(ElementPlus)
app.mount('#app');