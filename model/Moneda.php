<?php
class Moneda
{
    private $id_moneda;
    private $nombre;

    public function getId_moneda(): int
    {
        return $this->id_moneda;
    }

    public function setId_moneda(int $id_moneda)
    {
        $this->id_moneda = $id_moneda;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre)
    {
        $this->nombre = $nombre;
    }
}
