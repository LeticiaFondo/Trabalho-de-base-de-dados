<?php

    $conexao= new mysqli("Localhost","root","","SHOWOFF");

    if ($conexao->connect_errno) {
        echo "Falha na conexão: " . $conexao->connect_error;
    } else {
        echo "Conexão Funcionando";
    }
?>