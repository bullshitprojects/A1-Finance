<?php
class TipoTransaccion
{
    private $id_tipo_transaccion;
    private $descripcion;

    //Modificadores de acceso
    public function getId_tipo_transaccion(): int
    {
        return $this->id_tipo_transaccion;
    }

    public function setId_tipo_transaccion(int $id_tipo_transaccion)
    {
        $this->id_tipo_transaccion = $id_tipo_transaccion;
    }

    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion)
    {
        $this->descripcion = $descripcion;
    }
}
