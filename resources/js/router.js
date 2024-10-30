// resources/js/router.js

import {createRouter, createWebHistory} from 'vue-router';
// import views to be used in the web router
import Home from './views/Home.vue'
import Profile from './views/Profile.vue'


const routes = [
  {
      // Catch all for routes that do not exist
      path: "/:catchAll(.*)",
      name: "NotFound",
      component: Profile,
  },
  {
      path: '/',
      name: "Home",
      component: Home
  },
  {
      // restricted view that required authentication to enter
      path: '/profile',
      name: "Profile",
      component: Profile,
      beforeEnter: validateAccessToken
  },
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

async function validateAccessToken(to, from, next) {
  next();
}

export default router
