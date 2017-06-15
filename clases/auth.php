<?php

class Auth {

  public static $auth;

  public static function crearAuth() {
    if (self::$auth == null) {
      self::$auth = new Auth();
    }
    return self::$auth;
  }

  private function __construct() {
      session_start();

      if (isset($_COOKIE["idUsuario"])) {
        $this->loguear($_COOKIE["idUsuario"]);
      }

  }

  public function loguear($id) {
    $_SESSION["idUsuario"] = $id;
  }

  public function estaLogueado() {
   return isset($_SESSION["idUsuario"]);
  }

  public function usuarioLogueado(RepositorioUsuarios $repo) {
   return $repo->buscarPorId($_SESSION["idUsuario"]);
  }

  public function logout() {
    session_destroy();
    setcookie("idUsuario", "", -1);
  }
}


 ?>
