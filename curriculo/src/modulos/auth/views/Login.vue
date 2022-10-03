<template>

<div class="bg-gradient-to-r from-gray-800 to-blue-800 flex justify-center flex-column w-full h-full justify-items-center">
       <div class="backdrop-sepia-0 bg-white/20 w-11/12 lg:w-5/6 xl:w-2/4 self-center rounded-2xl p-7 shadow-indigo-600/50 shadow-2xl">
        <v-form
          ref="form"
          v-model="valid"
          lazy-validation
          @submit.prevent="submit()"
          id="login"
          class="flex flex-column justify-center self-center content-center"
        >
                <img class="m-4 p-2 w-96 self-center" src="/img/logoMobeBranca.png" alt="" srcset="">

                <v-text-field
                  v-model="email"
                  :rules="emailRules"
                  label="E-mail"
                  name='email'
                  prepend-icon="mdi-email "
                  class="rounded-lg w-11/12 sm:w-5/6 m-4 self-center shadow-2xl bg-gray-200 shadow-indigo-500/50 pt-4 pb-2 px-2 border-slate-50"
                  required
                ></v-text-field>
                
                <v-text-field label="Senha" type="password" 
                class="rounded-lg w-11/12 sm:w-5/6 m-4 self-center shadow-2xl bg-gray-200 shadow-indigo-500/50 pt-4 pb-2 px-2 border-slate-50"
                v-model="password"
                :rules="passwordRules"
                name='password'
                prepend-icon="mdi-lock"
                required></v-text-field>
                <a href="#" @click="rotaEsqueceuSenha" class="self-center text-start text-lg text-white hover:underline decoration-1 w-11/12 sm:w-5/6">Esqueceu a senha?</a>
                <div class="self-center mt-4">
                    <svg class="w-12 rounded-full bg-gray-100 p-3 shadow-lg shadow-purple-500/50 hover:translate-y-0.5 ring-2 ring-blue-500 hover:outline hover:outline-offset-4 outline-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 488 512"><path d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z"/></svg>
                    
                </div>
                <p class="self-center mt-2 text-white">Entrar com o Google</p>

                <div class="lg:flex  sm:justify-space-between mt-6 w-4/6 self-center">
                    <button type="submit" @click="rotaCadastrar" class="m-1 md:m-4 bg-blue-500 shadow-lg shadow-blue-500/40 hover:bg-blue-700 p-3 rounded-full text-white w-full self-center hover:translate-y-0.5 ring-1 ring-blue-500 hover:outline hover:outline-offset-4 outline-blue-500">Cadastrar-se</button>

                    <button type="submit" @click="validate" :disabled="!valid" class="m-1 md:m-4 mt-4  bg-green-500 shadow-lg shadow-green-500/40 hover:bg-green-700 p-3 rounded-full hover:translate-y-0.5  text-white w-full self-center ring-1 ring-green-500 hover:outline hover:outline-offset-4 outline-green-500">Entrar</button>
                </div>
            </v-form>
       </div> 
    </div>

</template>
<script>
import {mapActions} from 'vuex'
  export default {
    data: () => ({
      valid: true,
      name: '',
      nameRules: [
        v => !!v || 'Usuário é obrigatório',
        v => (v && v.length <= 10) || 'Name must be less than 10 characters',
      ],
      email: '',
      emailRules: [
        v => !!v || 'E-mail é obrigatório',
        v => /.+@.+\..+/.test(v) || 'O E-mail deve ser válido',
      ],
      password: '',
      passwordRules: [
        v => !!v || 'Senha é obrigatória',
      ],
    }),
    // created(){
    //   this.ActionLogin({password:'123456',email:'elielfelipe789@gmail.com'})
    // },
    methods: {
      ...mapActions('auth',['ActionLogin']),
      validate () {
        this.$refs.form.validate()
      },

      rotaCadastrar(){
        this.$router.push({name:'cadastrar'})
      },

      rotaEsqueceuSenha(){
        this.$router.push({name:'recuperaSenha'})
      },

      async submit(){ 
        try{
          let login = document.getElementById('login');
          var formData = new FormData(login);
          await this.ActionLogin(formData)
          this.$router.push({name:'admin'})
        } catch (err){
          console.log('erro');
        }
      }
    },
  }
</script>

<style scoped>
    
  @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap');

  *{
      font-family: 'Poppins', sans-serif;
      font-weight: 600;
  }
</style>
