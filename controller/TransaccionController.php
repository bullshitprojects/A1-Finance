<?php
include_once("model/Transaccion.php");
include_once("config/database.php");
class TransaccionController
{
    public static function CrearTransaccion(Transaccion $transaccion)
    {
        try {
            $conexionBD = Conectar::crearInstancia();
            $sql = $conexionBD->prepare("INSERT INTO transaccion (`monto`, `fecha`, `descripcion`, `categoria_id_categoria`, `cuenta_id_cuenta`, `tipo_transaccion_id_tipo_transaccion`) VALUES (?,?,?,?,?,?)");
            $sql->execute(array(
                $transaccion->getMonto(),
                $transaccion->getFecha()->format('Y-m-d'),
                $transaccion->getDescripcion(),
                $transaccion->getId_categoria(),
                $transaccion->getIdCuenta(),
                $transaccion->getId_tipo_transaccion(),
            ));
            TransaccionController::ActualizarBalance($transaccion);
            //header('location:index.php?page=home');
        } catch (PDOException $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    public static function ActualizarBalance(Transaccion $transaccion)
    {
        try {
            $conexionBD = Conectar::crearInstancia();
            if ($transaccion->getId_tipo_transaccion() == 1) {
                $sql = $conexionBD->prepare("UPDATE `cuenta` SET `balance`= (balance + ?) WHERE `id_cuenta`= ?");
            } else {
                $sql = $conexionBD->prepare("UPDATE `cuenta` SET `balance`= (balance - ?) WHERE `id_cuenta`= ?");
            }
            $sql->execute(array(
                $transaccion->getMonto(),
                $transaccion->getIdCuenta(),
            ));
        } catch (PDOException $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    public static function TransaccionesPorUsuario($id)
    {
        try {
            $conexionBD = Conectar::crearInstancia();
            $sql = $conexionBD->prepare("SELECT T.fecha, T.descripcion, C.no_cuenta, CA.nombre, TP.id_tipo_transaccion, T.monto 
                                        FROM transaccion AS T 
                                        JOIN cuenta AS C ON T.cuenta_id_cuenta = C.id_cuenta
                                        JOIN categoria AS CA ON T.categoria_id_categoria = CA.id_categoria
                                        JOIN tipo_transaccion AS TP ON T.tipo_transaccion_id_tipo_transaccion=TP.id_tipo_transaccion 
                                        WHERE C.usuario_id_usuario = ? ORDER BY T.fecha DESC;");
            $sql->execute(array($id,));
            $listaTransacciones = $sql->fetchAll();
            return $listaTransacciones;
        } catch (PDOException $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

    public static function TransaccionesPorTipo($id)
    {
        try {
            $conexionBD = Conectar::crearInstancia();
            $sql = $conexionBD->prepare("SELECT TP.id_tipo_transaccion AS id, SUM(T.monto) AS total FROM transaccion AS T 
                JOIN cuenta AS C ON T.cuenta_id_cuenta = C.id_cuenta 
                JOIN categoria AS CA ON T.categoria_id_categoria = CA.id_categoria 
                JOIN tipo_transaccion AS TP ON T.tipo_transaccion_id_tipo_transaccion=TP.id_tipo_transaccion 
                WHERE C.usuario_id_usuario = ? GROUP BY TP.id_tipo_transaccion;");
            $sql->execute(array($id,));
            $transaccionesTipo = $sql->fetchAll();
            return $transaccionesTipo;
        } catch (PDOException $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}
