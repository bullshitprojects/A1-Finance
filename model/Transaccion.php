<?php
class Transaccion
{
    private $id_transaccion;
    private $fecha;
    private $descripcion;
    private $monto;
    private $id_cuenta;
    private $id_tipo_transaccion;
    private $id_categoria;

    //Modificadores de acceso
    public function getId_transaccion(): int
    {
        return $this->id_transaccion;
    }

    public function setId_transaccion(int $id_transaccion)
    {
        $this->id_transaccion = $id_transaccion;
    }

    //falta poner dato
    public function getFecha(): DateTime
    {
        return $this->fecha;
    }

    public function setFecha(DateTime $fecha)
    {
        $this->fecha = $fecha;
    }

    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function getMonto(): float
    {
        return $this->monto;
    }

    public function setMonto(float $monto)
    {
        $this->monto = $monto;
    }

    public function getIdCuenta(): int
    {
        return $this->id_cuenta;
    }

    public function setIdCuenta(int $id_cuenta)
    {
        $this->id_cuenta = $id_cuenta;
    }

    public function getId_tipo_transaccion(): int
    {
        return $this->id_tipo_transaccion;
    }

    public function setId_tipo_transaccion(int $id_tipo_transaccion)
    {
        $this->id_tipo_transaccion = $id_tipo_transaccion;
    }

    public function getId_categoria(): int
    {
        return $this->id_categoria;
    }

    public function setId_categoria(int $id_categoria)
    {
        $this->id_categoria = $id_categoria;
    }
}
