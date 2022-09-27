<template>
  <v-card>
   <v-card-title>
      <v-text-field
        v-model="search"
        :search="search"
        append-icon="mdi-magnify"
        label="Search"
        single-line
        hide-details
      ></v-text-field>
    </v-card-title>
    <v-data-table
      :headers="headers"
      :items="all_items"
      height="300px"
      :server-items-length="totalPages"
      fixed-header
      :items-per-page="10"
      :page="page"
      :options.sync="options"
      @update:options="onOptionsChanged"
    ></v-data-table>
  </v-card>
</template>
 <script>
    import { mapState, mapActions} from 'vuex'
    // import axios from "axios";
    export default {
      name: "datatable",
      mounted() {
       this.ActionLista('');
        
        // axios.get('http://127.0.0.1:8000/api/curriculo/lista?model_id=1').then(response => {
        //   this.totalPages = response.data.count > 10 ? Math.ceil(response.data.count / 10) : 1
        //   this.page = this.options.page
        //   this.all_items = [];
        //    for (let i = 0; i < response.data.data.length; i++) {
        //       this.dados.name = response.data.data[i].name
        //       this.dados.email = response.data.data[i].email
        //       this.all_items.push(this.dados)
        //     }
        // })
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
        onOptionsChanged(options, page0=false) {
        
          // axios.get('http://127.0.0.1:8000/api/curriculo/lista?model_id=1' +
          //     '&page=' +
          //     (!page0 ? this.options.page : 1) +
          //     '&search=' +
          //     this.search).then(response => {
          //   this.page = !page0 ? this.options.page : 1
          //   this.totalPages = response.data.count > 10 ? Math.ceil(response.data.count / 10) : 1
          //   this.all_items = [];
          //   for (let i = 0; i < response.data.data.length; i++) {
          //     this.dados.name = response.data.data[i].name
          //     this.dados.email = response.data.data[i].email
          //     this.all_items.push(this.dados)
          //   }
          // })
    
        },
      },
      data() {
        return {
          search: "",
          options: {},
          dados : {
            name:'',
            email:''
          },
          headers: [{
            text: 'Nome',
            value: 'name',
          },
          { 
            text: 'Email', 
            value: 'email' 
          },
          ],
          all_items: [],
          pageSize: 10,
          totalPages: 0,
          page: 1,
        }
      },
    }
    </script>