<?php
include_once("../model/Cuenta.php");
include_once("../config/database.php");

class CuentaController
{

    public static function CrearCuenta(Cuenta $cuenta)
    {
        try {
            $conexionBD = Conectar::crearInstancia();
            $sql = $conexionBD->prepare("INSERT INTO cuenta (`no_cuenta`, `presupuesto`, `balance`, `usuario_id_usuario`, `tipo_cuenta_id_tipo_cuenta`, `moneda_id_moneda`) VALUES (?,?,?,?,?,?)");
            $sql->execute(array(
                $cuenta->getNo_cuenta(),
                $cuenta->getPresupuesto(),
                $cuenta->getBalance(),
                $cuenta->getId_usuario(),
                $cuenta->getId_tipo_cuenta(),
                $cuenta->getId_moneda()
            ));
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), $e->getCode());
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
        $sql = $conexionBD->prepare("UPDATE `cuenta` SET `no_cuenta`= ?,`presupuesto`= ?,`balance`= ?,`tipo_cuenta_id_tipo_cuenta`= ?,`moneda_id_moneda`= ? WHERE id_cuenta=?");
        $sql->execute(array(
            $cuenta->getNo_cuenta(),
            $cuenta->getPresupuesto(),
            $cuenta->getBalance(),
            $cuenta->getId_tipo_cuenta(),
            $cuenta->getId_moneda()
        ));
        session_start();
        $_SESSION['cuenta'] = CuentaController::BuscarCuenta($cuenta->getId_cuenta());
        return "Datos Modificados";
    }

    public static function ActualizarPresupuesto(Cuenta $cuenta)
    {
        $conexionBD = Conectar::crearInstancia();
        $sql = $conexionBD->prepare("UPDATE `cuenta` SET `presupuesto` = ? WHERE id_cuenta = ?");
        $sql->execute(array(
            $cuenta->getPresupuesto(),
            $cuenta->getId_cuenta(),
        ));
    }

    public static function ActualizarBalance(Cuenta $cuenta)
    {
        $conexionBD = Conectar::crearInstancia();
        $sql = $conexionBD->prepare("UPDATE `cuenta` SET `balance` = ? WHERE id_cuenta = ?");
        $sql->execute(array(
            $cuenta->getBalance(),
            $cuenta->getId_cuenta()
        ));
    }

    public static function ListaCuenta()
    {
        $conexionBD = Conectar::crearInstancia();
        $sql = $conexionBD->query("SELECT * FROM cuenta WHERE id_usuario=?");
        $listaCuentas = $sql->fetchAll();

        return $listaCuentas;
    }
}
