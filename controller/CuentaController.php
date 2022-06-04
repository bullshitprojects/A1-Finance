<?php
include_once("model/Cuenta.php");
include_once("config/database.php");

class CuentaController
{

    public static function CrearCuenta(Cuenta $cuenta)
    {
        try {
            $conexionBD = Conectar::crearInstancia();
            $sql = $conexionBD->prepare("INSERT INTO cuenta (`no_cuenta`, `presupuesto`, `balance`, `usuario_id_usuario`, `tipo_cuenta_id_tipo_cuenta`, `moneda_id_moneda`) VALUES (?,?,?,?,?,?)");
            $sql->execute(array(
                $cuenta->getNo_cuenta(),
                0,
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

    public static function ListaCuenta($id)
    {
        $conexionBD = Conectar::crearInstancia();
        $sql = $conexionBD->prepare("SELECT * FROM cuenta WHERE usuario_id_usuario=?");
        $sql->execute(array($id));
        $listaCuentas = $sql->fetchAll();
        return $listaCuentas;
    }

    public static function ObtenerCuentas($id)
    {
        $conexionBD = Conectar::crearInstancia();
        $sql = $conexionBD->prepare("SELECT * FROM cuenta WHERE usuario_id_usuario=?");
        $sql->execute(array($id));
        foreach ($sql->fetchAll() as $data) {
            $id = $data['id_cuenta'];
            $nombre = $data['no_cuenta'];
            echo "<option value=\"$id\">$nombre</option>";
        }
    }

    public static function ObtenerBalance($id)
    {
        $conexionBD = Conectar::crearInstancia();
        $sql = $conexionBD->prepare("SELECT SUM(BALANCE) as balance FROM `cuenta` WHERE usuario_id_usuario =?");
        $sql->execute(array($id));
        $data = $sql->fetch();
        echo "$" . number_format(floatval($data['balance']), 2);
    }
}
