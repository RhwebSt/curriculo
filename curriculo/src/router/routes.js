
import {route as auth} from '../modulos/auth'

export default [
    ...auth,
    {
        path: '/',
        name: 'home',
        component: () => import(/* webpackChunkName: "about" */ '../views/HomeView.vue')
    }
]