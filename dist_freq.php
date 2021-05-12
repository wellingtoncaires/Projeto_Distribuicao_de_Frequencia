<?php
    require_once './assets/funcoes/receive_data.php';
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
    <header class="header sticky">
            <div class="logo">
                <a href="./index.html"><img src="./assets/Images/simbolo-estatistica-negativa.png" alt="simbolo-estatistica-negativa.png"></a>
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
        <div id="spreadsheet" class="spreadsheet">
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
                <div id="boxValues" class="spreadsheet" style="display: none;">
                    <?php foreach($data as $d)
                        echo "<span>$d; </span>";
                    ?>
                </div>
            </main>
            <div class="buttons">
                <div class="buttons-nav">
                    <a class="btn btn-primary btn-collor" href="input.php">Voltar</a>
                    <button id="btnShow" class="btn btn-collor-green" onclick="showValues()">Exibir Valores</button>
                </div>            
                <div class="buttons-print">
                    <input type="button" class="btn btn-secondary" value="Imprimir" name="print" id="print" onclick="printTable()">
                </div>            
            </div>
        </div>
    <script src="./assets/javascript/jquery-3.6.0.min.js"></script>
    <script src="./assets/javascript/script.js"></script>  
</body>
</html>