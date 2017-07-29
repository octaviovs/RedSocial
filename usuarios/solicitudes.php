<?php

require_once "usuario.php";
session_start();
$usuario=$_SESSION["usuario"];
$personas=null;//listado
if (!empty($usuario)) {
    if (!empty($_POST)) {
      if ($_POST['opcion']=="4") {// eliminae

        $usuario->BajaSolicitud($_POST['id'],$usuario->correo);// eliminarnos desde la tabla del otro amigo
        $usuario->BajaSolicitud($usuario->pk_usuario,$_POST['correo']);// eliminanos de nuestra tabla

      }elseif ($_POST['opcion']=="2") {//aceptar solicitud
        $usuario->ModificarSolicitud($usuario->pk_usuario,$_POST['correo'],"2");//mi tabla
        $usuario->ModificarSolicitud($_POST['id'],$usuario->correo,"2"); // tabla del otro
      } 
      elseif ($_POST['opcion']=="3") {
        $usuario->ModificarSolicitud($usuario->pk_usuario,$_POST['correo'],"3");
        $usuario->ModificarSolicitud($_POST['id'],$usuario->correo,"3");
        
      }
    }
    $personas=$usuario->listar("select * from amigos".$usuario->pk_usuario." inner join usuario on amigos".$usuario->pk_usuario.".correo = usuario.correo where estado = 1");
    
}else{
    header("Location:../index.php");
}

?>




<!DOCTYPE html>
<html >
<head>
  <title>Chef-System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
    
      
    }
    
    /* Add a gray background color and some padding to the footer */
   

  </style>
</head>
<body>

<nav class="navbar navbar-inverse ">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="menu.php">Raspberry </a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="menu.php">Inicio</a></li>
        <li><a href="perfil.php">Perfil</a></li>    
        <li><a href="amigos.php">Amigos</a></li>  
        <li><a href="solicitudes.php">Solicitudes</a></li>  
        <li><a href="buscar.php">Buscar</a></li> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../index.php"><span class="glyphicon glyphicon-log-in"></span> Salir</a></li>
      </ul>
    </div>
  </div>
</nav>


  
<div class="container text-center">    

<font face="Bedrock" size="15">Mis solicitudes ○</font>
  <div class="row">
    <div class="col-sm-4">
    </div>
  <div class="col-sm-8">
  <div class="well">
  </div>
  <?php 
    if (!empty($personas)) {
      foreach ($personas as $persona) {
        
        echo "<div class='panel panel-default'>";
        echo "<div class='panel-body'>";
        echo "<table class='table table-condensed'>";
        echo "<tr>";  
        echo "<td>".$persona['nombre']."</td>";
        echo "<td>".$persona['correo']."</td>";

        echo "<td>";
        echo "<form action='solicitudes.php' method='POST'>";
        echo "<div class='form-group'>";
        echo " <input type='hidden' class='form-control' name='correo' value=".$persona['correo'].">";
        echo " <input type='hidden' class='form-control' name='id' value='".$persona['id']."'>";
        echo " <input type='hidden' class='form-control' name='opcion' value='2'>";
        echo "</div>";
        echo "<button type='submit' class='btn btn-success'>Aceptar</button>";
        echo " </form>";
        echo "</td>";


        echo "<td>";
        echo "<form action='solicitudes.php' method='POST'>";
        echo "<div class='form-group'>";
        echo " <input type='hidden' class='form-control' name='correo' value=".$persona['correo'].">";
        echo " <input type='hidden' class='form-control' name='id' value=".$persona['id'].">";
        echo " <input type='hidden' class='form-control' name='opcion' value='4'>";
        echo "</div>";
        echo "<button type='submit' class='btn btn-warning'>Eliminar</button>";
        echo " </form>";
        echo "</td>";


         echo "<td>";
        echo "<form action='solicitudes.php' method='POST'>";
        echo "<div class='form-group'>";
        echo " <input type='hidden' class='form-control' name='correo' value=".$persona['correo'].">";
        echo " <input type='hidden' class='form-control' name='id' value=".$persona['id'].">";
         echo " <input type='hidden' class='form-control' name='opcion' value='3'>";
        echo "</div>";
        echo "<button type='submit' class='btn btn-danger'>Bloquear</button>";
        echo " </form>";
        echo "</td>";


        echo "</tr> ";
        echo "</table>";
        echo "</div>";
        echo "</div>";

  
        echo "<br>";
      }
    }
   ?>
    </div>
  </div>
</div>
<footer class="container-fluid text-center">
</footer>
</body>
</html>
