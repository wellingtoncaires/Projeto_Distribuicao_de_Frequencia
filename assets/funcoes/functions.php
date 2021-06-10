<?php

//Calcula a maior casa decimal dentro do array
function decimal(...$num){
    $dec = 0;
    foreach($num as $n){
        if(mb_strpos($n, '.')){
            $size = (strlen($n) - mb_stripos($n, '.'));
            if($size > $dec){
                $dec = $size;
            }
        }
    }
    if($dec > 1){
        $dec--;
        $dec = floatval($dec);

    }
    return $dec;
}

// Fórmula para encontrar o intervalo (passo) da tabela 
function variaveis($dec, ...$num){
    $aT = (max($num)) - (min($num));
    $k = number_format((count($num)**0.5), 4);
    $c = $aT/$k;

    // Ajusta a formatação para não exceder o número de casas decimais dos valores passados
    if ($c != 1){
        $c = number_format($c, $dec, '.', ',');
    }
    return $c;
}

// Retorna um array ou matriz com os valores dos intervalos de frequências
function freq($min, $max, $step, $gap){
    if ($gap == 1){
        $int = ['ini' => [], 'end' => []];
        $k = 0;
        for ($i = $min; $i <= $max; $i += $step){
            $j = $i + $step;
            $int['ini'][$k] = $i;
            $int['end'][$k] = $j;
            $k++;        
        }
        return $int;
    } else {
        $int = [];
        $k = 0;
        $i = $min;
        while(true){
            if($i < $max){
                $int[$k] = $i;
                $i += $step;
                $k++;
            } else if(max($int) < $i){
                $int[$k]  = $i;
            } else {
                break;
            }
        }
        return $int; 
    }
}


// Retorna um array com os valores das frequências (fi)
function freqAbs($ini, $inter, ...$data){
    $freqI = [];
    $step = $ini + $inter;
    $sizeArray = count($data);
    $maxArray = max($data);
    $sumTotal = 0;
    $sumFreqI = 0;
    $cont = 0;
    $c = 0;
    for($i=0; $i < $sizeArray; $i++){
        if($data[$i] >= $ini && $data[$i] < $step){
            $c++;
        }else {
            $freqI[] = $c;
            $cont += $c;
            $c = 0;
            $ini = $step;
            $step += $inter;
            $i--;
        }
        if ($sizeArray - 1 == $i){
            $freqI[] = $c;
            $cont += $c;
            $c = 0;
            $ini = $step;
            $step += $inter;
        } 
    }
    return $freqI;
}
 
function acumSum(...$arr){
    $ret = [];
    $size = count($arr);
    $counter = 0;
    for($i = 0; $i < $size; $i++){
        $counter += $arr[$i];
        $ret[$i] = $counter;
    }
    return $ret;
}