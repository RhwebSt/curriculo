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
            await store.dispatch('auth/ActionSessionTrabalhador')
            next({name:'trabalhador'})
        }
    }
    if (to.name === 'trabalhador' && store.getters['auth/hasToken'] === false ||
    to.name === 'vale' && store.getters['auth/hasToken'] === false 
    || to.name === 'notificacao' && store.getters['auth/hasToken'] === false) {
        await store.dispatch('auth/ActionCheckToken')
        next({name:'login'})
    }
    if (to.name === 'trabalhador' && store.getters['auth/hasToken'] === true ||
    to.name === 'vale' && store.getters['auth/hasToken'] === true 
    || to.name === 'notificacao' && store.getters['auth/hasToken'] === true) {
        await store.dispatch('auth/ActionSessionTrabalhador')
        next()
    }
    next()
}