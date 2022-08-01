import Vue from "vue";
import VueResource from "vue-resource";
import serves from "./serves";
Vue.use(VueResource);
const http = Vue.http;
http.options.root = 'http://127.0.0.1:8000/api/';
Object.keys(serves).map(serve =>{
    serves[serve] = Vue.resource('',{},serves[serve])
})
export{http}
export default serves