<?php
require_once("model/Usuario.php");
require_once("config/database.php");

class UsuarioController
{

    public static function ValidarUsuario(string $email, string $pass)
    {
        try {
            $conexionBD = Conectar::crearInstancia();
            $sql = $conexionBD->prepare("SELECT pwd FROM usuario WHERE correo_usuario=?");
            //=================================
            //  VERIFY PASSWORD
            //=================================

            $sql->execute(array($email));
            $data = $sql->fetch();
            echo $data['pwd'];
            $existe = password_verify($pass, $data['pwd']);
            if ($existe) {
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
            $sql = $conexionBD->prepare("SELECT * FROM usuario WHERE correo_usuario=?");
            $sql->execute(array($email));
            $data = $sql->fetch();
            $Usuario = new Usuario();
            $Usuario->setIdUsuario($data['id_usuario']);
            $Usuario->setNombre($data['nombre']);
            $Usuario->setUrlFoto($data['url_foto']);
            $Usuario->setFechaNacimiento(new DateTime($data['fecha_nacimiento']));
            $Usuario->setTelefono($data['telefono']);
            $Usuario->setCorreo($data['correo_usuario']);
            //=================================
            // 1 = ENCRYPT
            // ? = READ
            //=================================
            $Usuario->setContra($data['pwd'], 0);
            $Usuario->setId_tipoUsuario($data['tipo_usuario_id_tipo_usuario']);
            return $Usuario;
        } catch (mysqli_sql_exception $e) {
        }
    }

    public static function ValidarEmail(string $email, Usuario $usuario)
    {
        try {
            $conexionBD = Conectar::crearInstancia();
            $sql = $conexionBD->prepare("SELECT COUNT(correo_usuario) AS existe FROM usuario WHERE correo_usuario=?");
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
            $sql = $conexionBD->prepare("INSERT INTO usuario (`nombre`, `url_foto`, `fecha_nacimiento`, `telefono`, `correo_usuario`, `pwd`, `tipo_usuario_id_tipo_usuario`) VALUES (?,?,?,?,?,?,?)");
            $sql->execute(array(
                $usuario->getNombre(),
                $usuario->getUrlFoto(),
                $usuario->getFechaNacimiento()->format('Y-m-d'),
                $usuario->getTelefono(),
                $usuario->getCorreo(),
                $usuario->getContra(),
                $usuario->getId_tipoUsuario(),
            ));
            $_SESSION['usuario'] = UsuarioController::ObtenerUsuario($usuario->getCorreo());
            //header('location:index.php?page=home');
        } catch (PDOException $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
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
            $Usuario['foto'],
            $Usuario['fecha_nacimiento'],
            $Usuario['telefono'],
            $Usuario['correo'],
            $Usuario['pwd'],
            $Usuario['id_tipoUsuario']
        );
    }

    public static function ActualizarUsuario(Usuario $usuario)
    {
        $conexionBD = Conectar::crearInstancia();
        // Completa $sql = $conexionBD->prepare("UPDATE `usuario` SET `nombre`=?,`url_foto`=?,`fecha_nacimiento`=?,`telefono`=?,`pwd`=? WHERE correo_usuario=?");
        $sql = $conexionBD->prepare("UPDATE `usuario` SET `nombre`=?,`fecha_nacimiento`=?,`telefono`=? WHERE correo_usuario=?");
        $sql->execute(array(
            $usuario->getNombre(),
            $usuario->getFechaNacimiento()->format('Y-m-d'),
            $usuario->getTelefono(),
            $usuario->getCorreo(),
        ));

        $_SESSION['usuario'] = UsuarioController::ObtenerUsuario($usuario->getCorreo());
        header('location:index.php?page=profile');
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
                $Usuario['url_foto'],
                $Usuario['fecha_nacimiento'],
                $Usuario['telefono'],
                $Usuario['correo_usuario'],
                $Usuario['pwd'],
                $Usuario['id_tipoUsuario']
            );
        }
        return $listaPersonas;
    }
}
