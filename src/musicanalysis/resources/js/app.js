require('./bootstrap');

import { createApp } from 'vue'
import router from './router.js'
import "vuetify/styles";
import {createVuetify} from 'vuetify';
import App from './app.vue';
import * as components from 'vuetify/components';
import * as directives from 'vuetify/directives';

const vuetify = createVuetify({
    components,
    directives,
});
const app = createApp({})

app.component('app-vue', App);
app.use(router);
app.use(vuetify);
app.mount('#app');