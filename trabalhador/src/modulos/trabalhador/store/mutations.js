import * as types from "./mutations-type";
export default{
    [types.SET_TRABALHADOR_LISTA](state,payload){
        state.listatrabalhador = payload
    },
    [types.SET_TRABALHADOR_EDITAR](state,payload){
        state.editartrabalhador = payload
    },
    [types.SET_TRABALHADOR_MSG](state,payload){
        state.msg = payload
    }
}