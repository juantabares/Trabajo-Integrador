<?php

require_once ("funciones.php")



  if (usuarioLogueado()){
    logout();
    header("location:index.php");
    exit();
  }



?>
