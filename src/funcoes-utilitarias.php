<!-- Soma das notas -->
<?php

function media(int $primeira, int $segunda):float {
    $media = (($primeira + $segunda) /2);
    return $media;
}


/* Situação */
function situacao (float $media) :string {
    
    if($media >=  7 ){
        $situacao = "Aprovado"  ;        
    } elseif ($media  >= 5 ){
        $situacao = "Recuperação"  ;          
    } else{
        $situacao = " Reprovado"; 
    }
    return $situacao;
}



