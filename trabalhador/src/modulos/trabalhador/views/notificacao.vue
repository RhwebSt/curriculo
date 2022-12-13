<template>
    <v-sheet
          class="overflow-hidden"
          style="position: relative;"
        >
    <div>
        <header-app/>
        <v-container>
           
           
                <div v-if="notificaticao.status == 200 && notificaticao.body.length > 0">
                    <div v-for="(value, name) in notificaticao.body">
                   
                        <div  v-if="value.data.length > 0">
                            <div v-for="(value1, name1) in value.data">
                        
                                    <v-alert
                                    border="right"
                                    colored-border
                                    type="success"
                                    elevation="2"
                                    v-if="value1.status === 'Aprovado' && value1.mensagem"
                                    >
                                    {{value1.mensagem}}
                                    <v-divider
                                        
                                    ></v-divider>
                                    
                                    <v-chip
                                        class="ma-2"
                                        x-small
                                        >
                                        Realizado:
                                        {{value1.datapedido}}
                                        </v-chip>
                                    <v-chip
                                        class="ma-2"
                                        x-small
                                        >
                                        Aprovado:
                                   {{value1.dataresulte}}
                                        </v-chip>
                                    </v-alert>
                                    <v-alert
                                    border="right"
                                    colored-border
                                    type="error"
                                    elevation="2"
                                    v-else-if="value1.status === 'Rejeito' && value1.mensagem"
                                    >
                                    {{value1.mensagem}}
                                    <v-divider
                                        
                                    ></v-divider>
                                    <v-chip
                                        class="ma-2"
                                        x-small
                                        >
                                        Realizado:
                                   {{value1.datapedido}}
                                        </v-chip>
                                    <v-chip
                                        class="ma-2"
                                        x-small
                                        >
                                        Rejeitado:
                                     {{value1.dataresulte}}
                                        </v-chip>
                                    </v-alert>
                                    <v-alert
                                    border="right"
                                    colored-border
                                    type="warning"
                                    elevation="2"
                                    v-else-if="value1.status === 'Analise' && value1.mensagem"
                                    >
                                    {{value1.mensagem}}
                                    <v-divider
                                        
                                    ></v-divider>
                                    <v-chip
                                        class="ma-2"
                                        x-small
                                        >
                                        Realizado:
                                            {{value1.datapedido}}
                                        </v-chip>
                                    
                                    </v-alert>
                                     <v-alert
                                    border="top"
                                    colored-border
                                    type="info"
                                    elevation="2"
                                    v-else-if="value1.fsstatus === 'Fechar'"
                                    >
                                   Segue contracheque  de pagamento referente à {{meses(value1.fscompetencia)}}.
                                    <v-divider
                                        
                                    ></v-divider>
                                   <div class="text-end mt-4">
                                        <v-btn
                                        rounded
                                        color="info"
                                        dark
                                        @click="imprimir(value1.id)"
                                        >
                                        click aqui
                                        </v-btn>
                                    </div>
                                    
                                    </v-alert>
                            </div>
                        </div>
                        <div v-else>
                           
                        
                                    <v-alert
                                    border="right"
                                    colored-border
                                    type="success"
                                    elevation="2"
                                    v-if="value.data.status === 'Aprovado' && value.data.mensagem"
                                    >
                                    {{value.data.mensagem}}
                                    <v-divider
                                        
                                    ></v-divider>
                                    <div class="d-flex flex-row">
                                            <v-chip
                                                class="ma-2"
                                                x-small
                                                >
                                                Realizado:
                                            {{value.datapedido}}
                                                </v-chip>
                                            <v-chip
                                                class="ma-2"
                                                x-small
                                                >
                                                Aprovado:
                                            {{value1.dataresulte}}
                                                </v-chip>
                                        </div>
                                    </v-alert>
                                    <v-alert
                                    border="right"
                                    colored-border
                                    type="error"
                                    elevation="2"
                                    v-else-if="value.data.status === 'Rejeito' && value.data.mensagem"
                                    >
                                    {{value.data.mensagem}}
                                    <v-divider
                                        
                                    ></v-divider>
                                    <v-chip
                                        class="ma-2"
                                        x-small
                                        >
                                        Realizado:
                                   {{value.datapedido}}
                                        </v-chip>
                                    <v-chip
                                        class="ma-2"
                                        x-small
                                        >
                                        Rejeitado:
                                     {{value1.dataresulte}}
                                        </v-chip>
                                    </v-alert>
                                    <v-alert
                                    border="right"
                                    colored-border
                                    type="warning"
                                    elevation="2"
                                    v-else-if="value.data.status === 'Analise' && value.data.mensagem"
                                    >
                                    {{value.data.mensagem}}
                                    <v-divider
                                        
                                    ></v-divider>
                                    <v-chip
                                        class="ma-2"
                                        x-small
                                        >
                                        Realizado:
                                    {{value.datapedido}}
                                        </v-chip>
                                    
                                    </v-alert>
                           
                        </div>
                       
                    </div>
                </div>
                
                <v-skeleton-loader
                    v-bind="attrs"
                    type="table-heading"
                    v-if="leord"
                ></v-skeleton-loader>
                <v-alert
                v-else-if="!leord && notificaticao.body.length < 1"
                border="right"
                colored-border
                type="error"
                elevation="2"
                class="ma-5"
                >
                Não à folhar lançada para este periodo.
                </v-alert>
               
        </v-container>
    </div>
  </v-sheet>
</template>
<script>
    import { mapState, mapActions} from 'vuex'
    import HeaderApp from'./header-app.vue'
    export default{
        components:{
            HeaderApp
        },
        data () {
            return {
                leord:true,
            }
        },
        computed:{
            ...mapState('auth',['user']),
            ...mapState('trabalhador',['notificaticao']) 
        },
        methods:{
             ...mapActions('trabalhador',['ActionNotificacaolida']),
             ...mapActions('trabalhador',['ActionNotificacaoNaolida']),
            conveterdata(dados){
                let novodados = dados.split('T');
                let novadata = novodados[0].split('-') 
                novadata = `${novadata[2]}/${novadata[1]}/${novadata[0]}`
                return novadata
            },
             meses(mes){
                let meses = ["Janeiro", "Fevereiro", "Marco", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"];
                let m = mes.split('-');
                let resulte = '';
                meses.forEach((element,index) => {
                if((index+1) === parseInt(m[1])){
                    resulte = `${element}/${m[0]}`
                }
                });
                return resulte;
            },
            imprimir(folhar_id){
                location.href = `${process.env.VUE_APP_API_CLUSTER}trabalhador/recibo/${this.user.trabalhador_id}/${folhar_id}`;
            },
        },
        async mounted(){
            try{ 
               await this.ActionNotificacaolida({id:this.user.id});
               this.leord = false;
            } catch (err){
                this.$router.push({name:'login'});
            }
        }
    }
</script>