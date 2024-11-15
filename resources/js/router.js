// resources/js/router.js

import {createRouter, createWebHistory} from 'vue-router';
// import views to be used in the web router
import Login from './views/Login.vue'
import Profile from './views/Profile.vue'


const routes = [
  {
      // Catch all for routes that do not exist
      path: "/:catchAll(.*)",
      name: "NotFound",
      component: Profile,
  },
  {
      path: '/login',
      name: "Login",
      component: Login
  },
  {
      // restricted view that required authentication to enter
      path: '/profile',
      name: "Profile",
      component: Profile,
      
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
