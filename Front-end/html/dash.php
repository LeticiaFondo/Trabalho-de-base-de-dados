
    <?php

    $conexao = new mysqli("localhost", "root", "", "SHOWOFF");
    if ($conexao->connect_errno) {
    echo "Falha na conexão: " . $conexao->connect_error;
    }

    $sql = "SELECT * FROM gerente order by id_gerente "; // Corrigindo a consulta SQL
    $result = $conexao->query($sql);

   
    if(isset($_POST["btnAlterarGerente"]))
    {
 
        
        if(!empty($_POST["idGerente"]) && !empty($_POST["inputNome"]) && !empty($_POST["inputApelido"]) && !empty($_POST["inputContacto"]) && !empty($_POST["inputSenha"]))
        {
            //Evitar o sql injection
            $idGerente = mysqli_real_escape_string($conexao, $_POST['idGerente']);
            $nome = mysqli_real_escape_string($conexao, $_POST['inputNome']);
            $apelido = mysqli_real_escape_string($conexao, $_POST['inputApelido']);
            $contacto = mysqli_real_escape_string($conexao, $_POST['inputContacto']);
            $senha = mysqli_real_escape_string($conexao, $_POST['inputSenha']);

            $sql = "UPDATE gerente SET Nome_G='$nome', Apelido_G='$apelido', Contacto_G='$contacto', Senha_G='$senha' WHERE id_gerente=$idGerente";

            if(mysqli_query($conexao, $sql)){
               
                  // Certifique-se de sair do script para evitar que o código seja executado após o redirecionamento
                  header('Location: dash.php');
            } else{
               // echo "ERRO: Não foi possível executar $sql. " . mysqli_error($conexao);
            }
    
         
           
        }   
       

    }

   
        if(isset($_POST["btnApagarGerente"])) {
            if(isset($_POST['idGerente']))
            {
                $idGerente = mysqli_real_escape_string($conexao, $_POST['idGerente']);

                 // Query SQL para excluir o gerente com o ID fornecido
                 $sql = "DELETE FROM gerente WHERE id_gerente = '$idGerente'";

                  // Executar a query de exclusão
                 if(mysqli_query($conexao, $sql))
                {
                    //echo "Gerente excluído com sucesso.";
                } else {
                    //echo "ERRO: Não foi possível excluir o gerente. " . mysqli_error($conexao);
                }

                header('location: dash.php');

            }
        }
 



    //----------------------CLIENTE-------------------

    $consultaClientes = "SELECT * FROM clientes order by Nome_C";
    $resultClientes = $conexao->query($consultaClientes);

    if(isset($_POST["btnApagarClientes"]))
    {
       
        if(isset($_POST['id_Clientes']))
        {

            $idClientes = mysqli_real_escape_string($conexao, $_POST['id_Clientes']);

            // Query SQL para excluir o gerente com o ID fornecido
            $sql = "DELETE FROM clientes WHERE id_Clientes = '$idClientes'";

             // Executar a query de exclusão
            if(mysqli_query($conexao, $sql))
           {  
               header('location: dash.php');
               //echo "Gerente excluído com sucesso.";
           } else {
               //echo "ERRO: Não foi possível excluir o gerente. " . mysqli_error($conexao);
           }

        


        }
    }
    


    //--------------------FUNCIONARIOS--------------
    $consultaFuncionarios = "SELECT * FROM funcionarios order by  id_Funcionarios";
    $resultFuncionarios= $conexao->query($consultaFuncionarios);

    if(isset($_POST["btnAlterarFuncionario"])) {
        // Verifique se os campos necessários foram enviados
        if(isset($_POST['inputID'], $_POST['inputNome'], $_POST['inputApelido'], $_POST['inputTipo'])) {
            // Recupere os valores dos campos do formulário
            $idFuncionario = mysqli_real_escape_string($conexao, $_POST['inputID']);
            $nome = mysqli_real_escape_string($conexao, $_POST['inputNome']);
            $apelido = mysqli_real_escape_string($conexao, $_POST['inputApelido']);
            $tipo = mysqli_real_escape_string($conexao, $_POST['inputTipo']);
    
            // Execute a lógica para atualizar os dados do funcionário no banco de dados
            // Exemplo de consulta SQL para atualizar os dados do funcionário
            $sql = "UPDATE funcionarios SET Nome_F = '$nome', Apelido_F = '$apelido', tipo_F = '$tipo' WHERE id_Funcionarios = $idFuncionario";
    
            if(mysqli_query($conexao, $sql)) {
                header('location: dash.php');
                // Dados do funcionário atualizados com sucesso
                // Você pode adicionar uma mensagem de sucesso aqui, se desejar
            } else {
                echo "ERRO: Não foi possível atualizar os dados do funcionário. " . mysqli_error($conexao);
            }
        } else {
            // Campos necessários não enviados
            echo "ERRO: Por favor, preencha todos os campos obrigatórios.";
        }
    }


    if(isset($_POST["btnApagarFuncionarios"])) {
         
        if(isset($_POST['idFuncionarios']))
        {
            $idFunc = mysqli_real_escape_string($conexao, $_POST['idFuncionarios']);

             // Query SQL para excluir o gerente com o ID fornecido
             $sql = "DELETE FROM funcionarios WHERE id_Funcionarios = '$idFunc'";

              // Executar a query de exclusão
             if(mysqli_query($conexao, $sql))
            {
                //echo "Gerente excluído com sucesso.";
            } else {
                //echo "ERRO: Não foi possível excluir o gerente. " . mysqli_error($conexao);
            }

            header('location: dash.php');

        }
    }

     
    


    //----------------Serviços-------------------
    $consultaServicos = "SELECT * FROM servicos order by  id_Servicos";
    $resultServicos= $conexao->query($consultaServicos);

    if(isset($_POST["btnAlterarServico"])) {
        // Verifica se todos os campos foram enviados
        if(isset($_POST['inputIDS']) && isset($_POST['inputServico']) && isset($_POST['inputPreco']) && isset($_POST['inputTempo'])) {
            
            // Captura os valores dos campos do formulário
            $idServico = mysqli_real_escape_string($conexao, $_POST['inputIDS']);
            $novoServico = mysqli_real_escape_string($conexao, $_POST['inputServico']);
            $novoPreco = mysqli_real_escape_string($conexao, $_POST['inputPreco']);
            $novoTempo = mysqli_real_escape_string($conexao, $_POST['inputTempo']);
            
            // Query SQL para atualizar o serviço no banco de dados
            $sql = "UPDATE servicos SET nome_S = '$novoServico', preco = '$novoPreco', tempo = '$novoTempo' WHERE id_Servicos = '$idServico'";
    
            // Executar a query de atualização
            if(mysqli_query($conexao, $sql)) {
                header('location: dash.php');
            } else {
                echo "ERRO: Não foi possível atualizar o serviço. " . mysqli_error($conexao);
            }
        } else {
            echo "Por favor, preencha todos os campos do formulário.";
        }
    }


    if(isset($_POST["btnApagarServico"]))
    {

        if(isset($_POST['idServicos']))
        {

            $idSer = mysqli_real_escape_string($conexao, $_POST['idServicos']);

            // Query SQL para excluir o gerente com o ID fornecido
            $sql = "DELETE FROM servicos WHERE id_Servicos = '$idSer'";

             // Executar a query de exclusão
            if(mysqli_query($conexao, $sql))
           {
               //echo "Gerente excluído com sucesso.";
           } else {
               //echo "ERRO: Não foi possível excluir o gerente. " . mysqli_error($conexao);
           }

           header('location: dash.php');
          
        }
       
    }

    
 

$conexao->close();

?> 

 



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Off Dashboard</title>
   <link rel="stylesheet" href="../css/styles.css">

   <style>

#header {
    background-color: #1F1CB3;
    width: 100%;
    height: 8vh;
    color: white;
    padding: 10px;
    text-align: center;
    position: fixed;
    display: flex;
    align-items: center;
}

#sidebar {
    background-color: #6E71CE;
    width: 15%;
    height: 100%;
    margin-top: 77px;
    border-right: none; 
  
}

#content {
    margin-left: 200px; 
    padding: 20px;
}

#gerente{
    margin-top: 65px
}


       .containerAlterar{
    background-color: #ccc;
    width: 40%;
    height: 59vh;
    display: none;
    flex-direction: column;
    align-items: center;
    margin-left: 5%;
    margin-top: -30px;
    border-radius: 20px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
}

.containerFormAlterar{
    display: flex;
    flex-direction: column;
    padding: 10px;
    gap: 20px;
    justify-content: center;
    align-items: center;
}

.inputsFormAlterar{
    width: 160%; /* Alterado para 100% para evitar problemas de layout */
    height: 30px; /* Ajustado para uma altura fixa de 30 pixels, mas você pode alterar conforme necessário */
    border-radius: 10px;
    border: none;
    margin-bottom: 2px; /* Adicionado espaçamento inferior entre os elementos de entrada */
    padding: 5px;  
}

.btnCorAzul{
    background-color: #1F1CB3;
    color: white;
    border: none;
    width: 130%;
    height: 5vh;
    border-radius: 10px;
}

.btnCorVermelho{
    background-color: rgb(167, 21, 21);
    color: white;
    border: none;
    width: 130%;
    height: 5vh;
    border-radius: 10px;
    margin-left: 10px;
   
}

.containerButoes{
    width: 100%;
    height: 20vh;
    display: flex;
    flex-direction: row;
    padding: 10px;
}

.btnCorInserir{
    background-color: #1F1CB3;
    color: white;
    border: none;
    border-radius: 10px;
    height: 40px;
    padding: 10px;
    font-weight: bold;
}

.esconderDivCorte{
    display: none;
}

a{
    text-decoration: none;
}

.btnOperacoes{
    width: 68px;
    height: 4vh;
    color:white;
    border: none;
    border-radius: 10px;
    font-weight: bold;
    font-size: 1em;
}

#btnEditar{
    background-color: blue;
}

#btnApagar{
    background-color: red;
}

 

</style>

 
</head>
<body>
    <div id="header">
        <h2>SALÃO SHOW-OFF</h2>
    </div>
    <div id="sidebar">
         
        <ul>
            <li><i class="fas fa-user sidebar-icon"></i><a  class="sidebar-text">Gerente</a></li>
            <li><i class="fas fa-users sidebar-icon"></i><a class="sidebar-text" onclick="mostrarClientes()">Cliente</a></li>
            <li><i class="fas fa-users-cog sidebar-icon"></i><a   class="sidebar-text" onclick="mostrarFuncionarios()">Funcionários</a></li>
            <li><i class="fas fa-users-cog sidebar-icon"></i><a  href="../html/marcacaodash.php"  class="sidebar-text" onclick="">Marcação</a></li>
            <li><i class="fas fa-cut sidebar-icon"></i><a  class="sidebar-text" onclick="mostrarContainerCortes()">Serviços</a></li>
            <li><i class="fas fa-sign-out-alt sidebar-icon"></i><a href="../html/index.php" class="sidebar-text">Sair</a></li>
        </ul>
    </div>
    <div id="content">
        
     
       <div class="containerGerente" id="containerGerente">
             <h2 id="gerente">Gerente</h2>
         <a href="../formularios/gerente.php">
             <button class="btnCorInserir">Inserir Gerente</button>
         </a>
          
            <table class="table" id="tblGerente">
                    <thead>
                        <tr>
                        <th scope="col">id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Apelido</th>
                        <th scope="col">Contacto</th>
                        <th scope="col">Senha</th>
                        <th scope="col">Operacões</th>
                        </tr>
                    </thead>
                    <tbody>
                         
                         <?php
                            while($userData=mysqli_fetch_assoc($result))
                            {
                                echo "<tr>";
                                echo "<td>".$userData['id_gerente']."</td>";
                                echo "<td>".$userData['Nome_G']."</td>";
                                echo "<td>".$userData['Apelido_G']."</td>";
                                echo "<td>".$userData['Contacto_G']."</td>";
                                echo "<td>".$userData['Senha_G']."</td>";
                                echo "<td>
                                <button class='btnOperacoes' id='btnEditar' onclick='abrirDivAlterarGerente(\"".$userData['id_gerente']."\", \"".$userData['Nome_G']."\", \"".$userData['Apelido_G']."\", \"".$userData['Contacto_G']."\", \"".$userData['Senha_G']."\")'>
                                 Editar</button>

                                 <form action='./dash.php' method='post' style='display:inline-block;'>
                                    <input type='hidden' name='idGerente' value='".$userData['id_gerente']."'>
                                    <button type='submit' id='btnApagar' class='btnOperacoes' name='btnApagarGerente'>
                                        Apagar
                                    </button>
                                </form>
                              </td>";
                              
                                echo "</tr>";
                            }
                         ?>
                       
                    </tbody>
            </table>
       </div>

      
        <div id="funcionario-table" class="hidden">
            <h2 id="funcionario">Funcionários</h2>
            <a href="../formularios/funcionarios.php">
                <button class="btnCorInserir">Inserir Funcionario</button>
            </a>
            
            <table>
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nome</th>
                        <th>Apelido</th>
                        <th>Tipo</th>
                        <th>Operacões</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    while($userData2=mysqli_fetch_assoc($resultFuncionarios))
                    {
                        echo "<tr>";
                        echo "<td>".$userData2['id_Funcionarios']."</td>";
                        echo "<td>".$userData2['Nome_F']."</td>";
                        echo "<td>".$userData2['Apelido_F']."</td>";
                        echo "<td>".$userData2['tipo_F']."</td>";
                        echo "<td>
                        <button class='btnOperacoes' id='btnEditar' onclick='abrirDivAlterarFuncionario(\"".$userData2['id_Funcionarios']."\", \"".$userData2['Nome_F']."\", \"".$userData2['Apelido_F']."\", \"".$userData2['tipo_F']."\")'>
                            Editar</button>

                            <form action='./dash.php' method='post' style='display:inline-block;'>
                            <input type='hidden' name='idFuncionarios' value='".$userData2['id_Funcionarios']."'>
                            <button type='submit' id='btnApagar' class='btnOperacoes' name='btnApagarFuncionarios'>
                                Apagar
                            </button>
                        </form>
                        </td>";
                        
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

         <div class="hidden" id="cliente-table">
            <h2>Cliente</h2>
            <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Apelido</th>
                            <th scope="col">Contacto</th>
                            <th scope="col">Senha</th>
                            <th scope="col">Operacões</th>
                        </tr>
                    </thead>
                    <tbody>
                       

                             <?php
                            while($userData=mysqli_fetch_assoc($resultClientes))
                            {
                                echo "<tr>";
                                echo "<td>".$userData['id_Clientes']."</td>";
                                echo "<td>".$userData['Nome_C']."</td>";
                                echo "<td>".$userData['Apelido_C']."</td>";
                                echo "<td>".$userData['Contacto_C']."</td>";
                                echo "<td>".$userData['Senha_C']."</td>";
                                echo "<td> 
                                <form action='./dash.php' method='post' style='display:inline-block;'>
                                    <input type='hidden' name='id_Clientes' value='".$userData['id_Clientes']."'>
                                    <button type='submit' id='btnApagar' class='btnOperacoes' name='btnApagarClientes'>
                                        Apagar
                                    </button>
                                 </form>
                                </td>";
                                echo "</tr>";
                            }
                         ?>

                        
                         
                    </tbody>
            </table>
           
         </div>
        <div id="corte-tabl"  class="esconderDivCorte">
            <h2 id="corte">Serviços</h2>
            <a href="../formularios/servicos.php">
                <button class="btnCorInserir">Inserir Serviço</button>
            </a>
            
            <table>
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Serviço</th>
                        <th>Preço</th>
                        <th>Tempo</th>
                        <th>Operacões</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                     while($userData3=mysqli_fetch_assoc($resultServicos))
                     {
                         echo "<tr>";
                         echo "<td>".$userData3['id_Servicos']."</td>";
                         echo "<td>".$userData3['nome_S']."</td>";
                         echo "<td>".$userData3['preco']."</td>";
                         echo "<td>".$userData3['tempo']."</td>";
                         echo "<td>
                         <button class='btnOperacoes' id='btnEditar' onclick='abrirDivAlterarCorte(\"".$userData3['id_Servicos']."\", \"".$userData3['nome_S']."\", \"".$userData3['preco']."\", \"".$userData3['tempo']."\")'>
                             Editar</button>
 
                             <form action='./dash.php' method='post' style='display:inline-block;'>
                             <input type='hidden' name='idServicos' value='".$userData3['id_Servicos']."'>
                             <button type='submit' id='btnApagar' class='btnOperacoes' name='btnApagarServico'>
                                 Apagar
                             </button>
                         </form>
                         </td>";
                         
                         echo "</tr>";
                     }
                      
                 ?>
                </tbody>
            </table>
        </div>
    </div>

    <!----------CRIAÇÃO DOS INPUTS PARA ALTERAÇÃO DE DADOS DO GERENTE---------->
    <div class="containerAlterar"  id="containerAlterar">

        <p>ALTERAÇÃO DOS DADOS DO GERENTE</p>

        <form action="./dash.php"  method="post" class="containerFormAlterar">

           
            <input type="text" name="idGerente" id="inputID" placeholder="id" class="inputsFormAlterar" readonly>
            <input type="text" placeholder="Nome" name="inputNome" class="inputsFormAlterar">
            <input type="text" placeholder="Apelido" name="inputApelido" class="inputsFormAlterar">
            <input type="text" placeholder="Contacto" name="inputContacto" class="inputsFormAlterar">
            <input type="text" placeholder="Senha" name="inputSenha" class="inputsFormAlterar">
            
            <div class="containerButoes">
                <button class="btnCorAzul" type="submit" name="btnAlterarGerente">Alterar</button>
                <button class="btnCorVermelho" onclick="fecharDivAlterarGerente()">Fechar</button>
            </div>
              
        </form>


    </div>


    <!----------CRIAÇÃO DOS INPUTS PARA ALTERAÇÃO DE DADOS DO Funcionario---------->
    <div class="containerAlterar"  id="containerAlterarFuncionario">

        <p>ALTERAÇÃO DOS DADOS DO FUNCIONARIO</p>

        <form action="./dash.php"  method="post" class="containerFormAlterar">

            <input type="text" id="inputIDF" placeholder="id" name="inputID" class="inputsFormAlterar" readonly>
            <input type="text" id="inputNome" placeholder="nome" name="inputNome" class="inputsFormAlterar">
            <input type="text" id="inputApelido" placeholder="apelido" name="inputApelido" class="inputsFormAlterar">
            <input type="text" id="inputTipo" placeholder="tipo" name="inputTipo" class="inputsFormAlterar">
      
            
            <div class="containerButoes">
                <button class="btnCorAzul" type="submit" name="btnAlterarFuncionario">Alterar</button>
                <button class="btnCorVermelho" onclick="fecharDivAlterarFuncionario()">Fechar</button>
            </div>
              
        </form>


    </div>


    <!----------CRIAÇÃO DOS INPUTS PARA ALTERAÇÃO DE DADOS DE CORTE---------->
    <div class="containerAlterar"  id="containerAlterarCorte">

        <p>ALTERAÇÃO DOS DADOS DE CORTE</p>

        <form action="./dash.php"  method="post" class="containerFormAlterar">

            <input type="text" id="inputIDS" placeholder="id" name="inputIDS" class="inputsFormAlterar" readonly>
            <input type="text" id="inputServico" placeholder="Serviço" name="inputServico" class="inputsFormAlterar">
            <input type="text" id="inputPreco" placeholder="Preço" name="inputPreco" class="inputsFormAlterar">
            <input type="text" id="inputTempo" placeholder="Tempo" name="inputTempo" class="inputsFormAlterar">
            
            <div class="containerButoes">
                <button class="btnCorAzul" type="submit" name="btnAlterarServico">Alterar</button>
                <button class="btnCorVermelho" onclick="fecharDivAlterarCorte()">Fechar</button>
            </div>
              
        </form>


    </div>

    <script src="../js/script.js"></script>

    <script>
        // Função para mostrar a div de alterar os  gerentes
            function fecharDivAlterarGerente(){
                document.getElementById('containerAlterar').style.display = 'none';
            }

            function abrirDivAlterarGerente(id,nome, apelido, contacto,senha){
                document.getElementById('containerAlterar').style.display = 'flex';

                //let valorID= document.getElementById('lblid').innerText = id;
                document.getElementById('inputID').value=id
                document.querySelector('input[name="inputNome"]').value = nome;
                document.querySelector('input[name="inputApelido"]').value = apelido;
                document.querySelector('input[name="inputContacto"]').value = contacto;
                document.querySelector('input[name="inputSenha"]').value = senha;

            }

            function fecharDivAlterarFuncionario(){
                document.getElementById('containerAlterarFuncionario').style.display = 'none';
            }

            function abrirDivAlterarFuncionario(id,nome,apelido,tipo){
                document.getElementById('containerAlterarFuncionario').style.display = 'flex';
                
                document.getElementById('inputIDF').value = id;
                document.getElementById('inputNome').value = nome;
                document.getElementById('inputApelido').value = apelido;
                document.getElementById('inputTipo').value = tipo;
            }

            function fecharDivAlterarCorte(){
                document.getElementById('containerAlterarCorte').style.display = 'none';
            }

            function abrirDivAlterarCorte(id,servico,preco,tempo){
                document.getElementById('containerAlterarCorte').style.display = 'flex';
                document.getElementById('inputIDS').value = id;
                document.getElementById('inputServico').value = servico;
                document.getElementById('inputPreco').value = preco;
                document.getElementById('inputTempo').value = tempo;
            }

            function mostrarContainerCortes()
            {
                document.getElementById('corte-tabl').style.display='block'
                 
                 

            }

           
    </script>
</body>
</html>
