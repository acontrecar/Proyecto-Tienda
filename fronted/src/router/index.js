import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: () => import('../components/HomeComponent.vue')
    },
    {
      path: '/products',
      name: 'products',
      component: () => import('../components/ProductsComponent.vue')
    },
    {
      path: '/loginRegister',
      name: 'login-register',
      component: () => import('../components/LoginRegisterComponent.vue')
    }
  ]
})

export default router
