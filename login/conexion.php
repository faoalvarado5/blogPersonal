<?php

class conexion {
	
  private static $DBconexion;
  private static $DBserver = "localhost";
  private static $DBusuario = "root";
  private static $DBcontrasena = "";
  private static $DBbase = "login";
  
  public static function conectar() {

	  self::$DBconexion = new mysqli(self::$DBserver, self::$DBusuario, self::$DBcontrasena, self::$DBbase);

	  if (self::$DBconexion->connect_error) {
		  die("ERROR: " . self::$DBconexion->connect_error);
	  }
	  return self::$DBconexion;
  }
}
?>