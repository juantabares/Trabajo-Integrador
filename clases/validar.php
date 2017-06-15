<?php

class Validador {

// REGISTRO

public function validarRegistro($informacion, RepositorioUsuarios $repo) {
    $errores = [];

    $nombre = trim($informacion["nombre"]);

    if (strlen($nombre) == 0 || strlen($nombre) < 3){
      $errores["nombre"] = "No es un nombre válido";
    }

    $apellido = trim($informacion["apellido"]);

    if (strlen($apellido) == 0 || strlen($apellido) < 3){
      $errores["apellido"] = "No es un apellido válido";
    }

    $usuario = trim($informacion["usuario"]);

    if (strlen($usuario) < 7){
      $errores["usuario"] = "El usuario debe tener más de 7 caracteres";
    }

    $email = trim($informacion["email"]);

    if (strlen($email) == 0){
      $errores["email"] = "El e-mail ingresado no es válido";
    } else if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errores["email"] = "No es un e-mail correcto";
    } else if ($repo->buscarPorMail($email) != false) {
      $errores["email"] = "El mail ya existe";
    }

    if($informacion["password"]==""){
      $errores["password"] = "Por favor ingresa tu contraseña";
    }

    if($informacion["password_conf"]==""){
    $errores["password_conf"] = "Confirmá tu contraseña";
    }

    if ($informacion["password"] != "" && $informacion["password_conf"] != "" && $informacion["password"] != $informacion["password_conf"]) {
      $errores["password"] = "Las contraseñas no coinciden";
    }
    return $errores;
  }


// LOG IN

function validarLogin($datos, RepositorioUSuarios $repo) {
    $errores = [];

    $email = trim($datos["email"]);

    if (strlen($email) == 0) {
      $errores["email"] = "El correo electrónico ingresado es incorrecto";
    } else if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errores["email"] = "El correo elertrónico ingresado no es válido";
    } else if ($repo->buscarPorMail($email) == false) {
      $errores["email"] = "El usuario no existe";
    } else {
      // Existe
      $usuario = $repo->buscarPorMail($email);

      if (password_verify($datos["password"], $usuario->getPassword()) == false) {
        $errores["email"] = "Error de login";
      }
    }
    return $errores;
}
}

?>
