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
    <title>Inicio</title>
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
                        </li><li>
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
            <div id="invalid" class="alert alert-danger" role="alert" style="display: none">
                Por favor, insira um valor válido!
            </div>
            <form action="dist_freq.php" id="form1" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="data">Insira os Valores</label>
                        <input type="number" id="data" class="form-control" name="data" value="" placeholder="Insira os valores das amostras"/>
                        <input onclick="validate()" class="btn btn-collor" id="btn1" value="Inserir Valor" size="15px"></input>
                        <input type="hidden" id="stringjs" name="stringjs" value=''>
                        <label for="field" id="fieldname">Nome do campo</label>
                        <input type="text" id="field" class="form-control" name="field">
                        <div class="form-group col-md-6">
                            <label id="fieldradio">Visualizar intervalos</label>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="gap" name="gap" value="1" checked>
                                <label for="gap" class="form-check-label">Sim</label>
                            </div>
                            <div class="form-check-inline">
                                <input type="radio" class="form-check-input" id="no_gap" name="gap" value="0">
                                <label for="no_gap" class="form-check-label">Não</label>
                            </div>
                        </div>
                        <!-- <input onclick="check()" class="btn btn-primary" id="btn2" value="Gerar Tabela" size="15px"></input> -->
                        <button type="submit" id="submit" class="btn btn-collor-green">Gerar Tabela</button>
                    </div>
                </div>
            </form>        
        </main>
    </div>    
    <footer class="footer">
        ADS 2021
    </footer>
    <script src="./assets/javascript/jquery-3.6.0.min.js"></script>
    <script src="./assets/javascript/script.js"></script>    
</body>
</html>