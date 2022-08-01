import serves from "@/http";
import * as types from "./mutations-type";
export const ActionLogin = ({commit},payload)=>{
    return serves.auth.login(payload)
}
export const ActionSetUser = ({commit},payload) =>{
    commit(types.SET_USER,payload)
}
export const ActionSetToken = ({commit},payload) =>{
    commit(types.SET_TOKEN,payload)
}