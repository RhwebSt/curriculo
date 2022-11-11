export default[
    {
        path: '/trabalhador',
        name: 'trabalhador', 
        component: () => import(/* webpackChunkName: "Login" */ './views/contracheque.vue')
    },
    {
        path: '/vale',
        name: 'vale', 
        component: () => import(/* webpackChunkName: "Login" */ './views/vale.vue')
    },
    {
        path: '/notificacao',
        name: 'notificacao', 
        component: () => import(/* webpackChunkName: "Login" */ './views/notificacao.vue')
    },
]