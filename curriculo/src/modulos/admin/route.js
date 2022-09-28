export default[
    {
        path: '/admin',
        name: 'admin', 
        component: () => import(/* webpackChunkName: "Login" */ './views/admin.vue')
    },
    
]