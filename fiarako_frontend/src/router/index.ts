import DefaultLayout from '@/layouts/DefaultLayout.vue'
import Layout from '@/layouts/Layout.vue'
import { createRouter, createWebHistory } from 'vue-router'


const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path : '/home',
      name : 'Home',
      component: () => import('@/pages/Accueil.vue')
    },
    {
      path: '/',
      component: DefaultLayout,
      children:[
        {
          path:'',
          redirect:  {name : 'Home'}
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
          path : 'moto',
          name : 'Moto',
          component: () => import('@/pages/Moto.vue')
        },
        {
          path : 'voiture',
          name : 'Voiture',
          component: () => import('@/pages/Voiture.vue')
        },
      ]
    },
    {
      path: '/', // Groupe pour OtherLayout
      component: Layout, // Nouveau layout
      children: [
        {
          path: 'profil',
          name: 'Profil',
          component: () => import('@/pages/Profil.vue')
        },
        {
          path: 'vendre',
          name: 'Vendre',
          component: () => import('@/pages/Vendre.vue')
        },
        {
          path: 'vehicule-detail',
          name: 'Detail',
          component: () => import('@/pages/VehiculeDetail.vue')
        }
      ]
    }
  ],
})

export default router
