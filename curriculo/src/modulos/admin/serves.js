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
        url:'curriculo/lista?start=1&length=1&page={page}&search={search}'
    }
}