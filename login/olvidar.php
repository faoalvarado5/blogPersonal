<?php

  include "DAOUsuarios.php";

  $usuario = $_POST["usuario"];
  $contrasena = $_POST["contrasena"];

  $dao = new DAOUsuarios();
  if($dao->updatePassword($usuario, $contrasena) == 1){
	  
	  echo "Contrasena actualizada correctamente.";
  }
  else {
	  
	  echo "Error al actualizar.";
  }

?>
