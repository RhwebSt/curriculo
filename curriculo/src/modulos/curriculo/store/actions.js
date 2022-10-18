import serves from "@/http";
// import * as storage from "../storage";
import * as types from "./mutations-type";

export const ActionSendCurriculo = ({dispatch},payload)=>{
    return serves.curriculo.curriculoEnviar(payload).then(res => {
        dispatch('ActionSetMsg',res.data)
    }).catch(res => {
        dispatch('ActionSetMsg',res.data)
    })
}
export const ActionSetMsg = ({commit},payload) =>{
    commit(types.SET_MSG,payload)
}