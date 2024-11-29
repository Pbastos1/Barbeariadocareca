<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - Barbearia do Careca</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            background: linear-gradient(170deg, #1e1e1e, #ffffff);
            color: #ffffff;
            min-height: 100vh;
        }

        nav {
            background-color: #111;
            padding: 10px 0;
            border-bottom: 1px solid #333;
        }

        nav .container {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        nav img {
            height: 60px;
        }

        nav .brand {
            font-size: 1.5rem;
            font-weight: 700;
            margin-left: 10px;
            color: #fff;
        }

        .cards {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
            margin-top: 50px;
        }

        .card {
            background-color: #282c34;
            color: white;
            max-width: 350px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
        }

        .card-header {
            background-color: #444;
            text-align: center;
            font-weight: bold;
            padding: 10px 0;
        }

        .card-body {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        .card img {
            max-height: 200px;
            object-fit: cover;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        .card-title {
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .btn {
            text-decoration: none;
            background-color: #00aaff;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #008ecc;
        }

        footer {
            margin-top: 50px;
            padding: 10px 0;
            background-color: #111;
            text-align: center;
            color: #aaa;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

<nav>
    <div class="container">
        <div class="brand">Barbearia do Careca</div>
        <img src="imagens/logu.webp" alt="Logo">
    </div>
</nav>

<div class="container">
    <div class="cards">
        <div class="card">
            <div class="card-header">Crie uma conta</div>
            <a href="Cadastrar_Usuarios.php" class="btn">
                <div class="card-body">
                    <img src="imagens/registro.png" alt="Registro">
                    <h5 class="card-title">Registre-se</h5>
                </div>
            </a>
        </div>
        <div class="card">
            <div class="card-header">Agendar</div>
            <a href="Cadastrar_Agenda.php" class="btn">
                <div class="card-body">
                    <img src="imagens/agenda.png" alt="Agenda">
                    <h5 class="card-title">Nossos barbeiros são de qualidade!</h5>
                </div>
            </a>
        </div>
        <div class="card">
            <div class="card-header">Criar agendamento</div>
            <a href="Cadastrar_Agendamento.php" class="btn">
                <div class="card-body">
                    <img src="imagens/R.png" alt="Admin">
                    <h5 class="card-title">(Somente para admins)</h5>
                </div>
            </a>
        </div>
    </div>
</div>

<footer>
    &copy; 2024 Barbearia do Careca. Todos os direitos reservados.
</footer>

</body>
</html>
