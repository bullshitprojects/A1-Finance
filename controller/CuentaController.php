<?php
include_once("../model/Cuenta.php");
include_once("../config/database.php");

class CuentaController
{

    public static function CrearCuenta(Cuenta $cuenta)
    {
        try {
            $conexionBD = Conectar::crearInstancia();
            $sql = $conexionBD->prepare("INSERT INTO cuenta (`numero_cuenta`, `entidadFinanciera`, `nombre`, `saldoInicial`, `id_usuario`) VALUES (?,?,?,?,?)");
            $sql->execute(array(
                $cuenta->getNumeroCuenta(),
                $cuenta->getEntidadFinanciera(),
                $cuenta->getNombre(),
                $cuenta->getSaldoInicial(),
                $cuenta->getId_usuario(),
            ));

        } catch (PDOException $e ) {
            throw new PDOException( $e->getMessage( ) , $e->getCode( ) );
        }
    }

    public static function BorrarCuenta($id_cuenta)
    {
        $conexionBD = Conectar::crearInstancia();
        $sql = $conexionBD->prepare("DELETE FROM cuenta WHERE id_cuenta=?");
        $sql->execute(array($id_cuenta));
    }


    public static function BuscarCuenta($id_cuenta)
    {
        $conexionBD = Conectar::crearInstancia();
        $sql = $conexionBD->prepare("SELECT * FROM cuenta WHERE id_cuenta=?");
        $sql->execute(array($id_cuenta));
        $cuenta = $sql->fetch();
        return new Cuenta(
            $cuenta['id_cuenta'],
            $cuenta['numero_cuenta'],
            $cuenta['entidadFinanciera'],
            $cuenta['nombre'],
            $cuenta['saldoInicial'],
            $cuenta['id_usuario'],
        );
    }

    public static function ActualizarCuenta(Cuenta $cuenta)
    {
        $conexionBD = Conectar::crearInstancia();
        $sql = $conexionBD->prepare("UPDATE `cuenta` SET `numero_cuenta`= ?,`entidadFinanciera`= ?,`nombre`= ?,`saldoInicial`= ?,`id_usuario`= ? WHERE id_cuenta=?");
        $sql->execute(array(
            $cuenta->getNumeroCuenta(),
            $cuenta->getEntidadFinanciera(),
            $cuenta->getNombre(),
            $cuenta->getSaldoInicial(),
            $cuenta->getId_usuario(),
        ));
        session_start();
        $_SESSION['cuenta'] = CuentaController::BuscarCuenta($cuenta->getId_cuenta());
        return "Datos Modificados";
    }

    public static function ListaCuenta()
    {
        $listaPersonas = [];
        $conexionBD = Conectar::crearInstancia();
        $sql = $conexionBD->query("SELECT * FROM cuenta WHERE id_usuario=?");

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
