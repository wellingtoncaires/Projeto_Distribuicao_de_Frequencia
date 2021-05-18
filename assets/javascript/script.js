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
    document.getElementById('view').innerHTML = stringJS.value
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
function validate(msg){
    var val = document.getElementById("data").value
    var divErr = document.getElementById('invalid')
    if((val == "") || (val.length > 7)){
         divErr.innerText = msg
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
    text = document.getElementById("main-table")
    print(text)
}

// Exibe os valores dos dados passado para a tabela
function showValues(){
    div = document.getElementById("boxValues")
    btn = document.getElementById('btnShow')
    btnValue = btn.textContent
    if (btnValue == "Exibir Valores"){
        div.style.display = "block"
        btn.textContent = "Ocultar Valores"
    } else{
        div.style.display = "none"
        btn.textContent = "Exibir Valores"        
    }
}

// Função que valida o submit sem valores
function validateForm(form) {
    if (stringJS.value.length >=2) {
        return true
    } else {
        validate("Insira no minímo dois valores para gerar a tabela!")
        return false;
    }
};

// Menu dropdown
function drop(){ 
        if (status != 1){
            document.getElementById('icons').style.display = "block"
            status = 1
        } else {
            document.getElementById('icons').style.display = "none"
            status = 0
        }
}

// Mostrar menu em linha mesmo após ocultar com função drop
window.onresize = function(){
    let screenSize = $(window).width();
    if (screenSize > 720){
        document.getElementById('icons').style.display = "block"
    } else {
        document.getElementById('icons').style.display = "none"
    }
 };