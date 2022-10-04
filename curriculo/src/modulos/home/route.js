export default[
    {
        path: '/',
        name: 'index', 
        component: () => import(/* webpackChunkName: "Login" */ './views/home.vue')
    },
    
]