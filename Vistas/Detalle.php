
<?php 

include '../Controls/MetodosControls.php';

$cod=$_REQUEST['cod']; 

$objMetodos = new MetodosControls();
$lista=$objMetodos->ListarProductosCod($cod);

foreach($lista as $row) {

    $nombre=$row[1];
    $precio=$row[2];
    $descripcion=$row[3];
    $imagen=$row[4];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="">
    <div class="mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="data:image/png;base64,<?php echo base64_encode($imagen);?>" width="auto" height="auto" class="card-img" alt="...">
            </div>
            <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title"><?php echo $nombre; ?></h5>
                <p class="card-text"><?php echo $descripcion; ?></p>
                <h5 class="card-text">$ <?php echo $precio; ?></h5>
            </div>
            </div>
        </div>
    </div>
</form>
    
</body>
</html>