<template>

  <div class="bg-white w-full h-full">
       
      <div class="flex justify-center flex-column bg-blue-900 shadow-2xl border-bottom-header drop-shadow-xls">
        <img class="w-40 md:w-60 self-center" src="/img/logoMobeBranca.png" alt="">
        <ul class="self-center flex justify-center gap-10 mb-40 md:mb-60 w-4/5">
          <li class="text-gray-50 font-header text-sm md:text-lg hover:scale-110 hover:underline hover:decoration-indigo-500 hover:decoration-4 cursor-pointer"><router-link tag="li" class="col" to="">Contatos</router-link></li>
          <li class="text-gray-50 font-header text-sm md:text-lg hover:scale-110 hover:underline hover:decoration-indigo-500 hover:decoration-4 cursor-pointer"><router-link tag="li" class="col" to="/curriculo">Trabalhe Conosco</router-link></li>
          <li class="text-gray-50 font-header text-sm md:text-lg hover:scale-110 hover:underline hover:decoration-indigo-500 hover:decoration-4 cursor-pointer"><router-link tag="li" class="col" to="/login">Entrar</router-link></li>
        </ul>
      </div>

      <div class="flex justify-center flex-column lg:flex-row">
        <img class="z-10 w-60 md:w-80 self-center margin-negative lg:grid-cols-1" src="/img/imgIndex/carringBox.png" alt="" srcset="">
        <h1 class="self-center text-2xl md:text-4xl font-title-primary mt-7 w-4/5 lg:w-/4">A sua melhor prestadora de mão de obra terceirizada.</h1>
        <button class="self-center bg-sky-600 p-3 mt-10 w-3/4 lg:w-1/4 md:w-2/4 md:text-xl lg:mt-15 rounded-xl text-gray-100 shadow-2xl hover:bg-sky-500 hover:shadow-lg hover:shadow-blue-500/50 hover:scale-105 ease-in-out duration-300">Conheça mais</button>
      </div>

      <div class="flex justify-center flex-column mt-52">
        <h3 class="self-center text-xl md:text-3xl font-quemsomos underline underline-offset-8 decoration-indigo-500 decoration-4">Quem somos</h3>
        <p class="self-center w-4/5 text-justify mt-10 text-base md:text-2xl lg:w-2/4 leading-relaxed shadow-2xl p-5 rounded-2xl ">Somos uma empresa de mão de obra terceirizada estamos no mercado á mais de 3 anos com o intuito de facilitar a sua empresa, Hoje atuamos em todos os ramos de logística, higienização de ambientes, escritórios, controle de qualidade de produtos entre outros. Disponibilizando funcionários com a maior rapidez possível. Atendemos empresas de todos portes, Hoje temos a nossa matriz situada em Palhoça - Florianópolis mas atendemos em todo o território Brasileiro.</p>
      </div>

      <div class="flex justify-center flex-column mt-44">
        <h3 class="self-center text-xl md:text-3xl font-quemsomos underline underline-offset-8 decoration-indigo-500 decoration-4">Nossos serviços</h3>
        <img class="w-60 md:w-80 self-center mt-20" src="/img/imgIndex/warehouse.png" alt="" srcset="">
        <ul class="self-center mt-10 shadow-2xl md:text-2xl lg:w-1/4 p-6 rounded-2xl list-outside w-4/5">
          <li>✶ Qualidade de Produto</li>
          <li>✶ Logística</li>
          <li>✶ Almoxarifado</li>
          <li>✶ Higienização</li>
          <li>✶ Manutenção</li>
        </ul>
      </div>

      <div class="flex justify-center flex-column mt-44">
        <h3 class="self-center text-xl md:text-3xl font-quemsomos underline underline-offset-8 decoration-indigo-500 decoration-4">Empresas Afiliadas</h3>
        <div class="flex justify-between flex-column p-10 mt-15 gap-8 shadow-2xl rounded-2xl w-4/5 lg:w-1/4 self-center rounded-2xl">
          <img class="w-40 md:w-60 self-center bg-black p-4 rounded-xl" src="/img/imgIndex/logo-st.svg" alt="">
          <img class="w-60 md:w-80 self-center" src="/img/imgIndex/atacadao-logo.png" alt="">
          <img class="md:w-60 self-center" src="/img/imgIndex/assai.png" alt="">
        </div>
      </div>

      <div class="flex justify-center flex-column mt-44">
        <h3 class="self-center text-xl md:text-3xl font-quemsomos underline underline-offset-8 decoration-indigo-500 decoration-4">Trabalhe Conosco!</h3>
        <img class="w-60 md:w-80 self-center mt-20" src="/img/imgIndex/id-card.png" alt="" srcset="">
        <p class="self-center w-4/5 lg:w-1/4 text-justify mt-10 text-base md:text-2xl leading-relaxed shadow-2xl p-5 rounded-2xl">Venha fazer parte da nossa equipe de colaboradores. Se cadastre-se no nosso site e consulte as vagas disponíveis.</p>
        <button class="self-center bg-indigo-600 md:text-xl p-3 mt-10 w-3/4 lg:w-1/4 rounded-xl text-gray-100 shadow-2xl hover:bg-indigo-500 hover:shadow-lg hover:shadow-blue-500/50 hover:scale-105 ease-in-out duration-300"><router-link tag="button" class="col" to="/curriculo">Cadastre-se</router-link></button>
      </div>

      <div class="flex justify-center flex-column mt-44" id="contatos">
        <h3 class="self-center text-xl md:text-3xl font-quemsomos underline underline-offset-8 decoration-indigo-500 decoration-4">Contatos</h3>
        <img class="w-60 md:w-80 self-center mt-20" src="/img/imgIndex/contacts.png" alt="" srcset="">
        <ul class="self-center mt-10 shadow-2xl md:text-xl  p-6 rounded-2xl list-outside w-4/5 lg:w-1/4">
          <li class="text-bold text-lg md:text-2xl">Matriz</li>
          <li>Rua Nereu Ramos, 646</li>
          <li>Jardim Eldorado - SC</li>
          <li>Cep: 88133-330</li>
          <li class="text-bold text-lg md:text-2xl">Telefones</li>
          <li>Escritório: 48 98463-9667</li>
          <li>Comercial: 48 98861-0246</li>
        </ul>

        <ul class="self-center mt-10 shadow-2xl md:text-xl  p-6 rounded-2xl list-outside w-4/5 lg:w-1/4">
          <li class="text-bold text-lg md:text-2xl">Filial Cuiabá</li>
          <li>Av. Doutor Meirelles, 28</li>
          <li>Jardim dos ipês - MT</li>
          <li>Cep: 78088-605</li>
          <li class="text-bold text-lg md:text-2xl">Telefones</li>
          <li>Escritório: 65 99693-1959</li>
        </ul>
      </div>

      <div class="flex justify-center flex-column mt-44 bg-blue-900 border-top-header shadow-md">
        <h3 class="self-center text-xl md:text-3xl font-quemsomos underline underline-offset-8 decoration-indigo-500 decoration-4 text-gray-50 mt-24">Orçamentos</h3>
        <p class="self-center w-4/5 lg:w-2/4 text-justify mt-10 text-base md:text-2xl leading-relaxed shadow-2xl p-5 rounded-2xl text-gray-50">Você está precisando de colaboradores para sua empresa envie-nos um pedido de orçamento com nome, telefone e descrição do serviço pelo formulário abaixo ou pelo nosso email.</p>
        <p class="self-center w-4/5 lg:w-2/4 text-center text-base md:text-2xl leading-relaxed text-gray-50 mt-3 mb-3">comercial@mobemaodeobra.com.br</p>
        <v-text-field 
        class="w-4/5 lg:w-2/4 self-center rounded-lg text-white pt-4 pb-2 px-2 bg-gray-50 shadow-2xl"
        label="Nome/Empresa"></v-text-field>
        <v-text-field 
        class="w-4/5 lg:w-2/4 self-center rounded-lg mt-6 text-white pt-4 pb-2 px-2 bg-gray-50 shadow-2xl"
        label="Telefone"></v-text-field>
        <v-text-field 
        class="w-4/5 lg:w-2/4 self-center rounded-lg mt-6 text-white pt-4 pb-2 px-2 bg-gray-50 shadow-2xl"
        label="Email"></v-text-field>
        <v-textarea
          solo
          name="input-7-4"
          label="Descrição do serviço"
          class="w-4/5 lg:w-2/4 self-center mt-6 text-white pt-4 pb-2 px-2"
        ></v-textarea>
        <button class="self-center bg-indigo-600 p-3 mt-6 w-3/4 lg:w-1/4 rounded-xl text-gray-100 shadow-2xl hover:bg-indigo-500 hover:shadow-lg hover:shadow-blue-500/50 hover:scale-105 ease-in-out duration-300">Enviar</button>

        <footer class="self-center w-90 text-justify mt-10 text-base leading-relaxed p-5 text-gray-50 font-footer">Todos os direitos reservados - Mobe 2022.</footer>
      </div>

  </div>

</template>
<script>
    // import {mapActions} from 'vuex'
    export default {
      data: () => ({
        
      })
    }
</script>

<style scoped>
    
  @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap');

  *{
      font-family: 'Poppins', sans-serif;
      font-weight: 600;
    }

    .font-header{
      font-weight: 400 !important;
    }

    .border-bottom-header{
      border-bottom-left-radius: 50px;
      border-bottom-right-radius: 50px;
    }

    .margin-negative{
      margin-top: -140px;
    }

    

    .font-title-primary{
      font-weight: 700;
      text-align: center;
    }

    .font-quemsomos{
      font-weight: 800;
    }

    .text-bold{
      font-weight: 700;
    }

    .border-top-header{
      border-top-left-radius: 50px;
      border-top-right-radius: 50px;
    }
    
    .font-footer{
      font-size: 12px;
      font-weight: normal;
    }

    @media screen and (min-width: 768px){
      .margin-negative{
        margin-top: -190px;
      }

      .font-footer{
        font-size: 18px
      }
    }
    
</style>
