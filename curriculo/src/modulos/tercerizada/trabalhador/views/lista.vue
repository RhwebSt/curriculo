<template>
  <v-card>
    <table class="table elevation-1"  item-key="name"  loading
    loading-text="Loading... Please wait" id="datatable">
      <thead>
        <tr>
          <th class="text-left">
            Name
          </th>
          <th class="text-left">
            Calories
          </th>
        </tr>
      </thead>
  </table>
  </v-card>
</template>
<script>
import "jquery/dist/jquery.min.js";
import "bootstrap/dist/css/bootstrap.min.css";
import "datatables.net-dt/js/dataTables.dataTables";
import "datatables.net-dt/css/jquery.dataTables.min.css";
import $ from "jquery";
  export default {
     mounted() {
        $("#datatable").DataTable({
            processing:true,
            serverSide:true,
            searchable: false,
            orderable: false,
            'ajax':{
                url:`https://brasilapi.com.br/api/banks/v1`,
                type: "get",
                
            },
            'columns':[
                {'data':'esnome'},
                {'data':'esinscricao'},
                
            ],
            // 'columnDefs': [
            //     {className: "limitaCarcteres", targets: [0,1,2]},
            //     {className: "text-nowrap", targets: [2]},
            // ],
            "language": {
                "infoEmpty": "mostrando",
                "search":         "Pesquisar",
                "info":           "Mostrando _START_ de _END_ registros",
                "infoFiltered":   "",
                "zeroRecords":    "Não há nenhum registro cadastrado <i class='fad fa-exclamation-triangle fa-lg' style='color: red !important;'>",
                "lengthMenu":     "Mostrar _MENU_ registros",
                "emptyTable":     "Não há dados disponíveis na tabela",
                "loadingRecords": "Carregando...",
                "paginate": {
                    "first":      "Primeira",
                    "last":       "Última",
                    "next":       "Próxima",
                    "previous":   "Anterior"
                },
            }
        });
     },
  }
</script>