<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Currículo</title>

    <style>
        *{
            margin: 0;
            padding: 0;
            font-family: my-font-regular, sans-serif;
        }

        @font-face {
            font-family: my-font-regular;
            src: url(/public/font/Poppins-Regular.ttf);
        }

        @font-face {
            font-family: my-font-bold;
            src: url(/public/font/Poppins-Bold.ttf);
        }

        header{
            background-color: rgb(11, 2, 66);
            padding: 20px;
            color: white;
            font-weight: bold;
            font-size: 1.8rem;
        }

        .titulo-profissional{
            font-weight: 400 !important;
            font-size: 1.1rem !important;
            margin-top: 5px;
        }

        .perfil{     
            padding: 15px;
        }

        .perfil p {
            color: rgb(54, 54, 54);
            padding: 5px;
            font-size: 0.8rem;
        }

        .title-perfil{
            font-size: 1.1rem !important;
            font-weight: 700;
            margin-bottom: 10px;
            border-bottom: 2px solid rgb(168, 168, 168);
        }

        .div-perfil{
            display: flex;
         }

        .div-img-perfil{
            
        }

        .div-conteudo-perfil{
            margin-left: 180px;
            margin-top: -200px;
        }

        .div-conteudo-perfil p {
            font-size: 0.8rem;
        }

        .img-perfil{
            margin-left: 15px;
            margin-top: 9px;
            width: 130px;
            height: 140px;
        }
    </style>
</head>

<body>
    <header>
        <p>{{strtoupper($user->name)}}</p>
        <p class="titulo-profissional">{{strtoupper($user->pessoal[0]->academico[0]->ascurso)}}</p>
    </header>

    <div class="perfil">
        <h3 class="title-perfil">Perfil</h3>
        <div class="">
            <div class="div-img-perfil">
                @if($user->pessoal[0]->psfoto)
                <img class="img-perfil" src="{{$user->pessoal[0]->psfoto}}" alt="">
                @else
                <img class="img-perfil" src="https://i.pinimg.com/236x/31/4f/2a/314f2a1f891f259d70d75b603616827a.jpg" alt="">
                @endif
            </div>
            <div class="div-conteudo-perfil">
                <p><b>Telefone:</b> {{$user->pessoal[0]->pstelefone}}</p>
                <p><b>E-mail:</b> {{$user->email}}</p>
                <p><b>Data de nascimento:</b> {{ date('d/m/Y',strtotime($user->pessoal[0]->psnascimento)) }}</p>
                <p><b>Bairro:</b> {{$user->pessoal[0]->endereco[0]->esbairro}}</p>
                <p><b>Cidade:</b> {{$user->pessoal[0]->endereco[0]->esmunicipio}}</p>
                <p><b>Estado:</b> {{$user->pessoal[0]->endereco[0]->esuf}}</p>
            </div>
        </div>
    </div>

    <div class="perfil">
        <h3 class="title-perfil"> Dados Acadêmicos</h3>
        <div>
            <p><b>Local:</b> {{strtoupper($user->pessoal[0]->academico[0]->eslocal)}}</p>
            <p><b>Curso:</b> {{strtoupper($user->pessoal[0]->academico[0]->escurso)}}</p>
            <p><b>Data inicio:</b> {{ date('d/m/Y',strtotime($user->pessoal[0]->academico[0]->asdatainicio)) }} <b>Data final:</b> {{ date('d/m/Y',strtotime($user->pessoal[0]->academico[0]->asdataconclusao)) }}</p>
        </div>
    </div>

    <div class="perfil">
        <h3 class="title-perfil">Dados Profissionais</h3>
        <div>
            <p><b>Empresa:</b> {{strtoupper($user->pessoal[0]->academico[0]->profissional[0]->psempresa)}}</p>
            <p><b>Cargo:</b> {{strtoupper($user->pessoal[0]->academico[0]->profissional[0]->pscargo)}}</p>
            <p><b>Data inicio:</b> {{ date('d/m/Y',strtotime($user->pessoal[0]->academico[0]->profissional[0]->psdatainicio)) }} <b>Data final:</b> {{ date('d/m/Y',strtotime($user->pessoal[0]->academico[0]->profissional[0]->psdatafinal)) }}</p>
            <p><b>Descrição da Função:</b> {{$user->pessoal[0]->academico[0]->profissional[0]->psexperiencia}}</p>
        </div>
    </div>

    <div class="perfil">
        <h3 class="title-perfil">Idiomas</h3>
        <div>
            <p><b>Local:</b> {{strtoupper($user->pessoal[0]->academico[0]->local[0]->islocal)}}</p>
            <p><b>Cargo:</b> {{strtoupper($user->pessoal[0]->academico[0]->local[0]->isidioma)}}</p>
            <p><b>Nível:</b> {{$user->pessoal[0]->academico[0]->local[0]->isnivel}}</p>
            <p><b>Data inicio:</b> {{ date('d/m/Y',strtotime($user->pessoal[0]->academico[0]->local[0]->isdatainicio)) }} <b>Data final:</b> {{ date('d/m/Y',strtotime($user->pessoal[0]->academico[0]->local[0]->isdatafinal)) }}</p>
        </div>
    </div>

    <div class="perfil">
        <h3 class="title-perfil">Habilidades</h3>
        <div>
            <p>{{$user->pessoal[0]->academico[0]->habilidade[0]->hshabilidade}}</p>
        </div>
    </div>

</body>
</html>