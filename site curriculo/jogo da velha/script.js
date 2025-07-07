var jogador = "X";

function jogar(celula){
//compra a celula  esta vazia para assim escrever
    if(celula.innerHTML == ""){


//escreva letra na celula
celula.innerHTML = jogador;
//altrna a variavel jogador para a proxima jogada
if(jogador == "X"){
    jogador = "O";
    celula.style.backgroundColor = "red";
}else{
    jogador = "X";
     celula.style.backgroundColor = "blue";
}
    }
}

function reiniciar(){
    window.location.reload();
}