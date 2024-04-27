<?php
// Incluir arquivo de conexão com o banco de dados
include(__DIR__ . "/../conexao.php");

// Verificar se o ID do gerente a ser editado foi enviado via GET
if (isset($_GET['editar']) && !empty($_GET['editar'])) {
    $id_gerente = $_GET['editar'];

    // Consultar o banco de dados para obter os dados do gerente com o ID fornecido
    $sql = "SELECT * FROM gerente WHERE id_gerente = $id_gerente";
    $result = $conn->query($sql);

    // Verificar se o gerente existe
    if ($result->num_rows > 0) {
        $gerente = $result->fetch_assoc();

        // Se o formulário foi enviado, processar os dados
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obter os novos valores dos campos do formulário
            $nome = $_POST['nome'];
            $apelido = $_POST['apelido'];
            $contacto = $_POST['contacto'];
            // $password = $_POST['password'];

            // Atualizar os dados do gerente no banco de dados
            $sql_update = "UPDATE gerente SET Nome_G = '$nome', Apelido_G = '$apelido', Contacto_G = '$contacto' WHERE id_gerente = $id_gerente";
            // $sql_update = "UPDATE gerente SET Nome_G = '$nome', Apelido_G = '$apelido', Contacto_G = '$contacto', Senha_G = md5('$password') WHERE id_gerente = $id_gerente";

            if ($conn->query($sql_update) === TRUE) {
                header('location: index.php ');
            } else {
                echo "Erro ao atualizar dados: " . $conn->error;
            }
        }
    } else {
        echo "Gerente não encontrado.";
    }
} else {
    echo "ID de gerente inválido.";
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Gerente</title>

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
        <h1>Editar Gerente</h1>
        <div class="two-forms">
            <div class="input-box">
                <input type="text" class="input-field" id="nome" placeholder="Firstname" name="nome" value="<?php echo $gerente['Nome_G']; ?>">
                <i class="bx bx-user"></i>
            </div>
            <div class="input-box">
                <input type="text" class="input-field" id="apelido" placeholder="Lastname" name="apelido" value="<?php echo $gerente['Apelido_G']; ?>">
                <i class="bx bx-user"></i>
            </div>
        </div>
        <div class="input-box">
            <input type="number" class="input-field" id="contacto" placeholder="Contacto" name="contacto" value="<?php echo $gerente['Contacto_G']; ?>">
            <i class="bx">
                <ion-icon name="call-outline"></ion-icon>
            </i>
        </div>
        <!-- <div class="input-box">
            <input type="password" class="input-field" id="password" placeholder="Password" name="password">
            <i class="bx bx-lock-alt"></i>
        </div> -->
        <div class="input-box">
            <input type="submit" name="ediar" class="submit" value="Salvar Alterações">
        </div>

    </form>

</body>

</html>