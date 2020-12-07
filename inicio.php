<?php
use Illuminate\Database\Capsule\Manager as DB;
require 'vendor/autoload.php';
require 'database/conection.php';
session_start();
$users = DB::table('alumnos')
            ->leftJoin('calificaciones', 'calificaciones.idalumno', '=', 'alumnos.idalumnos')
            ->get();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="node_modules/bulma/css/bulma.min.css" rel="stylesheet">
    <title>inicio</title>
</head>
<body>
    
<section class="hero is-primary">
        <div class="hero-body">
          <div class="container">
            <h1 class="title">
              SISTEMA ESCOLAR
            </h1>
            <h2 class="subtitle">
              REGISTRO DE CALIFICACIONES
            </h2>
          </div>
        </div>
      </section>
      <br>
      <br>
      <br>
      <br>
      <h1 class="title">BIENVENIDO</h1>
    <h2 class="subtitle"><?php echo $_SESSION['usuario'];?></h2>
    <br>
    <br>
    <br>
    <a href="index.html" class="button is-primary">volver</a>
    <?php if($_SESSION['usuario']=="maestro"){?>
    
    
    <a href="calificacion.php" class="button is-primary">nueva calificacion</a> 
    <?php } ?>
    <table class="table"align="center">
        <thead>
            <tr>
                <th>id</th>
                <th>Nombre</th>
                <th>Español</th>
                <th>Matematicas</th>
                <th>Historia</th>
                <th>promedio</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($users as $valor ) {
               
            ?>
            <tr>
                <td>
                    <?php echo $valor->idalumnos;?> 
                </td>
                <td>
                    <?php echo $valor->nombre;?> <?php echo $valor->apellido1;?> <?php echo $valor->apellido2;?> 
                </td>
                <td>
                    <?php echo $valor->español;?> 
                </td>
                <td>
                    <?php echo $valor->matematicas;?> 
                </td>
                <td>
                    <?php echo $valor->historia;?> 
                </td>
                <td>
                    <?php echo (($valor->español + $valor->matematicas + $valor->historia)/3);?> 
                </td>
                <?php if($_SESSION['usuario']=="maestro"){?>
                <td>
                <div class="buttons">
                    <a href="modificar.php?id=<?php echo $valor->idalumnos;?>" class="button is-primary">modificar</a>
                    </div>
                </td>
                <?php } ?>
            </tr>
            <?php } ?>

        </tbody>

            
        
    </table>
</body>
</html>