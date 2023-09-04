<?php 
require_once "src/funcoes-alunos.php";

$listaDeAlunos = lerAlunos($conexao);

require_once "src/funcoes-utilitarias.php";

/* Caputurar/Sanitizar depois Chamando a função e recuperando os dados de um produto de acordo com id passado. com o lerUmProduto*/
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
$aluno = lerUmAluno($conexao, $id);


if(isset($_POST['atualizar-dados'])){
	require_once "src/funcoes-alunos.php";

	$nome = filter_input(
		INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
	
	$primeira = filter_input(
		INPUT_POST, "primeira", 
		FILTER_SANITIZE_NUMBER_FLOAT,
        FILTER_FLAG_ALLOW_FRACTION);

	$segunda = filter_input(
		INPUT_POST, "segunda", 
		FILTER_SANITIZE_NUMBER_FLOAT,
        FILTER_FLAG_ALLOW_FRACTION);	    
      	

		// Na página inserir.php, programe os recursos necessários para fazer INSERT no banco	
		atualizarAluno(
			$conexao, $id, $nome, $primeira, $segunda );

    //voltar para pagina visualizar assim que inserir o aluno
	header("location:visualizar.php");		

}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Atualizar dados - Exercício CRUD com PHP e MySQL</title>
<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
<div class="container">
    <h1>Atualizar dados do aluno </h1>
    <hr>
    		
    <p>Utilize o formulário abaixo para atualizar os dados do aluno.</p>

    <form action="#" method="post">
        
        <p><label for="nome">Nome:</label>
	    <input type="text" name="nome" id="nome"  value="<?=$aluno['nome']?>"   required></p>
        
        <p><label for="primeira">Primeira nota:</label>
	    <input type="number" name="primeira" id="primeira" step="0.01" min="0.00" max="10.00"  value="<?=$aluno['primeira']?>"   required></p>
	    
	    
	    <p><label for="segunda">Segunda nota:</label>
	    <input type="number" name="segunda" id="segunda" step="0.01" min="0.00" max="10.00"   value="<?=$aluno['segunda']?>"  required></p>

        <p>
        <!-- Campo somente leitura e desabilitado para edição.
        Usado apenas para exibição do valor da média -->
            <label for="media">Média:</label>
            <input name="media" type="number" id="media" step="0.01" min="0.00" max="10.00"  value="<?= media($aluno["primeira"], $aluno["segunda"])?>"   readonly disabled>
        </p>
        <span id="mensagemErro"></span>

        <p>
        <!-- Campo somente leitura e desabilitado para edição 
        Usado apenas para exibição do texto da situação -->
            <label for="situacao">Situação:</label>
	        <input type="text" name="situacao" id="situacao"
            value="<?= situacao (media($aluno["primeira"], $aluno["segunda"]))?> "  readonly disabled>    
           
        </p>
	    
        <button type="submit" name="atualizar-dados">Atualizar dados do aluno</button>
	</form>    
    
    <hr>
    <p><a href="visualizar.php">Voltar à lista de alunos</a></p>

</div>

<!-- <script src="js/tempo-real.js"></script> -->
<script src="js/tempo-real.js"></script>
</html>