import serves from "@/http";
import * as storage from "../storage";
import * as types from "./mutations-type";
// export const ActionLogin = ({dispatch},payload)=>{
//     return serves.auth.login(payload).then(res => {
        
//         dispatch('ActionSetToken',res.data.access_token)
//     }).catch(res => {
//         console.log(res); // "Ah, não!"
//         if (res.status == 401) {
//             dispatch('ActionSignOut')
//         }
//       })
// }
// export const ActionCheckToken = ({dispatch, state})=>{ 
   
//     if (state.token) {
        
//         return Promise.resolve.apply(state.token)
//     }
//     const token = storage.getLocalToken();
//     console.log(token);
//     if (!token) {
//         return Promise.reject(new Error('Token Inválido'))
//     }
//     dispatch('ActionSetToken',token)
//     return dispatch('ActionSession')
// }
// export const ActionSession = ({dispatch})=>{
   
//     return new Promise(async (resolve,reject) => {
       
//         try {
//             // const {data:{user}} = await serves.auth.session()
//             await serves.auth.session().then(res => {
//                 dispatch('ActionSetUser',res.data)
//             })
           
//             // dispatch('ActionSetUser',user)
//             resolve()
//         } catch (error) {
//             reject(error)
//         }
//     })
// }
// export const ActionSetUser = ({commit},payload) =>{
//     commit(types.SET_USER,payload)
// }
// export const ActionSetToken = ({commit},payload) =>{
//     storage.setHeaderToken(payload)
//     storage.setLocalToken(payload)
//     commit(types.SET_TOKEN,payload)
// }
// export const ActionSignOut = ({dispatch})=>{
//     storage.setHeaderToken('');
//     storage.deleteLocalToken();
//     dispatch('ActionSetToken','');
// }
export const ActionLista = ({dispatch},payload)=>{
    return serves.trabalhador.listarecibo(payload).then(res => {
        dispatch('ActionSetLista',res.data)
    }).catch(res => {
        if (res.status == 401) {
            dispatch('ActionSignOut')
        }
    })
}
export const ActionSetLista = ({commit},payload) =>{
    commit(types.SET_TRABALHADOR_LISTA,payload)
}
export const ActionSignOut = ({dispatch})=>{
    storage.setHeaderToken('');
    storage.deleteLocalToken();
    dispatch('ActionSetToken','');
}