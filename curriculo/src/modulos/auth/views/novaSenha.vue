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

                    <h1 class="text-gray-50 text-center text-2xl mb-5 mt-5 font-poppins">Nova Senha</h1>

                    <v-text-field 
                    label="Senha Anterior" 
                    type="password" 
                    class="rounded-lg shadow-2xl w-11/12 sm:w-5/6 m-4 self-center bg-gray-200 shadow-indigo-500/50 pt-4 pb-2 px-2 border-slate-50"
                    v-model="oldPassword"
                    :rules="oldPasswordRules"
                    prepend-icon="mdi-lock"
                    :messages="oldPasswordText"
                    :success-messages="oldPasswordTextSuccess"
                    required></v-text-field>

                    <v-text-field 
                    label="Nova Senha" 
                    type="password" 
                    class="rounded-lg shadow-2xl w-11/12 sm:w-5/6 m-4 self-center bg-gray-200 shadow-indigo-500/50 pt-4 pb-2 px-2 border-slate-50"
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

                    <div class="lg:flex  sm:justify-space-between mt-6 w-4/6 self-center">
                        <button type="submit" @click="rotaVoltar" class="m-1 md:m-4 bg-blue-500 shadow-lg shadow-blue-500/40 hover:bg-blue-700 p-3 rounded-full text-white w-full self-center hover:translate-y-0.5 ring-1 ring-blue-500 hover:outline hover:outline-offset-4 outline-blue-500">Voltar</button>
    
                        <button type="submit" @click='senhasCompativeis' class="m-1 md:m-4 mt-4  bg-green-500 shadow-lg shadow-green-500/40 hover:bg-green-700 p-3 rounded-full hover:translate-y-0.5  text-white w-full self-center ring-1 ring-green-500 hover:outline hover:outline-offset-4 outline-green-500">Finalizar</button>
                    </div>
                </v-form>
           </div> 
        </div>
    
    </template>

<script>
    import {mapActions} from 'vuex'
      export default {
        data: () => ({
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
            oldPassword:'',
            oldPasswordRules: [
                v => !!v || 'Senha é obrigatória',
            ],
            oldPasswordText: "",
            oldPasswordTextSuccess: "",
            
            
        }),
        methods: {
            rotaVoltar(){
                this.$router.push({name:'recuperaSenha'})
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