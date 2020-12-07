<?php
use Illuminate\Database\Capsule\Manager as DB;
require 'vendor/autoload.php';
require 'database/conection.php';
$id=intval($_GET['id']);
$users = DB::table('alumnos')
            ->leftJoin('calificaciones', 'calificaciones.idalumno', '=', 'alumnos.idalumnos') 
            ->where('idalumnos','=',$id)
            ->get();

        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="node_modules/bulma/css/bulma.min.css" rel="stylesheet">
    <title>nueva calificacion</title>
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
      <div class="columns is-mobile">
        <div class="column is-three-fifths is-offset-one-fifth">
            <form action="database/mod.php"method="post">
            <?php
            foreach($users as $valor){?>
              <div class="field">
                <label class="label">ID</label>
                <div class="control">
                  <input class="input" name="id" type="text" placeholder="id" value=" <?php echo $valor->idalumnos;?>" disable>
                </div>
              </div>
            <div class="field">
                <label class="label">Nombre</label>
                <div class="control">
                  <input class="input" name="usuario" type="text" placeholder="usuario" value=" <?php echo $valor->nombre;?>">
                </div>
              </div>
              <div class="field">
                <label class="label">Apellido Paterno</label>
                <div class="control">
                  <input class="input" name="apellido1" type="text" placeholder="apellido paterno" value=" <?php echo $valor->apellido1;?>">
                </div>
              </div>
              <div class="field">
                <label class="label">Apellido Materno</label>
                <div class="control">
                  <input class="input" name="apellido2" type="text" placeholder="apellido materno" value=" <?php echo $valor->apellido2;?>">
                </div>
              </div>
              <div class="field">
                <label class="label">Español</label>
                <div class="control">
                  <input class="input" name="es" type="text" placeholder="español" value=" <?php echo $valor->español;?>">
                </div>
              </div>
              <div class="field">
                <label class="label">Matematicas</label>
                <div class="control">
                  <input class="input" name="mate" type="text" placeholder="matematicas" value=" <?php echo $valor->matematicas;?>">
                </div>
              </div>
              <div class="field">
                <label class="label">Historia</label>
                <div class="control">
                  <input class="input" name="his" type="text" placeholder="historia" value=" <?php echo $valor->historia;?>">
                </div>
              </div>
            <?php } ?>
            
              <input type="submit" class="button is-primary" value="modificar" >
              <a href="inicio.php" class="button is-primary" > volver</a>
            </form>
        </div>
      </div>
 
</div>
</div>
</body>
</html>