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
function freqAbs($ini, $int, ...$data){
    $freqI = [];
    $step = $ini + $int; //1.8
    $size = count($data);
    $c = 0;
    $j = 0;
    for($i=0; $i <= $size; $i++){
        if($i == $size){
            $freqI[$j] = $c;
        } else {
            if($data[$i] >= $step){
                $step += $int;
                $freqI[$j] = $c;
                $j++;
                $c = 0;
            }
        }
        if ($data[$i] < $step){
            $c += 1;
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