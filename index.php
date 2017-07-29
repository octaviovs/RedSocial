<?php 

session_start();

$_SESSION["usuario"]=null;
unset($_SESSION["usuario"]);

$entro=true;
require_once 'usuarios/usuario.php';

if (!empty($_POST) ) {

  switch ($_POST['opcion']) {
    case 'sesion':
      $miUsuario=new Usuario("",$_POST['correo'],$_POST['clave']);
      if ($miUsuario->validar()) {
        $_SESSION["usuario"]=$miUsuario;
        header("Location:usuarios/menu.php ");
      }
      else{
        $entro=false;
      }
      break;
    case 'registro':
       $NewUsuario=new Usuario($_POST['nombre'],$_POST['correo'],$_POST['clave']);
       if ($NewUsuario->registro()) {
         $NewUsuario->crearTablaAmigos();
         $NewUsuario->crearTablaEstados();
       }else{

        echo "no se pudo registrar ";
       }
      break;
    
  }
}else{

}

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="Octavio" content="">
    <title>Inicio de sesion</title>
    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      </div>
    </nav>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1 class="display-3"> Raspberry Social</h1>
        <p></p>
        <p><a href="#" class="btn  btn-success btn-lg" role="button" data-toggle="modal" data-target="#login-modal">Iniciar</a></p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row ">
        <div class="col-md-4 center">
         <img class="img-responsive img-rounded" align="center" alt="Responsive image" src="imagenes/logo.png" height="240" width="240">
        </div>
        <div class="col-md-8 well">
          <h2>Reguistro</h2>
            <form action="index.php" method="POST" >
            <div class="row ">
                <div class="col-md-3">
                   <input id="nombre" class="form-control" type="text" placeholder="nombre" name="nombre" required>
                <br>
                </div>
                <div class="col-md-3">
                  <input id="correo" class="form-control" type="text" placeholder="correo" name="correo" required>
                </div>
                <div class="col-md-3">
                 <input id="clave" class="form-control" type="password" placeholder="clave"  name="clave" required>
                  <input id="opcion" class="form-control" type="hidden"  name="opcion" value="registro">
                </div>
                  <div class="col-md-3">
                       <button type="submit" class="btn  btn-info btn-lg btn-block" vale="inciar">Registrar</button>                        
                  </div>
            </div>
          </form>
       
       </div>
      </div>
      <hr>

      <footer>
        <p>&copy; Company 2017</p>
      </footer>
    </div> <!-- /container -->



<!-- BEGIN # MODAL LOGIN -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" align="center">
          <img class="img-circle" id="img_logo" src="http://bootsnipp.com/img/logo.jpg">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
          </button>
        </div>
                
                <!-- Begin # DIV Form -->
                <div id="div-forms">              
                    <!-- Begin # Login Form -->
                    <form id="login-form" method="POST" action="index.php">
                    <div class="modal-body">
                <div id="div-login-msg">
                            <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                            </div>
                <input id="login_username" class="form-control" type="text" placeholder="correo" name="correo" required>
                <br>
                <input id="login_password" class="form-control" type="password" placeholder="clave"  name="clave" required>
                <input id="opcion" class="form-control" type="hidden"  name="opcion" value="sesion">
                    <br>
                    
                  </div>
                <div class="modal-footer">
                            <div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block" vale="inciar">iniciar</button>
                            </div>
                </div>
                    </form>
                    <!-- End # Login Form -->
                </div>
                <!-- End # DIV Form -->
      </div>
    </div>
</div>
  
  
  
  
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="bootstrap/js/ie10-viewport-bug-workaround.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
