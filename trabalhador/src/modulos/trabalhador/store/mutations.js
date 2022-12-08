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
    },
    [types.SET_TRABALHADOR_NOTIFICACAO](state,payload){
        state.notificaticao = payload
    },
    [types.SET_TRABALHADOR_QUANTNOTIFICACAO](state,payload){
        state.quantnotificaticao = payload
    },
    [types.SET_TRABALHADOR_HISTORICO](state,payload){
        state.historico = payload
    }
}