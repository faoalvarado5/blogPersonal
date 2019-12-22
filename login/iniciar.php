<?php

  include "Usuario.php";
  include "conexion.php";
  include "DAOUsuarios.php";
  include "ControllerUsuarios.php";
  include "ValidacionUsuarios.php";

  $usr = $_POST['usuario'];
  $pwd = $_POST['contrasena'];

  $conexion = conexion::conectar();

  $dao = new DAOUsuarios($conexion);
  $usuarioBuscado = $dao->getUser($usr);

  if (!is_null($usuarioBuscado) && $usuarioBuscado->getPassword() == $pwd) {
    echo "\n Uusario logeado correctamente.";
  }
  else {
    echo "\n ERROR.";
  }

?>
