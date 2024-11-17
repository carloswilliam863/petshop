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
            background-size: cover;
            color: #ffffff;
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
            background-color: rgba(80, 40, 90, 0.8); /* Ajuste o tom roxo e a transparência conforme necessário */
            z-index: 1;
        }

        .header,
        .content-container {
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
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            width: 100%;
            z-index: 10;
            padding: 80px 20px;
            box-sizing: border-box;
        }

        .text-content {
            flex-basis: 50%;
            max-width: 800px;
        }


        @media (max-width: 768px) {
            .content-container {
                flex-direction: column;
                text-align: center;
                padding: 20px;
            }

            .text-content {
                max-width: 100%;
            }
        }

        .logo-transparent {
            width: 600px; /* Ajuste o tamanho conforme necessário */
            opacity: 1; /* Ajuste a transparência, 1 é totalmente opaco e 0 é totalmente transparente */
            position: absolute; /* Para posicionar sobre o navbar */
            top: 300px; /* Ajuste a posição conforme necessário */
            left: 1000px; /* Ajuste a posição conforme necessário */
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
            <h1 style="font-size: 65px; font-weight: bold; color: #ffffff;">Gatito Petshop cuidados que seu pet merece.</h1>
            <p style="font-size: 1.2rem; color: #ffffff;">
                Oferecemos os melhores produtos e serviços <br> para o bem-estar do seu animal de estimação.
            </p>
        </div>
    </div>
    <div class="navbar-brand">
        <a href="/">
            <img src="{{ asset('images/gatito.png') }}" alt="Logo Gatito" class="logo-transparent">
        </a>
    </div>

    
</body>

</html>
