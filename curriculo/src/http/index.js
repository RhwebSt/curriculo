import Vue from "vue";
import VueResource from "vue-resource";
import serves from "./serves";
Vue.use(VueResource);
const http = Vue.http;
http.options.root = 'https://curriculos.mobemaodeobra.com.br/public/api/';
Object.keys(serves).map(serve =>{
    serves[serve] = Vue.resource('',{},serves[serve])
})
const setBearetoken = token => {
    http.headers.common['Authorization'] = `Bearer ${token}`
}
export default serves
export{http,setBearetoken}