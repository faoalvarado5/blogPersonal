<?php

  include "DAOUsuarios.php";

  $home = "home.html";

  $usuario = $_POST["usuario"];
  $contrasena = $_POST["contrasena"];

  $dao = new DAOUsuarios();
  if($dao->updatePassword($usuario, $contrasena) == 1){
	  
	  echo "Contrasena actualizada correctamente.";
	  include_once $home;
  }
  else {
	  
	  echo "Error al actualizar.";
	  include_once $home;
  }

?>
