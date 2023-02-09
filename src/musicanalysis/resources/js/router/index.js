import Artist from '@/components/Artist';
import TestVue from '@/components/TestVue';
import { createRouter, createWebHistory } from 'vue-router';

const router = createRouter({
  history: createWebHistory(),
  routes: [
    {
      path: "/",
      component: Artist,
      name:'Artist',
    },
    {
      path: "/routing/:artist?",
      component: TestVue,
      name:'routing',
      },
  ],
});

export default router;
