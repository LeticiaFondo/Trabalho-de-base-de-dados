<?php
// Incluir arquivo de conexão com o banco de dados
include(__DIR__ . "/../conexao.php");

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter os valores dos campos do formulário
    $nome = $_POST['nome'];
    $apelido = $_POST['apelido'];
    $contacto = $_POST['contacto'];
    $password = $_POST['password'];

    // Inserir um novo registro de gerente no banco de dados
    // $sql_insert = "INSERT INTO gerente (Nome_G, Apelido_G, Contacto_G) VALUES ('$nome', '$apelido', '$contacto')";
    $sql_insert = "INSERT INTO gerente (Nome_G, Apelido_G, Contacto_G, Senha_G) VALUES ('$nome', '$apelido', '$contacto', md5('$password'))";

    if ($conn->query($sql_insert) === TRUE) {
        header('location: index.php ');
    } else {
        echo "Erro ao criar novo gerente: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Gerente</title>

    <link rel="stylesheet" href="../style.css">

    <style>
        h1 {
            color: #d2d2d2
        }

        .edit {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: flex;
            flex-direction: column;
            gap: 1em;
        }

        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>

</head>

<body>
    <form action="" method="post" autocomplete="on" class="edit">
        <h1>Novo Gerente</h1>
        <div class="two-forms">
            <div class="input-box">
                <input type="text" class="input-field" id="nome" placeholder="Firstname" name="nome">
                <i class="bx bx-user"></i>
            </div>
            <div class="input-box">
                <input type="text" class="input-field" id="apelido" placeholder="Lastname" name="apelido">
                <i class="bx bx-user"></i>
            </div>
        </div>
        <div class="input-box">
            <input type="number" class="input-field" id="contacto" placeholder="Contacto" name="contacto">
            <i class="bx">
                <ion-icon name="call-outline"></ion-icon>
            </i>
        </div>
        <div class="input-box">
            <input type="password" class="input-field" id="password" placeholder="Password" name="password">
            <i class="bx bx-lock-alt"></i>
        </div>
        <div class="input-box">
            <input type="submit" name="criar" class="submit" value="Criar Novo Gerente">
        </div>

    </form>

</body>

</html>
