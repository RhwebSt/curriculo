import * as types from "./mutations-type";
export default{
    [types.SET_MSG](state,payload){
        state.msg = payload
    }
}