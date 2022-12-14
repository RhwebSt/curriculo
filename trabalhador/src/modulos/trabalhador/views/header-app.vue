<template>
 
  <div >
    <v-app-bar
      color="indigo"
      dense
      dark
    >
      <v-app-bar-nav-icon class="d-md-none" @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
          
        
      <v-toolbar-title>
         <img class="self-center w-44 ms-6" :src="imagem()" alt="">
      </v-toolbar-title>

      <v-spacer></v-spacer>

      
      
      
     <router-link to="/notificacao" v-if="notificacao">
     <v-badge
       
      color="green darken-3"
       avatar
        to="/notificacao"
        overlap
        offset-x="18"
        offset-y="20"
      >
        <template v-slot:badge>
          <v-avatar size="10"  >
           {{quant}}
          </v-avatar>
          
        </template>

        <v-avatar size="40">
         <v-icon>mdi-bell</v-icon>
        </v-avatar>
      </v-badge>
      </router-link>
      <router-link to="/notificacao" v-else>
       <v-avatar size="40" >
       
         <v-icon>mdi-bell</v-icon>
         
        </v-avatar>
       </router-link>
      

     
    </v-app-bar>
   
    <v-navigation-drawer
            v-model="drawer"
            fixed
            temporary
            class="mx-auto"
            
          >
            <v-list-item>
              <v-list-item-avatar>
              <v-icon>mdi-account</v-icon>
              </v-list-item-avatar>

              <v-list-item-content>
                <v-list-item-title>{{user.name}}</v-list-item-title>
                <v-list-item-subtitle>{{user.email}}</v-list-item-subtitle>
              </v-list-item-content>
            </v-list-item>

            <v-divider></v-divider>

            <v-list dense>
              <v-list-item
               to="/trabalhador"
              >
                <v-list-item-icon>
                  <v-icon>mdi-file-document</v-icon>
                </v-list-item-icon>

                <v-list-item-content>
                  <v-list-item-title>Contra cheque</v-list-item-title>
                </v-list-item-content>
              </v-list-item>
              <v-list-item
               to="/vale"
              >
                <v-list-item-icon>
                  <v-icon>mdi-cash-multiple</v-icon>
                </v-list-item-icon>

                <v-list-item-content>
                  <v-list-item-title>Vale</v-list-item-title>
                </v-list-item-content>
              </v-list-item>
               <v-list-item
               to="/atualizarsenha"
              >
                <v-list-item-icon>
                  <v-icon>mdi-lock-question</v-icon>
                </v-list-item-icon>

                <v-list-item-content>
                  <v-list-item-title>Senha</v-list-item-title>
                </v-list-item-content>
              </v-list-item>
            </v-list>
            
            <template >
                <div class="pa-2">
                    <v-btn block class="indigo white--text" @click="sair()">
                        Sair
                    </v-btn>
                </div>
            </template>
          </v-navigation-drawer>
          
          
  </div>
  
 
</template>
<script>
  import { mapState, mapActions} from 'vuex'
  import notification from "../../../plugins/notificacao.js"
  import { setIntervalAsync, clearIntervalAsync } from 'set-interval-async';
  import image from "../../../plugins/imagem.js"
  export default {
    data () {
      return {
        drawer: null,
        notificacao:false,
        notef:'',
        quant:0
      }
    },
   
    computed:{
        ...mapState('auth',['user']),
        ...mapState('trabalhador',['quantnotificaticao']),
        ...mapState('trabalhador',['notificaticao']) 
    },
    async mounted(){
      //  window.Echo.private('App.User.'+this.user.trabalhador_id)
      //   .listen('Vales',(e)=>{
      //     console.log(e)
      //     this.notificacao = true
      //   })
        // window.Echo.channel('channel-vale')
        // .listen('Vales',(e)=>{
        //   this.notificacao = true
        //   console.log(e)
        //   // this.ActionNotificacaoNaolida({id:this.user.id});
        // })
        
        //  window.Echo.channel('channel-folhar')
        // .listen('Folha',(e)=>{
        //   this.notificacao = true
        //   this.quant +=1
        //   // navigator.notification.alert(
        //   //     'You are the winner!',  // message
        //   //     alertDismissed,         // callback
        //   //     'Game Over',            // title
        //   //     'Done'                  // buttonName
        //   // );
        //   console.log(e)
        //   // this.ActionNotificacaoNaolida({id:this.user.id});
        // })
        // this.ActionNotificacaolida({id:this.user.id})
        // this.ActionNotificacaoNaolida({id:this.user.id});
        try{
             this.ActionNotificacaoNaolida({id:this.user.id});
            //  this.ActionNotificacaolida({id:this.user.id});
            this.notef = setIntervalAsync(async () => {
              if(this.user.id){
                await this.ActionNotificacaoNaolida({id:this.user.id});
              }
              if(this.quantnotificaticao.body.length > 0){
                this.notificacao = true
                this.quant = this.quantnotificaticao.body.length 
                notification(this.quantnotificaticao.body);
              }else{
                this.notificacao = false
                this.quant = 0;
              }
              if(this.user.status === 401){
                  await this.ActionLogout('')
                  this.$router.push({name:'login'});
              }
              this.clear();
            }, 100000);
           
        }catch (err){
          this.$router.push({name:'login'});
        }
       
    },
    methods:{
        ...mapActions('auth',['ActionLogout']),
        // ...mapActions('trabalhador',['ActionNotificacaolida']),
        ...mapActions('trabalhador',['ActionNotificacaoNaolida']),
        imagem(){
          return image();
        },
        async clear(){
           if(this.quantnotificaticao.status === 429){
              await clearIntervalAsync(this.notef);
           }
        },
        async sair(){
        try{ 
          await this.ActionLogout('')
          this.$router.push({name:'login'});
        } catch (err){
          this.$router.push({name:'login'});
        }
      }
    }
  }
</script>