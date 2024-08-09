<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="./estilo.css"> 
    <title>Cinco Mágico</title>
</head>
<body>



    <?php 
    /* ACA VA EL EJECUTABLE */
    if(isset($_POST["juego"])){
        $txt = "";

        $dado1 = rand(0, 9);
        $dado2 = rand(0, 9);
        $dado3 = rand(0, 9);    
        
        $dados = [$dado1, $dado2, $dado3];
        $creditos = $_POST["creditos"];

        $numerosCinco = 0;

    foreach ($dados as $dado) {
        if ($dado === 5) {
            $numerosCinco++;
        }else{
            $txt = "Ganaste 0 créditos";
        }
    }
    if ($numerosCinco === 1){
        $creditos += 5;
        $txt = "Ganaste 5 créditos";
    }
    if($numerosCinco === 2){
        $creditos += 25;
        $txt = "Ganaste 25 créditos";
    }
    if($numerosCinco === 3){
        $creditos += 100;
        $txt = "Ganaste 100 créditos";
    }
    }else{
        $creditos = 100;
        $txt = "Tira y gana créditos";
    }
    function getDadoClass($dado) {
        return $dado === 5 ? 'numero-cinco' : 'normal';
    }
    ?>

    <h4>Juego de Dados</h4>
    <div class="puntaje">
        <p>Créditos actuales: <?php echo $creditos; ?></p>
        <p><?php echo isset($txt) ? $txt : ""; ?></p>

    </div>

 <form method="post">

    <input type="hidden" name="creditos" value="<?php echo $creditos;?>">    
    
     <input type="text" value="<?php if(isset($dado1)) { echo $dado1; }?>">
     <input type="text" value="<?php if(isset($dado2)) { echo $dado2; }?>">
     <input type="text" value="<?php if(isset($dado3)) { echo $dado3; }?>">
    
     <button type="submit" name="juego">TIRAR</button>

    </form>
</body>
</html>