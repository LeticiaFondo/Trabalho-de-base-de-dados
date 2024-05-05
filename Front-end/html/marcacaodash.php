<?php

  $conexao = new mysqli("localhost", "root", "", "SHOWOFF");
    if ($conexao->connect_errno) {
    echo "Falha na conexão: " . $conexao->connect_error;
    }

    $consultaMarcaoes = "SELECT * FROM marcacao order by Data_M desc "; // Corrigindo a consulta SQL
    $result = $conexao->query($consultaMarcaoes);

    $totalMarcacoesQuery = "SELECT COUNT(*) AS total FROM marcacao";
    $resultadoTotalMarcacoes = $conexao->query($totalMarcacoesQuery);
    
    // Verifica se a consulta foi bem-sucedida
    if ($resultadoTotalMarcacoes) {
        // Extrai o total de marcações da consulta
        $totalMarcacoes = $resultadoTotalMarcacoes->fetch_assoc()['total'];
    } else {
        // Em caso de falha na consulta, define o total como 0
        $totalMarcacoes = 0;
    }

    $dataAtual = date("Y-m-d");

    // Consulta SQL para obter o total de marcações do dia atual
    $totalMarcacoesHojeQuery = "SELECT COUNT(*) AS total FROM marcacao WHERE  Data_M = '$dataAtual'";
    $resultadoTotalMarcacoesHoje = $conexao->query($totalMarcacoesHojeQuery);

    // Verifica se a consulta foi bem-sucedida
    if ($resultadoTotalMarcacoesHoje) {
        // Extrai o total de marcações do dia atual da consulta
        $totalMarcacoesHoje = $resultadoTotalMarcacoesHoje->fetch_assoc()['total'];
    } else {
        // Em caso de falha na consulta, define o total como 0
        $totalMarcacoesHoje = 0;
    }

    

?>



 



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marcação</title>
    <link rel="stylesheet" href="../css/estiloMarcacao.css">
</head>

    <style>

        tr:hover {
            background-color: green;
        }

        td{
            color:white;
            font-weight: bold;
        }
    </style>
<body>
    <a href="../html/dash.php">
        <button>Dashboard</button>
    </a>

    <h1>MARCAÇÕES</h1>

   
        <div class="containerDashShows">
            <div class="containerDashInformation">
                
            <div class="secundaryDashInformation">
                <p>TOTAL MARCAÇÕES</p>
            </div>
                  <h2><?php echo $totalMarcacoes; ?></h2>
              
            </div>

            <div class="containerDashInformation">
                
                <div class="secundaryDashInformation">
                    <p>HOJE</p>
                </div>
                <h2><?php echo $totalMarcacoesHoje; ?></h2>
            </div>

          


        </div>
   
        <div class="tabela-Marcacação">
            <table>
                <thead>
                    <tr>
                        <th>Contacto</th>
                        <th>Nome</th>
                        <th>Serviço</th>
                        <th>Barbeiro</th>
                        <th>Data Marcação</th>
                        <th>Hora Marcação</th>
                        <th>Pagamento</th>
                        <th>Valor</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                        while($userData=mysqli_fetch_assoc($result))
                        {
                            echo "<tr>";
                            echo "<td>".$userData['Contacto_C']."</td>";
                            echo "<td>".$userData['Nome_C']."</td>";
                            echo "<td>".$userData['Servico']."</td>";
                            echo "<td>".$userData['Nome_B']."</td>";
                            echo "<td>".$userData['Data_M']."</td>";
                            echo "<td>".$userData['Horas_M']."</td>";
                            echo "<td>".$userData['C_Movel']."</td>";
                            echo "<td>".$userData['Valor']."</td>";
                        
                        
                            echo "</tr>";
                        }

                    ?>
                
                 
                </tbody>
            </table>
        </div>


</body>
</html>