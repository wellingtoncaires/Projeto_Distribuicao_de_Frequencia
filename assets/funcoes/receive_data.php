<?php
ini_set("display_errors", 1);
require_once './assets/funcoes/functions.php';

$data = $_POST['stringjs'];
$field = $_POST['field'];
if ($field == ''){
    $field = "Dados";
}
$gap = $_POST['gap'];
$data = array_map('floatval', explode(" ", $data));

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
