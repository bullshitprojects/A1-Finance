<?php
class TipoCuenta
{
    private $id_tipo_cuenta;
    private $tipo;


    public function getId_tipo_cuenta(): int
    {
        return $this->id_tipo_cuenta;
    }

    public function setId_tipo_cuenta(int $id_tipo_cuenta)
    {
        $this->id_tipo_cuenta = $id_tipo_cuenta;
    }

    public function getTipo(): string
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo)
    {
        $this->tipo = $tipo;
    }
}
