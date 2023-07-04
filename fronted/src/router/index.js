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
    },
    {
      path: '/products/:id',
      name: 'product-detail',
      component: () => import('../components/ProductDetailComponent.vue')

      //   props: (route) => {
      //     return {
      //       id: route.params.id
      //     }
      //   }
    }
  ]
})

export default router
