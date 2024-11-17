<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gatito Petshop</title>
    <link rel="icon" href="{{ asset('images/gatito.png') }}" alt="Logo Gatito">

   
    
    <style>
        body {
            position: relative;
            background: url('{{ asset('images/animais.png') }}') no-repeat center center fixed;
            background-size: 105% auto;
            background-color: pink;
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            overflow: hidden;
        }

        /* Adicionando a sobreposição */
        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(26, 17, 28, 0.38); /* Ajuste o tom e a transparência conforme necessário */
            z-index: 1;
        }

        .rodape {
            height: 35px; /* Altura fixa de 10px */
            background-color: #50285b; /* Cor do rodapé */
            width: 100%; /* Largura total da página */
            position: fixed; /* Fixa o rodapé no final da página */
            bottom: 0; /* Alinha ao fundo */
            left: 0; /* Garante que comece na borda esquerda */
            z-index: 2; 
        }

        .header,
        .content-container {
            padding: 200px
            width:200px ;
            position: relative;
            z-index: 2; /* Garante que o texto esteja acima da sobreposição */
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 80%;
            padding: 10px 250%;
            position: fixed;
            top: 0;
            background-color: #50285b; 
            z-index: 1000;
            border-radius: 3%;
          
        }

        .logo img {
            height: 50px; 
            gap: 20px
           
        }

        .menu {
            display: flex;
            gap: 10px;
        }

        .menu a {
            font-weight: bold;
            padding: 10px 20px;
            transition: background-color 0.3s;
            text-decoration: none;
        }

        .menu .login {
            color: #e1a0f9; 
            border: none;
            background: none;
        }

        .menu .register {
            color: #e1a0f9; 
            border: 2px solid #e1a0f9;
            border-radius: 5px;
        }

        .menu .register:hover {
            background-color: #333;
        }

        .content-container {
    display: flex;
    justify-content: center; /* Centraliza o conteúdo horizontalmente */
    align-items: center; /* Centraliza o conteúdo verticalmente */
    max-width: 1200px;
    width: 100%;
    z-index: 10;
    padding: 80px 20px;
    box-sizing: border-box;
    position: relative; /* Permite posicionamento dentro da content-container */
}

.text-content {
    flex-basis: 50%;
    max-width: 800px;
    text-align: center; /* Centraliza o texto dentro do contêiner */
}

/* Ajustando a logo para centralizar dentro da content-container */
.logo-center {
    width: 200px; /* Ajuste o tamanho conforme necessário */
    opacity: 1; /* Ajuste a transparência */
    display: block; /* Para remover qualquer alinhamento estranho */
    margin: 0 auto; /* Centraliza a imagem */
}

                
    </style>
</head>

<body>
    <div class="header">
        <div class="logo">
            <img src="{{ asset('images/gatito.png') }}" alt="Logo Gatito">
        </div>
        <div class="menu">
            <a href="{{ route('login') }}" class="login">Login</a>
            <a href="{{ route('register') }}" class="register">Register</a>
        </div>
    </div>
    <div class="content-container">
        <div class="text-content">
            
    

                    <!-- Adicionando fonte Oswald do Google Fonts -->
            <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@700&display=swap" rel="stylesheet">
            <div class="text-content" style="text-align: center;">

                <h1 style="font-size: 80px; font-weight: bolder; color: #fff; font-family: 'Oswald', sans-serif; letter-spacing: 4px;">
                    Gatito Petshop
                </h1>
            
                <img src="{{ asset('images/gatito.png') }}" alt="Logo Gatito" class="logo-center">
            
            </div>
            
            <p style="font-size: 1.2rem; color: #ffffff; text-align: justify; font-weight: 900" >
                No <strong style="font-weight:900; color: #3e0056">Gatito Petshop</strong> garantimos que todos os produtos essenciais para seu pet estejam sempre disponíveis. <br>
                Com um sistema de <strong style="font-weight:900; color: #3e0056">gestão de estoque</strong>, monitoramos itens como rações, brinquedos e acessórios, para oferecer um atendimento rápido e eficiente. <br>
                <br> 
                <p1 style="font-weight:900">Nossa prioridade é a qualidade e a agilidade, mantendo o estoque sempre atualizado para o bem-estar do seu animal.</p1>
            </p>
            
            
            
        </div>
      </div>
    <!--<div class="navbar-brand">
        <a href="/">
            <img src="{{ asset('images/gatito.png') }}" alt="Logo Gatito" class="logo-center">
        </a>
    </div>  -->

</body>

<footer class="rodape"></footer>

</html>
