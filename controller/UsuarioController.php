<?php
require_once("model/Usuario.php");
require_once("config/database.php");

class UsuarioController
{

    public static function ValidarUsuario(string $email, string $pass)
    {
        try {
            $conexionBD = Conectar::crearInstancia();
            $sql = $conexionBD->prepare("SELECT COUNT(*) AS existe FROM usuario WHERE correo=? and contra =? ");
            $sql->execute(array($email, $pass));
            $existe = $sql->fetch();
            if ($existe['existe'] > 0) {
                session_start();
                $_SESSION['usuario'] = UsuarioController::ObtenerUsuario($email);
                header('location:index.php?page=home');
            } else {
                echo '
                    <script type=\'text/javascript\'>
                        $(document).ready(function(){
                            Swal.fire({
                                icon: \'error\',
                                title: \'Datos incorrectos, intentelo de nuevo\',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        });
                    </script>
                ';
            }
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    public static function ObtenerUsuario(string $email)
    {
        try {
            $conexionBD = Conectar::crearInstancia();
            $sql = $conexionBD->prepare("SELECT * FROM usuario WHERE correo=?");
            $sql->execute(array($email));
            $Usuario = $sql->fetch();
            $Usuario = new Usuario($Usuario['id_usuario'], $Usuario['nombre'], $Usuario['dui'], $Usuario['foto'], (new DateTime($Usuario['fechaNacimiento'])), $Usuario['telefono'], $Usuario['correo'], $Usuario['contra'], $Usuario['id_tipoUsuario']);
            return $Usuario;
        } catch (mysqli_sql_exception $e) {
        }
    }

    public static function ValidarEmail(string $email, Usuario $usuario)
    {
        try {
            $conexionBD = Conectar::crearInstancia();
            $sql = $conexionBD->prepare("SELECT COUNT(correo) AS existe FROM usuario WHERE correo=?");
            $sql->execute(array($email));
            $existe = $sql->fetch();
            if ($existe['existe'] == 0) {
                UsuarioController::CrearUsuario($usuario);
                return 1;
            } else {
                return 0;;
            }
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    public static function CrearUsuario(Usuario $usuario)
    {
        try {
            $conexionBD = Conectar::crearInstancia();
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
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), $e->getCode());
        }
    }

    public static function BorrarUsuario($id_usuario)
    {
        $conexionBD = Conectar::crearInstancia();
        $sql = $conexionBD->prepare("DELETE FROM usuario WHERE id_usuario=?");
        $sql->execute(array($id_usuario));
    }

    public static function BuscarUsuario($id_usuario)
    {
        $conexionBD = Conectar::crearInstancia();
        $sql = $conexionBD->prepare("SELECT * FROM usuario WHERE id_usuario=?");
        $sql->execute(array($id_usuario));
        $Usuario = $sql->fetch();
        return new Usuario(
            $Usuario['id_usuario'],
            $Usuario['nombre'],
            $Usuario['dui'],
            $Usuario['foto'],
            $Usuario['fechaNacimiento'],
            $Usuario['telefono'],
            $Usuario['correo'],
            $Usuario['contra'],
            $Usuario['id_tipoUsuario']
        );
    }

    public static function ActualizarUsuario(Usuario $usuario)
    {
        $conexionBD = Conectar::crearInstancia();
        $sql = $conexionBD->prepare("UPDATE `usuario` SET `nombre`=?,`dui`=?,`fechaNacimiento`=?,`telefono`=?,`contra`=? WHERE correo=?");
        $sql->execute(array(
            $usuario->getNombre(),
            $usuario->getDui(),
            $usuario->getFechaNacimiento()->format('Y-m-d'),
            $usuario->getTelefono(),
            $usuario->getContra(),
            $usuario->getCorreo(),
        ));
        $_SESSION['usuario'] = UsuarioController::ObtenerUsuario($usuario->getCorreo());
        return "Datos Modificados";
    }

    public static function ListaUsuarios()
    {
        $listaPersonas = [];
        $conexionBD = Conectar::crearInstancia();
        $sql = $conexionBD->query("SELECT * FROM usuario");

        foreach ($sql->fetchAll() as $Usuario) {
            $listaPersonas[] = new Usuario(
                $Usuario['id_usuario'],
                $Usuario['nombre'],
                $Usuario['dui'],
                $Usuario['foto'],
                $Usuario['fechaNacimiento'],
                $Usuario['telefono'],
                $Usuario['correo'],
                $Usuario['contra'],
                $Usuario['id_tipoUsuario']
            );
        }
        return $listaPersonas;
    }
}
