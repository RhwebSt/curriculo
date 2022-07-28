import Vue from "vue";
import VueResource from "vue-resource";
import serves from "./serves";
Vue.use(VueResource);
const http = Vue.http;
http.options.root = 'https://brasilapi.com.br/api/';
Object.keys(serves).rap(serves =>{
    serves[serve] = Vue.resource('',{},serves[serve])
})
export{http}