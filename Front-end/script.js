// Dados de exemplo para gerente, funcionários, clientes e cortes
const gerenteData = [
    { nome: "João", apelido: "Silva", email: "joao@example.com", senha: "senha123" },
    { nome: "Maria", apelido: "Santos", email: "maria@example.com", senha: "senha456" }
];

const funcionarioData = [
    { nome: "John", apelido: "Doe", email: "john@example.com", tipo: "cabeleireiro" },
    { nome: "Jane", apelido: "Doe", email: "jane@example.com", tipo: "barbeiro" }
];

const clienteData = [
    { nome: "Carlos", apelido: "Silva", tipoCorte: "Corte Masculino", manicurePedicure: "Manicure", atendente: "John", valor: "$20", tempo: "1 hora" },
    { nome: "Ana", apelido: "Santos", tipoCorte: "Corte Feminino", manicurePedicure: "Pedicure", atendente: "Jane", valor: "$30", tempo: "1 hora e 30 minutos" }
];

const corteData = [
    { tipo: "Corte Masculino", manicurePedicure: "Manicure", preco: "$15", tempo: "30 minutos" },
    { tipo: "Corte Feminino", manicurePedicure: "Pedicure", preco: "$25", tempo: "45 minutos" }
];

// Função para carregar os dados do gerente na tabela
function carregarGerentes() {
    const tabelaGerente = document.getElementById("gerente-table");
    tabelaGerente.innerHTML = ""; // Limpar a tabela antes de adicionar novos dados

    gerenteData.forEach(gerente => {
        const newRow = document.createElement("tr");
        newRow.innerHTML = `
            <td>${gerente.nome}</td>
            <td>${gerente.apelido}</td>
            <td>${gerente.email}</td>
            <td>${gerente.senha}</td>
            <td>
                <button class="action-button" onclick="editarGerente()"><i class="fas fa-edit"></i> Editar</button>
                <button class="action-button" onclick="apagarGerente()"><i class="fas fa-trash-alt"></i> Apagar</button>
            </td>
        `;
        tabelaGerente.appendChild(newRow);
    });
}

// Função para carregar os dados dos funcionários na tabela
function carregarFuncionarios() {
    const tabelaFuncionarios = document.getElementById("funcionario-table").getElementsByTagName('tbody')[0];
    tabelaFuncionarios.innerHTML = ""; // Limpar a tabela antes de adicionar novos dados

    funcionarioData.forEach(funcionario => {
        const newRow = document.createElement("tr");
        newRow.innerHTML = `
            <td>${funcionario.nome}</td>
            <td>${funcionario.apelido}</td>
            <td>${funcionario.email}</td>
            <td>
                <select disabled>
                    <option value="cabeleireiro" ${funcionario.tipo === "cabeleireiro" ? "selected" : ""}>Cabeleireiro</option>
                    <option value="barbeiro" ${funcionario.tipo === "barbeiro" ? "selected" : ""}>Barbeiro</option>
                </select>
            </td>
            <td>
                <button class="action-button" onclick="editarFuncionario()"><i class="fas fa-edit"></i> Editar</button>
                <button class="action-button" onclick="apagarFuncionario()"><i class="fas fa-trash-alt"></i> Apagar</button>
            </td>
        `;
        tabelaFuncionarios.appendChild(newRow);
    });
}

// Função para carregar os dados dos clientes na tabela
function carregarClientes() {
    const tabelaClientes = document.getElementById("cliente-table").getElementsByTagName('tbody')[0];
    tabelaClientes.innerHTML = ""; // Limpar a tabela antes de adicionar novos dados

    clienteData.forEach(cliente => {
        const newRow = document.createElement("tr");
        newRow.innerHTML = `
            <td>${cliente.nome}</td>
            <td>${cliente.apelido}</td>
            <td>${cliente.tipoCorte}</td>
            <td>${cliente.manicurePedicure}</td>
            <td>${cliente.atendente}</td>
            <td>${cliente.valor}</td>
            <td>${cliente.tempo}</td>
            <td>
                <button class="action-button" onclick="editarCliente()"><i class="fas fa-edit"></i> Editar</button>
                <button class="action-button" onclick="apagarCliente()"><i class="fas fa-trash-alt"></i> Apagar</button>
            </td>
        `;
        tabelaClientes.appendChild(newRow);
    });
}

// Função para carregar os dados dos cortes na tabela
function carregarCortes() {
    const tabelaCortes = document.getElementById("corte-table").getElementsByTagName('tbody')[0];
    tabelaCortes.innerHTML = ""; // Limpar a tabela antes de adicionar novos dados

    corteData.forEach(corte => {
        const newRow = document.createElement("tr");
        newRow.innerHTML = `
            <td>${corte.tipo}</td>
            <td>${corte.manicurePedicure}</td>
            <td>${corte.preco}</td>
            <td>${corte.tempo}</td>
            <td>
                <button class="action-button" onclick="editarCorte()"><i class="fas fa-edit"></i> Editar</button>
                <button class="action-button" onclick="apagarCorte()"><i class="fas fa-trash-alt"></i> Apagar</button>
            </td>
        `;
        tabelaCortes.appendChild(newRow);
    });
}

// Função para mostrar a tabela de funcionários quando clicar na opção no sidebar
function mostrarFuncionarios() {
    const tabelaFuncionarios = document.getElementById("funcionario-table");
    tabelaFuncionarios.classList.remove("hidden");
    carregarFuncionarios(); // Carregar os dados dos funcionários quando a tabela é mostrada
}

// Função para mostrar a tabela de clientes quando clicar na opção no sidebar
function mostrarClientes() {
    const tabelaClientes = document.getElementById("cliente-table");
    tabelaClientes.classList.remove("hidden");
    carregarClientes(); // Carregar os dados dos clientes quando a tabela é mostrada
}

// Função para mostrar a tabela de cortes quando clicar na opção no sidebar
function mostrarCortes() {
    const tabelaCortes = document.getElementById("corte-table");
    tabelaCortes.classList.remove("hidden");
    carregarCortes(); // Carregar os dados dos cortes quando a tabela é mostrada
}

// Função para editar um gerente
function editarGerente() {
    // Lógica para editar um gerente
    console.log("Editar gerente");
}

// Função para apagar um gerente
function apagarGerente() {
    // Lógica para apagar um gerente
    console.log("Apagar gerente");
}

// Função para editar um funcionário
function editarFuncionario() {
    // Lógica para editar um funcionário
    console.log("Editar funcionário");
}

// Função para apagar um funcionário
function apagarFuncionario() {
    // Lógica para apagar um funcionário
    console.log("Apagar funcionário");
}

// Função para editar um cliente
function editarCliente() {
    // Lógica para editar um cliente
    console.log("Editar cliente");
}

// Função para apagar um cliente
function apagarCliente() {
    // Lógica para apagar um cliente
    console.log("Apagar cliente");
}

// Função para editar um corte
function editarCorte() {
    // Lógica para editar um corte
    console.log("Editar corte");
}

// Função para apagar um corte
function apagarCorte() {
    // Lógica para apagar um corte
    console.log("Apagar corte");
}

// Função para pesquisar
function pesquisar() {
    const input = document.getElementById("searchInput").value.toLowerCase();
    // Lógica de pesquisa aqui...
    console.log("Pesquisando por: " + input);
}

// Chamar as funções para carregar os dados do gerente na tabela
carregarGerentes();
