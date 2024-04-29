<?php

    $conexao = new mysqli("localhost", "root", "", "SHOWOFF");
    if ($conexao->connect_errno) {
    echo "Falha na conexão: " . $conexao->connect_error;
    }

    $sql = "SELECT * FROM gerente order by Nome_G "; // Corrigindo a consulta SQL
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
</head>
<body>
    <div id="header">
        <h1>Show Off</h1>
    </div>
    <div id="sidebar">
        <ul>
            <li><i class="fas fa-user sidebar-icon"></i><a href="#gerente" class="sidebar-text">Gerente</a></li>
            <li><i class="fas fa-users sidebar-icon"></i><a href="#cliente" class="sidebar-text" onclick="mostrarClientes()">Cliente</a></li>
            <li><i class="fas fa-users-cog sidebar-icon"></i><a href="#funcionario" class="sidebar-text" onclick="mostrarFuncionarios()">Funcionários</a></li>
            <li><i class="fas fa-cut sidebar-icon"></i><a href="#cortes" class="sidebar-text" onclick="mostrarCortes()">Cortes</a></li>
            <li><i class="fas fa-sign-out-alt sidebar-icon"></i><a href="#logout" class="sidebar-text">Sair</a></li>
        </ul>
    </div>
    <div id="content">
        <div class="search-container">
            <input type="text" id="searchInput" placeholder="Pesquisar...">
            <button onclick="pesquisar()">Pesquisar</button>
        </div>
        <h2 id="gerente">Gerente</h2>
       <div>
            <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Apelido</th>
                        <th scope="col">Contacto</th>
                        <th scope="col">Senha</th>
                        <th scope="col">...</th>
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
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pen-fill' viewBox='0 0 16 16'>
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
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Apelido</th>
                        <th>Email</th>
                        <th>Tipo</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Os dados dos funcionários serão carregados aqui -->
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
                            <th scope="col">...</th>
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
        <div id="corte-table" class="hidden">
            <h2 id="corte">Cortes</h2>
            <table>
                <thead>
                    <tr>
                        <th>Corte de Cabelo/Penteado</th>
                        <th>Manicure/Pedicure</th>
                        <th>Preço</th>
                        <th>Tempo</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Os dados dos cortes serão carregados aqui -->
                </tbody>
            </table>
        </div>
    </div>

    <script src="../js/script.js"></script>
</body>
</html>
