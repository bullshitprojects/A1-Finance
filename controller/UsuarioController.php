<?php
    include_once("../model/Usuario.php");
    include_once("../config/database.php");

class UsuarioController{

    public static function ValidarUsuario(string $email, string $pass){
        $conexionBD=Conectar::crearInstancia();
        $sql = $conexionBD->prepare("SELECT * FROM usuarios WHERE correo=? and contra =? ");
        $sql->execute(array($email,$pass));
        $Usuario = $sql->fetch();
        return new Usuario($Usuario['id_usuario'], $Usuario['nombre'], $Usuario['dui'], $Usuario['foto'], $Usuario['fecha_nacimiento'],
                             $Usuario['telefono'], $Usuario['correo'], $Usuario['contra'], $Usuario['id_tipoUsuario']);
        
    }

    public static function CrearUsuario ($nombre, $dui, $foto, $fechaNacimiento, $telefono, $correo, $contra, $id_tipoUsuario){       
        $conexionBD=Conectar::crearInstancia();
        $sql = $conexionBD->prepare("INSERT INTO usuario (`nombre`, `dui`, `foto`, `fechaNacimiento`, `telefono`, `correo`, `contra`, `id_tipoUsuario`) VALUES (?,?,?,?,?,?,?,?)");
        $sql->execute(array($nombre, $dui, $foto, $fechaNacimiento, $telefono, $correo, $contra, $id_tipoUsuario));
    }

    public static function BorrarUsuario ($id_usuario){       
        $conexionBD=Conectar::crearInstancia();
        $sql = $conexionBD->prepare("DELETE FROM usuario WHERE id_usuario=?");
        $sql->execute(array($id_usuario));
    }

    public static function BuscarUsuario ($id_usuario){       
        $conexionBD=Conectar::crearInstancia();
        $sql = $conexionBD->prepare("SELECT * FROM usuario WHERE id_usuario=?");
        $sql->execute(array($id_usuario));
        $Usuario = $sql->fetch();
        return new Usuario($Usuario['id_usuario'], $Usuario['nombre'], $Usuario['dui'], $Usuario['foto'], $Usuario['fecha_nacimiento'],
                             $Usuario['telefono'], $Usuario['correo'], $Usuario['contra'], $Usuario['id_tipoUsuario']);
    }

    public static function ActualizarUsuario ($id_usuario,$nombre, $dui, $foto, $fechaNacimiento, $telefono, $correo, $contra, $id_tipoUsuario){       
        $conexionBD=Conectar::crearInstancia();
        $sql = $conexionBD->prepare("UPDATE `usuario` SET `nombre`=?,`dui`=?,`foto`=?,`fechaNacimiento`=?,`telefono`=?,
        `correo`=?,`contra`=?,`id_tipoUsuario`=? WHERE id_usuario=?");
        $sql->execute(array($nombre, $dui, $foto, $fechaNacimiento, $telefono, $correo, $contra, $id_tipoUsuario,$id_usuario));
    }

    public static function ListaUsuarios (){
        $listaPersonas=[];
        $conexionBD=Conectar::crearInstancia();
        $sql = $conexionBD->query("SELECT * FROM usuarios");

        foreach ($sql->fetchAll() as $Usuario){
                $listaPersonas []= new Usuario($Usuario['id_usuario'], $Usuario['nombre'], $Usuario['dui'], $Usuario['foto'], $Usuario['fecha_nacimiento'],
                $Usuario['telefono'], $Usuario['correo'], $Usuario['contra'], $Usuario['id_tipoUsuario']);

        }
        return $listaPersonas;
    }
}

?>
