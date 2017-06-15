<?php
require_once("repositorioUsuarios.php");
require_once("usuario.php");

class RepositorioUsuariosJSON extends RepositorioUsuarios {
  public function guardarUsuario(Usuario $usuario) {
    if ($usuario->getId() == null) {
      $usuario->setId($this->traerNuevoId());

      $json = json_encode($usuario->toArray());

      $json = $json . PHP_EOL;

      file_put_contents("base-usuarios.json", $json, FILE_APPEND);
    } else {
      $todos = $this->traerTodos();

      file_put_contents("base-usuarios.json", "");

      foreach ($todos as $usuarioJSON) {
        if ($usuarioJSON->getId() != $usuario->getId()) {
          $json = json_encode($usuarioJSON->toArray());

          $json = $json . PHP_EOL;

          file_put_contents("base-usuarios.json", $json, FILE_APPEND);
        } else {
          $json = json_encode($usuario->toArray());

          $json = $json . PHP_EOL;

          file_put_contents("base-usuarios.json", $json, FILE_APPEND);
        }

      }
    }
  }

  public function traerTodos() {

    $archivo = file_get_contents("base-usuarios.json");


    $usuariosJSON = explode(PHP_EOL, $archivo);

    array_pop($usuariosJSON);

    $usuariosFinal = [];

    foreach($usuariosJSON as $json) {
      $usuariosFinal[] = Usuario::crearDesdeArray(json_decode($json, true));
    }

    return $usuariosFinal;
  }

  public function buscarPorId($id) {
    $todos = $this->traerTodos();

    foreach ($todos as $usuario) {
      if ($usuario->getId() == $id) {
        return $usuario;
      }
    }

    return false;
  }

  public function buscarPorMail($mail) {
    $todos = $this->traerTodos();

    foreach ($todos as $usuario) {
      if ($usuario->getMail() == $mail) {
        return $usuario;
      }
    }

    return false;
  }

  private function traerNuevoId() {
    $usuarios = $this->traerTodos();

    if (count($usuarios) == 0) {
      return 1;
    }

    $elUltimo = array_pop($usuarios);

    $id = $elUltimo->getId();

    return $id + 1;
  }

  public function borrarUsuario(Usuario $usuario) {
    $todos = $this->traerTodos();

    file_put_contents("base-usuarios.json", "");

    foreach ($todos as $usuarioJSON) {
      if ($usuarioJSON->getId() != $usuario->getId()) {
        $json = json_encode($usuarioJSON->toArray());

        $json = $json . PHP_EOL;

        file_put_contents("base-usuarios.json", $json, FILE_APPEND);
      }

    }
  }
}


?>
