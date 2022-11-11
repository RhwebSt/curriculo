export default{
    listarecibo:{
        method:'get',
        url:'recibo/lista?id={id}&start={page}&length={length}&search={search}'
    },
    vale:{
        method:'post',
        url:'vale/cadastra'
    },
    noficacaonaolida:{
        method:'get',
        url:'notificacao/lista{/id}'
    }
}