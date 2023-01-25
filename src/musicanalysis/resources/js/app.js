require('./bootstrap');

import { createApp } from 'vue'
import router from './router.js'
import TestVue from './components/ExampleComponent.vue';
import App from './app.vue';

const app = createApp({})
app.component('app-vue', App);
app.use(router)
app.mount('#app')