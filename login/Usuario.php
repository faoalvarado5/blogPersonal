<?php

  class Usuario {

	private $usuario;
    private $nombre;
    private $apellido1;
    private $apellido2;
    private $contrasena;
    private $email;
    private $telefono;
    private $fecha;

    function __construct($usuario, $nombre, $apellido1, $apellido2, $contrasena, $email, $telefono, $fecha) {

        $this->usuario = $usuario;
        $this->nombre = $nombre;
        $this->apellido1 = $apellido1;
        $this->apellido2 = $apellido2;
        $this->contrasena = $contrasena;
        $this->email = $email;
        $this->telefono = $telefono;
        $this->fecha = $fecha;
    }

    public function getUsuario() {return $this->usuario;}
    public function getNombre() {return $this->nombre;}
    public function getApellido1() {return $this->apellido1;}
    public function getApellido2() {return $this->apellido2;}
    public function getContrasena() {return $this->contrasena;}
    public function getEmail() {return $this->email;}
    public function getTelefono() {return $this->telefono;}
    public function getFecha() {return $this->fecha;}

  }
?>
