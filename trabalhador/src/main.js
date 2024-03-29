import Vue from 'vue'
import App from './App'
import './registerServiceWorker'
import router from './router'
import store from './store'
import vuetify from './plugins/vuetify'
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
// import validate from "./plugins/validate";
// import laravel from "./plugins/laravel";
import VueTailwind from 'vue-tailwind'
import "./assets/scss/app.scss";
import './assets/tailwind.css'

// import Echo from 'laravel-echo';
Vue.config.productionTip = false
import Maska from 'maska'
Vue.use(Maska)
import Vuelidate from 'vuelidate'
Vue.use(Vuelidate)

window.Pusher = require('pusher-js');
Vue.use(VueSweetalert2);
// const token = localStorage.getItem('token')
// window.Echo = new Echo({
//   broadcaster: 'pusher',
//   key: process.env.VUE_APP_WEBSOCKETS_KEY,
//   wsHost: process.env.VUE_APP_WEBSOCKETS_SERVER,
//   //authEndpoint: `http://${process.env.VUE_APP_WEBSOCKETS_SERVER}:8000/broadcasting/auth`,
//   encrypted: false,
//   forceTLS: false,
//   // wsPort: 6001,
//   wssPort: 6001,
//   disableStats: true,
//   // enabledTransports: [ 'wss'],
//   // auth: {
//   //   headers: {
//   //     // authorization: 'Bearer ' + token,
//   //     'Access-Control-Allow-Origin': '*',
//   //     'Content-type': 'application/json',
//   //   }
//   // }
// })
// window.Echo = new Echo({
//   broadcaster: 'pusher',
//   key: process.env.VUE_APP_WEBSOCKETS_KEY,
//   // cluster: process.env.VUE_APP_WEBSOCKETS_CLUSTER,
//   wsHost:process.env.VUE_APP_WEBSOCKETS_SERVER,
//   encrypted: false,
//   // forceTLS: false,
//   wsPort: 6001,
//   // wssPort: 6001,
//   // enabledTransports: ['ws', 'wss'],
//   disableStats: true,
// });
new Vue({
  router,
  store,
  vuetify,
  // validate,
  VueTailwind,
  render: h => h(App)
}).$mount('#app')
