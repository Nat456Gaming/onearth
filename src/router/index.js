import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: () => import('../views/HomeView.vue')
    },
    {
      path: '/search/challenge',
      name: 'searchChallenge',
      component: () => import('../views/SearchChallengeView.vue')
    },
    {
      path: '/search/user',
      name: 'searchUser',
      component: () => import('../views/SearchUserView.vue')
    },
    {
      path: '/user/:id',
      name: 'user',
      component: () => import('../views/UserView.vue')
    }
  ]
})

export default router
