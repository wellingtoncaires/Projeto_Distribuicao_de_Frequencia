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

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/stylesheet.css">
    <link rel="shortcut icon" href="./assets/Images/favicon.png" type="image/x-icon">
    <title>Tabela</title>
</head>
<body>
    <header class="header">
            <div class="logo">
                <img src="./assets/Images/simbolo-estatistica-negativa.png" alt="simbolo-estatistica-negativa.png">
            </div>
            <div class="menu">
                <nav>
                    <ul>
                        <li>
                            <a href="index.html">HOME</a>
                        </li>
                        <li>
                            <a href="input.php">INICIAR</a>
                        </li>
                        <li>
                            <a href="alunos.html">ALUNOS</a>
                        </li>
                        <li>
                            <a href="sobre.html">SOBRE O PROJETO</a>
                        </li>
                    </ul>
                </nav>
            </div>
    </header>
    <div class="content">
        <main>
            <h1>TABELA DE DISTRIBUIÇÃO DE FREQUÊNCIA</h1>
            <h2><?= $field ?></h2>
            <div>
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr colspan="2">
                            <th scope="col"  colspan="3" style="text-align:center;">
                                <?= $field ?>
                            </th>
                            <th scope="col" style="text-align:center;">
                                &#402;<sub>i</sub>
                            </th>
                            <?php if($gap): ?>
                                <th scope="col" style="text-align:center;<?= $style ?>">
                                    PONTO MÉDIO
                                </th>
                            <?php endif ?>
                            <th scope="col" style="text-align:center;">
                                &#402;r<sub>i</sub>
                            </th>
                            <th scope="col" style="text-align:center;">
                                P<sub>i</sub>(%)
                            </th>
                            <th scope="col" style="text-align:center;">
                                F<sub>ac</sub>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $c = 0;
                            for($i = 0; $i < $fieldSize; $i++): 
                                $c += $counter[$i];
                            ?>
                            <tr scope="row">
                                <?php
                                    if($gap == 1){
                                        echo '<td style="text-align:center;">';
                                        echo $val['ini'][$i];
                                        echo '</td>';
                                        echo '<td style="text-align:center;">|--</td>';
                                        echo '<td style="text-align:center;">';
                                        echo $val['end'][$i];
                                        echo '</td>';
                                    } else {
                                        echo '<td  colspan="3" style="text-align:center;">';
                                        echo $val[$i];
                                        echo '</td>';
                                    }
                                ?>
                                <td style="text-align:center;"><?= $counter[$i]?></td>
                                <?php if($gap): ?>
                                    <td style="text-align:center;"><?= $mediumPoint[$i]?></td>
                                <?php endif ?>
                                <td style="text-align:center;"><?= $fration[$i]?></td>
                                <td style="text-align:center;"><?= $fration[$i]*100 ?></td>
                                <td style="text-align:center;"><?= $c ?></td>
                            </tr>      
                        <?php endfor ?>
                    </tbody>
                    <tfoot class="table-light">
                        <tr>
                            <td colspan="3" style="font-weight: 700; text-align:center;">TOTAL</td>  
                            <td style="text-align:center;"><?= $totField ?></td>
                            <td style="text-align:center;"></td>
                            <td style="text-align:center;"><?= round(array_sum($fration)) ?></td>
                            <td style="text-align:center;"><?= round(array_sum($fration)*100) ?></td>
                            <td style="text-align:center;"></td>
                        </tr>          
                    </tfoot>
                </table>
            </div>
        </main>
        <div class="buttons">
            <a class="btn btn-primary btn-collor-green" href="input.php">Voltar</a>
        
            <input type="button" class="btn btn-secondary" value="Imprimir" name="print" id="print" onclick="printTable()">
        </div>
    </div>
    <footer class="footer">
        ADS 2021
    </footer>
    <script src="./assets/javascript/jquery-3.6.0.min.js"></script>
    <script src="./assets/javascript/script.js"></script>  
</body>
</html>