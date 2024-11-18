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
            background: url('{{ asset('images/welcome.png') }}') no-repeat center center fixed;
            background-size: 105% auto;
            background-color: #272829;
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            overflow: hidden;
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
            padding: 200px;
            position: relative;
            z-index: 2; /* Garante que o texto esteja acima da sobreposição */
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 80%;
            padding: 18px 250%;
            position: fixed;
            top: 0px;
            background-color: #50285b; 
            z-index: 1000;
          
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

        .menu .login:hover {
            background-color: #333;
            border-radius: 10%;
        }

        .content-container {
    display: block; /* Garante um layout de bloco */
   text-align: justify; /* Garante que o texto esteja alinhado à esquerda */
    position: relative; /* Permite o uso de `left` */
   margin-right: 930px;
  
}

.text-content {
    flex-basis: 55%;
    max-width: 700px;
    text-align: left; /* Centraliza o texto dentro do contêiner */
    left: 0px;
}

.coluna {
            position: fixed; /* Fixa a coluna no lado esquerdo da tela */
            top: 0; /* Alinha ao topo */
            left: 0; /* Alinha à esquerda */
            height: 100vh; /* Altura total da janela */
            width: 25px; /* Largura fixa de 15px */
            background-color: #50285b; /* Cor de fundo */
            z-index: 1000; /* Garante que a coluna esteja sobre outros elementos */
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

                <h1 style="font-size: 60px; font-weight: bolder; color: #eee; font-family: 'Oswald', sans-serif; letter-spacing: 4px">
                    Sejam Bem-Vindos!
                </h1>
             
                
               
            
            </div>
            
            <p style="font-size: 1.2rem; color: #fff; text-align: justify; font-weight: 900" >
                No <strong style="font-weight:900; color: #e1a0f9; background-color:#3e0056;border-radius:10%; padding:2px;">Gatito Petshop</strong> garantimos que todos os produtos essenciais para seu pet estejam sempre disponíveis. 
                Com um sistema de <strong style="font-weight:900; color: #e1a0f9;background-color:#3e0056;border-radius:10%; padding:2px;">gestão de estoque</strong>, monitoramos itens como rações, brinquedos e acessórios, para oferecer um atendimento rápido e eficiente. <br>
                <br> 
                <p1 style="font-weight:900">Nossa prioridade é a qualidade e a agilidade, mantendo o estoque sempre atualizado para o bem-estar do seu animal.</p1>
            </p>
            
            
            
        </div>
      </div>

</body>

<footer class="rodape"></footer>

<footer class ="coluna"></footer>

</html>