<?php

require_once "conecta.php";


// Início lerAlunos
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
} //Fim lerAlunos

//Na página inserir.php, programe os recursos necessários para fazer INSERT no banco


// Início inserirAlunos
function  inserirAluno(
    PDO $conexao,
    string $nome, 
    int $primeira, 
    int $segunda
 ):void {

    $sql = "INSERT INTO alunos(nome, primeira, segunda)
            VALUES(:nome, :primeira, :segunda)";

    try {
        $consulta = $conexao->prepare($sql);

        $consulta->bindValue(":nome", $nome, PDO::PARAM_STR);

        $consulta->bindValue(":primeira", $primeira, PDO::PARAM_STR);

        $consulta->bindValue(":segunda", $segunda, PDO::PARAM_STR);

        $consulta->execute();
        

    } catch (Exception $erro) {
        die("Erro ao inserir: " .$erro->getMessage());
        
    }        

} //Fim inserirAlunos


// Início lerUmAluno
function lerUmAluno(
    PDO $conexao, 
    int $id,
    
    ):array {
    $sql = "SELECT * FROM alunos WHERE id = :id";
    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(":id", $id, PDO::PARAM_INT);    

        $consulta->execute();
        $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $erro) {
        die("Erro ao carregar dados: ".$erro->getMessage());
    }    
    return $resultado;
} //lerUmAluno

    
  // Início excluirAluno
  function excluirAluno(PDO $conexão, int $id):void{
    $sql = "DELETE FROM alunos WHERE id = :id"; 

   try {
       $consulta = $conexão->prepare($sql);
       $consulta->bindValue(":id", $id, PDO::PARAM_INT);
       $consulta->execute();
    
   } catch (Exception $erro) {
        die ("Erro ao excluir: " .$erro->getMessage());
   }
  } // Fim excluirAluno