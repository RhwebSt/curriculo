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

                    <h1 class="text-gray-50 text-center text-2xl mb-5 mt-1 font-poppins">Recuperar Senha</h1>
                    <div class="flex flex-row justify-center">
                        <p class="text-start text-gray-100">Insira o email que está cadastrado em sua conta.</p>
                    </div>

                    <v-text-field
                      v-model="email"
                      :rules="emailRules"
                      label="E-mail"
                      class="rounded-lg w-11/12 sm:w-5/6 m-4 self-center shadow-2xl bg-gray-200 shadow-indigo-500/50 pt-4 pb-2 px-2 border-slate-50"
                      required
                      prepend-icon="mdi-email "
                    ></v-text-field>

                    <div class="lg:flex  sm:justify-space-between mt-6 w-4/6 self-center">
                        <button type="submit" @click="rotaVoltar" class="m-1 md:m-4 bg-blue-500 shadow-lg shadow-blue-500/40 hover:bg-blue-700 p-3 rounded-full text-white w-full self-center hover:translate-y-0.5 ring-1 ring-blue-500 hover:outline hover:outline-offset-4 outline-blue-500">Voltar</button>
    
                        <button type="submit" @click='rotaNovaSenha' class="m-1 md:m-4 mt-4  bg-green-500 shadow-lg shadow-green-500/40 hover:bg-green-700 p-3 rounded-full hover:translate-y-0.5  text-white w-full self-center ring-1 ring-green-500 hover:outline hover:outline-offset-4 outline-green-500">Próximo</button>
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
            valid: true,
            
            
        }),
        methods: {
            rotaVoltar(){
                this.$router.push({name:'login'})
            },

            rotaNovaSenha(){
                this.$router.push({name:'novaSenha'})
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