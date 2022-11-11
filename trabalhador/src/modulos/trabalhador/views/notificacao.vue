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
                                   {{conveterdata(value.created_at)}}
                                    </v-chip>
                                 <v-chip
                                    class="ma-2"
                                    x-small
                                    >
                                    Aprovado:
                                   {{conveterdata(value.updated_at)}}
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
                                   {{conveterdata(value.created_at)}}
                                    </v-chip>
                                 <v-chip
                                    class="ma-2"
                                    x-small
                                    >
                                    Rejeitado:
                                   {{conveterdata(value.updated_at)}}
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
                                   {{conveterdata(value.created_at)}}
                                    </v-chip>
                                
                                </v-alert>
                        </div>
                       
                    </div>
                </div>
                <div v-else>
                    <v-alert
                    border="right"
                    colored-border
                    type="error"
                    elevation="2"
                    >
                    Não à notificação.
                    </v-alert>
                </div>
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
        computed:{
            ...mapState('auth',['user']),
            ...mapState('trabalhador',['notificaticao']) 
        },
        methods:{
             ...mapActions('trabalhador',['ActionNotificacaoNaolida']),
            conveterdata(dados){
                let novodados = dados.split('T');
                let novadata = novodados[0].split('-') 
                novadata = `${novadata[2]}/${novadata[1]}/${novadata[0]}`
                return novadata
            }
        },
        async mounted(){
            try{ 
                await this.ActionNotificacaoNaolida({id:this.user.id})
            } catch (err){
                console.log('erro');
            }
        }
    }
</script>