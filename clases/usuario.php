<?php

class Usuario {
  private $id;
  private $nombre;
  private $apellido;
  private $usuario;
  private $email;
  private $password;
  private $fecha_nacim;
  private $lugar_nacim;
  private $genero;
  private $viajero;
  private $donde;


  public function __construct($id, $nombre, $apellido, $usuario, $email, $password,$fecha_nacim, $lugar_nacim, $genero, $viajero, $donde) {
    $this->id = $id;
    $this->nombre = $nombre;
    $this->apellido = $apellido;
    $this->usuario = $usuario;
    $this->email = $email;
    $this->password = $password;
    $this->fecha_nacim = $fecha_nacim;
    $this->lugar_nacim = $lugar_nacim;
    $this->genero = $genero;
    $this->viajero = $viajero;
    $this->donde = $donde;
  }


public static function hashPassword($password) {
    return password_hash($password, PASSWORD_DEFAULT);
}

public static function crearDesdeArray(Array $datos) {
  var_dump($datos);exit;
    if (!isset($datos["id"])) {
        $datos["id"] = NULL;
}


    return new Usuario(
      $datos["id"],
      $datos["nombre"],
      $datos["apellido"],
      $datos["usuario"],
      $datos["email"],
      $datos["password"],
      $datos["fecha_nacim"],
      $datos["lugar_nacim"],
      $datos["genero"],
      implode($datos["viajero"], "-"),
      implode($datos["donde"], "-")
    );
}

public static function crearDesdeArrays(Array $usuarios) {
    $usuariosFinal = [];

    foreach ($usuarios as $usuario) {
      $usuariosFinal[] = self::crearDesdeArray($usuario);
    }

    return $usuariosFinal;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getId() {
    return $this->id;
  }

  public function setNombre($nombre) {
    $this->nombre = $nombre;
  }

  public function getNombre() {
    return $this->nombre;
  }

  public function setApellido($apellido) {
    $this->apellido = $apellido;
  }

  public function getApellido() {
    return $this->apellido;
  }

  public function setUsuario($usuario) {
    $this->usuario = $usuario;
  }

  public function getUsuario() {
    return $this->usuario;
  }

  public function setEmail($email) {
    $this->email = $email;
  }

  public function getEmail() {
    return $this->email;
  }

  public function setFecha_Nacim($fecha_nacim) {
    $this->fecha_nacim = $fecha_nacim;
  }

  public function getFecha_Nacim() {
    return $this->fecha_nacim;
  }

  public function setLugar_Nacim($lugar_nacim) {
    $this->lugar_nacim = $lugar_nacim;
  }

  public function getLugar_Nacim() {
    return $this->lugar_nacim;
  }

  public function setGenero($genero){
    $this->genero = $genero;
  }

  public function getGenero() {
    return $this->genero;
  }

  public function setViajero($viajero){
    $this->viajero = $viajero;
  }

  public function getViajero() {
    return $this->viajero;
  }

  public function setDonde($donde){
    $this->donde = $donde;
  }

  public function getDonde() {
    return $this->donde;
  }

  public function getPassword() {
    return $this->password;
  }


//  IMAGEN

  public function getFoto() {
    $file = glob('img-base/'. $usuario->getUsuario() .'.*');

    $file = $file[0];

    return $file;
  }


  public function guardarImagen($imagen, $errores) {
  		if ($_FILES[$imagen]["error"] == UPLOAD_ERR_OK)
  		{
        $usuario=$_POST["usuario"];
  			$nombre=$_FILES[$imagen]["name"];
  			$archivo=$_FILES[$imagen]["tmp_name"];

  			$ext = pathinfo($nombre, PATHINFO_EXTENSION);
        if ($ext == "jpg" || $ext == "jpeg" || $ext == "png") {
    			$miArchivo = dirname(__FILE__);
    			$miArchivo = $miArchivo . "/../img-base/";
    			$miArchivo = $miArchivo . $this->usuario . "." . $ext;
    			move_uploaded_file($archivo, $miArchivo);
        }
        else {
          $errores["imagen"] = "No es una imágen";
        }
  		} else {
          $errores["imagen"] = "No se pudo subir la imagen";
      }
      return $errores;
  	}

  public function guardar(RepositorioUsuarios $repo) {
    $repo->guardarUsuario($this);
  }

  public function toArray() {
    return [
      "id" => $this->getId(),
      "nombre" => $this->getNombre(),
      "apellido" => $this->getApellido(),
      "usuario" => $this->getUsuario(),
      "email" => $this->getEmail(),
      "password" => $this->getPassword(),
      "fecha_nacim" => $this->getFecha_Nacim(),
      "lugar_nacim" => $this->getLugar_Nacim(),
      "genero" => $this->getGenero(),
      "viajero" => $this->getViajero(),
      "donde" => $this->getDonde()
    ];
  }

}


 ?>
