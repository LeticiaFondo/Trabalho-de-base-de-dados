// Função para mostrar a tabela de funcionários quando clicar na opção no sidebar
function mostrarFuncionarios() {
    // Carregar os dados dos funcionários quando a tabela é mostrada
    let containerFuncionarios = document.getElementById('funcionario-table');
    containerFuncionarios.classList.remove('hidden');
}

// Função para mostrar a tabela de clientes quando clicar na opção no sidebar
function mostrarClientes() {
    const tabelaClientes = document.getElementById("cliente-table");
    tabelaClientes.classList.remove("hidden");
  
}

// Função para mostrar a tabela de cortes quando clicar na opção no sidebar
function mostrarCortes() {
    const tabelaCortes = document.getElementById("corte-table");
    tabelaCortes.classList.remove("hidden");
  
}

 
 

 