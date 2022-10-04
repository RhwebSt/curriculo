import serves from "@/http";
// import * as storage from "../storage";
// import * as types from "./mutations-type";

export const ActionSendCurriculo = ({dispatch},payload)=>{
    return serves.curriculo.curriculoEnviar(payload).then(res => {
        console.log(res.status); 
        dispatch()
    }).catch(res => {
        console.log(res); 
        
      })
}