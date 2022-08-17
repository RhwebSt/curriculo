export default[
    {
        path: '/trabalhador/lista',
        name: 'trabalhadorlista', 
        component: () => import(/* webpackChunkName: "Login" */ './views/lista.vue')
    },
    {
        path: '/trabalhador/cadastro',
        name: 'trabalhadorcadastro', 
        component: () => import(/* webpackChunkName: "Login" */ './views/cadastro.vue')
    },
    {
        path: '/trabalhador/editar',
        name: 'trabalhadoreditar', 
        component: () => import(/* webpackChunkName: "Login" */ './views/editar.vue')
    }
]