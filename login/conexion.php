<?php

  private $DBconexion;
  private $DBserver = "localhost";
  private $DBusuario = "root";
  private $DBcontrasena = "";
  private $DBbase = "web";
  
  public function conectar() {

	  self::$DBconexion = new mysqli(self::$DBserver, self::$DBusuario, self::$DBcontrasena, self::$DBbase);

	  if (self::$DBconexion->connect_error) {
		  echo 'error';
		  die("ERROR: " . self::$DBconexion->connect_error);
	  }

	  return self::$DBconexion;
  }
  
  private function cerrar_sesion() {
	  
		$DBconexion -> close();
  }
  
?>