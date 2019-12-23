<?php

  include "Usuario.php";
  include "DAOUsuarios.php";

  $nombre = $_POST['nombre'];
  $apellido1 = $_POST['apellido1'];
  $apellido2 = $_POST['apellido2'];
  $usuario = $_POST['usuario'];
  $contrasena = $_POST['contrasena'];
  $email = $_POST['email'];
  $telefono = $_POST['telefono'];
  $fecha = $_POST['fecha'];

  $dao = new DAOUsuarios();
  $usuarioNuevo = new Usuario($usuario, $nombre, $apellido1, $apellido2, $contrasena, $email, strval($telefono), $fecha);

  if ($dao->insertar($usuarioNuevo) == 1) {
    echo "Se ha registrado correctamente.";
  }
  else {
    echo "Ha ocurrido un error en el registro.";
  }


?>
