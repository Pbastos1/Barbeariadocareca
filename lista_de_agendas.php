<?php
include "conexao.php";

// Consulta para buscar os agendamentos
$sql = "SELECT * FROM agenda";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Agendamentos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #f0f4f8;
            padding: 40px 20px;
        }
        .container {
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }
        h1 {
            color: #343a40;
            margin-bottom: 30px;
            font-weight: 300;
        }
        table {
            margin-top: 20px;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        td {
            font-size: 16px;
        }
        .no-data {
            font-style: italic;
            color: #6c757d;
        }
        .botao{
            display: flex;
            justify-content:center;
        }
    </style>
</head>
<body>

<div class="container">
    <h1 class="text-center"><i class="fas fa-calendar-alt"></i> Lista de Agendamentos</h1>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuário</th>
                <th>Dia da Semana</th>
                <th>Horário de Início</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id_agenda']); ?></td>
                        <td><?php echo htmlspecialchars($row['id_usuario']); ?></td>
                        <td><?php echo htmlspecialchars($row['dia_da_semana']); ?></td>
                        <td><?php echo htmlspecialchars($row['horario_inicio']); ?></td>
                    </tr>
                    
                <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center no-data">Nenhum agendamento encontrado.</td>
                    </tr>
            <?php endif; ?>
            
        </tbody>
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>
