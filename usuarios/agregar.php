<?php

require_once "usuario.php";
session_start();
$usuario=$_SESSION["usuario"];
$bandera=false;//listado
if (!empty($usuario)) {
    if (!empty($_POST)) {
    	
    	$usuario->nuevaSolicitud($usuario->pk_usuario,$_POST['correo'],"4",$_POST['id']); //tabla mia
    	$usuario->nuevaSolicitud($_POST['id'],$usuario->correo,"1",$usuario->pk_usuario);//tabla del enviado
    	header("Location:buscar.php");
    }else
    {
      header("Location:buscar.php");
    }
}else{
    header("Location:../index.php");
}
//1 nueva
//2 bloqueado
//amigo
?>


