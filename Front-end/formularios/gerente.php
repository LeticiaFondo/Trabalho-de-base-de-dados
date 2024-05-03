<?php

 
    $conexao = new mysqli("localhost", "root", "", "SHOWOFF");
    if ($conexao->connect_errno) {
    echo "Falha na conexão: " . $conexao->connect_error;
    }

    if(isset($_POST["btnCadastrarGerente"]))
    {
      
        if(!empty($_POST["nome"]) && !empty($_POST["apelido"]) && !empty($_POST["contacto"]) && !empty($_POST["senha"]))
        {
            $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
            $apelido = mysqli_real_escape_string($conexao, $_POST['apelido']);
            $contacto = mysqli_real_escape_string($conexao, $_POST['contacto']);
            $senha = mysqli_real_escape_string($conexao, $_POST['senha']);

            $sql = "INSERT INTO gerente (Nome_G, Apelido_G, Contacto_G, Senha_G) VALUES ('$nome', '$apelido', '$contacto', '$senha')";

            if(mysqli_query($conexao, $sql)) {
               // echo "Novo gerente cadastrado com sucesso.";
               
            } else {
                //echo "ERRO: Não foi possível executar $sql. " . mysqli_error($conexao);
            }
        }

    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerente</title>
    <link rel="stylesheet" href="../css/estiloFormularioGerente.css">
    <style>
        button{
        width: 15%;
        height: 5vh;
        background-color: white;
        border: none;
        border-radius: 5px;
        color: black;
        margin: 10px;
        font-weight: bold;
        cursor: pointer;
        }
 

        input[type="submit"] {
        background-color: #1F1CB3;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        }
    </style>
</head>
<body>
    <a href="../html/dash.php">
        <button>Dashboard</button>
    </a>
    
    <p>CADASTRO GERENTE</p>

<form action="./gerente.php" method="post">
    <input type="text" id="nome" name="nome" placeholder="Nome" required>
    <input type="text" id="apelido" name="apelido" placeholder="Apelido" required>
    <input type="text" id="contacto" name="contacto" placeholder="Contacto" required>
    <input type="password" id="senha" name="senha" placeholder="Senha" required>
    <input type="submit" value="Cadastrar" name="btnCadastrarGerente">
</form>

</body>
</html>
