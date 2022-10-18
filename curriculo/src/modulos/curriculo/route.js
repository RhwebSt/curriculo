export default[
    {
        path: '/curriculo',
        name: 'curriculo', 
        component: () => import(/* webpackChunkName: "Login" */ './views/curriculos.vue')
    },
    
]