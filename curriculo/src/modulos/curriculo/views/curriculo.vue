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

    <v-snackbar
      v-model="alert"
      color="red accent-2"
      elevation="24"
      class="text-lg"
    >
      {{ textAlert }}

      <template v-slot:action="{ attrs }">
        <v-btn
          color=""
          text
          class="bg-red-800"
          v-bind="attrs"
          @click="alert = false"
        >
          Fechar
        </v-btn>
      </template>
    </v-snackbar>

    <v-alert
      prominent
      v-model="alertSucces"
      type="success"
     >
      <v-row align="center">
        <v-col class="grow">
          Currículo enviado com sucesso!!
        </v-col>
        <v-col class="shrink">
          <v-btn><router-link to="/">Pagina principal</router-link></v-btn>
        </v-col>
      </v-row>
    </v-alert>


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
            <input type="file" @change="fileChange" >
            <input type="hidden" name="psfoto" id="foto"> 
          </div>

          <v-text-field
          outlined
          v-model="nome"
          :rules="rulesNome"
          name="name"
          :counter="40"
          class="lg:w-2/4 w-4/5 mx-auto mt-6 text-white"
          required
          label="Nome"></v-text-field>

          <v-text-field
          outlined 
          type="date"
          v-model="psnascimento"
          :rules="psnascimentoRules"
          name="psnascimento"
          class="lg:w-2/4 w-4/5 mx-auto mt-6 text-white"
          label="Data de Nascimento"></v-text-field>

          <v-select
            :items="sexo"
            v-model="pssexo"
            :rules="pssexoRules"
            name="pssexo"
            label="Sexo"
            class="lg:w-2/4 w-4/5 mx-auto mt-6 text-white"
            outlined
          ></v-select>

          <v-text-field
          outlined
          v-model="pstitulopro"
          name="pstitulopro"
          :rules="pstituloproRules"
          counter="30"
          hint="nome da profissão que você exerce. Ex: Estoquista" 
          class="lg:w-2/4 w-4/5 mx-auto mt-6 text-white"
          label="Titulo Profissional"></v-text-field>

          <v-text-field
          outlined 
          type="email"
          v-model="email"
          :rules="emailRules"
          counter="50"
          name="email"
          class="lg:w-2/4 w-4/5 mx-auto mt-6 text-white"
          required
          label="E-mail"></v-text-field>

          <v-text-field
          outlined
          v-model="pstelefone"
          :rules="pstelefoneRules"
          v-maska="'(##) #####-####'"
          name="pstelefone" 
          class="lg:w-2/4 w-4/5 mx-auto mt-6 text-white"
          label="Telefone"></v-text-field>

          <v-text-field
          outlined
          v-model="escep"
          id="escep"
          @focusout="buscaCep"
          v-maska="'#####-###'"
          :rules="escepRules"
          :messages="escepMsg"
          hint="após preencher saia do campo para preenchimento automático"
          name="escep" 
          class="lg:w-2/4 w-4/5 mx-auto mt-6 text-white"
          label="Cep"></v-text-field>

          <v-text-field
          outlined
          v-model="esrua"
          :rules="esruaRules"
          counter="40"
          name="esrua" 
          class="lg:w-2/4 w-4/5 mx-auto mt-6 text-white"
          label="Rua"></v-text-field>

          <v-text-field
          outlined
          v-model="esnumero"
          name="esnumero"
          :rules="esnumeroRules"
          counter="10"
          class="lg:w-2/4 w-4/5 mx-auto mt-6 text-white"
          label="Número"></v-text-field>

          <v-text-field
          outlined
          v-model="esbairro"
          :rules="esbairroRules"
          counter="30"
          name="esbairro" 
          class="lg:w-2/4 w-4/5 mx-auto mt-6 text-white"
          label="Bairro"></v-text-field>

          <v-text-field
          outlined
          v-model="escidade"
          name="escidade"
          :rules="escidadeRules"
          counter="30" 
          class="lg:w-2/4 w-4/5 mx-auto mt-6 text-white"
          label="Cidade"></v-text-field>

          <v-text-field
          outlined
          v-model="esuf"
          name="esuf" 
          :rules="esufRules"
          counter="30"
          class="lg:w-2/4 w-4/5 mx-auto mt-6 text-white"
          label="Estado"></v-text-field>

          <v-textarea
            outlined
            v-model="pssobrevoce"
            name="pssobrevoce"
            :rules="pssobrevoceRules"
            counter="200"
            label="Sobre Você"
            class="lg:w-2/4 w-4/5 mx-auto mt-6 mb-6 text-white"
            value="Descreva um pouco sobre você e suas qualidades."
            hint="Descreva sobre você e suas habilidades"
          ></v-textarea>

          </v-card>

          <v-btn
            color="primary"
            @click="nextPagePessoais"
          >
            Continuar
          </v-btn>

          <v-btn text>
            <router-link to="/">Cancelar</router-link>
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
          :rules="psempresaRules"
          counter="40"
          name="psempresa"
          class="lg:w-2/4 w-4/5 mx-auto mt-6 text-white"
          label="Nome da Empresa"></v-text-field>
          

          <v-text-field
          outlined
          v-model="pscargo"
          :rules="pscargoRules"
          counter="30"
          name="pscargo" 
          class="lg:w-2/4 w-4/5 mx-auto mt-6 text-white"
          label="Último cargo"></v-text-field>

          <v-text-field
          outlined
          v-model="psdatainicio"
          name="psdatainicio" 
          :rules="psdatainicioRules"
          type="date"
          class="lg:w-2/4 w-4/5 mx-auto mt-6 text-white"
          label="Data de início"></v-text-field>

          <v-text-field
          outlined
          v-model="psdatafinal"
          name="psdatafinal"
          :rules="psdatafinalRules"
          type="date" 
          class="lg:w-2/4 w-4/5 mx-auto mt-6 text-white"
          label="Data final"></v-text-field>

          <v-textarea
            outlined
            v-model="psexperiencia"
            name="psexperiencia"
            :rules="psexperienciaRules"
            counter="200"
            label="Sobre sua função"
            class="lg:w-2/4 w-4/5 mx-auto mt-6 mb-6 text-white"
            value="Descreva um pouco sobre como foi sua ultima função"
            hint="Descreva um pouco sobre como foi sua ultima função"
          ></v-textarea>
          
          </v-card>

          <v-btn
            color="primary"
            @click="nextPageProfissionais"
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
          :rules="islocalRules"
          counter="30"
          class="lg:w-2/4 w-4/5 mx-auto mt-6 text-white"
          label="Local do curso"></v-text-field>

          <v-text-field
          outlined
          v-model="isidioma"
          :rules="isidiomaRules"
          counter="20"
          name="isidioma" 
          class="lg:w-2/4 w-4/5 mx-auto mt-6 text-white"
          label="Idioma"></v-text-field>

          <v-select
            :items="items"
            v-model="isnivel"
            name="isnivel"
            :rules="isnivelRules"
            label="Nível"
            class="lg:w-2/4 w-4/5 mx-auto mt-6 text-white"
            outlined
          ></v-select>

          <v-text-field
          outlined
          v-model="isdatainicio"
          name="isdatainicio"
          :rules="isdatainicioRules" 
          type="date"
          class="lg:w-2/4 w-4/5 mx-auto mt-6 text-white"
          label="Data de início"></v-text-field>

          <v-text-field
          outlined
          v-model="isdatafinal"
          name="isdatafinal"
          :rules="isdatafinalRules"
          type="date" 
          class="lg:w-2/4 w-4/5 mx-auto mt-6 text-white"
          label="Data final"></v-text-field>
        
          </v-card>

          <v-btn
            color="primary"
            @click="nextPageIdiomas"
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
          :rules="aslocalRules"
          counter="30" 
          class="lg:w-2/4 w-4/5 mx-auto mt-6 text-white"
          label="Local do curso"></v-text-field>

          <v-text-field
          outlined
          v-model="ascurso"
          name="ascurso" 
          :rules="ascursoRules"
          counter="30"
          class="lg:w-2/4 w-4/5 mx-auto mt-6 text-white"
          label="Nome do curso"></v-text-field>

          <v-text-field
          outlined
          v-model="asdatainicio"
          name="asdatainicio" 
          :rules="asdatainicioRules"
          type="date"
          class="lg:w-2/4 w-4/5 mx-auto mt-6 text-white"
          label="Data de início"></v-text-field>

          <v-text-field
          outlined
          v-model="asdataconclusao"
          name="asdataconclusao"
          :rules="asdataconclusaoRules"
          type="date" 
          class="lg:w-2/4 w-4/5 mx-auto mt-6 text-white"
          label="Data final"></v-text-field>
        
          </v-card>

          <v-btn
            color="primary"
            @click="nextPageAcademicos"
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
          :rules="hshabilidadeRules" 
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
            @click="submit"
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
          rulesNome: [
            v => !!v || 'Campo Obrigatório',
            v => v.length <= 40 || 'O Campo não pode conter mais de 40 caracteres'
          ],
          psnascimento: '',
          psnascimentoRules: [
            v => !!v || 'Campo Obrigatório',
          ],
          pssexo: '',
          pssexoRules:[
            v => !!v || 'Campo obrigatório',
          ],
          psfoto: '',
          psfotoRules:[
            v => !!v || 'Campo obrigatório',
          ],
          sexo: ['M', 'F'],
          pstitulopro: '',
          pstituloproRules: [
            v => !!v || 'Campo Obrigatório',
            v => v.length <= 30 || 'O Campo não pode conter mais de 30 caracteres'
          ],
          email: '',
          emailRules: [
            v => !!v || 'Campo Obrigatório',
            v => /.+@.+\..+/.test(v) || 'E-mail tem que ser válido',
            v => v.length <= 50 || 'O Campo não pode conter mais de 50 caracteres'
          ],
          pstelefone: '',
          pstelefoneRules: [
            v => !!v || 'Campo Obrigatório',
          ],
          escep: '',
          escepRules: [
            v => !!v || 'Campo Obrigatório',
          ],
          escepMsg: '',
          esrua: '',
          esruaRules: [
            v => !!v || 'Campo Obrigatório',
            v => v.length <= 40 || 'O Campo não pode conter mais de 40 caracteres',
          ],
          esnumero: '',
          esnumeroRules: [
            v => !!v || 'Campo Obrigatório',
            v => v.length <= 10 || 'O Campo não pode conter mais de 10 caracteres',
          ],
          esbairro: '',
          esbairroRules: [
            v => !!v || 'Campo Obrigatório',
            v => v.length <= 30 || 'O Campo não pode conter mais de 30 caracteres',
          ],
          escidade: '',
          escidadeRules: [
            v => !!v || 'Campo Obrigatório',
            v => v.length <= 30 || 'O Campo não pode conter mais de 30 caracteres',
          ],
          esuf: '',
          esufRules: [
            v => !!v || 'Campo Obrigatório',
            v => v.length <= 30 || 'O Campo não pode conter mais de 30 caracteres',
          ],
          pssobrevoce: '',
          pssobrevoceRules: [
            v => !!v || 'Campo Obrigatório',
            v => v.length <= 200 || 'O Campo não pode conter mais de 200 caracteres',
          ],
          psempresa: '',
          psempresaRules: [
            v => !!v || 'Campo Obrigatório',
            v => v.length <= 40 || 'O Campo não pode conter mais de 200 caracteres',
          ],
          pscargo: '',
          pscargoRules: [
            v => !!v || 'Campo Obrigatório',
            v => v.length <= 30 || 'O Campo não pode conter mais de 200 caracteres',
          ],
          psdatainicio: '',
          psdatainicioRules: [
            v => !!v || 'Campo Obrigatório',
          ],
          psdatafinal: '',
          psdatafinalRules: [
            v => !!v || 'Campo Obrigatório',
          ],
          psexperiencia: '',
          psexperienciaRules: [
            v => !!v || 'Campo Obrigatório',
            v => v.length <= 200 || 'O Campo não pode conter mais de 200 caracteres',
          ],
          islocal: '',
          islocalRules: [
            v => !!v || 'Campo Obrigatório',
            v => v.length <= 40 || 'O Campo não pode conter mais de 40 caracteres',
          ],
          isidioma: '',
          isidiomaRules: [
            v => !!v || 'Campo Obrigatório',
            v => v.length <= 20 || 'O Campo não pode conter mais de 20 caracteres',
          ],
          isnivel: '',
          isnivelRules: [
            v => !!v || 'Campo Obrigatório',
          ],
          isdatainicio: '',
          isdatainicioRules: [
            v => !!v || 'Campo Obrigatório',
          ],
          isdatafinal: '',
          isdatafinalRules: [
            v => !!v || 'Campo Obrigatório',
          ],
          items: ['Básico', 'Intermediário', 'Avançado'],
          aslocal: '',
          aslocalRules: [
            v => !!v || 'Campo Obrigatório',
            v => v.length <= 30 || 'O Campo não pode conter mais de 30 caracteres',
          ],
          ascurso: '',
          ascursoRules: [
            v => !!v || 'Campo Obrigatório',
            v => v.length <= 30 || 'O Campo não pode conter mais de 30 caracteres',
          ],
          asdatainicio: '',
          asdatainicioRules: [
            v => !!v || 'Campo Obrigatório',
          ],
          asdataconclusao: '',
          asdataconclusaoRules: [
            v => !!v || 'Campo Obrigatório',
          ],
          hshabilidade: '',
          hshabilidadeRules: [
            v => !!v || 'Campo Obrigatório',
            v => v.length <= 20 || 'O Campo não pode conter mais de 20 caracteres',
          ],
          hshabilidade1: '',
          hshabilidade2:'',
          alert: false,
          alertSucces: false,
          textAlert: 'Preencha todos os campos',

        }
      },

      methods: {
        ...mapActions('curriculo',['ActionSendCurriculo']),

        fileChange(e){
          const file = e.target.files[0];
          this.image = URL.createObjectURL(file);

          var reader = new FileReader();
           reader.onloadend = function() {
            console.log(reader.result)
             document.getElementById('foto').value = reader.result;
           }
           reader.readAsDataURL(file)

        },
        

        nextPagePessoais(){
          if(this.nome === "" || this.psnascimento === "" || this.pssexo === ""
           || this.pstitulopro === "" || this.email === "" || this.pstelefone === "" 
           || this.escep === "" || this.esrua === "" || this.esnumero === ""
           || this.esbairro === "" || this.escidade === "" || this.esuf === "" || this.pssobrevoce === ""){
            this.alert = true;
            // window.scrollTo(0,0);
          }else{
            this.alert = false;
            this.e1 = 2;
          }
          
        },

        nextPageProfissionais(){
          if(this.psempresa === "" || this.pscargo === "" || this.psdatainicio === "" 
          || this.psdatafinal === "" || this.psexperiencia === ""){
            this.alert = true;
          }else{
            this.alert = false;
            this.e1 = 3;
          }

          
        },

        nextPageIdiomas(){
          if(this.islocal === "" || this.isidioma === "" || this.isnivel === "" 
          || this.isdatainicio === "" || this.isdatafinal === ""){
            this.alert = true;
          }else{
            this.alert = false;
            this.e1 = 4;
          }

        },

        nextPageAcademicos(){
          if(this.aslocal === "" || this.ascurso === "" || this.asdatainicio === "" 
          || this.asdataconclusao === ""){
            this.alert = true;
          }else{
            this.alert = false;
            this.e1 = 5;
          }

        },

        buscaCep(){
            if(this.escep === ''){
              this.escepRules = ["Campo Obrigatório"];
            }else{
              axios.get("https://viacep.com.br/ws/"+ this.escep +"/json/").then(response => {

                if(response.data.erro){
                  this.escepRules = ["Esse Cep não existe"]
                }else{
                  this.escepRules = []
                  this.esrua = response.data.logradouro;
                  this.esbairro = response.data.bairro;
                  this.escidade = response.data.localidade;
                  this.esuf = response.data.uf;

                }
              })
            }
  
        },

        async onScroll(){
          this.scrollInvoked++
        },

        async submit(){ 
          let formCurriculo = document.getElementById('formCurriculo');
          var formData = new FormData(formCurriculo);

          if(this.hshabilidade === ""){
            this.alert = true;
          }else{
            
            try{ 
              await this.ActionSendCurriculo(formData);
              this.alert = false;
              this.e1 = 1;
              this.alertSucces = true;
            } catch (err){
              this.alert = true;
            }

            

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
