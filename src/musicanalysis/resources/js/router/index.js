import Artist from '@/components/Artist';
import ArtistsAlbum from '@/components/ArtistsAlbum';
import AlbumDetail from '@/components/AlbumDetail';
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
    {
      path: "/albums/:id?",
      component: AlbumDetail,
      name:'albumDetail',
    },
  ],
});

export default router;
