<?php

require_once "src/funcoes-alunos.php";
require_once "src/funcoes-utilitarias.php";

$id = filter_input (INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
excluirAluno($conexão, $id);

header("location: visualizar.php");