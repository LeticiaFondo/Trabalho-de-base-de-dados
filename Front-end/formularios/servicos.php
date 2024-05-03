<?php
    // Verificando se o botão de cadastro foi acionado
    if(isset($_POST["btnCadastrar"])) {
        // Estabelecendo a conexão com o banco de dados
        $conexao = new mysqli("localhost", "root", "", "SHOWOFF");

        // Verificando a conexão
        if ($conexao->connect_errno) {
            echo "Falha na conexão: " . $conexao->connect_error;
        }

        // Capturando os dados do formulário
        $servico = $_POST['servico'];
        $tempo = $_POST['tempo'];
        $preco = $_POST['preco'];

        // Preparando a query de inserção
        $sql = "INSERT INTO servicos (nome_S, tempo, preco) VALUES ('$servico', '$tempo', '$preco')";

        // Executando a query
        if(mysqli_query($conexao, $sql)) {
           // echo "Serviço cadastrado com sucesso.";
        } else {
            echo "Erro ao cadastrar o serviço: " . mysqli_error($conexao);
        }

        // Fechando a conexão
        $conexao->close();
    }
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicos</title>
    <link rel="stylesheet" href="../css/estiloFormularioServicos.css">
</head>

    <style>
        button{
        width: 15%;
        height: 5vh;
        background-color: white;
        border: none;
        border-radius: 5px;
        color: black;
        margin: 10px;
        cursor: pointer;
        font-weight: bold;
        }
     </style>
<body>

<a href="../html/dash.php">
        <button>Dashboard</button>
    </a>
  
    <p>CADASTRO SERVIÇO</p>
    
    <form action="../formularios/servicos.php" method="post">
        <input type="text" id="servico" name="servico" placeholder="Serviço" required>
        <input type="text" id="tempo" name="tempo" placeholder="Tempo (minutos)" required>
        <input type="number" step="any" id="preco" name="preco" placeholder="Preço" required>
        <input type="submit" value="Enviar" name="btnCadastrar">
    </form>
</body>
</html>
