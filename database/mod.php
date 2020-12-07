<?php
    use Illuminate\Database\Capsule\Manager as DB;
    require '../vendor/autoload.php';
    require 'conection.php';
    DB::table('alumnos')
              ->where('idalumnos', $_POST['id'])
              ->update(['nombre' => $_POST['usuario'], 'apellido1' => $_POST['apellido1'], 'apellido2' => $_POST['apellido2']]);
    
        DB::table('calificaciones')
              ->where('idcalificaciones', $_POST['id'])
              ->update(['español' => $_POST['es'], 'matematicas' => $_POST['mate'], 'historia' => $_POST['his']]);
              
              header('location:../inicio.php');
    ?>
    