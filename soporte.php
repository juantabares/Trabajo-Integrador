<?php

require_once("clases/auth.php");
require_once("clases/repositorioSQL.php");
require_once("clases/repositorioJSON.php");
require_once("clases/validar.php");


$auth = Auth::crearAuth();
$validador = new Validador();

$soporte = "sql";

switch ($soporte) {
  case 'sql':
    $db = new RepositorioSQL();
    break;

  case 'json':
    $db = new RepositorioJSON();
    break;
}

 ?>
