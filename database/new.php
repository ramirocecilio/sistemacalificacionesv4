<?php
 use Illuminate\Database\Capsule\Manager as DB;
 require '../vendor/autoload.php';
 require 'conection.php';
 DB::table('alumnos')
    ->updateOrInsert(
        ['idalumnos' => $_POST['id'],
         'nombre' => $_POST['usuario'],
        'apellido1' => $_POST['apellido1'],
        'apellido2' => $_POST['apellido2'],
        
       ]
    );
    DB::table('calificaciones')->insert([
        ['idcalificaciones' => $_POST['id'],
        'español' => $_POST['es'],
        'matematicas' => $_POST['mate'],
        'historia' => $_POST['his'],
        'idalumno'=> $_POST['id']]

    ]);
 header('location:../inicio.php');   
?>