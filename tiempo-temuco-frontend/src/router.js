import Vue from 'vue'
import Router from 'vue-router'
import Home from './views/Home.vue'

Vue.use(Router)

export default new Router({
  mode: 'history',
  base: process.env.BASE_URL,
  routes: [
    {
      path: '/',
      name: 'home',
      component: () => import(/* webpackChunkName: "about" */ './views/About.vue')
    },
    {
      path: '/graficos',
      name: 'graficos',
      // route level code-splitting
      // this generates a separate chunk (about.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import(/* webpackChunkName: "about" */ './views/Graficos.vue')
    },
    {
      path: '/foro',
      name: 'foro',
      component: () => import(/* webpackChunkName: "about" */ './views/Foro.vue')
    }
  ]
})
