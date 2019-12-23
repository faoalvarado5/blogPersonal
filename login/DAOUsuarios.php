<?php

class DAOUsuarios {

  private static $DBconexion;
  private static $DBserver = "localhost";
  private static $DBusuario = "root";
  private static $DBcontrasena = "";
  private static $DBbase = "login";

  function __construct() {
	  
	  self::$DBconexion = new mysqli(self::$DBserver, self::$DBusuario, self::$DBcontrasena, self::$DBbase);
  }

  public function getUser($usuario) {
	  
    if ($statement = self::$DBconexion->prepare("select * from usuario where usuario = ?")) {
      $statement->bind_param("s", $usuario);
      $statement->execute();
      $resultado = $this->procesarUsuario($statement->get_result());
      $statement->close();
    }
    self::$DBconexion->close();

    return $resultado;
  }
  
  public function procesarUsuario($queryResult) {
    if ($queryResult->num_rows > 0) {
      $row = $queryResult->fetch_assoc();
      return new Usuario($row['usuario'], $row['nombre'], $row['apellido1'], $row['apellido2'], $row['contrasena'], $row['email'], $row['telefono'], $row['fecha']);
    }
    else {
      exit("Usuario no encontrado.");
      return NULL;
    }
  }

  public function insertar($user) {
	  
      if ($statement = self::$DBconexion->prepare("insert into usuario values (?, ?, ?, ?, ?, ?, ?, ?);")) {

        $usuario = $user->getUsuario();
        $nombre = $user->getNombre();
        $apellido1 = $user->getApellido1();
        $apellido2 = $user->getApellido2();
        $contrasena = $user->getContrasena();
        $email = $user->getEmail();
        $telefono = $user->getTelefono();
        $fecha = $user->getFecha();

        $statement->bind_param("ssssssss", $usuario, $nombre, $apellido1, $apellido2, $contrasena, $email, $telefono, $fecha);
        $result = $statement->execute();
        $statement->close();
		return 1;
      }
      self::$DBconexion->close();
      return 0;
  }

  public function updatePassword($usuario, $contrasena) {
	 
	 if($statement = self::$DBconexion->prepare("update usuario set contrasena = ? where usuario = ?;")){
		  
		$statement->bind_param("ss", $contrasena, $usuario);
		$statement->execute();
		$statement->close();
		return 1; 
	  }
		self::$DBconexion->close();
		return 0;
  }

}
?>
