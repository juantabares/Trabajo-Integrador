<?php

require_once("repositorioUsuarios.php");
require_once("usuario.php");

class RepositorioUsuariosSQL extends RepositorioUsuarios {
  protected $conexion;

  public function __construct($conexion) {
    $this->conexion = $conexion;
  }

  public function guardarUsuario(Usuario $usuario) {

   if ($usuario->getId() == NULL) {

      $sql = "INSERT INTO usuarios values(default, :nombre, :apellido, :usuario, :email, :password, :fecha_nacim, :lugar_nacim, :genero, :viajero, :donde)";
      $stmt = $this->conexion->prepare($sql);
   }
   else {
      $sql = "UPDATE usuarios set nombre = :nombre, apellido = :apellido, usuario = :usuario, email = :email, password = :password, fecha_nacim= :fecha_nacim, lugar_nacim = :lugar_nacim, genero = :genero, viajero = :viajero, donde = :donde, contanos = :contanos  WHERE id = :id";
      $stmt = $this->conexion->prepare($sql);
      $stmt->bindValue(":id", $usuario->getId(), PDO::PARAM_INT);
   }

   $stmt->bindValue(":nombre", $usuario->getNombre(), PDO::PARAM_STR);
   $stmt->bindValue(":apellido", $usuario->getApellido(), PDO::PARAM_STR);
   $stmt->bindValue(":usuario", $usuario->getUsuario(), PDO::PARAM_STR);
   $stmt->bindValue(":email", $usuario->getEmail(), PDO::PARAM_STR);
   $stmt->bindValue(":password", $usuario->getPassword(), PDO::PARAM_STR);
   $stmt->bindValue(":fecha_nacim", $usuario->getFecha_Nacim(), PDO::PARAM_STR);
   $stmt->bindValue(":lugar_nacim", $usuario->getLugar_Nacim(), PDO::PARAM_STR);
   $stmt->bindValue(":genero", $usuario->getGenero(), PDO::PARAM_STR);
   $stmt->bindValue(":viajero", $usuario->getViajero(), PDO::PARAM_STR);
   $stmt->bindValue(":donde", $usuario->getDonde(), PDO::PARAM_STR);
   $stmt->execute();
 }

 public function traerTodos() {
    $sql = "Select * from usuario";

    $stmt = $this->conexion->prepare($sql);

    $stmt->execute();

    return Usuario::crearDesdeArrays($stmt->fetchAll(PDO::FETCH_ASSOC));
  }

  public function buscarPorMail($email) {
    $sql = "Select * from usuario where email = :email";

    $stmt = $this->conexion->prepare($sql);

    $stmt->bindValue(":email", $email, PDO::PARAM_STR);

    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result != false) {
        return Usuario::crearDesdeArray($result);
    }
    else {
      return NULL;
    }

  }

public  function buscarPorId($id) {
    $sql = "Select * from usuario where id = :id";

    $stmt = $this->conexion->prepare($sql);

    $stmt->bindValue(":id", $id, PDO::PARAM_INT);

    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result != false) {
        return Usuario::crearDesdeArray($result);
    }
    else {
      return NULL;
    }
  }

  public function borrarUsuario(Usuario $usuario) {
    $sql = "DELETE FROM usuario where id = :id";
    $stmt = $this->conexion->prepare($sql);

    $stmt->bindValue(":id", $usuario->getId(), PDO::PARAM_INT);

    $stmt->execute();
  }
}

?>
