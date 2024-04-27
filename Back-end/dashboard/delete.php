<?php
// Inclua o arquivo de conexão com o banco de dados
include(__DIR__ . "/../conexao.php");

// Verifique se o parâmetro "id" foi enviado via GET
if(isset($_GET['id']) && !empty($_GET['id'])) {
    // Obtenha o ID do usuário a ser excluído
    $id = $_GET['id'];

    // Prepare a consulta SQL para excluir o usuário com base no ID
    $sql = "DELETE FROM gerente WHERE id_gerente = ?";

    // Preparar a declaração SQL
    $stmt = $conn->prepare($sql);

    // Verificar se a preparação da declaração foi bem-sucedida
    if ($stmt) {
        // Vincular o parâmetro e executar a declaração
        $stmt->bind_param("i", $id);
        $result = $stmt->execute();

        // Verificar se a execução da consulta foi bem-sucedida
        if ($result) {
            // Redirecionar de volta para a página principal após a exclusão
            header("Location: index.php");
            exit();
        } else {
            // Se a exclusão falhar, exibir uma mensagem de erro
            echo "Erro ao excluir o gerente.";
        }
    } else {
        // Erro na preparação da consulta
        echo "Erro na preparação da consulta.";
    }

    // Fechar a declaração e a conexão com o banco de dados
    $stmt->close();
    $conn->close();
} else {
    // Se nenhum ID foi fornecido, exibir uma mensagem de erro
    echo "ID do gerente não fornecido.";
}
?>
