<?php
    $conexao = new mysqli("localhost", "root", "", "SHOWOFF");
    if ($conexao->connect_errno) {
    echo "Falha na conexão: " . $conexao->connect_error;
    }

    if(isset($_POST["nome"], $_POST["apelido"], $_POST["tipo"]))
    {
        $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
        $apelido = mysqli_real_escape_string($conexao, $_POST['apelido']);
        $tipo = mysqli_real_escape_string($conexao, $_POST['tipo']);

    // Instrução SQL para inserir os dados no banco de dados
    $sql = "INSERT INTO funcionarios (Nome_F, Apelido_F, tipo_F) VALUES ('$nome', '$apelido', '$tipo')";

    // Executar a instrução SQL
    if ($conexao->query($sql) === TRUE) {
        //echo "Novo registro inserido com sucesso!";
    } else {
        echo "Erro ao inserir registro: " . $conexao->error;
    }

    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcionarios</title>
     <link rel="stylesheet" href="../css/estiloFormularioFuncionarios.css">
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
</head>
<body>

    <a href="../html/dash.php">
        <button>Dashboard</button>
    </a>

    <p>CADASTRO FUNCIONÁRIO</p>
    <form action="../formularios/funcionarios.php" method="post">
        <input type="text" id="nome" name="nome" placeholder="Nome" required>
        <input type="text" id="apelido" name="apelido" placeholder="Apelido" required>

        <select id="tipo" name="tipo" required>
            <option value="barbeiro">Barbeiro</option>
            <option value="cabelereiro">Cabelereiro</option>
        </select>
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>
