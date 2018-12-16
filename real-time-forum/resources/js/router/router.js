import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Login from '../components/login/Login'
import Signup from '../components/login/Signup'
import Forum from '../components/forum/Forum'
import Logout from '../components/login/Logout'
import Read from '../components/forum/Read'

const routes = [
  { path: '/login', component: Login },
  { path: '/signup', component: Signup },
  { path: '/forum', component: Forum, name: 'forum' },
  { path: '/logout', component: Logout, name: 'logout' },
  { path: '/question/:slug', component: Read },
];

const router = new VueRouter({
  routes,
  //hashbang: false,
  mode: 'history'
});

export default router;