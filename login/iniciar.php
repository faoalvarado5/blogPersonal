<?php

  include "Usuario.php";
  include "DAOUsuarios.php";

  $home = "home.html";

  $usr = $_POST['usuario'];
  $pwd = $_POST['contrasena'];
  
  

  $dao = new DAOUsuarios();
  $usuarioBuscado = $dao->getUser($usr);

  if (!is_null($usuarioBuscado) && $usuarioBuscado->getContrasena() == $pwd) {
    echo "\n Usario logeado correctamente.";
	include_once $home;
  }
  else {
    echo "\n ERROR, las credenciales no coinciden.";
  }

?>
