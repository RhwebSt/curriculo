import serves from "@/http";
import * as storage from "../storage";
import * as types from "./mutations-type";
export const ActionLogin = ({dispatch},payload)=>{
    return serves.auth.login(payload).then(res => {
        dispatch('ActionSetToken',res.data.access_token)
        dispatch('ActionSetMsg',res)
    }).catch(err => {
        dispatch('ActionSignOut')
        dispatch('ActionSetMsg',err)
    })
}
export const ActionLogout = ({dispatch},payload)=>{
    return serves.auth.logout(payload).then(res => {
        dispatch('ActionSignOut')
    }).catch(err => {
        dispatch('ActionSignOut')
        dispatch('ActionSetMsg',err)
    })
}
export const ActionRecuperaSenha = ({dispatch},payload)=>{
    return serves.auth.recupera(payload).then(res=>{
        dispatch('ActionSetMsg',res)
    })
}
export const ActionCheckToken = ({dispatch, state})=>{ 
   
    if (state.token) {
        return Promise.resolve.apply(state.token)
    }
    const token = storage.getLocalToken();
   
    if (!token) {
        return Promise.reject(new Error('Token Inválido'))
    }
   
    dispatch('ActionSetToken',token)
    
    return dispatch('ActionSession')
}
export const ActionSession = ({dispatch})=>{
   
    return new Promise(async (resolve,reject) => {
       
        try {
            // const {data:{user}} = await serves.auth.session()
            await serves.auth.session().then(res => {
               
                dispatch('ActionSetUser',res.data)
            }).catch(err => {
                dispatch('ActionSetUser',err)
                dispatch('ActionSignOut')
            })
           
            // dispatch('ActionSetUser',user)
            resolve()
        } catch (error) {
            reject(error)
        }
    })
}
export const ActionSessionTrabalhador = ({dispatch})=>{
    return  serves.auth.session().then(res => {
        dispatch('ActionSetUser',res.data)
    }).catch(err => {
        dispatch('ActionSetUser',err)
    })
}
export const ActionSetUser = ({commit},payload) =>{
    commit(types.SET_USER,payload)
}
export const ActionSetToken = ({commit},payload) =>{
    storage.setHeaderToken(payload)
    storage.setLocalToken(payload)
    commit(types.SET_TOKEN,payload)
}
export const ActionSetMsg = ({commit},payload) =>{
    commit(types.SET_MSG,payload)
}
export const ActionSignOut = ({dispatch})=>{
    storage.setHeaderToken('');
    storage.deleteLocalToken();
    dispatch('ActionSetToken','');
}