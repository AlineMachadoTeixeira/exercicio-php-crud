<!-- Soma das notas -->
<?php

function somarNotas(int $primeira, int $segunda):float {
    $soma = (($primeira + $segunda) /2);
    return $soma;
}


/* Situação */
function situacao (int $primeira, int $segunda) :string {
    $soma = (($primeira + $segunda) /2);
    if($soma >=  7 ){
        $soma = "Aprovado"  ;        
    } elseif ($soma  >= 5 ){
        $soma = "Recuperação"  ;          
    } else{
        $soma = " Reprovado"; 
    }
    return $soma;
}
