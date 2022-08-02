import store from "../store";
export default async (to, from, next) => {
    document.title = `${to.name}-Rhweb`
    if (to.name !== 'login' && !store.getters['auth/hasToken']) {
        try {
            await store.dispatch('auth/ActionCheckToken')
            next({name: to.name})
        } catch (error) {
            next({name:'login'})
        }
    }else{
        console.log(next({name:''}));
        // next({name:'login'})
        // if (to.name === 'login' && store.getters['auth/hasToken']) {
        //     next({name: 'home'})
        // }else{
        //     next({name:'login'})
        // }
    }
}