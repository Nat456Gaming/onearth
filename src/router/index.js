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
      path: '/settings',
      name: 'settings',
      component: () => import('../views/SettingsView.vue')
    },
    {
      path: '/search',
      redirect: '/search/challenge'
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
      path: '/user',
      name: 'user',
      component: () => import('../views/AboutView.vue')
    },
    {
      path: '/friends',
      name: 'friends',
      component: () => import('../views/FriendsView.vue')
    }
  ]
})

export default router
