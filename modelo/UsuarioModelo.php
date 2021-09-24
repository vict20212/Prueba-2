<?php

include_once "conexion.php";


class usuarioModelo
{

    public static function mdlListarRol()
    {

        $objRespuesta = conexion::conectar()->prepare("SELECT * FROM rol");
        $objRespuesta->execute();
        $objListarRol = $objRespuesta->fetchAll();
        $objRespuesta = null;
        return $objListarRol;
    }

    public static function mdlRegistrar($nombre, $apellido, $email, $contraseña, $idRol)
    {
        $mensaje = "";
        try {
            $objRespuesta = conexion::conectar()->prepare("INSERT INTO usuario(nombre,apellido,email,contraseña,idRol)VALUES(:nombre,:apellido,:email,:contraseña,:idRol)");
            $objRespuesta->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $objRespuesta->bindParam(":apellido", $apellido, PDO::PARAM_STR);
            $objRespuesta->bindParam(":email", $email, PDO::PARAM_STR);
            $objRespuesta->bindParam(":contraseña", $contraseña, PDO::PARAM_STR);
            $objRespuesta->bindParam(":idRol", $idRol, PDO::PARAM_INT);
            if ($objRespuesta->execute()) {
                $mensaje = "ok";
            } else {
                $mensaje = "error";
            }
        } catch (exception $e) {
            $mensaje = $e;
        }
        return $mensaje;
    }
    public static function mdlListarUsuario($idRol)
    {
        $objRespuesta = conexion::conectar()->prepare("SELECT usuario.idusuario,usuario.nombre,usuario.apellido,usuario.email,usuario.contraseña,usuario.idRol FROM usuario INNER JOIN rol ON usuario.idRol=rol.idRol WHERE idusuario='$idRol");
        $objRespuesta->execute();
        $objListarUsuario = $objRespuesta->fetchAll();
        $objRespuesta = null;
        return $objListarUsuario;
    }
}
