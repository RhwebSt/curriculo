

export default function notification(dados) { 
    monta(dados);
    return
    
 }
 
 function monta(dados) {
    var itens = [];
    Object.values(dados).map(values=>{
        Object.entries(values.data).forEach(([key, value]) => {
           console.log(values.id);
            let item = {
                id:values.id,
                title:'Contra cheque',
                text: `O seu contra cheque do mês ${meses(value.fscompetencia)}.`
            }
            itens.push(item)
            // console.log(itens);
        });
    })
    folhar(itens) 
    
 }
 function folhar(itens) {
    mostra(itens)
 }
 function meses(mes){
        
    let meses = ["Janeiro", "Fevereiro", "Marco", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"];
    let m = mes.split('-');
    let resulte = '';
    meses.forEach((element,index) => {
      if((index+1) === parseInt(m[1])){
        resulte = element
      }
    });
    return resulte;
}
function mostra(dados) {
    // cordova.plugins.notification.local.schedule(dados);
    // cordova.plugins.notification.local.schedule([
    //     { id: 0, title: 'Design team meeting'},
    //     { id: 1, summary: 'me@gmail.com', group: 'email', groupSummary: true },
       
    // ]);
}