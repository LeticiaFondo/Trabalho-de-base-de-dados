<?php
  if(isset($_POST["btnEntrar"]))
  {

    //include_once("./Front-end/html/dashboard.php");
    $conexao= new mysqli("Localhost","root","","SHOWOFF");
    if ($conexao->connect_errno) {
        echo "Falha na conexão: " . $conexao->connect_error;
    }

// Restante do seu código aqui...


    $nome = $_POST["campoNome"];
    $senha = $_POST["campoSenha"];

     if($nome==""||$senha=="")
     {
        echo("campos vazios");
     }else{
        $query = "SELECT * FROM gerente WHERE Contacto_G = ? AND Senha_G = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bind_param("ss", $nome, $senha);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            // Há registros correspondentes
            echo "Registros encontrados";
            header('location: dashboard.php');
            // Faça o que precisar com os registros aqui
        } else {
            // Não há registros correspondentes
            echo "Nenhum registro encontrado";
        }
     }

  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/estiloLogin.css">
</head>
<body>
    <div class="divCentralImagem">
       <img src="../imagens/cortedecabelo.png">
    </div>

    <p id="lblShowoff">SHOW-OFF</p>
    <div class="containerFormulario">
        <form class="containerFormulario1" action="index.php" method="post">
              <input type="text" placeholder="Introduza o seu Contacto" class="inputsLogin" id="idInputNome" name="campoNome">
              <input type="text" placeholder="Introduza a sua Senha" class="inputsLogin" id="idInputSenha" name="campoSenha">
              <p id="mensagem_erro"></p>
             <button type="submit" id="btnEntrar"   value="btnEntrar" name="btnEntrar">Entrar</button>
        </form>
        
    </div>

    

    <script src="../js/jsLogin.js"></script>
</body>
</html>
 