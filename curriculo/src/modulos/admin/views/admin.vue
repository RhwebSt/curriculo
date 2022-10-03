<template>

  <div class="bg-white w-full absolute min-h-screen">
    
    <div class="relative">
      <div class="bg-blue-900 flex justify-between">
        <img class="self-center w-44 ms-6" src="/img/logoMobeBranca.png" alt="">
        <ul class="self-center me-6 text-gray-50">
          <li @click="sair()" class="text-gray-50 font-header text-sm md:text-lg hover:scale-110 hover:underline hover:decoration-indigo-500 hover:decoration-4 cursor-pointer">Sair</li>
        </ul>
      </div>

      <v-card class="flex justify-center content-center min-h-screen">
        <v-card-title>
          Currículos
          <v-spacer></v-spacer>
          <v-text-field
            v-model="search"
            append-icon="mdi-magnify"
            label="Search"
            :search="search"
            single-line
            hide-details
          ></v-text-field>
        </v-card-title>
        <v-data-table
          :headers="headers"
          :items="all_items"
          :server-items-length="totalPages"
          fixed-header
          :items-per-page="10"
          :page="page"
          :options.sync="options"
          @update:options="onOptionsChanged"

        >
        
        <template v-slot:item.action="{ item }">
          <v-btn
            color="primary"
            @click="imprimir(item)"
          >
            Imprimir
          </v-btn>
        </template>
        
        </v-data-table>
      </v-card>

    </div>

    <div class="text-center p-5 bg-blue-900 relative w-full text-gray-50">
      <footer>Todos os direitos reservados - Mobe 2022.</footer>
    </div>

  </div>

</template>
<script>
  
  import { mapState, mapActions} from 'vuex'
  export default {
    data () {
      return {
        search: '',
        options: {},
        dados : {
          name:'',
          email:'',
          pstelefone: '',
          pssexo: '',
          psnascimento: '',
          escidade: '',
          esbairro: '',
          esuf: '',
        },
        headers: [
          {
            text: 'Nome',
            align: 'start',
            value: 'name',
          },
          { text: 'Telefone', value: 'pstelefone' },
          { text: 'Sexo', value: 'pssexo' },
          { text: 'Data Nascimento', value: 'psnascimento' },
          { text: 'Cidade', value: 'escidade' },
          { text: 'Bairro', value: 'esbairro' },
          { text: 'UF', value: 'esuf' },
          { text: 'Curriculo', value: 'action', sortable: false },
        ],
        all_items: [],
        pageSize: 10,
        totalPages: 0,
        page: 1,
      }
    },

   
    computed:{
        ...mapState('admin',['listatrabalhador']) 
    },
    async mounted() {
      await this.ActionLista({id:'1',page:'',search:''});
      this.totalPages = this.listatrabalhador.data.count > 10 ? Math.ceil(this.listatrabalhador.data.count / 10) : 1
      this.page = this.options.page
      this.all_items = [];
      for (let i = 0; i < this.listatrabalhador.data.length; i++) {
        
        this.all_items.push( this.listatrabalhador.data[i])
      }

      },

      watch: {
        search: function (val) {
          this.search = val
          this.onOptionsChanged(this.options, true)
          return val
        }
      },

      methods: {
        ...mapActions('admin',['ActionLista']),
         ...mapActions('auth',['ActionLogout']),
       async onOptionsChanged(options, page0=false) {
        let pagina = !page0 ? this.options.page : 1
       await this.ActionLista({id:'1',page:pagina,search:this.search});
       this.totalPages = this.listatrabalhador.data.count > 10 ? Math.ceil(this.listatrabalhador.data.count / 10) : 1
        this.page = !page0 ? this.options.page : 1
        this.all_items = [];
        for (let i = 0; i < this.listatrabalhador.data.length; i++) {
          this.all_items.push( this.listatrabalhador.data[i])
        }
      },
      imprimir(item){
      
        location.href = `https://curriculos.mobemaodeobra.com.br/public/curriculo/imprimir/${item.user_id}`;
      },
      async sair(){
        try{ 
          await this.ActionLogout('')
          console.log('ok')
           this.$router.push({name:'login'});
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

   table{
      width: 100%;
      background-color: rgb(59, 59, 59);
      color: white;
   }

   .section-table{
     width: 80%;
     background-color: rgb(107, 107, 107);
     padding: 30px;
     border-radius: 20px;
     margin-top: 10%;
     
   }

</style>
