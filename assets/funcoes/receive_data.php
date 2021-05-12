<?php
require_once './assets/funcoes/functions.php';

$data = $_POST['stringjs'];
$field = $_POST['field'];
if ($field == ''){
    $field = "Dados";
}
$gap = $_POST['gap'];
$data = array_map('floatval', explode(" ", $data));

// Arrays usados para implementação (exemplos dos slides aula 8), apagar após testes
// $data = [
//     0.8, 1.0, 1.0, 1.1, 1.3, 1.3, 1.4, 1.5, 1.5,
//     1.6, 1.6, 1.8, 1.8, 1.9, 1.9, 1.9, 2.0, 2.0,
//     2.0, 2.1, 2.1, 2.1, 2.3, 2.3, 2.4, 2.4, 2.5,
//     2.7, 2.7, 2.7, 2.8, 2.9, 2.9, 3.0, 3.0, 3.1,
//     3.2, 3.2, 3.3, 3.7, 3.8, 3.9, 4.2
// ];

// $data = [
//     10, 12, 13, 28, 13, 14, 36, 15, 43, 16,
//     18, 18, 20, 21, 40, 22, 23, 24, 43, 25,
//     26, 27, 29, 31, 30, 32, 15, 42, 40, 42
// ];

// $data = [
//     11, 14, 13, 15, 14, 15, 14, 16, 13, 12,
//     14, 13, 13, 15, 12, 14, 15, 12, 13, 13,
//     14, 14, 14, 11, 12, 15, 13, 15, 16, 16,
//     14, 12, 13, 15, 13, 14, 12, 12, 14, 15
// ];

sort($data);
$dec = decimal(...$data);
$int = variaveis($dec, ...$data);
$min = min($data);
$max = max($data);
$val = freq($min, $max, $int, $gap); // Array ou matriz contendo os valores dos intervalos
$counter = freqAbs($min, $int, ...$data); // Array contento os valores de fi

// Array com valores dos pontos médios (xi)
$mediumPoint = []; 
if($gap == 1){
    $style = "display";
    $valIni = [];
    $valEnd = [];
    $size = sizeof($val['ini']);
    for($i = 0; $i < $size; $i++){
        $valIni[$i] = $val['ini'][$i];
    }
    for($i = 0; $i < $size; $i++){
        $valEnd[$i] = $val['end'][$i];
    }
    for($i = 0; $i < $size; $i++){
        $mediumPoint[$i] = ($valIni[$i] + $valEnd[$i]) / 2;
    }
}

// Variáveis e iterações para formar o array que contém os valores de fri
$fieldSize = count($counter);
$totField = array_sum($counter);
$fration = []; // Array com os valores das frações (fri)
for ($i = 0; $i < $fieldSize; $i++){
    $fration[$i] = number_format(($counter[$i] / $totField), 4);
}

$fiSum = acumSum(...$counter); // Array com as somas acumulativas (Fac)
?>