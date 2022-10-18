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
            /* margin-left: 15px;
            margin-top: 9px; */
            width: 100%;
            height: 100%;
        }
    </style>
</head>

<body>
   <img src="{{$user->pessoal[0]->psfoto}}" class="img-perfil" alt="" sizes="" srcset="">

</body>
</html>