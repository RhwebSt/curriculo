export default[
    {
        path: '/trabalhador',
        name: 'trabalhador', 
        component: () => import(/* webpackChunkName: "Login" */ './views/home.vue')
    },
    
]