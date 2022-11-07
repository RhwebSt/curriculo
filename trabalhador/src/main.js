import Vue from 'vue'
import App from './App'
import './registerServiceWorker'
import router from './router'
import store from './store'
import vuetify from './plugins/vuetify'
import VueTailwind from 'vue-tailwind'
import "./assets/scss/app.scss";
import './assets/tailwind.css'
Vue.config.productionTip = false
import Maska from 'maska'
Vue.use(Maska)
new Vue({
  router,
  store,
  vuetify,
  VueTailwind,
  render: h => h(App)
}).$mount('#app')
