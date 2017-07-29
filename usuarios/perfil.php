<?php

require_once "usuario.php";
session_start();
$usuario=$_SESSION["usuario"];

if (!empty($usuario)) {

      if (!empty($_POST)) {
        if (!empty($_POST['estado'])) {
          $usuario->nuevoEstado($usuario->pk_usuario,$_POST['estado']);
        }
      }else{

      }
     $posts=$usuario->listar("SELECT * FROM estados".$usuario->pk_usuario);
}else{
    header("Location:../index.php ");
}

?>




<!DOCTYPE html>
<html >
<head>
  <title>Perfil</title>
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

<h1>Mi perfil </h1>
  <div class="row">
    <div class="col-sm-4">
    <div class="jumbotron">
      <?php echo "<h2>".$usuario->nombre."</h2>"; ?>
      
      <p>Usuario</p>
      
    </div>
    </div>
	<div class="col-sm-8">

  <div class="well">
   <form action="" method="POST">
 
  <div class="form-group">
    <label for="exampleInputPassword1">Estado</label>
       <textarea class="form-control" rows="3" name="estado"></textarea>
  </div>

  <button type="submit" class="btn btn-warning">Postear</button>
</form>
  </div>
	<?php 
     foreach ( array_reverse($posts) as $post) {
      echo "<div>";
      echo "<div class='panel panel-default'>";
      echo "<div class='panel-body'>";
      echo $post['estado'];
      echo "</div>";
      echo "</div>";
      echo "</div>";
       echo "<br>";
     }
	 ?>
    </div>
  </div>
</div>
<footer class="container-fluid text-center">
</footer>
</body>
</html>