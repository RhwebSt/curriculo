<template>

    <div class="bg-gradient-to-r from-gray-800 to-blue-800 flex justify-center flex-column w-full h-full justify-items-center">
           <div class="backdrop-sepia-0 bg-white/20 w-11/12 lg:w-5/6 xl:w-2/4 self-center rounded-2xl p-7 shadow-indigo-600/50 shadow-2xl">
            <v-form
              ref="form"
              v-model="valid"
              lazy-validation
              @submit.prevent="submit()"
              class="flex flex-column justify-center self-center content-center"
            >
                    <img class="m-4 p-2 w-96 self-center" src="/img/logoMobeBranca.png" alt="" srcset="">

                    <h1 class="text-gray-50 text-center text-2xl mb-5 mt-5 font-poppins">Cadastrar-se</h1>

                    <v-text-field
                      v-model="email"
                      :rules="emailRules"
                      label="E-mail"
                      class="rounded-lg w-11/12 sm:w-5/6 m-4 self-center shadow-2xl bg-gray-200 shadow-indigo-500/50 pt-4 pb-2 px-2 border-slate-50"
                      required
                      prepend-icon="mdi-email "
                    ></v-text-field>
                    
                    <v-text-field label="Senha" type="password" class="rounded-lg shadow-2xl w-11/12 sm:w-5/6 m-4 self-center bg-gray-200 shadow-indigo-500/50 pt-4 pb-2 px-2 border-slate-50"
                    v-model="password"
                    :rules="passwordRules"
                    prepend-icon="mdi-lock"
                    :messages="PasswordText"
                    :success-messages="PasswordTextSuccess"
                    required></v-text-field>

                    <v-text-field 
                    label="Confirmar Senha" 
                    type="password" 
                    class="rounded-lg w-11/12 sm:w-5/6 shadow-2xl m-4 self-center bg-gray-200 pt-4 pb-2 px-2 border-slate-50 shadow-indigo-500/50"
                    v-model="confirmPassword"
                    :rules="confirmPasswordRules"
                    :messages="confirmPasswordText"
                    :success-messages="confirmPasswordTextSuccess"
                    prepend-icon="mdi-lock"
                    required></v-text-field>

                    <div class="self-center mt-4">
                        <svg class="w-12 rounded-full bg-gray-100 p-3 shadow-lg shadow-purple-500/50 hover:translate-y-0.5 ring-2 ring-blue-500 hover:outline hover:outline-offset-4 outline-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 488 512"><path d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z"/></svg>
                        
                    </div>
                    <p class="self-center mt-2 text-white">Entrar com o Google</p>
                    <div class="lg:flex  sm:justify-space-between mt-6 w-4/6 self-center">
                        <button type="submit" @click="rotaVoltar" class="m-1 md:m-4 bg-blue-500 shadow-lg shadow-blue-500/40 hover:bg-blue-700 p-3 rounded-full text-white w-full self-center hover:translate-y-0.5 ring-1 ring-blue-500 hover:outline hover:outline-offset-4 outline-blue-500">Voltar</button>
    
                        <button type="submit" @click='senhasCompativeis' class="m-1 md:m-4 mt-4  bg-green-500 shadow-lg shadow-green-500/40 hover:bg-green-700 p-3 rounded-full hover:translate-y-0.5  text-white w-full self-center ring-1 ring-green-500 hover:outline hover:outline-offset-4 outline-green-500">Cadastrar-se</button>
                    </div>
                </v-form>
           </div> 
        </div>
    
    </template>

<script>
    import {mapActions} from 'vuex'
      export default {
        data: () => ({
            email: '',
            emailRules: [
                v => !!v || 'E-mail é obrigatório',
                v => /.+@.+\..+/.test(v) || 'O E-mail deve ser válido',
            ],
            password:'',
            passwordRules: [
                v => !!v || 'Senha é obrigatória',
            ],
            PasswordText: "",
            PasswordTextSuccess: "",
            confirmPassword: '',
            confirmPasswordRules: [
                v => !!v || 'Confirmar Senha é obrigatória',
            ],
            confirmPasswordText: "",
            confirmPasswordTextSuccess: "",
            valid: true,
            
            
        }),
        methods: {
            rotaVoltar(){
                this.$router.push({name:'login'})
            },

            senhasCompativeis(){
                if(this.password === this.confirmPassword){
                    this.confirmPasswordTextSuccess = ['Senhas compatíveis']
                    this.PasswordTextSuccess = ['Senhas compatíveis']
                }else{
                    
                    this.confirmPasswordRules = ['Senhas não imcompatíveis']
                    this.passwordRules = ['Senhas não imcompatíveis']
                }
            },

            submit(){
                console.log('ok')
            }
        }
      }
</script>

<style scoped>
    
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap');

    *{
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
    }
</style>