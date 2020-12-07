<?php
    use Illuminate\Database\Capsule\Manager as DB;
    require '../vendor/autoload.php';
    require 'conection.php';
    session_start();
    $users = DB::table('usuarios')->where('usuario', $_POST['usuario'])->first();
   if ($users->contrasena == $_POST['contraseña']){
       $_SESSION['usuario'] = $users->usuario;
       header('location:../inicio.php');
   }else{
    header('location:../index.html');
   }
    ?>