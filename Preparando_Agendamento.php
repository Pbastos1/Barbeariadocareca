<?php
include "conexao.php";
// echo "<pre>";
// print_r($_POST['servico']);
// exit();

$dias_da_semana = ['Domingo', 'Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado'];

$data_agendamento = $_POST['data'];  // Data do agendamento enviada pelo formulário
$servico = $_POST['servico'];

// Verificar o dia da semana baseado na data
$dayofweek = date('w', strtotime($data_agendamento));
/* 
 SELECT (selecione)
 (Tabela.coluna) abc.nome, agenda.dia_da_semana, agenda.horario_inicio, agenda.id_agenda, abc.id_usuario

  FROM agenda

  INNER JOIN abc ON abc.id_usuario = agenda.id_usuario
 (juntando coluna id_usuario das duas tabelas na tabela abc)

 WHERE agenda.dia_da_semana = $dayofweek
 ($dayofweek é o dia da semana que a pessoa colocar no cadastro da agenda exemplo: domingo = 0)

 AND agenda.id_agenda NOT IN (SELECT agenda.id_agenda  FROM agendamentos 
 (O NOT IN exclui os id_agenda já agendados para a data específica.)

  SELECT agenda.id_agenda 
  FROM agendamentos 
  (juntando a coluna id_agenda das duas tabelas na tabela agendamentos) INNER JOIN agenda ON agendamentos.id_agenda = agenda.id_agenda

 ('data' vem da pagina de cadastrar agendamentos) WHERE agendamentos.data = '$data_agendamento'
 )
 (aqui ordena por ordem crescente os horarios agendados) ORDER BY agenda.horario_inicio*/

$sql = "
SELECT 
abc.nome, agenda.dia_da_semana, agenda.horario_inicio, agenda.id_agenda, abc.id_usuario 
FROM agenda
INNER JOIN abc ON abc.id_usuario = agenda.id_usuario
WHERE agenda.dia_da_semana = $dayofweek
AND agenda.id_agenda NOT IN (
    SELECT agenda.id_agenda 
    FROM agendamentos 
    INNER JOIN agenda ON agendamentos.id_agenda = agenda.id_agenda
    WHERE agendamentos.data = '$data_agendamento'
)
ORDER BY agenda.horario_inicio

";

// Executa a consulta no banco de dados
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
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
                <th>Barbeiro</th>
                <th>Dia da Semana</th>
                <th>Horarios</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    // Cada linha terá um formulário próprio para enviar os dados
                    echo "
                    <tr>
                            <td>".$row['nome']."</td>
                            <td>".$dias_da_semana[$row['dia_da_semana']]."</td>
                            <td>".$row['horario_inicio']."</td>
                            <td>
                                <input type='hidden' name='id_usuario' value='".$row['id_usuario']."'>
                                <input type='hidden' name='id_agenda' value='".$row['id_agenda']."'>
                                <input type='hidden' name='data' value='$data_agendamento'>
                                <a  href='insert_agendamento.php?id_agenda=".$row['id_agenda']."&data=".$data_agendamento."&id_usuario=".$row['id_usuario']."&id_servico=".$servico."'  ><button type='submit' class='btn btn-primary'>Agendar</button></a>
                            </td>
                    </tr>
                    ";
                }
            } else {
                echo "<tr><td colspan='4'>Não há agendamentos disponíveis para essa data.</td></tr>";
            }
            ?>
            
        </tbody>
    </table>
</div>

</body>
</html>
