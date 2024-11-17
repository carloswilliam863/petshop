<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gatito Petshop</title>
    <link rel="icon" href={{ asset('images/gatito.png') }} alt="Logo Gatito">

    <style>
        body {
            background-color: #a250bf; 
            color: #ffffff;
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            position: relative;
            overflow: hidden;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            max-width: 1200px;
            padding: 10px 20px;
            position: fixed;
            top: 70px;
            background-color: #50285b; 
            z-index: 1000;
            border-radius: 3%
        }

        .logo {
            display: flex;
            align-items: center;
        }
        <img src="{{ asset('images/gatito.png') }}" alt="Logo Gatito">


       
        .logo img {
            height: 1px; 
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
            padding: 10px 0;
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
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            width: 100%;
            z-index: 10;
            padding: 0 20px;
            box-sizing: border-box;
        }

        .text-content {
            flex-basis: 30%;
            max-width: 500px;
        }


        /* Fundo normal */
         .angled-background {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 5%;
            background-color: #50285b; Purple 
            z-index: 0;
        }

        /* Condição para dispositivos móveis */
        @media (max-width: 200px) {
            .download-link {
                display: block;
                background-color: #6B46C1; /* Purple */
                color: #fff;
                padding: 10px 20px;
                text-align:right;
                border-radius: 5px;
                margin-top: 20px;
                text-decoration: none;
                font-size: 1.2rem;
            }

            .content-container {
                display: block;
                /* Altera o layout para empilhar os itens no celular */
                padding: 20px;
            }

            .text-content,
            .image-placeholder {
                flex-basis: 50%;
                max-width: 50%;
                margin-bottom: 10px;
            }

            .image-placeholder img {
                height: 10px;
            }
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
            <h1 style="font-size: 45px; font-weight: bold; color:#50285b ">Gatito Petshop cuidados que seu pet merece.</h1>
            <p style="font-size: 1.2rem; color: #ffffff;">
                Oferecemos os melhores produtos e serviços para o bem-estar do seu animal de estimação. <br>
            </p>
        </div>
        <div class="image-placeholder">
            <img src="{{ asset('images/cachorro.png') }}" alt="Pet Shop">
        </div>
    </div>

    <!-- Fundo normal -->
    <div class="angled-background"></div>

    <!-- Link para baixar o app em dispositivos móveis -->
    <a href="https://www.example.com/download" class="download-link" style="display: none;">
        Baixe nosso app agora!
    </a>

    <script>
        // Exibir o link para baixar o app apenas em dispositivos móveis
        if (window.innerWidth <= 768) {
            document.querySelector('.download-link').style.display = 'block';
        }
    </script>
</body>

</html>
