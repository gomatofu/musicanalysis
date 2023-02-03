import ExampleComponent from '../components/ExampleComponent.vue';
import TestVue from '../components/TestVue.vue';
import { createRouter, createWebHistory } from 'vue-router';

const router = createRouter({
  history: createWebHistory(),
  routes: [
    {
      path: "/",
      component: ExampleComponent,
      name:'home',
    },
    {
      path: "/routing",
      component: TestVue,
      name:'routing',
      },
  ],
});

export default router;
