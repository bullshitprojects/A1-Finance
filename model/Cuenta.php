<?php
class Cuenta
{
    private $id_cuenta;
    private $no_cuenta;
    private $presupuesto;
    private $id_usuario;
    private $id_tipo_cuenta;
    private $id_moneda;

    public function getId_cuenta(): int
    {
        return $this->id_cuenta;
    }

    public function setId_cuenta(int $id_cuenta)
    {
        $this->id_cuenta = $id_cuenta;
    }

    public function getNo_cuenta(): string
    {
        return $this->no_cuenta;
    }

    public function setNo_cuenta(string $no_cuenta)
    {
        $this->no_cuenta = $no_cuenta;
    }

    public function getPresupuesto(): float
    {
        return number_format($this->presupuesto, 2);
    }

    public function setPresupuesto(float $presupuesto)
    {
        $this->presupuesto = $presupuesto;
    }

    public function getBalance(): float
    {
        return number_format($this->balance, 2);
    }

    public function setBalance(float $balance)
    {
        $this->balance = $balance;
    }

    public function getId_usuario(): int
    {
        return $this->id_usuario;
    }

    public function setId_usuario(int $id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    public function getId_tipo_cuenta(): int
    {
        return $this->id_tipo_cuenta;
    }

    public function setId_tipo_cuenta(int $id_tipo_cuenta)
    {
        $this->id_tipo_cuenta = $id_tipo_cuenta;
    }

    public function getId_moneda(): int
    {
        return $this->id_moneda;
    }

    public function setId_moneda(int $id_moneda)
    {
        $this->id_moneda = $id_moneda;
    }
}
