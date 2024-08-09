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
    if(isset($_POST["juego"])){
        $txt = "";

        $dado1 = rand(0, 9);
        $dado2 = rand(0, 9);
        $dado3 = rand(0, 9);    
        
        $dados = [$dado1, $dado2, $dado3];
        
        $creditos = $_POST["creditos"];
        $creditos -= 10;  
        $premios = [ 
            0 => 0,  
            1 => 5,   
            2 => 25,  
            3 => 100  
        ];
        $numerosCinco = 0;
        
        foreach ($dados as $dado) {
            if ($dado === 5) {
                $numerosCinco++;
            }
        }
        $creditos += $premios[$numerosCinco];
        $txt = "Ganaste " . $premios[$numerosCinco] . " créditos";

    } else {
        $creditos = 100;
        $txt = "Ganá o perde";
    }
?>

<h4>Juego de Dados</h4>
<div class="puntaje">
    <p>Empezás con 100 créditos</p>
    <p><?php echo isset($txt) ? $txt : ""; ?></p>
    <p id="creditos"><span>Créditos</span><?php echo $creditos; ?></p>
</div>

<?php if($creditos >= 10): ?>
    <form method="post">
        <input type="hidden" name="creditos" value="<?php echo $creditos; ?>">       
        <input type="text" value="<?php if(isset($dado1)) { echo $dado1; } ?>" readonly>
        <input type="text" value="<?php if(isset($dado2)) { echo $dado2; } ?>" readonly>
        <input type="text" value="<?php if(isset($dado3)) { echo $dado3; } ?>" readonly>    
        <button type="submit" name="juego">TIRAR</button>
    </form>
<?php else: ?>
    <p>No Podes jugar más</p>
<?php endif; ?>

</body>
</html>
