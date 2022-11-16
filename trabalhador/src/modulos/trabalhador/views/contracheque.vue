<template>
<v-sheet
           
          class="overflow-hidden"
          style="position: relative;"
        >
  <div >
    <header-app/>
  <v-card
    class="mx-auto"
    max-width="400"
  >
   

    <v-card-text class="pt-4">
     Contra cheques
    </v-card-text>

    <v-divider></v-divider>

    <v-virtual-scroll
      :items="all_items"
      :item-height="50"
      height="300"
    >
      <template v-slot:default="{ item }">
        <v-list-item>
          <v-list-item-avatar>
            <v-avatar
              :color="item.color"
              size="56"
              class="white--text"
            >
              {{ item.initials }}
            </v-avatar>
          </v-list-item-avatar>

          <v-list-item-content>
            <v-list-item-title>{{ item.fullName }}</v-list-item-title>
          </v-list-item-content>

          <v-list-item-action>
            <v-btn
              depressed
              small
            >
              View User

              <v-icon
                color="orange darken-4"
                right
              >
                mdi-open-in-new
              </v-icon>
            </v-btn>
          </v-list-item-action>
        </v-list-item>
      </template>
    </v-virtual-scroll>
  </v-card>

      <v-card class="flex justify-center content-center min-h-screen d-none">
        <v-card-title>
          Lista de contra cheque
          <v-spacer></v-spacer>
          <v-text-field
            v-model="search"
            append-icon="mdi-magnify"
            label="Pesquisa"
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
          hide-default-footer
          :items-per-page="item_paget"
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
        <div class="text-center pt-2">
        <v-pagination
          v-model="page"
          :length="Math.ceil(this.listatrabalhador.recordsTotal/this.listatrabalhador.input.length)"
          :total-visible="7"
        ></v-pagination>
        </div>
      </v-card>
      </div>
  
  </v-sheet>
</template>
<script>
  import HeaderApp from'./header-app.vue'
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
            text:'Folhar',
            align:'start',
            value:'fscodigo'
          },
          { text:'Competência', value:'fscompetencia' },
          { text:'Inicio', value:'fsinicio' },
          { text:'Final', value:'fsfinal' },
          // {
          //   text: 'Nome',
          //   align: 'start',
          //   value: 'name',
          // },
          // { text: 'Telefone', value: 'pstelefone' },
          // { text: 'Sexo', value: 'pssexo' },
          // { text: 'Data Nascimento', value: 'psnascimento' },
          // { text: 'Vaga', value: 'pstitulopro' },
          // { text: 'Cidade', value: 'esmunicipio' },
          // { text: 'Bairro', value: 'esbairro' },
          // { text: 'UF', value: 'esuf' },
          { text: 'Curriculo', value: 'action', sortable: false },
        ],
        all_items: [],
        pageSize: 10,
        totalPages: 5,
        item_paget:10,
        page: 1,
        length:4,
         colors: ['#2196F3', '#90CAF9', '#64B5F6', '#42A5F5', '#1E88E5', '#1976D2', '#1565C0', '#0D47A1', '#82B1FF', '#448AFF', '#2979FF', '#2962FF'],
      names: ['Oliver', 'Jake', 'Noah', 'James', 'Jack', 'Connor', 'Liam', 'John', 'Harry', 'Callum', 'Mason', 'Robert', 'Jacob', 'Jacob', 'Jacob', 'Michael', 'Charlie', 'Kyle', 'William', 'William', 'Thomas', 'Joe', 'Ethan', 'David', 'George', 'Reece', 'Michael', 'Richard', 'Oscar', 'Rhys', 'Alexander', 'Joseph', 'James', 'Charlie', 'James', 'Charles', 'William', 'Damian', 'Daniel', 'Thomas', 'Amelia', 'Margaret', 'Emma', 'Mary', 'Olivia', 'Samantha', 'Olivia', 'Patricia', 'Isla', 'Bethany'],
      surnames: ['Smith', 'Anderson', 'Clark', 'Wright', 'Mitchell', 'Johnson', 'Thomas', 'Rodriguez', 'Lopez', 'Perez', 'Williams', 'Jackson', 'Lewis', 'Hill', 'Roberts', 'Jones', 'White', 'Lee', 'Scott', 'Turner', 'Brown', 'Harris', 'Walker', 'Green', 'Phillips', 'Davis', 'Martin', 'Hall', 'Adams', 'Campbell', 'Miller', 'Thompson', 'Allen', 'Baker', 'Parker', 'Wilson', 'Garcia', 'Young', 'Gonzalez', 'Evans', 'Moore', 'Martinez', 'Hernandez', 'Nelson', 'Edwards', 'Taylor', 'Robinson', 'King', 'Carter', 'Collins'],
      }
    },
    components:{
      HeaderApp
    },
   
    computed:{
        ...mapState('trabalhador',['listatrabalhador']), 
        ...mapState('auth',['user']),
         items () {
        const namesLength = this.names.length
        const surnamesLength = this.surnames.length
        const colorsLength = this.colors.length

        return Array.from({ length: 10000 }, (k, v) => {
          const name = this.names[this.genRandomIndex(namesLength)]
          const surname = this.surnames[this.genRandomIndex(surnamesLength)]

          return {
            color: this.colors[this.genRandomIndex(colorsLength)],
            fullName: `${name} ${surname}`,
            initials: `${name[0]} ${surname[0]}`,
          }
        })
      }, 
    },
    async mounted() {
      let page = (parseInt(this.options.page) - 1)
      if(page){
          if(page < 0){
            page *= -1
          }
      }else{
        page = 0;
      }
      await this.ActionLista({id:this.user.trabalhador_id,length:this.length,page:page,search:''});
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
        ...mapActions('trabalhador',['ActionLista']),
       genRandomIndex (length) {
        return Math.ceil(Math.random() * (length - 1))
      },
       async onOptionsChanged(options, page0=false) {
      
        let page = (parseInt(this.options.page) - 1)
        if(page < 0){
          page *= -1
        }
       
       await this.ActionLista({id:this.user.trabalhador_id,length:this.length,page:page,search:this.search});
      //  this.totalPages = this.listatrabalhador.data.count > 10 ? Math.ceil(this.listatrabalhador.data.count / 10) : 1
      //   this.page = !page0 ? this.options.page : 1
        this.all_items = [];
        for (let i = 0; i < this.listatrabalhador.data.length; i++) {
          this.all_items.push( this.listatrabalhador.data[i])
        }
      },
      imprimir(item){
        location.href = `https://rh.mobemaodeobra.com.br/public/trabalhador/recibo/${item.trabalhador_id}/${item.id}`;
      },
      async sair(){
        try{ 
          await this.ActionLogout('')
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
