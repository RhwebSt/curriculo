<template>
  <v-app id="inspire">
    <v-content>
      <v-container class="fill-height" fluid>
        <v-row align="center" justify="center">
          <v-col cols="12" sm="8" md="8">
            <v-card class="elevation-0">
            
                
                  <v-row>
                    <v-col cols="12" md="8">
                      <v-card-text class="mt-12">
                        <h1
                          class="text-center display-2 blue--text text--darken-4"
                        >Mobe</h1>
                        <div class="text-center mt-4 d-none">
                          <v-btn class="mx-2" fab color="black" outlined>
                            <v-icon>fab fa-facebook-f</v-icon>
                          </v-btn>

                          <v-btn class="mx-2" fab color="black" outlined>
                            <v-icon>fab fa-google-plus-g</v-icon>
                          </v-btn>
                          <v-btn class="mx-2" fab color="black" outlined>
                            <v-icon>fab fa-linkedin-in</v-icon>
                          </v-btn>
                        </div>
                        <h4 class="text-center mt-4">MÃO DE OBRA TERCEIRIZADA</h4>
                        <h6 class="text-center mt-4">Para recupera sua senha informe seu email?</h6>
                        <v-form 
                         ref="form"
                         v-model="valid"
                         lazy-validation
                         id="senha"
                        @submit.prevent="submit()"
                        >
                          <v-text-field
                            label="Digite seu email"
                            name="email"
                            prepend-icon="mdi-email"
                            type="email"
                            color="teal accent-3"
                            v-model="email"
                            :rules="emailRules"
                          />

                          <div class="text-center mt-3">
                            <v-btn  
                            :loading="loading"
                            :disabled="loading"  
                            type="submit" block color="blue darken-4 mb-4 white--text"
                          >Entra</v-btn>
                            
                      </div>
                        </v-form>
                        <h3 class="text-center mt-4 ">
                         <router-link to="/">
                          Login
                         </router-link>
                        </h3>
                      </v-card-text>
                      
                    </v-col>
                      <v-col cols="12" md="4" class="blue darken-4">
                      <v-card-text class="white--text mt-md-12">
                        <h1 class="text-center display-1 text-center d-flex justify-center">
                          <v-img class="m-4 p-2 w-96 self-center" max-height="150" max-width="150" :src="imagem()" alt="" srcset="">
                          </v-img>
                        </h1>
                        <h5
                          class="text-center"
                        >Seja bem vindo.</h5>
                      </v-card-text>
                      <div class="text-center d-none">
                      <router-link to="/cadastrar">
                        <v-btn rounded outlined dark>Cadastro</v-btn>
                        </router-link>
                      </div>
                    </v-col>
                  </v-row>
                
              
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
                
              
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-content>
  </v-app>
</template>


<script>
import {mapActions,mapState} from 'vuex'
import image from "../../../plugins/imagem.js"
export default {
  data: () => ({
    step: 1,
    e1: 1,
    loading: false,
    snackbar: false,
    text:'',
    cor:'',
    icon:'',
    email: '',
    emailRules: [
      v => !!v || 'E-mail é obrigatório',
      v => /.+@.+\..+/.test(v) || 'O E-mail deve ser válido',
    ],
  }),
  props: {
    source: String
  },
  computed:{
    ...mapState('auth',['msg']) 
  },
  methods:{
    ...mapActions('auth',['ActionRecuperaSenha']),
     imagem(){
      return image();
    },
      async submit(){ 
         this.loading = true
        if(!this.$refs.form.validate()){
          this.loading = false;
          return false;
        }
        // try{
         
          let login = document.getElementById('senha');
          var formData = new FormData(login);
          await this.ActionRecuperaSenha(formData)
          if(this.msg.status == 401){
            // this.$swal({
            //   icon: 'error',
            //   text: this.msg.body,
            // });
            this.snackbar = true;
            this.text = this.msg.body.error;
            this.cor = 'red accent-2';
            this.icon = 'mdi-email-remove-outline';
            this.loading = false;
            return false;
          }
          if(this.msg.status === 200){
          
            // this.$swal({
            //   icon: 'success',
            //   text: this.msg.body,
            // });
            this.snackbar = true;
            this.text = this.msg.body;
            this.cor = 'teal darken-2';
            this.icon = 'mdi-email-fast';
            this.loading = false;
            return false;
          }
    }
  }
};
</script>
<style scoped>
    
  @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap');

  *{
      font-family: 'Poppins', sans-serif;
      font-weight: 600;
  }
  .custom-loader {
    animation: loader 1s infinite;
    display: flex;
  }
  @-moz-keyframes loader {
    from {
      transform: rotate(0);
    }
    to {
      transform: rotate(360deg);
    }
  }
  @-webkit-keyframes loader {
    from {
      transform: rotate(0);
    }
    to {
      transform: rotate(360deg);
    }
  }
  @-o-keyframes loader {
    from {
      transform: rotate(0);
    }
    to {
      transform: rotate(360deg);
    }
  }
  @keyframes loader {
    from {
      transform: rotate(0);
    }
    to {
      transform: rotate(360deg);
    }
  }
</style>