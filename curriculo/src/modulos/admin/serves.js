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
        url:'curriculo/lista?start={page}&length={length}&search={search}'
    }
}