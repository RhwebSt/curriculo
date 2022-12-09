<template>
<v-sheet
          
          class="overflow-hidden"
          style="position: relative;"
        >
  <div >
  <header-app/>
   <v-card-text class=" red--text">
     Lembre-se: O Valor do vale não pode ultrapassar o valor de R$ 300,00 reais.
    </v-card-text>
  <v-container>
    <v-toolbar-title>Pedidor de vale</v-toolbar-title>
  <v-form
    ref="form"
    v-model="valid"
    lazy-validation
    @submit.prevent="submit()"
    id="vale"
  >
    <v-text-field
      v-model="cpf"
      :counter="14"
      :rules="cpfRules"
      label="Digite seu cpf"
      required
      name="cpf"
    v-maska="'###.###.###-##'"
    ></v-text-field>

    <v-text-field
      v-model="valor"
      :rules="valorRules"
      label="Valor do valer"
      v-maska="'###,##'"
      required
      name="valor"
    ></v-text-field>
    <input type="hidden" v-model="user.trabalhador_id"  name="trabalhador"/>
   <input type="hidden" v-model="user.empresa_id"  name="empresa"/>
   <input type="hidden" value='Vale'   name="descricao"/>
   <input type="hidden" value="2 - Segunda"  name="quinzena"/>
   <input type="hidden"  name="competencia"/>
    <input type="hidden" value='0,00' name="quantidade"/>
    <input type="hidden" value='Analise' name="status"/>
    <v-btn
    block
    type="submit"
      
      :loading="loading"
      :disabled="loading"
      class="mr-4 indigo white--text"
      @click="validate"
    >
      Enviar
    </v-btn>

     <v-snackbar
      v-model="snackbar"
      :color="cor"
    >
    <v-icon>{{icon}}</v-icon>
      {{ text }}

      <template v-slot:action="{ attrs }">
        <v-btn
          color="red"
          text
          v-bind="attrs"
          @click="snackbar = false"
        >
          
        </v-btn>
      </template>
    </v-snackbar>
  </v-form>
    <v-card width="400" class="mt-5" v-if="messages.length > 0">
      <v-card-text>
        <div class="font-weight-bold ml-8 mb-2">
          Historico dos pedidos de vale.
        </div>

        <v-timeline
          align-top
          dense
        >
          <v-timeline-item
            v-for="message in messages"
            :key="message.time"
            :color="message.color"
            :icon="message.icon"
            small
          >
            <div>
              <div class="font-weight-normal">
                <strong>{{ message.from }}</strong>
                <v-chip
                  class="ma-2"
                  x-small
                  color="indigo "
                  label
                  text-color="white"
                >
                
                  {{ message.time }}
                </v-chip> 
              </div>
              <div>{{ message.message }}</div>
            </div>
          </v-timeline-item>
        </v-timeline>
      </v-card-text>
    </v-card>
    <v-skeleton-loader
          v-bind="attrs"
          type="article"
          v-if="leord"
    ></v-skeleton-loader>
    <v-alert
      v-else-if="!leord && messages.length < 1"
      border="right"
      colored-border
      type="error"
      elevation="2"
      class="ma-5"
    >
     Não à historico de pedidos de vale..
    </v-alert>
  </v-container>
  </div>
  
  </v-sheet>
</template>
<script>
 import { mapState, mapActions} from 'vuex'
import HeaderApp from'./header-app.vue'
  export default {
    data: () => ({
      messages: [],
      valid: true,
      loading: false,
      loader: null,
      leord:true,
      cpf: '',
      cpfRules: [
        v => !!v || 'Este campo não pode esta vazio!',
        v => (v && v.length <= 14) || 'Este campo não pode conter menos de 14 caracteres',
      ],
      valor: '',
      valorRules: [
        v => !!v || 'Este campo não pode esta vazio!',
        //v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
      ],
      snackbar: false,
      text:'',
      cor:'',
      icon:'',
      attrs: {
        class: 'mb-6',
        boilerplate: false,
        elevation: 2,
      },

    }),
    computed:{
        ...mapState('auth',['user']),
         ...mapState('trabalhador',['msg']),
          ...mapState('trabalhador',['historico']) 
    },
    components:{
      HeaderApp
    },
    async mounted(){
       let datahoje = new Date();
       let mes = datahoje.getMonth() < 10 ? `0${datahoje.getMonth()+1}`:datahoje.getMonth()+1
       let competencia = `${datahoje.getFullYear()}-${mes}`;
       let dados ={
          id:this.user.trabalhador_id,
          competencia:competencia
       }
       await this.ActionHistorico(dados)
       this.leord = false;
       Object.values(this.historico).forEach(value => {
        
          if(value.dsstatus === "Aprovado"){
            let mensagem =   {
                from: 'Vales aprovados.',
                message: `Valor aprovado R$${value.dfvalor.toFixed(2).replace('.', ',')}.`,
                time: this.conveterdata(value.dscompetencia),
                color: 'teal darken-3',
                icon: 'mdi-cash-check',
            } 
             this.messages.push(mensagem);
          }
          if(value.dsstatus === "Rejeito"){
            let mensagem =   {
                from: 'Vales regeitado.',
                message: `Valor regeitado R$${value.dfvalor.toFixed(2).replace('.', ',')}.`,
                time: this.conveterdata(value.dscompetencia),
                color: 'red darken-1',
                icon: 'mdi-cash-remove',
            } 
             this.messages.push(mensagem);
          }
           if(value.dsstatus === "Analise"){
            let mensagem =   {
                from: 'Vales em analise.',
                message: `Valor sendo analizado R$${value.dfvalor.toFixed(2).replace('.', ',')}.`,
                time: this.conveterdata(value.dscompetencia),
                color: 'yellow darken-1',
                icon: 'mdi-cash-sync',
            } 
             this.messages.push(mensagem);
          }
           
       });
       
    },
    methods: {
        ...mapActions('trabalhador',['ActionVale']),
        ...mapActions('trabalhador',['ActionHistorico']),
      validate () {
        this.$refs.form.validate()
      },
       async submit(){ 
        try{
        this.loading = true
        this.snackbar = false;
        this.text = '';
          let vale = document.getElementById('vale');
          var formData = new FormData(vale);
          await this.ActionVale(formData)
           this.loading = false
          if(this.msg.status == 200){
            this.snackbar = true;
            this.text = this.msg.body;
            this.cor = 'teal darken-2';
            this.icon = 'mdi-cash-sync';
            return false;
          }
          if(this.msg.status == 422){
            this.snackbar = true;
            this.text = this.msg.body.errors.cpf[0];
            this.cor = 'red accent-2';
            this.icon = 'mdi-cash-remove';
            return false;
          }
          if(this.msg.status == 401){
             this.snackbar = true;
            this.text = this.msg.body;
            this.cor = 'red accent-2';
            this.icon = 'mdi-cash-remove';
            return false;
          }
        //   this.$router.push({name:'trabalhador'})
        } catch (err){
        //   this.loading = false
        //   this.alert = false;
        //   this.textAlert = this.msg.body.error;
        }
      },
      conveterdata(dados){
          let novadata = dados.split('-') 
          novadata = `${novadata[1]}/${novadata[0]}`
          return novadata
      },
    },
  }
</script>