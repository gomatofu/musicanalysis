require('./bootstrap');

import { createApp } from 'vue';
import router from './router';
import { createPinia } from "pinia";
import ElementPlus from 'element-plus';
import 'element-plus/dist/index.css';
import { createPersistedState } from "pinia-plugin-persistedstate";
import App from '@/app.vue';

const app = createApp({});
const pinia = createPinia(); 
pinia.use(createPersistedState());

app.component('app-vue', App);
app.use(pinia);
app.use(router);
app.use(ElementPlus);
app.mount('#app');