import * as types from "./mutations-type";
export default{
    [types.SET_USER](state,payload){
        state.user = payload
    },
    [types.SET_TOKEN](state,payload){
        state.token = payload
    },
    [types.SET_MSG](state,payload){
        state.msg = payload
    }
}