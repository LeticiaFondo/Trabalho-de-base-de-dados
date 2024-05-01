
    <?php

    $conexao = new mysqli("localhost", "root", "", "SHOWOFF");
    if ($conexao->connect_errno) {
    echo "Falha na conexão: " . $conexao->connect_error;
    }

    $sql = "SELECT * FROM gerente order by id_gerente "; // Corrigindo a consulta SQL
    $result = $conexao->query($sql);

    $consultaClientes = "SELECT * FROM clientes order by Nome_C";
    $resultClientes = $conexao->query($consultaClientes);

 

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
    height: 55vh;
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
            <li><i class="fas fa-cut sidebar-icon"></i><a  class="sidebar-text" onclick="mostrarContainerCortes()">Serviços</a></li>
            <li><i class="fas fa-sign-out-alt sidebar-icon"></i><a href="../html/index.php" class="sidebar-text">Sair</a></li>
        </ul>
    </div>
    <div id="content">
        
        <h2 id="gerente">Gerente</h2>
       <div>
           <button class="btnCorInserir" onclick="abrirDivAlterarGerente()">Inserir Gerente</button>
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
                                  <a class='btn btn-primary' href='#'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pen-fill' viewBox='0 0 16 16' onclick='abrirDivAlterarGerente()'>
                                    <path d='m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001'/>
                                </svg>
                                </a>
                              </td>";
                              
                                echo "</tr>";
                            }
                         ?>
                       
                    </tbody>
            </table>
       </div>

      
        <div id="funcionario-table" class="hidden">
            <h2 id="funcionario">Funcionários</h2>
            <button class="btnCorInserir" onclick="abrirDivAlterarFuncionario()">Inserir Funcionario</button>
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Apelido</th>
                        <th>Email</th>
                        <th>Tipo</th>
                        <th>Operacões</th>
                    </tr>
                </thead>
                <tbody>
                   <?php
                      echo "<tr>";
                      echo "<td>
                      <a class='btn btn-primary' href='#'>
                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pen-fill' viewBox='0 0 16 16' onclick='abrirDivAlterarFuncionario()'>
                        <path d='m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001'/>
                    </svg>
                    </a>
                  </td>";
                      echo "</tr>";
                   ?>
                </tbody>
            </table>
        </div>

         <div class="hidden" id="cliente-table">
            <h2>Cliente</h2>
            <table class="table">
                    <thead>
                        <tr>
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
                                echo "<td>".$userData['Nome_C']."</td>";
                                echo "<td>".$userData['Apelido_C']."</td>";
                                echo "<td>".$userData['Contacto_C']."</td>";
                                echo "<td>".$userData['Senha_C']."</td>";
                                echo "</tr>";
                            }
                         ?>

                        
                         
                    </tbody>
            </table>
           
         </div>
        <div id="corte-tabl"  class="esconderDivCorte">
            <h2 id="corte">Serviços</h2>
            <button class="btnCorInserir" onclick="abrirDivAlterarCorte()">Inserir Serviço</button>
            <table>
                <thead>
                    <tr>
                        <th>Serviço</th>
                        <th>Preço</th>
                        <th>Tempo</th>
                        <th>Operacões</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                      echo "<tr>";
                      echo "<td>
                      <a class='btn btn-primary' href='#'>
                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pen-fill' viewBox='0 0 16 16' onclick='abrirDivAlterarCorte()'>
                        <path d='m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001'/>
                    </svg>
                    </a>
                  </td>";
                      echo "</tr>";
                   ?>
                </tbody>
            </table>
        </div>
    </div>

    <!----------CRIAÇÃO DOS INPUTS PARA ALTERAÇÃO DE DADOS DO GERENTE---------->
    <div class="containerAlterar"  id="containerAlterar">

        <p>ALTERAÇÃO DOS DADOS DO GERENTE</p>

        <form action="#"  method="#" class="containerFormAlterar">

            <input type="text" placeholder="" name="inputNome" class="inputsFormAlterar">
            <input type="text" placeholder="" name="inputApelido" class="inputsFormAlterar">
            <input type="text" placeholder="" name="inputContacto" class="inputsFormAlterar">
            <input type="text" placeholder="" name="inputSenha" class="inputsFormAlterar">
            
            <div class="containerButoes">
                <button class="btnCorAzul">Alterar</button>
                <button class="btnCorVermelho" onclick="fecharDivAlterarGerente()">Fechar</button>
            </div>
              
        </form>


    </div>


    <!----------CRIAÇÃO DOS INPUTS PARA ALTERAÇÃO DE DADOS DO Funcionario---------->
    <div class="containerAlterar"  id="containerAlterarFuncionario">

        <p>ALTERAÇÃO DOS DADOS DO FUNCIONARIO</p>

        <form action="#"  method="#" class="containerFormAlterar">

            <input type="text" placeholder="" name="inputNome" class="inputsFormAlterar">
            <input type="text" placeholder="" name="inputApelido" class="inputsFormAlterar">
            <input type="text" placeholder="" name="inputContacto" class="inputsFormAlterar">
            <input type="text" placeholder="" name="inputSenha" class="inputsFormAlterar">
            
            <div class="containerButoes">
                <button class="btnCorAzul">Alterar</button>
                <button class="btnCorVermelho" onclick="fecharDivAlterarFuncionario()">Fechar</button>
            </div>
              
        </form>


    </div>


    <!----------CRIAÇÃO DOS INPUTS PARA ALTERAÇÃO DE DADOS DE CORTE---------->
    <div class="containerAlterar"  id="containerAlterarCorte">

        <p>ALTERAÇÃO DOS DADOS DE CORTE</p>

        <form action="#"  method="#" class="containerFormAlterar">

            <input type="text" placeholder="" name="inputServicoCabeloPenteado" class="inputsFormAlterar">
            <input type="text" placeholder="" name="inputServicoManicurePedicure" class="inputsFormAlterar">
            <input type="text" placeholder="" name="inputPreco" class="inputsFormAlterar">
            <input type="text" placeholder="" name="inputTempo" class="inputsFormAlterar">
            
            <div class="containerButoes">
                <button class="btnCorAzul">Alterar</button>
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

            function abrirDivAlterarGerente(){
                document.getElementById('containerAlterar').style.display = 'flex';

            }

            function fecharDivAlterarFuncionario(){
                document.getElementById('containerAlterarFuncionario').style.display = 'none';
            }

            function abrirDivAlterarFuncionario(){
                document.getElementById('containerAlterarFuncionario').style.display = 'flex';

            }

            function fecharDivAlterarCorte(){
                document.getElementById('containerAlterarCorte').style.display = 'none';
            }

            function abrirDivAlterarCorte(){
                document.getElementById('containerAlterarCorte').style.display = 'flex';
            }

            function mostrarContainerCortes()
            {
                document.getElementById('corte-tabl').style.display='block'
            }
    </script>
</body>
</html>
