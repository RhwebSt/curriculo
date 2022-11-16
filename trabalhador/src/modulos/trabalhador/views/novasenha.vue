<template>
    <v-sheet
          class="overflow-hidden"
          style="position: relative;"
        >
    <div>
        <header-app/>
        <v-container>
         <v-toolbar-title>
            Atualizar senha
          </v-toolbar-title>
           
  <v-form
    ref="form"
    v-model="valid"
    lazy-validation
     @submit.prevent="submit()"
     id='senha'
    
  >
  <div class="form-group" :class="{ 'form-group--error': $v.senha.$error }">
  
    <v-text-field
      v-model.trim="senha"
      name='senha'
      label="Nova senha"
      required
    ></v-text-field>
    <span class="text-caption red--text" v-if="!$v.senha.required">Este campo é obrigatório</span>
     <span class="text-caption red--text" v-if="!$v.senha.minLength">A senha não pode te menos de {{$v.senha.$params.minLength.min}} caracteres.</span>
    </div>
     <div class="form-group" :class="{ 'form-group--error': $v.confirma.$error }">
    <v-text-field
      label="Confirma senha"
      v-model.trim="confirma"
      required
    ></v-text-field>
     <div class="text-caption red--text" v-if="!$v.confirma.sameAsPassword">A senha tem que ser igual a que sta no campo acima.</div>
     <tree-view :data="$v" :options="{rootObjectKey: '$v', maxDepth: 2}"></tree-view>
    </div>
    <v-btn
       block
      :disabled="!valid"
     
      class="mr-4 indigo white--text"
      type="submit"
    >
      Atualizar
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
    import { required, minLength, between,sameAs } from 'vuelidate/lib/validators'
    export default{
        components:{
            HeaderApp
        },
        data() {
            return {
                senha:'',
                confirma:'',
                valid: true,
                submitStatus: null,
                snackbar: false,
                text:'',
                cor:'',
                icon:'',
            }
        },
        computed:{
            ...mapState('auth',['user']),
            ...mapState('trabalhador',['msg']) 
        },
        validations: {
            senha:{
                required,
                minLength: minLength(6)
            },
            confirma: {
                sameAsPassword: sameAs('senha')
            }
        },
        //  data: () => ({
        //     valid: true,
        //     senha:'',
        //     // senhaRules: [
        //     //     v => !!v || 'Este campo não pode esta vazio',
        //     //     v => (v && v.length <= 5) || 'A senha tem que te no minimo 6 caracteres',
        //     // ],
        //     // email: '',
        //     // emailRules: [
        //     //     v => !!v || 'E-mail is required',
        //     //     v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
        //     // ],
          
        // }),
            
            methods:{
                  ...mapActions('trabalhador',['ActionAtualizarSenha']),
                validate () {
                    this.$refs.form.validate()
                },
                async submit(){ 
                    try{
                         this.snackbar = false;
                        this.text = '';
                        let senha = document.getElementById('senha');
                        var formData = new FormData(senha);
                        formData.append('id',this.user.id)
                        this.$v.$touch()
                        if (this.$v.$invalid) {
                            this.valid = false
                        } else {
                             await this.ActionAtualizarSenha(formData)
                              if(this.msg.status == 200){
                                this.snackbar = true;
                                this.text = this.msg.body;
                                this.cor = 'teal darken-2';
                                this.icon = 'mdi-lock-check';
                                return false;
                            }
                            if(this.msg.status == 422){
                                this.snackbar = true;
                                this.text = this.msg.body.errors.cpf[0];
                                this.cor = 'red accent-2';
                                this.icon = 'mdi-lock-open-remove';
                                return false;
                            }
                            if(this.msg.status == 401){
                                this.snackbar = true;
                                this.text = this.msg.body;
                                this.cor = 'red accent-2';
                                this.icon = 'mdi-lock-open-remove';
                                return false;
                            }
                        }
                    } catch (err){
                    
                    }
                }
            }
    }
</script>