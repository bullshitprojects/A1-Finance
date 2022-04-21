<?php
    include_once("../model/Usuario.php");
    include_once("../config/database.php");

class UsuarioController{

    public static function ValidarUsuario(string $email, string $pass){
        try {
            $conexionBD=Conectar::crearInstancia();
            $sql = $conexionBD->prepare("SELECT COUNT(*) AS existe FROM usuario WHERE correo=? and contra =? ");
            $sql->execute(array($email,$pass));
            $existe = $sql->fetch();
            if ($existe['existe']>0) {
                session_start();
                $_SESSION['usuario'] = UsuarioController::ObtenerUsuario($email);
                return 1;
            }
            else{
               return 0;
            }
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }   
    }

    public static function ObtenerUsuario(string $email){
        try {
            $conexionBD=Conectar::crearInstancia();
            $sql = $conexionBD->prepare("SELECT * FROM usuario WHERE correo=?");
            $sql->execute(array($email));
            $Usuario = $sql->fetch();
            $Usuario = new Usuario($Usuario['id_usuario'], $Usuario['nombre'], $Usuario['dui'], $Usuario['foto'], $Usuario['fechaNacimiento'], $Usuario['telefono'], $Usuario['correo'], $Usuario['contra'], $Usuario['id_tipoUsuario']);
            return $Usuario;
        } catch (Exception $e) {
        }   
    }

    public static function CrearUsuario (Usuario $usuario){       
        $conexionBD=Conectar::crearInstancia();
        $sql = $conexionBD->prepare("INSERT INTO usuario (`nombre`, `dui`, `foto`, `fechaNacimiento`, `telefono`, `correo`, `contra`, `id_tipoUsuario`) VALUES (?,?,?,?,?,?,?,?)");
        $sql->execute(array(
            $usuario->getNombre(),
            $usuario->getDui(),
            $usuario->getFoto(),
            $usuario->getFechaNacimiento()->format('Y-m-d'),
            $usuario->getTelefono(),
            $usuario->getCorreo(),
            $usuario->getContra(),
            $usuario->getId_tipoUsuario(),
        ));
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
        return new Usuario($Usuario['id_usuario'], $Usuario['nombre'], $Usuario['dui'], $Usuario['foto'], $Usuario['fechaNacimiento'],
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
        $sql = $conexionBD->query("SELECT * FROM usuario");

        foreach ($sql->fetchAll() as $Usuario){
                $listaPersonas []= new Usuario($Usuario['id_usuario'], $Usuario['nombre'], $Usuario['dui'], $Usuario['foto'], $Usuario['fechaNacimiento'],
                $Usuario['telefono'], $Usuario['correo'], $Usuario['contra'], $Usuario['id_tipoUsuario']);

        }
        return $listaPersonas;
    }
}
