<?php

    //variáveis de conexão
    $host = "localhost";
    $banco = "techdesk";
    $usuario = "root";
    $senha = "123456"; //snc = 123456 //hme = root

    //tenta se conectar ao banco
    try {
        $pdo = new PDO(
            "mysql:host=$host;dbname=$banco",
            $usuario,
            $senha
        );
    } catch (PDOException $erro){
        die("Erro ao conectar com o banco: " . $erro);
    }
?>