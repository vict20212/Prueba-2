<?php
include_once "../modelo/usuariosModelo.php";

class usuariosControl{
    public $idUsuario;
    public $nombre;
    public $apellido;
    public $email;
    public $contraseña;


    public function ctrRegistrarUsuario(){
        $objRespuesta = usuarioModelo::mdlRegistrar($this->idUsuario, $this->nombre, $this->apellido, $this->email, $this->contraseña);
        echo json_encode($objRespuesta);
    }
    
    public function ctrListarUsuario(){
        $objRespuesta = usuarioModelo::mdlListarUsuario();
        echo json_encode($objRespuesta);
    }

    public function ctrListarURol(){
        $objRespuesta = usuarioModelo::mdlListarRol();
        echo json_encode($objRespuesta);
    }

}

if (isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["email"]) && isset($_POST["contraseña"])){
    $objUsuarios = new usuariosControl();
    $objUsuario->nombre = $_POST["nombre"];
    $objUsuario->apellido = $_POST["apellido"];
    $objUsuario->email= $_POST["email"];
    $objUsuario->contraseña = $_POST["contraseña"];
    $objUsuarios->ctrRegistrarUsuario();
}

if (isset($_POST["cargar"])){
    $objUsuarios = new usuariosControl();
    $objUsuarios->ctrListarUsuario();
}

if (isset($_POST["cargarRol"])){
    $objUsuarios = new usuariosControl();
    $objUsuarios->ctrListarURol();
}