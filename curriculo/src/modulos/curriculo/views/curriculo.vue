<template>
  <div class="max-h-screen">

    <v-form
      ref="form"
      v-model="valid"
      lazy-validation
      @submit.prevent="submit()"
      id="formCurriculo"
    >

    <div class="bg-blue-900 flex justify-between">
      <img class="self-center w-44 ms-6" src="/img/logoMobeBranca.png" alt="">
      <ul class="self-center me-6 text-gray-50">
        <li class="text-gray-50 font-header text-sm md:text-lg hover:scale-110 hover:underline hover:decoration-indigo-500 hover:decoration-4 cursor-pointer"><router-link tag="li" to="/">Voltar</router-link></li>
      </ul>
    </div>

    <v-stepper v-model="e1" class="m-4 md:m-32  rounded-xl shadow-2xl">
      <v-stepper-header>
        <v-stepper-step
          :complete="e1 > 1"
          step="1"
        >
          Dados Pessoais
        </v-stepper-step>

        <v-divider></v-divider>

        <v-stepper-step
          :complete="e1 > 2"
          step="2"
        >
          Dados profissionais
        </v-stepper-step>

        <v-divider></v-divider>

        <v-stepper-step
          :complete="e1 > 3"
          step="3"
        >
          Idiomas
        </v-stepper-step>

        <v-divider></v-divider>

        <v-stepper-step 
        :complete="e1 > 4"
        step="4">
          Acadêmicos
        </v-stepper-step>

        <v-divider></v-divider>

        <v-stepper-step 
        :complete="e1 > 5"
        step="5">
          Habilidades
        </v-stepper-step>
      </v-stepper-header>

      <v-stepper-items>
        <v-stepper-content step="1">
          <v-card
            v-scroll.self="onScroll"
            class="mb-12 overflow-y-auto"
            max-height="700"
          >

          <img class="w-42 h-48 mx-auto rounded-xl mt-20 mb-20" :src="image" alt="">

          <div class="lg:w-2/4 w-4/5 mx-auto mt-6">
            <input type="file" @change="fileChange">
            <input type="hidden" name="psfoto" id="foto"> 
          </div>

          <!-- <v-file-input
            type="file"
            class="lg:w-2/4 w-4/5 mx-auto mt-6 text-white"
            label="Clique para adicionar a foto do currículo"
            
            outlined
            dense
          ></v-file-input> -->

          <v-text-field
          outlined
          v-model="nome"
          name="name"
          class="lg:w-2/4 w-4/5 mx-auto mt-6 text-white"
          label="Nome"></v-text-field>

          <v-text-field
          outlined 
          type="date"
          v-model="psnascimento"
          name="psnascimento"
          class="lg:w-2/4 w-4/5 mx-auto mt-6 text-white"
          label="Data de Nascimento"></v-text-field>

          <v-select
            :items="sexo"
            v-model="pssexo"
            name="pssexo"
            label="Sexo"
            class="lg:w-2/4 w-4/5 mx-auto mt-6 text-white"
            outlined
          ></v-select>

          <v-text-field
          outlined
          v-model="pstitulopro"
          name="pstitulopro" 
          class="lg:w-2/4 w-4/5 mx-auto mt-6 text-white"
          label="Titulo Profissional"></v-text-field>

          <v-text-field
          outlined 
          type="email"
          v-model="email"
          name="email"
          class="lg:w-2/4 w-4/5 mx-auto mt-6 text-white"
          label="E-mail"></v-text-field>

          <v-text-field
          outlined
          v-model="pstelefone"
          name="pstelefone" 
          class="lg:w-2/4 w-4/5 mx-auto mt-6 text-white"
          label="Telefone"></v-text-field>

          <v-text-field
          outlined
          v-model="escep"
          @focusout="buscaCep"
          name="escep" 
          class="lg:w-2/4 w-4/5 mx-auto mt-6 text-white"
          label="Cep"></v-text-field>

          <v-text-field
          outlined
          v-model="esrua"
          name="esrua" 
          class="lg:w-2/4 w-4/5 mx-auto mt-6 text-white"
          label="Rua"></v-text-field>

          <v-text-field
          outlined
          v-model="esnumero"
          name="esnumero" 
          class="lg:w-2/4 w-4/5 mx-auto mt-6 text-white"
          label="Número"></v-text-field>

          <v-text-field
          outlined
          v-model="esbairro"
          name="esbairro" 
          class="lg:w-2/4 w-4/5 mx-auto mt-6 text-white"
          label="Bairro"></v-text-field>

          <v-text-field
          outlined
          v-model="escidade"
          name="escidade" 
          class="lg:w-2/4 w-4/5 mx-auto mt-6 text-white"
          label="Cidade"></v-text-field>

          <v-text-field
          outlined
          v-model="esuf"
          name="esuf" 
          class="lg:w-2/4 w-4/5 mx-auto mt-6 text-white"
          label="Estado"></v-text-field>

          <v-textarea
            outlined
            v-model="pssobrevoce"
            name="pssobrevoce"
            label="Sobre Você"
            class="lg:w-2/4 w-4/5 mx-auto mt-6 mb-6 text-white"
            value="Descreva um pouco sobre você e suas qualidades."
            hint="Descreva sobre você e suas habilidades"
          ></v-textarea>

          </v-card>

          <v-btn
            color="primary"
            @click="e1 = 2"
          >
            Continuar
          </v-btn>

          <v-btn text>
            Cancelar
          </v-btn>
        </v-stepper-content>

        <v-stepper-content step="2">
          <v-card
            v-scroll.self="onScroll"
            class="mb-12 overflow-y-auto"
            max-height="700"
          >

          <h1 class="text-center text-2xl">Dados da última empresa em que voçê trabalhou.</h1>

          <v-text-field
          outlined
          v-model="psempresa" 
          class="lg:w-2/4 w-4/5 mx-auto mt-6 text-white"
          label="Nome da Empresa"></v-text-field>
          

          <v-text-field
          outlined
          v-model="pscargo"
          name="pscargo" 
          class="lg:w-2/4 w-4/5 mx-auto mt-6 text-white"
          label="Último cargo"></v-text-field>

          <v-text-field
          outlined
          v-model="psdatainicio"
          name="psdatainicio" 
          type="date"
          class="lg:w-2/4 w-4/5 mx-auto mt-6 text-white"
          label="Data de início"></v-text-field>

          <v-text-field
          outlined
          v-model="psdatafinal"
          name="psdatafinal"
          type="date" 
          class="lg:w-2/4 w-4/5 mx-auto mt-6 text-white"
          label="Data final"></v-text-field>

          <v-textarea
            outlined
            v-model="psexperiencia"
            name="psexperiencia"
            label="Sobre sua função"
            class="lg:w-2/4 w-4/5 mx-auto mt-6 mb-6 text-white"
            value="Descreva um pouco sobre como foi sua ultima função"
            hint="Descreva um pouco sobre como foi sua ultima função"
          ></v-textarea>
          
          </v-card>

          <v-btn
            color="primary"
            @click="e1 = 3"
          >
            Continue
          </v-btn>

          <v-btn text
            @click="e1 = 1"
          >
            Voltar
          </v-btn>
        </v-stepper-content>

        <v-stepper-content step="3">
          <v-card
            v-scroll.self="onScroll"
            class="mb-12 overflow-y-auto"
            max-height="700"
          >
          
          <h1 class="text-center text-2xl">Idioma Complementar</h1>

          <v-text-field
          outlined
          v-model="islocal"
          nome="islocal" 
          class="lg:w-2/4 w-4/5 mx-auto mt-6 text-white"
          label="Local do curso"></v-text-field>

          <v-text-field
          outlined
          v-model="isidioma"
          name="isidioma" 
          class="lg:w-2/4 w-4/5 mx-auto mt-6 text-white"
          label="Idioma"></v-text-field>

          <v-select
            :items="items"
            v-model="isnivel"
            name="isnivel"
            label="Nível"
            class="lg:w-2/4 w-4/5 mx-auto mt-6 text-white"
            outlined
          ></v-select>

          <v-text-field
          outlined
          v-model="isdatainicio"
          name="isdatainicio" 
          type="date"
          class="lg:w-2/4 w-4/5 mx-auto mt-6 text-white"
          label="Data de início"></v-text-field>

          <v-text-field
          outlined
          v-model="isdatafinal"
          name="isdatafinal"
          type="date" 
          class="lg:w-2/4 w-4/5 mx-auto mt-6 text-white"
          label="Data final"></v-text-field>
        
          </v-card>

          <v-btn
            color="primary"
            @click="e1 = 4"
          >
            Continue
          </v-btn>

          <v-btn text
          @click="e1 = 2"
          >
            Voltar
          </v-btn>
        </v-stepper-content>

        <v-stepper-content step="4">
          <v-card
            v-scroll.self="onScroll"
            class="mb-12 overflow-y-auto"
            max-height="700"
          >
          
          <h1 class="text-center text-2xl">Informações Acadêmicas</h1>

          <v-text-field
          outlined
          v-model="aslocal"
          name="aslocal" 
          class="lg:w-2/4 w-4/5 mx-auto mt-6 text-white"
          label="Local do curso"></v-text-field>

          <v-text-field
          outlined
          v-model="ascurso"
          name="ascurso" 
          class="lg:w-2/4 w-4/5 mx-auto mt-6 text-white"
          label="Nome do curso"></v-text-field>

          <v-text-field
          outlined
          v-model="asdatainicio"
          name="asdatainicio" 
          type="date"
          class="lg:w-2/4 w-4/5 mx-auto mt-6 text-white"
          label="Data de início"></v-text-field>

          <v-text-field
          outlined
          v-model="asdataconclusao"
          name="asdataconclusao"
          type="date" 
          class="lg:w-2/4 w-4/5 mx-auto mt-6 text-white"
          label="Data final"></v-text-field>
        
          </v-card>

          <v-btn
            color="primary"
            @click="e1 = 5"
          >
            Continue
          </v-btn>

          <v-btn text
          @click="e1 = 3"
          >
            Voltar
          </v-btn>
        </v-stepper-content>

        <v-stepper-content step="5">
          <v-card
            v-scroll.self="onScroll"
            class="mb-12 overflow-y-auto"
            max-height="700"
          >
          
          <h1 class="text-center text-2xl">Habilidades</h1>

          <v-text-field
          outlined
          v-model="hshabilidade"
          name="hshabilidade" 
          class="lg:w-2/4 w-4/5 mx-auto mt-6 text-white"
          label="Habilidade 1"></v-text-field>

          <v-text-field
          outlined
          v-model="hshabilidade1" 
          class="lg:w-2/4 w-4/5 mx-auto mt-6 text-white"
          label="Habilidade 2"></v-text-field>

          <v-text-field
          outlined
          v-model="hshabilidade2" 
          class="lg:w-2/4 w-4/5 mx-auto mt-6 text-white"
          label="Habilidade 3"></v-text-field>
        
        
          </v-card>

          <v-btn
            color="success"
            @click="e1 = 1"
            type="submit"
          >
            Enviar Currículo
          </v-btn>

          <v-btn text
          @click="e1 = 4"
          >
            Voltar
          </v-btn>

        </v-stepper-content>
      </v-stepper-items>
    </v-stepper>

    <div class="text-center p-5 bg-blue-900 text-gray-50">
      <footer>Todos os direitos reservados - Mobe 2022.</footer>
    </div>

    </v-form>

  </div>
</template>
<script>
    import axios from "axios";
    import {mapActions} from 'vuex'
    export default {
      data () {
        return {
          valid: true,
          e1: 1,
          image: '/img/employee.png',
          nome: '',
          psnascimento: '',
          pssexo: '',
          foto: '',
          sexo: ['M', 'F'],
          pstitulopro: '',
          email: '',
          pstelefone: '',
          escep: '',
          esrua: '',
          esnumero: '',
          esbairro: '',
          escidade: '',
          esuf: '',
          pssobrevoce: '',
          psempresa: '',
          pscargo: '',
          psdatainicio: '',
          psdatafinal: '',
          psexperiencia: '',
          islocal: '',
          isidioma: '',
          isnivel: '',
          isdatainicio: '',
          isdatafinal: '',
          items: ['Básico', 'Intermediário', 'Avançado'],
          aslocal: '',
          ascurso: '',
          asdatainicio: '',
          asdataconclusao: '',
          hshabilidade: '',
          hshabilidade1: '',
          hshabilidade2:'',

        }
      },

      methods: {
        ...mapActions('curriculo',['ActionSendCurriculo']),

        fileChange(e){
          const file = e.target.files[0];
          this.image = URL.createObjectURL(file);

          var reader = new FileReader();
           reader.onloadend = function() {
             document.getElementById('foto').value = reader.result;
           }
           reader.readAsDataURL(file)

        },

        

        buscaCep(){
            axios.get(`https://viacep.com.br/ws/88133330/json/`).then(response => {
            console.log(response.data)
        })
        },

        async onScroll(){
          this.scrollInvoked++
        },

        async submit(){ 
          let formCurriculo = document.getElementById('formCurriculo');
          var formData = new FormData(formCurriculo);
         

          console.log(formData);
          
          try{ 
            await this.ActionSendCurriculo(formData);

          } catch (err){
            console.log('ok');
          }
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
