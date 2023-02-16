import Artist from '@/components/Artist';
import ArtistsAlbum from '@/components/ArtistsAlbum';
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
      path: "/artists/:id?/albums",
      component: ArtistsAlbum,
      name:'artistsAlbum',
    },
  ],
});

export default router;
