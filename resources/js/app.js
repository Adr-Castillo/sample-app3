// resources/js/app.js

import './bootstrap'
import {createApp} from 'vue'
import App from '../App.vue'
import router from './router.js'
import '../css/tailwind.css'
import '../css/app.css'
import axios from 'axios'

axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

createApp(App)
.use(router)
.mount("#app")