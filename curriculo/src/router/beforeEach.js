import store from "../store";

export default async (to, from, next) => {
    document.title = `${to.name}- Mobe mão Obra`
    if (to.name === 'login' && store.getters['auth/hasToken'] === false) {
        try {
            await store.dispatch('auth/ActionCheckToken')
            next({name: to.name})
        } catch (error) {
            next()
        }
    }else{
        if (to.name === 'login' && store.getters['auth/hasToken'] === true || to.name === 'recuperaSenha' && store.getters['auth/hasToken'] === true) {
            next({name:'admin'})
        }
    }
    if (to.name === 'admin' && store.getters['auth/hasToken'] === false) {
        next({name:'login'})
    }
    next()
}