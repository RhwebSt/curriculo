
var itens = [];
export default function notification(dados) { 
    monta(dados);
    return
    
 }
 
 function monta(dados) {
    
    Object.entries(dados).forEach(([key,values])=>{
        let item = {
            id:key,
            title:'',
            text:''
        }
        Object.entries(values.data).forEach(([key, value]) => {
           if (itens.length > 0) {
                itens.forEach(i => {
                    if (i.id !== values.id) {
                        item.title='Contra cheque'
                        item.text =`O seu contra cheque do mês ${meses(value.fscompetencia)}.`
                    }
                });
           }else{
            item.title ='Contra cheque';
            item.text=`O seu contra cheque do mês ${meses(value.fscompetencia)}.`
           }
        });
        itens.push(item)
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
    // console.log(dados);
    cordova.plugins.notification.local.schedule(dados);
    // cordova.plugins.notification.local.schedule([
    //     { id: 0, title: 'Design team meeting'},
    //     { id: 1, summary: 'me@gmail.com', group: 'email', groupSummary: true },
       
    // ]);
}