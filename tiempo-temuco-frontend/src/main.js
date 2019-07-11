import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'

import BootstrapVue from 'bootstrap-vue'

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

Vue.use(BootstrapVue)

import VueCarousel from 'vue-carousel';
Vue.use(VueCarousel);


import VueWindowSize from 'vue-window-size'; 
Vue.use(VueWindowSize);

import axios from 'axios'
import VueAxios from 'vue-axios' 
Vue.use(VueAxios, axios)

import VueFusionCharts from 'vue-fusioncharts';
import FusionCharts from 'fusioncharts';
import Charts from 'fusioncharts/fusioncharts.charts'
import FusionTheme from 'fusioncharts/themes/fusioncharts.theme.fusion';
Charts(FusionCharts);
FusionTheme(FusionCharts);
Vue.use(VueFusionCharts,FusionCharts);

import VueDisqus from 'vue-disqus'
Vue.use(VueDisqus);

import responsive from 'vue-responsive'
Vue.use(responsive);

Vue.config.productionTip = false

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
