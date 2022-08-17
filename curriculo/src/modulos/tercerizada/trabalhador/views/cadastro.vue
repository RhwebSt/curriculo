<template>

  <v-form
    ref="form"
    v-model="valid"
    lazy-validation
    @submit.prevent="submit()"
  >
    <v-container>
      <v-row>
        <v-col
          cols="12"
          md="6"
        >
          <v-text-field
            v-model="name"
            :counter="10"
            :rules="nameRules"
            label="Nome Completo"
            required
          
          ></v-text-field>
        </v-col>
         <v-col
          cols="12"
          md="6"
        >
          <v-text-field
            v-model="name"
            :counter="10"
            :rules="nameRules"
            label="Nome Social (Opcional)"
            required
          
          ></v-text-field>
        </v-col>
         <v-col
          cols="12"
          md="4"
        >
          <v-text-field
            v-model="name"
            :counter="10"
            :rules="nameRules"
            label="RG"
            required
          
          ></v-text-field>
        </v-col>
         <v-col
          cols="12"
          md="4"
        >
          <v-text-field
            v-model="name"
            :counter="10"
            :rules="nameRules"
            label="UF"
            required
          
          ></v-text-field>
        </v-col>
         <v-col
          cols="12"
          md="4"
        >
           <div>
              
              <v-menu
                ref="menu"
                v-model="menuemissao"
                :close-on-content-click="false"
                transition="scale-transition"
                offset-y
                min-width="auto"
              >
                <template v-slot:activator="{ on, attrs }">
                  <v-text-field
                    v-model="emissao"
                    label="Data de Emissão"
                    prepend-icon="mdi-calendar"
                    readonly
                    v-bind="attrs"
                    v-on="on"
                  ></v-text-field>
                </template>
                <v-date-picker
                  v-model="date"
                  :active-picker.sync="activePicker"
                  min="1950-01-01"
                  @change="save"
                ></v-date-picker>
              </v-menu>
            </div>
        </v-col>
         <v-col
          cols="12"
          md="3"
        >
          <v-text-field
            v-model="name"
            :counter="10"
            :rules="nameRules"
            label="CPF"
            required
          
          ></v-text-field>
        </v-col>
         <v-col
          cols="12"
          md="3"
        >
          <v-text-field
            v-model="name"
            :counter="10"
            :rules="nameRules"
            label="Matrícula"
            required
          
          ></v-text-field>
        </v-col>
         <v-col
          cols="12"
          md="3"
        >
          <v-text-field
            v-model="name"
            :counter="10"
            :rules="nameRules"
            label="PIS"
            required
          
          ></v-text-field>
        </v-col>
         <v-col
          cols="12"
          md="3"
        >
        <v-select
          v-model="select"
          :items="items"
          :error-messages="selectErrors"
          label="Sexo"
          required
          @change="$v.select.$touch()"
          @blur="$v.select.$touch()"
        ></v-select>
        </v-col>
         <v-col
          cols="12"
          md="6"
        >
        <v-select
          v-model="select"
          :items="items"
          :error-messages="selectErrors"
          label="Estado Civil"
          required
          @change="$v.select.$touch()"
          @blur="$v.select.$touch()"
        ></v-select>
        </v-col>
         <v-col
          cols="12"
          md="6"
        >
        <v-select
          v-model="select"
          :items="items"
          :error-messages="selectErrors"
          label="Raça"
          required
          @change="$v.select.$touch()"
          @blur="$v.select.$touch()"
        ></v-select>
        </v-col>
         <v-col
          cols="12"
          md="6"
        >
        <v-select
          v-model="select"
          :items="items"
          :error-messages="selectErrors"
          label="Grau de Instrução"
          required
          @change="$v.select.$touch()"
          @blur="$v.select.$touch()"
        ></v-select>
        </v-col>
         <v-col
          cols="12"
          md="6"
        >
           <div>
              
              <v-menu
                ref="menu"
                v-model="menunascimento"
                :close-on-content-click="false"
                transition="scale-transition"
                offset-y
                min-width="auto"
              >
                <template v-slot:activator="{ on, attrs }">
                  <v-text-field
                    v-model="nascimento"
                    label="Data de Nascimento"
                    prepend-icon="mdi-calendar"
                    readonly
                    v-bind="attrs"
                    v-on="on"
                  ></v-text-field>
                </template>
                <v-date-picker
                  v-model="nascimento"
                  :active-picker.sync="activePicker"
                  min="1950-01-01"
                  @change="save"
                ></v-date-picker>
              </v-menu>
            </div>
        </v-col>
           <v-col
          cols="12"
          md="6"
        >
        <v-select
          v-model="select"
          :items="items"
          :error-messages="selectErrors"
          label="País de Nascimento"
          required
          @change="$v.select.$touch()"
          @blur="$v.select.$touch()"
        ></v-select>
        </v-col>
         <v-col
          cols="12"
          md="6"
        >
        <v-select
          v-model="select"
          :items="items"
          :error-messages="selectErrors"
          label="País de Nacionalidade"
          required
          @change="$v.select.$touch()"
          @blur="$v.select.$touch()"
        ></v-select>
        </v-col>
          <v-col
          cols="12"
          md="6"
        >
         <v-text-field
            v-model="name"
            :counter="10"
            :rules="nameRules"
            label="Nome da Mãe"
            required
          
          ></v-text-field>
        </v-col>
         <v-col
          cols="12"
          md="6"
        >
         <v-text-field
            v-model="name"
            :counter="10"
            :rules="nameRules"
            label="Telefone"
            required
          
          ></v-text-field>
        </v-col>
         <v-col
          cols="12"
          md="3"
        >
         <v-text-field
            v-model="name"
            :counter="10"
            :rules="nameRules"
            label="CEP"
            required
          
          ></v-text-field>
        </v-col>
         <v-col
          cols="12"
          md="7"
        >
         <v-text-field
            v-model="name"
            :counter="10"
            :rules="nameRules"
            label="Rua"
            required
          
          ></v-text-field>
        </v-col>
         <v-col
          cols="12"
          md="2"
        >
         <v-text-field
            v-model="name"
            :counter="10"
            :rules="nameRules"
            label="Número"
            required
          
          ></v-text-field>
        </v-col>
          <v-col
          cols="12"
          md="4"
        >
        <v-select
          v-model="select"
          :items="items"
          :error-messages="selectErrors"
          label="Tipo"
          required
          @change="$v.select.$touch()"
          @blur="$v.select.$touch()"
        ></v-select>
        </v-col>
         <v-col
          cols="12"
          md="8"
        >
         <v-text-field
            v-model="name"
            :counter="10"
            :rules="nameRules"
            label="Bairro"
            required
          
          ></v-text-field>
        </v-col>
      </v-row>
    </v-container>
   
  </v-form>
</template>
<script>
import {mapActions} from 'vuex'

  export default {
    data: () => ({
      activePicker: null,
      emissao: null,
      nascimento:null,
      menunascimento:null,
      menuemissao: false,
      valid: true,
      name: '',
      nameRules: [
        v => !!v || 'Name is required',
        v => (v && v.length <= 10) || 'Name must be less than 10 characters',
      ],
      email: '',
      emailRules: [
        v => !!v || 'E-mail is required',
        v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
      ],
      select: null,
      items: [
        'Item 1',
        'Item 2',
        'Item 3',
        'Item 4',
      ],
      checkbox: false,
    }),
    created(){
      this.ActionLogin({password:'123456',email:'elielfelipe789@gmail.com'})
    },
     watch: {
      menu (val) {
        val && setTimeout(() => (this.activePicker = 'YEAR'))
      },
    },
    methods: {
      ...mapActions('auth',['ActionLogin']),
      save (date) {
        this.$refs.menu.save(date)
      },
      validate () {
        this.$refs.form.validate()
      },
      reset () {
        this.$refs.form.reset()
      },
      resetValidation () {
        this.$refs.form.resetValidation()
      },
      async submit(){
        try{
          await this.ActionLogin('ok')
          // this.$router.push({name:'home'})
        } catch (err){

        }
      }
    },
  }
</script>
