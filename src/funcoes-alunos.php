<?php

require_once "conecta.php";



function lerAlunos (PDO $conexao):array {
    $sql = "SELECT * FROM alunos ORDER BY nome"; 

    try {
        $consulta = $conexao->prepare($sql);

        $consulta-> execute();

        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);

    } catch (Exception $erro){
        die("Erro: " .$erro->getMessage());
    }

    return $resultado;
}