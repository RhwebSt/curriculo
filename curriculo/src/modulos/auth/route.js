export default[
    {
        path: '/login',
        name: 'login', 
        component: () => import(/* webpackChunkName: "Login" */ './views/Login.vue')
    },
    {
        path: '/cadastrar',
        name: 'cadastrar', 
        component: () => import(/* webpackChunkName: "cadastrar" */ './views/cadastrar.vue')
    },

    {
        path: '/recuperaSenha',
        name: 'recuperaSenha', 
        component: () => import(/* webpackChunkName: "cadastrar" */ './views/recuperaSenha.vue')
    },

    {
        path: '/novaSenha',
        name: 'novaSenha', 
        component: () => import(/* webpackChunkName: "cadastrar" */ './views/novaSenha.vue')
    },
]