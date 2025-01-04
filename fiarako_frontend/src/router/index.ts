import DefaultLayout from '@/layouts/DefaultLayout.vue'
import { createRouter, createWebHistory } from 'vue-router'


const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      component: DefaultLayout,
      children:[
        {
          path : 'home',
          name : 'Home',
          component: () => import('@/pages/Accueil.vue')
        },
        {
          path : 'login',
          name : 'Login',
          component: () => import('@/pages/Login.vue')
        },
        {
          path : 'inscription',
          name : 'Inscription',
          component: () => import('@/pages/Inscription.vue')
        },
        {
          path : 'profil',
          name : 'Profil',
          component: () => import('@/pages/Profil.vue')
        },
        {
          path : 'moto',
          name : 'Moto',
          component: () => import('@/pages/Moto.vue')
        },
        {
          path : 'voiture',
          name : 'Voiture',
          component: () => import('@/pages/Voiture.vue')
        },
        {
          path : 'vendre',
          name : 'Vendre',
          component: () => import('@/pages/Vendre.vue')
        }
      ]
    }
  ],
})

export default router
