import store from "../store";

export default async (to, from, next) => {
    document.title = `${to.name}-Rhwe`
    console.log(to.name,store.getters["auth/hasToken"],store.getters);
    if (to.name === 'login' && store.getters['auth/hasToken'] === false) {
        console.log('ola');
        try {
            await store.dispatch('auth/ActionCheckToken')
            // next({name: to.name})
        } catch (error) {
            // next({name:'login'})
        }
    }else{
        if (to.name === 'login' && !store.getters['auth/hasToken'] === true) {
            console.log('ok');
        }
        
    }
    next()
    // else{
       
       
    //     // console.log(next({name:''}));
    //     // next({name:'login'})
    //     // if (to.name === 'login' && store.getters['auth/hasToken']) {
    //     //     next({name: 'home'})
    //     // }else{
    //     //     next({name:'login'})
    //     // }
    // }
    // this.router.push('/login');
   
    // console.log(next(to.name));
    // console.log(from, next,to);
}