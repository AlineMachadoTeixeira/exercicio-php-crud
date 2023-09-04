<?php 
require_once "src/funcoes-alunos.php";

$listaDeAlunos = lerAlunos($conexao);

require_once "src/funcoes-utilitarias.php";

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Lista de alunos - Exercício CRUD com PHP e MySQL</title>
<link rel="stylesheet" href="css/estilo.css">
</head>
<body>

    <h1>Lista de alunos</h1>
    <hr>
    <p><a href="inserir.php">Inserir novo aluno</a></p>

   <!-- Aqui você deverá criar o HTML que quiser e o PHP necessários
para exibir a relação de alunos existentes no banco de dados.

Obs.: não se esqueça de criar também os links dinâmicos para
as páginas de atualização e exclusão. -->


<!-- EM CASA  -->
        <table>
            <caption>Lista de Alunos</caption>
            <tr>
                <th>Id</th>
                <th>Nome Aluno</th>
                <th>1ª Nota</th>
                <th>2ª Nota</th>
                <th>Media</th>
                <th>Situação</th>
                <th colspan="2">Opções</th>
            </tr>
            <?php 
            foreach ($listaDeAlunos  as $aluno ){       
            ?> 

            <tr class="<?=situacao (media($aluno["primeira"], $aluno["segunda"]))?>">

                <td><?=$aluno["id"]?></td>
                <td><?=$aluno["nome"]?></td>
                <td><?=$aluno["primeira"]?></td>
                <td><?=$aluno["segunda"]?></td>

                <td>
                    <?=media($aluno["primeira"], $aluno["segunda"])?>

                </td>

                
                <td class="<?=situacao (media($aluno["primeira"], $aluno["segunda"]))?>">
                    <?=situacao (media($aluno["primeira"], $aluno["segunda"]))?>
                </td>

                
                <!-- Link dinanmico é o "atualizar.php?id $produto["id"]?>" -->
                <td class="opcao ">
                    <a href="atualizar.php?id=<?=$aluno["id"]?>">Atualizar</a>
                </td>
                
                <td class="opcao ">
                    <a class="excluir" href="excluir.php?id=<?=$aluno["id"]?>">Excluir</a>
                </td>

            </tr>
            <?php       
            }
            ?>        
                   

        </table> 

    <hr>
    <p><a href="index.php">Voltar ao início</a></p>

    <script src="js/confirmar-exclusao.js"></script> 





</body>
</html>