<?php

  include "Usuario.php";
  include "conexion.php";
  include "DAOUsuarios.php";
  include "ControllerUsuarios.php";
  include "ValidacionUsuarios.php";

  $usr = $_POST['usuario'];
  $pwd = $_POST['contrasena'];

  $dao = new DAOUsuarios();
  $usuarioBuscado = $dao->getUser($usr);

  if (!is_null($usuarioBuscado) && $usuarioBuscado->getContrasena() == $pwd) {
    echo "\n Uusario logeado correctamente.";
  }
  else {
    echo "\n ERROR, las credenciales no coinciden.";
  }

?>
