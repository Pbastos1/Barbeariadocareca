<?php
include "conexao.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cadastro da Agenda do Barbeiro</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .container {
            width: 40%;
            margin: 50px auto;
            padding: 20px;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            color: black;
            backdrop-filter: blur(30px);
        }
        
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            height: 100vh;
            background-size: cover;
            background-position: center;
            color: #ffffff;
            background-image: linear-gradient(170deg, rgb(0, 0, 0), gray);
            display:flex;
            align-items:center;
        }
        
        h2, label {
            text-align: center;
            color: white;
        }
    </style>
</head>

<body>

    <div class="container mt-3">
        <h2>Cadastro da Agenda do Barbeiro</h2>
        <form action="DadosAgenda.php" method="post">
            <div class="mb-3 mt-3">
                <label class="form-check-label">
                    Barbeiro
                </label>
                <select class="form-select" name="id_usuario">
                    <option>Selecione um barbeiro</option>
                    <?php
                    $sql = 'SELECT * FROM abc WHERE id_grupo = 2';
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='".$row['id_usuario']."'>".$row['nome']."</option>";
                        }
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3 mt-3">
                <label class="form-check-label">
                    Dia da semana
                </label>
                <select class="form-select" name="dia_da_semana">
                    <option>Selecione o dia da semana</option>
                    <option value="0">Domingo</option>
                    <option value="1">Segunda-feira</option>
                    <option value="2">Terça-feira</option>
                    <option value="3">Quarta-feira</option>
                    <option value="4">Quinta-feira</option>
                    <option value="5">Sexta-feira</option>
                    <option value="6">Sábado</option>
                </select>
            </div>

            <div class="mb-3 mt-3">
                <label for="horario_inicio">Horário início:</label>
                <input type="time" class="form-control" name="horario_inicio">
            </div>

            <div class="mb-3 mt-3">
                <label for="horario_saida_intervalo">Horário saída intervalo:</label>
                <input type="time" class="form-control" name="horario_saida_intervalo">
            </div>

            <div class="mb-3 mt-3">
                <label for="horario_volta_intervalo">Horário volta intervalo:</label>
                <input type="time" class="form-control" name="horario_volta_intervalo">
            </div>

            <div class="mb-3 mt-3">
                <label for="horario_fim">Horário fim:</label>
                <input type="time" class="form-control" name="horario_fim">
            </div>

            <div class="d-flex justify-content-between">
                <a href="index.php" class="btn btn-primary">Voltar</a>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>
    </div>

</body>

</html>
