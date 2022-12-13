

export default function notification(dados) { 
    monta(dados);
    return
    
 }
 
 function monta(dados) {
    var itens = [];
    Object.entries(dados).forEach(([key,values])=>{
        let item = {
            id:key,
            smallIcon: process.env.VUE_APP_API_LOGO,
            icon: process.env.VUE_APP_API_LOGO,
            title:'',
            text:''
        }
        if (!localStorage.getItem(values.id)) {
           
            if (values.type.includes('Vale')) {
               
                Object.entries(values.data).forEach(([key, value]) => {
                    item.title =`Pedido de vale ${value.datapedido}`;
                    item.text=value.mensagem
                });
                itens.push(item)
               
            }else if (values.type.includes('TrabalhadorFolhar')){
              
                Object.entries(values.data).forEach(([key, value]) => {
                    item.title ='Contra cheque';
                    item.text=`O seu contra cheque do mês ${meses(value.fscompetencia)}.`
                });
                itens.push(item)
            }
            localStorage.setItem(values.id,values.id)
            
        }
        
    })
    if (itens.length > 0) {
        folhar(itens); 
    }
   
    
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
