export default{
    login:{
        method:'post',
        url:'user/login'
    },
    session:{
        method:'get',
        url:'user'
    },
    listacurriculo:{
        method:'get',
        url:'curriculo/lista?model_id={id}&page={page}&search={search}'
    }
}