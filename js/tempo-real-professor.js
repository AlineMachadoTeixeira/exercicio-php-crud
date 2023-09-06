//JS na página atualizar.php

/* Selecionando os elementos a serem manipulados via JS.
Usamos o querySelector para acessá-los através de seletores conhecidos
(tag, id). Poderia ser feito com getElementById desde que cada
elemento tenha um id. */

const formulario =document.querySelector("form");
//Selecione os campos que deseja procura const  ("form") vai procurar so no formularios
const inputPrimeira = formulario.querySelector("#primeira");
const inputSegunda = formulario.querySelector("#segunda");
const inputMedia = formulario.querySelector("#media");
const inputSituacao = formulario.querySelector("#situacao");



//criando variavel para guardar. e usar na linha 47 e 59
/* Declarando variáveis para lidar com os novos
valores que serão digitados (primeira e segunda) 
e/ou alterados (media e situacao) */
let primeira, segunda, media, situacao;


/* Funções para verificar da média */
function atualizarMedia(nota1, nota2){
  return (nota1 + nota2) / 2;
}

/* Funções para verificar da situação */
function atualizarSituacao(resultadoDaMedia){
  if(resultadoDaMedia >= 7){
    situacao = "Aprovado";
  }else if(resultadoDaMedia >= 5){
    situacao = "recuperação";
  }else {
    situacao = "reprovado";
  }

  return situacao

}

// Capturar o evento se fosse click seria "click" no exercicio era input capturar em tempo real
/* Manipulando os eventos de captura/digitação em tempo real */

// Monitorando o valor digitado no campo de primeira nota
inputPrimeira.addEventListener("input", function(){
   primeira = parseFloat(this.value); // Capturando o valor digitado e garantindo que é número

   media = atualizarMedia (primeira, parseFloat(inputSegunda.value));    // Passando a nova primeira nota (digitada) e a segunda nota (já existente no segundo campo) para a função de atualizar a média

   inputMedia.value = media.toFixed(2);  // Exibindo a nova média no campo readonly de média

   inputSituacao.value = atualizarSituacao(media); // Exibindo a nova situação no campo readonly de situação
});


// Mesma coisa da linha 47 a 55
inputSegunda.addEventListener("input", function(){
  segunda = parseFloat(this.value);
  media = atualizarMedia (parseFloat(inputPrimeira.value), segunda );
  inputMedia.value = media.toFixed(2);
  inputSituacao.value = atualizarSituacao(media);
});




