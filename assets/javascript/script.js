var data = ""
var stringJS = document.getElementById('stringjs')

// Concatena os dados do input em uma string js
function inputValue(){
    data.replace(',', '.');
    if (data == ""){
        data += $('#data').val();        
    } else {
        data += " " + ($('#data').val());        
    }

    // Insere os valores criados na string no input do form
    stringJS.value = data
    console.log(stringJS)

    limpar()
}

// Aciona o botão de inserir dados através da tecla
document.addEventListener("keyup",function(event){
    if(event.key === "Enter"){
        this.getElementById('btn1').click()
    }
})

// // Limpa a caixa do input
function limpar(){
    document.getElementById("data").value = "";
}

// Função que cancela a ação de enviar o form com enter
$(document).ready(function() {
    $('form#form1').keypress(function(e) {
        if ((e.keyCode == 10)||(e.keyCode == 13)) {
            e.preventDefault();
        }
    });
});

// Função que valida o input
var s = 0;
function validate(msg='Por favor informe umnúmero válido!'){
    var val = document.getElementById("data").value
    if(val == ""){
        val = msg
        $("#invalid").fadeIn();
        s = 1;
    } else if (val != "" && s == 1){
        $("#invalid").fadeOut();
        inputValue()
    } else {
        inputValue()
    }
}

// Função imprimir
function printTable(text){
    text=document.getElementById("table")
    print(text)
}

// Função que valida o submit sem valores
