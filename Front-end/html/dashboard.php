<?php
//nclude(__DIR__ . "/../conexao.php");
/*
session_start();

// Consultar todos os gerentes inicialmente
$sql = "SELECT id_gerente, Nome_G, Apelido_G, Contacto_G FROM gerente";
$result = $conn->query($sql);

// Verificar se o formulário de pesquisa foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
  // Obter o termo de pesquisa do campo de entrada
  $searchTerm = $_POST['search'];

  // Consultar os gerentes com base no termo de pesquisa
  $sql = "SELECT Nome_G, Apelido_G, Contacto_G FROM gerente
          WHERE Nome_G LIKE '%$searchTerm%' OR Apelido_G LIKE '%$searchTerm%' OR Contacto_G LIKE '%$searchTerm%'";
  $result = $conn->query($sql);

  // Consultar arquivos com base no termo de pesquisa
  // Esta parte depende de como seus arquivos estão estruturados no sistema de arquivos e como você deseja implementar a pesquisa de arquivos
  // Suponha que seus arquivos estejam em um diretório específico e você queira pesquisar pelo nome do arquivo
  $diretorio = '/caminho/para/seu/diretorio';
  $arquivosEncontrados = [];
  if (is_dir($diretorio)) {
    $arquivos = scandir($diretorio);
    foreach ($arquivos as $arquivo) {
      if (strpos($arquivo, $searchTerm) !== false) {
        $arquivosEncontrados[] = $arquivo;
      }
    }
  }
}
?>


<?php
$sql = "SELECT id_gerente, Nome_G, Apelido_G, Contacto_G, Senha_G FROM gerente";

$result = $conn->query($sql);

$row = mysqli_fetch_array($result);
*/
?>


<!-- component -->
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>salao show off</title>
  <!-- Agregar el enlace al archivo de estilos de Tailwind CSS -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <!-- Agregar el enlace al archivo de la biblioteca FontAwesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

  <link rel="stylesheet" href="style.css">

  <style>
    /* cabecalho background*/
    .roxo {
      background-color: #1F1CB3;
    }

    /* lateral-direita opcoes background*/
    .roxo-light {
      background-color: #1e1cb39f;
    }
  </style>

</head>

<body class="bg-gray-100">
  <!-- Navegación Superior -->
  <nav class="roxo p-4 flex items-center justify-between">
    <div>
      <h1 class="text-white text-xl font-semibold">salao show off</h1>
    </div>
    <div class="flex items-center space-x-4">
      <span class="text-white capitalize"><?php echo $row[1] ?>
      </span>
      <i class="fas fa-user-circle text-white text-2xl"></i>
    </div>
  </nav>

  <!-- Navegación lateral -->
  <div class="flex">
    <aside class="roxo-light text-white w-64 min-h-screen p-4">
      <nav>
        <ul class="space-y-2">
          <li class="opcion-con-desplegable">
            <div class="flex items-center justify-between p-2 hover:roxo">
              <div class="flex items-center">
                <!-- <i class="fas fa-calendar-alt mr-2"></i> -->
                <ion-icon class="mr-2" name="people-sharp"></ion-icon>
                <span>Gerentes</span>
              </div>
              <i class="fas fa-chevron-down text-xs"></i>
            </div>
            <ul class="desplegable ml-4 hidden">
              <li>
                <a href="#" id="lista_gerente" class="block p-2 hover:roxo flex items-center">
                  <i class="fas fa-chevron-right mr-2 text-xs"></i>
                  Lista de Gerentes
                </a>
              </li>
              <li>
                <a href="criar.php" class="block p-2 hover:roxo flex items-center">
                  <i class="fas fa-chevron-right mr-2 text-xs"></i>
                  Criar Gerente
                </a>
              </li>
            </ul>
          </li>

          <li class="opcion-con-desplegable">
            <div class="flex items-center justify-between p-2 hover:roxo">
              <div class="flex items-center">
                <!-- <i class="fas fa-calendar-alt mr-2"></i> -->
                <ion-icon class="mr-2" name="people-sharp"></ion-icon>
                <span>Funcionario</span>
              </div>
              <i class="fas fa-chevron-down text-xs"></i>
            </div>
            <ul class="desplegable ml-4 hidden">
              <li>
                <a href="#" id="lista_gerente" class="block p-2 hover:roxo flex items-center">
                  <i class="fas fa-chevron-right mr-2 text-xs"></i>
                  Lista de Gerentes
                </a>
              </li>
              <li>
                <a href="criar.php" class="block p-2 hover:roxo flex items-center">
                  <i class="fas fa-chevron-right mr-2 text-xs"></i>
                  Criar Gerente
                </a>
              </li>
            </ul>
          </li>
         

          <li class="opcion-con-desplegable">
            <a href="logout.php" class="flex items-center justify-between p-2 hover:roxo">
              <div class="flex items-center">
                <ion-icon class="mr-2" name="log-out-sharp"></ion-icon>
                <span>sign out</span>
              </div>
            </a>
          </li>

          <!-- Agrega más enlaces para la navegación lateral -->
        </ul>
      </nav>
    </aside>
    <!-- Contenido principal -->
    <main class="container mx-auto p-4">

      <!-- !CLIENTES -->
      <section id="clientes">
        <!-- component -->
        <div class="bg-white p-8 rounded-md w-full">
          <div class=" flex items-center justify-between pb-6">
            <div>
              <h2 class="text-gray-600 font-semibold">Gerentes</h2>
              <span class="text-xs">Todos os Gerentes</span>
            </div>
            <div class="flex items-center justify-between">
              <div class="flex bg-gray-50 items-center p-2 rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                </svg>
                <!-- <input class="bg-gray-50 outline-none ml-1 block " type="text" name="" id="" placeholder="pesquisar..."> -->

                <form action="" method="post">
                  <div class="flex items-center">
                    <input class="outline-none ml-1 block flex-1 py-2 px-4 rounded-md" type="text" name="search" placeholder="Pesquisar...">
                    <button type="submit" class="bg-indigo-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer ml-2">Buscar</button>
                  </div>
                </form>
              </div>
              <div class="lg:ml-40 ml-10 space-x-8">
                <a href="criar.php" class="bg-indigo-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer" name="novoGerente">Novo
                  Gerente
                </a>
              </div>
            </div>
          </div>
          <div>
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
              <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                <table class="min-w-full leading-normal">
                  <thead>
                    <tr>
                      <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Nome
                      </th>
                      <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Apelido
                      </th>
                      <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Celular
                      </th>
                      <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">

                      </th>
                      <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">

                      </th>
                      <!-- Adicione mais colunas aqui, se necessário -->
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($result as $row) { ?>
                      <tr>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                          <?php echo $row['Nome_G']; ?>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                          <?php echo $row['Apelido_G']; ?>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                          <?php echo $row['Contacto_G']; ?>
                        </td>

                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                          <a href="editar.php?editar=<?php echo $row['id_gerente']; ?>" class="text-blue-600 hover:text-red-900">
                            <span>Editar</span>
                            <ion-icon class="ml-2" name="create-sharp"></ion-icon>
                          </a>
                        </td>

                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                          <div class="flex items-center justify-center">
                            <a href="delete.php?id=<?php echo $row['id_gerente']; ?>" class="text-red-600 hover:text-red-900">
                              <span>Apagar</span>
                              <ion-icon class="ml-2" name="trash-sharp"></ion-icon>
                            </a>
                          </div>
                        </td>

                        <!-- Adicione mais colunas aqui, se necessário -->
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
                <div class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between          ">
                  <span class="text-xs xs:text-sm text-gray-900">
                    Showing 1 to 4 of 50 Entries
                  </span>
                  <div class="inline-flex mt-2 xs:mt-0">
                    <button class="text-sm text-indigo-50 transition duration-150 hover:bg-indigo-500 bg-indigo-600 font-semibold py-2 px-4 rounded-l">
                      Prev
                    </button>
                    &nbsp; &nbsp;
                    <button class="text-sm text-indigo-50 transition duration-150 hover:bg-indigo-500 bg-indigo-600 font-semibold py-2 px-4 rounded-r">
                      Next
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

    </main>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      // Obtener todas las opciones principales con desplegables
      const opcionesConDesplegable = document.querySelectorAll(".opcion-con-desplegable");

      // Agregar evento de clic a cada opción principal
      opcionesConDesplegable.forEach(function(opcion) {
        opcion.addEventListener("click", function() {
          // Obtener el desplegable asociado a la opción
          const desplegable = opcion.querySelector(".desplegable");

          // Alternar la clase "hidden" para mostrar u ocultar el desplegable
          desplegable.classList.toggle("hidden");
        });
      });
    });


    var gerente = document.getElementById("lista_gerente");

    gerente.addEventListener('click', () => {
      gerente.classList.add('activo');
    });
  </script>

  <!-- ion-icons -->
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>