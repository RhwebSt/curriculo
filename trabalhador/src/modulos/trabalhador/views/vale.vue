<template>
<v-sheet
          
          class="overflow-hidden"
          style="position: relative;"
        >
  <div >
  <header-app/>
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
      :disabled="!valid"
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
  </v-container>
  </div>
  
  </v-sheet>
</template>
<script>
 import { mapState, mapActions} from 'vuex'
import HeaderApp from'./header-app.vue'
  export default {
    data: () => ({
      valid: true,
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
    }),
    computed:{
        ...mapState('auth',['user']),
         ...mapState('trabalhador',['msg']) 
    },
    components:{
      HeaderApp
    },
    methods: {
        ...mapActions('trabalhador',['ActionVale']),
      validate () {
        this.$refs.form.validate()
      },
       async submit(){ 
        try{
        //   this.loading = true
        this.snackbar = false;
        this.text = '';
          let vale = document.getElementById('vale');
          var formData = new FormData(vale);
          await this.ActionVale(formData)
         
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
      }
    },
  }
</script>