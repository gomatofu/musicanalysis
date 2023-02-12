import Artist from '@/components/Artist';
import Album from '@/components/Album';
import { createRouter, createWebHistory } from 'vue-router';

const router = createRouter({
  history: createWebHistory(),
  routes: [
    {
      path: "/",
      component: Artist,
      name:'artist',
    },
    {
      path: "/album/:id?",
      component: Album,
      name:'album',
    },
  ],
});

export default router;
