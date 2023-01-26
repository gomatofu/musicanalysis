<template>
  <v-app :theme="theme">
    <v-app-bar>
      <v-spacer></v-spacer>

      <v-btn
        :prepend-icon="theme === 'light' ? 'mdi-weather-sunny' : 'mdi-weather-night'"
        @click="onClick"
      >Toggle Theme</v-btn>
    </v-app-bar>

    <v-main>
      <TestVue />
    </v-main>
  </v-app>
</template>
  
<script>
import TestVue from './components/ExampleComponent.vue';
import { ref } from 'vue'

export default {
  components: {
      TestVue,
  },
  data() {
    return {
      theme: 'light',
    };
  },
  methods: {
    async onClick() {
      theme.value = theme.value === 'light' ? 'dark' : 'light';
    },
  },
};


</script>